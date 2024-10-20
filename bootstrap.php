<?php 
$S = array();
$debug = array();
$msg = array();
$S['dirs']['basedir'] = __DIR__ . "/";
$S['dirs']['incdir'] = $S['dirs']['basedir'] . "inc/"; 
$S['dirs']['pagedir'] = $S['dirs']['incdir'] . "pages/";
$S['dirs']['routesdir'] = $S['dirs']['incdir'] . "routes/";

$S['sys']['api']['table'] = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . '/tableapi.php';
$S['sys']['api']['form'] = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . '/api';

require_once __DIR__ . "/inc/config.php";
require_once __DIR__ . "/vendor/autoload.php";

DB::$host = $S['db']['host'];
DB::$port = $S['db']['port'];
DB::$user = $S['db']['user'];
DB::$password = $S['db']['password'];
DB::$encoding = $S['db']['charset'];
DB::$dbName = $S['db']['name'];

$S['sys']['useauth'] = $S['security']['use_authentification'];
$S['sys']['template'] = "index.tpl";
$S['sys']['js'] = [];

$S['smarty'] = [
    'TemplateDir' => $S['dirs']['incdir'] . 'template/',
    'ConfigDir' => $S['dirs']['incdir'] . 'smartyconfig/',
    'CompileDir' => $S['dirs']['incdir'] . 'smartycompile/',
    'CacheDir' => $S['dirs']['incdir'] . 'smartycache/',
];

use Smarty\Smarty;
$smarty = new Smarty();
$smarty->setTemplateDir($S['smarty']['TemplateDir']);
$smarty->setConfigDir($S['smarty']['ConfigDir']);
$smarty->setCompileDir($S['smarty']['CompileDir']);
$smarty->setCacheDir($S['smarty']['CacheDir']);
//$smarty->testInstall();
$connstring = 'mysql:dbname='.$S['db']['name'].';host='. $S['db']['host'] .';charset=utf8mb4';
//echo "<hr>" . $connstring . "<hr>";
$db = new \PDO($connstring, $S['db']['user'], $S['db']['password']);
$auth = new \Delight\Auth\Auth($db);

$dir = opendir($S['dirs']['incdir'] . "tools");

// Loop through the directory
while (($file = readdir($dir)) !== false) {
    // Check if the file is a PHP file and not . or ..
    if (pathinfo($file, PATHINFO_EXTENSION) === 'php' && $file != '.' && $file != '..') {
        // Require the file
        require_once $S['dirs']['incdir'] . "tools". '/' . $file;
    }
}

// Close the directory
closedir($dir);



fUserDataRefresh();
$S['sys']['settings'] = fGetSettings();
if(strlen($S['sys']['logfile'])>0){
    ini_set('error_log', $S['sys']['logfile']);
};

