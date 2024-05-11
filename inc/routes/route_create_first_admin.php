<?php



$router->get('/createadmin', function () {
    global $selphp, $route_is_set;
    $selphp = 'createFirstAdmin.php';
    $route_is_set = true;
});

$router->post('/createadmin', function () {
    global $selphp, $route_is_set;
    $selphp = 'createFirstAdmin.php';
    $route_is_set = true;
});

$router->any([ 'POST', 'GET' ], '/createfirstadmin', function () {
    global $selphp, $route_is_set;
    $selphp = 'createFirstAdmin.php';
    $route_is_set = true;    
    // update the address for user `$id`
});

if($S['security']['use_authentification']){  // Create first user if none available
    $users = DB::query("Select * from users");
    $rc = DB::numRows();
    if($rc == 0){
        $selphp = 'createFirstAdmin.php';
        $route_is_set = true;   
    }

}

