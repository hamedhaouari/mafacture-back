 <?php

require_once(__DIR__ ."/../models/notification.php");

  class NotificationDao extends Notification{

    

    function __construct($data) {

		parent::__construct();
		if($data != null){
			foreach($data as $property => $value) {
			  if(property_exists("Notification" , $property)){
				$this->$property = $value;
			  }
			}
			foreach($this as $property => $value) {
			  if(!isset($data->$property) && $property != "primary" && $property != "table" && $property != $this->primary){
				unset($this->$property);
			  }
			}
		}
    }
	
	

   

}

?>