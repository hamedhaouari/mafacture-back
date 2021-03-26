 <?php

require_once(__DIR__ ."/../models/client.php");

  class ClientDao extends Client{

    

    function __construct($data) {

		parent::__construct();
		if($data != null){
			foreach($data as $property => $value) {
			  if(property_exists("Client" , $property)){
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