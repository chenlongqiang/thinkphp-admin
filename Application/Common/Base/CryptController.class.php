<?php
namespace Common\Base;

use Think\Controller;

class CryptController extends Controller
{
    
    /*
     * 加密
     * $param 明文(字符串or数组)
     * @author 629
     */
    public function encryption($param) {
        if(!$param){
            return false;
        }
        //加密
        $str = $param;
        $Crypt = new CryptService(C('API.SECRET_KEY_GAME'), C('API.SECRET_MODEL_GAME'));
        $m_str = $Crypt->encrypt(json_encode($str));
        if($m_str){
            return $m_str;
        }else{
            return false;
        }
    }
    
    /*
     * 解密
     * $param 密文（字符串）
     * @author 629
     */
    public function decryption($param) {
        if(!$param){
            return false;
        }
        //解密
        $m_str = $param;
        $Crypt = new CryptService(C('API.SECRET_KEY_GAME'), C('API.SECRET_MODEL_GAME'));
        $str = json_decode($Crypt->decrypt($m_str),true);
        if($str){
            return $str;
        }else{
            return false;
        }
    }
    
    /**
     * 301跳转
     * @param type $url
     * @return boolean
     */
    public function header301($url) {
        if (empty($url)) {
            return false;
        }
        header('HTTP/1.1 301 Moved Permanently');
        header('Location:' . $url);
        exit;
    }
}
