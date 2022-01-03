<?php

  include("../db.php");

  include("../main_function.php");

 

  $rekt = 0;

  if(!isset($_SESSION['user_id'])){
      header("../index.php");
  }


  $id = $_SESSION['user_id'];

  $q = "select level,user from hunt where user_id = '$id' ";
  $qe = mysqli_query($conn,$q);
  $level = mysqli_fetch_row($qe);
  
  if($level[0] != 43){
    header("Location: ../playard.php");
  }
 if(check_ban($id,$conn)){
    header("Location: ../ban.php");
  }

  if(isset($_POST['but'])){
    $answer = $_POST['answer'];

    date_default_timezone_set('Asia/Kolkata');
    $time = date(" Y/m/d H:i:s",time());
    make_log($level[1],$answer,43,$time);

    if($answer == "nullovoidojokarnahaikaromarjaobharmejaao"){
      level_up($id,2,$conn);
      header("Location: ../play.php");
    }else{
      $rekt = 1;
    }

  }

?>

<!DOCTYPE html>

<html>
  <head>

<style>


body {
	background-image: url('victory.jpg');

  background-repeat: no-repeat;
  background-size: cover;
}

</style>


<audio autoplay="true" loop="true" src="Crazy_Frog_-_Axel_F_Official_Video.mp3">
    
	  Update your browser. Your browser does not support HTML audio
	</audio>
	
</html>


