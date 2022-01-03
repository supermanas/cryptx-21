<?php
  session_start();
  
  include("../db.php");
  include("../h_function.php");
  
  if(!$_SESSION['adlog']){
    echo "
      <h1>Admin Login</h1>
      <form name = 'lol' method = 'post' action = 'rokxstar.php'>
        Username: <input type = 'text' name = 'us'> <br><br>
        Password: <input type = 'text' name = 'pas'> <br><br>
        <input type = 'submit' name = 'but' value = 'Login'><br><br>
      </form>
      <br>
      PS - Direct ban if credentials are wrong
    ";
  }else{
    echo "
      <h1>Ban</h1>
      <form name = 'baner' method = 'post' action = 'rokxstar.php'>
        Enter User: <input type = 'text' name = 'bus'> 
        <input type = 'submit' name = 'bbut' value = 'ban'>
      </form>
      <h1>Logs</h1>
    ";
    load_logs();
  }
  
  if(isset($_POST['but'])){
    if($_POST['us'] == "coddedplus" && $_POST['pas'] == "netflixindia"){
      $_SESSION['adlog']=1;
      header("Location: logs.txt");
      
    }else{
      header("Location: ban.php");
    }
  }
  
?>