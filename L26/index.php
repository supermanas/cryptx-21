<?php

  include("../db.php");

  include("../h_function.php");

 

  $rekt = 0;

  if(!isset($_SESSION['user_id'])){
      header("../index.php");
  }


  $id = $_SESSION['user_id'];

  $q = "select level,user from hunt where user_id = '$id' ";
  $qe = mysqli_query($conn,$q);
  $level = mysqli_fetch_row($qe);
  
  if($level[0] != 26){
    header("Location: ../play.php");
  }
 if(check_ban($id,$db)){
    header("Location: ../ban.php");
  }

  if(isset($_POST['but'])){
    $answer = $conn -> real_escape_string($_POST['answer']);

    date_default_timezone_set('Asia/Kolkata');
    $time = date(" Y/m/d H:i:s",time());
    make_log($level[1],$answer,26,$time);

    if($answer == "benaffleck"){
      level_up($id,26,$conn);
      header("Location: ../play.php");
    }else{
      $rekt = 1;
    }

  }

?>



<!DOCTYPE html>

<html>
  <head>
      <link rel="icon" type="image/png" href="http://createchclub.xyz/wp-content/uploads/2019/02/cog@2x.png">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>

    <title>De-CryptX | Level - 26</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,600,700,800|Raleway:100,200,300,400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../lstyle.css" rel="stylesheet">
    <script type="text/javascript" src= "https://cdnjs.cloudflare.com/ajax/libs/typed.js/1.1.1/typed.min.js"></script>
     <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
    <script>
$.get("../navbar/nav.php", function(data){
    $("#nav-placeholder").replaceWith(data);
});
</script>
   

    

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
  .bottom-three {
     margin-bottom: 3cm;
  }
</style>
  </head>
  <body>
    <audio autoplay="true" loop="true" src="bg_music.mp3">
	  Update your browser. Your browser does not support HTML audio
	</audio>
  
   <div id="nav-placeholder">

</div>
<section>
    <div class="container" align="center" >
   
        
        <form name = "main" action = "index.php" method = "post" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">level-26</p>
          <p class="bottom-three"style="color:white;font-size: 2rem;font-weight: 800;">
   Multan ka Sultan
</p>
        <!-- nsapA4WNzZM -->
            <div class="input-group">
				 <input type="text" name="answer"  style="color:white;font-size: 2rem;font-weight: 800;" placeholder="ANSWER">
			</div>
			<div class="input-group">
				<button name="but" class="btn">Submit</button>
			</div>
			
		</form>
      <span id = "error"> </span>
      <?php
          if($rekt == 1){
            echo "
            <script>document.getElementById('error').innerHTML = 'wrong';</script>
            ";
          }
        ?>
    </div>
    </section>
    <script src="./script.js"></script>
  </body>
</html>