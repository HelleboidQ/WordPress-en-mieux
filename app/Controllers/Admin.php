<?php

/**
 * Created by PhpStorm.
 * User: audemard
 * Date: 23/10/2015
 * Time: 15:43
 */

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

class Admin extends Controller
{


    public function __construct()
    {
        parent::__construct();
    }

    public function manageCategories()
    {

        if($_SESSION['nova_admin'] != 1){
            Url::redirect('utilisateur/login');
        }

        $categoriesSQL = new CategorieSQL();
        $categories = $categoriesSQL->prepareFindAll()->execute();
        $data['categories'] = $categories;


        View::rendertemplate('header', $data);
        Twig::render('Admin/categories', $data);
        View::rendertemplate('footer', $data);
    }

    public function manageArticles()
    {
        if($_SESSION['nova_admin'] != 1){
            Url::redirect('utilisateur/login');
        }

        $userSQL = new UserSQL();
        $users = $userSQL->prepareFindAll()->execute();
        $data['users'] = $users;

        $categoriesSQL = new CategorieSQL();
        $categories = $categoriesSQL->prepareFindAll()->execute();
        $data['categories'] = $categories;
        
        $articleSQL = new ArticleSQL();
        $articles = $articleSQL->prepareFindAll()->execute();
        $data['articles'] = $articles;

        View::rendertemplate('header', $data);
        Twig::render('Admin/articles', $data);
        View::rendertemplate('footer', $data);
    }
    
    function manageUsers(){

        if($_SESSION['nova_admin'] != 1){
            Url::redirect('utilisateur/login');
        }
        
        $userSQL = new UserSQL();
        $users = $userSQL->prepareFindAll()->execute();
        $data['users'] = $users;

        View::rendertemplate('header', $data);
        Twig::render('Admin/users', $data);
        View::rendertemplate('footer', $data);
        
    }

    function manageComment(){

    }
    
    function addCategorie(){

        if(Session::get('admin') != 1)
            Url::redirect('utilisateur/login');

        if(isset($_POST['ajouter'])){

            $table_categorie = new Categorie($_POST['titre']);
            EntityManager::getInstance()->save($table_categorie);
            Session::set('message', 'Vous avez ajouté une nouvelle catégorie');
            Url::redirect('admin/categories');

        }
        Url::redirect();
    }

    function addArticle(){

        if(Session::get('admin') != 1)
            Url::redirect('utilisateur/login');

        if(isset($_POST['ajouter'])){

            // URL A FAIRE

            $table_article = new Article(Session::get('id'),$_POST['categorie'],$_POST['titre'],$_POST['contenu'],"",date("Y-m-d"));
            EntityManager::getInstance()->save($table_article);
            Session::set("message","Article ajouter");
            Url::redirect('admin/articles');
        }
        Url::redirect();
    }

    function deleteUser($id){

        if(Session::get('admin') != 1)
            Url::redirect('utilisateur/login');


        if($id != Session::get('id')){

            $commentaireSQL = new CommentaireSQL();
            $commentaires = $commentaireSQL->prepareFindWithCondition("idUser = :idu" , array(':idu',$id));

            // delete tous les commentaires associés à l'utilisateur
            foreach ($commentaires as $c){
                $comment = new Commentaire();
                $comment->setId($c->id);
                EntityManager::getInstance()->delete($comment);
            }

            // supprime l'utilisateur
            $user = new User();
            $user->setId($id);
            EntityManager::getInstance()->delete($user);

        }else{

            // si c'est la personne qui execute la fonction
            Session::set('message',"Vous ne pouvez pas vous supprimer");
        }

        Url::redirect('admin/users');
    }

    function deleteCategorie($id){



    }

    function deleteArticle($id){

    }
}