<?php
require_once(__DIR__ ."/../config/db.php");


class Model extends DB{

    public $table;
    public $primary;

    public function __toString() {
    return json_encode($this);
    }

    public function create(){
/*creat data withe in array known by his primary and name then return a table */
        $data = (array) $this;
        unset($data["table"]);
        unset($data["primary"]);
        return $this->insert($this->table , $data);
    }

    public function edit(){
/*edit data withe in array known by his primary and name then return a table */
        $data = (array) $this;
        unset($data["table"]);
        unset($data["primary"]);
        unset($data[$this->primary]);
        $p = $this->primary;

        return $this->update($this->table , $data, $this->primary , $this->$p );
    }

    public function delete(){
/*delete a table known by his primary */
       $p = $this->primary;
       return $this->remove($this->table , $this->primary , $this->$p );
    }

    public function put(){
/* insert data into table known by his primary and if it is exist update it */
        $data = (array) $this;
        unset($data["table"]);
        unset($data["primary"]);
        return $this->upsert($this->table , $data);
    }


    public function find( $where = '1', $params = array()){
/*find table where condition into () are done */
        return $this->select($this->table , $where, $params);
    }

    public function requette( $requette, $params = array()){
/* do this requette by their paramettres into () withe DB connexion */
        return $this->req($this->table , $requette, $params);
    }

    public function getone( $id){
/*getone element of table where id=id */
        return $this->one($this->table , $this->primary.' = :id', [':id' => $id]);
    }


    public function getall(){
        /* get all the element of the table */
        $data = $_GET ;
        $params = (!empty($data["query"]) ) ? (array) json_decode($data["query"]) : [];
        $pageno = (!empty($data["page"]) ) ? (int) $data["page"] : 1;
        $perpage = (!empty($data["limit"]) && $data["limit"] != -1 ) ? (int) $data["limit"] : 10;
        $offset = ($pageno-1) * $perpage;
        $limit = (!empty($data["limit"]) && $data["limit"] != -1 ) ? "LIMIT $offset , $perpage" : "";
        $p = array();
        foreach ($params as $key => $value) {

            array_push($p , $key." LIKE :$key ");

            $value = str_replace("*","%",$value);
            $value = str_replace(" ","%",$value);
            $params[$key] = "%$value%";
        }
        $orderby = "";
        if(!empty($data["orderBy"])){
          $orderby = ( $data["ascending"] == 0 ) ? "ORDER BY ".$data['orderBy']." DESC" : "ORDER BY ".$data['orderBy']." ASC";
        }
        $where = (!empty($p)  ) ? implode(' AND ', $p) : '1';
        $sql ="SELECT COUNT(*) FROM $this->table WHERE $where" ;
        $stmt1 = $this->requette($sql,$params);
        $count = $stmt1["stmt"]->fetch();
        $p = $where.' '.$orderby.' '.$limit;
        if(empty($data["limit"]) || $data["limit"] == 1 ){
          return $this->select($this->table , $p);
        }else{
          return ['data' => $this->select($this->table , $p, $params) , 'count' => $count[0]];
        }
    }

	public function x($id){
/* select from $table1 where $ref = $ref1 and put on $table2 ($class) where $ref=$ref2 => each $table1 has one $class */
		return $this->hasone('$table1', $ref1 , $id, $this->$ref2 , '$table2');
	}

	public function y($id){
/* select from $table1 where $ref = $ref1 and put on $table2 ($class) => each $table1 has many $class */
	   return  $this->hasmany('$table1', '$ref1' , $id , '$table2');
	}

	public function z($id){
/* select from $table1 to $table2 by $id where id table2= $reftable2 and serching id=$ref cherché in id table2=$reftabl1=$reftab1 of $table1*/
        $this->join('$tab1', '$table2' , $id, '$reftab2' , '$ref cherché' , '$reftab1', '$tab1');
	}

    public function hasone($table , $ref , $column , $class ){
/* select from $table1 where $ref = $ref1 and put on $table2 ($class) where $ref=$ref2 => each $table1 has one $class */
        return $this->ormone($table , $ref.' = :COLUMN', [':COLUMN' => $column] , $class);
    }

    public function hasmany($table , $ref , $column , $class ){
/* select from $table1 where $ref = $ref1 and put on $table2 ($class) => each $table1 has many $class */
        return $this->ormmany($table , $ref.' = :COLUMN', [':COLUMN' => $column] , $class);
    }

    public function join($table, $jointable , $column, $joincolumn , $refjoincolumn , $ref, $class){
/* remplir in $jointable from $table and $joincolumn from $column where $refjoincolumn=$refjoincolumn */
        return $this->ormjoin($table, $jointable , $jointable.'.'.$joincolumn.' = :COLUMN  AND '.$table.'.'.$ref.' = '.$jointable.'.'.$refjoincolumn, [':COLUMN' => $column] , $class);
    }


    public function createmultiple($datas){
/* insert multiple ligne $d in table known by this primary */
      $data = json_decode(json_encode($datas), true);
      $d = array_map(function($n) {
        unset($n["table"]);
        unset($n["primary"]);
        return $n;
      }, $data);

    return $this->multipleinsert($this->table , $d);
    }






}
