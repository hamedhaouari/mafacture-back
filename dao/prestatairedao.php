 <?php

require_once(__DIR__ ."/../models/prestataire.php");

  class PrestataireDao extends Prestataire{

    

    function __construct($data) {

		parent::__construct();
		if($data != null){
			foreach($data as $property => $value) {
			  if(property_exists("Prestataire" , $property)){
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