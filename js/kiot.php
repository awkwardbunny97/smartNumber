<?php
require_once '../inc/top.php';
require_once '../inc/user_info.php';

if (isset($_POST['p_list'])) {
    $name = $_POST['name'];
    $facebook = $_POST['facebook'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $conditions = $_POST['conditions'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $town = $_POST['town'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $notes = $_POST['notes'];
    $cusID = substr($phone,4);

    $p_list = $_POST['p_list'];
    $p_total_price = $_POST['p_total_price'];
    $discount = $_POST['discount'];
    $other = $_POST['other'];
    $total_price = $_POST['total_price'];



    $addCus = $db2->prepare("INSERT INTO `cus` (`name`, `facebook`,`phone`,`email`, `address`,`conditions`, `city`,`district`, `town`,`gender`, `age`,`notes`,`addBy`,`cusID`) VALUES ('$name', '$facebook', '$phone', '$email', '$address', '$conditions', '$city', '$district', '$town', '$gender', '$age', '$notes', '$empCode', 'KH$cusID')");
    $addCus->execute();
    $addCus->closeCursor();

    $upBill = $db2->prepare("INSERT INTO `invoices` (`productName`, `cusID`,`cusPhone`,`cusName`, `cusAddress`,`cusLocationName`, `notes`,`addBy`,`otherPrice`,`discountPrice`,`totalPrice`,`finalPrice`) VALUES ('$p_list', 'KH$cusID', '$phone', '$name', '$address', '$city - $district - $town','$notes','$empCode', '$other', '$discount','$p_total_price','$total_price')");
    $upBill->execute();
    $upBill->closeCursor();

  }

?>
