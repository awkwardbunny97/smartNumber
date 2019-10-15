<?php
$get_number_sheets_mark = $db->prepare("select * from $store_code where createdDate = '$date'");
$get_number_sheets_mark->execute();
$numbers_mark = $get_number_sheets_mark->fetchAll();

$get_number_sheets_mark->closeCursor();

?>
