<div class="container">
    <form method='post' action="<?php echo DIR;?>utilisateur/modification">
        <h2 class="form-signin-heading">Modification</h2>
        <label>Mot de passe courant</label>
        <input class="form-control" type='password' name="current_password" placeholder="Votre mot de passe courant" required /><br />
        <label>Mot de passe</label>
        <input  class="form-control" type='password' name="password" placeholder="Votre nouveau mot de passe" required /><br />
        <label>Mot de passe</label>
        <input class="form-control" type='password' name="password-again" placeholder="Votre nouveau mot de passe" required /><br />
        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Valider" />
    </form>
</div>