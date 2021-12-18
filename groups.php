<?php
require_once('dbconnection.php');
$user_id = 1;
$groups = get_all_groups();

// print_r($items);
while ($group = $groups->fetch_assoc()) {// print_r($item);
    $check_subscribed =  check_subscription($user_id,$group['group_id']);

    ?>


      <div><?php echo $group['name']?></div>
      <div><?php echo $group['description']?></div>
      <?php if($check_subscribed){
       $link = "/groupcart/items.php?group_id=".$group['group_id'];?>
                <input type="button" value = "Subscribed"  disabled>
                  <!-- <input type="button" value = "Subscribe" onclick="add_user_to_group(<?php echo $user_id ?>,<?php echo $group['group_id'] ?>)"> -->
                <a href="<?php echo $link;?>"> View </a>
      <?php }else{ ?>
                <input type="button" value = "Subscribe" onclick="add_user_to_group(<?php echo $user_id ?>,<?php echo $group['group_id'] ?>)">


<?php }} ?>



<?php
function get_all_groups(){
  $sql = "SELECT * FROM groups";
  $result = DBConnect::getInstance()->query($sql);
  // var_dump($result);
  if ($result->num_rows > 0) {
  return $result;
  }
  else{
  return false;
  }
}
function check_subscription($user_id,$group_id){
  $sql = "SELECT * FROM user_to_group WHERE user_id=".$user_id." AND group_id=".$group_id;
  $result = DBConnect::getInstance()->query($sql);
  // var_dump($result);
  if ($result->num_rows > 0) {
  return true;
  }
  else{
  return false;
  }
}
?>
<script>
function add_user_to_group(user_id,group_id){

  // window.location.href = '/groupcart/group.php?group_id='+group_id+'&user_id='+user_id;
  $.ajax({
  method: "POST",
  url: "subscribe.php",
  data: { user_id: user_id, group_id: group_id}
  })
  .done(function( msg ) {
    // alert( "Data Saved: " + msg );
    if(msg){
      alert("You have subscribed")
      location.reload();
    }else{
      alert("You are already subscribed")
    }
  });

}
</script>
