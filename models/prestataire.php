<?php

require_once(__DIR__ ."/model.php");
/**
 * @OA\Schema()
 */
	class Prestataire extends Model{

 		function __construct() {
      	$this->table = "prestataire";
        $this->primary = "id_prestataire";
    	}

   	/**
		     * The prestataire id_prestataire
			 * @var integer
			 * @OA\Property()
			 */
			 public $id_prestataire;
			 /**
		     * The prestataire nomprestataire
			 * @var string
			 * @OA\Property()
			 */
			 public $nomprestataire;
			 /**
		     * The prestataire prenomprestataire
			 * @var string
			 * @OA\Property()
			 */
			 public $prenomprestataire;
			 /**
		     * The prestataire adresseprestaire
			 * @var string
			 * @OA\Property()
			 */
			 public $adresseprestaire;
			 /**
		     * The prestataire emailprestatire
			 * @var string
			 * @OA\Property()
			 */
			 public $emailprestatire;
			 
	}

?>