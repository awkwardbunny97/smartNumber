<?php
require_once '../inc/top.php';
require_once '../inc/user_info.php';

//////////
//All sale
if (isset($_POST['reset_all'])) {

  $reset_bonus = $db->prepare("UPDATE `user_account` SET `canGet` = 0,`bonus` = 0,`canGetAbit` = 0,`canGetCombo` = 0,`canGetTest` = 0,`canGetTest2` = 0 WHERE store_code = '$store_code'");
  $reset_bonus->execute();
  $reset_bonus->closeCursor();

}

if (isset($_POST['reset_num'])) {

  $reset_bonus = $db->prepare("UPDATE `user_account` SET `canGet` = 0,`bonus` = 0,`canGetAbit` = 0,`canGetCombo` = 0,`canGetTest` = 0,`canGetTest2` = 0 WHERE store_code = '$store_code'");
  $reset_bonus->execute();
  $reset_bonus->closeCursor();
}

if (isset($_POST['activate_f2_5'])) {

  $set_f2 = $db->prepare("UPDATE `user_account` SET `canGet` = 5 WHERE (store_code = '$store_code' AND `user_account`.`auth_level` <> 'admin')");
  $set_f2->execute();
  $set_f2->closeCursor();
}

if (isset($_POST['activate_abit_5'])) {

  $set_abit = $db->prepare("UPDATE `user_account` SET `canGetAbit` = 5 WHERE (store_code = '$store_code' AND `user_account`.`auth_level` <> 'admin')");
  $set_abit->execute();
  $set_abit->closeCursor();
}

if (isset($_POST['activate_3_2'])) {
  $set_new_3 = $db->prepare("UPDATE `user_account` SET `canGet` = 3,`canGetAbit` = 2 WHERE (store_code = '$store_code' AND `user_account`.`auth_level` <> 'admin')");
  $set_new_3->execute();
  $set_new_3->closeCursor();

}

if (isset($_POST['activate_3_new'])) {
  $set_f2 = $db->prepare("UPDATE `user_account` SET `canGet` = 3 WHERE (store_code = '$store_code' AND `user_account`.`auth_level` <> 'admin')");
  $set_f2->execute();
  $set_f2->closeCursor();
}

if (isset($_POST['activate_3_abit'])) {
  $set_abit = $db->prepare("UPDATE `user_account` SET `canGetAbit` = 3 WHERE (store_code = '$store_code' AND `user_account`.`auth_level` <> 'admin')");
  $set_abit->execute();
  $set_abit->closeCursor();
}

if (isset($_POST['activate_2_new_1_abit'])) {
  $set_new_3 = $db->prepare("UPDATE `user_account` SET `canGet` = 2,`canGetAbit` = 1 WHERE (store_code = '$store_code' AND `user_account`.`auth_level` <> 'admin')");
  $set_new_3->execute();
  $set_new_3->closeCursor();

}

if (isset($_POST['activate_1_new_2_abit'])) {
  $set_new_3 = $db->prepare("UPDATE `user_account` SET `canGet` = 1,`canGetAbit` = 2 WHERE (store_code = '$store_code' AND `user_account`.`auth_level` <> 'admin')");
  $set_new_3->execute();
  $set_new_3->closeCursor();

}

if (isset($_POST['activate_7_new_3_abit'])) {
  $set_new_3 = $db->prepare("UPDATE `user_account` SET `canGet` = 7,`canGetAbit` = 3 WHERE (store_code = '$store_code' AND `user_account`.`auth_level` <> 'admin')");
  $set_new_3->execute();
  $set_new_3->closeCursor();

}
if (isset($_POST['activate_1_new_2_test'])) {
  $set_new_3 = $db->prepare("UPDATE `user_account` SET `canGet` = 1,`canGetTest` = 2 WHERE (store_code = '$store_code' AND `user_account`.`auth_level` <> 'admin')");
  $set_new_3->execute();
  $set_new_3->closeCursor();
}
if (isset($_POST['activate_2_new_1_test'])) {
  $set_new_3 = $db->prepare("UPDATE `user_account` SET `canGet` = 2,`canGetTest` = 1 WHERE (store_code = '$store_code' AND `user_account`.`auth_level` <> 'admin')");
  $set_new_3->execute();
  $set_new_3->closeCursor();
}
if (isset($_POST['activate_3_new_2_test'])) {
  $set_new_3 = $db->prepare("UPDATE `user_account` SET `canGet` = 3,`canGetTest` = 2 WHERE (store_code = '$store_code' AND `user_account`.`auth_level` <> 'admin')");
  $set_new_3->execute();
  $set_new_3->closeCursor();
}
if (isset($_POST['activate_test_3'])) {
  $set_new_3 = $db->prepare("UPDATE `user_account` SET `canGetTest` = 3 WHERE (store_code = '$store_code' AND `user_account`.`auth_level` <> 'admin')");
  $set_new_3->execute();
  $set_new_3->closeCursor();
}
if (isset($_POST['activate_test_5'])) {
  $set_new_3 = $db->prepare("UPDATE `user_account` SET `canGetTest` = 5 WHERE (store_code = '$store_code' AND `user_account`.`auth_level` <> 'admin')");
  $set_new_3->execute();
  $set_new_3->closeCursor();
}
/////////
//List so
if (isset($_POST['check_value'])) {
  $data = filter_input(INPUT_POST, 'check_value', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_BACKTICK);
  $data = explode("\n", $data);
  $count = 0;
  $out = array();
  $step = 0;
  $last = count($data);
  $last--;

  foreach($data as $key=>$item){

     foreach(explode('	',$item) as $value){
      $out[$key][$step++] = $value;
      $count++;
     }

     if ($key!=$last){
      $out[$key][$step++] = '	'; // not inserting last "space"
     }
     $step = 0;
  }
  print_r($out);
}

// if (isset($_POST['sq_area'])) {
//   $data = $_POST['sq_area'];
//
//   $data = explode("\n", $data);
//
//   $out = array();
//   $step = 0;
//   $last = count($data);
//   $last--;
//
//   foreach($data as $key=>$item){
//
//      foreach(explode('	',$item) as $value){
//       $out[$key][$step++] = $value;
//      }
//
//      if ($key!=$last){
//       $out[$key][$step++] = '	'; // not inserting last "space"
//      }
//      $step = 0;
//   }
//
//   foreach ($out as $o) {
//     $o_fb = $o[0];
//     $o_name = $o[1];
//     $insert = $db->prepare("INSERT INTO `SQ_` (cus_id,sq_key) VALUES ('$o_fb','$o_name')");
//     $insert->execute();
//     $insert->closeCursor();
//
//   }
// }


if (isset($_POST['new_nums'])) {
  $i = 0;
  //$data = $_POST['new_nums'];
  $data = filter_input(INPUT_POST, 'new_nums', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_BACKTICK);
  $page_no = $_POST['page_no'];
  $data = explode("\n", $data);
  $today = date("Y-m-d");
  $out = array();
  $step = 0;
  $last = count($data);
  $last--;

  foreach($data as $key=>$item){

     foreach(explode('	',$item) as $value){
      $out[$key][$step++] = $value;
     }

     if ($key!=$last){
      $out[$key][$step++] = '	'; // not inserting last "space"
     }
     $step = 0;
  }

  foreach ($out as $o) {
    $o_fb = $o[0];
    $o_name = $o[1];
    $o_phone = $o[2];
    $o_add = $o[3];
    $o_con = $o[4];
    $o_id = $o[5];
    $insert = $db->prepare("INSERT INTO $store_code (facebook,name,phone,address,conditions,cusID,createdDate,page) VALUES ('$o_fb','$o_name','$o_phone','$o_add','$o_con','$o_id','$today','$page_no')");
    $insert->execute();
    $insert->closeCursor();
    $i++;
  }

}

if (isset($_POST['abit_nums'])) {
  $i = 0;
  //$data = $_POST['abit_nums'];
  $data = filter_input(INPUT_POST, 'abit_nums', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_BACKTICK);
  $data = explode("\n", $data);
  $today = date("Y-m-d");
  $out = array();
  $step = 0;
  $last = count($data);
  $last--;

  foreach($data as $key=>$item){

     foreach(explode('	',$item) as $value){
      $out[$key][$step++] = $value;
     }

     if ($key!=$last){
      $out[$key][$step++] = '	'; // not inserting last "space"
     }
     $step = 0;
  }

  foreach ($out as $o) {
    $o_fb = $o[0];
    $o_name = $o[1];
    $o_phone = $o[2];
    $o_add = $o[3];
    $o_con = $o[4];
    $o_id = $o[5];
    $insert = $db->prepare("INSERT INTO $store_code (facebook,name,phone,address,conditions,cusID,createdDate,isABIT) VALUES ('$o_fb','$o_name','$o_phone','$o_add','$o_con','$o_id','$today',1)");
    $insert->execute();
    $insert->closeCursor();
    $i++;
  }

}

if (isset($_POST['combo_nums'])) {
  //$data = $_POST['combo_nums'];
  $data = filter_input(INPUT_POST, 'combo_nums', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_BACKTICK);
  $page_no = $_POST['page_no'];
  $today = date("Y-m-d");
  $data = explode("\n", $data);

  $out = array();
  $step = 0;
  $last = count($data);
  $last--;

  foreach($data as $key=>$item){

     foreach(explode('	',$item) as $value){
      $out[$key][$step++] = $value;
     }

     if ($key!=$last){
      $out[$key][$step++] = '	'; // not inserting last "space"
     }
     $step = 0;
  }

  foreach ($out as $o) {
    $o_fb = $o[0];
    $o_name = $o[1];
    $o_phone = $o[2];
    $o_add = $o[3];
    $o_con = $o[4];
    $o_id = $o[5];
    $insert = $db->prepare("INSERT INTO $store_code (facebook,name,phone,address,conditions,cusID,createdDate,page,isCombo,notes) VALUES ('$o_fb','$o_name','$o_phone','$o_add','$o_con','$o_id','$today',$page_no,1,'COMBO')");
    $insert->execute();
    $insert->closeCursor();
  }

}

if (isset($_POST['phone_search_admin'])){
  $phone = $_POST['phone_search_admin'];

  $find_phone = $db->prepare("SELECT * from $store_code WHERE phone LIKE '%$phone%'");
  $find_phone-> execute();
  $results = $find_phone->fetchAll();
  $find_phone->closeCursor();

  $target_emp = $results[0]['empCode'];

  $find_emp = $db->prepare("SELECT * from user_account WHERE empCode  = '$target_emp'");
  $find_emp-> execute();
  $result_emp = $find_emp->fetchAll();
  $find_emp->closeCursor();

  $get_emp_code = $db->prepare("select * from user_account where store_code = '$store_code'");
  $get_emp_code->execute();
  $users2 = $get_emp_code->fetchAll();
  $get_emp_code->closeCursor();

  foreach ($results as $result) {
    print '<div class="row" style="margin-left:6%; margin-top: 3%">';
      print '<div class="col-xs-4">';
        print '<h4><b>Ngày chia: </b> ';
        print_r($results[0]['giveDate']);
        print '</h4>';
      print '</div>';

      if(empty($result_emp)){
        print '<div class="col-xs-4">';
          print '<h4><b>Sale: chưa chia</b>';

          print '</h4>';
        print '</div>';
      }
      else {
        print '<div class="col-xs-4">';
          print '<h4><b>Sale: </b>';
          print_r($result_emp[0]['name']);
          print '</h4>';
        print '</div>';
      }
      print '<div class="col-xs-4">';
        print '<h4><b>Page: </b>';
        print_r($results[0]['page']);
        print '</h4>';
      print '</div>';
    print '</div>';
    print '<div class="row" style="margin-left:6%; margin-top: 3%">';
      print '<div class="col-xs-2">';
        print '<h4><b>Tên</b></h4>';
      print '</div>';
      print '<div class="col-xs-2">';
        print '<h4><b>Facebook</b></h4>';
      print '</div>';
      print '<div class="col-xs-2">';
        print '<h4><b>SDT</b></h4>';
      print '</div>';
      print '<div class="col-xs-2">';
        print '<h4><b>Địa chỉ</b></h4>';
      print '</div>';
      print '<div class="col-xs-2">';
        print '<h4><b>Tình trạng</b></h4>';
      print '</div>';
    print '</div>';

    print '<div class="row" style="margin-left:6%; margin-top: 3%;">';
        print '<div class="col-xs-2">';
          print $result['name'];
        print '</div>';
        print '<div class="col-xs-2">';
          print $result['facebook'];
        print '</div>';
        print '<div class="col-xs-2">';
          print $result['phone'];
        print '</div>';
        print '<div class="col-xs-2">';
          print $result['address'];
        print '</div>';
        print '<div class="col-xs-2">';
          print $result['conditions'];
        print '</div>';
      print '</div>';
      print '<div class="row" style="margin-left:6%; margin-top: 3%;border-bottom: 1px solid black;
      padding-bottom: 2%">';
        print "<div class='col-md-5'>";
        print "<h4>Ghi chú: </h4>";
          print "<textarea rows='5' cols='45' name='note' readonly>";
          print $result['notes'];
          print "</textarea>";
          print "<br>";
        print "</div>";

        print "<div class='col-md-5'>";
          print '<form>';
          print '<input type="hidden" id="target_phone_for_transfering" value="'.$result['phone'].'">';
            print '<label><h4>Chọn nhân viên:</h4></label><br />';
            print '<div class="col-xs-2">';
                print '<select name="empCode" id="target_empCode_for_transfering" style="padding:10px;">';
                foreach ($users2 as $user2){
                  $empCode2 = $user2['empCode'];
                  print "<option value='$empCode2'>";
                    print $user2['name'];
                  print "</option>";
                }
                print '<select>';
            print '</div><br /><br />';
            print '<div class="col-xs-2">';
              print '<button type="submit" class="btn btn-primary" onclick="return send_num()">Chuyển số</button></button>';
            print "</div>";
          print '</form>';
        print "</div>";
      print "</div>";
    }
}
////////
//1 sale
if (isset($_POST['bonus_num'])) {
  $bonus_emp_array = $_POST['target_emp'];
  $bonus_bonus = $_POST['bonus_num'];

  foreach ($bonus_emp_array as $bonus_emp) {
    $get_temp_canGet = $db->prepare("select canGet from user_account where (store_code = '$store_code' AND empCode = '$bonus_emp')");
    $get_temp_canGet->execute();
    $temp_canGet = $get_temp_canGet->fetch();
    $temp_canGet_num = $temp_canGet['canGet'];
    $get_temp_canGet->closeCursor();

    $new_canGet = $temp_canGet_num + $bonus_bonus;

    $add_bonus2 = $db->prepare("UPDATE `user_account` SET `canGet` = $new_canGet where (store_code = '$store_code' AND empCode = '$bonus_emp')");
    $add_bonus2->execute();
    $add_bonus2->closeCursor();
  }

}

if (isset($_POST['bonus_num_abit'])) {
  $bonus_emp_array = $_POST['target_emp'];
  $bonus_bonus = $_POST['bonus_num_abit'];

  foreach ($bonus_emp_array as $bonus_emp) {
    $get_temp_canGet = $db->prepare("select canGetAbit from user_account where (store_code = '$store_code' AND empCode = '$bonus_emp')");
    $get_temp_canGet->execute();
    $temp_canGet = $get_temp_canGet->fetch();
    $temp_canGet_num = $temp_canGet['canGetAbit'];
    $get_temp_canGet->closeCursor();

    $new_canGet = $temp_canGet_num + $bonus_bonus;

    $add_bonus2 = $db->prepare("UPDATE `user_account` SET `canGetAbit` = $new_canGet where (store_code = '$store_code' AND empCode = '$bonus_emp')");
    $add_bonus2->execute();
    $add_bonus2->closeCursor();
  }
}

if (isset($_POST['bonus_num_test'])) {
  $bonus_emp_array = $_POST['target_emp'];
  $bonus_bonus = $_POST['bonus_num_test'];

  foreach ($bonus_emp_array as $bonus_emp) {
    $get_temp_canGet = $db->prepare("select canGetTest from user_account where (store_code = '$store_code' AND empCode = '$bonus_emp')");
    $get_temp_canGet->execute();
    $temp_canGet = $get_temp_canGet->fetch();
    $temp_canGet_num = $temp_canGet['canGetTest'];
    $get_temp_canGet->closeCursor();

    $new_canGet = $temp_canGet_num + $bonus_bonus;

    $add_bonus2 = $db->prepare("UPDATE `user_account` SET `canGetTest` = $new_canGet where (store_code = '$store_code' AND empCode = '$bonus_emp')");
    $add_bonus2->execute();
    $add_bonus2->closeCursor();
  }
}

if (isset($_POST['bonus_num_test_gls'])) {
  $bonus_emp_array = $_POST['target_emp'];
  $bonus_bonus = $_POST['bonus_num_test_gls'];

  foreach ($bonus_emp_array as $bonus_emp) {
    $get_temp_canGet = $db->prepare("select canGetTest2 from user_account where (store_code = '$store_code' AND empCode = '$bonus_emp')");
    $get_temp_canGet->execute();
    $temp_canGet = $get_temp_canGet->fetch();
    $temp_canGet_num = $temp_canGet['canGetTest2'];
    $get_temp_canGet->closeCursor();

    $new_canGet = $temp_canGet_num + $bonus_bonus;

    $add_bonus2 = $db->prepare("UPDATE `user_account` SET `canGetTest2` = $new_canGet where (store_code = '$store_code' AND empCode = '$bonus_emp')");
    $add_bonus2->execute();
    $add_bonus2->closeCursor();
  }
}

if (isset($_POST['bonus_num_combo'])) {
  $bonus_emp_array = $_POST['target_emp'];
  $bonus_bonus = $_POST['bonus_num_combo'];

  foreach ($bonus_emp_array as $bonus_emp) {
    $get_temp_canGet = $db->prepare("select canGetCombo from user_account where (store_code = '$store_code' AND empCode = '$bonus_emp')");
    $get_temp_canGet->execute();
    $temp_canGet = $get_temp_canGet->fetch();
    $temp_canGet_num = $temp_canGet['canGetCombo'];
    $get_temp_canGet->closeCursor();

    $new_canGet = $temp_canGet_num + $bonus_bonus;

    $add_bonus2 = $db->prepare("UPDATE `user_account` SET `canGetCombo` = $new_canGet where (store_code = '$store_code' AND empCode = '$bonus_emp')");
    $add_bonus2->execute();
    $add_bonus2->closeCursor();
  }


}

if (isset($_POST['no_more_num'])) {
  $bonus_emp_array = $_POST['target_emp'];


  foreach ($bonus_emp_array as $bonus_emp) {
    $reset = $db->prepare("UPDATE `user_account` SET `canGet` = 0, `canGetAbit` = 0, `canGetCombo` = 0, `canGetTest` = 0, `canGetTest2` = 0 WHERE empCode = '$bonus_emp'");
    $reset->execute();
    $reset->closeCursor();

  }

}

//////////
//history
if (isset($_POST['date_for_history'])) {
  $date = $_POST['date_for_history'];

  //used nums
  $get_used_nums = $db->prepare("select * from $store_code where empCode != '' and giveDate = '$date'");
  $get_used_nums->execute();
  $used_nums = $get_used_nums->fetchAll();
  $total_used_num = count($used_nums);
  $get_used_nums->closeCursor();

  //cal_red
  $get_total_red = $db->prepare("SELECT COUNT(empCode) FROM `$store_code` WHERE `giveDate` = '$date' AND `color` = 'red'");
  $get_total_red->execute();
  $total_red_nums = $get_total_red->fetch();
  $reds = $total_red_nums['0'];
  $get_total_red->closeCursor();

  //cal_yellow
  $get_total_yellow = $db->prepare("SELECT COUNT(empCode) FROM `$store_code` WHERE `giveDate` = '$date' AND `color` = 'yellow'");
  $get_total_yellow->execute();
  $total_yellow_nums = $get_total_yellow->fetch();
  $yellows = $total_yellow_nums['0'];
  $get_total_yellow->closeCursor();

  //cal_green
  $get_total_green = $db->prepare("SELECT COUNT(empCode) FROM `$store_code` WHERE `giveDate` = '$date' AND `color` = 'green'");
  $get_total_green->execute();
  $total_green_nums = $get_total_green->fetch();
  $greens = $total_green_nums['0'];
  $get_total_green->closeCursor();

  //cal_blue
  $get_total_blue = $db->prepare("SELECT COUNT(empCode) FROM `$store_code` WHERE `giveDate` = '$date' AND `color` = 'blue'");
  $get_total_blue->execute();
  $total_blue_nums = $get_total_blue->fetch();
  $blues = $total_blue_nums['0'];
  $get_total_blue->closeCursor();

  //cal_pink
  $get_total_pink = $db->prepare("SELECT COUNT(empCode) FROM `$store_code` WHERE `giveDate` = '$date' AND `color` = 'pink'");
  $get_total_pink->execute();
  $total_pink_nums = $get_total_pink->fetch();
  $pinks = $total_pink_nums['0'];
  $get_total_pink->closeCursor();

  print '<br><br>';
  print '<div class="row">';
    print '<div class="col-md-3">';
      print '<p><b>Lượng số đã chia: </b> '. $total_used_num .'</p>';
    print '</div>';
  print '</div>';
  print '<div class="row">';
    print '<div class="col-md-2">';
      print '<p><b>Số đỏ:</b> '. $reds .'</p>';
    print '</div>';
    print '<div class="col-md-2">';
      print '<p><b>Số vàng:</b> '. $yellows .'</p>';
    print '</div>';
    print '<div class="col-md-2">';
      print '<p><b>Số xanh lá:</b> '. $greens .'</p>';
    print '</div>';
    print '<div class="col-md-2">';
      print '<p><b>Số xanh dương:</b> '. $blues .'</p>';
    print '</div>';
    print '<div class="col-md-2">';
      print '<p><b>Số hồng:</b> '. $pinks .'</p>';
    print '</div>';
  print '</div>';
  print '<br><br>';

}

if (isset($_POST['target_empCode_for_checking'])){
  $result_emps = $_POST['target_empCode_for_checking'];
  $date_for_checking = $_POST['date_for_checking'];
  $z = 1;



  foreach ($result_emps as $result_emp) {


    //get user
    $getUser = $db->prepare("select name,store_code from user_account where empCode = '$result_emp' and store_code = '$store_code'");
    $getUser->execute();
    $user_name = $getUser->fetch();
    $getUser->closeCursor();

    //cal_num
    $get_used_num = $db->prepare("SELECT COUNT(empCode) FROM `$store_code` WHERE `giveDate` = '$date_for_checking' AND empCode = '$result_emp'");
    $get_used_num->execute();
    $used_nums = $get_used_num->fetch();
    $used_num = $used_nums['0'];
    $get_used_num->closeCursor();

    //cal_red
    $get_red = $db->prepare("SELECT COUNT(empCode) FROM `$store_code` WHERE `giveDate` = '$date_for_checking' AND `color` = 'red' AND empCode = '$result_emp'");
    $get_red->execute();
    $red_nums = $get_red->fetch();
    $red = $red_nums['0'];
    $get_red->closeCursor();

    //cal_yellow
    $get_yellow = $db->prepare("SELECT COUNT(empCode) FROM `$store_code` WHERE `giveDate` = '$date_for_checking' AND `color` = 'yellow' AND empCode = '$result_emp'");
    $get_yellow->execute();
    $yellow_nums = $get_yellow->fetch();
    $yellow = $yellow_nums['0'];
    $get_yellow->closeCursor();

    //cal_green
    $get_green = $db->prepare("SELECT COUNT(empCode) FROM `$store_code` WHERE `giveDate` = '$date_for_checking' AND `color` = 'green' AND empCode = '$result_emp'");
    $get_green->execute();
    $green_nums = $get_green->fetch();
    $green = $green_nums['0'];
    $get_green->closeCursor();

    //cal_blue
    $get_blue = $db->prepare("SELECT COUNT(empCode) FROM `$store_code` WHERE `giveDate` = '$date_for_checking' AND `color` = 'blue' AND empCode = '$result_emp'");
    $get_blue->execute();
    $blue_nums = $get_blue->fetch();
    $blue = $blue_nums['0'];
    $get_blue->closeCursor();

    //cal_pink
    $get_pink = $db->prepare("SELECT COUNT(empCode) FROM `$store_code` WHERE `giveDate` = '$date_for_checking' AND `color` = 'pink' AND empCode = '$result_emp'");
    $get_pink->execute();
    $pink_nums = $get_pink->fetch();
    $pink = $pink_nums['0'];
    $get_pink->closeCursor();

    //cal_purple
    $get_purple = $db->prepare("SELECT COUNT(empCode) FROM `$store_code` WHERE `giveDate` = '$date_for_checking' AND `color` = 'purple' AND empCode = '$result_emp'");
    $get_purple->execute();
    $purple_nums = $get_purple->fetch();
    $purple = $purple_nums['0'];
    $get_purple->closeCursor();



     print '<div class="row" style="padding-top: 3%; padding-bottom:3%">';
      print '<div class="col-md-12">';
        print '<h3>'.$z .'. '. $user_name[0].'</h3>';
      print '</div>';
     print '</div>';

     print '<div class="row">';
       print '<div class="col-md-2">';
         print '<p><b>Tổng số đã lấy: </b>'.$used_num.'</p>';
       print '</div>';
       print '<div class="col-md-1" style="color:#e74c3c">';
         print '<p>'.$red.'</p>';
       print '</div>';
       print '<div class="col-md-1" style="color:#f1c40f">';
         print '<p>'.$yellow.'</p>';
       print '</div>';
       print '<div class="col-md-1" style="color:#2ecc71">';
         print '<p>'.$green.'</p>';
       print '</div>';
       print '<div class="col-md-1" style="color:#3498db">';
         print '<p>'.$blue.'</p>';
       print '</div>';
       print '<div class="col-md-1" style="color:#f8a5c2">';
         print '<p>'.$pink.'</p>';
       print '</div>';
       print '<div class="col-md-1" style="color:#8e44ad">';
         print '<p>'.$purple.'</p>';
       print '</div>';
     print '</div>';
     print '<br />';
     print '<div class="row">';
     print '<div class="col-md-1">';
       print '<p><b>STT</b></p>';
     print '</div>';
       print '<div class="col-md-2">';
         print '<p><b>Tên</b></p>';
       print '</div>';
       print '<div class="col-md-2">';
         print '<p><b>SĐT</b></p>';
       print '</div>';
       print '<div class="col-md-2">';
         print '<p><b>Tình trạng bệnh</b></p>';
       print '</div>';
       print '<div class="col-md-2">';
         print '<p><b>Notes</b></p>';
       print '</div>';
     print '</div>';

     $getUser_notes = $db->prepare("select facebook,phone,conditions,notes,color from $user_name[1] where empCode = '$result_emp' and `giveDate` = '$date_for_checking'");
     $getUser_notes->execute();
     $user_notes = $getUser_notes->fetchAll();
     $getUser_notes->closeCursor();

     $z2 = 1;
     foreach ($user_notes as $user_note) {
       print '<div class="row" style="border-bottom:1px solid silver; padding-top:1%">';
         print '<div class="col-md-1">';
           print '<p>'.$z2.'</p>';
         print '</div>';
         print '<div class="col-md-2">';
           print '<p>'.$user_note['facebook'].'</p>';
         print '</div>';
         print '<div class="col-md-2">';
           print '<p>'.$user_note['phone'].'</p>';
         print '</div>';
         print '<div class="col-md-2">';
           print '<p>'.$user_note['conditions'].'</p>';
         print '</div>';

         if ($user_note['color'] == 'red') {
           print '<div class="col-md-3" style="color:#e74c3c">';
             print '<p>'.$user_note['notes'].'</p>';
           print '</div>';
         }else if ($user_note['color'] == 'yellow') {
           print '<div class="col-md-3" style="color:#f1c40f">';
             print '<p>'.$user_note['notes'].'</p>';
           print '</div>';
         }else if ($user_note['color'] == 'green') {
           print '<div class="col-md-3" style="color:#2ecc71">';
             print '<p>'.$user_note['notes'].'</p>';
           print '</div>';
         }else if ($user_note['color'] == 'blue') {
           print '<div class="col-md-3" style="color:#3498db">';
             print '<p>'.$user_note['notes'].'</p>';
           print '</div>';
         }else if ($user_note['color'] == 'pink') {
           print '<div class="col-md-3" style="color:#f8a5c2">';
             print '<p>'.$user_note['notes'].'</p>';
           print '</div>';
         }else if ($user_note['color'] == 'purple') {
           print '<div class="col-md-3" style="color:#8e44ad">';
             print '<p>'.$user_note['notes'].'</p>';
           print '</div>';
         }


       print '</div>';
       $z2++;
     }
     $z++;
  }
}

//////////////
//create test
if (isset($_POST['create_test_yellow'])){
  $start_date = $_POST['start_date'];

  $reset = $db->prepare("UPDATE `$store_code` SET `newNum` = 1, `isTest` = 1, `isABIT` = 0, `isCombo` = 0, `notes` = '', `color` = '', `empCode` = '', `createdDate` = curdate() WHERE (`giveDate` = '$start_date') and (`color` = 'yellow' or `notes` = '' or `notes` is NULL) and `newNum` = 0");
  $reset->execute();
  $reset->closeCursor();


}

if (isset($_POST['create_test_knm'])){
  $start_date = $_POST['start_date'];

  $reset = $db->prepare("UPDATE `$store_code` SET `newNum` = 1, `isTest` = 1, `isABIT` = 0, `isCombo` = 0, `notes` = '', `color` = '', `empCode` = '', `createdDate` = curdate() WHERE (`giveDate` = '$start_date') and (`notes` like '%knm%' or `notes` = '' or `notes` is NULL) and `newNum` = 0");
  $reset->execute();
  $reset->closeCursor();
}

if (isset($_POST['create_test_gls'])){
  $start_date = $_POST['start_date'];

  $reset = $db->prepare("UPDATE `$store_code` SET `newNum` = 1, `isTest2` = 1, `isABIT` = 0, `isCombo` = 0, `notes` = '', `color` = '', `empCode` = '', `createdDate` = curdate() WHERE (`giveDate` = '$start_date') and (`notes` like '%gls%' or `notes` = '' or `notes` is NULL) and `newNum` = 0");
  $reset->execute();
  $reset->closeCursor();
}

if (isset($_POST['register'])){
   $userID = $_POST['userID'];
   $password = $_POST['password'];
   $name = $_POST['name'];
   $phone = $_POST['phone'];
   $sale_group = $_POST['sale_group'];
   $store_code = $_POST['store_code'];
   $auth_level = $_POST['auth_level'];
   $empCode = $_POST['empCode'];

  $register = $db->prepare("INSERT INTO `user_account` (`userID`, `password`, `name`, `sale_group`, `createdDate`, `empCode`, `store_code`, `auth_level`) VALUES ('$userID', md5('$password'), '$name', '$sale_group', curdate(), '$empCode', '$store_code','sale');");
  $register->execute();
  $register->closeCursor();
}
?>
