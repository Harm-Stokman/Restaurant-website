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

         foreach($gerechten as $gerecht) {

         echo "<div>".$gerecht['gerechtnaam']. "</div>";

         }

          ?>

       
          <!-- <article class="menu-card" data-category="antipasti" data-name="carpaccio di manzo"
            data-sub="rucola, parmigiano, kappertjes">
            <div class="menu-card__image" role="img" aria-label="Carpaccio di Manzo">
              <svg viewBox="0 0 320 200" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <rect width="320" height="200" fill="#BCB8B1" />
                <line x1="0" y1="0" x2="320" y2="200" stroke="#463F3A" stroke-width="1" />
                <line x1="320" y1="0" x2="0" y2="200" stroke="#463F3A" stroke-width="1" />
              </svg>
            </div>
            <footer class="menu-card__footer">
              <div class="menu-card__info">
                <h2 class="menu-card__name">Carpaccio di Manzo</h2>
                <p class="menu-card__sub">Rucola, Parmigiano, kappertjes</p>
              </div>
              <div class="menu-card__actions">
                <span class="menu-card__price">€ 12,50</span>
                <button class="menu-card__add" onclick="addToCart('Carpaccio di Manzo', 12.50)">+ Toevoegen</button>
              </div>
            </footer>
          </article>

          ── Pasta ──
          <article class="menu-card" data-category="pasta" data-name="tagliatelle al ragù"
            data-sub="langzaam gegaard rundvlees">
            <div class="menu-card__image" role="img" aria-label="Tagliatelle al Ragù">
              <svg viewBox="0 0 320 200" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <rect width="320" height="200" fill="#BCB8B1" />
                <line x1="0" y1="0" x2="320" y2="200" stroke="#463F3A" stroke-width="1" />
                <line x1="320" y1="0" x2="0" y2="200" stroke="#463F3A" stroke-width="1" />
              </svg>
            </div>
            <footer class="menu-card__footer">
              <div class="menu-card__info">
                <h2 class="menu-card__name">Tagliatelle al Ragù</h2>
                <p class="menu-card__sub">Langzaam gegaard rundvlees</p>
              </div>
              <div class="menu-card__actions">
                <span class="menu-card__price">€ 17,50</span>
                <button class="menu-card__add" onclick="addToCart('Tagliatelle al Ragù', 17.50)">+ Toevoegen</button>
              </div>
            </footer>
          </article>

          <article class="menu-card" data-category="pasta" data-name="risotto ai funghi"
            data-sub="wilde paddenstoelen, parmigiano">
            <div class="menu-card__image" role="img" aria-label="Risotto ai Funghi">
              <svg viewBox="0 0 320 200" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <rect width="320" height="200" fill="#BCB8B1" />
                <line x1="0" y1="0" x2="320" y2="200" stroke="#463F3A" stroke-width="1" />
                <line x1="320" y1="0" x2="0" y2="200" stroke="#463F3A" stroke-width="1" />
              </svg>
            </div>
            <footer class="menu-card__footer">
              <div class="menu-card__info">
                <h2 class="menu-card__name">Risotto ai Funghi</h2>
                <p class="menu-card__sub">Wilde paddenstoelen, Parmigiano</p>
              </div>
              <div class="menu-card__actions">
                <span class="menu-card__price">€ 16,00</span>
                <button class="menu-card__add" onclick="addToCart('Risotto ai Funghi', 16.00)">+ Toevoegen</button>
              </div>
            </footer>
          </article>

          <article class="menu-card" data-category="pasta" data-name="spaghetti alle vongole"
            data-sub="mosselen, witte wijn, peterselie">
            <div class="menu-card__image" role="img" aria-label="Spaghetti alle Vongole">
              <svg viewBox="0 0 320 200" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <rect width="320" height="200" fill="#BCB8B1" />
                <line x1="0" y1="0" x2="320" y2="200" stroke="#463F3A" stroke-width="1" />
                <line x1="320" y1="0" x2="0" y2="200" stroke="#463F3A" stroke-width="1" />
              </svg>
            </div>
            <footer class="menu-card__footer">
              <div class="menu-card__info">
                <h2 class="menu-card__name">Spaghetti alle Vongole</h2>
                <p class="menu-card__sub">Mosselen, witte wijn, peterselie</p>
              </div>
              <div class="menu-card__actions">
                <span class="menu-card__price">€ 18,50</span>
                <button class="menu-card__add" onclick="addToCart('Spaghetti alle Vongole', 18.50)">+ Toevoegen</button>
              </div>
            </footer>
          </article>

          <article class="menu-card" data-category="pasta" data-name="branzino al forno"
            data-sub="gegrilde zeebaars, citroen">
            <div class="menu-card__image" role="img" aria-label="Branzino al Forno">
              <svg viewBox="0 0 320 200" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <rect width="320" height="200" fill="#BCB8B1" />
                <line x1="0" y1="0" x2="320" y2="200" stroke="#463F3A" stroke-width="1" />
                <line x1="320" y1="0" x2="0" y2="200" stroke="#463F3A" stroke-width="1" />
              </svg>
            </div>
            <footer class="menu-card__footer">
              <div class="menu-card__info">
                <h2 class="menu-card__name">Branzino al Forno</h2>
                <p class="menu-card__sub">Gegrilde zeebaars, citroen</p>
              </div>
              <div class="menu-card__actions">
                <span class="menu-card__price">€ 22,00</span>
                <button class="menu-card__add" onclick="addToCart('Branzino al Forno', 22.00)">+ Toevoegen</button>
              </div>
            </footer>
          </article>

          ── Dessert ──
          <article class="menu-card" data-category="dessert" data-name="panna cotta al limone"
            data-sub="vanille, siciliaanse citroen">
            <div class="menu-card__image" role="img" aria-label="Panna Cotta al Limone">
              <svg viewBox="0 0 320 200" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <rect width="320" height="200" fill="#BCB8B1" />
                <line x1="0" y1="0" x2="320" y2="200" stroke="#463F3A" stroke-width="1" />
                <line x1="320" y1="0" x2="0" y2="200" stroke="#463F3A" stroke-width="1" />
              </svg>
            </div>
            <footer class="menu-card__footer">
              <div class="menu-card__info">
                <h2 class="menu-card__name">Panna Cotta al Limone</h2>
                <p class="menu-card__sub">Vanille, Siciliaanse citroen</p>
              </div>
              <div class="menu-card__actions">
                <span class="menu-card__price">€ 8,50</span>
                <button class="menu-card__add" onclick="addToCart('Panna Cotta al Limone', 8.50)">+ Toevoegen</button>
              </div>
            </footer>
          </article>

          <article class="menu-card" data-category="dessert" data-name="tiramisù della casa"
            data-sub="mascarpone, espresso, amaretto">
            <div class="menu-card__image" role="img" aria-label="Tiramisù della Casa">
              <svg viewBox="0 0 320 200" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <rect width="320" height="200" fill="#BCB8B1" />
                <line x1="0" y1="0" x2="320" y2="200" stroke="#463F3A" stroke-width="1" />
                <line x1="320" y1="0" x2="0" y2="200" stroke="#463F3A" stroke-width="1" />
              </svg>
            </div>
            <footer class="menu-card__footer">
              <div class="menu-card__info">
                <h2 class="menu-card__name">Tiramisù della Casa</h2>
                <p class="menu-card__sub">Mascarpone, espresso, amaretto</p>
              </div>
              <div class="menu-card__actions">
                <span class="menu-card__price">€ 9,00</span>
                <button class="menu-card__add" onclick="addToCart('Tiramisù della Casa', 9.00)">+ Toevoegen</button>
              </div>
            </footer>
          </article>

          <!-- No results message (inside grid) -->
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