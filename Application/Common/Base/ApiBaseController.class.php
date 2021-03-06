<?php

namespace Common\Base;

use Predis\Client;

class ApiBaseController extends CryptController
{
    function __construct()
    {
        parent::__construct();
        if (I('post.cipher')) { //加密
            /*
            $headers = get_all_headers();
            $code = $headers['Code'];
            $code = $this->decryption($code);
            if ($code) {
                $code = $code['code'];
                $key = session_id();
                $key .= $code;
                $redis = new Client();
                $is_repeat = $redis->get($key);
                if ($is_repeat) {
                    $this->apiError(JR_ERROR, '请求过于频繁');
                } else {
                    $redis->set($key, '1', 'ex', 60);
                }
            } else {
                $this->apiError(JR_ERROR, '来源有误');
            }
            */
            $arr = $this->decryption(I('post.cipher'));
            $_POST = array();
            foreach ($arr as $key => $val) {
                $_POST[$key] = $val;
            }
           if ($_FILES) {
               $_POST['image'] = $_FILES;
           }
        } else {
            $_POST = array();
        }
    }


    /**
     * api错误输出
     * @param int $type 类型
     */
    function apiError($type, $msg, $is_encry = true)
    {
        $ret['code'] = $type;
        $ret['msg'] = $msg;
        if ($is_encry) {
            //加密
            $res['cipher'] = $this->encryption($ret);
            $res['is_encry'] = 1;
            $this->ajaxReturn($res);
        } else {
            $this->ajaxReturn($ret);
        }
    }

    /**
     * api错误输出
     * @param int $type 类型
     */
    function apiErrormsg($type, $msg, $is_encry = true)
    {
        $ret['code'] = $type;
        $ret['data'] = $msg;
        if ($is_encry) {
            //加密
            $res['cipher'] = $this->encryption($ret);
            $res['is_encry'] = 1;
            $this->ajaxReturn($res);
        } else {
            $this->ajaxReturn($ret);
        }
    }

    /**
     * api成功输出
     * @param type $param
     * @return type
     */
    function apiSuccess($param, $is_encry = true)
    {
        $ret['code'] = JR_SUCCESS;
        $ret['data'] = $param;
        if ($is_encry) {
            //加密
            $res['cipher'] = $this->encryption($ret);
            $res['is_encry'] = 1;
            $this->ajaxReturn($res);
        } else {
            $this->ajaxReturn($ret);
        }
    }

    /**
     *
     * @param type $json
     * @return boolean
     */
    function jsonDecode($json)
    {
        if (empty($json)) {
            echo '亲，json都没有，你想解析个蛋？';
            $status = false;
            return $status;
        }
        $json = strval($json);
        $arr = json_decode(trim($json, chr(239) . chr(187) . chr(191)), true);    //删除bom头
        return $arr;
    }
    
}
