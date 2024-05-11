<?php

$S['tmpx'] = "tools/user.php";

function fUserDataRefresh(){
    global $auth, $msg, $userdata;
    if(!isset($_SESSION['auth_logged_in'])){
        $userdata['loggedin'] = false;
        $userdata['session'] = $_SESSION;
    }else{
        $userdata['loggedin'] = true;
        $userdata['session'] = $_SESSION;
    } 
}

function fUserLogin(){
    global $auth, $msg, $userdata;
    $rememberDuration = null;
    if (isset($_POST['remember'])) {
        // keep logged in for one year
        if($_POST['remember'] == 1) $rememberDuration = (int) (60 * 60 * 24 * 365.25);
    }
    
    // ...
    try {
        $auth->login($_POST['email'], $_POST['password'], $rememberDuration);
            if(!isset($_SESSION['auth_logged_in'])){
                $userdata['loggedin'] = false;
                $userdata['session'] = $_SESSION;
            }else{
                $userdata['loggedin'] = true;
                $userdata['session'] = $_SESSION;
            }    
            $msg[] = 'User is logged in';
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            $msg[] ='Wrong email address';
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            $msg[] ='Wrong password';
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
            $msg[] ='Email not verified';
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            $msg[] ='Too many requests';
        }





}

function fUserLogout(){
    global $auth,$msg,$userdata;
    $auth->logOut();
    try {
        $auth->logOutEverywhere();
        $auth->destroySession();
        $userdata['loggedin'] = false;
        $userdata['session'] = [];
    }
    catch (\Delight\Auth\NotLoggedInException $e) {
        $userdata['loggedin'] = false;
        $msg[] = 'Not logged in';
    }
}


function fCreateAdminUser($email,$password,$username){
    global $auth,$msg;
    try {
        $userId = $auth->admin()->createUser($_POST['email'], $_POST['password'], $_POST['username']);
    
        $msg[] = 'We have signed up a new user with the ID ' . $userId;
        try {
            $auth->admin()->addRoleForUserById($userId, \Delight\Auth\Role::ADMIN);
        }
        catch (\Delight\Auth\UnknownIdException $e) {
            $msg[] = 'Unknown user ID';
        }
    


    }
    catch (\Delight\Auth\InvalidEmailException $e) {
        $msg[] = 'Invalid email address';
    }
    catch (\Delight\Auth\InvalidPasswordException $e) {
        $msg[] = 'Invalid password';
    }
    catch (\Delight\Auth\UserAlreadyExistsException $e) {
        $msg[] = 'User already exists';
    }
    
    
    








}


function fUserReg($email,$password,$username){
    global $auth,$msg;
    try {
        $userId = $auth->register($email, $password, $username, function ($selector, $token) {
            echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
            echo '  For emails, consider using the mail(...) function, Symfony Mailer, Swiftmailer, PHPMailer, etc.';
            echo '  For SMS, consider using a third-party service and a compatible SDK';
        });
    
        echo 'We have signed up a new user with the ID ' . $userId;
    }
    catch (\Delight\Auth\InvalidEmailException $e) {
        $msg[] = 'Invalid email address';
    }
    catch (\Delight\Auth\InvalidPasswordException $e) {
        $msg[] = 'Invalid password';
    }
    catch (\Delight\Auth\UserAlreadyExistsException $e) {
        $msg[] = 'User already exists';
    }
    catch (\Delight\Auth\TooManyRequestsException $e) {
        $msg[] = 'Too many requests';
    }


}


function fUserVal($selector,$token){
    global $auth,$msg;
    try {
        $auth->confirmEmail($selector, $token);
    
        $msg[] = 'Email address has been verified';
    }
    catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
        $msg[] = 'Invalid token';
    }
    catch (\Delight\Auth\TokenExpiredException $e) {
        $msg[] = 'Token expired';
    }
    catch (\Delight\Auth\UserAlreadyExistsException $e) {
        $msg[] = 'Email address already exists';
    }
    catch (\Delight\Auth\TooManyRequestsException $e) {
        $msg[] = 'Too many requests';
    }
}



