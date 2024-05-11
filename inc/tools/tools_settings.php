<?php

function fGetSettings(){
    global $S;
    $res = DB::query("Select id, setting_key, setting_value, setting_hint, setting_syslock from syssettings");
    $data = array();
    for($x=0 ; $x < count($res);$x++){
        $data[ $res[$x]['setting_key'] ] = [
            "value" => $res[$x]['setting_value'], 
            "hint" => $res[$x]['setting_hint'],
            "id" => $res[$x]['id'],
            "locked" => $res[$x]['setting_syslock'],
        ];
    }
    $S['sys']['settings'] = $data;
    return $data;
}

function fGetSettingsSingle($id){
    return DB::queryFirstRow("Select * from syssettings WHERE id = %i",$id);
}


function fSaveSettings(){
    $id = $_POST['id'];
    if($id > 0) {
        $data['id'] = $_POST['id'];
    }else{
        $data['setting_key'] = htmlspecialchars($_POST['key']);
    }
    $data['setting_value'] = htmlspecialchars($_POST['val']);
    $data['setting_hint'] = htmlspecialchars($_POST['hint']);

    if($id > 0) {
        DB::update("syssettings",$data,"id=%i",$id);
    }else{
        DB::insert("syssettings",$data);
    }



}

/*

    [save] =>
    [act] => save
    [id] => 1
    [key] => sitename
    [val] => My Quick boilerplate
    [hint] => Used a site name and title
)

 
 */