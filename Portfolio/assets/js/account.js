class Account {
    constructor(art_target, art_view, com_target, com_view, com_target_r, com_view_r) {
        this.jf_articles = document.getElementById(art_target)
        this.jf_comments = document.getElementById(com_target)
        this.jf_comments_r = document.getElementById(com_target_r)
        
        let view_button = document.querySelector("."+art_view)        
        let com_view_button = document.querySelector("."+com_view)
        let com_view_button_r = document.querySelector("."+com_view_r)

        view_button.addEventListener('click', this.showAllArticle.bind(this))
        com_view_button.addEventListener('click', this.showAllComment.bind(this))
        com_view_button_r.addEventListener('click', this.showAllComment_r.bind(this))
    }
    showAllArticle() {
        this.toggleView(this.jf_articles)
    }
    showAllComment() {
        this.toggleView(this.jf_comments)
        this.clearView(this.jf_comments_r)
    }
    showAllComment_r() {
        this.toggleView(this.jf_comments_r)
        this.clearView(this.jf_comments)
    }
    toggleView(target) {
        if (target.classList.contains('container_not_visible')) {
            target.classList.replace('container_not_visible', 'container_visible')
        } else {
            target.classList.replace('container_visible', 'container_not_visible')
        }
    }
    clearView(target) {
        if (target.classList.contains('container_visible')) {
            target.classList.replace('container_visible', 'container_not_visible')
        }
    }

}

