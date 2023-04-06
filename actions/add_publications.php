<?php

include(__DIR__."/../config/config.php");


$title = trim($_POST["title"]);
$content = trim($_POST["post"]);
$id_user = $_SESSION["user"]["id"];

if (!is_dir("../tmp")) {
    mkdir("../tmp");
}

$picture = "../tmp/post-" . user()["id"] . ".jpeg";

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

$add_post =$config->query("INSERT INTO posts (title, post,id_user, picture) VALUES ('{$title}', '{$content}','{$id_user}','{$picture}')");

    if (!$add_post) {
        set_notification(NOTIFICATION_SUCCESS, "Post Created!");
      
    }else {
        set_notification(NOTIFICATION_ERROR, "Something went wrong");
    }
    redirect("../index.php");



