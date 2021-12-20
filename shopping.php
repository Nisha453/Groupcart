<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
require_once('dbconnection.php');?>
<div class="container">
  <h1>Shopping List</h1>
  <?php if(isset($_GET['user_id'])){
      $cart_data = get_shoppinglist($_GET['user_id']);
      if($cart_data){
        while ($data = $cart_data->fetch_assoc()) {// print_r($item);?>
          <form>
              <input type="hidden" name="id" value="<?php echo $data['id']; ?>" id="id"/>
              <input type="hidden" name="user_id" value="<?php echo $_GET['user_id']; ?>" id="user_id"/>
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
        <div class="col-sm-2">
          <label for="status">Status:</label>
              <select name="status" id="status">
                <?php if($data['status'] == 'pending') { ?>
                  <option value="pending" selected='selected'>Pending</option>
                <?php } else { ?>
                  <option value="pending">pending</option>
                <?php } ?>
                <?php if($data['status'] == 'processing') { ?>
                  <option value="processing" selected='selected'>Processing</option>
                <?php } else { ?>
                  <option value="processing">processing</option>
                <?php } ?>
                <?php if($data['status'] == 'ready') { ?>
                  <option value="ready" selected='selected'>Ready</option>
                <?php } else { ?>
                  <option value="Ready">Ready</option>
                <?php } ?>
              </select>
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
          </form>
  <?php } } } ?>
</div>






<?php
function get_shoppinglist($user_id){
  $sql = "SELECT * FROM  user_to_group where user_id = ".$user_id;
  $result = DBConnect::getInstance()->query($sql);
  $groups = array();
  while ($data = $result->fetch_assoc()) {
    array_push($groups,$data['group_id']);
  }
  $string_version = implode(',', $groups);
  // print_r($result);
  // $Array = json_decode(json_encode($result), true);
  // print_r($string_version);
  $sql = "SELECT * FROM  user_to_item as ui left join items as i on ui.item_id = i.item_id left join groups as g on ui.group_id = g.group_id left join users as u on ui.user_id = u.user_id WHERE ui.group_id In ($string_version) AND ui.user_id != ".$user_id;
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

<script>
     $(function () {

      $('select').on('change', function(e) {
        console.log(this.value);
         e.preventDefault();
         $.ajax({
           type: 'post',
           url: 'addtoshoppinglist.php',
           data: {status : this.value,
                  id:  $( this ).parent().parent().parent().find('#id').val(),
                  user_id: $( this ).parent().parent().parent().find('#user_id').val(), },
           success: function (data) {
             console.log(data);
             if(data){
              // alert('Status has been updated for this item');
              location.reload();
              }

           }
         });

       });

     });
</script>
