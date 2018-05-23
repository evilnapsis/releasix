<?php
class RelData {
	public static $tablename = "rel";

	public function RelData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->category_id = "NULL";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function getProject(){ return ProjectData::getById($this->project_id); }
	public function getUser(){ return UserData::getById($this->user_id); }

	public function add(){
		$sql = "insert into ".self::$tablename." (tag,title,changelog,downloadlink, date_at,is_active,project_id,user_id,created_at) ";
		$sql .= "value (\"$this->tag\",\"$this->title\",\"$this->changelog\",\"$this->downloadlink\",\"$this->date_at\",\"$this->is_active\",$this->project_id,$this->user_id,$this->created_at)";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto RelData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set date_at=\"$this->date_at\",title=\"$this->title\",tag=\"$this->tag\",downloadlink=\"$this->downloadlink\",project_id=$this->project_id,is_active=$this->is_active,changelog=\"$this->changelog\" where id=$this->id";
		Executor::doit($sql);
	}

	public function done(){
		$sql = "update ".self::$tablename." set is_done=\"$this->is_done\" where id=$this->id";
		Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new RelData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new RelData());
	}

	public static function getPendings(){
		$sql = "select * from ".self::$tablename." where is_done=0";
		$query = Executor::doit($sql);
		return Model::many($query[0],new RelData());
	}

	public static function getPendingsL($l){
		$sql = "select * from ".self::$tablename." where is_done=0 limit $l";
		$query = Executor::doit($sql);
		return Model::many($query[0],new RelData());
	}


	public static function getAllByProjectId($id){
		$sql = "select * from ".self::$tablename." where project_id=$id order by created_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new RelData());
	}


	public static function getBySQL($sql){
		$query = Executor::doit($sql);
		return Model::many($query[0],new RelData());
	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new RelData());
	}


}

?>