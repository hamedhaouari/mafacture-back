<?php

require_once(__DIR__ ."/model.php");
/**
 * @OA\Schema()
 */
	class Token extends Model{

 		function __construct() {
      	$this->table = "token";
        $this->primary = "idTOKEN";
    	}

   	/**
		     * The token idTOKEN
			 * @var integer
			 * @OA\Property()
			 */
			 public $idTOKEN;
			 /**
		     * The token value
			 * @var string
			 * @OA\Property()
			 */
			 public $value;
			 /**
		     * The token created
			 * @var string
			 * @OA\Property()
			 */
			 public $created = current_timestamp();
			 /**
		     * The token expireat
			 * @var string
			 * @OA\Property()
			 */
			 public $expireat;
			 /**
		     * The token USER_idUSER
			 * @var integer
			 * @OA\Property()
			 */
			 public $USER_idUSER;
			 
	}

?>