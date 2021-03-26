<?php
class MyPDO extends PDO
{
    public function __construct()
    {


        $dns = $_ENV["DB_CONNECTION"] .
        ':host=' . $_ENV["DB_HOST"] .
        ((!empty($_ENV["DB_PORT"])) ? (';port=' . $_ENV["DB_PORT"]) : '') .
        ';dbname=' . $_ENV["DB_DATABASE"];

        parent::__construct($dns, $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"] , array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }

    public static function conn(){

      $dbh = new MyPDO();
      $dbh->setAttribute(MyPDO::ATTR_ERRMODE, MyPDO::ERRMODE_EXCEPTION);
      return $dbh ;
    }

    public  function conn1(){

      $this->setAttribute(MyPDO::ATTR_ERRMODE, MyPDO::ERRMODE_EXCEPTION);
      return $this ;
    }


}
