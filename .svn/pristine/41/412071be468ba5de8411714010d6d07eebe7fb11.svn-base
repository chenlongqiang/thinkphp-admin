<?php
/**
 * Created by PhpStorm.
 * User: 1543
 * Date: 16/9/22
 * Time: 下午3:15
 */

namespace Common\Base;

class ApiJavaCallService
{
    public static function post($url, $data)
    {
        try {
            
//            $result['code'] = empty($result['code']) ? JR_ERROR : $result['code'];
        } catch (\Exception $e) {
            return self::responseError(JR_EXCEPTION_ERROR, $e->getMessage());
        }
    }
    
    private static function responseError($code, $msg = '')
    {
        return self::response('', $code, $msg);
    }

    private static function response($data, $code = JR_SUCCESS, $msg = '')
    {
        return array(
            'code' => $code,
            'msg' => $msg,
            'data' => $data,
        );
    }
}
