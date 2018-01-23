<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>留言板内容</title>
    <link rel="stylesheet" href="<?php echo __STATIC_PATH__ ?>/css/global.css">
    <link rel="stylesheet" href="<?php echo __STATIC_PATH__ ?>/css/zone.css">
</head>
<body>
<div class="con-wrap white container wrapper">

    <div class="breadcrumb">
        <?php echo $data['title'] ?>
    </div>

    <div class="breadcrumb">
        时间：<?php echo date('Y-m-d H:i', $data['time']) ?> 　阅读数：<?php echo $data['viewnum'] ?>
    </div>

    <div class="editor-wrap">
        <br/>
        <div class="editor">
            <?php echo $data['content'] ?>
        </div>
        <input type="button" value="返回" onclick="location='<?php echo \think\Url::build('index') ?>'">
    </div>

</div>
</body>
</html>
