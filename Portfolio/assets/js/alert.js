class Alert {
    constructor() {
        let jf_alert = document.querySelectorAll(".link_jf_alert")
        jf_alert.forEach(element => {
            element.addEventListener('click', this.jf_Alert)
        })
    }
    jf_Alert() {
        let stop = window.confirm("Voulez vous effectuer cette action ?")
        if (stop == true) {
            console.log("action effectuée")
        } else {
            event.preventDefault()
        }
    }
}