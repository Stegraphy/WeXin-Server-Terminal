<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/2/24
 * Time: 20:41
 */

namespace app\api\controller\v1;


class Banner
{
    /**
     * 获取指定的id的Banner信息
     * @url /banner/:id
     * @http GET
     * @id banner的id号
     */
    public function getBanner($id){
        echo $id;
    }
}