<?php

require_once dirname(__FILE__) . '/includes/main.inc.php';

$list            = array();
$list['title']   = isset($_POST['title']) ? post_input($_POST['title']) : '';
$list['content'] = isset($_POST['content']) ? post_input($_POST['content']) : '';
$list['time']    = time();

$exclude = array();

$db->getInsert('msg_article', $list, $exclude);

echo "<script>window.location.href='index.php'</script>";


