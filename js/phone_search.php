<?php
require_once '../inc/top.php';
require_once '../inc/user_info.php';

if (isset($_POST['phone_test'])) {
    $phone_search = $_POST['phone_test'];

    $find_phone = $db->prepare("SELECT * from $store_code WHERE phone LIKE '%$phone_search%' AND newNum = 0");
    $find_phone-> execute();
    $results = $find_phone->fetchAll();
    $find_phone->closeCursor();

    $target_emp = $results[0]['empCode'];

    $find_emp = $db->prepare("SELECT * from user_account WHERE empCode  = '$target_emp'");
    $find_emp-> execute();
    $result_emp = $find_emp->fetchAll();
    $find_emp->closeCursor();

    print "<br>";
    print '<div class="row" style="margin-left:6%; margin-top: 3%">';
      print '<div class="col-xs-4">';
        print '<h4><b>Ngày chia: </b> ';
        print_r($results[0]['giveDate']);
        print '</h4>';
      print '</div>';

      print '<div class="col-xs-4">';
        print '<h4><b>Sale: </b>';
        print_r($result_emp[0]['name']);
        print '</h4>';
      print '</div>';

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
      // print '<div class="col-xs-2">';
      //   print '<h4><b>Sale</b></h4>';
      // print '</div>';
    print '</div>';
    foreach ($results as $result) {
      $cusID2 = $result['cusID'];
      print '<div class="row" style="margin-left:6%; margin-top: 3%">';
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
        // print '<div class="col-xs-2">';
        //   print $result['empCode'];
        // print '</div>';
      print '</div>';
      $cusPhone2 = $result['phone'];
      print '<div class="row" style="margin-left:6%; margin-top: 3%">';
        print "<div class='col-md-5'>";
        print "<h4>Ghi chú: </h4>";
          print "<form method='post' onsubmit='return note_search_submit();'>";
          print "<input type='hidden' id='target_phone_for_new_note' value='$cusPhone2' />";
          print "<textarea rows='5' cols='45' name='note' id='new_note_search_submit'>";
          print $result['notes'];
          print "</textarea>";
          print "<br>";
          print "<button type='submit' class='btn btn-primary btn-sm' >Lưu</button>";
          print "</form>";
        print "</div>";
        print "<div class='col-md-1'>";
        print "</div>";
        print "<div class='col-md-5'>";
          print '<div class="row" style="margin-left:6%; margin-top: 3%">';
            print '<h4>ID Bệnh nhân:</h4>';
          print '</div>';

          print '<div class="row" style="margin-left:6%; margin-top: 3%">';

              print '<form id="sq_form2" onsubmit="return send_sq3()" method="post">';
              print "<input type='text' id='user_id_sq' name='id' value='$cusID2' style='width:70%;height:50%;' readonly>";
              print "<input type='hidden' id='store_code3' value='$store_code'>";
              print '<br>';
              print '<select name="key" id="key_sq_search">';
              print '<option value=""> ------- Tin nhắn -------</option>';

                $get_sq_list = $db->prepare("SELECT page,name,sqkey FROM `SQ_list` WHERE store_code = '$store_code' ORDER BY `SQ_list`.`page` ASC");
                $get_sq_list->execute();
                $sq_list = $get_sq_list->fetchAll();
                $get_sq_list->closeCursor();

                foreach ($sq_list as $sq) {
                  $sqkey = $sq['sqkey'];
                  $name = $sq['name'];
                  $page = $sq['page'];
                  echo "<option value='$sqkey'>$page ---- $name</option>";
                  echo "<br>";
                }

            print '</select>';
            print '<button id="submit_sq" type="submit" class="btn btn-primary btn-sm" >Gửi!</button>';
          print '</form>';


              print '</div>';
        print "</div>";
      print '</div>';



    }

  }

?>
