class siteButton extends HTMLElement {
    constructor() {
        super();


        const shadow = this.attachShadow({ mode: 'open' });

        shadow.innerHTML = <button> </button>
    }
}

customElements.define("site-button", siteButton);