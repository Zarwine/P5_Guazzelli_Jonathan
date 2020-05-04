class DiapoJson {
   constructor(DOMLocation, slider_prev, slider_next) {
      //this.chapitre = document.getElementsByClassName(chapitre)
      this.sliderPrev = document.getElementById(slider_prev)
      this.sliderNext = document.getElementById(slider_next)
      this.index = 0
      this.chapitresDiapo = []


      //récupère les donnés Json et ajoute les articles dans le document
      this.findJson()
      this.container = document.querySelector("#" + DOMLocation) //Defini le container du carousel
      this.articleIndex = 0                                       //index des container des articles

      this.sliderNext.addEventListener('click', e => {

         this.slideNext(this.chapitresDiapo)
      });

      this.sliderPrev.addEventListener('click', e => {

         this.slidePrev(this.chapitresDiapo)
      });

      window.addEventListener('keyup', e => {
         if (e.key === 'ArrowRight' || e.key === 'Right') {
 
             this.slideNext(this.chapitresDiapo)
         }
         else if (e.key === 'ArrowLeft' || e.key === 'Left') {

             this.slidePrev(this.chapitresDiapo)
         }
     })

   }

   slideNext(chapitresDiapo) {

      event.preventDefault()
      let currentChapitre = chapitresDiapo[this.index]
      let picturesNumber = chapitresDiapo.length - 1

      if (currentChapitre.classList.contains("visible")) {
         currentChapitre.classList.replace("visible", "invisible")
      }

      if (this.index >= picturesNumber) {
         this.index = 0
      }
      else {
         this.index++
      }
      currentChapitre = chapitresDiapo[this.index]
      if (currentChapitre.classList.contains("invisible")) {
         currentChapitre.classList.replace("invisible", "visible")
      }
   }

   slidePrev(chapitresDiapo) {
      event.preventDefault()
      let currentChapitre = chapitresDiapo[this.index]
      let picturesNumber = chapitresDiapo.length - 1

      if (currentChapitre.classList.contains("visible")) {
         currentChapitre.classList.replace("visible", "invisible")
      }

      if (this.index <= 0) {
         this.index = picturesNumber
      }
      else {
         this.index--
      }
      currentChapitre = chapitresDiapo[this.index]
      if (currentChapitre.classList.contains("invisible")) {
         currentChapitre.classList.replace("invisible", "visible")
      }

   }
   findJson = async function () {
      let response = await fetch("https://jogu.fr/portfolio")
      let articles = await response.json()
      articles.forEach(article => {
         this.articleIndex++

         let articleContainer = document.createElement("div")           //container de l'article
         articleContainer.classList.add("article" + this.articleIndex)
         articleContainer.classList.add("invisible")
         articleContainer.classList.add("articleJson")

         let articleTitre = document.createElement("h3")                //titre de l'article
         articleTitre.innerHTML = article.name
         articleContainer.appendChild(articleTitre)

         let articleContentContainer = document.createElement("div")    //contenu de l'article
         articleContentContainer.innerHTML = article.content
         articleContainer.appendChild(articleContentContainer)

         this.container.appendChild(articleContainer)
         diapoJson.chapitresDiapo.push(articleContainer)
         //console.log(diapoJson.chapitresDiapo)

      })
      let article1 = document.querySelector('.article1')
      article1.classList.replace('invisible', "visible")
   }

}

let diapoJson = new DiapoJson("section_portfolio_JSON", 'slider_prev_bottom', 'slider_next_bottom')
//<section id="section_portfolio_JSON">
//<div id="pf_articles_JSON"><?php echo $pf_articles_JSON?></div>

      //stripHTML(text) { //Supprime tout ce qui se trouve entre <>
      //   return text.replace(/<.*?>/gm, '');
      //}
      //findJson() {
      //   var requete = new XMLHttpRequest();
      //   requete.onreadystatechange = function () {
      //      if (this.readyState == 4 && this.status == 200) {
      //         var articles= this.responseText
      //         articles.forEach( article => {
      //            console.log(article)
      //         })
      //      }
      //   }
      //   requete.open('GET', 'https://jogu.fr/portfolio', true)
      //   requete.send()
      //}




