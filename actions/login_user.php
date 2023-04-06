<?php 

 include(__DIR__."/../config/config.php");
 if (count($_POST)) {
    if (!isset($_POST['email']) || empty($_POST['email'])) {
    set_notification(NOTIFICATION_ERROR, " Invalid email");
    redirect("../views/login.php");
 
   }

   if (!isset($_POST['password']) || empty($_POST['password'])) {
    set_notification(NOTIFICATION_ERROR, " Invalid password");
    redirect("../views/login.php");
    
   }
 }else {
    set_notification(NOTIFICATION_ERROR, "Not data infomed");
    redirect("../views/login.php"); 
   
 }

 $email    = $_POST["email"];
 $password = encrypt_password($_POST["password"]);

 
 $fetch_user = $config->query("SELECT `id`, `name`, `email`, `password`, `birth_date`, `profile_picture` FROM user WHERE email='{$email}' AND `password`='{$password}' ");

 if ($fetch_user) {
    if ($fetch_user->num_rows === 0) {
     $_SESSION["logged_user"] = false;  
     redirect("../views/register.php"); 
    }else {
        while ($row = $fetch_user->fetch_assoc())
        {
            unset($row["password"]);
            setUser($row);
            $_SESSION["logged_user"] = true;
        } 
    }
 }else {
    set_notification(NOTIFICATION_ERROR, $config->error);
 }
 redirect("../index.php");



