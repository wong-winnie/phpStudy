<?php
header('Content-Type:text/html;Charset=utf-8');

error_reporting(E_ALL || ~E_NOTICE);

include_once('configs/config.inc.php');
require_once(__SITE_ROOT . '/vendor/autoload.php');

//留言板运行时只能require_once其中一个, 另外两个注释掉

//require_once(__SITE_ROOT . '/includes/mysql.lib.php');   //需要mysql扩展 PHP运行环境 < 7 (PHP7已移除MySQL扩展)
require_once(__SITE_ROOT . '/includes/mysqli.lib.php');   //需要mysqli扩展 (PHP7不建议使用)
//require_once(__SITE_ROOT . '/includes/pdo.lib.php');    //需要pdo扩展

require_once(__SITE_ROOT . '/includes/common.lib.php');

//设定用于一个脚本中所有日期时间函数的默认时区
if (function_exists('date_default_timezone_set')) {
    date_default_timezone_set('PRC');
}

$db = new dbDriverMySQL(__MYSQL_HOST, __MYSQL_USER, __MYSQL_PASSWD, __MYSQL_DATABASE, __MYSQL_PREFIX, __MYSQL_ENCODING);
$db->dbOpen();

?>