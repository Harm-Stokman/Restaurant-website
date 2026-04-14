<?php
session_start();
if (isset($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in" ] == "true") {
// echo "logged in as:" .$_SESSION['usernameLogged']."";
} else {
  // echo "you are not logged in";
}
include_once 'includes/pdo.php';
include_once 'includes/header.php';

?>
<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sera Ristorante</title>
  <link rel="stylesheet" href="css/style.css">
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&display=swap"
    rel="stylesheet" />
  <script src="scripts\script.js" defer></script>
  <script src="scripts\defer.js" defer></script>
</head>

<body>
  <!-- ══ PAGE BODY ════════════════════════════ -->
  <div class="page-body">

    <!-- ── NAV ──────────────────────────────── -->
    <nav class="site-nav" aria-label="Primaire navigatie">
      <form name="zoekbalk" action="index.php" method="get">
        <input class="input-field" type="search" name="zoekveld" placeholder="Zoek een gerecht...">
        <input class="nav-search" type="submit" name="zoeken" value="Zoeken">
      </form>
    </nav>

    <!-- ── MAIN ─────────────────────────────── -->
    <main class="site-main">

      <!-- MENU -->
      <section class="menu-section" id="menu" aria-labelledby="menu-label">
        <p class="section-label" id="menu-label">Bekijk ons menu</p>

        <div class="menu-grid" id="js-menu-grid">

          <?php

          if (!isset($_GET['zoeken']) OR ($_GET['zoekveld'] == '')) {
            
          $sql = "SELECT * FROM gerechten";
          $searchStatement = $pdo->prepare($sql);
          $searchStatement->execute();
          } else {
          $searchsql = "SELECT * FROM gerechten 
          WHERE gerechtnaam LIKE ?";
          $searchStatement = $pdo->prepare($searchsql);
          $searchStatement->execute([ '%' .$_GET['zoekveld']. '%' ]
            );
          }
           $gerechten = $searchStatement->fetchAll();  

          foreach ($gerechten as $gerecht) { ?>
              <menu-item
        Gerechtnaam="<?php echo $gerecht['gerechtnaam']; ?>"
        Prijs="<?php echo $gerecht['prijs']; ?>"
        Ingrediënten="<?php echo $gerecht['ingrediënten'] ?>" 
        ></menu-item>
          <?php } ?> 
        </div>
      </section>

    </main><!-- /.site-main -->
  </div><!-- /.page-body -->

  <!-- ══ TOAST ════════════════════════════════ -->
  <div class="toast" id="js-toast" role="status" aria-live="polite"></div>
</body>

</html>