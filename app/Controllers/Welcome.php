<?php
/**
 * Welcome controller
 *
 * @author David Carr - dave@novaframework.com
 * @version 3.0
 */

namespace App\Controllers;

use App\Models\Queries\ArticleSQL;
use Core\View;
use Core\Controller;

/**
 * Sample controller showing a construct and 2 methods and their typical usage.
 */
class Welcome extends Controller
{
    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->language->load('Welcome');
    }

    /**
     * Define Index page title and load template files
     */
    public function index()
    {
        $data['title'] = $this->language->get('welcomeText');
        $data['welcomeMessage'] = $this->language->get('welcomeMessage');

        $model_Article = new ArticleSQL();
        $articles = $model_Article->prepareFindAll()->limit(0,2)->execute();

        $data['articles'] = $articles;
        $data['siteurl'] = SITEURL;

        View::renderTemplate('header', $data);
        View::render('Welcome/Welcome', $data);
        View::renderTemplate('footer', $data);
    }

    /**
     * Define Subpage page title and load template files
     */
    public function subPage()
    {
        $data['title'] = $this->language->get('subpageText');
        $data['welcomeMessage'] = $this->language->get('subpageMessage');

        View::renderTemplate('header', $data);
        View::render('Welcome/SubPage', $data);
        View::renderTemplate('footer', $data);
    }
}
