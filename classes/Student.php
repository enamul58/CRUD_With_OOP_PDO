<?php
include "DB.php";
 class Student{

 	private $table = "tbl_student";
 	private $name;
 	private $age;
 	private $dep;

 	public function setName( $name ){
    	$this->name = $name;
 	} 
	public function setDep( $dep ){
	   	$this->dep = $dep;
	} 
 	public function setAge( $age ){
 		$this->age = $age;
 	} 
 			
 	public function insert(){
 		$sql = "insert into $this->table(name,dep,age) 
 				values(:name,:dep,:age)";
 		$stmt = DB::prepare($sql);
 		$stmt->bindParam(':name',$this->name);
 		$stmt->bindParam(':dep',$this->dep);
 		$stmt->bindParam(':age',$this->age);
 		return $stmt->execute();

 	}
    public function update( $id ){
    	$sql = "update $this->table set name=:name, dep=:dep, age=:age where id = :id";
    	$stmt = DB::prepare($sql);
    	$stmt->bindParam(':name', $this->name);
    	$stmt->bindParam(':dep', $this->dep);
    	$stmt->bindParam(':age', $this->age);
    	$stmt->bindParam(':id', $id);
    	return $stmt->execute();

    }

 	public function readById($id){
 		$sql = "select * from $this->table where id = :id";
 		$stmt = DB::prepare($sql);
 		$stmt->bindParam(':id', $id);
 		$stmt->execute();
 		return $stmt->fetch();
 	}

 	public function readAll(){
 		$sql = "select * from $this->table";
 		$stmt = DB::prepare($sql);
 		$stmt->execute();
 		return $stmt->fetchAll();

 	}
    public function delete($id){
        $sql = "delete from $this->table where id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
 }

?>