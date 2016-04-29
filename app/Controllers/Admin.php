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

        $data['title'] = "Gestion categories";

        if(Session::get('admin') != 1)
            Url::redirect('utilisateur/login');

        $categoriesSQL = new CategorieSQL();
        $categories = $categoriesSQL->prepareFindAll()->execute();
        $data['categories'] = $categories;

        $data['siteurl'] = SITEURL;

        View::rendertemplate('header', $data);
        Twig::render('Admin/categories', $data);
        View::rendertemplate('footer', $data);
    }

    public function manageArticles()
    {
        $data['title'] = "Gestion articles";

        if(Session::get('admin') != 1)
            Url::redirect('utilisateur/login');

        $userSQL = new UserSQL();
        $users = $userSQL->prepareFindAll()->execute();
        $data['users'] = $users;

        $categoriesSQL = new CategorieSQL();
        $categories = $categoriesSQL->prepareFindAll()->execute();
        $data['categories'] = $categories;
        
        $articleSQL = new ArticleSQL();
        $articles = $articleSQL->prepareFindAll()->execute();
        $data['articles'] = $articles;

        $data['siteurl'] = SITEURL;

        View::rendertemplate('header', $data);
        Twig::render('Admin/articles', $data);
        View::rendertemplate('footer', $data);
    }
    
    function manageUsers(){

        $data['title'] = "Gestion utilisateurs";

        if(Session::get('admin') != 1)
            Url::redirect('utilisateur/login');
        
        $userSQL = new UserSQL();
        $users = $userSQL->prepareFindAll()->execute();
        $data['users'] = $users;

        $data['siteurl'] = SITEURL;

        View::rendertemplate('header', $data);
        Twig::render('Admin/users', $data);
        View::rendertemplate('footer', $data);
        
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

            $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
            $extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );

            if ( !in_array($extension_upload,$extensions_valides) ){
                Session::set('message',"Mauvaise extension de l'image");
                Url::redirect('admin/articles');
            }

            $nom = md5(uniqid(rand(), true));

            $chemin = "assets/images/".$nom.".".$extension_upload;

            $resultat = move_uploaded_file($_FILES['image']['tmp_name'],$chemin);
            if (!$resultat){
                Session::set('message',"Probleme lors de l'envoie du fichier");
            }

            echo "le resultat : " . $resultat . "<br/>";
            echo "le chemin : " . $chemin . "<br/>";

            $table_article = new Article(Session::get('id'),$_POST['categorie'],$_POST['titre'],$_POST['contenu'],$chemin,date("Y-m-d"));
            EntityManager::getInstance()->save($table_article);
            Session::set("message","Article ajouté");
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

        $articleSQL = new ArticleSQL();
        $article = $articleSQL->prepareFindWithCondition("id_categorie = :idc", array(':idc'=>$id))->execute();

        if(sizeof($article) > 0){
            // si un article utilise la categorie
            Session::set('message','Un/des article(s) utilise cette categorie, faites le menage avent de supprimer SVP');
        }else{
            $categorie = new Categorie();
            $categorie->setId($id);
            EntityManager::getInstance()->delete($categorie);
            Session::set('message','Vous avez supprimé la categorie');
        }

        Url::redirect("admin/categories");
    }

    function deleteArticle($id){

        $commentaireSQL = new CommentaireSQL();
        $commentaire = $commentaireSQL->prepareFindWithCondition("id_article = :ida",array(':ida'=>$id))->execute();

        foreach ($commentaire as $c){
            $commentaire = new Commentaire();
            $commentaire->setId($c->$id);
            EntityManager::getInstance()->delete($commentaire);
        }


        $model_article = new ArticleSQL();
        $article = $model_article->findById($id);
        unlink($article->image);

        $article = new Article();
        $article->setId($id);
        EntityManager::getInstance()->delete($article);

        Session::set('message','Article supprimé');
        Url::redirect('admin/articles');

    }

    function updateArticle($id){

        $data['title'] = "Mise a jour produit";
        
        $articleSQL = new ArticleSQL();
        $articles = $articleSQL->findById($id);

        $categorieSQL = new CategorieSQL();
        $categories = $categorieSQL->prepareFindAll()->execute();

        if($_POST['modifier']){
            
            $idCategorie = $_POST['categorie'];
            $titre = $_POST['titre'];
            $contenu = $_POST['contenu'];

            $article = new Article();
            $article->id_user = Session::get('id');
            $article->titre = $titre;
            $article->contenu = $contenu;
            $article->image = $articles->image;
            $article->id_categorie = $idCategorie;
            $article->date = date('Y-m-d');
            $article->setId($id);

            EntityManager::getInstance()->save($article);
            Url::redirect('admin/articles');
        }
        
        $data['article'] = $articles;
        $data['categories'] = $categories;
        
        $data['siteurl'] = SITEURL;

        View::rendertemplate('header', $data);
        Twig::render('Admin/updateArticle', $data);
        View::rendertemplate('footer', $data);
    }
}