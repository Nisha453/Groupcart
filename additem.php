<?php require_once('dbconnection.php'); ?>
<?php
print_r($_POST);

    // // function addtocart($user_id,$group_id,$item_id,$quantity,$deadline){
      $date = strtotime($_POST["deadline"]);
      $date = date('Y-m-d', $date);
      print_r($date);
      $sql = "INSERT INTO user_to_item (user_id,item_id,quantity,group_id,shopper_id,deadline,status) VALUES (".$_POST['user-id'].",".$_POST['item-id'].",".$_POST['quantity'].",".$_POST['group-id'].",0,'".$date."','pending')";
      $result = DBConnect::getInstance()->query($sql);
      // var_dump($result);
      echo $result;
    // }
?>
