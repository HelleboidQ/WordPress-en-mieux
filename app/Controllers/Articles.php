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
use Helpers\DB\Entity;
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

        View::rendertemplate('header', $data);
        Twig::render('Article/index', $data);
        View::rendertemplate('footer', $data);
    }

    public function detailArticle($id) {
        
        $articleSQL = new ArticleSQL();
        $article = $articleSQL->findById($id);
        
        $commentaires = new CommentaireSQL();
        $coms = $commentaires->prepareFindWithCondition('id_article = :ida' , array(':ida' => $id))->execute();

        $data['title'] = ucfirst($article->titre);
        $data['article'] = $article;
        $data['commentaires'] = $coms;
        $data['isAdmin'] = Session::get('admin');
        $data['isConnecte'] = Session::get('id');
        $data['url'] = SITEURL;

        View::rendertemplate('header', $data);
        Twig::render('Article/detail', $data);
        View::rendertemplate('footer', $data);
    }

    function addComment($ida){

        if(isset($_POST)){

            $table_commentaire = new Commentaire();
            $table_commentaire->contenu = $_POST['contenu'];
            $table_commentaire->date = date('Y-m-d');
            $table_commentaire->id_article = $ida;
            $table_commentaire->id_user = Session::get('id');

            EntityManager::getInstance()->save($table_commentaire);

            Session::set('message', "Vous avez ajouter votre commentaire");
            Url::redirect('article/'.$ida);

        }

    }

    function getArticlesAjax($regex){
        $articleSQL = new ArticleSQL();
        $article = $articleSQL->prepareFindAll()->orderBy("titre asc")->limit(0, 5)->execute();

        $html = "";

        foreach($article as $a){

            if(substr($a->titre,0,strlen($regex)) == $regex){
                $html .= "<li><a href='".SITEURL."article/".$a->getId()."'>".$a->titre."</a></li>";
            }

        }

        echo $html;
    }

}
