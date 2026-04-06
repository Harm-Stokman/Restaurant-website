<?php

session_start();

Session_unset();

session_regenerate_id();

session_destroy();

header('Location: login.php'); 
?>