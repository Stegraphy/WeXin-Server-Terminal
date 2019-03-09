<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/3/8
 * Time: 9:45
 */

namespace app\api\controller\v1;


use app\api\model\User as UserModel;
use app\api\service\Token as TokenService;
use app\api\validate\AddressNew;
use app\lib\enum\ScopeEnum;
use app\lib\exception\ForbiddenException;
use app\lib\exception\SuccessMessage;
use app\lib\exception\TokenException;
use app\lib\exception\UserException;
use think\Controller;

class Address extends Controller
{
    protected $beforeActionList = [
        'checkPrimaryScope' => ['only' => 'createOrUpdateAddress']
    ];

    protected function checkPrimaryScope(){
        $scope = TokenService::getCurrentTokenVal('scope');
        if($scope){
            if($scope >= ScopeEnum::User){
                return true;
            }else{
                throw new ForbiddenException();
            }
        }else{
            throw new TokenException();
        }

    }
    /*
    protected $beforeActionList = [
        'first' => ['only' => 'second']
    ];

  protected function first(){
        echo 'first</br>';
    }
    //Api接口，前置方法接口测试
    public function second(){
        echo 'second';
    }*/
    public function createOrUpdateAddress(){
        $validate = new AddressNew();
        $validate->goCheck();
        //(new AddressNew())->goCheck();
        //根据Token获取用户的uid
        //根据uid来查找用户数据，判断用户是否存在，如果不存在抛出异常
        //获取用户从客户端提交来的地址信息
        //根据用户地址信息是存在，从而判断时添加地址还是更新地址

        $uid = TokenService::getCurrenUid();
        $user  = UserModel::get($uid);
        if(!$user){
            throw new UserException();
        }
        $dataArray = $validate->getDataByRole(input('post.'));
        $userAddress = $user->address;
        if(!$userAddress){
            $user->address()->save($dataArray);
        }else{
            $user->address->save($dataArray);
        }
//        return $user;
            return json(new SuccessMessage(),201);
    }
}