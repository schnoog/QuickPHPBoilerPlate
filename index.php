<?php

require_once(__DIR__ . "/bootstrap.php");

if(isset($_POST['act'])){
    if($_POST['act'] =="login"){
        fUserLogin();
    }
    if($_POST['act'] =="logout"){
        fUserLogout();
    }
}


if(isset($_REQUEST['apiwork'])){




}else{  // if - if not apiwork


$router = new \Delight\Router\Router();
$route_is_set = false;

$router->get('/', function () {
    global $selphp, $route_is_set;
    $selphp = 'mainpage.php';
    $route_is_set = true;
});

$router->get('/index', function () {
    global $selphp, $route_is_set;
    $selphp = 'mainpage.php';
    $route_is_set = true;
});

$dir = opendir($S['dirs']['routesdir']);
// Loop through the directory
while (($file = readdir($dir)) !== false) {
    // Check if the file is a PHP file and not . or ..
    if (pathinfo($file, PATHINFO_EXTENSION) === 'php' && $file != '.' && $file != '..') {
        // Require the file
        require_once $S['dirs']['routesdir']. '/' . $file;
    }
}
// Close the directory
closedir($dir);




if($route_is_set){
    require_once( $S['dirs']['pagedir'] . $selphp); 
    if($S['sys']['debug']['routing'])$msg[] = $S['dirs']['pagedir'] . $selphp;
    if($S['sys']['debug']['routing'])$msg[] = "Routed to " . $selphp;
    
}





//fUserReg('YYYYYY','XXXXXXX','admin');
//fUserVal('AIU3PFtya_iHkDa5','6qH-EVnc_4fuxqso');

//print_r($tmp);


//$debug = ['SESSION' => $_SESSION, 'AUTH' => $auth];
$S['sys']['js'][] = "js_pageview.tpl";
$S['sys']['js'][] = "js_settings.tpl";
$S['sys']['js'][] = "js_api.tpl";
$debug['server'] = $_SERVER;
$smarty->assign('msg',$msg);
$S['sys']['user'] = $userdata;
$smarty->assign('sys',$S['sys']);
$smarty->assign('userdata',$userdata);
$debug = $S['sys'];
$smarty->assign('debug', '<pre>'. print_r($debug,true). '</pre>');
$smarty->assign('name', 'Ned');
$smarty->display($S['sys']['template']);


} // if not apiwork