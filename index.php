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


          <li role="presentation"><a href="#two" aria-controls="home" role="tab" data-toggle="tab"><span><i class="fas fa-address-card"></i></span>Thông tin nhân viên</a></li>

          <li role="presentation"><a href="#three" aria-controls="home" role="tab" data-toggle="tab"><span><i class="fas fa-calendar-check"></i></span>Mục tiêu doanh số</a></li>


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
                $cal_newNum = $db->prepare("SELECT COUNT(newNum) FROM $store_code where (`newNum` = 1 and `empCode` = '' and `isABIT` = 0)");
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

                $real_total_num = $total_newNum + $total_abit;
                ///////////////////
                //Cal hasRecieved//
                //////////////////
                $cal_hasRecieved = $db->prepare("SELECT COUNT(empCode) FROM $store_code where `empCode` = '$empCode' AND giveDate = '$today'");
                $cal_hasRecieved->execute();
                $hasRecieved = $cal_hasRecieved->fetchAll();
                $total_hasRecieved = $hasRecieved[0][0];
                $cal_hasRecieved->closeCursor();
                //////////////
                ///update hasRecieved////////
                //////////////
                $update_hasRecieved = $db->prepare("UPDATE user_account SET `hasRecievedToday` = '$total_hasRecieved' WHERE `user_account`.`empCode` = '$empCode'");
                $update_hasRecieved->execute();
                $update_hasRecieved->closeCursor();

                //////////////
                ///end update hasRecieved////////
                //////////////
                if(isset($_GET['date'])) {
                    $date = $_GET['date'];
                }

                ////////////////////////////////////
                if(isset($_POST['request_num'])){
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

                        $add_emp_code = $db->prepare("UPDATE $store_code SET `empCode` = '$empCode' WHERE `$store_code`.`id` = $fetch_abit_num");
                        $add_emp_code->execute();
                        $add_emp_code->closeCursor();

                        $fix_new_num = $db->prepare("UPDATE $store_code SET `newNum` = 0 WHERE `$store_code`.`id` = $fetch_abit_num");
                        $fix_new_num->execute();
                        $fix_new_num->closeCursor();

                        $add_give_date = $db->prepare("UPDATE $store_code SET `giveDate` = '$today' WHERE `$store_code`.`id` = $fetch_abit_num");
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

                        $get_new_num = $db->prepare("select * from $store_code where (`newNum` = 1 and `empCode` = '' and `isABIT` = 0)");
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

                        $add_give_date = $db->prepare("UPDATE $store_code SET `giveDate` = '$today' WHERE `$store_code`.`id` = $fetch_num");
                        $add_give_date->execute();
                        $add_give_date->closeCursor();

                    }

                    $reset_canGet = $db->prepare("UPDATE user_account SET canGet = 0 WHERE userID = '$userID'");
                    $reset_canGet->execute();
                    $reset_canGet->closeCursor();
                  }

                  echo '<meta http-equiv="refresh" content="0" />';
                }

                ////////////////////////////////////
                $real_can_get = $canGet + $canGetAbit;
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
                    <form onsubmit="return sq_for_lieu()" method="get">
                      <input type="text" name="id" id="cus_id_js" style="width:70%;height:50%;" readonly>
                      <input type="hidden" name="Facebook" value="x">
                      <input type="hidden" name="SDT" value="x">
                      <input type="hidden" name="HoTen" value="x">
                      <input type="hidden" name="DiaChi" value="x">
                      <input type="hidden" name="TinhTrangBenh" value="x">
                      <input type="hidden" name="Time" value="x">
                      <br>
                      <select name="key" id="key_sq">
                          <option value=""> ------- Tin nhắn -------</option>
                          <option value="628548">KHÔNG NGHE MÁY</option>
                          <option value="643390">Chưa chốt được</option>
                          <option value="649539">CHỐT</option>
                          <option value="793375">SAI SỐ</option>
                          <option value="852329">Gửi ảnh thuốc</option>
                          <option value="881365">Không tài chính</option>
                          <option value="779511">Gửi câm nang</option>
                          <option value="899839">Muốn Free</option>
                          <option value="899935">Ra viện khám</option>
                          <option value="900136">Thuốc của viện</option>
                          <option value="907449">Đang dùng thuốc khác</option>
                        </select>
                        <button id="submit_sq" type="submit" class="btn btn-primary btn-sm" >Gửi!</button>
                      </form>
                  </div>
                  <br>
                  <div class="row" style="margin-left:3%; margin-top: 3%">
                    <div class="col-xs-12">
                      <h4>Note keywords:</h4>
                      <br>
                      <p><b><span style="color:#e74c3c">Đỏ: </span> </b>knc; sai so; nham so; trung so.</p>
                      <p><b><span style="color: #f1c40f">Vàng:</span> </b>knm; gls.</p>
                      <p><b><span style="color:#2ecc71">Xanh:</span> </b>done.</p>
                      <p><b><span style="color:#8e44ad">Tím:</span> </b>tgl (tối gọi lại).</p>
                      <p><b><span style="color:#3498db">Xanh Dương:</span> </b>tiem nang.</p>
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

        <!-- List đã chốt -->
        <div id="one" class="content fade" style="border-bottom: 1px solid #ddd;">
          <h1>List số</h1>

          <?php
            $color2 = 'yellow';
            $use_this_date = date('Y-m-d');
            $end_date = date('Y-m-d');
            $choice = 0;
            $this_day_for_max = date('Y-m-d');
            $max_date = date("Y-m-d",strtotime($this_day_for_max . "-3 days"));

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
                    <input type="date" id="use_this_date" max="<?php echo $max_date; ?>" value="" >
                    <label for="date"> đến ngày: </label>
                    <input type="date" id="end_date" max="<?php echo $max_date; ?>"  value="">
                    <label for="date"> (Xem của đội) </label>
                    <br><br>

                    <input type="hidden" id="display_yellow" value="yellow" >
                    <button style="width:auto" type="submit" class="btn btn-warning" onclick="return showYellow()">Hiện số vàng</button>

                    <input type="hidden" id="display_purple" value="purple" >
                    <button style="width:auto; background-color:#8e44ad; color:white" type="submit" class="btn" onclick="return showPurple()">Hiện số Tím</button>

                    <input type="hidden" id="display_blue" value="blue" >
                    <button style="width:auto" type="submit" class="btn btn-primary" onclick="return showBlue()">Hiện số Xanh Dương</button>
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
                    <form method="get" onsubmit="return sq_for_note2()">
                      <input type="text" name="id" id="cus_id_js2" style="width:70%;height:50%;" readonly>
                      <input type="hidden" name="Facebook" value="x">
                      <input type="hidden" name="SDT" value="x">
                      <input type="hidden" name="HoTen" value="x">
                      <input type="hidden" name="DiaChi" value="x">
                      <input type="hidden" name="TinhTrangBenh" value="x">
                      <input type="hidden" name="Time" value="x">
                      <br>
                      <select name="key" id="key_for_note2">
                          <option value=""> ------- Tin nhắn -------</option>
                          <option value="628548">KHÔNG NGHE MÁY</option>
                          <option value="643390">Chưa chốt được</option>
                          <option value="649539">CHỐT</option>
                          <option value="793375">SAI SỐ</option>
                          <option value="852329">Gửi ảnh thuốc</option>
                          <option value="881365">Không tài chính</option>
                          <option value="779511">Gửi câm nang</option>
                          <option value="899839">Muốn Free</option>
                          <option value="899935">Ra viện khám</option>
                          <option value="900136">Thuốc của viện</option>
                          <option value="907449">Đang dùng thuốc khác</option>
                        </select>
                        <button type="submit" class="btn btn-primary btn-sm" >Gửi!</button>
                      </form>
                  </div>
                  <br>
                  <div class="row" style="margin-left:3%; margin-top: 3%">
                    <div class="col-xs-12">
                      <h4>Note keywords:</h4>
                      <br>
                      <p><b><span style="color:#e74c3c">Đỏ: </span> </b>knc; sai so; nham so; trung so.</p>
                      <p><b><span style="color: #f1c40f">Vàng:</span> </b>knm; gls.</p>
                      <p><b><span style="color:#2ecc71">Xanh:</span> </b>done.</p>
                      <p><b><span style="color:#8e44ad">Tím:</span> </b>tgl (tối gọi lại).</p>
                      <p><b><span style="color:#3498db">Xanh Dương:</span> </b>tiem nang.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- eof List đã chốt-->

        <!-- Thông tin nhân viên -->

        <div id="two" class="content fade" style="border-bottom: 1px solid #ddd;">
          <h1>Thông tin nhân viên</h1>
          <div class="container">
            <div class="row">
              <div class="col-md-3">
                <img src="img/<?php echo $userID ?>.jpg" alt="">
              </div>
              <div class="col-md-9 employee-details">
                <div class="row">
                  <div class="col-md-2">
                    <h4>Họ và Tên:</h4>
                  </div>
                  <div class="col-md-4">
                    <p><?php echo $name ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <h4>Ngày sinh:</h4>
                  </div>
                  <div class="col-md-4">
                    <p><?php echo $ngaySinh ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <h4>SDT:</h4>
                  </div>
                  <div class="col-md-4">
                    <p><?php echo $phone ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <h4>Đơn vị:</h4>
                  </div>
                  <div class="col-md-4">
                    <p><?php echo $donVi ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <h4>Chi nhánh:</h4>
                  </div>
                  <div class="col-md-4">
                    <p><?php echo $chiNhanh ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <h4>Vị trí:</h4>
                  </div>
                  <div class="col-md-4">
                    <p><?php echo $viTri ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <h4>Mã nhân viên:</h4>
                  </div>
                  <div class="col-md-4">
                    <p><?php echo $empCode ?></p>
                  </div>
                </div>
                <br>

              </div>
            </div>
          </div>

        </div>
        <!-- eof Thông tin nhân viên -->

        <!-- Mục tiêu doanh số-->
        <div id="three" class="content fade" style="border-bottom: 1px solid #ddd;">

          <?php
            //Cal Doanh số mục tiêu
            $ap_doanh_so = 0;
            if ($viTri == "Sale Học Việc") {
              $ap_doanh_so = 0;
            }else if ($viTri == "Sale Chính") {
              $ap_doanh_so = 108000000;
            }else if ($viTri == "Sale Thử Việc 1") {
              $ap_doanh_so = 108000000*0.5;
            }else if ($viTri == "Sale Thử Việc 2") {
              $ap_doanh_so = 108000000*0.8;
            }

            //Cal Doanh số đã đạt
            $doanh_so_da_dat = 0;
            $total_sold_nums = 0;
            $get_income = $db->prepare("select * from $store_code where (empCode='$empCode' and isSold = 1)");
            $get_income->execute();
            $income = $get_income->fetchAll();
            foreach ($income as $sold_num_price) {
              $doanh_so_da_dat += $sold_num_price['price'];
              $total_sold_nums++;
            }
            $get_income->closeCursor();

            //Cal Tỉ lệ chốt
            $total_received_nums = 0;

            $get_received_nums = $db->prepare("select * from $store_code where empCode='$empCode'");
            $get_received_nums->execute();
            $received_nums = $get_received_nums->fetchAll();
            foreach ($received_nums as $received_num) {
              $total_received_nums++;
            }
            $get_received_nums->closeCursor();
            if ($total_received_nums == 0) {
              $ti_le_chot = 0;
            }else{
              $ti_le_chot = ($total_sold_nums / $total_received_nums)*100;
            }

            //Check hasRegiter?
            // $check_register = $db->prepare("SELECT * from `user_account` WHERE `user_account`.`empCode` = '$empCode';");
            // $check_register->execute();
            // $get_register = $check_register->fetch();
            // $has_register = $get_register['hasRegister'];
            // $check_register->closeCursor();

          ?>

          <h1> Mục tiêu doanh số</h1>
          <div class="container">
            <div class="row">
              <div class="col-md-3">
                <p><b>Doanh số mục tiêu:</b> <?php echo number_format($ap_doanh_so)?> VND</p>
              </div>
              <div class="col-md-3">
                <p><b>Doanh số đã đạt:</b> <?php echo number_format($doanh_so_da_dat);?> VND</p>
              </div>
              <div class="col-md-3">
                <p><b>Tỉ lệ chốt:</b> <?php echo number_format("$ti_le_chot",2,",",".");?>%</p>
              </div>
            </div>
            <br>

          </div>
        </div>

        <!-- eof Mục tiêu doanh số-->



        <!-- Hỗ trợ-->
        <div id="six" class="content fade">
          <h1> Hỗ trợ </h1>
          <div class="content-welcome">
            <p>
              Smart Number là ứng dụng chia số tự động được thiết kế với mục đích giúp sale tiết kiệm thời gian và sức lực, từ đó có thể đẩy mạnh năng xuất công việc.<br>
            </p>
            <ul>
              <li>Smart Number sẽ giúp bạn:</li>
              <li>- Tối ưu hoá công việc truy xuất data hách hàng.</li>
              <li>- Theo dõi mục tiêu doanh số.</li>
              <li>- Tính tỉ lệ chốt.</li>
            </ul>
            <p style="margin-bottom: 30px;">
              Đội ngũ chúng tôi tin rằng Smart Number sẽ là cầu nối vững chắc giữa mark và sale. Chúc bạn làm việc hiệu quả.<br><br>
              <b>Email:</b> hotro@taman.com.vn<br>
              <b>SDT:</b> 0912124312
            </p>
          </div>

        </div>
        <!-- eof Hỗ trợ-->

      </div>
    </div>
  </div>
  <?php
  require_once 'inc/bottom.php';
  ?>
