<?php include_once 'dbfun.php';
$data=single("mybooks","prodid='{$_GET["prodid"]}'");
?>
<embed src="PDFs/<?= $data["pdf"] ?>" width="100%" height="800">
