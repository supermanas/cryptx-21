 <?php 
  include("../db.php");

  include("../h_function.php");
$id = $_SESSION['user_id'];

?>


<link rel="stylesheet" href="../navbar/nav.css">

<div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus icon'></i>
        <div class="logo_name">createch</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      
      <li>
        <a href="../play.php">
          <i class='bx bxs-joystick'></i>
          <span class="links_name">Play</span>
        </a>
         <span class="tooltip">Play</span>
      </li>
      <li>
       <a href="../profile">
         <i class='bx bx-user' ></i>
         <span class="links_name">User</span>
       </a>
       <span class="tooltip">User</span>
     </li>
     <li>
       <a href="https://discord.gg/uYFUyDGz7Z">
         <i class='bx bxl-discord'></i>
         <span class="links_name">Messages</span>
       </a>
       <span class="tooltip">Messages</span>
     </li>
     <li>
       <a href="../leaderboard">
         <i class='bx bx-bar-chart-alt-2'></i>
         <span class="links_name">leaderboard</span>
       </a>
       <span class="tooltip">leaderboard</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-folder' ></i>
         <span class="links_name">resource</span>
       </a>
       <span class="tooltip">resource</span>
     </li>
     <li>
      <a href="../logout.php">
         <i class='bx bx-log-out-circle'></i>
         <span class="links_name">logout</span>
       </a>
       <span class="tooltip">logout</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           
           <div class="name_job">
             <div class="name"> <?php echo $_SESSION['user_id']; ?></div>
             <div class="job">participant</div>
           </div>
         </div>
         <i class='bx bx-log-out' id="log_out" ></i>
     </li>
    </ul>
  </div>
<script src="../navbar/script.js"></script>