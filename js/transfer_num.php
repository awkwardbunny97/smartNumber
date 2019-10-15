<?php
require_once '../inc/top.php';
require_once '../inc/user_info.php';

if (isset($_POST['target_empCode_for_transfering'])) {
    $target_empCode = $_POST['target_empCode_for_transfering'];
    $target_phone = $_POST['target_phone_for_transfering'];

    $update_newNum = $db->prepare("UPDATE $store_code SET `newNum` = 0 WHERE phone = '$target_phone'");
    $update_newNum-> execute();
    $update_newNum->closeCursor();

    $update_empCode = $db->prepare("UPDATE $store_code SET `empCode` = '$target_empCode' WHERE phone = '$target_phone'");
    $update_empCode-> execute();
    $update_empCode->closeCursor();

    $newDate = date('Y-m-d');
    $update_giveDate = $db->prepare("UPDATE $store_code SET `giveDate` = '$newDate' WHERE phone = '$target_phone'");
    $update_giveDate-> execute();
    $update_giveDate->closeCursor();
  }

?>
