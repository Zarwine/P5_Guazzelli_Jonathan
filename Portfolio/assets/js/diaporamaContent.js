class DiaporamaContent {
    constructor() {
       this.initStation()
 
    }
    //requête avec une API fetch pour récupérer les ressources de manière asynchrone (promesse)
    initStation = async function () {
       let response = await fetch(this.api_url)
       let diapoData = await response.json()

       diapoData.forEach(diapo => {

 
       });
 
    };
 
}

 let diapocontent = new DiaporamaContent
 