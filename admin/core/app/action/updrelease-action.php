<?php

if(count($_POST)>0){
	$user = RelData::getById($_POST["id"]);
	$user->title = $_POST["title"];
	$user->tag = $_POST["tag"];
	$user->date_at = $_POST["date_at"];
	$user->changelog = $_POST["changelog"];
	$user->downloadlink = $_POST["downloadlink"];
	$user->project_id = $_POST["project_id"];
	$user->is_active=isset($_POST["is_active"])?1:0;
	$user->update();


	print "<script>window.location='index.php?view=releases';</script>";


}


?>