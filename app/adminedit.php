<?php

session_start();
include_once 'includes/pdo.php';


if (isset($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in"] == "true") {
} else {
    header("Location: login.php");
}
if (isset($_GET['name'])) {
    $name = $_GET['name'];

    $search = "SELECT * FROM gerechten
WHERE gerechtnaam = '$name'";
    $statementEdit = $pdo->prepare($search);
    $statementEdit->execute();

    if ($statementEdit->rowCount() > 0) {
        $row = $statementEdit->fetch(PDO::FETCH_ASSOC);

        $naamGerecht = $row["gerechtnaam"];
        $ingrediënten = $row["ingrediënten"];
        $prijs = $row["prijs"];
    }

    if (isset($_POST["opslaan"])) {

    $save = "UPDATE gerechten
    SET gerechtnaam = $naamGerecht, ingrediënten = $ingrediënten, prijs = $prijs
    WHERE gerechtnaam = $naam";
    }
    
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerecht bewerken</title>
    <link rel="stylesheet" href="css/style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&display=swap"
        rel="stylesheet" />
    <script src="scripts/defer.js"></script>
</head>

<body>

    <form class="admin-form" action="adminedit.php" method="post">
        <label>Vul hier het gerechtnaam in.</label>
        <input class="input-field" type="text" name="gerechtnaam" placeholder="Gerechtnaam"
            value="<?php echo $row['gerechtnaam'] ?> ">
        <label>Vul hier de ingrediënten in.</label>
        <input class="input-field" type="text" name="ingrediënten" placeholder="Ingrediënten"
            value="<?php echo $row['ingrediënten'] ?> ">
        <label>Vul hier de prijs van het gerecht in.</label>
        <input class="input-field" type="text" name="prijs" placeholder="Prijs" value="<?php echo $row['prijs'] ?> ">
        <div>
            <a href="admin.php"><site-button>Terug</site-button></a>
            <input type="submit" name="opslaan" value="Opslaan">
        </div>
    </form>

</body>

</html>