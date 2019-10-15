<?php
require_once '../inc/top.php';
require_once '../inc/user_info.php';

if (isset($_GET['getToday'])) {
  $date2 = $_GET['getToday'];
  $number_of_date = $_GET['number_of_date'];
  for ($a = 1; $a <= $number_of_date; $a++){

    $date2 = date("Y-m-d", strtotime("-$a days"));
  }
}

?>
