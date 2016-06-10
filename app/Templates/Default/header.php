<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title . ' - ' . SITETITLE; ?></title>
        <?php
        echo $meta; //place to pass data / plugable hook zone
        Assets::css([
            'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css',
            Url::templatePath() . 'css/style.css',
            Url::templatePath() . 'css/theme.css',
            Url::templatePath() . 'css/sass.scss',
            Url::templatePath() . 'css/casseBrique.css',
            Url::templatePath() . 'css/sweetalert.css'
        ]);
        echo $css; //place to pass data / plugable hook zone 
        ?>
        <script src="//cdn.ckeditor.com/4.5.8/standard/ckeditor.js"></script> 

        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script>

        <?php
        Assets::js([
            Url::templatePath() . 'js/cb.js',
            Url::templatePath() . 'js/sweetalert.min.js'
        ]);
        ?>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= SITEURL ?>"><?= SITETITLE ?></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="<?= SITEURL ?>">Accueil <span class="sr-only">(current)</span></a></li>
                        <li><a href="<?= SITEURL ?>article">Article</a></li>
                        <li><a href="<?= SITEURL ?>categorie">Catégorie</a></li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input id='recherche' type="text" class="form-control" placeholder="Rechercher..." autocomplete="off">
                        </div>
                        <ul id="suggest"></ul>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if (Session::get('loggedin') != 1) { ?>
                            <li><a href="<?= SITEURL ?>utilisateur/login">Login</a></li>
                            <li><a href="<?= SITEURL ?>utilisateur/inscription">Inscription</a></li>
                        <?php } ?>
                        <?php if (Session::get('admin') == 1 && Session::get('loggedin') == 1) { ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                   aria-expanded="false">Admin <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= SITEURL ?>admin/users">Gestion des utilisateurs</a></li>
                                    <li><a href="<?= SITEURL ?>admin/categories">Gestion des catégories</a></li>
                                    <li><a href="<?= SITEURL ?>admin/articles">Gestion des articles</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?= SITEURL ?>utilisateur/logout">Logout</a></li>
                                </ul>
                            </li>
                        <?php } else if (Session::get('loggedin') == 1) { ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                   aria-expanded="false">Profil <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= SITEURL ?>utilisateur/modification">Modifier profil</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?= SITEURL ?>utilisateur/logout">Logout</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </nav>
        <section>
            <div class="jumbotron" style="margin-top:-20px;">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <h1>WordPress V2</h1> 
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?= ((Session::get('message') != "") ? '<div class="container"><div class="alert alert-info" role="alert">' . (Session::get('message')) . '</div></div>' : "") ?>
        <?php Session::set('message', ""); ?>



