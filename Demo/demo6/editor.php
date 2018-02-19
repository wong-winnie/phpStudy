<?php
require_once dirname(__FILE__) . '/includes/main.inc.php';

$id   = isset($_GET['id']) ? intval($_GET['id']) : 0;
$data = $db->getOne(sprintf("select * from msg_article where id=%d", $id));
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>写言板</title>
    <link rel="stylesheet" href="common/css/global.css">
    <link rel="stylesheet" href="common/css/zone.css">
</head>
<body>
<div class="con-wrap white container wrapper">
    <form action="submit_editor.php" method="post">
        <div class="editor-wrap">
            <input name="title" class="title" type="text" placeholder="标题" value="<?php echo $data['title'] ?>">
            <textarea name="content" class="editor" placeholder="内容"><?php echo $data['content'] ?></textarea>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="btn-wrap">
                <input type="submit" class="confirm" value="发表">
                <input type="button" class="cancel" value="取消" onclick="location='index.php'">
            </div>
        </div>
    </form>
</div>
</body>
</html>
