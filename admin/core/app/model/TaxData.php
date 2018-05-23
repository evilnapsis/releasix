<?php
class TaxData {
	public static $tablename = "tax";



	public function TaxData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->image = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (name,kind,created_at) ";
		$sql .= "value (\"$this->name\",\"$this->kind\",$this->created_at)";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto TaxData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\" where id=$this->id";
		Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new TaxData());
	}



	public static function getCategories(){
		$sql = "select * from ".self::$tablename." where kind=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TaxData());
	}

	public static function getPMs(){
		$sql = "select * from ".self::$tablename." where kind=2";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TaxData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TaxData());
	}


}

?>