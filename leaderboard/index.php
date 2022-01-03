<?php
  include("../db.php");
include("../h_function.php");
 
if(!isset($_SESSION['user_id'])){
		header("../index.php");
	}

	$id = $conn->escape_string($_SESSION['user_id']);
	
	$sql = "SELECT user, user_id, time, level, score FROM hunt WHERE user_id = '$id'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		$name = $row["user"];
		$user_id = $row["user_id"];
		$level = $row["level"];
		$score = $row['score'];
		$time = $row['time'];
	}
	} else {

	}


  $q = "select * from hunt order by score DESC, time ASC";
  $res = mysqli_query($conn,$q);


?>


<!DOCTYPE html >
<html translate="no">
<head>
    <meta name="google" content="notranslate">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <link rel="icon" href="logo-black.png">
    <title>De-CryptX | Leaderboard</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,600,700,800|Raleway:100,200,300,400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="ld.css" rel="stylesheet">
  <link href="leaderstyles.css" rel="stylesheet">
    
    <script type="text/javascript" src= "https://cdnjs.cloudflare.com/ajax/libs/typed.js/1.1.1/typed.min.js"></script>
      <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
   
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script>
$.get("../navbar/nav.php", function(data){
    $("#nav-placeholder").replaceWith(data);
});
</script>
</head>
<body>
  <div id="nav-placeholder">

</div>
<section>

<div class="l-wrapper">
   
  <div class="c-header"><img class="c-logo"  draggable="false"/>
  <button class="c-button c-button--primary" onclick="location.href = '/play.php';" >Play</button>
  </div>
  
  
  <div class="l-grid">
    <div class="l-grid__item l-grid__item--sticky">
      <div class="c-card u-bg--light-gradient u-text--dark">
        <div class="c-card__body">
          <div class="u-display--flex u-justify--space-between">
            <div class="u-text--left">
            <b>name: <?php echo $name; ?></b>


            </div>
          </div>
        </div>
      </div>
      <div class="c-card">
        <div class="c-card__body">
           <br> <b>Level: <?php echo $level; ?></b></br>
            <br><b>Score: <?php echo $score; ?></b></br>
           <br> <b>last level solved: <?php echo $time; ?></b></br>
          <div class="u-text--center" id="winner"></div>
        </div>
      </div>
    </div>
    <div class="l-grid__item">
      <div class="c-card">
        <div class="c-card__header">
          <h3>Leaderboard</h3>
          <select class="c-select">
            <option selected="selected">Sunday, sept 12 - monday, sept. 13</option>
          </select>
        </div>
        <div class="c-card__body">
          <ul class="c-list" id="list">
            <li class="c-list__item">
              <div class="c-list__grid">
                 
                
                  
               <div class="leaderboard" align="center">
                   
      <div class="table" align="center">
        <table class="table-fill">
                 <thead>
            <tr>
              <th class = "text-heading">#</th>
              <th class="text-heading">Username</th>
              <th class="text-heading">Level</th>
               <th class="text-heading"></th>
              <th class="text-heading">Score</th>
              <th class="text-heading"></th>
              <th class="text-heading">Time</th>
            </tr>
          </thead>
         
          <tbody class="table-hover">
            <?php
              $i=1;
              while($row = mysqli_fetch_assoc($res)){
                $us = $conn->escape_string($row['user_id']);
                $lv = $conn->escape_string($row['level']);
                $sc = $conn->escape_string($row['score']);
                $tm = $conn->escape_string($row['time']);
                
                echo "<tr>";
                if($us == "rdp"){
                  echo "
                    <td class = 'text-left'>$i</td>
                    <td class = 'text-left'>$us</td>
                    <td class = 'text-left'>6900</td>
                    <td class = 'text-left'>2069-6-9 42:42:42</td>
                  ";
                }else{
                  if($sc > 0){
                    echo "
                      <td class = 'text-left'>$i</td>
                      <td class = 'text-left'>$us</td>
                      <td class = 'text-left'>$lv</td>
                      <td class = 'text-left'></td>
                      <td class = 'text-left'>$sc</td>
                      <td class = 'text-left'></td>
                      <td class = 'text-left'>$tm</td>
                    ";
                  }else{
                    echo "
                      <td class = 'text-left'>$i</td>
                      <td class = 'text-left'>$us</td>
                      <td class = 'text-left'>$lv</td>
                      <td class = 'text-left'></td>
                      <td class = 'text-left'>$sc</td>
                      <td class = 'text-left'></td>
                      <td class = 'text-left'>$tm</td>
                    "; 
                  }
                }
                echo "</tr>";
                $i++;
              }
            ?> 
          </tbody>
        </table>
      </div>
    </div>
      </div>
    </div>
  </div>
</div>
  <script src="./script.js"></script>

</body>
</html>
