<?php
//设定用于一个脚本中所有日期时间函数的默认时区
if (function_exists('date_default_timezone_set')) {
    date_default_timezone_set('PRC');
}

function post_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$year  = isset($_GET["y"]) ? post_input($_GET["y"]) : date("Y");
$month = isset($_GET["m"]) ? post_input($_GET["m"]) : date("m");

if ($month > 12) {
    $month = 1;
    $year++;
} elseif ($month < 0) {
    $month = 12;
    $year--;
}

$t     = strtotime("$year-$month-1");
$last  = date('t', strtotime('-1 month', $t));
$start = date('w', $t) ? range($last - date('w', $t) + 1, $last) : range($last - 6, $last);
$days  = range(1, date('t', $t));
$end   = range(1, 6 * 7 - count($start) - count($days));

$daytable = "<tr>";

$w = 1;
for ($i = 0; $i < count($start); $i++) {
    if ($w % 7 == 0) {
        $daytable .= "<td data-title='up' onclick='alert(1);'>$start[$i]</td></tr><tr>";
    } else {
        $daytable .= "<td data-title='down' onclick='alert(1);'>$start[$i]</td>";
    }
    $w++;
}

for ($i = 0; $i < count($days); $i++) {
    if ($w % 7 == 0) {
        $daytable .= "<td>$days[$i]</td></tr><tr>";
    } else {
        $daytable .= "<td>$days[$i]</td>";
    }
    $w++;
}

for ($i = 0; $i < count($end); $i++) {
    if ($w % 7 == 0) {
        $daytable .= "<td style='color:#898989' data-title='last' onclick='alert(1);'>$end[$i]</td></tr><tr>";
    } else {
        $daytable .= "<td style='color:#898989' data-title='last' onclick='alert(1);'>$end[$i]</td>";
    }
    $w++;
}

$daytable .= "<tr/></tbody></table>";

?>

<!DOCTYPE html>
<html >
<head lang="en" >
    <meta charset="UTF-8" >
    <title ></title >
    <style type="text/css" >
        td {
            text-align: center;
        }

        td[data-title='last'] {
            color: #898989;
            cursor: pointer;
            background: #fdf5ce none repeat scroll 0 0;
        }

        td:hover {
            position: relative;
        }

        td[data-title='last']:hover:before {
            content: attr(data-title);
            position: absolute;
            left: 5px;
            top: 100%;
            background: #ff8403 none repeat scroll 0 0;
            color: #99FFFF;
            width: 70px;
            height: 30px;
            line-height: 30px;
            border-radius: 5px;
            box-shadow: 3px 3px 3px #666666;
        }
    </style >
</head >
<body >
<table >

    <thead >
    <tr align='center' >
        <th colspan='1' >
            <a href='demo2.php?y=<?php echo $year ?>&m=<?php echo $month - 1 ?>' >上一月</a >
        </th >
        <th colspan='5' ><?php echo $year ?>年<?php echo $month ?>月份</th >
        <th colspan='1' >
            <a href='demo2.php?y=<?php echo $year ?>&m=<?php echo $month + 1 ?>' >下一月</a >
        </th >
    </tr >
    </thead >

    <tbody >

    <tr >
        <td >星期日</td >
        <td >星期一</td >
        <td >星期二</td >
        <td >星期三</td >
        <td >星期四</td >
        <td >星期五</td >
        <td >星期六</td >
    </tr >

    <?php echo $daytable ?>

    </tbody >
</table >
</body >
</html >