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
use App\Models\Queries\UserSQL;
use Core\View;
use Core\Controller;
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
}