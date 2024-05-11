<?php
global $debug;

$usertbl = DB::query("Select * from users");
if($usertbl){
    $msg[] = "There's already a user available";
    $S['sys']['template'] = "index.tpl";
}else{
    $S['sys']['template'] = "create_first_admin.tpl";
    $S['sys']['js'] = "createfirstadmin.tpl";
    if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username'])){
        fCreateAdminUser($_POST['email'],$_POST['password'],$_POST['username']);
    }
}
