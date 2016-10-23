<?php
/**
 * Created by PhpStorm.
 * User: 1543
 * Date: 2016/7/13
 * Time: 17:45
 */

//开启API模拟
define('API_MOCK', true);

//应用初始化
require ("../index.php");

//配置项
$config = [
    'api_url_mapper' => [
        '172.20.0.50' => 'http://172.20.0.50/testapi/',
        '172.20.90.10' => 'http://172.20.90.10'
    ],
    'token' => C('API.AUTH_KEY'),
    'version' => '1.0.1',
    'platform' => '1',
    't' => time(),
    'nonce' => rand(100000, 999999),
    'ip' => getClientIp(),
    'uuid' => $_COOKIE['uuid'], //登录后赋值
    'uid' => $_COOKIE['uid']    //登录后赋值
];

//数据接收
$ori_data = I('post.');

//api request
switch ($ori_data['Command']) {
    //reset
    case 'reset':
        $response = [
            'Msg' => '数据已重置'
        ];
        unset($ori_data);
        break;
    //登录
    case '1005':
        //生成uuid
        $response = login($ori_data, $config);
        unset($ori_data);
        break;
    //登出
    case '1039':
        if (empty($config['uuid'])) {
            $response = [
                'errorMsg' => '您还未登录，请先登录后使用.'
            ];
            break;
        }
        $response = login_out($ori_data, $config);
        unset($ori_data);
        break;
    //一般接口
    default:
        if (empty($config['uuid'])) {
            $response = [
                'errorMsg' => '您还未登录，请先登录后使用.'
            ];
            break;
        }
        //请求中带上uid
        $ori_data['key'][] = 'uid';
        $ori_data['value'][] = $config['uid'];
        $response = call_api($ori_data, $config);
        break;
}

function login($ori_data, $config)
{
    $uuid = createuniqid();

    //请求中带上uuid
    $ori_data['key'][] = 'uuid';
    $ori_data['value'][] = $uuid;

    //修改config uuid
    $config['uuid'] = $uuid;

    $response = call_api($ori_data, $config);

    //登录记录cookie
    if ($response['status'] == '1') {
        setcookie('uuid', $response['uuid'], time() + 3600);
        setcookie('uid', $response['data']['uid'], time() + 3600);
        setcookie('fullname', $response['data']['fullname'], time() + 3600);
        $_COOKIE['fullname'] = $response['data']['fullname']; //手动赋值一次，否则view需要刷新才生效
    }

    return $response;
}

function login_out($ori_data, $config)
{
    //请求中带上uid
    $ori_data['key'][] = 'uid';
    $ori_data['value'][] = $config['uid'];

    //登出清除cookie
    setcookie('uuid', '', time() - 3600);
    setcookie('uid', '', time() - 3600);
    setcookie('fullname', '', time() - 3600);
    $_COOKIE['fullname'] = ''; //手动赋值一次，否则view需要刷新才生效

    $response = call_api($ori_data, $config);

    return $response;
}

function call_api($ori_data, $config)
{
    $header_format = get_header_format($ori_data['Command'], $config);

    //生成签名
    $sign = sign($header_format, $encrypt_request = encrypt_request($ori_data), $config['token']);

    //组装请求头
    $header_to_send = set_header_to_send($ori_data['Command'], $sign, $config);

    //发送请求
    $host = $_SERVER['HTTP_HOST'];
    $api_url = $config['api_url_mapper'][$host];
    if (empty($api_url)) {
        //如果api地址不在映射表中，则默认取 HTTP_HOST,使用端口的同学自己修改:
        //$api_url = 'http://xxx:88';
        $api_url = $host;
    }
    $response = http($api_url, json_encode(['data' => $encrypt_request]), $header_to_send);

    //response 解密
    return $response = decrypt_response($response);
}

function get_header_format($command, $config)
{
    return [
        'command' => $command,
        'version' => $config['version'],
        'platform' => $config['platform'],
        't' => $config['t'],
        'nonce' => $config['nonce'],
        'ip' => $config['ip'],
        'uuid' => $config['uuid']
    ];
}

function set_header_to_send($command, $sign, $config)
{
    return [
        'Command:' . $command,
        'Version:' . $config['version'],
        'Platform:' . $config['platform'],
        'T:' . $config['t'],
        'Nonce:' . $config['nonce'],
        'Ip:' . $config['ip'],
        'Uuid:' .$config['uuid'],
        'Sign:' . $sign,
    ];
}

function encrypt_request($ori_data)
{
    $cnt = count($ori_data['key']);
    $request = [];
    for ($i = 0; $i < $cnt; $i++) {
        $request[$ori_data['key'][$i]] = $ori_data['value'][$i];
    }

    return \Org\old\ApiCrypt::getInstance()->encrypt(json_encode($request));
}

function sign($header_format, $encrypt_request, $token)
{
    $data = array_change_key_case($header_format);
    $data['data'] = $encrypt_request;
    $data['token'] = $token;
    ksort($data);
    $str = implode('', $data);
    return md5($str);
}

function http($url, $data, $header)
{
    //初始化curl
    $ch = curl_init();
    //设置超时
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    //设置header
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);

//    dd($result);
    //发生错误，抛出异常
    if ($error) {
        dd('die2');
    }
    return $result;
}

function decrypt_response($data)
{
    $data = json_decode($data, true);
    if (empty($data)) {
        dd('die3');
    }
    $decrype = \Org\old\ApiCrypt::getInstance()->decrypt($data['data']);
    return json_decode($decrype, true);
}

if ($response) {
    require ("./view.php");
}

