<?php

require_once(__DIR__ ."/model.php");
/**
 * @OA\Schema()
 */
	class Facture extends Model{

 		function __construct() {
      	$this->table = "facture";
        $this->primary = "id_facture";
    	}

   	/**
		     * The facture id_facture
			 * @var integer
			 * @OA\Property()
			 */
			 public $id_facture;
			 /**
		     * The facture totalfacture
			 * @var integer
			 * @OA\Property()
			 */
			 public $totalfacture;
			 /**
		     * The facture datefacture
			 * @var string
			 * @OA\Property()
			 */
			 public $datefacture;
			 /**
		     * The facture client_id_client
			 * @var integer
			 * @OA\Property()
			 */
			 public $client_id_client;
			 /**
		     * The facture etatfacture
			 * @var string
			 * @OA\Property()
			 */
			 public $etatfacture;
			 
	}

?>