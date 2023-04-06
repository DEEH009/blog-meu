<?php
    include(__DIR__."/../config/config.php");


    if (isset($_SESSION["logged_user"]) || $_SESSION["logged_user"] === true) {
       $_SESSION["logged_user"] = false;
       
       redirect("../views/login.php");
    }
