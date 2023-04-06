<?php

include(__DIR__."/../config/config.php");


$id = $_GET['post_id']; 

$delete_post =$config->query("DELETE FROM posts  WHERE  id = {$id}");

if ($delete_post) {
    set_notification(NOTIFICATION_SUCCESS, "Successfully Deleted!!!");
view("profile");
}