<?php
function getClientIP()
{
    $ip = 'unknow';
    $list = array(
        'HTTP_CLIENT_IP',
        'HTTP_X_FORWARDED_FOR',
        'HTTP_X_FORWARDED',
        'HTTP_X_CLUSTER_CLIENT_IP',
        'HTTP_FORWARDED_FOR',
        'HTTP_FORWARDED',
        'REMOTE_ADDR');
    foreach ($list as $key) {
        if (array_key_exists($key, $_SERVER)) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                $ip = trim($ip);
                //会过滤掉保留地址和私有地址段的IP，例如 127.0.0.1会被过滤
                //也可以修改成正则验证IP
                if ((bool)filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                    return $ip;
                }
            }
        }
    }
    if ($ip == '::1') {
        //本地
        $ip = '127.0.0.1';
    }
    return $ip;
}

function getSign($obj, $key)
{
    $sign_content = "";
    ksort($obj);
    foreach ($obj as $k => $v) {
        if ($v !== '' && !in_array($k, ['sign', 'code', 'msg'])) {
            $sign_content .= $k.'='.$v.'&';
        }
    }
    $sign_content .= 'key='.$key;
    $sign = md5($sign_content);
    return $sign;
}

function curl_http($url, $isPostRequest = false, $data = [], $header = [], $certParam = [])
{ // 模拟提交数据函数
    $curlObj = curl_init(); // 启动一个CURL会话
    //如果是POST请求
    if ($isPostRequest) {
        curl_setopt($curlObj, CURLOPT_POST, 1); // 发送一个常规的Post请求
        curl_setopt($curlObj, CURLOPT_POSTFIELDS, http_build_query($data)); // Post提交的数据包
    } else {  //get请求检查是否拼接了参数，如果没有，检查$data是否有参数，有参数就进行拼接操作
        $getParamStr = '';
        if (!empty($data) && is_array($data)) {
            $tmpArr = [];
            foreach ($data as $k => $v) {
                $tmpArr[] = $k.'='.$v;
            }
            $getParamStr = implode('&', $tmpArr);
        }
        //检查链接中是否有参数
        $url .= strpos($url, '?') !== false ? '&'.$getParamStr : '?'.$getParamStr;
    }
    curl_setopt($curlObj, CURLOPT_URL, $url); // 要访问的地址
    //检查链接是否https请求
    if (strpos($url, 'https') !== false) {
        //设置证书
        if (!empty($certParam) && isset($certParam['cert_path']) && isset($certParam['key_path'])) {
            curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
            curl_setopt($curlObj, CURLOPT_SSL_VERIFYHOST, 2); // 从证书中检查SSL加密算法是否存在
            //设置证书
            //使用证书：cert 与 key 分别属于两个.pem文件
            curl_setopt($curlObj, CURLOPT_SSLCERTTYPE, 'PEM');
            curl_setopt($curlObj, CURLOPT_SSLCERT, $certParam['cert_path']);
            curl_setopt($curlObj, CURLOPT_SSLKEYTYPE, 'PEM');
            curl_setopt($curlObj, CURLOPT_SSLKEY, $certParam['key_path']);
        } else {
            curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
            curl_setopt($curlObj, CURLOPT_SSL_VERIFYHOST, 0); // 从证书中检查SSL加密算法是否存在
        }
    }
    // 模拟用户使用的浏览器
    if (isset($_SERVER['HTTP_USER_AGENT'])) {
        curl_setopt($curlObj, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    }
    curl_setopt($curlObj, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
    curl_setopt($curlObj, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
    curl_setopt($curlObj, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
    curl_setopt($curlObj, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
    curl_setopt($curlObj, CURLOPT_HTTPHEADER, $header);   //设置头部
    curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
    $result = curl_exec($curlObj); // 执行操作
    if (curl_errno($curlObj)) {
        $result = 'error: '.curl_error($curlObj);//捕抓异常
    }
    curl_close($curlObj); // 关闭CURL会话
    return $result; // 返回数据，json格式
}

$baseUrl = 'https://api.qianyizhifu.vip/gateway/payment';
$key = '117fcf6786e14750bc10590970d38fd0';
$params = [
    'mch_id' => 'M1OBHN2U4G',
    'service' => '3004',
    'out_trade_no' => '202332021022312122312',
    'total_fee' => '1000',  // 10元
    'body' => '苹果xr 256G 黑色',
    'client_ip' => getClientIP(),
    'notify_url' => 'https://abc.com/payment/notify',
    'return_url' => 'https://abc.com/payment/return',
];
$params['sign'] = getSign($params, $key);
$res = curl_http($baseUrl, true, $params);
$resArr = json_decode($res, true);
if (isset($resArr['code']) && $resArr['code'] === 'success') {
    $jumpUrl = $resArr['code_url'];
    header("Location: ".$jumpUrl);
} else {
    echo $resArr['code'];
}






