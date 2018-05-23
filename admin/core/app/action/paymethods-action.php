<?php
if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
if(count($_POST)>0){
	$user = new TaxData();
	$user->name = $_POST["name"];
	$user->kind = 2;//$_POST["name"];
	$user->add();

print "<script>window.location='index.php?view=paymethods&opt=all';</script>";


}
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="upd"){
if(count($_POST)>0){
	$user = TaxData::getById($_POST["user_id"]);
	$user->name = $_POST["name"];
	$user->update();
print "<script>window.location='index.php?view=paymethods&opt=all';</script>";


}
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
$category = TaxData::getById($_GET["id"]);
$category->del();
Core::redir("./index.php?view=paymethods&opt=all");
}



?>