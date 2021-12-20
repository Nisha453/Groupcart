<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
require_once('dbconnection.php');?>
<div class="container">
  <?php if(isset($_GET['user_id'])){
      $user_data = get_userdata($_GET['user_id']);
      if($user_data){
        while ($data = $user_data->fetch_assoc()) {// print_r($item);?>
      <h1>Profile</h1>

        <div class="row">
          <div class="col-sm-12">
            <label for="name"><b>Name</b></label>
            <div><?php echo $data['name']; ?></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <label for="email"><b>Email</b></label>
            <div><?php echo $data['email']; ?></div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12">
            <label for="address"><b>Address</b></label>
            <div><?php echo $data['address']; ?></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <label for="number"><b>Phone Number</b></label>
            <div><?php echo $data['phone_number']; ?></div>
          </div>
        </div>

  <?php } } } ?>
</div>
<?php
function get_userdata($user_id){
  $sql = "SELECT * FROM  users  WHERE user_id =".$user_id;
  $result = DBConnect::getInstance()->query($sql);
  // var_dump($result);
  if ($result->num_rows > 0) {
    return $result;
  }
  else{
    return false;
  }
}
?>
