<?php
require_once '../inc/top.php';
require_once '../inc/user_info.php';

$new_note2 ='';
if(isset($_POST["new_note_search_submit"])){
  $target_phone_for_new_note = $_POST['target_phone_for_new_note'];
  $new_note2 = $_POST["new_note_search_submit"];
  $send_note2 = $db->prepare("UPDATE $store_code SET notes = '$new_note2' WHERE phone = '$target_phone_for_new_note'");
  $send_note2->execute();
  $send_note2->closeCursor();

  if (strpos(strtolower($new_note2), 'knm') !== false || strpos(strtolower($new_note2), 'gls') !== false){
    $change_color = $db->prepare("UPDATE $store_code SET color = 'yellow' WHERE phone = '$target_phone_for_new_note'");
    $change_color->execute();
    $change_color->closeCursor();
  }
  else if(strpos(strtolower($new_note2), 'tiem nang') !== false){
    $change_color = $db->prepare("UPDATE $store_code SET color = 'blue' WHERE phone = '$target_phone_for_new_note'");
    $change_color->execute();
    $change_color->closeCursor();
  }
  else if (strpos(strtolower($new_note2), 'tgl') !== false){
    $change_color = $db->prepare("UPDATE $store_code SET color = 'purple' WHERE phone = '$target_phone_for_new_note'");
    $change_color->execute();
    $change_color->closeCursor();
  }
  else if (strpos(strtolower($new_note2), 'done') !== false){
    $change_color = $db->prepare("UPDATE $store_code SET color = 'green' WHERE phone = '$target_phone_for_new_note'");
    $change_color->execute();
    $change_color->closeCursor();
  }
  else if (strpos(strtolower($new_note2), 'trung so') !== false || strpos(strtolower($new_note2), 'sai so') !== false || strpos(strtolower($new_note2), 'nham so') !== false || strpos(strtolower($new_note2), 'kbb') !== false){
    $change_color = $db->prepare("UPDATE $store_code SET color = 'red' WHERE phone = '$target_phone_for_new_note'");
    $change_color->execute();
    $change_color->closeCursor();
  }
  else if (strpos(strtolower($new_note2), 'cdt') !== false){
    $change_color = $db->prepare("UPDATE $store_code SET color = 'pink' WHERE phone = '$target_phone_for_new_note'");
    $change_color->execute();
    $change_color->closeCursor();
  }
  else{
    $change_color = $db->prepare("UPDATE $store_code SET color = '' WHERE phone = '$target_phone_for_new_note'");
    $change_color->execute();
    $change_color->closeCursor();
  }
}
?>
