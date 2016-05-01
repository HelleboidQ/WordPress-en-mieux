<?php
/**
 * Controller - base controller
 *
 * @author David Carr - dave@novaframework.com
 * @version 3.0
 */

namespace Core;

use Core\Language;
use Helpers\Session;

/**
 * Core controller, all other controllers extend this base controller.
 */
abstract class Controller
{
    /**
     * Language variable to use the languages class.
     *
     * @var string
     */
    public $language;

    /**
     * On run make an instance of the config class and view class.
     */
    public function __construct()
    {
        /** initialise the language object */
        $this->language = new Language();
    }

    function isAdmin(){
        if( !Session::get('id') ){
            Session::set('message','Vous n\'avez pas les droits nécessaires');
            Url::redirect('');
        }
    }
}
