<?php
session_start();
if(isset($_SESSION['auth'])){
    header('Location: account');
    exit();
}
?>
<div class="page_container">

<h2>Se connecter</h2>

<form class="jf_form" action="<?php echo HOST;?>login_confirm" method="POST">
    <div class="form-group">
        <label for="">Pseudo ou email</label>
        <input id="username" type="text" name="username" required/>
        <div id="error_username"></div>
    </div>
    <div class="form-group">
        <label for="">Mot de passe <a href="<?php echo HOST;?>forget">(Mot de passe oublié ?)</a></label>
        <input id="password" type="password" name="password" required/>
        <div id="error_login"></div>
    </div>
    <button id="btn_login" type="submit" class="button_jf">Se connecter</button>

</form>

</div>
<script src="<?php echo ASSETS; ?>js/login.js"></script>