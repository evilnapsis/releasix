<?php
$user = LicenseData::getById($_GET["id"]);
$user->del();
print "<script>window.location='index.php?view=licenses';</script>";

?>