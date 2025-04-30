<?php
// 设置响应头，告诉浏览器这是一个文本文件
global $DB, $mao;
require '../../Mao/common.php';
header('Content-Type: text/plain; charset=utf-8');
header('Content-Disposition: attachment; filename=weifahuo_orders.txt');
header('Pragma: no-cache');
header('Expires: 0');

$sql = "M_id='{$mao['id']}' and zt = 0";
if($mao['id'] == 1){
    $sql = "zt = 0";
}

// 查询未发货订单
$result=$DB->query("SELECT id,xm,sjh, dz,xxdz, name FROM mao_dindan WHERE {$sql} limit 1, 10000");

// 创建一个输出流
$output = fopen('php://output', 'w');

// 写入文件头部
fwrite($output, "ID\t收件人\t手机号\t\t地址\t\t详细地址\t\t\t\t商品\n");

// 写入数据
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fwrite($output, implode("\t", $row) . "\n");
    }
} else {
    fwrite($output, "没有找到【未发货订单】\n");
}

// 关闭输出流
fclose($output);
?>
