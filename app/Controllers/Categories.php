<?php

namespace App\Controllers;

use App\Models\Queries\ArticleSQL;
use App\Models\Queries\CategorieSQL;
use Core\Language;
use Core\View;
use Core\Controller;
use Helpers\Twig;

class Categories extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function getCategorie() {
        $categorieSQL = new CategorieSQL();
        $categorie = $categorieSQL->prepareFindAll()->execute();
        $data['categories'] = $categorie; 
        $data['url'] = SITEURL;
        $data['title'] = "Toutes les catégories";

        View::rendertemplate('header', $data);
        Twig::render('Categorie/index', $data);
        View::rendertemplate('footer', $data);
    }

    public function detailCategorie($id) {

        $categorieSQL = new CategorieSQL();
        $categorie = $categorieSQL->findById($id);
        
        $articleSQL = new ArticleSQL();
        //$article = $articleSQL->findById($id); 
        $article = $articleSQL->prepareFindWithCondition("id_categorie = ".$id)->execute(); 

        $data['categorie'] = $categorie;
        $data['article'] = $article;
        $data['url'] = SITEURL;

        View::rendertemplate('header', $data);
        Twig::render('Categorie/detail', $data);
        View::rendertemplate('footer', $data);
        
        
    }

}
