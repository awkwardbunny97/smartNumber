<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
session_start();
session_regenerate_id();

if (!isset($_SESSION['user_account_id']) && !(basename($_SERVER['PHP_SELF']) === 'login.php')) {
    header('location: login.php');
    exit;
}

try {
    $db = new PDO('mysql:host=localhost;dbname=namnam206_smart_number;charset=utf8','namnam206_nam','qt4j6UAR');
    //$db = new PDO('mysql:host=localhost;dbname=tamAnSale;charset=utf8','root','');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $ex) {
    header('location: error.php?error='. urlencode($ex->getMessage()));
}

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userID = filter_input(INPUT_POST,'userID', FILTER_SANITIZE_MAGIC_QUOTES);
    $password = md5(filter_input(INPUT_POST,'password', FILTER_SANITIZE_MAGIC_QUOTES));

    $sql = "select userID,password,auth_level,store_code from user_account where userID='$userID' and password='$password'";
    $statement = $db->query($sql);
    if ($statement) {
        $user_account = $statement->fetch();
        if ($user_account) {
            $_SESSION['user_account_id'] = $user_account['userID'];
            $auth_level = $user_account['auth_level'];

            if ($auth_level == 'lead_sale') {
              if ($userID == 'phamdoan') {
                echo "<script>
                window.location.href='smanager/phamdoan.php';
                alert('Chúc bạn ngày mới làm việc hiệu quả!');
                </script>";
                exit;
              }
              else if ($userID == 'linhtuti') {
                echo "<script>
                window.location.href='smanager/linhtuti.php';
                alert('Chúc bạn ngày mới làm việc hiệu quả!');
                </script>";
                exit;
              }
            }
            else if($auth_level == 'storage'){
              echo "<script>
              window.location.href='smanager/storage.php';
              alert('Chúc bạn ngày mới làm việc hiệu quả!');
              </script>";
              exit;
            }
            else if ($auth_level == 'lead_mark') {
              if ($userID == 'cuongvu') {
                echo "<script>
                window.location.href='smanager/cuongvu.php';
                alert('Chúc bạn ngày mới làm việc hiệu quả!');
                </script>";
                exit;
              }
              else if($userID == 'hungcuong'){
                  echo "<script>
                  window.location.href='smanager/hungcuong.php';
                  alert('Chúc bạn ngày mới làm việc hiệu quả!');
                  </script>";
                  exit;
              }
              else if($userID == 'trongnghia'){
                  echo "<script>
                  window.location.href='smanager/trongnghia.php';
                  alert('Chúc bạn ngày mới làm việc hiệu quả!');
                  </script>";
                  exit;
              }
            }
            else{
              echo "<script>
              window.location.href='$auth_level.php';
              alert('Chúc bạn ngày mới làm việc hiệu quả!');
              </script>";
              exit;
            }


        }
        else {
            echo "<script>
            window.location.href='login.php';
            alert('Sai ID hoặc mật khẩu.!');
            </script>";
            exit;
        }
    }
    else  {
        echo "<script>
        window.location.href='login.php';
        alert('Lỗi truy xuất thông tin.');
        </script>";
        exit;
    }
    $sql->closeCursor();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Smart Number</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="img/logo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" href="css/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
</head>
<body>


<div class="limiter ">
  <div class="container-login100 animated fadeIn">
    <div class="wrap-login100 p-t-85 p-b-20">
      <form class="login100-form validate-form" action="<?php print $_SERVER['PHP_SELF']?>" method="post">
        <span class="login100-form-avatar"style="border-radius: 0 !important;">
          <img src="img/logo.png" alt="AVATAR">
        </span>
        <div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Điền User ID">
          <input class="input100" type="text" name="userID">
          <span class="focus-input100" data-placeholder="User ID"></span>
        </div>

        <div class="wrap-input100 validate-input m-b-50" data-validate="Điền password">
          <input class="input100" type="password" name="password">
          <span class="focus-input100" data-placeholder="Password"></span>
        </div>

        <div class="container-login100-form-btn">
          <button class="login100-form-btn" type="submit">
            Login
          </button>
        </div>
      </form>
    </div>
  </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="login/vendor/bootstrap/js/popper.js"></script>
<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="login/vendor/daterangepicker/moment.min.js"></script>
<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="login/js/main.js"></script>
</body>

</html>
