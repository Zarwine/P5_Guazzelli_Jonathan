 
 var requete = new XMLHttpRequest();
 requete.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200){
       var myObj = JSON.parse(this.responseText)
       console.log(myObj)
    }
 }
requete.open('GET','https://jogu.fr/home.php', true)
requete.send()
 