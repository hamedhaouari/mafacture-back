<?php

require_once(__DIR__ ."/model.php");
/**
 * @OA\Schema()
 */
	class Client extends Model{

 		function __construct() {
      	$this->table = "client";
        $this->primary = "id_client";
    	}

   	/**
		     * The client id_client
			 * @var integer
			 * @OA\Property()
			 */
			 public $id_client;
			 /**
		     * The client CIN_client
			 * @var integer
			 * @OA\Property()
			 */
			 public $CIN_client;
			 /**
		     * The client Nom_client
			 * @var string
			 * @OA\Property()
			 */
			 public $Nom_client;
			 /**
		     * The client Prenom_client
			 * @var string
			 * @OA\Property()
			 */
			 public $Prenom_client;
			 /**
		     * The client Adresse_client
			 * @var string
			 * @OA\Property()
			 */
			 public $Adresse_client;
			 /**
		     * The client Email_client
			 * @var string
			 * @OA\Property()
			 */
			 public $Email_client;
			 
	}

?>