 <?php

require_once(__DIR__ ."/../models/user.php");

  class UserDao extends User{

    

    function __construct($data) {

		parent::__construct();
		if($data != null){
			foreach($data as $property => $value) {
			  if(property_exists("User" , $property)){
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
	
	 public function login() {

      if(isset($this->password)){
                $this->password = hash("sha256", $this->password);
      }
      $res = $this->find("email = :email AND password = :password" , [":email" => $this->email , ":password" => $this->password ]);
      if(!isset($res[0])){
        http_response_code(400);
        die("no user ");
      }
      $this = $res[0];
      $token = new Token();
      $token->value = bin2hex(openssl_random_pseudo_bytes(64));
      $date = new DateTime();
      $date->add(new DateInterval("P90D"));
      $expire =  $date->format("Y-m-d H:i:s");
      $token->expireat = $expire;
      $token->USER_idUSER = $this->idUSER;
      $token->create();
      return ["token" => $token->value , "user" => $this];
    }

   

}

?>