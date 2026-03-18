<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Vul hier getallen in</h1>
<form name="oefenen" action="formopdracht.php" method="post">
    <div>1: <input name="getal1" type="text" required></div>
    <div>2: <input name="getal2" type="text" required></div>
    <div>2: <input name="getal3" type="text" required></div>

    <input type="submit">

    <?php 

    if (isset($_POST)) {
    $getal1 = $_POST['getal1'];
    $getal2 = $_POST['getal2'];
    $getal3 = $_POST['getal3'];

    $gemiddelde = ($getal1 + $getal2 + $getal3) / 3;
    echo "<p> Het gemiddelde is: " .$gemiddelde."</p>";
    }
    ?>
</body>
</html>

naam
ingredienten
categorie
onderdeel
prijs