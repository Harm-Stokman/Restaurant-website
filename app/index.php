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
  <script src="scripts/script.js"></script>
  <script src="scripts/defer.js"></script>
</head>

<body>
  <!-- ══ PAGE BODY ════════════════════════════ -->
  <div class="page-body">

    <!-- ── NAV ──────────────────────────────── -->
    <nav class="site-nav" aria-label="Primaire navigatie">
      <form name="zoekbalk" action="index.php" method="get">
        <input class="input-field" type="search" placeholder="Zoek een gerecht...">
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

          $sql = "SELECT * FROM gerechten";

          $statement = $pdo->prepare($sql);

          $statement->execute();

          $gerechten = $statement->fetchAll();

          foreach ($gerechten as $gerecht) { ?>
            <article class="menu-card">
              <div class="menu-card__image" role="img">
              </div>
              <footer class="menu-card__footer">
                <div class="menu-card__info">
                  <?php echo "<h2 class='menu-card__name'>" . $gerecht['gerechtnaam'] . "</h2>"; ?>
                  <?php echo "<p class='menu-card__sub'>" . $gerecht['ingrediënten'] . "</p>"; ?>
                </div>
                <div class="menu-card__actions">
                  <?php echo "<span class='menu-card__price'>" . $gerecht['prijs'] . "</span>"; ?>
                </div>
              </footer>
            </article>
          <?php } ?>
        </div><!-- /.menu-grid -->
      </section>

    </main><!-- /.site-main -->

    <!-- ── CART ──────────────────────────────── -->
    

  </div><!-- /.page-body -->

  <!-- ══ TOAST ════════════════════════════════ -->
  <div class="toast" id="js-toast" role="status" aria-live="polite"></div>
</body>

</html>