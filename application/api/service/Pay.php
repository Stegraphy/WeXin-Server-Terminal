<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/3/12
 * Time: 18:03
 */

namespace app\api\service;


use app\lib\enum\OrderStatusEnum;
use app\lib\exception\OrderException;
use app\lib\exception\TokenException;
use think\Exception;
use app\api\model\Order as OrderModel;
use app\api\service\Order as OrderService;
use think\facade\Log;

class Pay
{
    private $orderID;
    private $orderNO;

    function __construct($orderID)
    {
        if(!$orderID){
            throw new Exception('订单不允许为空null');
        }
        $this->$orderID = $orderID;
    }

    public function pay(){
        //订单号可能根本就不存在
        //订单号确实存在，但是，订单号和当前用户是不匹配的
        //订单有可能已经被支付过
        //进行库存量检测
        $this->checkOrderValid();
        $orderService = new OrderService();
        $status = $orderService->checkOrderStock($this->orderID);
        if(!$status['pass']){
            return $status;
        }
        return $this->makeWxPreOrder($status['orderPrice']);
    }

    private function makeWxPreOrder($totalPrice){
        //openid
        $openid = Token::getCurrentTokenVal('openid');
        if(!$openid){
            throw new TokenException();
        }
        $wxOrderDate = new \WxPayUnifiedOrder();
        $wxOrderDate->SetOut_trade_no($this->orderNO);
        $wxOrderDate->SetTrade_type('JSAPI');
        $wxOrderDate->SetTotal_fee($totalPrice*100);
        $wxOrderDate->SetBody('第一个小程序serpay');
        $wxOrderDate->SetOpenid($openid);
        $wxOrderDate->SetNotify_url('secure.pay_back_back_url');
        return $this->getPaySignature($wxOrderDate);
    }

    private function getPaySignature($wxOrderDate){
        $wxOrder = \WxPayApi::unifiedOrder($wxOrderDate);
        if($wxOrder['return_code'] != 'SUCCESS' ||
            $wxOrder['result_code'] != 'SUCCESS'){
            Log::record($wxOrder,'error');
            Log::record('获取微信支付订单失败','error');
        }
        //prepay_id
        $this->recordPreOrder($wxOrder);
        $signature = $this->sign($wxOrder);
        return $signature;
    }

    private function sign($wxOrder){
        $jsApiPayData = new \WxPayJsApiPay();
        $jsApiPayData->SetAppid(config('wx.app_id'));
        $jsApiPayData->SetTimeStamp((string)time());
        $rand = md5(time() . mt_rand(0,1000));
        $jsApiPayData->SetNonceStr($rand);
        $jsApiPayData->SetPackage('prepay_id='.$wxOrder['prepay_id']);
        $jsApiPayData->SetSignType('md5');
        $sign = $jsApiPayData->MakeSign();
        $rawValues = $jsApiPayData->GetValues();
        $rawValues['paySign'] = $sign;
        unset($rawValues['appid']);
        return $rawValues;
    }

    private function recordPreOrder($wxOrder){
        OrderModel::where('id','=',$this->orderID)
            ->update(['prepay_id'=>$wxOrder['prepay_id']]);
    }
    private function checkOrderValid(){
        $order = OrderModel::where('id','=',$this->orderID)
            ->find();
        if(!$order){
            throw new OrderException();
        }
        if(!Token::isValidOperate($order->user_id)){
            throw new TokenException([
               'msg' => '订单与用户不匹配',
               'errorCode' => 10003
            ]);
        }
        //1代表待支付
        if($order->status != OrderStatusEnum::UNPAID){
            throw new OrderException([
                'msg' => '订单已经支付',
                'errorCode' => 80003,
                'code' => 400
            ]);
        }
        $this->orderNO = $order->order_no;
        return true;
    }
}