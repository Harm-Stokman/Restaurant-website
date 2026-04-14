// class Menu extends HTMLElement {
//   connectedCallBack() {

//     const gerechtnaam = this.getAttribute("Gerechtnaam");
//     // const ingrediënten = this.getAttribute("Ingredënten");
//     // const prijs = this.getAttribute("Prijs");

//     this.innerHTML = `
//      <article>
//               <div>
//               </div>
//               <footer>
//                 <div>
//                    <h2>${gerechtnaam}</h2>;
//                    <p>${ingrediënten}</p>;  
//                 </div>
//                 <div> 
//                    <span> ${prijs}</span>; 
//                  </div>
//               </footer>
//        </article>
// `;
//   }
// }

// customElements.define("menu-item", Menu);


class MenuItem extends HTMLElement {

  connectedCallback() {



    const gerechtnaam = this.getAttribute("Gerechtnaam");
    const ingrediënten = this.getAttribute("Ingrediënten");
    const prijs = this.getAttribute("Prijs");

    
    this.innerHTML = `

    <article class="menu-card">
      <div class="menu-card_image" role="img">
      </div>
     <footer class="menu-card__footer">
      <div class="menu-card__info">
        <h2>${gerechtnaam}</h2>
        <p>${ingrediënten}</p>
      </div>
      <div class="menu-card__actions">
        <span> ${prijs} </span>
      </div>
     </footer>
    </article>
`;
  }

}

customElements.define("menu-item", MenuItem);