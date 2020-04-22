<?php session_start();
?>
<div class="page_container">
<h2>S'inscrire</h2>

<form class="jf_form" action="register_confirm" method="POST">
    <div class="form-group">
        <label for="">Pseudo</label>
        <input id="username" type="text" name="username" required/>
        <div id="error_username"></div>
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input id="email" type="email" name="email" required/>
        <div id="error_email"></div>
    </div>
    <div class="form-group">
        <label for="">Mot de passe</label>
        <input id="password" type="password" name="password" required/>
        <div id="error_password"></div>
    </div>
    <div class="form-group">
        <label for="">Confirmation du mot de passe</label>
        <input id="password_confirm" type="password" name="password_confirm" required/>
        <div id="error_password_confirm"></div>
    </div>

    <button id="btn_register" type="submit" class="button_jf">S'inscrire</button>

</form>
</div>
<script src="<?php echo ASSETS; ?>js/register.js"></script>