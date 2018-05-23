<?php

if(count($_POST)>0){
	$user = new TaxData();
	$user->name = $_POST["name"];
	$user->kind=1;
	$user->add();

print "<script>window.location='index.php?view=categories';</script>";


}


?>