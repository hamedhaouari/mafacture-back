<?php

require_once(__DIR__ ."/model.php");
/**
 * @OA\Schema()
 */
	class Notification extends Model{

 		function __construct() {
      	$this->table = "notification";
        $this->primary = "idnotification";
    	}

   	/**
		     * The notification idnotification
			 * @var integer
			 * @OA\Property()
			 */
			 public $idnotification;
			 /**
		     * The notification objetnotification
			 * @var string
			 * @OA\Property()
			 */
			 public $objetnotification;
			 /**
		     * The notification messagenotification
			 * @var string
			 * @OA\Property()
			 */
			 public $messagenotification;
			 /**
		     * The notification datenotification
			 * @var string
			 * @OA\Property()
			 */
			 public $datenotification;
			 
	}

?>