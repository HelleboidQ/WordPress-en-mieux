<div class="container">

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">

                <div class="card hovercard">
                    <div class="cardheader">

                    </div>
                    <div class="avatar">
                        <img alt="" src="http://lorempixel.com/100/100/people/9/">
                    </div>
                    <div class="info">
                        <div class="title">
                            <a target="_blank" href="http://scripteden.com/">Script Eden</a>
                        </div>
                        <div class="desc">Passionate designer</div>
                        <div class="desc">Curious developer</div>
                        <div class="desc">Tech geek</div>
                    </div>
                    <div class="bottom">
                        <a class="btn btn-primary btn-twitter btn-sm" href="https://twitter.com/webmaniac">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" rel="publisher"
                           href="https://plus.google.com/+ahmshahnuralam">
                            <i class="fa fa-google-plus"></i>
                        </a>
                        <a class="btn btn-primary btn-sm" rel="publisher"
                           href="https://plus.google.com/shahnuralam">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" rel="publisher" href="https://plus.google.com/shahnuralam">
                            <i class="fa fa-behance"></i>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>

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