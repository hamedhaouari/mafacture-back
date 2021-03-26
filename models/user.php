<?php

require_once(__DIR__ ."/model.php");
/**
 * @OA\Schema()
 */
	class User extends Model{

 		function __construct() {
      	$this->table = "user";
        $this->primary = "idUSER";
    	}

   	/**
		     * The user idUSER
			 * @var integer
			 * @OA\Property()
			 */
			 public $idUSER;
			 /**
		     * The user email
			 * @var string
			 * @OA\Property()
			 */
			 public $email;
			 /**
		     * The user created
			 * @var string
			 * @OA\Property()
			 */
			 public $created = current_timestamp();
			 /**
		     * The user password
			 * @var string
			 * @OA\Property()
			 */
			 public $password;
			 /**
		     * The user firstname
			 * @var string
			 * @OA\Property()
			 */
			 public $firstname;
			 /**
		     * The user lastname
			 * @var string
			 * @OA\Property()
			 */
			 public $lastname;
			 /**
		     * The user phone
			 * @var string
			 * @OA\Property()
			 */
			 public $phone;
			 /**
		     * The user address
			 * @var string
			 * @OA\Property()
			 */
			 public $address;
			 /**
		     * The user role
			 * @var string
			 * @OA\Property()
			 */
			 public $role;
			 
	}

?>