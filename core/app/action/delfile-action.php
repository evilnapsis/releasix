<?php
$user = FileData::getById($_GET["id"]);
unlink("storage/files/".$user->src);
$user->del();
print "<script>window.location='index.php?view=files';</script>";

?>