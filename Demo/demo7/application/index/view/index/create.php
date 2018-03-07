<!DOCTYPE html>
<html lang="en" >
<head >
    <meta charset="UTF-8" >
    <title >写言板</title >
    <!--    <link rel="stylesheet" href="--><? // echo __STATIC_PATH__ ?><!--/css/global.css">-->
    <link rel="stylesheet" href="<?php echo __STATIC_PATH__ ?>/css/zone.css" >
    <script src="<?php echo __STATIC_PATH__ ?>/js/jquery-1.8.0.js" ></script >
</head >
<body >
<div class="con-wrap white container wrapper" >

    <form >
        <div class="editor-wrap" >
            <input id="title" class="title" type="text" placeholder="标题" >
            <textarea id="content" class="editor" placeholder="内容" ></textarea >
            <div class="btn-wrap" >
                <input type="button" class="confirm" value="发表" >
                <input type="button" class="cancel" value="取消" onclick="location='<?php echo \think\Url::build('index') ?>'" >
            </div >
        </div >
    </form >

</div >

<script >
    $("input[class='confirm']").click(function () {

        var title = $("#title").val();
        var content = $("#content").val();

        $.post("<?php echo \think\Url::build('createform') ?>", {title: title, content: content}, function (data) {
            data = jQuery.parseJSON(data);

            if (data.code == 0) {
                alert('添加成功');
            } else {
                alert(data.msg);
            }
        })
    });
</script >

</body >
</html >
