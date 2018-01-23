<?php
require_once dirname(__FILE__) . '/includes/main.inc.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$db->getUpdate(sprintf("update msg_article set status='D' where id=%d", $id));

echo "<script>window.location.href='index.php'</script>";