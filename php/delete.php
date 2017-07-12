<?php
  include('connection.php');
  if(isset($_POST['IDs'])){
   $ids = array();
    $ids = $_POST['IDs'];
  //  echo sizeof($ids);
    for($i = 0; $i < sizeof($ids); $i++ ){
      $query = "DELETE FROM shoppingList WHERE id = $ids[$i]";
      if(mysqli_query($link, $query)){
        echo 'success';
      }
    }
  }

?>
