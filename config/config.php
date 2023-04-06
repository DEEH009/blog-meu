<?php 
    session_start();
    $dbconfig = require(__DIR__ . "/configdb.php");

    include("helpers.php");
    const NOTIFICATION_ERROR = "error";
    const NOTIFICATION_SUCCESS = "success";
    const NOTIFICATION_WARNING = "warning";

    
    $config = mysqli_connect($dbconfig["host"], $dbconfig["user"], $dbconfig["passwd"], $dbconfig["table"], $dbconfig["port"]);
    
    if ($config->connect_error){
        exit("failed to connect".$config->connect_error);
    }

?>