<?php

/**
 * Created by PhpStorm.
 * User: audemard
 * Date: 23/10/2015
 * Time: 15:43
 */

namespace App\Modules\Admin;

use Core\Controller;
use Helpers\Twig;
use Core\View;

class Admin extends Controller
{


    public function __construct()
    {
        parent::__construct();
    }
    
    public function manageCategories(){

        $data['categorie'] = "categorie";

        View::rendertemplate('header', $data);
        Twig::generateRenderingModule('Admin/Views/categories',$data);
        View::rendertemplate('footer', $data);
    }
}