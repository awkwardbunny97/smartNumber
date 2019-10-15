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

  <div class="wrapper">
    <div class="left-side">
      <div class="logo">
        <img src="img/logo.png" alt="">
      </div>
      <div class="left-content">
        <ul role="tablist">

          <li role="presentation"><a href="#three" aria-controls="home" role="tab" data-toggle="tab"><span><i class="fas fa-calendar-check"></i></span>Lịch sử</a></li>

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



        <!-- Lịch sử -->
        <div id="three" class="content fade" style="border-bottom: 1px solid #ddd;">


          <h1> Lịch sử</h1>
          <div class="container">
            <?php
              if($sale_group == ''){
                $date_used_for_history = date("Y-m-d");
                $getUsers = $db->prepare("select * from user_account where (store_code = '$store_code' and auth_level <> 'admin')");
                $getUsers->execute();
                $users = $getUsers->fetchAll();
                $getUsers->closeCursor();
                $total_user = count($users);
              } else{
                $date_used_for_history = date("Y-m-d");
                $getUsers = $db->prepare("select * from user_account where (store_code = '$store_code' and sale_group = '$sale_group' and auth_level <> 'admin')");
                $getUsers->execute();
                $users = $getUsers->fetchAll();
                $getUsers->closeCursor();
                $total_user = count($users);
              }
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
