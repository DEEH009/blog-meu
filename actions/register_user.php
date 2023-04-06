<?php

include(__DIR__."/../config/config.php");

if (count($_POST)) {
    
    if (!isset($_POST['email']) || empty($_POST['email'])) {
        set_notification(NOTIFICATION_ERROR, "Email not Informed");
        redirect("../views/register.php");
    }

    if (!isset($_POST['name']) || empty($_POST['name']) ) {
        set_notification(NOTIFICATION_ERROR, "Name not Informed");
        redirect("../views/register.php");
    }

    if (!isset($_POST['password']) || empty($_POST['password'])) {
        set_notification(NOTIFICATION_ERROR, "Password not Informed");
        redirect("../views/register.php");
    }
} else {
    set_notification(NOTIFICATION_ERROR, "Not data infomed");
    redirect("../views/register.php"); 
    
}

$name     = $_POST["name"];
$email    = $_POST["email"];
$password = $_POST["password"];  
$confirm_password = $_POST["confirm_password"];
$birth_date = $_POST["birthday"];

if ($password !== $confirm_password ){
    set_notification(NOTIFICATION_ERROR,"The password is not identical");
    redirect("../views/register.php");
}

$password = encrypt_password($confirm_password);

$fetch_user = $config->query("SELECT email FROM user  WHERE email='{$email}'");
if ($fetch_user) {
    
    if ($fetch_user->num_rows === 0) {
        $create_user = $config->query("INSERT INTO user (`name`, `email`, `password`,`birth_date`) VALUES ('{$name}', '{$email}', '{$password}','{$birth_date}')");
        if ($create_user) {
            set_notification(NOTIFICATION_SUCCESS, "User Created!");
            redirect("../views/login.php");
        }else {
            set_notification(NOTIFICATION_ERROR, "Email not found");
            redirect("../views/register.php");
        }
    }else {
        set_notification(NOTIFICATION_ERROR, "Existing email");
        redirect("../views/register.php");
    }
} else {
    set_notification(NOTIFICATION_ERROR, $config->error);
    redirect("../views/register.php");
}













