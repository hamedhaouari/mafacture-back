
  <?php

  $routes = [

      
    //Client
    ["call" => "GET" , "path" => "client" , "controller" => "ClientController" , "action" => "getone"],
    ["call" => "GET" , "path" => "clients" , "controller" => "ClientController" , "action" => "getall"],
    ["call" => "POST" , "path" => "client" , "controller" => "ClientController" , "action" => "create"],
    ["call" => "PATCH" , "path" => "client" , "controller" => "ClientController" , "action" => "edit"],
    ["call" => "DELETE" , "path" => "client" , "controller" => "ClientController" , "action" => "delete"],
	
    //Facture
    ["call" => "GET" , "path" => "facture" , "controller" => "FactureController" , "action" => "getone"],
    ["call" => "GET" , "path" => "factures" , "controller" => "FactureController" , "action" => "getall"],
    ["call" => "POST" , "path" => "facture" , "controller" => "FactureController" , "action" => "create"],
    ["call" => "PATCH" , "path" => "facture" , "controller" => "FactureController" , "action" => "edit"],
    ["call" => "DELETE" , "path" => "facture" , "controller" => "FactureController" , "action" => "delete"],
	
    //Lignefacture
    ["call" => "GET" , "path" => "lignefacture" , "controller" => "LignefactureController" , "action" => "getone"],
    ["call" => "GET" , "path" => "lignefactures" , "controller" => "LignefactureController" , "action" => "getall"],
    ["call" => "POST" , "path" => "lignefacture" , "controller" => "LignefactureController" , "action" => "create"],
    ["call" => "PATCH" , "path" => "lignefacture" , "controller" => "LignefactureController" , "action" => "edit"],
    ["call" => "DELETE" , "path" => "lignefacture" , "controller" => "LignefactureController" , "action" => "delete"],
	
    //Notification
    ["call" => "GET" , "path" => "notification" , "controller" => "NotificationController" , "action" => "getone"],
    ["call" => "GET" , "path" => "notifications" , "controller" => "NotificationController" , "action" => "getall"],
    ["call" => "POST" , "path" => "notification" , "controller" => "NotificationController" , "action" => "create"],
    ["call" => "PATCH" , "path" => "notification" , "controller" => "NotificationController" , "action" => "edit"],
    ["call" => "DELETE" , "path" => "notification" , "controller" => "NotificationController" , "action" => "delete"],
	
    //Notification_has_prestataire
    ["call" => "GET" , "path" => "notification_has_prestataire" , "controller" => "Notification_has_prestataireController" , "action" => "getone"],
    ["call" => "GET" , "path" => "notification_has_prestataires" , "controller" => "Notification_has_prestataireController" , "action" => "getall"],
    ["call" => "POST" , "path" => "notification_has_prestataire" , "controller" => "Notification_has_prestataireController" , "action" => "create"],
    ["call" => "PATCH" , "path" => "notification_has_prestataire" , "controller" => "Notification_has_prestataireController" , "action" => "edit"],
    ["call" => "DELETE" , "path" => "notification_has_prestataire" , "controller" => "Notification_has_prestataireController" , "action" => "delete"],
	
    //Prestataire
    ["call" => "GET" , "path" => "prestataire" , "controller" => "PrestataireController" , "action" => "getone"],
    ["call" => "GET" , "path" => "prestataires" , "controller" => "PrestataireController" , "action" => "getall"],
    ["call" => "POST" , "path" => "prestataire" , "controller" => "PrestataireController" , "action" => "create"],
    ["call" => "PATCH" , "path" => "prestataire" , "controller" => "PrestataireController" , "action" => "edit"],
    ["call" => "DELETE" , "path" => "prestataire" , "controller" => "PrestataireController" , "action" => "delete"],
	
    //Service
    ["call" => "GET" , "path" => "service" , "controller" => "ServiceController" , "action" => "getone"],
    ["call" => "GET" , "path" => "services" , "controller" => "ServiceController" , "action" => "getall"],
    ["call" => "POST" , "path" => "service" , "controller" => "ServiceController" , "action" => "create"],
    ["call" => "PATCH" , "path" => "service" , "controller" => "ServiceController" , "action" => "edit"],
    ["call" => "DELETE" , "path" => "service" , "controller" => "ServiceController" , "action" => "delete"],
	
    //Token
    ["call" => "GET" , "path" => "token" , "controller" => "TokenController" , "action" => "getone"],
    ["call" => "GET" , "path" => "tokens" , "controller" => "TokenController" , "action" => "getall"],
    ["call" => "POST" , "path" => "token" , "controller" => "TokenController" , "action" => "create"],
    ["call" => "PATCH" , "path" => "token" , "controller" => "TokenController" , "action" => "edit"],
    ["call" => "DELETE" , "path" => "token" , "controller" => "TokenController" , "action" => "delete"],
	
    //User
    ["call" => "GET" , "path" => "user" , "controller" => "UserController" , "action" => "getone"],
    ["call" => "GET" , "path" => "users" , "controller" => "UserController" , "action" => "getall"],
    ["call" => "POST" , "path" => "user" , "controller" => "UserController" , "action" => "create"],
    ["call" => "PATCH" , "path" => "user" , "controller" => "UserController" , "action" => "edit"],
    ["call" => "DELETE" , "path" => "user" , "controller" => "UserController" , "action" => "delete"],
	


  ];

  function theroute( ){

      global $routes;

      $route = array_filter($routes, function($k) {
          global $baseurl;
          return ( $_SERVER["REQUEST_METHOD"] == $k["call"] && $_SERVER["REDIRECT_URL"] == $baseurl.$k["path"] );
      });
      $route = array_pop($route);
      $file = $route["controller"];

      require_once( __DIR__ ."/../controllers/".strtolower($file).".php");
      $controller = new $route["controller"];
      $action = $route["action"];
      echo  json_encode( $controller->$action() );


  }

  theroute();


  ?>
