<div class="wrapper2" id="wrapper2_for_number_sheet_yellow" style="height:100%;">
  <div class="left-side2" id="left_side2_sheet_yellow">
    <div class="left-content2" id="left_content2_sheet_yellow">
      <ul class="tablist">

        <?php
        try {
          if ($choice == 1 || $choice == 3 || $choice == 7) {
            $get_number_sheets_yellow = $db->prepare("select * from $store_code where empCode = '$empCode' AND color = '$color2' AND (giveDate BETWEEN '$use_this_date' AND '$end_date') ORDER BY `empCode` = '$empCode' DESC, `giveDate` ASC ");
            $get_number_sheets_yellow->execute();
            $numbers_yellow = $get_number_sheets_yellow->fetchAll();
            $get_number_sheets_yellow->closeCursor();
          }
          else{
            $get_number_sheets_yellow = $db->prepare("select * from $store_code where color = '$color2' AND (giveDate BETWEEN '$use_this_date' AND '$end_date') AND sale_group = '$sale_group' ORDER BY `empCode` = '$empCode' DESC, `empCode` ASC ");
            $get_number_sheets_yellow->execute();
            $numbers_yellow = $get_number_sheets_yellow->fetchAll();
            $get_number_sheets_yellow->closeCursor();
          }




          $i = 1;
          if ($get_number_sheets_yellow){
            foreach ($numbers_yellow as $number) {
              $cusID = $number['cusID'];
              $target_phone = $number['phone'];
              $cusName = $number['name'];
              $cusPhone = $number['phone'];
              $cusFacebook = $number['facebook'];
              $cusAdd = $number['address'];
              $cusConditions = $number['conditions'];
              $cusNote = preg_replace(array('/\s{2,}/', '/[\t\n]/'), '\n', $number['notes']);
              //$cusNote = nl2br($number['notes']);
              //$cusNote = $number['notes'];



              print "<li role='presentation' class='' onclick='$(\"#cus_id_js2\").val($cusID); $(\"#cus_note_js2\").val(\"$cusNote\"); $(\"#note_row2\").css(\"visibility\", \"visible\"); $(\"#target_phone_for_submiting_note2\").val(\"$target_phone\"); $(\"#kiot_name\").val(\"$cusName\"); $(\"#kiot_phone\").val(\"$cusPhone\"); $(\"#kiot_add\").val(\"$cusAdd\"); $(\"#kiot_conditions\").val(\"$cusConditions\");$(\"#kiot_facebook\").val(\"$cusFacebook\");'>";

              if ($number['color'] == 'yellow'){

                if($number['empCode'] == $empCode){
                  print "<a href='#cus_yellow$i' aria-controls='home' role='tab' data-toggle='tab'><span style='background-color:#f1c40f; opacity:0.6' >$i</a>";
                }else {
                  print "<a href='#cus_yellow$i' aria-controls='home' role='tab' data-toggle='tab'><span style='background-color:#f1c40f' >$i</a>";
                }
              }
              else if ($number['color'] == 'blue'){
                if($number['empCode'] == $empCode){
                  print "<a href='#cus_yellow$i' aria-controls='home' role='tab' data-toggle='tab'><span style='background-color:#3498db; opacity:0.6' >$i</a>";
                }else {
                  print "<a href='#cus_yellow$i' aria-controls='home' role='tab' data-toggle='tab'><span style='background-color:#3498db' >$i</a>";
                }

              }
              else if ($number['color'] == 'purple'){
                if($number['empCode'] == $empCode){
                  print "<a href='#cus_yellow$i' aria-controls='home' role='tab' data-toggle='tab'><span style='background-color:#8e44ad; opacity:0.6' >$i</a>";
                }else {
                  print "<a href='#cus_yellow$i' aria-controls='home' role='tab' data-toggle='tab'><span style='background-color:#8e44ad' >$i</a>";
                }

              }
              else if ($number['color'] == 'pink'){
                if($number['empCode'] == $empCode){
                  print "<a href='#cus_yellow$i' aria-controls='home' role='tab' data-toggle='tab'><span style='background-color:#f8a5c2; opacity:0.6' >$i</a>";
                }else {
                  print "<a href='#cus_yellow$i' aria-controls='home' role='tab' data-toggle='tab'><span style='background-color:#f8a5c2' >$i</a>";
                }

              }
              else{
                print "<a href='#cus_yellow$i' aria-controls='home' role='tab' data-toggle='tab'><span>$i</a>";
              }

              print "</li>";
              $i++;
            }
          }
      print "</ul>";
    print "</div>";
  print "</div>";

  print "<div class='right-side2' style='overflow:hidden' id='right_side2_sheet_yellow'>";
  if ($get_number_sheets_yellow){
    $z = 1;
    $x = 0;
    foreach ($numbers_yellow as $number) {

      $target_emp = $number['empCode'];
      $find_emp = $db->prepare("SELECT * from user_account WHERE empCode  = '$target_emp'");
      $find_emp-> execute();
      $result_emp = $find_emp->fetch();
      $find_emp->closeCursor();


      print "<div class='content fade' id='cus_yellow$z'> ";
        print "<div class='container' style='text-align: justify;' >";
          print "<div class='row'>";
            print "<div class='col-md-3'>";
              print "<div class='row'>";
                print "<div class='col-md-5'>";
                  print "<p><b>STT: </b>";
                  print $z;
                  print "</p>";
                print "</div>";
              print "</div>";
              print "<div class='row'>";
                print "<div class='col-md-5'>";
                  print "<p><b>Page: </b>";
                  print $number['page'];
                  print "</p>";
                print "</div>";
              print "</div>";
              print "<div class='row'>";
                print "<div class='col-md-5'>";
                  print "<p><b>ID: </b>";
                  print $number['cusID'];
                  print "</p>";
                print "</div>";
              print "</div>";

              print "<div class='row'>";
                print "<div class='col-md-5'>";
                  print "<p><b>Sale: </b>";
                  print_r($result_emp['name']);
                  print "</p>";
                print "</div>";
              print "</div>";
              print "<div class='row'>";
                print "<div class='col-md-5'>";
                  print "<p><b>Ngày chia: </b>";
                  print $number['giveDate'];
                  print "</p>";
                print "</div>";
              print "</div>";

              print "<div class='row'>";
                print "<div class='col-md-5'>";
                  print "<p><b>Tên: </b>";
                  print $number['name'];
                  print "</p>";
                print "</div>";
              print "</div>";
              print "<div class='row'>";
                print "<div class='col-md-5'>";
                  print "<p><b>Facebook: </b>";
                  print $number['facebook'];
                  print "</p>";
                print "</div>";
              print "</div>";
              print "<div class='row'>";
                print "<div class='col-md-5'>";
                  print "<p><b>SĐT: </b>";
                  print $number['phone'];
                  print "</p>";
                print "</div>";
              print "</div>";
              print "<div class='row'>";
                print "<div class='col-md-5'>";
                  print "<p><b>Địa chỉ: </b>";
                  print $number['address'];
                  print "</p>";
                print "</div>";
              print "</div>";
              print "<div class='row'>";
                print "<div class='col-md-5'>";
                  print "<p><b>Tình trạng bệnh: </b>";
                  print $number['conditions'];
                  print "</p>";
                print "</div>";
              print "</div>";
            print "</div>";
          print "</div>";
        print "</div>";
      print "</div>";
      $z++;
      $x++;
    }
    print "<div class='container' style='text-align: justify; ' >";
      print "<div class='row' style='visibility:hidden' id='note_row2'>";
        print "<div class='col-md-5'>";
          print "<p><b>Ghi chú: </b>";
          print "<form method='post' onsubmit='return submit_note2();' >";
          print "<input type='hidden' id='target_phone_for_submiting_note2'/>";
          print "<textarea rows='4' cols='45' name='note' id='cus_note_js2' >";

          print "</textarea>";
          print "<br>";
          print "<button type='submit' class='btn btn-primary btn-sm' >Lưu</button>";
          print "</form>";
        print "</div>";
      print "</div>";
    print "</div>";
  }

           else {
          print "<p>There are no data.</p>";
          }
        }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
          }

          ?>
    </div>
  </div>
