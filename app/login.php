
<?php

?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <link rel="stylesheet" href="css/style.css">
     <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&display=swap"rel="stylesheet" />
  <script src="scripts/script.js"></script>
  <script src="scripts/defer.js"></script>
</head>
<body class="login-body">    

<div class="login-box">
<form class="login-form" name="login" action="login.php" method="get"> 
  <div class="site-logo">Sera <span>Ristorante</span></div>
    <input class="input-field" naam="Inlognaam" type="text" placeholder="Inlognaam">
    <input class="input-field" naam="Wachtwoord" type="password" placeholder="Wachtwoord">
    <div class="button-field"> 
      <a href="index.php"><site-button>Terug</site-button></a>
        <input type="submit" value="login">
    </div>
</form>
</div>
</body>
</html>