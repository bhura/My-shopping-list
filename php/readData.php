<?php
  include('connection.php');
   $category = "";
   $display = '<ul>';
   $status = " ";
  $query = "SELECT * FROM shoppingList order by category";
  $result = mysqli_query($link, $query);

  while($row = mysqli_fetch_assoc($result)){
    //$display = $row['category'].'<br>';

    if($category != $row['category']){
      $display .= '</ul> <h3 class="category">'.$row['category'].'</h3>
      <ul class="item-list">';
    }

    if($row['status'] == '1'){
      $status = 'checked';
    }
    $display .=  '<li  class="'.$status.'">'.$row['item'].'<span class="quantity">'.$row['amount'].'</span><input type="checkbox" '.$status.' id ="'.$row['id'].'" class="item-status checked " value="1"></li>';
    $category = $row['category'];
    $status = '';

  }
  echo $display;

?>
