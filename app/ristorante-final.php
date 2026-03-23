<?php

include_once 'includes/pdo.php';

// //  Define SQL statement
// $sql = "SELECT * FROM gerechten";

// //  Prepare SQL statement
// $statement = $pdo->prepare($sql);

// //  Exacute SQL statement
// $statement->execute();

// $gerechten = $statement->fetchAll();

// echo "<pre>";
// print_r($gerechten);
// echo "</pre>"; 

?>

<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sera Ristorante</title>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css">
  <script src="scripts/script.js"></script>
  <script src="scripts/defer.js"></script>
</head>

<body>
  
  <!-- ══ HEADER ══════════════════════════════ -->
  <header class="site-header">
    <div class="site-logo">Sera <span>Ristorante</span></div>
    <button>Login</button>
  </header>

  <!-- ══ PAGE BODY ════════════════════════════ -->
  <div class="page-body">

    <!-- ── NAV ──────────────────────────────── -->
    <nav class="site-nav" aria-label="Primaire navigatie">
      <a href="#Soepen" data-filter="dessert">Soepen</a>
      <a href="#antipasti" data-filter="antipasti">Antipasti</a>
      <a href="#menu" data-filter="all">Pizza's</a>
      <a href="#vleesgerechten" data-filter="antipasti">Vleesgerechten</a>
      <a href="#pasta" data-filter="pasta">Pasta</a>
      <a href="#dessert" data-filter="dessert">Dessert</a>

      <label class="nav-search" aria-label="Zoek een gerecht">
        <svg viewBox="0 0 24 24" aria-hidden="true">
          <circle cx="11" cy="11" r="7" />
          <line x1="16.5" y1="16.5" x2="22" y2="22" />
        </svg>
        <input type="search" id="js-search" placeholder="Zoek een gerecht…" autocomplete="off"
          oninput="filterMenu(this.value)" />
      </label>
    </nav>

    <!-- ── MAIN ─────────────────────────────── -->
    <main class="site-main">

      <!-- MENU -->
      <section class="menu-section" id="menu" aria-labelledby="menu-label">
        <p class="section-label" id="menu-label">Vandaag op het menu</p>

        <div class="menu-grid" id="js-menu-grid">

          <?php 
          
         $sql = "SELECT * FROM gerechten";

         $statement = $pdo->prepare($sql);

         $statement->execute();

         $gerechten = $statement->fetchAll();

         foreach($gerechten as $gerecht) { ?>
           <article class="menu-card">
            <div class="menu-card__image" role="img" aria-label="Bruschetta al Pomodoro">
            </div>
            <footer class="menu-card__footer">
              <div class="menu-card__info">
                 <?php echo "<h2 class='menu-card__name'>" . $gerecht['gerechtnaam'] . "</h2>"; ?>
                 <?php echo "<p class='menu-card__sub'>" . $gerecht['ingrediënten'] . "</p>"; ?>
              </div>
              <div class="menu-card__actions">
                <?php echo "<span class='menu-card__price'>" . $gerecht['prijs'] . "</span>"; ?>
                 <!-- <button class="menu-card__add" onclick="addToCart('Bruschetta al Pomodoro', 7.50)">+ Toevoegen</button> -->
              </div>
            </footer> 
          </article>
        <?php } ?>
          <p class="no-results" id="js-no-results">Geen gerechten gevonden.</p>
        </div><!-- /.menu-grid -->
      </section>

    </main><!-- /.site-main -->

    <!-- ── CART ──────────────────────────────── -->
    <aside class="site-cart" aria-label="Winkelwagen">

      <p class="cart__heading">Winkelwagen</p>

      <div class="cart__list" id="js-cart-list">
        <p class="cart__empty" id="js-cart-empty">Uw winkelwagen is leeg.</p>
      </div>

      <div class="cart__totals" id="js-cart-totals" hidden>
        <div class="cart__totals-row">
          <span>Subtotaal</span>
          <span id="js-subtotal">€ 0,00</span>
        </div>
        <div class="cart__totals-row">
          <span>Bezorgkosten</span>
          <span>€ 2,50</span>
        </div>
        <div class="cart__totals-row cart__totals-row--grand">
          <span>Totaal</span>
          <span id="js-grandtotal">€ 0,00</span>
        </div>
        <button class="btn btn--dark btn--full" style="margin-top:1.1rem;" onclick="checkout()">
          Bestelling plaatsen
        </button>
      </div>

      <div id="js-cart-cta">
        <a href="#menu" class="btn btn--outline btn--full">Bekijk het menu</a>
      </div>

    </aside>

  </div><!-- /.page-body -->

  <!-- ══ TOAST ════════════════════════════════ -->
  <div class="toast" id="js-toast" role="status" aria-live="polite"></div>
</body>
</html>