
function fSettingsEdit(SetID){
    fetchDataAndDisplay("/settings?id=" + SetID ,"contentholder");0
}

function fSettingsNew(){
    fetchDataAndDisplay("/settings?new" ,"contentholder");0
}

function fSettingsSave(){
    let SetID = $('#id').val();
    let SetVal = $('#setting_value').val();
    let SetKey =  $('#setting_key').val();
    let SetHint =  $('#setting_hint').val();
    let Path = "/settings?save";
    let ElementId = "contentholder"

    let PostContent = {
        act: "save",
        id: SetID,
        key: SetKey,
        val: SetVal,
        hint: SetHint
    };

    postDataAndDisplay(Path, ElementId, PostContent);

}