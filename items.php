<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
require_once('dbconnection.php');?>
<div class="container">
  <?php
  $items = get_items_from_group_id($_GET['group_id']);
  if($items){
    while ($item = $items->fetch_assoc()) {// print_r($item);?>
      <form>
        <div class="row">
          <input type="hidden" name="user-id" value="<?php echo $_GET['user_id'];?>" />
          <input type="hidden" name="group-id" value="<?php echo $_GET['group_id'];?>" />
          <div class="col-sm-3">
            <div><?php echo $item['item_name'] ?></div>
            <input type="hidden" name="item-id" value="<?php echo $item['item_id'] ?>">
            <!-- <input type="checkbox" id="checkbox-<?php echo $item['item_id'] ?>" name="item-id" value="<?php echo $item['item_id'] ?>">
            <label for="checkbox-<?php echo $item['item_id'] ?>"> <?php echo $item['item_name'] ?></label> -->
          </div>
          <div class="col-sm-3">
            <label for="quantity-<?php echo $item['item_id'] ?>">Quantity:</label>
            <input type="number" id="quantity-<?php echo $item['item_id'] ?>" name="quantity" min="1" max="5">
          </div>
          <div class="col-sm-3">
            <label for="deadline-<?php echo $item['item_id'] ?>">Deadline:</label>
            <input type="date" id="deadline-<?php echo $item['item_id'] ?>" name="deadline">
          </div>
          <div class="col-sm-3">
            <input type="submit" value="Add to cart">
          </div>
        </div>
      </form>
  <?php } }?>
</div>

<script>
     $(function () {

       $('form').on('submit', function (e) {
         e.preventDefault();
         $.ajax({
           type: 'post',
           url: 'additem.php',
           data: $(this).serialize(),
           success: function (data) {
             if(data){
              alert('Item has been added to the cart.');
              }

           }
         });

       });

     });
   </script>




<?php
function get_items_from_group_id($group_id){
    $sql = "SELECT * FROM  items  WHERE group_id =".$group_id;
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
