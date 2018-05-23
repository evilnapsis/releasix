<?php
if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
if(count($_POST)>0){
	$user = new AccountData();
	$user->name = $_POST["name"];
	$user->add();

print "<script>window.location='index.php?view=accounts&opt=all';</script>";


}
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="upd"){
if(count($_POST)>0){
	$user = AccountData::getById($_POST["user_id"]);
	$user->name = $_POST["name"];
	$user->update();
print "<script>window.location='index.php?view=accounts&opt=all';</script>";


}
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
$category = AccountData::getById($_GET["id"]);
$category->del();
Core::redir("./index.php?view=accounts&opt=all");
}



?>