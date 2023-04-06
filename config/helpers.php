<?php
if (!function_exists("redirect")) {
    function redirect($locate) {
        header("location: {$locate}");
        exit;
    }
}

if (!function_exists("view")) {
    function view($view) {
        redirect("../views/{$view}.php");
    }
}

if (!function_exists("error_notification")) {
    function error_notification() {
        if (isset($_SESSION["notification"][NOTIFICATION_ERROR]) || !empty($_SESSION["notification"][NOTIFICATION_ERROR])) {
            echo "
                <div class='alert alert-danger alert-dismissible' role='alert'>
                    {$_SESSION['notification'][NOTIFICATION_ERROR]}
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            unset($_SESSION["notification"][NOTIFICATION_ERROR]);
        }
    }
}

if (!function_exists("success_notification")) {
    function success_notification() {
        if (isset($_SESSION["notification"][NOTIFICATION_SUCCESS]) || !empty($_SESSION["notification"][NOTIFICATION_SUCCESS])) {
            echo "
                <div class='alert alert-success alert-dismissible' role='alert'>
                    {$_SESSION['notification'][NOTIFICATION_SUCCESS]}
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            unset($_SESSION["notification"][NOTIFICATION_SUCCESS]);
        }
    }
}

if (!function_exists("warnig_notification")) {
    function warning_notification() {
        if (isset($_SESSION["notification"][NOTIFICATION_WARNING]) || !empty($_SESSION["notification"][NOTIFICATION_WARNING])) {
            echo $_SESSION["notification"][NOTIFICATION_WARNING];
            unset($_SESSION["notification"][NOTIFICATION_WARNING]);
        }
    }
}


if (!function_exists("set_notification")) {
    function set_notification($type, $message) {
        $_SESSION["notification"][$type] = $message;
    }
}

if (!function_exists("setUser")) {
    function setUser($user) {
        $_SESSION["user"] = $user;
    }
}

if (!function_exists("unsetUser")) {
    function unsetUser(){
        if (isset($_SESSION["user"])) {
            unset ($_SESSION["user"]);
        } 
    }
}

if (!function_exists("user")) {
    function user() {
        return isset($_SESSION["user"]) && count($_SESSION["user"]) ? $_SESSION["user"] : null;
    }
}

if (!function_exists("encrypt_password")) {
    function  encrypt_password($password){
   
        return substr(md5($password), 0,30 );

    }
}


 if (!function_exists("block_access")) {
    function block_access(){
        if (!isset($_SESSION["logged_user"]) || $_SESSION["logged_user"] === false) {
            redirect("../views/login.php");
        }
    }
 }   