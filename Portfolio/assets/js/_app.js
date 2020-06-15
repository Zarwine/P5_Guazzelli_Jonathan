if (typeof Account !== "undefined") {
    var account = new Account('account_view_article', 'view_account', 'account_view_comment', 'view_comment', 'account_view_comment_reported', 'view_comment_reported');
}
if (typeof AccountPagination !== "undefined") {
    var accountPagination = new AccountPagination('article_comment_account', "com_pagination_prev", "com_pagination_next", "page")
}
if (typeof Alert !== "undefined") {
    var alertSystem = new Alert()
}
if (typeof ContactManager !== "undefined") {
    var contactManager = new ContactManager()
}
if (typeof LoginManager !== "undefined") {
    var loginManager = new LoginManager()
}
if (typeof RegisterManager !== "undefined") {
    var registerManager = new RegisterManager()
}
if (typeof DiapoJson !== "undefined") {
    var diapoJson = new DiapoJson("section_portfolio_JSON", 'slider_prev_bottom', 'slider_next_bottom')
}