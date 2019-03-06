<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/2/24
 * Time: 20:41
 */

namespace app\api\controller\v2;

//use think\validate;
use app\api\validate\TestValidate;

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

        return 'This is Version';

    }


}