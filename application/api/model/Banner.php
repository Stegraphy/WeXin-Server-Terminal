<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/2/26
 * Time: 20:07
 */

namespace app\api\model;




use think\Db;
use think\Model;

class Banner extends Model
{
//    protected $table = 'category'; 默认table表为Banner类名
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
        //find（）函数只返回一维数组，一条数据，select（）函数返回二维数组，两条数据
//           update()
//           delete()
//           insert()
        //非链式写法
//        Db::table('banner_item');
//        Db::where('banner_id','=',$id);
//        $result = Db::select();

        //条件查询的三种方法：表达式法、数组法、闭包法
        //where(‘字段名','表达式’，‘查询条件’）缺省表达式默认是=
        /*$result = Db::table('banner_item')->where('banner_id','=',$id)
            ->select(); */ //链式写法
        //闭包写法：
        $result = Db::table('banner_item')
//            ->fetchSql()
            ->where(function ($query) use ($id){
                $query->where('banner_id','=',$id);
            })->select();
        //ORM Object Relation Mapping 对象关系映射 模型与关联
        return $result;
    }

}