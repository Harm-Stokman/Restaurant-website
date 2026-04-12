<?php
session_start();
include_once 'includes/pdo.php';
if (isset($_POST['submit'])) {
  $user = $_POST['username'];
  $password = $_POST['password'];


  $query = $pdo->query("SELECT * FROM Gebruikers")->fetchAll();

  foreach ($query as $row) {

    if (isset($_POST['username']) && isset($_POST['password'])) {
      if ($_POST['username'] == $row['Gebruikersnaam'] && $_POST['password'] == $row['Wachtwoord']) {
        $_SESSION['is_logged_in'] = true;
        $_SESSION['usernameLogged'] = $_POST['username'];
        header('Location: index.php');
      } 
      echo "<div class='login-box'> Verkeerde inloggegevens, probeer het opnieuw. </div>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="login-body">
  <div class="login-box">
    <form class="login-form" action="login.php" method="post">
      <div class="site-logo">Sera <span>Ristorante</span></div>  
      <input class="input-field" type="text" name="username" placeholder="Gebruikersnaam">
      <input class="input-field" type="password" name="password" placeholder="Wachtwoord">
      <div class="button-field">
      <a href="index.php"> <site-button>Terug</site-button> </a>
      <input type="submit" name="submit" value="Login">
      </div>
    </form>
  </div>
</body>

</html>