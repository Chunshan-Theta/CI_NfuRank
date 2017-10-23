<?php

define('DB_PATH', '127.9.53.130'); //設定資料庫路徑
define('DB_NAME', 'teachervalue'); //設定資料庫名稱
define('DB_USER', 'theta'); //設定資料庫帳號
define('DB_PASSWORD', 'EPYpZD4rLc2bdc9T'); //設定資料庫密碼
$list ="nfu";
///

//建立PDO連線
$_link = new PDO('mysql:host='.DB_PATH.';charset=UTF8;dbname='.DB_NAME, DB_USER, DB_PASSWORD);

//設定編碼
$_link->query('SET NAMES UTF8')->execute();	


?>