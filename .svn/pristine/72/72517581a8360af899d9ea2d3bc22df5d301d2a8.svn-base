<?php

namespace Wechat\Logic;

use Common\Logic\CommonLogic;
use Org\old\Redismem;

class MsgLogic extends CommonLogic
{

    public function __construct()
    {
        $file = APP_PATH . 'Wechat/Lang/' . LANG_SET . '/tpl.php';
        if(is_file($file)) {
            L(include $file);
        }
    }

    public function index($request, $userinfo, &$header)
    {
        
    }

    public function send($openid, $templateId, $template, $url = '')
    {
        if(!$openid || !$templateId || !$template) {
            return;
        }
        $tpl = L("WECHAT_TPL_$templateId");
        foreach ($tpl['data'] as $key => &$value) {
            if (is_array($template[$key])) {
                foreach ($template[$key] as $k => $v) {
                    $replace = str_replace('{$' . $k . '}', $template[$key][$k], $value['value']);
                    $value['value'] = $replace ? $replace : $value['value'];
                }
            } else {
                $replace = str_replace('{$' . $key . '}', $template[$key], $value['value']);
                $value['value'] = $replace ? $replace : $value['value'];
            }
        }
        try {
            $data = D('Wechat/WechatAuth', 'Service')->messageTemplateSend($openid, $tpl['id'], $url, $tpl['topcolor'], $tpl['data']);
            return [];
        } catch (\Exception $e) {
            
        }
    }

}
