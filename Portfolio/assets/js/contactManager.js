class ContactManager {
    constructor() {
        this.username = document.getElementById("username");
        this.email = document.getElementById("email")
        this.message = document.getElementById("comment_textarea")

        this.btn_register = document.getElementById("btn_contact")

        this.error_username = document.getElementById("error_username");
        this.error_email = document.getElementById("error_email")
        this.error_message = document.getElementById("error_message")


        this.btn_register.addEventListener("click", e => {

            this.formValidation()
        })
    }

    formValidation() {
        //regex pour les champs à compléter
        let formatValid = /^[a-zA-Z*(é|è|à|ù)]+(([',. -][a-zA-Z ])?[a-zA-Z*(é|è|à|ù)]*)*$/
        let formatEmail = /^(([^<>()[]\.,;:s@]+(.[^<>()[]\.,;:s@]+)*)|(.+))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/

        //nettoyage des précédents messages d'erreurs
        this.error_username.textContent = ""
        this.error_email.textContent = ""
        this.error_message.textContent = ""

        //Revue des conditions d'erreurs et affichage des messages correspondants

        if (formatValid.test(this.username.value) == false) {
            event.preventDefault()
            this.error_username.textContent = "Saisie incorrecte"
            this.error_username.style.color = 'red'
        } else if (this.username.validity.valueMissing) {
            event.preventDefault()
            this.error_username.textContent = "Pseudo manquant"
            this.error_username.style.color = 'red'
        }
        if (formatEmail.test(this.email.value) == false) {
            event.preventDefault()
            this.error_email.textContent = "Format d'Email incorrect"
            this.error_email.style.color = 'red'
        } else if (this.email.validity.valueMissing) {
            event.preventDefault()
            this.error_email.textContent = "Email manquant"
            this.error_email.style.color = 'red'
        }

        if (this.message.value == "") {
            event.preventDefault()
            this.error_message.textContent = "Message vide"
            this.error_message.style.color = 'red'
        }

    }
}
