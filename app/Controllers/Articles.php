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

class Articles extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function getArticles() {
        $articleSQL = new ArticleSQL();
        $article = $articleSQL->prepareFindAll()->orderBy("id desc")->limit(0, 10)->execute();
        $data['articles'] = $article;
        $data['url'] = SITEURL;

        //$pdo = \Helpers\DB\DBManager::getInstance()->getPDO();

        View::rendertemplate('header', $data);
        Twig::render('Article/index', $data);
        View::rendertemplate('footer', $data);
    }

    public function detailArticle($id) {
        $articleSQL = new ArticleSQL();
        $article = $articleSQL->findById($id);
        $data['article'] = $article;
        $data['url'] = SITEURL;

        View::rendertemplate('header', $data);
        Twig::render('Article/detail', $data);
        View::rendertemplate('footer', $data);
    }

}
