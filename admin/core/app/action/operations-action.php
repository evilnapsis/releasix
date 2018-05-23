<?php

if(isset($_GET["opt"]) && $_GET["opt"]!=""){
	$opt = $_GET["opt"];
	if($opt=="add"){

$ins = OperationData::SumByKind(1);
$outs = OperationData::SumByKind(2);

		$op = new OperationData();

		$op->account_id = $_POST["account_id"];
		$op->person_id = $_POST["person_id"];
		$op->category_id = $_POST["category_id"];
		$op->paymethod_id = $_POST["paymethod_id"];

		$op->concept = $_POST["concept"];
		$op->date_at = $_POST["date_at"];
		$op->description = $_POST["description"];
		$op->amount = $_POST["amount"];
		$op->kind = $_POST["kind"];
		$op->add();
		Core::redir("./?view=operations&opt=all");
	}
	else if($opt=="update"){
		$op = OperationData::getById($_POST["id"]);
$ins = OperationData::SumByKind(1);
$outs = OperationData::SumByKind(2);
//$avaiable-($diff);
		$op->account_id = $_POST["account_id"];
		$op->person_id = $_POST["person_id"];
		$op->category_id = $_POST["category_id"];
		$op->paymethod_id = $_POST["paymethod_id"];

		$op->concept = $_POST["concept"];
		$op->date_at = $_POST["date_at"];
		$op->description = $_POST["description"];
		$op->amount = $_POST["amount"];
		$op->update();

		Core::redir("./?view=operations&opt=all");
	}
	else if($opt=="del"){
		$op = OperationData::getById($_GET["id"]);

$ins = OperationData::SumByKind(1);
$outs = OperationData::SumByKind(2);
$avaiable = $ins->s-$outs->s;
if($op->kind==2||($op->kind==1&&$avaiable-$op->amount>0)){		
		$op->del();
}else{
		Core::alert("No se puede efectuar la actualizacion!");

}
		Core::redir("./?view=operations&opt=all");

	}
}




?>