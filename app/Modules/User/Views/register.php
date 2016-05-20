<div class="container">
    <form method='post' action="<?php echo DIR;?>utilisateur/inscription">
        <h2 class="form-signin-heading">Inscription</h2>
        <label>Login : </label>
        <input class="form-control" type='text' name="login" placeholder="Votre login" required /><br />
        <label>Email : </label>
        <input class="form-control" type='email' name="email" placeholder="Votre login" required /><br />
        <label>Mot de passe :</label>
        <input class="form-control" type='password' name="password" placeholder="Votre mot de passe" required /><br />
        <label>Mot de passe : </label>
        <input class="form-control" type='password' name="password-again" placeholder="Votre mot de passe" required /><br />
        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Valider" />
    </form>

</div> <!-- /container -->