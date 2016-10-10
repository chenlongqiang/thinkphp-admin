<?php

namespace Wechat\Controller;

use Think\Controller;

class IndexController extends Controller 
{

    public function index()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];	
                    
        $token = "jkjr456852";
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);
        
        if ($tmpStr == $signature) {
            echo $_GET['echostr'];
        } else {
            echo "";
        }
    }


}
