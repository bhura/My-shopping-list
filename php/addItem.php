<?php
  include('connection.php');
  $userid = 1;
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $itemName = test_input($_POST['itemName']);
    $amount = test_input($_POST['amount'])." ".test_input($_POST['quantity']);
    $category = test_input($_POST['selectCat']);
    $query = "INSERT INTO shoppingList (`item`, `amount`, `category`, `status`, `userId`) VALUES('$itemName', '$amount', '$category','0', '$userid') ";
    if(mysqli_query($link, $query)){
      echo 'success';
    }else{
      echo mysqli_error($link);
    }

  }else{

    echo "error";
  }

 ?>
