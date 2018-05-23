<?php
$user = LicenseData::getById($_GET["id"]);
$active = 0;
if($user->is_active==0){ $active=1;}

$user->is_active=  $active;
$user->activate();
Core::redir("./?view=licenses");
?>