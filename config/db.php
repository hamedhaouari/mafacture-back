<?php
require_once(__DIR__ ."/MyPDO.php");

class DB
{

    public static function insert($table, $data = [])
    {

        try {
            $conn = MyPDO::conn();
            $columnsArray = array_keys($data);
            $columnsString = implode(',', $columnsArray);

            $valuesArray = array_values($data);
            $valuesCount = count($valuesArray);

            $valuesPlaceholder = '';
            for ($i=0; $i < $valuesCount; $i++) {
                $valuesPlaceholder .= '?,';
            }
            $valuesPlaceholder = rtrim($valuesPlaceholder, ',');


            $query = "INSERT INTO $table ($columnsString) VALUES ($valuesPlaceholder)";

            $statement = $conn->prepare($query);

              $statement->execute($valuesArray);
            //$statement->debugDumpParams();
            // print_r( $conn->errorInfo());
            return ["conn" => $conn , "stmt" => $statement];

        } catch (\PDOException $e) {
           $statement->debugDumpParams();
         print_r( $conn->errorInfo());
		http_response_code(500);
            die("Insert failed: " . $e->getMessage());

        }
    }

    public static function update($table, array $data = [],  $primary="",  $id="")
    {

        try {
            $conn = MyPDO::conn();
            $data = array_filter($data, function($k) { return (!($k === null));});
            $columnsArray = array_keys($data);
            $columnsString = implode(' =?, ', $columnsArray).' =?';
            $valuesArray = array_values($data);
            $query = "UPDATE  $table SET $columnsString WHERE $primary = '$id'";
            $statement = $conn->prepare($query);
            $statement->execute($valuesArray);
            //$statement->debugDumpParams();
            //print_r( $conn->errorInfo());
            return ["conn" => $conn , "stmt" => $statement];

        } catch (\PDOException $e) {
          $statement->debugDumpParams();
           print_r( $conn->errorInfo());
		http_response_code(500);
          die("Update failed: " . $e->getMessage());

        }
    }

    public static function remove($table,  $primary, $id)
/*delete a table known by his primary */
    {

        try {
            $conn = MyPDO::conn();
            $query = "DELETE FROM   $table  WHERE $primary = '$id'";
            $statement = $conn->prepare($query);
            $statement->execute();
            //$statement->debugDumpParams();
            //print_r( $conn->errorInfo());
            return ["conn" => $conn , "stmt" => $statement];

        } catch (\PDOException $e) {
http_response_code(500);
            die("Update failed: " . $e->getMessage());

        }
    }

    public static function upsert($table, $data = [])
/* insert data into table known by his primary and if it is exist update it */
    {

        try {
            $conn = MyPDO::conn();
            $columnsArray = array_keys($data);
            $columnsString = implode(',', $columnsArray);

            $valuesArray = array_values($data);
            $valuesCount = count($valuesArray);

            $valuesPlaceholder = '';
            for ($i=0; $i < $valuesCount; $i++) {
                $valuesPlaceholder .= '?,';
            }
            $valuesPlaceholder = rtrim($valuesPlaceholder, ',');


            $query = "REPLACE INTO $table ($columnsString) VALUES ($valuesPlaceholder)";

            $statement = $conn->prepare($query);

           // $statement->execute($valuesArray);
           // $statement->debugDumpParams();
            print_r( $conn->errorInfo());
            return ["conn" => $conn , "stmt" => $statement];

        } catch (\PDOException $e) {
http_response_code(500);
            die("Insert failed: " . $e->getMessage());

        }
    }


    public static function select($table , $where = '1', $params = array(), $fetchStyle = PDO::FETCH_CLASS)
/*find table where condition into () are done */
    {

        try {
            $conn = MyPDO::conn();
            $query = "SELECT * FROM $table WHERE $where ";

            //prepare statement
            $stmt = $conn->prepare($query);

            $stmt->execute($params);
            //$stmt->debugDumpParams();
            //print_r( $conn->errorInfo());

            return $stmt->fetchAll($fetchStyle, get_parent_class(get_called_class()));


        } catch (\PDOException $e) {
          $stmt->debugDumpParams();
          print_r( $conn->errorInfo());
http_response_code(500);
            die("select failed: " . $e->getMessage());

        }


    }

    public static function req($table , $requette , $params = array())
/* do this requette by their paramettres into () withe DB connexion */
    {

        try {
            $conn = MyPDO::conn();
            $query = $requette;

            //prepare statement
            $stmt = $conn->prepare($query);

            $stmt->execute($params);
        //   $stmt->debugDumpParams();
            //print_r( $conn->errorInfo());

            return ["conn" => $conn , "stmt" => $stmt];


        } catch (\PDOException $e) {
         $stmt->debugDumpParams();
             print_r( $conn->errorInfo());
http_response_code(500);
            die("requette failed: " . $e->getMessage());

        }
    }

    public static function one($table , $where = '1', $params = array(), $fetchStyle = PDO::FETCH_CLASS)
    {

        try {
            $conn = MyPDO::conn();
            $query = "SELECT * FROM $table WHERE $where ";

            //prepare statement
            $stmt = $conn->prepare($query);

            $stmt->execute($params);
            //$stmt->debugDumpParams();
            //print_r( $conn->errorInfo());
            $stmt->setFetchMode($fetchStyle, get_parent_class(get_called_class()));
            return $stmt->fetch();
        } catch (\PDOException $e) {
http_response_code(500);
            die("select failed: " . $e->getMessage());

        }
    }

    public static function ormone($table , string $where = '1', $params = array(),  string $class = "" , $fetchStyle = PDO::FETCH_CLASS )
    {

        require_once(__DIR__ ."/../models/".strtolower($class).".php");


        try {
            $conn = (new MyPDO())->conn1();
            $query = "SELECT * FROM $table WHERE $where ";

            //prepare statement
            $stmt = $conn->prepare($query);

            $stmt->execute($params);
            //$stmt->debugDumpParams();
            //print_r( $conn->errorInfo());
            $stmt->setFetchMode($fetchStyle, $class);
            return $stmt->fetch();


        } catch (\PDOException $e) {
http_response_code(500);
            die("select failed: " . $e->getMessage());

        }
      }


    public static function ormmany($table , string $where = '1', $params = array(),  string $class ="", $fetchStyle = PDO::FETCH_CLASS )
      {

          require_once(__DIR__ ."/../models/".strtolower($class).".php");


          try {
              $conn = (new MyPDO())->conn1();
              $query = "SELECT * FROM $table WHERE $where ";

              //prepare statement
              $stmt = $conn->prepare($query);

              $stmt->execute($params);
              //$stmt->debugDumpParams();
              //print_r( $conn->errorInfo());
              $stmt->setFetchMode($fetchStyle, $class);
              return $stmt->fetchAll();


          } catch (\PDOException $e) {
            $stmt->debugDumpParams();
            print_r( $conn->errorInfo());
		  http_response_code(500);
              die("select failed: " . $e->getMessage());

          }
        }


    public static function ormjoin($table, $jointable , string $where = '1', $params = array(),  $class="", $fetchStyle = PDO::FETCH_CLASS )
/* remplir in $jointable from $table and $joincolumn from $column where $refjoincolumn=$refjoincolumn */
        {

            require_once(__DIR__ ."/../models/".strtolower($class).".php");


            try {
                $conn = (new MyPDO())->conn1();
                $query = "SELECT * FROM $table , $jointable WHERE $where ";
                //echo $query;
                //prepare statement
                $stmt = $conn->prepare($query);

                $stmt->execute($params);
                //$stmt->debugDumpParams();
                //print_r( $conn->errorInfo());
                $stmt->setFetchMode($fetchStyle, $class);
                return $stmt->fetchAll();


            } catch (\PDOException $e) {
http_response_code(500);
                die("select failed: " . $e->getMessage());

            }
    }




	public static function multipleinsert($table, $datas = [])
/* insert multiple ligne $d in table known by this primary */
    {

    try {
        $conn = MyPDO::conn();
        $values = array();
        $insert_values = array();
        foreach ($datas as $data ) {
          $columnsArray = array_keys($data);
          $columnsString = implode(',', $columnsArray);
          $valuesArray = array_values($data);
          $valuesCount = count($valuesArray);
          $valuesPlaceholder = '';
          for ($i=0; $i < $valuesCount; $i++) {
              $valuesPlaceholder .= '?,';
          }
          $valuesPlaceholder = rtrim($valuesPlaceholder, ',');
          if(!empty($valuesPlaceholder)){
            array_push($values , '('.$valuesPlaceholder.')' );
            $insert_values = array_merge($insert_values, $valuesArray);
          }
        }

        $v = implode(',', $values);

        $query = "INSERT INTO $table ($columnsString) VALUES $v";

        $statement = $conn->prepare($query);

          $statement->execute($insert_values);
          //$statement->debugDumpParams();
          //print_r( $conn->errorInfo());
        return ["conn" => $conn , "stmt" => $statement];

    } catch (\PDOException $e) {
       $statement->debugDumpParams();
     print_r( $conn->errorInfo());
	    http_response_code(500);
        die("Insert failed: " . $e->getMessage());

    }
    }

}

?>
