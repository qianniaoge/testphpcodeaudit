<?php
global $DB, $mao;
require '../../Mao/common.php';

// 输出的文件类型为excel
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment;filename=未发货订单_" . date("Ymd_His") . ".xls");
header("Cache-Control: max-age=0");

// 查询未发货订单
$sql = "M_id='{$mao['id']}' and zt = 0";
if ($mao['id'] == 1) {
    $sql = "zt = 0";
}
$result = $DB->query("SELECT id, xm, sjh, dz, xxdz, name FROM mao_dindan WHERE {$sql} LIMIT 1, 10000");

// 报表数据
$ReportArr = array(
    array('ID', '商品', '收件人', '手机号', '地址'),
);

// 将查询结果放入 $ReportArr 中
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $address = $row['dz'] . ' ' . $row['xxdz'];
        $ReportArr[] = array(
            $row['id'],
            $row['name'],
            $row['xm'],
            $row['sjh'],
            $address
        );
    }
} else {
    $ReportArr[] = array('没有找到【未发货订单】', '', '', '', '');
}

// 计算每列的最大宽度
$maxWidths = array_fill(0, count($ReportArr[0]), 0);
foreach ($ReportArr as $row) {
    foreach ($row as $index => $cell) {
        $maxWidths[$index] = max($maxWidths[$index], mb_strlen($cell, 'UTF-8'));
    }
}

// 生成HTML表格
echo '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">';
echo '<head>';
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
echo '</head>';
echo '<body>';
echo '<table border="1" style="border-collapse:collapse;">';

// 表头样式
echo '<tr>';
foreach ($ReportArr[0] as $index => $header) {
    $width = $maxWidths[$index] * 0.7; // 乘以1.2，增加一点宽度
    echo '<th style="background-color: #CCCCCC; font-weight: bold; padding: 5px; height: 2em; width: ' . $width . 'em;">' . htmlspecialchars($header) . '</th>';
}
echo '</tr>';

// 数据行样式
for ($i = 1; $i < count($ReportArr); $i++) {
    echo '<tr>';
    foreach ($ReportArr[$i] as $index => $cell) {
        $width = $maxWidths[$index] * 0.7;
        echo '<td style="padding: 5px; height: 1.5em; width: ' . $width . 'em;">' . htmlspecialchars("=\"{$cell}\"") . '</td>';
    }
    echo '</tr>';
}

echo '</table>';
echo '</body>';
echo '</html>';
exit;
?>
