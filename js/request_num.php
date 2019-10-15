<?php
require_once '../inc/top.php';
require_once '../inc/user_info.php';

if(isset($_POST['request_num'])){
  $today_for_request_num = date("Y-m-d");

  //////////////
  ///Cal newNum/
  //////////////
  $cal_newNum = $db->prepare("SELECT COUNT(newNum) FROM $store_code where (`newNum` = 1 and `empCode` = '' and `isABIT` = 0 and `isCombo` = 0 and `isTest` = 0)");
  $cal_newNum->execute();
  $newNums = $cal_newNum->fetchAll();
  $total_newNum = $newNums[0][0];
  $cal_newNum->closeCursor();
  //////////////
  ///Cal abit/
  //////////////
  $cal_abit = $db->prepare("SELECT COUNT(newNum) FROM $store_code where (`newNum` = 1 and `empCode` = '' and `isABIT` = 1)");
  $cal_abit->execute();
  $newAbits = $cal_abit->fetchAll();
  $total_abit = $newAbits[0][0];
  $cal_abit->closeCursor();
  //////////////
  ///Cal combo/
  //////////////
  $cal_combo = $db->prepare("SELECT COUNT(newNum) FROM $store_code where (`newNum` = 1 and `empCode` = '' and `isCombo` = 1)");
  $cal_combo->execute();
  $newCombo = $cal_combo->fetchAll();
  $total_combo = $newCombo[0][0];
  $cal_combo->closeCursor();

  $real_total_num = $total_newNum + $total_abit + $total_combo;
  
  if ($canGetCombo > 0) {
    $turns = 0;
    if ($canGetCombo > $total_combo) {
      $turns = $total_combo;
    }
    else if($canGetCombo < $total_combo){
      $turns = $canGetCombo;
    }
    else if ($canGetCombo = $total_combo) {
      $turns = $canGetCombo;
    }

    for ($i14=0; $i14 < $turns; $i14++) {

        $get_new_combo_num = $db->prepare("select * from $store_code where (`newNum` = 1 and `empCode` = '' and `isCombo` = 1)");
        $get_new_combo_num->execute();
        $new_combo_num = $get_new_combo_num->fetchAll();
        $get_new_combo_num->closeCursor();


        //$rand = rand(0,count($new_abit_num)-1);
        $fetch_combo_num = $new_combo_num[0]['id'];

        $add_emp_code = $db->prepare("UPDATE $store_code SET `empCode` = '$empCode' WHERE `$store_code`.`id` = $fetch_combo_num");
        $add_emp_code->execute();
        $add_emp_code->closeCursor();

        $fix_new_num = $db->prepare("UPDATE $store_code SET `newNum` = 0 WHERE `$store_code`.`id` = $fetch_combo_num");
        $fix_new_num->execute();
        $fix_new_num->closeCursor();

        $add_give_date = $db->prepare("UPDATE $store_code SET `giveDate` = '$today_for_request_num' WHERE `$store_code`.`id` = $fetch_combo_num");
        $add_give_date->execute();
        $add_give_date->closeCursor();

    }

    $reset_canGet_combo = $db->prepare("UPDATE user_account SET canGetCombo = 0 WHERE userID = '$userID'");
    $reset_canGet_combo->execute();
    $reset_canGet_combo->closeCursor();
  }

  if ($canGetAbit > 0) {
    $turns = 0;
    if ($canGetAbit > $total_abit) {
      $turns = $total_abit;
    }
    else if($canGetAbit < $total_abit){
      $turns = $canGetAbit;
    }
    else if ($canGetAbit = $total_abit) {
      $turns = $canGetAbit;
    }

    for ($i14=0; $i14 < $turns; $i14++) {

        $get_new_abit_num = $db->prepare("select * from $store_code where (`newNum` = 1 and `empCode` = '' and `isABIT` = 1 )");
        $get_new_abit_num->execute();
        $new_abit_num = $get_new_abit_num->fetchAll();
        $get_new_abit_num->closeCursor();


        //$rand = rand(0,count($new_abit_num)-1);
        $fetch_abit_num = $new_abit_num[0]['id'];

        $add_emp_code = $db->prepare("UPDATE $store_code SET `empCode` = '$empCode' WHERE `$store_code`.`id` = $fetch_abit_num");
        $add_emp_code->execute();
        $add_emp_code->closeCursor();

        $fix_new_num = $db->prepare("UPDATE $store_code SET `newNum` = 0 WHERE `$store_code`.`id` = $fetch_abit_num");
        $fix_new_num->execute();
        $fix_new_num->closeCursor();

        $add_give_date = $db->prepare("UPDATE $store_code SET `giveDate` = '$today_for_request_num' WHERE `$store_code`.`id` = $fetch_abit_num");
        $add_give_date->execute();
        $add_give_date->closeCursor();

    }

    $reset_canGet_abit = $db->prepare("UPDATE user_account SET canGetAbit = 0 WHERE userID = '$userID'");
    $reset_canGet_abit->execute();
    $reset_canGet_abit->closeCursor();
  }

  if ($canGet > 0) {
    $turns = 0;
    if ($canGet > $total_newNum) {
      $turns = $total_newNum;
    }
    else if($canGet < $total_newNum){
      $turns = $canGet;
    }
    else if ($canGet = $total_newNum) {
      $turns = $canGet;
    }
    for ($i14=0; $i14 < $turns; $i14++) {

        $get_new_num = $db->prepare("select * from $store_code where (`newNum` = 1 and `empCode` = '' and `isABIT` = 0 and isCombo = 0 and isTest = 0)");
        $get_new_num->execute();
        $new_num = $get_new_num->fetchAll();
        $get_new_num->closeCursor();


        //$rand = rand(0,count($new_num)-1);
        $fetch_num = $new_num[0]['id'];

        $add_emp_code = $db->prepare("UPDATE $store_code SET `empCode` = '$empCode' WHERE `$store_code`.`id` = $fetch_num");
        $add_emp_code->execute();
        $add_emp_code->closeCursor();

        $fix_new_num = $db->prepare("UPDATE $store_code SET `newNum` = 0 WHERE `$store_code`.`id` = $fetch_num");
        $fix_new_num->execute();
        $fix_new_num->closeCursor();

        $add_give_date = $db->prepare("UPDATE $store_code SET `giveDate` = '$today_for_request_num' WHERE `$store_code`.`id` = $fetch_num");
        $add_give_date->execute();
        $add_give_date->closeCursor();

    }

    $reset_canGet = $db->prepare("UPDATE user_account SET canGet = 0 WHERE userID = '$userID'");
    $reset_canGet->execute();
    $reset_canGet->closeCursor();
  }

}

?>
