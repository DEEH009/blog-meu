<?php
include(__DIR__."/../config/config.php");

$user = $_POST["user"];
$id = $_POST["id"];
$email= $_POST["email"];
$birth =$_POST["birth"];
  
if (!is_dir("../tmp")) {
    mkdir("../tmp");
}

$picture = "../tmp/" . user()["id"] . ".jpeg";

if (file_exists($picture)) {
    if (!unlink($picture)) {
        set_notification(NOTIFICATION_ERROR, "Could not remove the profile picture");
    }
}

if (isset($_FILES["picture"])) {
    if(!move_uploaded_file($_FILES["picture"]["tmp_name"], $picture)) {
        set_notification(NOTIFICATION_ERROR, "Could not save the profile picture");
    } 
}

$edit_user = $config->query("UPDATE user SET  `name`= '{$user}', `email`= '{$email}',  `birth_date`= '{$birth}',`profile_picture`= '{$picture}'  WHERE id ={$id} ");
if ($edit_user ) {
   
    $fetch_user = $config->query("SELECT `id`, `name`, `email`, `birth_date`,`profile_picture` FROM user WHERE  id={$id} ");
    if ($fetch_user) {

        if ($fetch_user->num_rows === 0) {

        }else {
            while ($row = $fetch_user->fetch_assoc())
            {
                setUser($row);
                set_notification(NOTIFICATION_SUCCESS, "User Updateted!");
            } 
        }

     }else {
        set_notification(NOTIFICATION_ERROR, $config->error);
     }

}else {
    set_notification(NOTIFICATION_ERROR, $confg->error);
}




view("profile");