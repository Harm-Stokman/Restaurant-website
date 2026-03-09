/* ── State ── */
    const cart = {};
    const DELIVERY = 2.50;

    /* ── Helpers ── */
    const fmt = n => '€\u00a0' + n.toFixed(2).replace('.', ',');
    const $   = id => document.getElementById(id);

    /* ────────────────────────────────────────
       SEARCH FILTER
    ──────────────────────────────────────── */
    function filterMenu(query) {
      const q = query.trim().toLowerCase();
      const cards = document.querySelectorAll('.menu-card');
      let visible = 0;

      cards.forEach(card => {
        const name = card.dataset.name  || '';
        const sub  = card.dataset.sub   || '';
        const cat  = card.dataset.category || '';
        const match = !q || name.includes(q) || sub.includes(q) || cat.includes(q);
        card.hidden = !match;
        if (match) visible++;
      });

      $('js-no-results').style.display = visible === 0 ? 'block' : 'none';
    }

    /* ────────────────────────────────────────
       CART
    ──────────────────────────────────────── */
    function addToCart(name, price) {
      cart[name] ? cart[name].qty++ : (cart[name] = { price, qty: 1 });
      renderCart();
      showToast(name + ' toegevoegd');
    }

    function removeFromCart(name) {
      delete cart[name];
      renderCart();
    }

    function changeQty(name, delta) {
      cart[name].qty += delta;
      if (cart[name].qty <= 0) delete cart[name];
      renderCart();
    }

    function renderCart() {
      const list   = $('js-cart-list');
      const empty  = $('js-cart-empty');
      const totals = $('js-cart-totals');
      const cta    = $('js-cart-cta');
      const keys   = Object.keys(cart);

      /* remove old items */
      [...list.children].forEach(el => { if (el !== empty) el.remove(); });

      if (keys.length === 0) {
        empty.hidden  = false;
        totals.hidden = true;
        cta.hidden    = false;
        return;
      }

      empty.hidden  = true;
      totals.hidden = false;
      cta.hidden    = true;

      let sub = 0;

      keys.forEach(name => {
        const { price, qty } = cart[name];
        const lineTotal = price * qty;
        sub += lineTotal;

        const item = document.createElement('div');
        item.className = 'cart__item';
        item.innerHTML = `
          <div class="cart__item-left">
            <p class="cart__item-name">${name}</p>
            <p class="cart__item-unit">${fmt(price)} p.st.</p>
            <div class="cart__qty">
              <button class="cart__qty-btn" aria-label="Minder" onclick="changeQty('${name}', -1)">−</button>
              <span class="cart__qty-num">${qty}</span>
              <button class="cart__qty-btn" aria-label="Meer"   onclick="changeQty('${name}',  1)">+</button>
            </div>
          </div>
          <div class="cart__item-right">
            <span class="cart__item-total">${fmt(lineTotal)}</span>
            <button class="cart__remove" aria-label="Verwijder ${name}" onclick="removeFromCart('${name}')">Verwijder</button>
          </div>
        `;
        list.appendChild(item);
      });

      $('js-subtotal').textContent   = fmt(sub);
      $('js-grandtotal').textContent = fmt(sub + DELIVERY);
    }

    /* ────────────────────────────────────────
       TOAST
    ──────────────────────────────────────── */
    function showToast(msg) {
      const t = $('js-toast');
      t.textContent = msg;
      t.classList.add('toast--show');
      clearTimeout(t._timer);
      t._timer = setTimeout(() => t.classList.remove('toast--show'), 2400);
    }

    /* ────────────────────────────────────────
       CHECKOUT
    ──────────────────────────────────────── */
    function checkout() {
      showToast('Bestelling geplaatst — dankuwel!');
      Object.keys(cart).forEach(k => delete cart[k]);
      renderCart();
    }