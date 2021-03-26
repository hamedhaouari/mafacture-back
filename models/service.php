<?php

require_once(__DIR__ ."/model.php");
/**
 * @OA\Schema()
 */
	class Service extends Model{

 		function __construct() {
      	$this->table = "service";
        $this->primary = "idservice";
    	}

   	/**
		     * The service idservice
			 * @var integer
			 * @OA\Property()
			 */
			 public $idservice;
			 /**
		     * The service nomservice
			 * @var string
			 * @OA\Property()
			 */
			 public $nomservice;
			 
	}

?>