<?php

if(count($_POST)>0){
	$user = new ContactData();
	$user->name = $_POST["name"];
//	$user->category_id = $category_id;
	$user->lastname = $_POST["lastname"];
	$user->address = $_POST["address"];
	$user->email = $_POST["email"];
	$user->phone = $_POST["phone"];

	$user->phone2 = $_POST["phone2"];
	$user->city = $_POST["city"];
	$user->cp = $_POST["cp"];
	$user->description = $_POST["description"];

	$user->add();

print "<script>window.location='index.php?view=contacts';</script>";


}


?>