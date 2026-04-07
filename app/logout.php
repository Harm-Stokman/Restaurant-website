<?php

session_start();

Session_unset();

session_destroy();

session_start();

session_regenerate_id();

header('Location: login.php'); 
exit();
?>
