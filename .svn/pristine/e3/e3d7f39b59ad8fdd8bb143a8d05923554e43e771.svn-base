<?php

/**
 * 微信网页授权类
 * @author Author: 麦当苗儿
 */

namespace Wechat\Service;

use Common\Service\CommonService;

class WechatOauthService extends CommonService
{

    /**
     * 微信开发者申请的appID
     * @var string
     */
    private $appId = '';

    /**
     * 微信开发者申请的appSecret
     * @var string
     */
    private $appSecret = '';

    /**
     * 获取到的access_token
     * @var string
     */
    private $accessToken = '';

    /**
     * 微信api根路径
     * @var string
     */
    private $requestCodeURL = 'https://open.weixin.qq.com/connect/oauth2/authorize';
    private $oauthApiURL = 'https://api.weixin.qq.com/sns';

    /**
     * 构造方法，调用微信高级接口时实例化SDK
     * @param string $token  获取到的access_token
     */
    public function __construct()
    {
        $this->appId = C('WECHAT.appId');
        $this->appSecret = C('WECHAT.appSecret');
    }

    /**
     * 获取微信网页授权URL
     * @param string $redirect_uri 授权后重定向的回调链接地址，请使用完整的url（包含http）
     * @param string $state 重定向后会带上state参数，开发者可以填写a-zA-Z0-9的参数值，最多128字节
     * @param string $scope 应用授权作用域，snsapi_base （不弹出授权页面，直接跳转，只能获取用户openid），
     * @param string $scope snsapi_userinfo （弹出授权页面，可通过openid拿到昵称、性别、所在地。）
     * @return string 网页授权URL
     */
    public function getRequestCodeURL($redirect_uri, $state = null, $scope = 'snsapi_base')
    {

        $query = array(
            'appid' => $this->appId,
            'redirect_uri' => $redirect_uri,
            'response_type' => 'code',
            'scope' => $scope,
        );

        if (!is_null($state) && preg_match('/[a-zA-Z0-9]+/', $state)) {
            $query['state'] = $state;
        }

        $query = http_build_query($query);
        return "{$this->requestCodeURL}?{$query}#wechat_redirect";
    }

    /**
     * 获取access_token，用于后续接口访问
     * @param null $code
     * @return array|mixed access_token信息，包含 token 和有效期
     * @throws \Exception
     */
    public function getAccessToken($code = null)
    {
        $param = array(
            'appid' => $this->appId,
            'secret' => $this->appSecret,
            'code' => $code,
            'grant_type' => 'authorization_code'
        );


        $token = $this->api('/oauth2/access_token', $param);

        $this->accessToken = $token['access_token'];

        return $token;
    }

    /**
     * 刷新access_token
     * @param type $refreshToken 通过access_token获取到的refresh_token参数
     * @return type
     */
    public function refreshToken($refreshToken)
    {
        $param = array(
            'appid' => $this->appId,
            'grant_type' => 'refresh_token',
            'refresh_token' => $refreshToken
        );

        $token = $this->api('/oauth2/refresh_token', $param);

        $this->accessToken = $token['access_token'];

        return $token;
    }

    /**
     * 检验授权凭证（access_token）是否有效
     * @param type $openid 	用户的唯一标识
     * @param type $accessToken 网页授权接口调用凭证
     * @return type
     */
    public function checkToken($openid, $accessToken)
    {
        $param = array(
            'openid' => $openid,
            'access_token' => $accessToken
        );

        $token = $this->api('/auth', $param);

        return $token;
    }

    /**
     * 获取授权用户信息
     * @param  string $openid 用户的OpenID
     * @param  string $lang   指定的语言
     * @return array          用户信息数据，具体参见微信文档
     */
    public function getUserInfo($openid, $accessToken = '', $lang = 'zh_CN')
    {
        $query = array(
            'access_token' => empty($accessToken) ? $this->accessToken : $accessToken,
            'openid' => $openid,
            'lang' => $lang,
        );

        return $this->api('/userinfo', $query);
    }

    /**
     * 请求微信api接口
     * @param type $name
     * @param type $data
     * @return type
     */
    protected function api($name, $data)
    {
        $url = "{$this->oauthApiURL}{$name}";
        $res = self::http($url, $data);
        return $this->parseReturnData($res);
    }

    /**
     * 对返回结果进行处理
     * @param type $data
     * @return type
     */
    protected function parseReturnData($data)
    {
        $data = json_decode($data, true);
        if (is_array($data)) {
            if (isset($data['errcode']) && $data['errcode'] != '0') {
                $this->error($data['errmsg']);
            } else {
                return $data;
            }
        } else {
            $this->error('E0003');
        }
    }

    /**
     * 发送HTTP请求方法，目前只支持CURL发送请求
     * @param  string $url    请求URL
     * @param  array  $param  GET参数数组
     * @param  array  $data   POST的数据，GET请求时该参数无效
     * @param  string $method 请求方法GET/POST
     * @return array          响应数据
     */
    protected static function http($url, $param, $data = '', $method = 'GET')
    {
        //初始化curl   
        $ch = curl_init();
        //设置超时
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);

        curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($param));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        //设置header
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        if (strtoupper($method) == 'POST' && !empty($data)) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        //发生错误，抛出异常
        if ($error) {
            E($error);
        }
        return $result;
    }

}
