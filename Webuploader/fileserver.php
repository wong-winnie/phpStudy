<?php

function extend($file_name)
{
    $extend = pathinfo($file_name);
    $extend = strtolower($extend["extension"]);
    return $extend;
}

$code      = 0;
$uploadimg = '';
$path      = './upload/';

if ($_FILES['file']['error'] != 0) {
    //错误信息说明 : http://php.net/manual/zh/features.file-upload.errors.php
    $code = $_FILES['file']['error'];
} else {

    $ext = extend($_FILES['file']['name']);    //设置文件上传域的name   fileVal: 'file'
    if (!file_exists($path))
        mkdir($path, 0777);

    $imgname = time() . rand(100, 999) . '.' . $ext;
    $tmp     = $_FILES['file']['tmp_name'];
    if (move_uploaded_file($tmp, $path . $imgname)) {
        $uploadimg = $imgname;
        @unlink($_FILES['file']);
    };
}

echo json_encode(['code' => $code, 'uploadimg' => $uploadimg]);

