<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/2/27
 * Time: 17:59
 */

namespace app\lib\exception;



use Exception;
use think\exception\Handle;
use think\facade\Log;
use think\facade\Request;


class ExceptionHandler extends Handle
{
    private $code;
    private $msg;
    private $errorCode;
    //需要返回客户端当前请求的URL地址路径
    public function render(Exception $e)
    {
//        return parent::render($e); // TODO: Change the autogenerated stub
        if($e instanceof BaseException){
            //如果是自定义异常
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        }else{
            if(config('app_debug')){
                return parent::render($e);
            }else{
                $this->code = 500;
                $this->msg = '服务器内部错误，不想让你看见';
                $this->errorCode=999;
//            Log::write('测试日志1');
                $this->recordErrorLog($e);
            }

        }
        $request = Request::instance();
        $result = [
            'msg' => $this->msg,
            'error_code' => $this->errorCode,
            'request_url' => $request->url()
        ];
        return json($result,$this->code);
    }

    private function recordErrorLog(Exception $e){
    /*  Log::init([
           // 日志记录方式，内置 file socket 支持扩展
           'type'        => 'File',
           // 日志保存目录
           'path'        =>__DIR__ .'/../logs/',
           // 日志记录级别
           'level'       => ['error'],
           // 单文件日志写入
           'single'      => false,
           // 独立日志级别
           'apart_level' => [],
           // 最大日志文件数量
           'max_files'   => 0,
           // 是否关闭日志写入
           'close'       =>false,
       ]);*/
//        Log::record($e->getMessage(),'error');
        Log::write($e->getMessage(),'error');
    }

}