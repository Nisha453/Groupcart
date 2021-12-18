<?php
require_once('dbconnection.php');?>

<?php

$items = get_items_from_group_id($_GET['group_id']);
if($items){
  while ($item = $items->fetch_assoc()) {// print_r($item);?>
    <div class="row">
      <div class="col-sm-4">
        <input type="checkbox" id="checkbox-<?php echo $item['item_id'] ?>" name="<?php echo $item['name'] ?>" value="<?php echo $item['item_id'] ?>">
        <label for="checkbox-<?php echo $item['item_id'] ?>"> <?php echo $item['name'] ?></label>
      </div>
      <div class="col-sm-4">
        <label for="quantity-<?php echo $item['item_id'] ?>">Quantity:</label>
        <input type="number" id="quantity-<?php echo $item['item_id'] ?>" name="quantity" min="1" max="5">
      </div>
      <div class="col-sm-4">
        <label for="deadline-<?php echo $item['item_id'] ?>">Deadline:</label>
        <input type="date" id="deadline-<?php echo $item['item_id'] ?>" name="deadline">
      </div>
<?php } }?>






<?php
function get_items_from_group_id($group_id){
    $sql = "SELECT * FROM user_to_item AS u LEFT JOIN items AS i on u.item_id = i.item_id WHERE u.group_id =".$group_id;
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
