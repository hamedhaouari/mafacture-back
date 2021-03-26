<?php

require_once(__DIR__ ."/model.php");
/**
 * @OA\Schema()
 */
	class Notification_has_prestataire extends Model{

 		function __construct() {
      	$this->table = "notification_has_prestataire";
        $this->primary = "prestataire_idprestataire";
    	}

   	/**
		     * The notification_has_prestataire notification_idnotification
			 * @var integer
			 * @OA\Property()
			 */
			 public $notification_idnotification;
			 /**
		     * The notification_has_prestataire prestataire_idprestataire
			 * @var integer
			 * @OA\Property()
			 */
			 public $prestataire_idprestataire;
			 /**
		     * The notification_has_prestataire dateenvoie
			 * @var string
			 * @OA\Property()
			 */
			 public $dateenvoie;
			 /**
		     * The notification_has_prestataire nombrenotification
			 * @var integer
			 * @OA\Property()
			 */
			 public $nombrenotification;
			 /**
		     * The notification_has_prestataire notification_has_prestatairecol
			 * @var string
			 * @OA\Property()
			 */
			 public $notification_has_prestatairecol;
			 
	}

?>