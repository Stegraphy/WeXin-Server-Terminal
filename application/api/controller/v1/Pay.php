<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/3/12
 * Time: 17:47
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\service\Pay as PayService;
use app\api\service\WxNotify;
use app\api\validate\IdMustBePositiveInt;

class Pay extends BaseController
{

    protected $beforeActionList = [
        'checkExclusiveScope' => ['only' => 'getPreOrder']
    ];

    public function getPreOrder($id = '')
    {
        (new IdMustBePositiveInt())->goCheck();
        $pay = new PayService($id);
        return $pay->pay();
    }

    public function receiveNotify()
    {
//        $xmlData = file_get_contents('php://input');
//        \think\facade\Log::error($xmlData);
        $notify = new WxNotify();
        $notify->handle();
//        $xmlData = file_get_contents('php://input');
//        $result = curl_post_url('http:/zerg.cn/api/v1/pay/re_notify?XDEBUG_SESSION_START=13133',
//            $xmlData);
//        return $result;
//        \think\facade\Log::error($xmlData);
    }
    /*



     public function redirectNotify()
     {
         $notify = new WxNotify();
         $notify->handle();
     }

     public function notifyConcurrency()
     {
         $notify = new WxNotify();
         $notify->handle();
     }


     }*/
}