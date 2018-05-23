<?php

if(count($_POST)>0){
	$user = new ProjectData();
	$user->name = $_POST["name"];
	$user->start_at = $_POST["start_at"];
	$user->finish_at = $_POST["finish_at"];
	$user->status_id = $_POST["status_id"];
	$user->kind = $_POST["kind"];
	$user->add();

print "<script>window.location='index.php?view=projects';</script>";


}


?>