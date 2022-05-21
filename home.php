<?php 
include_once "headers.php";
if (isset($_SESSION['vUSER']) || isset($_SESSION['vPASS'])) {


?>

  <body>
<!-- header -->
  <header class="row" style="width: 100%; top: 1%;">
    
    <div class="navbar navbar-default " style="width: 98%; left: 1%; box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);">

  <ul class="nav navbar-nav hidden-xs">
  <li class="active">
    <a class="navbar-brand " href="#"><span class="glyphicon glyphicon-home" style="left: 1%;"></span></a>
  </li>
  <li> <a class=" hidden-xs " href="#">Messages</a> </li>    
  <li> <a class=" hidden-xs " href="#">Notifications</a> </li>    
  </ul>

<ul class="nav navbar-nav navbar-right visible-xs" style="right: 5%; background-color: lightblue;">
  <li>
    <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-menu-hamburger "></span></a>
  </li>
</ul>

  <ul class="nav navbar-nav navbar-right hidden-xs" style="padding-right: 5%; text-align: right;">
      <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span><b>Settings</b></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span><b> Log out</b></a></li>
    </ul>
  </div>

  </header>
<!-- header end -->

<!-- section -->
  <section>
    <div class="row" style="width: 99%;">  
       <div class="col-sm-1 hidden-xs" style="left: 1%;">

        
        <?php
       $sql = "SELECT profilesImg FROM idents WHERE Scode='$pass' OR Acode='$pass'";
       $result = $conn->query($sql);

       if ($result->num_rows > 0) {
       while ($row = $result->fetch_assoc()) {
       if ($row["profilesImg"]==Null) {
      $Test=TRUE;
      break;
       }
       else{
        $Test=FALSE;
        $picspath=$row["profilesImg"];
       }

     }
     if ($Test==TRUE) {
       echo "<span>
              <h2><a href='profile.php'><i class='glyphicon glyphicon-user img-rounded'></i></h2></a>
            </span>";
     }
     else if ($Test==FALSE){
      echo "<h2><a href='profile.php'><img src='$picspath' class='img-rounded' style='display: block;  max-width: 100%;  height: auto;' ></h2></a>";
     }
   }
       ?>

        add device<br>settings<br>log out<br></div>

       
       <a href="#"><div class="col-xs-12 col-sm-2 col-sm-offset-2">

       <?php
       $sql = "SELECT exams FROM Timetables";
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
       while ($row = $result->fetch_assoc()) {
       if ($row["exams"]!=Null) {
      echo "exams timetable <br><iframe src='". $row["exams"]."' style='display: block;  max-width: 100%;  height: 50%;' ></iframe><br>";
    }
  }
}
       ?>
here it's about timetable of exams
        <br></div></a>

       <a href="#"><div class="col-xs-12 col-sm-2 col-sm-offset-1">

       <?php
       $sql = "SELECT courses FROM Timetables";
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
       while ($row = $result->fetch_assoc()) {
       if ($row["courses"]!=Null) {
      echo "courses' timetable <br><iframe src='". $row["courses"]."' style='display: block;  max-width: 100%;  height: 50%;' ></iframe><br>";
    }
  }
}
       ?>
here it's about timetable of courses
       <br></div></a> 
       <div class="col-xs-12 col-sm-2 col-sm-offset-1">

       <?php
       $sql = "SELECT docsNames FROM info";
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
       while ($row = $result->fetch_assoc()) {
       if ($row["docsNames"]!=Null) {
      echo "Here is all other informations <br><iframe src='". $row["docsNames"]."' style='display: block;  max-width: 100%;  height: 50%;' ></iframe><br>";
    }
  }
}
       ?>
       here it's about all other informations
       <br></div>
    </div>

    <br>
    <div class="container">
      <div class="col-lg-12">here POMOTIONS, PUBS AND ADS..
             <!-- <img src="images/favicon.png" class="img-rounded" style="display: block;  max-width: 100%;  height: auto; "> -->  
           </div>
    </div>

  </section>
        <br>
       <!-- section end -->


<footer>
    <div class="container">
      <div class="footer-container">
        
        <div class="footer-center">
          <h3>CONTACT US</h3>
          <div>

            <span>
              <i class="glyphicon glyphicon-map-marker"></i>
            </span>
            42 Dream House, Dreammy street, 7131 Dreamville, BU
          </div>
          <div>
            <span>
              <i class="glyphicon glyphicon-envelope"></i>
            </span>
            projectx@gmail.com
          </div>
          <div>
            <span>
              <i class="glyphicon glyphicon-phone"></i>
            </span>
            +25768743978
          </div>
          <div>
            <span>
              <i class="glyphicon glyphicon-send"></i>
            </span>
            Bujumbura urban, BURUNDI
          </div>
        </div>
      </div>
    </div>
    </div>
  </footer>
  <!-- End Footer -->

<script type='text/javascript'>
  
// Fixed Nav
const navBar = document.querySelector('.navbar');
const navHeight = navBar.getBoundingClientRect().height;
window.addEventListener('scroll', () => {
  const scrollHeight = window.pageYOffset;
  if (scrollHeight > navHeight) {
    navBar.classList.add('navbar-fixed-top');
  }

   else {
    navBar.classList.remove('navbar-fixed-top');
  }
});
</script>

    </body>

  <?php
}

else { //here down what user will see if not connected

	?>
	  <body>
<!-- header -->
	<header class="row" style="width: 100%; top: 1%;">
    
		<div class="navbar navbar-default " style="width: 98%; left: 1%; box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);">

	<ul class="nav navbar-nav hidden-xs">
	<li class="active">
		<a class="navbar-brand navbar-right" class="active" href=""><span class="glyphicon glyphicon-home"></span></a>
	</li>
	<li> <a class=" hidden-xs " href="#">About us</a> </li>    
	<li> <a class=" hidden-xs " href="#">Contact</a> </li>    
	</ul>

<ul class="nav navbar-nav navbar-right visible-xs" style="right: 5%; background-color: green;">
  <li>
    <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-bullhorn "></span></a>
  </li>
</ul>

	<ul class="nav navbar-nav navbar-right hidden-xs" style="padding-right: 5%; text-align: right;">
      <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span><b>Sign Up</b></a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span><b> Login</b></a></li>
    </ul>
	</div>

	</header>
<!-- header end -->

<!-- section -->
	<section>
		<div class="row" style="width: 99%;">  
	     <div class="col-sm-1 hidden-xs" style="left: 1%;">brands, our adds, links..<br><br><br><br></div>
	     <div class="col-xs-12 col-sm-10 col-sm-offset-1">dynamic content for non connect people/users<br><br><br><br><br><br><br><br></div>
    </div>
<br>
        <div class="row" style="width: 99%;">
        	<div class="col-xs-12 col-lg-10 col-lg-offset-2">new content<br><br><br><br></div>
        </div>
	</section>
        <br>
       <!-- section end -->


<footer>
    <div class="container">
      <div class="footer-container">
        <div class="footer-center">
          <h3>EXTRAS</h3>
          <a href="#">Affiliate</a>
          <a href="#">Specials</a>
          <a href="#">Site Map</a>
        </div>
        <div class="footer-center">
          <h3>INFORMATION</h3>
          <a href="#">About Us</a>
          <a href="#">Privacy Policy</a>
          <a href="#">Terms & Conditions</a>
          <a href="#">Contact Us</a>
          <a href="#">Site Map</a>
        </div>
        <div class="footer-center">
          <h3>MY ACCOUNT</h3>
          <a href="login.php">My Account</a>
          <a href="#">Newsletter</a>
          <a href="#">Returns</a>
        </div>
        <div class="footer-center">
          <h3>CONTACT US</h3>
          <div>

            <span>
              <i class="glyphicon glyphicon-map-marker"></i>
            </span>
            42 Dream House, Dreammy street, 7131 Dreamville, BU
          </div>
          <div>
            <span>
              <i class="glyphicon glyphicon-envelope"></i>
            </span>
            projectx@gmail.com
          </div>
          <div>
            <span>
              <i class="glyphicon glyphicon-phone"></i>
            </span>
            +25768743978
          </div>
          <div>
            <span>
              <i class="glyphicon glyphicon-send"></i>
            </span>
            Bujumbura urban, BURUNDI
          </div>
        </div>
      </div>
    </div>
    </div>
  </footer>
  <!-- End Footer -->

<script type='text/javascript'>
  
// Fixed Nav
const navBar = document.querySelector('.navbar');
const navHeight = navBar.getBoundingClientRect().height;
window.addEventListener('scroll', () => {
  const scrollHeight = window.pageYOffset;
  if (scrollHeight > navHeight) {
    navBar.classList.add('navbar-fixed-top');
  } else {
    navBar.classList.remove('navbar-fixed-top');
  }
});
</script>

    </body>
	<?php

}//what user will see if not connected 
?>
