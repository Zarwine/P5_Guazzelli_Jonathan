class AccountPagination
{
    constructor(article,comment,reported_comment){
        this.articles = document.getElementsByClassName(article)
        this.comments = document.getElementsByClassName(comment)
        this.reported_comments = document.getElementsByClassName(reported_comment)
    }
}
let accountPagination = new AccountPagination('article_content','article_comment_account',"reported_comment")