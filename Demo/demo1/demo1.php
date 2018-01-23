<?php

// 递归
function Add($num)
{
    switch ($num) {
        case 1:
            return $num;
        default:
            return $num + Add($num - 1);
    }
}

//尾递归
function Add2($num, $result = 0)
{
    switch ($num) {
        case 0:
            return $result;
        default:
            return Add2($num - 1, $result + $num);
    }
}

//迭代
function Add3($num)
{
    $result = 0;
    while ($num != 0) {
        $result += $num;
        $num--;
    }
    return $result;
}

//回调
function Add4($callback, $num)
{
    $result = call_user_func_array($callback, $num);
    while (is_callable($result)) {
        $result = $result();
    }
    return $result;
}

function AddFunc($num, $result = 0)
{
    if ($num == 0) {
        return $result;
    }
    return function () use ($num, $result) {
        return AddFunc($num - 1, $result + $num);
    };
}

echo Add(5) . "<br>";
echo Add2(5) . "<br>";
echo Add3(5) . "<br>";
//echo Add(10000). "<br>";
echo Add4('AddFunc', [100000]) . "<br>";
