<?php
require_once '../inc/top.php';
require_once '../inc/user_info.php';



if (isset($_POST['color'])) {
  $color2 = $_POST['color'];
  $choice = $_POST['choice'];
  $use_this_date = $_POST['use_this_date'];
  $end_date = $_POST['end_date'];

  if($use_this_date == '' || $end_date == ''){
    if ($choice == 1) {
      $use_this_date = date("Y-m-d");
      $end_date = date("Y-m-d");
    }
    else if ($choice == 3) {
      $end_date = date("Y-m-d");
      $use_this_date = date("Y-m-d",strtotime($end_date . "-2 days"));
    }
    else if ($choice == 7) {
      $end_date = date("Y-m-d");
      $use_this_date = date("Y-m-d",strtotime($end_date . "-6 days"));
    }
  }
  else if($use_this_date != '' || $end_date != ''){
    $choice = 0;
  }


  require_once '../inc/number_sheets_yellow.php';

}

?>
