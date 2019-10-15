<?php
try {
  //////////////
  ///UserInfo///
  //////////////
  $userID = $_SESSION['user_account_id'];
  $getUsers = $db->prepare("select * from user_account where userID = '$userID'");
  $getUsers->execute();
  $users = $getUsers->fetchAll();
  foreach ($users as $user) {
      $name = $user['name'];
      $createdDate = $user['createdDate'];
      $empCode = $user['empCode'];
      $store_code = $user['store_code'];
      $canGet = $user['canGet'];
      $canGetCombo = $user['canGetCombo'];
      $canGetAbit = $user['canGetAbit'];
      $canGetTest = $user['canGetTest'];
      $canGetTest2 = $user['canGetTest2'];
      $sale_group = $user['sale_group'];
  }
  $getUsers->closeCursor();

} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}
