<?php
$user = RelData::getById($_GET["id"]);
$user->del();
print "<script>window.location='index.php?view=releases';</script>";

?>