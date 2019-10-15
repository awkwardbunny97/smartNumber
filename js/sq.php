<?php
require_once '../inc/top.php';
require_once '../inc/user_info.php';

if (isset($_POST['key_sq'])) {
    $id = $_POST['id'];
    $key_sq = $_POST['key_sq'];
    $store_code_sq = $_POST['store_code_sq'];

    if($id != 0 && $id != '' && ctype_digit($id) && ctype_digit($key_sq)){
      $insert_sq = $db->prepare("INSERT INTO `$store_code_sq` (`cus_id`, `sq_key`) VALUES
      ('$id', '$key_sq')");
      $insert_sq->execute();
      $insert_sq->closeCursor();
    }

  }

?>
