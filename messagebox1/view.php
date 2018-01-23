<?php
require_once dirname(__FILE__) . '/includes/main.inc.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$db->getUpdate(sprintf("update msg_article set viewnum = viewnum + 1 where id=%d", $id));
$data = $db->getOne(sprintf("select * from msg_article where id=%d", $id));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>留言板内容</title>
    <link rel="stylesheet" href="common/css/global.css">
    <link rel="stylesheet" href="common/css/zone.css">
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

        <input type="button" value="返回" onclick="location='index.php'">

    </div>

</div>
</body>
</html>

