<?php
	include '../db.php';

	session_start();

	if (!isset($_SESSION['user_id']))
{
    header("Location: ../login.php");
    die();
}
	$id = $_SESSION['user_id'];
	
	$sql = "SELECT user, user_id, school, profile_image, level, score FROM hunt WHERE user_id = '$id'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		$name = $row["user"];
		$user_id = $row["user_id"];
		$school = $row["school"];
		$level = $row["level"];
		$score = $row['score'];
		
		$profile = "http://cryptx.createchclub.xyz/profile/images/".$row['profile_image'];
	}
	} else {

	}
	
	
	$conn->close();
?>







<!DOCTYPE html>
<html lang="en">
<head>

<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"/>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous"/>
<style>
    body {
  background: #F2F2F2;
  font-family: "Ubuntu", sans-serif;
}

.profile-card-1 {
  width: 300px;
  height: 390px;
  background: white;
  margin: 0 auto;
  border-radius: 10px;
  text-align: center;
  box-shadow: 4px 4px 10px #999;
  position: relative;
  box-sizing: border-box;
  overflow: hidden;
}
.profile-card-1 .view-more {
  position: absolute;
  top: calc(50% - .5em);
  left: calc(50% - .5em);
  z-index: 2;
  color: #2ECC71;
  font-size: 2em;
}
.profile-card-1 .view-more .fa-plus-circle {
  position: absolute;
  background: white;
  border-radius: 50%;
  width: 1.004em;
}
.profile-card-1 .view-more .fa-plus-circle:hover {
  background: #2ECC71;
  color: white;
}
.profile-card-1 .popup {
     margin-top: 3cm;
  
  height: 500px;
  width: 500px;
  display: block;
  position: absolute;
  top: 0;
  left: 0;
}
.profile-card-1 .mid-section {
  position: absolute;
  height: 200px;
  width: 100%;
  top: 200px;
  left: 0;
  padding: 10px 20px 0;
  box-sizing: border-box;
  background: white;
}
.profile-card-1 .mid-section .name {
  color: #333333;
  font-size: 1.4em;
  padding-top: 5px;
  background: rgba(255, 255, 255, 0.1);
  font-weight: bold;
}
.profile-card-1 .mid-section .description {
  color: gray;
  font-size: 0.9em;
  padding-bottom: 5px;
  background: rgba(255, 255, 255, 0.1);
}
.profile-card-1 .mid-section .description a {
  color: inherit;
  text-decoration: none;
  font-weight: bold;
}
.profile-card-1 .mid-section .line {
  background: #7ee2a8;
  width: 80%;
  height: 2px;
  margin: 5px auto -3px;
}
.profile-card-1 .mid-section .stats {
  display: flex;
  position: absolute;
  left: 10%;
  padding-top: 10px;
  width: 80%;
  justify-content: space-around;
}
.profile-card-1 .mid-section .stats .stat {
  font-size: 1.3em;
  color: #333333;
  padding: 5px;
  font-weight: bold;
}
.profile-card-1 .mid-section .stats .subtext {
  color: gray;
  font-size: 0.6em;
  font-weight: normal;
}
.profile-card-1 .img {
  height: 130px;
  width: 100%;
  background-image: linear-gradient(rgba(46, 204, 113, 0.4), rgba(46, 204, 113, 0.95)), url("https://image.shutterstock.com/image-vector/high-tech-technology-geometric-connection-260nw-1499204828.jpg");
  padding: 20px;
  box-sizing: border-box;
  position: relative;
}

.profile-card-1 .img img {
  width: 160px;
  height: 160px;
  padding: 3px;
  border-radius: 50%;
  border: 3px solid rgba(255, 255, 255, 0.6);
  position: absolute;
  left: calc(50% - 84px);
  top: 26px;
}
.profile-card-1 .img:after {
  content: "";
  position: absolute;
  width: 180px;
  height: 180px;
  border-radius: 50%;
  left: calc(50% - 91.5px);
  top: 20px;
  border: 3px solid rgba(255, 255, 255, 0.4);
}
.profile-card-1 .img:before {
  content: "";
  position: absolute;
  width: 190px;
  height: 190px;
  border-radius: 50%;
  left: calc(50% - 95px);
  top: 15.5px;
  border: 2px solid rgba(255, 255, 255, 0.2);
}
.profile-card-1 .links {
  width: 100%;
  height: 50px;
  background: #F2F2F2;
  border-top: 1px solid #44d581;
  margin-top: 35px;
  border-radius: 5px;
  color: white;
  font-size: 2em;
  line-height: 1.5em;
  position: absolute;
  bottom: 0;
}
.profile-card-1 .links a {
  color: white;
}
.profile-card-1 .links .fb {
  position: absolute;
  left: 0;
  width: 25%;
  height: 100%;
  background-color: #3b5998;
}
.profile-card-1 .links .fb:hover {
  background-color: #4264aa;
}
.profile-card-1 .links .twitter {
  position: absolute;
  left: 25%;
  width: 25%;
  height: 100%;
  background-color: #55ACEE;
}
.profile-card-1 .links .twitter:hover {
  background-color: #6cb7f0;
}
.profile-card-1 .links .follow {
  position: absolute;
  left: 50%;
  width: 50%;
  height: 100%;
  background-color: #2ECC71;
}
.profile-card-1 .links .follow:hover {
  background-color: #40d47e;
}

.profile-card-2 {
  width: 250px;
  height: 500px;
  background: #2ECC71;
}

</style>
</head><body>
<div class="profile-card-1">
    
 <div class="img"><img src="https://t3.ftcdn.net/jpg/03/91/19/22/360_F_391192211_2w5pQpFV1aozYQhcIw3FqA35vuTxJKrB.jpg"/></div><a class="view-more" href="leaderboard"><i class="fa fa-plus-circle" aria-hidden="true"></i>
    <div class="popup"></div></a>
  <div class="mid-section">
    <div class="name"><?php echo $name; ?></div>
    <div class="description"><?php echo $school; ?> </div>
    <div class="line"></div>
    <div class="stats">
      <div class="stat"><?php echo $level; ?>
        <div class="subtext">Level</div>
      </div>
      <div class="stat"><?php echo $score; ?>
        <div class="subtext">Points</div>
      </div>
      <div class="stat"><?php echo $time; ?>
        <div class="subtext">last solved</div>
      </div>
    </div>
  </div>

</div>

</body>
</html>




