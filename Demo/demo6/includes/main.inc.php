<?php
header('Content-Type:text/html;Charset=utf-8');

error_reporting(E_ALL || ~E_NOTICE);

include_once('configs/config.inc.php');
require_once(__SITE_ROOT . '/vendor/autoload.php');
require_once(__SITE_ROOT . '/includes/pdo.lib.php');
require_once(__SITE_ROOT . '/includes/common.lib.php');

//设定用于一个脚本中所有日期时间函数的默认时区
if (function_exists('date_default_timezone_set')) {
    date_default_timezone_set('PRC');
}

$db1 = new dbDriverMySQL(__MYSQL_HOST, __MYSQL_USER, __MYSQL_PASSWD, __MYSQL_DATABASE, __MYSQL_PREFIX, __MYSQL_ENCODING, __MYSQL_RPORT);
$db1->dbOpen();

$db2 = new dbDriverMySQL(__MYSQL_HOST, __MYSQL_USER, __MYSQL_PASSWD, __MYSQL_DATABASE, __MYSQL_PREFIX, __MYSQL_ENCODING, __MYSQL_WPORT);
$db2->dbOpen();

?>