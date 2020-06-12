class LoginManager {
    constructor(){
        this.username = document.getElementById("username");
        this.password = document.getElementById("password")
        this.btn_login = document.getElementById("btn_login")

        this.error_login = document.getElementById("error_login")
        this.error_username = document.getElementById("error_username")


        this.btn_login.addEventListener("click", e=>{
            this.formValidation()
        })
    }

    formValidation(){
                //nettoyage des précédents messages d'erreurs
                this.error_login.textContent = ""
                this.error_username.textContent = ""

                //Revue des conditions d'erreurs et affichage des messages correspondants
                if (this.username.validity.valueMissing) {
                    event.preventDefault()
                    this.error_username.textContent = "Pseudo manquant"
                    this.error_username.style.color = 'red'
                }
                if (this.password.validity.valueMissing) {
                    event.preventDefault()
                    this.error_login.textContent = "Mot de passe manquant"
                    this.error_login.style.color = 'red'
                } 

    }
}
