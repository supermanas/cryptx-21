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
  
  if($level[0] != 41){
    header("Location: ../play.php");
  }
 if(check_ban($id,$conn)){
    header("Location: ../ban.php");
  }

  if(isset($_POST['answer'])){
    $answer = $conn -> real_escape_string($_POST['answer']);

    date_default_timezone_set('Asia/Kolkata');
    $time = date(" Y/m/d H:i:s",time());
    make_log($level[1],$answer,41,$time);

    if($answer == "c4"){
      level_up($id,43,$conn);
      level_up($id,43,$conn);      
      header("Location: ../playard.php");
    } elseif($answer == "42"){
      level_up($id,42,$conn);
      header("Location: ../playnwd.php");
    }else{
      $rekt = 1;
    }

  }

?>

<!DOCTYPE html>

<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<link rel="icon" type="image/png" href="http://createchclub.xyz/wp-content/uploads/2019/02/cog@2x.png">
    <title>De-CryptX | Level - death</title>
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
   
         <!---  death   --->

        <form name = "main" action = "index.php" method = "post" class="login-email" id = "ans_form">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">level-41</p>
          
  <p> <img src="mirchi.jfif" alt="mirchi" class="center" width="200" height="200">
</p>
            <div class="input-group">
				 <input type="text" name="answer" style="color:white;font-size: 2rem;font-weight: 800;" placeholder="ANSWER" id = "answer">
			</div>
			<div class="input-group">
				<div name="but" class="btn" id = "but">Submit</div>
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
<script type="text/javascript">

    var yourformelement = document.getElementById("ans_form");
    var submitBtn = document.getElementById("but");
    var ans = document.getElementById("answer");

    function check() {

      const params = "ans=" + ans.value;

      var xhttp = new XMLHttpRequest();
      var url = "ans_check.php";
      xhttp.open("POST", url, true);

      xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              if (xhttp.responseText == "1") {
                if (confirm("Your actions could have disastrous consequences. Are you sure you want to continue?")) {
                  yourformelement.submit();
                }
              }
              else if (xhttp.responseText == "0"){
                yourformelement.submit();
              }
          }
      };
      xhttp.send(params);
    }

    submitBtn.addEventListener("click", check);

    ans.addEventListener("keypress", (e)=> {
        if (e.keyCode === 13) {
          e.preventDefault();
          check();
        }
      });

</script>  
</body>
</html>
