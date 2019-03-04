<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/2/24
 * Time: 20:41
 */

namespace app\api\controller\v1;

//use think\validate;
use app\api\model\Banner as BannerModel;
use app\api\validate\IdMustBePositiveInt;
use app\api\validate\TestValidate;
use app\lib\exception\BannerMissException;
use Exception;

class Banner
{
    /**
     * 获取指定的id的Banner信息
     * @url /banner/:id
     * @http GET
     * @id banner的id号
     */
    public function getBanner($id)
    {
        //validate①独立验证②验证器
       /* $validate = Validate::make([
            'name' => 'require|max:10',
            'email' => 'email'
        ]);*/

       /* $data   = [
            'name' => 'thinkphpkkkkkkk',
            'email' => 'thinkphpqq.com'
            ];*/

       /* $validate = new TestValidate();
        $result = $validate->batch()->check($data);
        var_dump($validate->getError());*/
     /*   echo xdebug_time_index();
        for ($i = 0; $i < 250000; $i++){
            // do nothing
        }
        echo "<br>". xdebug_time_index();*/

    /* $data = [
       'id' => $id
     ];

     $validate = new IdMustBePositiveInt();
     $result = $validate->batch()->check($data);
     if($result){
         echo 'Success';
     }else{
         echo 'UnSeccess';
     }*/

        (new IdMustBePositiveInt())->goCheck();

        /*try {
            $banner = BannerModel::getBannerById($id);
        } catch (\Exception $ex) {
            $error = [
                'error-code' => 10001,
                'msg' => $ex->getMessage()
            ];
            return json($error,400);
        }*/

        $banner = BannerModel::getBannerById($id);
        if(!$banner){
//           throw new Exception('内部错误');
            throw new BannerMissException();
        }
        return $banner;
    }


}