<?php

$r = new LicenseData();
$r->date_at = $_POST["date_at"];
$r->project_id = $_POST["project_id"];
$r->user_id = $_POST["user_id"];
	$r->is_active=isset($_POST["is_active"])?1:0;

$r->add();

Core::redir("./index.php?view=licenses");
?>