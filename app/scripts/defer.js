class menuItem extends HTMLElement {
    constructor() {
        super();


        const shadow = this.attachShadow({ mode: 'open' });

        shadow.innerHTML = `
       <link rel="stylesheet" href="css/style.css" />
          <article class="menu-card" data-category="antipasti" data-name="bruschetta al pomodoro"
            data-sub="tomaat, basilicum, knoflook">
            <div class="menu-card__image" role="img" aria-label="Bruschetta al Pomodoro">
              <svg viewBox="0 0 320 200" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <rect width="320" height="200" fill="#BCB8B1" />
                <line x1="0" y1="0" x2="320" y2="200" stroke="#463F3A" stroke-width="1" />
                <line x1="320" y1="0" x2="0" y2="200" stroke="#463F3A" stroke-width="1" />
              </svg>
            </div>
            <footer class="menu-card__footer">
              <div class="menu-card__info">
                <h2 class="menu-card__name">Bruschetta al Pomodoro</h2>
                <p class="menu-card__sub">Tomaat, basilicum, knoflook</p>
              </div>
              <div class="menu-card__actions">
                <span class="menu-card__price">€ 7,50</span>
                <button class="menu-card__add" onclick="addToCart('Bruschetta al Pomodoro', 7.50)">+ Toevoegen</button>
              </div>
            </footer>
          </article>
        `;
    }
}

customElements.define("menu-item", menuItem);