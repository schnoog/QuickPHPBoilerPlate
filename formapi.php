<?php

require_once(__DIR__ . "/bootstrap.php");


$api_template = "api_test.tpl";
$returndata = "";
$mod = "";
$debug = array();
$router = new \Delight\Router\Router();
$route_is_set = false;
$S['sys']['api']['section'] = "";
$data = array();



$router->any(['POST','GET'],'/api/settings', function () {
    if(!isset($_SESSION['auth_roles'])) return false;
    if($_SESSION['auth_roles'] != "1") return false;
    global $S, $returndata;
    $S['sys']['api']['section'] = "settings";
    if(count($_REQUEST)< 1) fOutputSettings();
    if(isset($_REQUEST['id'])){
        fOutPutSingleSetting($_REQUEST['id']);
    }
    if(isset($_REQUEST['new'])){
        fOutPutSettingsInput();


    }
    if(isset($_REQUEST['save'])){
        fSaveSettings();
        fOutputSettings();
    }


});

function fOutPutSingleSetting($id){
    global $S, $data,$mod,$debug;
    $mod = "form";
    $data = fGetSettingsSingle($id);
    $debug = print_r($data,true);
}

function fOutputSettings(){
    global $S, $data,$mod,$debug;
    $mod = "table";
    $data  = fGetSettings();
    $debug = print_r($data,true);

}

function fOutPutSettingsInput(){
    global $S, $data,$mod,$debug;
    $mod = "form";
    $data = [];
}



$smarty->assign('sys',$S['sys']);
$smarty->assign('userdata',$userdata);
$smarty->assign('debug',$debug);
$smarty->assign('mod',$mod);
$smarty->assign('data',$data);
$smarty->assign('section',$S['sys']['api']['section']);
$returndata = $smarty->fetch($api_template);
if(strlen($returndata)>0) echo $returndata;