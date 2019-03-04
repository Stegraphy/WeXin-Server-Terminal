<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/2/26
 * Time: 20:07
 */

namespace app\api\model;




use think\Db;
use think\Exception;

class Banner
{
    public static function getBannerById($id){
        //根据Banner的ID获取Banner信息
//        try{
//            1 / 0;
//        }catch (Exception $ex){
//            //TODO:可以记录日志
//            throw $ex;
//        }
//        return 'This is Banner Info';
//        return null;
//查询数据库的三种模模式1.原型2.构造器3.模型
//        $result = Db::query('select * from banner_item where banner_id=?',[$id]);
//        var_dump($result);
//        return $result;
        $result = Db::table('banner_item')->where('banner_id','=',$id)
            ->select();
        //find（）函数只返回一维数组，一条数据，select（）函数返回二维数组，两条数据
//           update()
//           delete()
//           insert()
        return $result;
    }

}