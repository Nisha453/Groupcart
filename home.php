<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
require_once('dbconnection.php');?>
<?php if(isset($_GET['user_id'])){ ?>
<div class="container">
  <h1>Home</h1>
  <?php $group_link = "./groups.php?user_id=".$_GET['user_id'];
        $profile_link = "./profile.php?user_id=".$_GET['user_id'];
        $shopping_link = "./shopping.php?user_id=".$_GET['user_id'];
        $cart_link = "./cart.php?user_id=".$_GET['user_id'];?>
  <a href="<?php echo $group_link?>">Groups</a>
  <a href="<?php echo $profile_link?>">Profile</a>
  <a href="<?php echo $shopping_link?>">Shopping List</a>
  <a href="<?php echo $cart_link?>">Cart</a>

</div>
<?php }?>
