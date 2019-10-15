<?php
require_once 'inc/top.php';
?>
<?php
require_once 'inc/user_info.php';
?>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );

    }
	function disable(){}
</script>
<body>
  <div class="wrapper">
    <div class="left-side">
      <div class="logo">
        <img src="img/logo.png" alt="">
      </div>
      <div class="left-content">
        <ul role="tablist">
          <li id="li_four" role="presentation" class="active"><a href="#four" aria-controls="home" role="tab" data-toggle="tab"><span><i class="fas fa-phone-square"></i></span>Bảng số</a></li>

          <li id="li_one" role="presentation"><a href="#one" aria-controls="home" role="tab" data-toggle="tab"><span><i class="fas fa-info-circle"></i></span>List Số</a></li>

          <?php if($store_code == 'TcanTT'){ ?>
          <li role="presentation"><a href="#two" aria-controls="home" role="tab" data-toggle="tab"><span><i class="fas fa-address-card"></i></span>Kiot</a></li>
          <?php } ?>
          <!-- <li role="presentation"><a href="#three" aria-controls="home" role="tab" data-toggle="tab"><span><i class="fas fa-calendar-check"></i></span>Mục tiêu doanh số</a></li> -->


          <li role="presentation"><a href="#six" aria-controls="home" role="tab" data-toggle="tab"><span><i class="fas fa-info-circle"></i></span>Hỗ trợ</a></li>

          <li role="presentation"><a href="logout.php"><span><i class="fas fa-sign-out-alt"></i></span>Đăng xuất</a></li>
        </ul>
      </div>
      <div class="copyright">
        <p>Copyright &copy; 2018. All Rights Reserved.<span>Tam An R&D Department.</span> </p>
      </div>
    </div>

    <div class="right-side">
      <div class="right-content">
        <!-- Bảng số-->
        <div id="four" class="content active fade in">
          <h1> Bảng số </h1>

          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <?php
                $date = date("Y-m-d");
                $today = date("Y-m-d");
                $addition_info = '';
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
                //////////////
                ///Cal Test/
                //////////////
                $cal_test = $db->prepare("SELECT COUNT(newNum) FROM $store_code where (`newNum` = 1 and `empCode` = '' and `isTest` = 1)");
                $cal_test->execute();
                $newTest = $cal_test->fetchAll();
                $total_test = $newTest[0][0];
                $cal_test->closeCursor();

                $real_total_num = $total_newNum + $total_abit + $total_combo + $total_test;
                if(isset($_GET['date'])) {
                    $date = $_GET['date'];
                }

                ////////////////////////////////////
                if(isset($_POST['request_num'])){
                  if ($canGetTest2 > 0) {
                    $turns = 0;
                    if ($canGetTest2 > $total_test2) {
                      $turns = $total_test2;
                    }
                    else if($canGetTest2 < $total_test2){
                      $turns = $canGetTest2;
                    }
                    else if ($canGetTest2 = $total_test2) {
                      $turns = $canGetTest2;
                    }

                    for ($i14=0; $i14 < $turns; $i14++) {

                        $get_new_test_num2 = $db->prepare("select * from $store_code where (`newNum` = 1 and `empCode` = '' and `isTest2` = 1)");
                        $get_new_test_num2->execute();
                        $new_test_num2 = $get_new_test_num2->fetchAll();
                        $get_new_test_num2->closeCursor();


                        //$rand = rand(0,count($new_abit_num)-1);
                        $fetch_test_num2 = $new_test_num2[0]['id'];

                        $add_emp_code = $db->prepare("UPDATE $store_code SET `sale_group` = '$sale_group', `empCode` = '$empCode', `newNum` = 0, `giveDate` = '$today' WHERE `$store_code`.`id` = $fetch_test_num2");
                        $add_emp_code->execute();
                        $add_emp_code->closeCursor();

                    }

                    $reset_canGet_test2 = $db->prepare("UPDATE user_account SET canGetTest2 = 0 WHERE userID = '$userID'");
                    $reset_canGet_test2->execute();
                    $reset_canGet_test2->closeCursor();
                  }
                  if ($canGetTest > 0) {
                    $turns = 0;
                    if ($canGetTest > $total_test) {
                      $turns = $total_test;
                    }
                    else if($canGetTest < $total_test){
                      $turns = $canGetTest;
                    }
                    else if ($canGetTest = $total_test) {
                      $turns = $canGetTest;
                    }

                    for ($i14=0; $i14 < $turns; $i14++) {

                        $get_new_test_num = $db->prepare("select * from $store_code where (`newNum` = 1 and `empCode` = '' and `isTest` = 1)");
                        $get_new_test_num->execute();
                        $new_test_num = $get_new_test_num->fetchAll();
                        $get_new_test_num->closeCursor();


                        //$rand = rand(0,count($new_abit_num)-1);
                        $fetch_test_num = $new_test_num[0]['id'];

                        $add_emp_code = $db->prepare("UPDATE $store_code SET `sale_group` = '$sale_group', `empCode` = '$empCode', `newNum` = 0, `giveDate` = '$today' WHERE `$store_code`.`id` = $fetch_test_num");
                        $add_emp_code->execute();
                        $add_emp_code->closeCursor();

                    }

                    $reset_canGet_test = $db->prepare("UPDATE user_account SET canGetTest = 0 WHERE userID = '$userID'");
                    $reset_canGet_test->execute();
                    $reset_canGet_test->closeCursor();
                  }
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

                        $add_emp_code = $db->prepare("UPDATE $store_code SET `sale_group` = '$sale_group', `empCode` = '$empCode', `newNum` = 0, `giveDate` = '$today' WHERE `$store_code`.`id` = $fetch_combo_num");
                        $add_emp_code->execute();
                        $add_emp_code->closeCursor();


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

                        $get_new_abit_num = $db->prepare("select * from $store_code where (`newNum` = 1 and `empCode` = '' and `isABIT` = 1)");
                        $get_new_abit_num->execute();
                        $new_abit_num = $get_new_abit_num->fetchAll();
                        $get_new_abit_num->closeCursor();


                        //$rand = rand(0,count($new_abit_num)-1);
                        $fetch_abit_num = $new_abit_num[0]['id'];

                        $add_sale_group = $db->prepare("UPDATE $store_code SET `sale_group` = '$sale_group', `empCode` = '$empCode', `newNum` = 0, `giveDate` = '$today' WHERE `$store_code`.`id` = $fetch_abit_num");
                        $add_sale_group->execute();
                        $add_sale_group->closeCursor();


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

                        $add_sale_group = $db->prepare("UPDATE $store_code SET `sale_group` = '$sale_group', `empCode` = '$empCode', `newNum` = 0, `giveDate` = '$today' WHERE `$store_code`.`id` = $fetch_num");
                        $add_sale_group->execute();
                        $add_sale_group->closeCursor();


                    }

                    $reset_canGet = $db->prepare("UPDATE user_account SET canGet = 0 WHERE userID = '$userID'");
                    $reset_canGet->execute();
                    $reset_canGet->closeCursor();
                  }

                  echo '<meta http-equiv="refresh" content="0" />';
                }

                ////////////////////////////////////
                $real_can_get = $canGet + $canGetAbit + $canGetCombo + $canGetTest + $canGetTest2;
                ?>
                <form method="get" action="" class="col-md-12">
                  <label for="date"> Chọn ngày: </label>
                  <input type="date" id="date" name="date" max="<?php echo date("Y-m-d")?>" required onchange="this.form.submit()" value="<?php echo $date; ?>">
                </form>
              </div>

              <div class="col-sm-2" style="margin-bottom: 1%;">
                <form class="" method="post">
                  <input type="hidden" name="request_num" value="">

                  <div class="col-md-3 mx-auto" id="qa_rightcol">
                    <div class="wrapper pt-5">
                      <div>
                        <button type="submit" style="font-family: 'Anton', sans-serif;" <?php if ($real_total_num == 0 || $real_can_get == 0 || $date != $today){ ?> disabled <?php   } ?> > Make money! </button>
                      </div>
                    </div>
                  </div>

                  <!-- <button style="width:100%;" type="submit" name="button" class="btn btn-success" >Make money!</button> -->
                </form>
              </div>
            </div>

            <div class="container" style="padding-right:25%; margin-top: 3%;text-align:justify;" >
              <div class="row">
                <div class="col-xs-6" id="number_sheets" style="padding-top: 2%;">
                  <?php require_once 'inc/number_sheets.php'; ?>
                </div>

                <div class="col-xs-6" id="sq_wrapper">
                  <div class="row" style="margin-left:6%; margin-top: 3%">
                    <h4>ID Bệnh nhân:</h4>
                  </div>
                  <div class="row" style="margin-left:6%; margin-top: 3%">
                    <form onsubmit="return send_sq()" method="post">
                      <input type="text" name="id" id="cus_id_js" style="width:70%;height:50%;" readonly>
                      <input type="hidden" id="store_code" name="store_code" value="<?php echo $store_code?>">
                      <br>
                      <select name="key" id="key_sq">
                          <option value=""> ------- Tin nhắn -------</option>
                          <?php
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
                          ?>
                        </select>
                        <button id="submit_sq" type="submit" class="btn btn-primary btn-sm" >Gửi!</button>
                      </form>
                  </div>
                  <br>
                  <?php if($store_code == 'TcanTT'){ ?>
                  <div class="row">
                    <div class="col-xs-12 text-left">
                      <button type="button" class="btn btn-success" onclick="$('#kiot-modal').modal('show')" style="width:70%;margin-left:6%">Lên Đơn</button>
                    </div>
                  </div>
                  <?php } ?>


                  <br>
                  <div class="row" style="margin-left:3%; margin-top: 3%">
                    <div class="col-xs-12">
                      <h4>Note keywords:</h4>
                      <br>
                      <p><b><span style="color:#e74c3c">Đỏ: </span> </b>kbb; sai so; nham so; trung so.</p>
                      <p><b><span style="color: #f1c40f">Vàng:</span> </b>knm; gls.</p>
                      <p><b><span style="color:#2ecc71">Xanh:</span> </b>done.</p>
                      <p><b><span style="color:#8e44ad">Tím:</span> </b>tgl (tối gọi lại).</p>
                      <p><b><span style="color:#3498db">Xanh Dương:</span> </b>tiem nang.</p>
                      <p><b><span style="color:#f8a5c2">Hồng:</span> </b>cdt (chưa muốn điều trị, suy nghĩ).</p>
                    </div>
                  </div>

                </div>

                <div class="col-xs-12" id="search_wrapper">
                  <div class="row" style="margin-left:6%; margin-top: 3%">
                    <h3>Tìm kiếm bệnh nhân:</h3>
                  </div>
                  <div class="row" style="margin-left:6%; margin-top: 3%">
                    <form method="POST" onsubmit="return phone_search();">
                      <input type="text" id="phone_test" style="width:30%;height:50%;" required>
                      <button class="btn btn-primary" type="submit">Tìm</button>
                    </form>
                  </div>
                  <div class="row" id="search_wrapper_result">

                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
        <!-- eof Bảng số-->

        <!-- List  -->
        <div id="one" class="content fade" style="border-bottom: 1px solid #ddd;">
          <h1>List số</h1>

          <?php
            $color2 = 'yellow';
            $use_this_date = date('Y-m-d');
            $end_date = date('Y-m-d');
            $choice = 1;
            $this_day_for_max = date('Y-m-d');
          //  $max_date = date("Y-m-d",strtotime($this_day_for_max . "-3 days"));

          ?>

          <div class="container" id="test_day_container">
            <div class="container" style="padding-right:25%; margin-top: 3%;text-align:justify;" >
              <div class="row" id="test_day" style="margin-left:0; margin-top: 3%">
                <form method="post" class="col-md-12">
                  <label for="date"> Chọn khoảng thời gian: </label>
                    <select id="selection_for_testing" >
                      <option value="1">Hôm nay</option>
                      <option value="3">Trong vòng 3 ngày</option>
                      <option value="7">Trong vòng 7 ngày</option>
                    </select>
                    <label for="date"> (Chỉ xem của mình) </label>
                    <br><br>

                      <label for="date"> Hoặc chọn từ ngày: </label>
                    <input type="date" id="use_this_date" max="<?php echo $this_day_for_max; ?>" value="" >
                    <label for="date"> đến ngày: </label>
                    <input type="date" id="end_date" max="<?php echo $this_day_for_max; ?>"  value="">
                    <label for="date"> (Xem của đội) </label>
                    <br><br>

                    <input type="hidden" id="display_yellow" value="yellow" >
                    <button style="width:auto" type="submit" class="btn btn-warning" onclick="return showYellow()">Hiện số vàng</button>

                    <input type="hidden" id="display_purple" value="purple" >
                    <button style="width:auto; background-color:#8e44ad; color:white" type="submit" class="btn" onclick="return showPurple()">Hiện số Tím</button>

                    <input type="hidden" id="display_blue" value="blue" >
                    <button style="width:auto" type="submit" class="btn btn-primary" onclick="return showBlue()">Hiện số Xanh Dương</button>

                    <input type="hidden" id="display_pink" value="pink" >
                    <button style="width:auto; background-color:#f8a5c2; color:white" type="submit" class="btn btn-primary" onclick="return showPink()">Hiện số Hồng</button>
                </form>
              </div>

              <br>

              <div class="row">
                <div class="col-xs-6" id="number_sheets2" style="padding-top: 2%;height:600px;">

                  <?php require_once 'inc/number_sheets_yellow.php'; ?>

                </div>

                <div class="col-xs-6" id="sq_wrapper" style="height:600px;">
                  <div class="row" style="margin-left:6%; margin-top: 3%; ">
                    <h4>ID Bệnh nhân:</h4>
                  </div>
                  <div class="row" style="margin-left:6%; margin-top: 3%">
                    <form method="post" onsubmit="return send_sq2()">
                      <input type="text" name="id" id="cus_id_js2" style="width:70%;height:50%;" readonly>
                      <input type="hidden" id="store_code2" value="<?php echo $store_code?>">
                      <br>
                      <select name="key" id="key_for_note2">
                          <option value=""> ------- Tin nhắn -------</option>
                          <?php
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
                          ?>
                        </select>
                        <button type="submit" class="btn btn-primary btn-sm" >Gửi!</button>

                      </form>

                  </div>
                  <br>
                  <div class="row">
                    <div class="col-xs-12 text-left">
                      <button type="button" class="btn btn-success" onclick="$('#kiot-modal').modal('show')" style="width:70%;margin-left:6%">Lên Đơn</button>
                    </div>
                  </div>
                  <div class="row" style="margin-left:3%; margin-top: 3%">
                    <div class="col-xs-12">
                      <h4>Note keywords:</h4>
                      <br>
                      <p><b><span style="color:#e74c3c">Đỏ: </span> </b>kbb; sai so; nham so; trung so.</p>
                      <p><b><span style="color: #f1c40f">Vàng:</span> </b>knm; gls.</p>
                      <p><b><span style="color:#2ecc71">Xanh:</span> </b>done.</p>
                      <p><b><span style="color:#8e44ad">Tím:</span> </b>tgl (tối gọi lại).</p>
                      <p><b><span style="color:#3498db">Xanh Dương:</span> </b>tiem nang.</p>
                      <p><b><span style="color:#f8a5c2">Hồng:</span> </b>cdt (chưa muốn điều trị, suy nghĩ).</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- eof List -->

        <!-- Kiot -->
        <div id="two" class="content fade">
          <h1 style="margin-bottom:2%;">Kiot</h1>
          <div class="kiot-wrapper">
            <table>
              <tr>
                <th>Mã hoá đơn</th>
                <th>Mã vận đơn</th>
                <th>Sản phầm</th>
                <th>Trạng thái</th>

                <th>Khách hàng</th>
                <th>Tổng tiền hàng</th>
                <th>Giảm giá</th>
                <th>Tổng sau giảm giá</th>
                <th>Thời gian</th>
              </tr>

              <?php
                $listInvoices = $db2->prepare("SELECT * FROM `invoices` WHERE addBy = '$empCode' ORDER BY `id` DESC");
                $listInvoices->execute();
                $resultInvoices = $listInvoices->fetchAll();
                $listInvoices->closeCursor();

                foreach ($resultInvoices as $invoice) {
                  $array = json_decode($invoice['productName']);
                  echo "<tr>";
                    echo "<td>".$invoice['billID']."</td>";
                    echo "<td>".$invoice['deliveryCode']."</td>";
                    echo "<td>";
                    foreach ($array as $a) {
                      echo $a[2] ." x" . $a[1] . ", ";
                    }
                    echo "</td>";
                    echo "<td>".$invoice['deliveryStat']."</td>";
                    echo "<td>".$invoice['cusName']."</td>";
                    echo "<td>".number_format($invoice['totalPrice'])."</td>";
                    echo "<td>".number_format($invoice['discountPrice'])."</td>";
                    echo "<td>".number_format($invoice['finalPrice'])."</td>";
                    echo "<td>".$invoice['createdDate']."</td>";
                  echo "</tr>";
                }
              ?>
            </table>
          </div>
        </div>
        <!-- eof Kiot -->

        <!-- Hỗ trợ-->
        <div id="six" class="content fade">
          <h1> Hỗ trợ </h1>
          <div class="content-welcome">
            <p>
              Smart Number là ứng dụng chia số tự động được thiết kế với mục đích giúp sale tiết kiệm thời gian và sức lực, từ đó có thể đẩy mạnh năng xuất công việc.<br>
            </p>
            <ul>
              <li>Smart Number sẽ giúp bạn:</li>
              <li>- Tối ưu hoá công việc truy xuất data khách hàng.</li>
              <li>- Theo dõi mục tiêu doanh số.</li>
              <li>- Tính tỉ lệ chốt.</li>
            </ul>
            <p style="margin-bottom: 30px;">
              Đội ngũ chúng tôi tin rằng Smart Number sẽ là cầu nối vững chắc giữa mark và sale. Chúc bạn làm việc hiệu quả.<br><br>
              <b>Email:</b> mrbunny283@gmail.com<br>
              <b>SDT:</b> 0967997597<br>
              <b>Facebook:</b> AwkwardBunnyy
            </p>
          </div>

        </div>
        <!-- eof Hỗ trợ-->

        <div class="row kiot-container">
            <div class="col-xs-12">
              <div class="modal fade" id="kiot-modal">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Lên Đơn</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                      <form id="kiot-form">
                        <div class="tab" style="display:none">
                          <div class="form-row">
                            <div class="col-xs-4">
                              <div class="form-row">
                                <div class="col-xs-12">
                                  <div class="form-group">
                                    <label for="kiot_name">Tên</label>
                                    <input name="kiot_name" type="text" class="form-control" id="kiot_name" style="width:100%; padding:2%">
                                  </div>
                                </div>
                                <div class="col-xs-12">
                                  <div class="form-group">
                                    <label for="kiot_facebook">Facebook</label>
                                    <input name="kiot_facebook" type="email" class="form-control" id="kiot_facebook" style="width:100%; padding:2%">
                                  </div>
                                </div>
                                <div class="col-xs-12">
                                  <div class="form-group">
                                    <label for="kiot_phone">SDT</label>
                                    <input name="kiot_phone" type="number" class="form-control" id="kiot_phone" style="width:100%;">
                                  </div>
                                </div>
                                <div class="col-xs-12">
                                  <div class="form-group">
                                    <label for="kiot_email">Email</label>
                                    <input name="kiot_email" type="email" class="form-control" id="kiot_email" style="width:100%; padding:2%">
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-xs-4">
                              <div class="form-row">
                                <div class="col-xs-12">
                                  <div class="form-group">
                                    <label for="kiot_add">Địa chỉ</label>
                                    <input name="kiot_add" type="text" class="form-control" id="kiot_add" style="width:100%; padding:2%">
                                  </div>
                                </div>

                                <div class="col-xs-12">
                                  <div class="form-group">
                                    <label for="kiot_city">Thành phố/Tỉnh</label>
                                    <select name="kiot_city" id="kiot_city" class="form-control" style="width:100%; padding:2%" onchange="showDistrict($('#kiot_city').val())">
                                        <?php
                                          $get_city_list = $db2->prepare("SELECT * FROM `devvn_tinhthanhpho` ORDER BY `devvn_tinhthanhpho`.`name` ASC");
                                          $get_city_list->execute();
                                          $city_list = $get_city_list->fetchAll();
                                          $get_city_list->closeCursor();

                                          foreach ($city_list as $city) {
                                            $name = $city['name'];
                                            $matp = $city['matp'];
                                            echo "<option value='$matp'>$name</option>";
                                            echo "<br>";
                                          }
                                        ?>
                                      </select>
                                  </div>
                                </div>

                                <div class="col-xs-12">
                                  <div class="form-group">
                                    <label for="kiot_district">Quận/Huyện</label>
                                    <select name="kiot_district" id="kiot_district" class="form-control" style="width:100%; padding:2%" onchange="showTown($('#kiot_district').val())">

                                    </select>
                                  </div>
                                </div>

                                <div class="col-xs-12">
                                  <div class="form-group">
                                    <label for="kiot_town">Phường/Xã</label>
                                    <select name="kiot_town" id="kiot_town" class="form-control" style="width:100%; padding:2%">
                                    </select>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-xs-4">
                              <div class="form-row">
                                <div class="col-xs-12">
                                  <label for="kiot_gender">Giới tính</label>
                                  <div class="radio-inline">
                                    <label><input type="radio" name="kiot_gender" value="1" checked>Nam</label>
                                  </div>
                                  <div class="radio-inline">
                                    <label><input type="radio" name="kiot_gender" value="2">Nữ</label>
                                  </div>
                                </div>

                                <div class="col-xs-12">
                                  <div class="form-group">
                                    <label for="kiot_age">Ngày sinh</label>
                                    <input name="kiot_age" type="date" class="form-control" id="kiot_age" style="width:100%; padding:2%">
                                  </div>
                                </div>

                                <div class="col-xs-12">
                                  <div class="form-group">
                                    <label for="kiot_conditions">Tình trạng bệnh</label>
                                    <textarea name="kiot_conditions" rows="3" class="form-control" id="kiot_conditions" style="width:100%;"></textarea>
                                  </div>
                                </div>

                                <div class="col-xs-12">
                                  <div class="form-group">
                                    <label for="kiot_notes">Ghi chú</label>
                                    <textarea name="kiot_notes" rows="3" class="form-control" id="kiot_notes" style="width:100%;"></textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="tab" style="display:none">
                          <div class="form-row">
                            <div class="col-xs-6">
                              <div class="form-row" id="bucket_list">
                                <div class="col-xs-12">
                                  <div class="col-xs-5">
                                    <label>Tên sản phẩm</label>
                                  </div>
                                  <div class="col-xs-3">
                                    <label>Số lượng</label>
                                  </div>
                                  <div class="col-xs-2">
                                    <label>Giá</label>
                                  </div>
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="col-xs-12">
                                  <div class="form-group">
                                    <label for="kiot_product">Sản phẩm</label>
                                    <select name="kiot_product" id="kiot_product" class="form-control" id="kiot_product" style="width:100%; padding:2%" onchange="test_bucket()">
                                      <option>--- Chọn sản phầm ---</option>
                                        <?php
                                          $get_product_list = $db2->prepare("SELECT * FROM products");
                                          $get_product_list->execute();
                                          $product_list = $get_product_list->fetchAll();
                                          $get_product_list->closeCursor();

                                          foreach ($product_list as $product) {
                                            $name = $product['name'];
                                            $price = $product['price'];
                                            $type = $product['type'];
                                            echo "<option value='$price'>$name ($type)</option>";
                                            echo "<br>";
                                          }
                                        ?>
                                      </select>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-xs-3">
                              <div class="form-row">
                                  <div class="col-xs-12">
                                    <div class="form-group">
                                      <label for="kiot_discount">Giảm giá</label>
                                      <input name="kiot_discount" type="number" class="form-control" id="kiot_discount" style="width:100%; padding:2%" value="0" onchange="updatePrice()">
                                    </div>
                                  </div>
                                  <div class="col-xs-12" >
                                    <div class="form-group">
                                      <label for="kiot_other">Phí khác</label>
                                      <input name="kiot_other" type="number" class="form-control" id="kiot_other" style="width:100%; padding:2%" value="0" onchange="updatePrice()">
                                    </div>
                                  </div>
                              </div>
                            </div>

                            <div class="col-xs-2">
                              <div class="form-row">
                                  <div class="col-xs-12">
                                    <div class="form-group">
                                      <label>Tổng:</label>
                                    </div>
                                  </div>
                                  <div class="col-xs-12" >
                                    <div class="form-group">
                                      <label id="total_price" style="font-size:150%;"></label>
                                      <input type="hidden" id="p_price" value="0">
                                    </div>
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="form-row" >
                          <div class="col-xs-12" style="text-align:right; padding:2%">
                            <button type="button" class="btn btn-default" id="prevBtn" onclick="nextPrev(-1)">Quay lại</button>
                            <button type="button" class="btn btn-success" id="nextBtn" onclick="nextPrev(1)">Tiếp</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="reset_form()">Huỷ</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer" style="border:none">
                    </div>
                  </div><!-- /.modal-content-->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
            </div>

        </div>
      </div>
    </div>
  </div>
  <?php
  require_once 'inc/bottom.php';
  ?>
