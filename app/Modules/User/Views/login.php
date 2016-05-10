<div class="container">


    <form method='post' action="<?php echo DIR;?>utilisateur/login">
        <h2 class="form-signin-heading">Connexion</h2>
        <label>Login : </label>
        <input class="form-control" type='text' name="login" placeholder="Votre login" required /><br />
        <label>Mot de passe : </label>
        <input class="form-control" type='password' name="password" placeholder="Votre mot de passe" required /><br />
        <label>Rester connecté </label>
        <input type='checkbox' name="remember"/>
        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Valider" />
    </form>

</div> <!-- /container -->