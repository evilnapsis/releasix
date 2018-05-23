<?php
$user = NoteData::getById($_GET["id"]);
$user->del();
print "<script>window.location='index.php?view=notes';</script>";

?>