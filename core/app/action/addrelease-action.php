<?php

$r = new RelData();
$r->date_at = $_POST["date_at"];
$r->project_id = $_POST["project_id"];
$r->user_id = $_SESSION["user_id"];

$r->tag = $_POST["tag"];
$r->title = $_POST["title"];
$r->changelog = $_POST["changelog"];
$r->downloadlink = $_POST["downloadlink"];

	$r->is_active=isset($_POST["is_active"])?1:0;

$r->add();

Core::redir("./index.php?view=releases");
?>