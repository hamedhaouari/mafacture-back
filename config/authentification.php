<?php
require_once(__DIR__ ."/MyPDO.php");
require_once(__DIR__ ."/../models/user.php");
require_once(__DIR__ ."/../models/token.php");

	class Authentification
	{
/*
		  public $loggedinuser;

			public function getBearerToken() {

						$headers = getallheaders();

						// HEADER: Get the access token from the header
						if (!empty($headers["Authorization"])) {

            	if (preg_match('/Bearer\s(\S+)/', $headers["Authorization"], $matches)) {
              	return $matches[1];
							}
						}
						return null;
				}


        public function authorise($roles){

            $token = $this->getBearerToken();
            if(!isset($token)){
							http_response_code(400);
							die("no token ");
						}

							$tok = new Token();
							$toks = $tok->find("value = :value", [":value" => $token]);

							if(!isset($toks[0])){
								http_response_code(400);
								die("no user ");
							}
							$date1 = new DateTime();
							$date2 = new DateTime(($toks[0])->expireat);
							if($date1 > $date2){
								http_response_code(400);
								die("token expired ");
							}
							$user = new User();
							$user = $user->getone(($toks[0])->USER_idUSER);
							if(!isset($user)){
								http_response_code(400);
								die("no user ");
							}

							$this->loggedinuser = $user;

							$r = array_filter($roles, function($k) use ($user){

								 return ( $user->role == $k );
						  });

							if(!empty($r)){
    						return ["auth" => true , "msg" => "token ok"];
							}else{
								http_response_code(400);
								die("require more authorisations");
							}




        }

*/


	}

?>
