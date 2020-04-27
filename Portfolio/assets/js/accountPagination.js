class AccountPagination {
    constructor(comment, com_prev, com_next, page) {
        this.comments = document.getElementsByClassName(comment)
        this.prev_btn = document.getElementById(com_prev)
        this.next_btn = document.getElementById(com_next)
        this.pages = document.getElementsByClassName(page)

        //Définis le nombre total de page en divisant le nombre de commentaire par pageContent(6) et
        //Ajoute une page supplémentaire s'il existe un modulo à la division.
        this.pageContent = 6
        this.totalPage // = 3 pour l'exemple
        this.currentPageIndicator = 1 //indique la page actuelle
        this.initPageNumber(this.totalPage)

        //Injecte les commentaires aux pages
        this.index = 0
        this.pageNumber = 0
        this.page = [] //Array(Nbr de page)(page) exemple : this.page[1][0]
        this.pushComment()

        //Affiche la première page de commentaire
        this.initComment()

        this.pageIndex = 0

        this.prev_btn.addEventListener('click', e => {
            this.slidePrev()
        })
        this.next_btn.addEventListener('click', e => {
            this.slideNext()
        })


    }
    slidePrev() {

        let totalPage = this.totalPage
        let currentPage = this.page[this.pageIndex]

        for (let i = 0; i < this.pageContent; i++) {
            let comment = currentPage[0][i]

            if (comment != undefined) {
                if (comment.classList.contains("com_visible")) {
                    comment.classList.replace("com_visible", "com_invisible")
                }
            }
        }

        if (this.pageIndex <= 0) {
            this.pageIndex = totalPage - 1
        } else {
            this.pageIndex--
        }

        this.currentPageIndicator.classList.remove("page-active")
        this.currentPageIndicator = document.querySelector(".page" + (this.pageIndex + 1))
        this.currentPageIndicator.classList.add("page-active")

        currentPage = this.page[this.pageIndex]

        for (let i = 0; i < this.pageContent; i++) {
            let comment = currentPage[0][i]
            if (comment != undefined) {
                if (comment.classList.contains("com_invisible")) {
                    comment.classList.replace("com_invisible", "com_visible")
                }
            }
        }
    }
    slideNext() {
        let totalPage = this.totalPage
        let currentPage = this.page[this.pageIndex]

        for (let i = 0; i < this.pageContent; i++) {
            let comment = currentPage[0][i]



            if (comment != undefined) {
                if (comment.classList.contains("com_visible")) {
                    comment.classList.replace("com_visible", "com_invisible")
                }
            }
        }

        if (this.pageIndex >= totalPage - 1) {
            this.pageIndex = 0
        } else {
            this.pageIndex++
        }

        this.currentPageIndicator.classList.remove("page-active")
        this.currentPageIndicator = document.querySelector(".page" + (this.pageIndex + 1))
        this.currentPageIndicator.classList.add("page-active")

        currentPage = this.page[this.pageIndex]


        for (let i = 0; i < this.pageContent; i++) {
            let comment = currentPage[0][i]

            if (comment != undefined) {
                if (comment.classList.contains("com_invisible")) {
                    comment.classList.replace("com_invisible", "com_visible")
                }
            }
        }

    }
    goToPage(index) {
        let currentPage = this.page[this.pageIndex]

        for (let i = 0; i < this.pageContent; i++) {
            let comment = currentPage[0][i]
            if (comment != undefined) {
                if (comment.classList.contains("com_visible")) {
                    comment.classList.replace("com_visible", "com_invisible")
                }
            }
        }
        this.currentPageIndicator.classList.remove("page-active")
        this.currentPageIndicator = document.querySelector(".page" + (index + 1))
        this.currentPageIndicator.classList.add("page-active")

        currentPage = this.page[index]


        for (let i = 0; i < this.pageContent; i++) {
            let comment = currentPage[0][i]

            if (comment != undefined) {
                if (comment.classList.contains("com_invisible")) {
                    comment.classList.replace("com_invisible", "com_visible")
                }
            }
        }
        this.pageIndex = index
    }

    initPageNumber(totalPage) {

        totalPage = Math.floor(this.comments.length / this.pageContent)
        let lastPage = this.comments.length % this.pageContent

        if (lastPage != 0) {
            totalPage++
        }
        this.totalPage = totalPage


        for (let i = 0; i < totalPage; i++) {
            let pageContainer = document.getElementById("com_pagination_pages")
            let newPage = document.createElement("div")
            newPage.className = "page page" + (i + 1)
            newPage.innerText = i + 1
            pageContainer.appendChild(newPage)

            newPage.addEventListener("click", e => {
                this.goToPage(i)
            })
        }
        this.currentPageIndicator = document.querySelector(".page1")
        this.currentPageIndicator.classList.add("page-active")
    }
    pushComment() {
        for (let i = 0; i < this.totalPage; i++) {
            this.pageNumber++
            let pageContent = []

            for (let i = 0; i < this.pageContent; i++) {
                pageContent.push(this.comments[this.index])
                this.index++
            }
            this.page.push([pageContent])
        }
    }
    initComment() {
        for (let i = 0; i < this.pageContent; i++) {
            if (this.comments[i] != undefined) {
                if (this.comments[i].classList.contains("com_invisible")) {
                    this.comments[i].classList.replace('com_invisible', "com_visible")
                }
            }
        }
    }
}
let accountPagination = new AccountPagination('article_comment_account', "com_pagination_prev", "com_pagination_next", "page")