<?php require_once('dbconnection.php'); ?>
<?php

  $sql = "UPDATE user_to_item SET status = '".$_POST['status']."', shopper_id=".$_POST['user_id']." WHERE id=".$_POST['id'];

  $result = DBConnect::getInstance()->query($sql);
  echo $result;
  // print_r($_POST);




?>
