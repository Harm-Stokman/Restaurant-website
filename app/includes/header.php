<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&display=swap"
        rel="stylesheet" />
    <script src="scripts/defer.js"></script>
</head>
<body>
    <header class="site-header">
        <div class="site-logo">Sera <span>Ristorante</span></div>
        <div> 
            <?php
            if (isset($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in" ] == "true") {
                echo "<span> Welkom " .$_SESSION['usernameLogged']. "</span>";
                echo "<a href='logout.php'> <site-button>Uitloggen</site-button> </a>";
                echo "<a href='admin.php'><site-button>Admin</site-button></a>";
            } else {
               echo "<a href='login.php'> <site-button>Login</site-button> </a>";
            }
            ?>
        </div>
    </header>
</body>
</html>