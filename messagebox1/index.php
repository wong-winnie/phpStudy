<?php
require_once dirname(__FILE__) . '/includes/main.inc.php';

$data = $db->getAll("select * from msg_article where status='A' order by time DESC limit 10");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>留言板</title>
    <link rel="stylesheet" href="common/css/global.css">
    <link rel="stylesheet" href="common/css/zone.css">
</head>
<body>
<div class="con-wrap white container wrapper">
    <div class="breadcrumb">
        <a href="#">留言板</a>
    </div>
    <div class="text-wrap">
        <div class="clearfix">
            <a class="fl" href="create.php">写留言</a>
            <!--            <ul class="fr">-->
            <!--                <li><a class="active" href="#">发布时间排序</a></li>-->
            <!--                <li><a href="#">点击数排序</a></li>-->
            <!--            </ul>-->
        </div>
        <ul>
            <?php foreach ($data as $k => $v) { ?>
                <li class="clearfix">
                    <p><a href="view.php?id=<?php echo $v['id'] ?>"><?php echo $v['title'] ?></p>
                    <ol class="base-gray">
                        <li class="icon data-icon"><i></i>点击数:<?php echo $v['viewnum'] ?></li>
                        <li class="icon data-icon"><i></i><?php echo date('Y-m-d H:i', $v['time']) ?></li>
                        <li class="edit-wrap ">
                            <a class="fl" href="editor.php?id=<?php echo $v['id'] ?>">编辑</a>
                            <a class="fr" href="delete.php?id=<?php echo $v['id'] ?>">删除</a>
                        </li>
                    </ol>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
</body>
</html>
