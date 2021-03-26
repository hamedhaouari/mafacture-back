<?php

require_once(__DIR__ ."/model.php");
/**
 * @OA\Schema()
 */
	class Lignefacture extends Model{

 		function __construct() {
      	$this->table = "lignefacture";
        $this->primary = "idlignefacture";
    	}

   	/**
		     * The lignefacture idlignefacture
			 * @var integer
			 * @OA\Property()
			 */
			 public $idlignefacture;
			 /**
		     * The lignefacture facture_clients_id_client
			 * @var integer
			 * @OA\Property()
			 */
			 public $facture_clients_id_client;
			 /**
		     * The lignefacture prestataire_idprestataire
			 * @var integer
			 * @OA\Property()
			 */
			 public $prestataire_idprestataire;
			 /**
		     * The lignefacture service_idservice
			 * @var integer
			 * @OA\Property()
			 */
			 public $service_idservice;
			 
	}

?>