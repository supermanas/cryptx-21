<?php

  include("db.php");
  session_start();
    
  function level_up($id, $level, $conn){
    
    date_default_timezone_set('Asia/Kolkata');
    $time = date(" Y/m/d H:i:s",time());
    
    $upd1 = "update hunt set level = level + 1 where user_id = '$id' ";
    
    $upd3 = "update hunt set time = '$time' where user_id = '$id' " ;
    
    $q1 = mysqli_query($conn,$upd1);
    $q2 = mysqli_query($conn,$upd2);
    $q3 = mysqli_query($conn,$upd3);

  }
  
  function check_ban($conn, $user_id){
    $l = "select ban from ban where user_id = '$id' " ;
    $q = mysqli_query($conn, $l);

    if ($q) {
      if ($q->num_rows > 0) {
        $r = mysqli_fetch_row($q);
        return $r[0];
      }
    }
    return 0;
  }


  function make_log($id, $answer, $level, $time){
    $name = "../mag/logs.txt";
    $file = fopen($name,"a+");
    $str = "Users -> ".$id." Answer -> ".$answer." Level -> ".$level." Time -> ".$time."\n";
    fwrite($file,$str);
  }
  
  function load_logs(){
    $name = "/mag/logs.txt";
    $file = fopen($name,"r");
    echo "<hr>";
    while(!feof($file)){
      echo fgets($file) . "<hr><br>";
    }
  }

?>
