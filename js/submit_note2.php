<?php
require_once '../inc/top.php';
require_once '../inc/user_info.php';

$new_note2 ='';
if(isset($_POST["cus_note_js2"])){

  $target_phone = $_POST['target_phone2'];
  $new_note = $_POST["cus_note_js2"];

  $send_note = $db->prepare("UPDATE $store_code SET notes = '$new_note' WHERE phone = '$target_phone'");
  $send_note->execute();
  $send_note->closeCursor();

  if (strpos(strtolower($new_note), 'knm') !== false || strpos(strtolower($new_note), 'gls') !== false){
    $change_color = $db->prepare("UPDATE $store_code SET color = 'yellow' WHERE phone = '$target_phone'");
    $change_color->execute();
    $change_color->closeCursor();
  }
  else if(strpos(strtolower($new_note), 'tiem nang') !== false){
    $change_color = $db->prepare("UPDATE $store_code SET color = 'blue' WHERE phone = '$target_phone'");
    $change_color->execute();
    $change_color->closeCursor();
  }
  else if (strpos(strtolower($new_note), 'tgl') !== false){
    $change_color = $db->prepare("UPDATE $store_code SET color = 'purple' WHERE phone = '$target_phone'");
    $change_color->execute();
    $change_color->closeCursor();
  }
  else if (strpos(strtolower($new_note), 'done') !== false){
    $change_color = $db->prepare("UPDATE $store_code SET color = 'green' WHERE phone = '$target_phone'");
    $change_color->execute();
    $change_color->closeCursor();
  }
  else if (strpos(strtolower($new_note), 'trung so') !== false || strpos(strtolower($new_note), 'sai so') !== false || strpos(strtolower($new_note), 'nham so') !== false || strpos(strtolower($new_note), 'kbb') !== false){
    $change_color = $db->prepare("UPDATE $store_code SET color = 'red' WHERE phone = '$target_phone'");
    $change_color->execute();
    $change_color->closeCursor();
  }
  else if (strpos(strtolower($new_note), 'cdt') !== false){
    $change_color = $db->prepare("UPDATE $store_code SET color = 'pink' WHERE phone = '$target_phone'");
    $change_color->execute();
    $change_color->closeCursor();
  }
  else{
    $change_color = $db->prepare("UPDATE $store_code SET color = '' WHERE phone = '$target_phone'");
    $change_color->execute();
    $change_color->closeCursor();
  }

}
?>
