<?php 

$S['dirs']['basedir'] = __DIR__ . "/";
$S['dirs']['incdir'] = $S['dirs']['basedir'] . "inc/"; 

require_once $S['dirs']['incdir'] . "config.php";
require_once $S['dirs']['basedir'] . "vendor/autoload.php";

DB::$host = $S['db']['host'];
DB::$port = $S['db']['port'];
DB::$user = $S['db']['user'];
DB::$password = $S['db']['password'];
DB::$encoding = $S['db']['charset'];
DB::$dbName = $S['db']['name'];

$tmp = DB::tableList();

print_r($tmp);