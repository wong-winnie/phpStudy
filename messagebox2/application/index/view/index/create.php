<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>写言板</title>
    <link rel="stylesheet" href="<? echo __STATIC_PATH__ ?>/css/global.css">
    <link rel="stylesheet" href="<?php echo __STATIC_PATH__ ?>/css/zone.css">
</head>
<body>
<div class="con-wrap white container wrapper">

    <form action="<?php echo \think\Url::build('createform') ?>" method="post">
        <div class="editor-wrap">
            <input name="title" class="title" type="text" placeholder="标题">
            <textarea name="content" class="editor" placeholder="内容"></textarea>
            <div class="btn-wrap">
                <input type="submit" class="confirm" value="发表">
                <input type="button" class="cancel" value="取消" onclick="location='<?php echo \think\Url::build('index') ?>'">
            </div>
        </div>
    </form>

</div>
</body>
</html>
