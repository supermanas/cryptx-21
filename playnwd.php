<?php
  session_start();
  
  include("db.php");
  include("h_function.php");
  
  if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
  }
  
  $id = $_SESSION['user_id'];
  
  $query = "select * from hunt where user_id = '$id' ";
  $result = mysqli_query($conn,$query);
  
  $row = mysqli_fetch_assoc($result); 
  
  if(check_ban($id, $conn)){
    header("Location: ../mag/ban.php");
  }

  $level = "Location: L" . $row['level'];
  header($level);
?>