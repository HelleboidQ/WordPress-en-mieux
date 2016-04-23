<?php

namespace App\Controllers;

use App\Models\Queries\ArticleSQL;
use App\Models\Queries\CategorieSQL;
use App\Models\Queries\CommentaireSQL;
use App\Models\Queries\UserSQL;
use App\Models\Tables\Article;
use App\Models\Tables\Categorie;
use App\Models\Tables\Commentaire;
use App\Models\Tables\User;
use Core\View;
use Core\Controller;
use Helpers\DB\EntityManager;
use Helpers\Session;
use Helpers\Twig;
use Helpers\Url;

class Categories extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function getCategorie() {
        $categorieSQL = new CategorieSQL();
        $categorie = $categorieSQL->prepareFindAll()->execute();
        $data['categories'] = $categorie; 
        $data['url'] = SITEURL;

        View::rendertemplate('header', $data);
        Twig::render('Categorie/index', $data);
        View::rendertemplate('footer', $data);
    }

    public function detailCategorie($id) {
        $articleSQL = new ArticleSQL();
        //$article = $articleSQL->findById($id); 
        $article = $articleSQL->prepareFindWithCondition("id_categorie = ".$id)->execute(); 

        $data['article'] = $article;
        $data['url'] = SITEURL;

        View::rendertemplate('header', $data);
        Twig::render('Categorie/detail', $data);
        View::rendertemplate('footer', $data);
    }

}
