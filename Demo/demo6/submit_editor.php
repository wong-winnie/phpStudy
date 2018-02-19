<?php
require_once dirname(__FILE__) . '/includes/main.inc.php';

$id      = isset($_POST['id']) ? intval($_POST['id']) : 0;
$title   = isset($_POST['title']) ? post_input($_POST['title']) : '';
$content = isset($_POST['content']) ? post_input($_POST['content']) : '';
$time    = time();

$db2->getUpdate(sprintf("update msg_article set `title`='%s', `content`='%s', `time`=%d  where id = %d", $title, $content, $time, $id));

echo "<script>window.location.href='index.php'</script>";
