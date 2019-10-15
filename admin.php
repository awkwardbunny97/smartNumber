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
<style media="screen">
  .left-content ul li.active, .copyright{
    background-color: #2980b9;
  }
</style>
<body>
  <?php
  $total_new_num = 0;
  $total_user = 0;
  $total_num = 0;
  $bonus_num = 0;

  $get_nums = $db->prepare("select * from $store_code where (newNum = 1 and empCode = '' and isABIT = 0 and isCombo = 0 and isTest = 0)");
  $get_nums->execute();
  $nums = $get_nums->fetchAll();
  // $total_num = count($nums); //20
  //for adding empCode used below
  $total_new_num = count($nums);
  $get_nums->closeCursor();

  $get_abit = $db->prepare("select * from $store_code where (newNum = 1 and empCode = '' and isABIT = 1)");
  $get_abit->execute();
  $abit = $get_abit->fetchAll();
  $total_new_abit = count($abit);
  $get_abit->closeCursor();

  $get_combo = $db->prepare("select * from $store_code where (newNum = 1 and empCode = '' and `isCombo` = 1)");
  $get_combo->execute();
  $combo = $get_combo->fetchAll();
  $total_new_combo = count($combo);
  $get_combo->closeCursor();

  $get_test = $db->prepare("select * from $store_code where (newNum = 1 and empCode = '' and `isTest` = 1)");
  $get_test->execute();
  $test = $get_test->fetchAll();
  $total_new_test = count($test);
  $get_test->closeCursor();


  $getUsers = $db->prepare("select * from user_account where (store_code = '$store_code' and auth_level <> 'admin') order by sale_group ASC");
  $getUsers->execute();
  $users = $getUsers->fetchAll();
  $getUsers->closeCursor();
  $total_user = count($users); //11
  ?>
  <div class="wrapper">
    <div class="left-side">
      <div class="logo">
        <img src="img/logo.png" alt="">
      </div>
      <div class="left-content">
        <ul role="tablist">
          <li role="presentation" class="active"><a href="#one" aria-controls="home" role="tab" data-toggle="tab"><span><i class="fas fa-phone-square"></i></span>Quản lý số</a></li>

          <li role="presentation"><a href="#four" aria-controls="home" role="tab" data-toggle="tab"><span><i class="fas fa-info-circle"></i></span>Nhập số</a></li>



          <li role="presentation"><a href="#three" aria-controls="home" role="tab" data-toggle="tab"><span><i class="fas fa-calendar-check"></i></span>Lịch sử</a></li>

          <li role="presentation"><a href="#two" aria-controls="home" role="tab" data-toggle="tab"><span><i class="fas fa-address-card"></i></span>Quản lý Sale</a></li>




          <li role="presentation"><a href="#six" aria-controls="home" role="tab" data-toggle="tab"><span><i class="fas fa-info-circle"></i></span>Hỗ trợ</a></li>

          <li role="presentation"><a href="logout.php"><span><i class="fas fa-sign-out-alt"></i></span>Đăng xuất</a></li>
        </ul>
      </div>
      <div class="copyright">
        <p>Copyright &copy; 2018. All Rights Reserved.<span>Tam An R&D Department. <?php echo $store_code ?></span> </p>
      </div>
    </div>

    <div class="right-side">
      <div class="right-content">
        <!-- Bảng số-->
        <div id="four" class="content  fade ">
          <h1> Nhập số </h1>
          <div class="container" id="import_num_container">
            <div class="row">
              <div class="col-md-2">
                <p><b>Số mới:</b> <?php echo $total_new_num;?></p>
              </div>
              <div class="col-md-2">
                <p><b>Số ABIT:</b> <?php echo $total_new_abit;?></p>
              </div>
              <div class="col-md-2">
                <p><b>Số COMBO:</b> <?php echo $total_new_combo;?></p>
              </div>
              <div class="col-md-2">
                <p><b>Số Test:</b> <?php echo $total_new_test;?></p>
              </div>

            </div>
            <br>

            <div class="row">
              <div class="col-xs-12">
                  <h4>Thu số Test</h4>
              </div>
              <div class="col-xs-12">
                <form method="post" class="col-md-12">
                  <label for="date"> Chọn khoảng thời gian: </label><br>

                    <label for="date"> Chọn ngày: </label>
                    <input type="date" id="start_date" max="<?php echo date('Y-m-d'); ?>" value="" >
                    <button type="button" class="btn btn-primary" onclick="$('#myModal').modal('show')"> Thu số vàng + chưa note!</button>
                </form>
              </div>
              <div class="col-xs-12" id="modal_container">
                <div class="modal fade" id="myModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Thu số Test</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      </div>
                      <div class="modal-body">
                        <p>Chắc không?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Huỷ</button>
                        <button type="button" class="btn btn-primary" onclick="create_test_yellow()">OK</button>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
              </div>
            </div>

            <br>
            <br>
            <form class="" method="post">
              <h4> Kiểm Tra </h4>
              <textarea name="check" rows="5" cols="100" id="check_num_text_area"></textarea>
              <button type="submit" class="btn btn-primary" onclick="return check_num()">Check</button>
            </form>
            <form class="" method="post">
              <h4> Nhập số </h4>
              <label>Số page</label>
              <input type="number" value="1" id="page_no" required>
              <br><br>
              <textarea name="data" rows="5" cols="100" id="new_nums" required></textarea>
              <button type="submit" class="btn btn-primary" onclick="return import_new()">Send</button>
            </form>
            <form class="" method="post">
              <h4> Nhập số ABIT</h4>
              <textarea name="abit" id="abit_nums" rows="5" cols="100" required></textarea>
              <button type="submit" class="btn btn-primary" onclick="return import_abit()" >Send</button>
            </form>
            <form class="" method="post">
              <h4> Nhập số COMBO</h4>
              <label>Số page</label>
              <input type="number" value="1" id="page_no_combo" required>
              <br><br>
              <textarea name="combo" id="combo_nums" rows="5" cols="100" required></textarea>
              <button type="submit" class="btn btn-primary" onclick="return import_combo()" >Send</button>
            </form>
            <br>
            <pre id="check_results">

            </pre>
          </div>


        </div>

        <!-- eof Bảng số-->

        <!-- Quản lý số -->
        <?php


          $today = date("Y-m-d");

          $get_used_nums = $db->prepare("select * from $store_code where (empCode != '' and giveDate = '$today')");
          $get_used_nums->execute();
          $used_nums = $get_used_nums->fetchAll();
          $total_used_num = count($used_nums);
          $get_used_nums->closeCursor();

          $get_used_abit = $db->prepare("select * from $store_code where (empCode != '' and giveDate = '$today' and isABIT = 1)");
          $get_used_abit->execute();
          $used_abit = $get_used_abit->fetchAll();
          $total_used_abit = count($used_abit);
          $get_used_abit->closeCursor();

          $get_used_combo = $db->prepare("select * from $store_code where (empCode != '' and giveDate = '$today' and isCombo = 1)");
          $get_used_combo->execute();
          $used_combo = $get_used_combo->fetchAll();
          $total_used_combo = count($used_combo);
          $get_used_combo->closeCursor();

          $get_used_test = $db->prepare("select * from $store_code where (empCode != '' and giveDate = '$today' and isTest = 1)");
          $get_used_test->execute();
          $used_test = $get_used_test->fetchAll();
          $total_used_test = count($used_test);
          $get_used_test->closeCursor();

          $get_used_new = $db->prepare("select * from $store_code where (empCode != '' and giveDate = '$today' and isTest = 0 and isCombo = 0 and isABIT = 0)");
          $get_used_new->execute();
          $used_new = $get_used_new->fetchAll();
          $total_used_new = count($used_new);
          $get_used_new->closeCursor();
        ?>

        <div id="one" class="content active fade in" style="border-bottom: 1px solid #ddd;">
          <h1>Quản lý số</h1>
          <div class="container" id="emp_manage">
            <div class="row">
              <h3>Chia số</h3>
            </div>
            <br>
            <div class="row">
              <div class="col-md-3">
                <form method="post" >
                  <button type="submit"class="btn btn-primary" onclick="return reset_all()" >Chào ngày mới!</button>
                </form>
              </div>
              <div class="col-md-3">
                <form method="post" >
                  <button type="submit"class="btn btn-primary" onclick="return reset_num()">Không cho Sale lấy số</button>
                </form>
              </div>

            </div>
            <br>
            <div class="row">

              <div class="col-md-3">
                <form method="post" >
                  <button type="submit"class="btn btn-primary" onclick="return activate_f2_5()">Mỗi Sale lấy 5 số</button>
                </form>

              </div>
              <div class="col-md-3">
                <form method="post" >
                  <button type="submit"class="btn btn-primary" onclick="return activate_abit_5()">Mỗi Sale lấy 5 số ABIT </button>
                </form>
              </div>

              <div class="col-md-3">
                <form method="post" >
                  <button type="submit"class="btn btn-primary" onclick="return activate_test_5()">Mỗi Sale lấy 5 số Test </button>
                </form>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-3">
                <form method="post" >
                  <button type="submit"class="btn btn-primary" onclick="return activate_3_new()">Mỗi Sale lấy 3 số </button>
                </form>
              </div>

              <div class="col-md-3">
                <form method="post" >
                  <button type="submit"class="btn btn-primary" onclick="return activate_3_abit()">Mỗi Sale lấy 3 số ABIT</button>
                </form>
              </div>

              <div class="col-md-3">
                <form method="post" >
                  <button type="submit"class="btn btn-primary" onclick="return activate_test_3()">Mỗi Sale lấy 3 số Test </button>
                </form>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-3">
                <form method="post" >
                  <button type="submit"class="btn btn-primary" onclick="return activate_1_new_2_abit()"> 1 số mới + 2 số ABIT</button>
                </form>
              </div>

              <div class="col-md-3">
                <form method="post" >
                  <button type="submit"class="btn btn-primary" onclick="return activate_2_new_1_abit()"> 2 số mới + 1 số ABIT</button>
                </form>
              </div>

              <div class="col-md-3">
                <form method="post" >
                  <button type="submit"class="btn btn-primary" onclick="return activate_3_2()"> 3 số mới + 2 số ABIT </button>
                </form>
              </div>

              <div class="col-md-2">
                <form method="post" >
                  <button type="submit"class="btn btn-primary" onclick="return activate_7_new_3_abit()">7 số Mới + 3 ABIT</button>
                </form>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-3">
                <form method="post" >
                  <button type="submit"class="btn btn-primary" onclick="return activate_1_new_2_test()"> 1 số Mới + 2 số Test</button>
                </form>
              </div>
              <div class="col-md-3">
                <form method="post" >
                  <button type="submit"class="btn btn-primary" onclick="return activate_2_new_1_test()"> 2 số Mới + 1 số Test</button>
                </form>
              </div>

              <div class="col-md-3">
                <form method="post" >
                  <button type="submit"class="btn btn-primary" onclick="return activate_3_new_2_test()"> 3 số Mới + 2 số Test</button>
                </form>
              </div>


            </div>
            <br><br>

            <div class="row">
              <form method="post" >
                <div class="col-xs-2">
                  <select name="empCode" multiple id="target_empCode_js" style="height: 200px;padding:10px;">
                      <?php
                        foreach ($users as $user){
                          $empC = $user['empCode'];
                          print "<option value='$empC'>";
                            print $user['name'] . ' (' . $user['sale_group'] .')';
                          print "</option>";
                        }
                      ?>
                    </select>
                </div>
                <div class="col-xs-1" >
                  <input type="text" name="bonus" id="bonus_num" placeholder="Số" style="width:100%;height:35px;padding-left:5%;" required>
                </div>
                <div class="col-xs-6">
                  <div class="col-xs-5" >
                    <button type="submit" class="btn btn-primary" onclick="return add_bonus()" style="margin-bottom: 5%">Chia thêm số (mới)</button>
                    <button type="submit" class="btn btn-primary" onclick="return add_bonus_combo()" style="margin-bottom: 5%">Chia thêm số COMBO</button>
                    <button type="submit" class="btn btn-primary" onclick="return no_more_num()">Không cho lấy số</button>
                  </div>
                  <div class="col-xs-5" >
                    <button type="submit" class="btn btn-primary" onclick="return add_bonus_abit()" style="margin-bottom: 5%">Chia thêm số ABIT</button>


                    <button type="submit" style="margin-bottom: 5%"  class="btn btn-primary" onclick="return add_bonus_test()">Chia thêm số Test</button>


                  </div>
                </div>
                </form>
            </div>


            <div class="row" style="margin-top: 3%; ">
              <h3>Kiểm tra nhân viên (<?php echo $total_user;?>) hôm nay</h3>
            </div>

            <div class="row">
              <div class="col-md-2">
                <p><b>Số mới:</b> <?php echo $total_new_num;?></p>
              </div>
              <div class="col-md-2">
                <p><b>Số ABIT:</b> <?php echo $total_new_abit;?></p>
              </div>
              <div class="col-md-2">
                <p><b>Số Combo:</b> <?php echo $total_new_combo;?></p>
              </div>
              <div class="col-md-2">
                <p><b>Số Test:</b> <?php echo $total_new_test;?></p>
              </div>

            </div>
            <div class="row">
              <div class="col-md-5">
                <p><b>Đã chia hôm nay:</b> <?php echo $total_used_num;?> (Mới: <?php echo $total_used_new;?>, ABIT: <?php echo $total_used_abit;?>, Combo: <?php echo $total_used_combo;?>, Test1: <?php echo $total_used_test;?>


              </div>
            </div>
            <br>
            <?php
                //cal_red
                $get_total_red = $db->prepare("SELECT COUNT(empCode) FROM `$store_code` WHERE `giveDate` = '$today' AND `color` = 'red'");
                $get_total_red->execute();
                $total_red_nums = $get_total_red->fetch();
                $reds = $total_red_nums['0'];
                $get_total_red->closeCursor();

                //cal_yellow
                $get_total_yellow = $db->prepare("SELECT COUNT(empCode) FROM `$store_code` WHERE `giveDate` = '$today' AND `color` = 'yellow'");
                $get_total_yellow->execute();
                $total_yellow_nums = $get_total_yellow->fetch();
                $yellows = $total_yellow_nums['0'];
                $get_total_yellow->closeCursor();

                //cal_green
                $get_total_green = $db->prepare("SELECT COUNT(empCode) FROM `$store_code` WHERE `giveDate` = '$today' AND `color` = 'green'");
                $get_total_green->execute();
                $total_green_nums = $get_total_green->fetch();
                $greens = $total_green_nums['0'];
                $get_total_green->closeCursor();

                //cal_blue
                $get_total_blue = $db->prepare("SELECT COUNT(empCode) FROM `$store_code` WHERE `giveDate` = '$today' AND `color` = 'blue'");
                $get_total_blue->execute();
                $total_blue_nums = $get_total_blue->fetch();
                $blues = $total_blue_nums['0'];
                $get_total_blue->closeCursor();

                //cal_pink
                $get_total_pink = $db->prepare("SELECT COUNT(empCode) FROM `$store_code` WHERE `giveDate` = '$today' AND `color` = 'pink'");
                $get_total_pink->execute();
                $total_pink_nums = $get_total_pink->fetch();
                $pinks = $total_pink_nums['0'];
                $get_total_pink->closeCursor();
            ?>

            <div class="row">
              <div class="col-md-2">
                <p><b>Số đỏ:</b> <?php echo $reds;?></p>
              </div>
              <div class="col-md-2">
                <p><b>Số vàng:</b> <?php echo $yellows;?></p>
              </div>
              <div class="col-md-2">
                <p><b>Số xanh lá:</b> <?php echo $greens;?></p>
              </div>
              <div class="col-md-2">
                <p><b>Số xanh dương:</b> <?php echo $blues;?></p>
              </div>
              <div class="col-md-2">
                <p><b>Số hồng:</b> <?php echo $pinks;?></p>
              </div>
            </div>

            <br><br>
            <div class="row" style="margin-bottom:1%;">

              <div class="col-md-1">
                <p><b>STT</b></p>
              </div>
              <div class="col-md-2">
                <p><b>Tên nhân viên</b></p>
              </div>

              <div class="col-md-1">
                <p><b>Có thể lấy</b></p>
              </div>
              <div class="col-md-1">
                <p><b>Có thể lấy ABIT</b></p>
              </div>
              <div class="col-md-1">
                <p><b>Có thể lấy Combo</b></p>
              </div>
              <div class="col-md-1">
                <p><b>Có thể lấy Test</b></p>
              </div>

              <div class="col-md-1">
                <p><b>Đã lấy</b></p>
              </div>

              <div class="col-md-1">
                <p><b>Red</b></p>
              </div>
              <div class="col-md-1">
                <p><b>Yellow</b></p>
              </div>
              <div class="col-md-1">
                <p><b>Green</b></p>
              </div>


            </div>
            <?php
              $get_users = $db->prepare("SELECT * FROM `user_account` WHERE (store_code = '$store_code' AND `auth_level` <> 'admin') order by sale_group ASC");
              $get_users->execute();
              $users = $get_users->fetchAll();
              $get_users->closeCursor();
              $z = 1;
              foreach ($users as $user) {
                  $temp_empC = $user['empCode'];

                  $real_canGet = $user['canGet'] + $user['canGetAbit'] + $user['canGetCombo'];

                  ///////////////////
                  //Cal hasRecieved//
                  //////////////////
                  $cal_hasRecieved = $db->prepare("SELECT COUNT(empCode) FROM $store_code where `empCode` = '$temp_empC' AND giveDate = '$today'");
                  $cal_hasRecieved->execute();
                  $hasRecieved = $cal_hasRecieved->fetch();
                  $total_hasRecieved = $hasRecieved[0];
                  $cal_hasRecieved->closeCursor();

                  //cal_red
                  $get_red = $db->prepare("SELECT COUNT(empCode) FROM `$store_code` WHERE `giveDate` = '$today' AND `color` = 'red' AND empCode = '$temp_empC'");
                  $get_red->execute();
                  $red_nums = $get_red->fetch();
                  $red = $red_nums['0'];
                  $get_red->closeCursor();

                  //cal_yellow
                  $get_yellow = $db->prepare("SELECT COUNT(empCode) FROM `$store_code` WHERE `giveDate` = '$today' AND `color` = 'yellow' AND empCode = '$temp_empC'");
                  $get_yellow->execute();
                  $yellow_nums = $get_yellow->fetch();
                  $yellow = $yellow_nums['0'];
                  $get_yellow->closeCursor();

                  //cal_green
                  $get_green = $db->prepare("SELECT COUNT(empCode) FROM `$store_code` WHERE `giveDate` = '$today' AND `color` = 'green' AND empCode = '$temp_empC'");
                  $get_green->execute();
                  $green_nums = $get_green->fetch();
                  $green = $green_nums['0'];
                  $get_green->closeCursor();

                  //cal_blue
                  $get_blue = $db->prepare("SELECT COUNT(empCode) FROM `$store_code` WHERE `giveDate` = '$today' AND `color` = 'blue' AND empCode = '$temp_empC'");
                  $get_blue->execute();
                  $blue_nums = $get_blue->fetch();
                  $blue = $blue_nums['0'];
                  $get_blue->closeCursor();

                  //cal_pink
                  // $get_pink = $db->prepare("SELECT COUNT(empCode) FROM `$store_code` WHERE `giveDate` = '$today' AND `color` = 'pink' AND empCode = '$temp_empC'");
                  // $get_pink->execute();
                  // $pink_nums = $get_pink->fetch();
                  // $pink = $pink_nums['0'];
                  // $get_pink->closeCursor();

                  if ($z % 2 == 0) {
                    print "<div class='row' style='margin-bottom:1%; background-color:#74b9ff;padding-top:1%;padding-bottom:1%'>";
                  }else {
                    print "<div class='row' style='margin-bottom:1%;'>";
                  }

                    print "<div class='col-md-1'>";
                    print $z;
                    print "</div>";

                    print "<div class='col-md-2'>";
                     print $user['name'] . ' (' . $user['sale_group'] .')';
                    print "</div>";

                    print "<div class='col-md-1'>";
                    print $user['canGet'];
                    print "</div>";

                    print "<div class='col-md-1'>";
                    print $user['canGetAbit'];
                    print "</div>";

                    print "<div class='col-md-1'>";
                    print $user['canGetCombo'];
                    print "</div>";

                    print "<div class='col-md-1'>";
                    print $user['canGetTest'];
                    print "</div>";



                    print "<div class='col-md-1'>";
                    print $total_hasRecieved;
                    print "</div>";

                    print "<div class='col-md-1'>";
                    print $red;
                    print "</div>";

                    print "<div class='col-md-1'>";
                    print $yellow;
                    print "</div>";

                    print "<div class='col-md-1'>";
                    print $green;
                    print "</div>";

                    // print "<div class='col-md-1'>";
                    // print $blue;
                    // print "</div>";

                  print "</div>";
                $z++;
              }

            ?>
          </div>
          <br><br>
          <div class="col-xs-12" id="search_wrapper">
            <div class="row" style="margin-left:6%; margin-top: 3%">
              <h3>Tìm kiếm bệnh nhân:</h3>
            </div>
            <div class="row" style="margin-left:6%; margin-top: 3%">
              <form method="POST" onsubmit="return phone_search_for_admin();">
                <input type="text" id="phone_test_admin" style="width:30%;height:50%;" required>
                <button class="btn btn-primary" type="submit">Tìm</button>
              </form>
            </div>
            <div class="row" id="search_wrapper_result_for_admin">

            </div>
          </div>
        </div>
        <!-- eof Quản lý số-->

        <!-- Thông tin nhân viên -->

        <div id="two" class="content fade" style="border-bottom: 1px solid #ddd;">
          <h1>Quản lý Sale</h1>
          <div class="container">
            <div class="row">
              <div class="col-md-6 add-employee">
                <h3>Thêm Sale</h3>
                <form method="post" onsubmit="return register()">
                  <div class="row">
                    <div class="col-md-4">
                      <label>Tên đăng nhập</label>
                      <input type="text" class="form-control" id="userID" required>
                    </div>
                    <div class="col-md-4">
                      <label>Mật khẩu</label>
                      <input type="text" class="form-control" id="password" required>
                    </div>
                    <div class="col-md-4">
                      <label>Tên</label>
                      <input type="text" class="form-control"  id="name" required>
                    </div>
                    <div class="col-md-4">
                      <label>6 số cuối sđt</label>
                      <input type="number" class="form-control" id="phone" required>
                    </div>
                    <div class="col-md-3">
                      <label>Nhóm</label>
                      <input type="text" class="form-control" id="sale_group" required>
                    </div>

                    <!-- hidden -->
                    <div class="col-md-5">
                      <input type="hidden" class="form-control" value="<?php echo $store_code;?>" id="store_code">
                    </div>
                    <div class="col-md-5">
                      <input type="hidden" class="form-control" value="sale" id="auth_level">
                    </div>

                    <div class="col-md-12" style="margin-top:10px;">
                      <button class="btn btn-primary" type="submit">Đăng ký</button>
                    </div>

                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
        <!-- eof Thông tin nhân viên -->

        <!-- Kho số-->

        <!-- <div id="five" class="content fade" style="border-bottom: 1px solid #ddd;">
          <h1>Kho số</h1>
          <div class="container">
            <div class="row" id="test_day" style="margin-left:0; margin-top: 3%">
              <form method="post" class="col-md-12">
                <label for="date"> Chọn khoảng thời gian: </label><br>

                  <label for="date"> Từ ngày: </label>
                  <input type="date" id="use_this_date" max="" value="" >
                  <label for="date"> đến ngày: </label>
                  <input type="date" id="end_date" max=""  value="">
                  <button type="submit" class="btn btn-primary">Go!</button>

              </form>
              <br><br>
              <div class="row">
                <div id="data_list">

                </div>
              </div>
            </div>
          </div>

        </div> -->
        <!-- eof Kho số-->


        <!-- Lịch sử -->
        <div id="three" class="content fade" style="border-bottom: 1px solid #ddd;">
          <h1> Lịch sử</h1>
          <div class="container">
            <?php
              $date_used_for_history = date("Y-m-d");
            ?>
            <div class="row">
              <form method="post" onsubmit="return show_history()">
                <label for="date">Chọn ngày: </label>
                <input type="date"  max="<?php echo $date_used_for_history;?>" value="<?php echo $date_used_for_history;?>" id="date_for_history">
                <button type="submit" class="btn btn-primary">Go!</button>
              </form>
            </div>
            <div class="row">
              <div id="history_content">

              </div>
            </div>
            <!-- //Note details -->
             <div class="row">
               <form method="post">
                 <label>Chọn nhân viên:</label>
                 <br />
                 <div class="col-xs-2">
                   <select name="empCode" multiple id="target_empCode_for_checking" style="height: 200px;padding:10px;">
                     <?php
                      foreach ($users as $user){
                        $empC = $user['empCode'];
                        print "<option value='$empC'>";
                          print $user['name'] . ' (' . $user['sale_group'] .')';
                        print "</option>";
                      }
                   ?>
                   </select>
                 </div>
                 <div class="col-xs-2">
                   <button type="submit" class="btn btn-primary" onclick="return check_note()">Kiểm tra</button></button>
                 </div>

               </form>
             </div>
             <br>
             <div class="row">
               <div id="check_results_for_note">

               </div>
             </div>
          </div>
        </div>

        <!-- eof Lịch sử-->



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
