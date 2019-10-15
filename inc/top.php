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
    $db2 = new PDO('mysql:host=localhost;dbname=namnam206_kiot;charset=utf8','namnam206_nam','qt4j6UAR');
    // $db = new PDO('mysql:host=localhost;dbname=tamAnSale;charset=utf8','root','');
    // $db2 = new PDO('mysql:host=localhost;dbname=kiot;charset=utf8','root','');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $ex) {
    header('location: error.php?error='. urlencode($ex->getMessage()));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
    $timestamp = date("YmdHis"); // output: 20150715164614
    date_default_timezone_set('Asia/Ho_Chi_Minh');
  ?>
  <meta charset="UTF-8">
  <title>Tâm An Sale</title>
  <link rel="icon" type="image/png" href="img/logo.png"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css?v=<?php echo $timestamp;?>">
  <link rel="stylesheet" href="css/bootstrap.min.css?v=<?php echo $timestamp;?>">
  <link rel="stylesheet" href="css/style.css?v=<?php echo $timestamp;?>">
</head>
