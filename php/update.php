<?php
  include('connection.php');
  if(isset($_POST['IDs'])){
    $ids = $_POST['IDs'];
    $status = $_POST['status'];
  //  echo sizeof($ids);

      $query = "UPDATE shoppingList SET status = '$status' WHERE id = '$ids'";
      if(mysqli_query($link, $query)){
        echo 'success';
      }

  }

?>
