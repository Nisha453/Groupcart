<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
require_once('dbconnection.php');?>
<div class="container">
  <h1>My cart</h1>
  <?php if(isset($_GET['user_id'])){
      $cart_data = get_cartdata($_GET['user_id']);
      if($cart_data){
        while ($data = $cart_data->fetch_assoc()) {// print_r($item);?>

      <div class="row">

        <div class="col-sm-1">
          <div><?php echo $data['item_name'] ?></div>
        </div>
        <div class="col-sm-1">
          <div><?php echo $data['quantity'] ?></div>
        </div>
        <div class="col-sm-1">
          <div><?php echo $data['deadline'] ?></div>
        </div>
        <div class="col-sm-1">
          <div><?php echo $data['group_name'] ?></div>
        </div>
        <div class="col-sm-1">
          <div><?php echo $data['status'] ?></div>
        </div>
        <div class="col-sm-1">
          <div><?php echo $data['name'] ?></div>
        </div>
        <div class="col-sm-1">
          <?php  $shopper_name = get_shoppername($data['shopper_id']);
          if($shopper_name){
            while ($data = $shopper_name->fetch_assoc()) {?>
              <div><?php echo $data['name'] ?></div>
          <?php } } else{ ?>
              <div>None</div>
          <?php } ?>
        </div>
      </div>
  <?php } } } ?>
</div>
<?php
function get_cartdata($user_id){
  $sql = "SELECT * FROM  user_to_item as ui left join items as i on ui.item_id = i.item_id left join groups as g on ui.group_id = g.group_id left join users as u on ui.user_id = u.user_id WHERE ui.user_id =".$user_id;
  $result = DBConnect::getInstance()->query($sql);
  // var_dump($result);
  if ($result->num_rows > 0) {
    return $result;
  }
  else{
    return false;
  }
}

function get_shoppername($shopper_id){
  $sql = "SELECT name FROM users WHERE user_id = ".$shopper_id;
    $result = DBConnect::getInstance()->query($sql);
    // var_dump($result);
    if(!$result){
      return false;
    }
    else {
      if($result->num_rows > 0) {
        return $result;
    }
  }
}
?>
