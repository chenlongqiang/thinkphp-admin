<?php
/**
 * Created by PhpStorm.
 * User: 1543
 * Date: 16/9/12
 * Time: 上午11:42
 */

function pr($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

function dd($data)
{
    pr($data);
    exit;
}

/**
 * 问候机...
 * @return string
 */
function hello()
{
    $h = date('H');
    if (6 <= $h && $h < 12) {
        return '早上好';
    } elseif (12 <= $h && $h < 18) {
        return '下午好';
    } else {
        return '晚上好';
    }
}

/**
 * session 函数包装,方便修改为redis等扩展
 * @param $key
 * @param $value
 */
function set_session($key, $value)
{
    return session($key, $value);
}

/**
 * @param $key
 */
function get_session($key)
{
    return session($key);
}

/**
 * @param $key
 */
function del_session($key)
{
    return session($key, null);
}

/**
 * 调用ThinkPHP Page类生成分页view
 * @param $count
 * @param int $page_size
 * @param array $params
 * @return string
 */
function get_page($count, $page_size = 10, $params = array())
{
    $page = new \Think\Page($count, $page_size);
    $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% ');
    foreach($params as $key=>$val) {
        $page->parameter[$key]   =   urlencode($val);
    }
    return $page->show();
}

/**
 * 以日期为文件的一个简单错误日志
 * @param $info
 */
function simple_error_log($info)
{
    simple_log($info, 'error');
}

/**
 * 以日期为文件的一个简单信息日志
 * @param $info
 */
function simple_info_log($info)
{
    simple_log($info, 'info');
}

/**
 * 以日期为文件的一个简单日志
 * 默认注入key = 0的固定信息,目前仅包含时间
 * @param $info
 */
function simple_log($info, $type)
{
    $dir = APP_ROOT.'/Application/Runtime/SimpleLog/';
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
    if (!is_array($info)) {
        $info = array($info);
    }
    //日记时录,时间注入
    array_unshift($info, array('time' => date('Y-m-d H:i:s')));
    file_put_contents($dir.$type.'-log-'.date('Y-m-d'), var_export($info, true).PHP_EOL, FILE_APPEND);
}

/**
 * Get an item from an array using "dot" notation.
 *
 * @param  array   $array
 * @param  string  $key
 * @param  mixed   $default
 * @return mixed
 * @author 1543
 */
function array_get($array, $key, $default = null)
{
    if (is_null($key)) return $array;

    if (isset($array[$key])) return $array[$key];

    foreach (explode('.', $key) as $segment)
    {
        if ( ! is_array($array) || ! array_key_exists($segment, $array))
        {
            return value($default);
        }

        $array = $array[$segment];
    }

    return $array;
}

/**
 * Set an array item to a given value using "dot" notation.
 *
 * If no key is given to the method, the entire array will be replaced.
 *
 * @param  array   $array
 * @param  string  $key
 * @param  mixed   $value
 * @return array
 * @author 1543
 */
function array_set(&$array, $key, $value)
{
    if (is_null($key)) return $array = $value;

    $keys = explode('.', $key);

    while (count($keys) > 1)
    {
        $key = array_shift($keys);

        // If the key doesn't exist at this depth, we will just create an empty array
        // to hold the next value, allowing us to create the arrays to hold final
        // values at the correct depth. Then we'll keep digging into the array.
        if ( ! isset($array[$key]) || ! is_array($array[$key]))
        {
            $array[$key] = array();
        }

        $array =& $array[$key];
    }

    $array[array_shift($keys)] = $value;

    return $array;
}

/**
 * Remove one or many array items from a given array using "dot" notation.
 *
 * @param  array  $array
 * @param  array|string  $keys
 * @return void
 */
function array_forget(&$array, $keys)
{
    $original =& $array;

    foreach ((array) $keys as $key)
    {
        $parts = explode('.', $key);

        while (count($parts) > 1)
        {
            $part = array_shift($parts);

            if (isset($array[$part]) && is_array($array[$part]))
            {
                $array =& $array[$part];
            }
        }

        unset($array[array_shift($parts)]);

        // clean up after each pass
        $array =& $original;
    }
}

/**
 * Get a value from the array, and remove it.
 *
 * @param  array   $array
 * @param  string  $key
 * @param  mixed   $default
 * @return mixed
 */
function array_pull(&$array, $key, $default = null)
{
    $value = array_get($array, $key, $default);

    array_forget($array, $key);

    return $value;
}

/**
 * Pluck an array of values from an array.
 *
 * @param  array   $array
 * @param  string  $value
 * @param  string  $key
 * @return array
 */
function array_pluck($array, $value, $key = null)
{
    $results = array();

    foreach ($array as $item)
    {
        $itemValue = is_object($item) ? $item->{$value} : $item[$value];

        // If the key is "null", we will just append the value to the array and keep
        // looping. Otherwise we will key the array using the value of the key we
        // received from the developer. Then we'll return the final array form.
        if (is_null($key))
        {
            $results[] = $itemValue;
        }
        else
        {
            $itemKey = is_object($item) ? $item->{$key} : $item[$key];

            $results[$itemKey] = $itemValue;
        }
    }

    return $results;
}

/**
 * Return the default value of the given value.
 *
 * @param  mixed  $value
 * @return mixed
 */
function value($value)
{
    return $value instanceof Closure ? $value() : $value;
}

/**
 * array_column 实现
 */
if(!function_exists('array_column'))
{
    function array_column($array, $key, $index = null)
    {
        return array_pluck($array, $key, $index);
    }
}

/**
 * 获得当前格林威治时间的时间戳
 * @return  integer
 */
function gmt_time()
{
    return date('Y-m-d H:i:s');
}

/**
 * 身份证隐私处理
 * 1.旧身份证15位,新身份证18位
 * 2.规则:前六，后四显示，中间隐藏
 * @param $card
 * @return mixed
 */
function card_privacy($card)
{
    $len = strlen($card);
    switch ($len) {
        case 15:
            $result = substr_replace($card, '*****', 6, 5);
            break;
        case 18:
            $result = substr_replace($card, '********', 6, 8);
            break;
        default:
            $result = $card;
            break;
    }
    return $result;
}

/**
 * 手机号隐私处理
 * @param $tel
 * @return mixed
 */
function tel_privacy($tel)
{
    return strlen($tel) == 11 ? substr_replace($tel,'****',3,4) : $tel;
}

/**
 * 保留两位小数 输出
 * @param type $number
 * @param type $isRound 默认false 不会四舍五入
 * @return type
 */
function point_two_num($number, $isRound = false)
{
    if ($isRound != false) {    //四舍五入版
        $res = sprintf("%.2f", $number);
    } else {                    //不会四舍五入版
        $res = sprintf("%.2f", substr(sprintf("%.3f", $number), 0, -1));
    }
    return $res;
}

/**
 *数字金额转换成中文大写金额的函数
 *String Int  $num  要转换的小写数字或小写字符串
 *return 大写字母
 *小数位为两位
 **/
function get_amount($num){
    $c1 = "零壹贰叁肆伍陆柒捌玖";
    $c2 = "分角元拾佰仟万拾佰仟亿";
    $num = round($num, 2);
    $num = $num * 100;
    if (strlen($num) > 10) {
        return false;
//        return "数据太长，没有这么大的钱吧，检查下";
    }
    $i = 0;
    $c = "";
    while (1) {
        if ($i == 0) {
            $n = substr($num, strlen($num)-1, 1);
        } else {
            $n = $num % 10;
        }
        $p1 = substr($c1, 3 * $n, 3);
        $p2 = substr($c2, 3 * $i, 3);
        if ($n != '0' || ($n == '0' && ($p2 == '亿' || $p2 == '万' || $p2 == '元'))) {
            $c = $p1 . $p2 . $c;
        } else {
            $c = $p1 . $c;
        }
        $i = $i + 1;
        $num = $num / 10;
        $num = (int)$num;
        if ($num == 0) {
            break;
        }
    }
    $j = 0;
    $slen = strlen($c);
    while ($j < $slen) {
        $m = substr($c, $j, 6);
        if ($m == '零元' || $m == '零万' || $m == '零亿' || $m == '零零') {
            $left = substr($c, 0, $j);
            $right = substr($c, $j + 3);
            $c = $left . $right;
            $j = $j-3;
            $slen = $slen-3;
        }
        $j = $j + 3;
    }

    if (substr($c, strlen($c)-3, 3) == '零') {
        $c = substr($c, 0, strlen($c)-3);
    }
    if (empty($c)) {
        return "零元整";
    }else{
        return $c . "整";
    }
}

/**
 * 递归返回转义值
 * @param array || string
 * @return array || string
 */
function hs($value){
    if (is_array($value)) {
        foreach ($value as $key => $val) {
            $value[$key] = hs($val);
        }
        return $value;
    } else {
        return htmlspecialchars($value, ENT_QUOTES);
    }
}

/**
 * 生成checkbox html代码
 * @param array || string
 * @param string
 * @return string
 */
function input_checked($value, $key){
    if (is_array($value)) {
        return (in_array($key, $value))? 'checked': '';
    } elseif (($key === "" && $value !== "") || ($key !== "" && $value === "")) {
        return "";
    } else {
        return ($value == $key)? 'checked': '';
    }
}

/**
 * 生成select html代码
 * @param array || string
 * @param string
 * @return string
 */
function option_selected($value, $key){
    if (is_array($value)) {
        return (in_array($key, $value))? 'selected': '';
    } elseif (($key === "" && $value !== "") || ($key !== "" && $value === "")) {
        return "";
    } elseif ($value === null || $key === null) {
        return "";
    } else {
        return ($value == $key)? 'selected': '';
    }
}

/**
 * 生成二维码
 * @param $text
 * @param bool $outfile
 * @param int $level
 * @param int $size
 * @param int $margin
 * @param bool $saveandprint
 * @return bool || string
 */
function create_qrcode($text, $outfile = false, $level = 0, $size = 3, $margin = 4, $saveandprint=false)
{
    $qr_path = "./Public/upload/qrcode/".date('Ymd').'/';
    $file_path = $qr_path.$outfile;
    if ($outfile !== false &&  is_file($file_path)) return ltrim($file_path,'.');
    if (!is_dir($qr_path)) mkdir($qr_path,0777,true);
    vendor('phpqrcode.phpqrcode');
    \QRcode::png($text, $file_path, $level, $size, $margin, $saveandprint);
    if ($outfile === false || !is_file($file_path)) return false;
    return ltrim($file_path,'.');
}

//获取请求头
function get_all_headers() {
    $headers = array();
    foreach ($_SERVER as $name => $value) {
        if (substr($name, 0, 5) == 'HTTP_') {
            $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
        }
    }
    return $headers;
}

/**
 *检查用户手机号码
 * 
 * @param string $phone 手机号码
 *
 * @return string
 */
function checkPhone($phone)
{
    $partner = '';
    if (!$phone) {
        E("用户手机号码不能为空");
    } else if (!preg_match($partner, $phone)) {
        E("手机号码格式不正确");
    } else {
        return $phone;
    }
}

/**
 *检查短信验证码
 *
 * @param string $verify 短信验证码
 *
 * @return string
 */
function checkVerify($verify)
{
    $partner = '';
    if (!$verify) {
        E("短信验证码不能为空");
    } else if (!preg_match($partner, $verify)) {
        E("短信验证码格式不正确");
    } else {
        return $verify;
    }
}

/**
 *检查密码
 *
 * @param string $password 密码
 *
 * @return string
 */
function checkPassword($password)
{
    $partner = '';
    if (!$password) {
        E("密码不能为空");
    } else if (!preg_match($partner, $password)) {
        E("密码格式不正确");
    } else {
        return $password;
    }
}

/**
 * 错误输出
 * @param int $type 类型
 */
function JrError($type, $msg) {
    $ret['code'] = $type;
    $ret['msg'] = $msg;
    return $ret;
}

/**
 * 成功输出
 * @param type $param
 * @return type
 */
function JrSuccess($param) {
    $ret['code'] = JR_SUCCESS;
    $ret['data'] = $param;
    return $ret;
}

/**
 * 跳转
 * @param type $param
 * @return type
 */
function JrLocation($param) {
    $ret['code'] = JR_LOCATION;
    $ret['data'] = $param;
    return $ret;
}