<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <style>
        li {
            float: left;
            list-style: none;
            width: auto;
            padding: 10px;
        }
    </style>
</head>
<body>

<?php foreach ($data as $k => $v) { ?>
    <div style="margin-left: 100px;"><?php echo $v['title']; ?></div>
<?php } ?>

<?php echo $data->render() ?>
</body>
</html>

