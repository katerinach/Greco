<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./stylesheets/styleForFullList.css">
    <title>GReco | Όλα τα Event</title>
    <link rel='icon' href='./images/favicon.png' type='image/x-icon'/ >
    <script src="./js/FullList.js"></script>
  </head>
<script>
  function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>
  <a href="homepage.php"><img src="./images/grecogreen.png" class="logo"></a>


  <!-- RESPONSIVE NAVIGATION MENU -->

 <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="topnavmobile" style="display: none;">
  <div class="bar">
     <form action="search.php" method="POST">
   <input style="float: right;"type="text" placeholder="Αναζήτηση..."  name="search"></input>
 </form>
  </div>
  <!-- Navigation links (hidden by default) -->
  <div id="myLinks">
           <a href="homepage.php">Αρχική</a>
        <a href="about.php">Σχετικά με εμάς</a>
        <a href="contactform.php">Επικοινωνία</a>
        <a href="EventsFullList.php">Όλα τα Event</a>
        <a href="Forum.php" target="_blank">Forum</a>
        <a href="EventCreation.php">Δημιουργία Event</a>
        <?php
      session_start();

      if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
      {
      echo '<a href="login.php">Σύνδεση</a>';
      }
      else
      {
      echo '<a href="profile.php?UserID=' . $_SESSION["ID"] . '" >Λογαριασμός</a>';
      echo '<a href="logout.php">Αποσύνδεση</a>';
      }
      ?>
  </div>

  <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<!-- -------------------- -->
  
  <div class="topnav">
        <a href="homepage.php">Αρχική</a>
      <a href="about.php">Σχετικά με εμάς</a>
        <a href="contactform.php">Επικοινωνία</a>
        <a href="EventsFullList.php">Όλα τα Event</a>
        <a href="Forum.php" target="_blank">Forum</a>
        <form action="search.php" method="POST">
      <input type="text" placeholder="Αναζήτηση..." name="search">
      </form> 
        <?php

      if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
      {
      echo '<a href="login.php" id="login">Σύνδεση</a>';
      }
      else
      {
      echo '<a href="profile.php?UserID=' . $_SESSION["ID"] . '" id="icon"><img class="avatar" src="./images/profileicon.jpg" /></a>';
      echo '<a href="logout.php" id="login">Αποσύνδεση</a>';
      }
      ?>
        <a href="EventCreation.php" id="create">Δημιουργία Event</a>
     </div>

<body>

<div id="myBtnContainer">
  <button class="btn highlight" onclick="filterSelection('all')"> Εμφάνιση Όλων</button> 
  <button class="btn" onclick="filterSelection('climate action')">Climate Action</button>
  <button class="btn" onclick="filterSelection('life below water')">Life Below Water</button>
  <button class="btn" onclick="filterSelection('life on land')">Life on Land</button>
</div>

    <?php 
	      include("config.php");
        $total_pages_sql = "SELECT COUNT(*) FROM event";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];


        echo '<div class="events" style="grid-template-rows: repeat('; 
        echo ceil($total_rows / 5); 
        echo', 250px)">'; 
         
    ?>


  <?php

    $sql = "SELECT event.ID, event.UserID, event.SDG,event.Τύπος ,event.Τίτλος, event.Περιγραφή, event.Ημερομηνία,event.Τοποθεσία FROM event ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()){

              echo '<div class="event filterDiv ';
              echo $row["SDG"];
              echo '"><a href="eventpage.php?eventID=' . $row["ID"] . '"><img src="./images/';
              echo $row["Τύπος"];
              echo '.jpg" /></a><img id="time" src="./images/time.png"/><p class="mins">';
              echo $row["Ημερομηνία"];
              echo '</p><h2><a href="eventpage.php?eventID=' . $row["ID"] . '">';
              echo $row["Τίτλος"];
              echo ' - ';
              echo $row["Τοποθεσία"];
              echo '</h2></a></div>';   
                
            } 

    }

 
        ?>

        </div>



<script src="./js/FullList.js"></script>

</body>

<footer class="footer-distributed">
 
      <div class="footer-left">
          
        <h3>About <span>GReco</span></h3>
 
        <p class="footer-links">
          <a href="homepage.php">Home</a>
          |
          <a href="about.html">Σχετικά με εμάς</a>
          |
          <a href="contactform.html">Επικοινωνία</a>
        </p>
 
        <p class="footer-company-name">© 2019 GReco Team.</p>
      </div>
 
      <div class="footer-center">
        <div>
            <p><span>Αριστοτέλειο Πανεπιστήμιο Θεσσαλονίκης, Ελλάδα</p>
        </div>
 
        <div>
          <p>+30 000 0000 0</p>
        </div>
        <div>
          <i class="footer-links"></i>
          <p>support@greco.com</p>
        </div>
      </div>
      <div class="footer-right">
        <div class="footer-icons">
         <a href="https://el-gr.facebook.com/"><img src="./images/fb.png"></a>
          <a href="https://twitter.com/explore"><img src="./images/tw.png"></a>
          <a href="https://www.instagram.com/?hl=el"><img src="./images/insta.png"></a>
          <a href="https://www.linkedin.com/"><img src="./images/lnk.png"></a>
          <a href="https://www.youtube.com/?hl=el&gl=GR"><img src="./images/yt.png"></a>
        </div>
      </div>
    </footer>


</body>
</html>