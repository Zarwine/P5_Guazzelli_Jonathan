class RegisterManager {
    constructor(){
        this.username = document.getElementById("username");
        this.email = document.getElementById("email")
        this.password = document.getElementById("password")
        this.password_confirm = document.getElementById("password_confirm")
        this.btn_register = document.getElementById("btn_register")

        this.error_username = document.getElementById("error_username");
        this.error_email = document.getElementById("error_email")
        this.error_password = document.getElementById("error_password")
        this.error_password_confirm = document.getElementById("error_password_confirm")


        this.btn_register.addEventListener("click", e=>{

            this.formValidation()
        })
    }

    formValidation(){
                //regex pour les champs à compléter
                let formatValid = /^[a-zA-Z*(é|è|à|ù)]+(([',. -][a-zA-Z ])?[a-zA-Z*(é|è|à|ù)]*)*$/
                let formatEmail = /^(([^<>()[]\.,;:s@]+(.[^<>()[]\.,;:s@]+)*)|(.+))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/

                //nettoyage des précédents messages d'erreurs
                this.error_username.textContent = ""
                this.error_email.textContent = ""
                this.error_password.textContent = ""
                this.error_password_confirm.textContent = ""

                //Revue des conditions d'erreurs et affichage des messages correspondants
                if (this.username.validity.valueMissing) {
                    event.preventDefault()
                    this.error_username.textContent = "Pseudo manquant"
                    this.error_username.style.color = 'red'
                }
                else if (formatValid.test(this.username.value) == false) {
                    event.preventDefault()
                    this.error_username.textContent = "Saisie incorrecte"
                    this.error_username.style.color = 'red'
                } 
                if (this.email.validity.valueMissing) {
                    event.preventDefault()
                    this.error_email.textContent = "Email manquant"
                    this.error_email.style.color = 'red'
                } else if (formatEmail.test(this.email.value) == false) {
                    event.preventDefault()
                    this.error_email.textContent = "Format d'Email incorrect"
                    this.error_email.style.color = 'red'
                }
                if (this.password.validity.valueMissing) {
                    event.preventDefault()
                    this.error_password.textContent = "Mot de passe manquant"
                    this.error_password.style.color = 'red'
                } 
                if (this.password_confirm.validity.valueMissing) {
                    event.preventDefault()
                    this.error_password_confirm.textContent = "Confirmation du mot de passe manquante"
                    this.error_password_confirm.style.color = 'red'
                } 
                if (this.password.value != this.password_confirm.value) {
                    event.preventDefault()
                    this.error_password_confirm.textContent = "Les mots de passe ne correspondent pas"
                    this.error_password_confirm.style.color = 'red'
                }

    }
}
let registerManager = new RegisterManager()