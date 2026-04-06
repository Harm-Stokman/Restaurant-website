<?php 
session_start();

    if (isset($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in"] == "true") {
    } else  {
        header("Location: login.php");
    }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator</title>
</head>

<body>



</body>

</html>