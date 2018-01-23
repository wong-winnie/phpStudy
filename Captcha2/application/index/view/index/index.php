<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <img src="<?php echo \think\Url::build('doCaptcha') ?>" onclick="this.src='<?php echo \think\Url::build('doCaptcha', [], false) ?>/_/'+Math.random()+'.html'">
</body>
</html>