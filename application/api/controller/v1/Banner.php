<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/2/24
 * Time: 20:41
 */

namespace app\api\controller\v1;

//use think\validate;
use think\facade\Validate;

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
        $validate = Validate::make([
            'name' => 'require|max:10',
            'email' => 'email'
        ]);

        $data = [
            'name' => 'thinkphpkkkkkkk',
            'email' => 'thinkphpqq.com'
        ];

      /*  var_dump($data);
         $sum = $id + 1;
        echo $sum;*/
        $result = $validate->batch()->check($data);
        var_dump($validate->getError());
     /*   echo xdebug_time_index();
        for ($i = 0; $i < 250000; $i++){
            // do nothing
        }
        echo "<br>". xdebug_time_index();*/
    }
}