<?php

include(__DIR__."/../config/config.php");

if (!isset($_POST["edit_post_post"]) || empty($_POST["edit_post_post"])){
    set_notification(NOTIFICATION_ERROR,"Empty field write something");
    view("profile");    
}

if (!isset($_POST["edit_post_post"]) || empty($_POST["edit_post_post"])){
    set_notification(NOTIFICATION_ERROR,"Empty field write something");
    view("profile");    
}

$post  = trim($_POST["edit_post_post"]);
$title = trim($_POST["edit_post_title"]);
$id    = $_POST["post_id"];




$edit_post = $config->query("UPDATE posts SET post = '{$post}' , title = '{$title}' WHERE  id = {$id}");
//var_dump($edit_post);exit;
if(!$edit_post ) {
    set_notification(NOTIFICATION_ERROR,"Empty field write something");
    view("profile");    
}

set_notification(NOTIFICATION_SUCCESS, "Post Upadate!");
view("profile");