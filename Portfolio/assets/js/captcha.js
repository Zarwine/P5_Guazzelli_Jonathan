class Captcha {
    constructor(container, captcha, first_number, second_number, input, bouton, reset_bouton) {
        this.container = document.getElementById(container)
        this.captcha = document.getElementById(captcha)
        this.first_number_container = document.getElementById(first_number)
        this.second_number_container = document.getElementById(second_number)
        this.input = document.getElementById(input)
        this.btn = document.getElementById(bouton)
        this.reset_btn = document.getElementById(reset_bouton)
        this.result = 0

        this.createCaptcha(0, 20)

        this.btn.addEventListener("click", () => {
            this.validCaptcha()
        })
        this.reset_btn.addEventListener("click", () => {
            this.createCaptcha(0, 20)
        })
    }

    createCaptcha(min, max) {
        min = Math.ceil(min)
        max = Math.floor(max)
        let first_number = Math.floor(Math.random() * (max - min + 1)) + min
        let second_number = Math.floor(Math.random() * (max - min + 1)) + min

        this.result = first_number + second_number
        this.first_number_container.innerText = first_number
        this.second_number_container.innerText = second_number
    }
    validCaptcha() {
        if (this.result != this.input.value) {
            alert("Merci de donner le résultat correct")
            this.reset_btn.classList.add("visible_important")
            event.preventDefault()
        }
    }

}

let captcha = new Captcha("captcha_container", "captcha", "captcha_first", "captcha_second", "captcha_input", "btn_contact","refresh_captcha")
