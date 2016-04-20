<?php

/**
 * Routes - all standard routes are defined here.
 *
 * @author David Carr - dave@daveismyname.com
 * @version 3.0
 */

/** Create alias for Router. */
use Core\Router;
use Helpers\Hooks;

/** Get the Router instance. */
$router = Router::getInstance();

/** Define static routes. */
// Default Routing
Router::any('', 'App\Controllers\Welcome@index');
Router::any('subpage', 'App\Controllers\Welcome@subPage');


//User Routing :
Router::any('/utilisateur/inscription', 'App\Modules\User\User@register');
Router::any('/utilisateur/login', 'App\Modules\User\User@login');
Router::any('/utilisateur/logout', 'App\Modules\User\User@logout');
Router::any('/utilisateur/modification', 'App\Modules\User\User@change_password');

//Admin Routing
Router::any('/admin/categories', 'App\Controllers\Admin@manageCategories');
Router::any('/admin/articles', 'App\Controllers\Admin@manageArticles');
Router::any('/admin/users', 'App\Controllers\Admin@manageUsers');
Router::any('/admin/addCategorie', 'App\Controllers\Admin@addCategorie');
Router::any('/admin/addArticle', 'App\Controllers\Admin@addArticle');
Router::any('/admin/deleteUser', 'App\Controllers\Admin@deleteUser');

//Articles Routing
Router::any('/article', 'App\Controllers\Articles@getArticles');
Router::any('/article/(:num)', 'App\Controllers\Articles@detailArticle');

//Categorie Routing
Router::any('/categorie', 'App\Controllers\Categories@getCategorie');
Router::any('/categorie/(:num)', 'App\Controllers\Categories@detailCategorie');

// ORM Generator/
if ($_SERVER["SERVER_NAME"] == "localhost") {
    Router::any("generateorm", 'App\Modules\ORM\ORMGenerator@index');
    Router::any("generateorm/confirm", 'App\Modules\ORM\ORMGenerator@generate');
}

/** End default routes */
/** Module routes. */
$hooks = Hooks::get();
$hooks->run('routes');
/** End Module routes. */
/** If no route found. */
Router::error('Core\Error@index');

/** Execute matched routes. */
$router->dispatch();
