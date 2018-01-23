<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>留言板</title>
    <link rel="stylesheet" href="<?php echo __STATIC_PATH__ ?>/css/global.css">
    <link rel="stylesheet" href="<?php echo __STATIC_PATH__ ?>/css/zone.css">
    <style>
        .btn-item .fr ul li {
            float: left;
        }
    </style>
</head>
<body>
<div class="con-wrap white container wrapper">
    <div class="breadcrumb">
        <span>留言板</span>
    </div>
    <div class="text-wrap">
        <div class="clearfix">
            <a class="fl" href="<?php echo \think\Url::build('create') ?>">写留言</a>
        </div>
        <ul>

            <?php foreach ($data as $k => $v) { ?>
                <li class="clearfix">
                    <p>
                        <a href="<?php echo \think\Url::build('view', array('id' => $v['id'])) ?>"><?php echo $v['title'] ?></a>
                    </p>
                    <ol class="base-gray">
                        <li class="icon data-icon"><i></i>点击数:<?php echo $v['viewnum'] ?></li>
                        <li class="icon data-icon"><i></i><?php echo date('Y-m-d H:s', $v['time']) ?></li>
                        <li class="edit-wrap ">
                            <a class="fl" href="<?php echo \think\Url::build('update', array('id' => $v['id'])) ?>">编辑</a>
                            <a class="fr" href="<?php echo \think\Url::build('delete', array('id' => $v['id'])) ?>">删除</a>
                        </li>
                    </ol>
                </li>
            <?php } ?>

        </ul>
    </div>
    <div class="btn-item clearfix">
        <div class="fr">
            <?php echo $data->render() ?>
        </div>
    </div>
</div>
</body>
</html>