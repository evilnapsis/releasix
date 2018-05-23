<?php

$fil = new Upload($_FILES["src"]);

if($fil->uploaded){
	$fil->Process("storage/files/");
	if($fil->uploaded){
		$r = new FileData();
		$r->src = $fil->file_dst_name;
		$r->title = $_POST["title"];
		$r->description = htmlspecialchars($_POST["description"]);
		$category_id = "NULL";
		if($_POST["category_id"]!=""){ $category_id = $_POST["category_id"]; }
		$r->category_id = $category_id;
		$project_id = "NULL";
		if($_POST["project_id"]!=""){ $project_id = $_POST["project_id"]; }
		$r->project_id = $project_id;
		$r->user_id = $_SESSION["user_id"];
		$r->add();

	}
}



Core::redir("./index.php?view=files");
?>