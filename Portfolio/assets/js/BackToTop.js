class BackToTop {
    constructor(btn) {
        this.mybutton = document.querySelector(btn)        
        window.addEventListener("scroll", this.scrollFunction.bind(this))
    }
    scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            this.mybutton.style.bottom = "10px"
        } else {
            this.mybutton.style.bottom = "-80px"
        }
    }
}

