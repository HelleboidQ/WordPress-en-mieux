<?php

/**
 *
 * Article
 *
 * This class was generated by a script. Please be careful changing it.
 * Regenerate it will erase all changes!
 */

namespace App\Models\Tables;

use App\Models\Queries\UserSQL;
use App\Models\Queries\CategorieSQL;
use Helpers\DB\Entity;

class Article extends Entity {

    public $idUser;     // int(11)
    public $idCategorie;     // int(11)
    public $titre;     // varchar(80)
    public $contenu;     // text
    public $image;     // varchar(255)
    public $date;     // datetime
    private $user;
    private $categorie;

    public function __construct(
    $idUser = "", $idCategorie = "", $titre = "", $contenu = "", $image = "", $date = "", $id = false) {
        parent::__construct($id);

        $this->idUser = $idUser;
        $this->idCategorie = $idCategorie;
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->image = $image;
        $this->date = $date;
        $this->user = null;
        $this->categorie = null;
    }

    public function getUser() {
        if ($this->user == null || $this->idUser != $user->getId()) {
            // Il faut r�cup�rer le nouveau
            $uSQL = new UserSQL(); // Les requ�tes pour r�cup�rer une personne
            $this->user = $uSQL->findById($this->idUser);
        }
        return $this->user;
    }

    public function getCategorie() {
        if ($this->categorie == null || $this->idCategorie != $categorie->getId() ) {
            // Il faut r�cup�rer le nouveau
            $cSQL = new CategorieSQL(); // Les requ�tes pour r�cup�rer une personne
            $this->categorie = $cSQL->findById($this->idCategorie);
        }
        return $this->categorie;
    }

}

?>
