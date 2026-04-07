<?php

session_start();
include_once 'includes/pdo.php';


if (isset($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in"] == "true") {
} else {
    header("Location: login.php");
}

if (isset($_GET['name'])) {

  $name = $_GET['name'];  


  $query = "DELETE FROM gerechten
  WHERE gerechtnaam = ?";

  $deleteStatement = $pdo->prepare($query);
  $deleteStatement->bindParam(1, $name);
  $deleteStatement->execute();
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator</title>
    <link rel="stylesheet" href="css/style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&display=swap"
        rel="stylesheet" />
    <script src="scripts/defer.js"></script>
</head>

<body>

    <div class="admin-page">
        <div class="admin-other">
            <a href="index.php"> <site-button>Terug</site-button></a>
            <a href="adminadd.php"> <site-button>Gerecht toevoegen</site-button></a>
        </div>

        <div class="admin-blocks">
            <?php

            $sql = "SELECT * FROM gerechten";

            $statementOverzicht = $pdo->prepare($sql);

            $statementOverzicht->execute();

            $gerechten = $statementOverzicht->fetchAll();

            foreach ($gerechten as $gerecht) { ?>
                <div class="admin-block">
                    <div class="admin-info">
                        <?php echo "<span>" . $gerecht['gerechtnaam'] . "</span>"; ?>
                        <?php echo "<span>" . $gerecht['ingrediënten'] . "</span>"; ?>
                        <?php echo "<span>" . $gerecht['prijs'] . "</span>"; ?>
                    </div>
                    <div class="admin-actions">
                        <a href="adminedit.php? name=<?php echo $gerecht['gerechtnaam'] ?>"><site-button>Bewerken</site-button></a>
                        <a href="admin.php? name=<?php echo $gerecht['gerechtnaam'] ?>"> <site-button>Verwijderen</site-button></a>
                    </div>
                </div>
            <?php }
            ?>
        </div>

    </div>
</body>

</html>