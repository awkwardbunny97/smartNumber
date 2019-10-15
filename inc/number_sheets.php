<div class="wrapper2" id="wrapper2_for_number_sheet">
  <div class="left-side2">
    <div class="left-content2">
      <ul class="tablist">

        <?php
        try {
          $get_number_sheets = $db->prepare("select * from $store_code where empCode='$empCode' and giveDate = '$date'");
          $get_number_sheets->execute();
          $numbers = $get_number_sheets->fetchAll();
          $get_number_sheets->closeCursor();
          $i = 1;
          if ($get_number_sheets){

            foreach ($numbers as $number) {
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
/*
 $(\"#kiot_name\").val($cusName);
 $(\"#kiot_phone\").val($cusPhone);
 $(\"#kiot_facebook\").val($cusFacebook);
 $(\"#kiot_add\").val($cusAdd);
 $(\"#kiot_conditions\").val($cusConditions);
 $(\"#kiot_notes\").val($cusNote);
*/

              print "<li role='presentation' class='' onclick='$(\"#cus_id_js\").val($cusID); $(\"#cus_note_js\").html(\"$cusNote\"); $(\"#note_row\").css(\"visibility\", \"visible\"); $(\"#target_phone_for_submiting_note\").val(\"$target_phone\"); $(\"#kiot_name\").val(\"$cusName\"); $(\"#kiot_phone\").val(\"$cusPhone\"); $(\"#kiot_add\").val(\"$cusAdd\"); $(\"#kiot_conditions\").val(\"$cusConditions\");$(\"#kiot_facebook\").val(\"$cusFacebook\");'>";

              if ($number['color'] == 'yellow'){
                print "<a href='#cus$i' aria-controls='home' role='tab' data-toggle='tab'><span style='background-color:#f1c40f' >$i</a>";
              }
              else if ($number['color'] == 'red'){
                print "<a href='#cus$i' aria-controls='home' role='tab' data-toggle='tab'><span style='background-color:#e74c3c'>$i</a>";
              }
              else if ($number['color'] == 'green'){
                print "<a href='#cus$i' aria-controls='home' role='tab' data-toggle='tab'><span style='background-color:#2ecc71'>$i</a>";
              }
              else if ($number['color'] == 'purple'){
                print "<a href='#cus$i' aria-controls='home' role='tab' data-toggle='tab'><span style='background-color:#8e44ad'>$i</a>";
              }
              else if ($number['color'] == 'blue'){
                print "<a href='#cus$i' aria-controls='home' role='tab' data-toggle='tab'><span style='background-color:#3498db'>$i</a>";
              }
              else if ($number['color'] == 'pink'){
                print "<a href='#cus$i' aria-controls='home' role='tab' data-toggle='tab'><span style='background-color:#f8a5c2'>$i</a>";
              }
              else{
                print "<a href='#cus$i' aria-controls='home' role='tab' data-toggle='tab'><span>$i</a>";
              }

              print "</li>";
              $i++;
            }
          }
      print "</ul>";
    print "</div>";
  print "</div>";

  print "<div class='right-side2' style='overflow:hidden'>";
  if ($get_number_sheets){
    $z = 1;
    $x = 0;
    foreach ($numbers as $number) {
      $page = $number['page'];
      $cusID = $number['cusID'];
      print "<div class='content fade' id='cus$z'> ";
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
                  print $page;
                  print "</p>";
                print "</div>";
              print "</div>";
              print "<div class='row'>";
                print "<div class='col-md-5'>";
                  print "<p><b>ID: </b>";
                  print $cusID;
                  print "</p>";
                print "</div>";
              print "</div>";

              // print "<div class='row'>";
              //   print "<div class='col-md-5'>";
              //     print "<p><b>SQ: </b>";
              //     $get_cusID = $db->prepare("SELECT * FROM SQ_$store_code WHERE cus_id = '$cusID'");
              //     $get_cusID->execute();
              //     $cusID_recieve = $get_cusID->fetchAll();
              //     $get_cusID->closeCursor();
              //
              //
              //     foreach ($cusID_recieve as $ID) {
              //       $target_key = $ID[sq_key];
              //       if ($target_key == 0){
              //         print '';
              //       }else{
              //         $get_sq = $db->prepare("select * from listSeq where `sqKey` = '$target_key' and page = '$page'");
              //         $get_sq->execute();
              //         $sq_name = $get_sq->fetch();
              //         $get_sq->closeCursor();
              //         print $target_key;
              //         print ' ';
              //       }
              //
              //
              //
              //     }
              //
              //
              //
              //
              //
              //     print "</p>";
              //   print "</div>";
              // print "</div>";

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
      print "<div class='row' style='visibility:hidden' id='note_row'>";
        print "<div class='col-md-5'>";
          print "<p><b>Ghi chú: </b>";
          print "<form method='post' onsubmit='return submit_note();' >";
          print "<input type='hidden' id='target_phone_for_submiting_note'/>";
          print "<textarea rows='4' cols='45' name='note' id='cus_note_js' >";

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
