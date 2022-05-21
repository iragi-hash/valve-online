<?php 
include_once "headers.php";

$sql = "SELECT Acode FROM iDents";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		if ($pass==$row["Acode"]) {
			$testA=TRUE;
			break;
        }

		 else {

      ?>
            <body>
             <div id="snackbar" style="background-color: lightgreen; color: red;">u r not allowed to access this page</div>
             <script type="text/javascript">

              function myFunction() {
                // var x = document.getElementsByClassName('snackbar')[0];
                var x = document.getElementById("snackbar");
                x.className = "show";
                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                                }
             myFunction()
           </script>
            </body>
            <?php

			header("Location:login.php");
		    echo"<script type='text/javascript'>
		       window.location.href = 'login.php';
		       </script> ";

		 	$testA=FALSE;
		 	break;
		}
		
	}
}

 else {
	header("Location:login.php");
    echo"<script type='text/javascript'>
       window.location.href = 'login.php';
       </script> ";

 	echo "oups, no table row found";
 	$testA=FALSE;
}

// the code above checks if it's the admin, he's the only one allowed to this page
// ==============================================================================================
// ==============================================================================================
// here down we checks if he's connected

			if (isset($_SESSION['vUSER']) && $testA=TRUE) {

	?>
	<body>
<!-- header -->
	<header class="row" style="width: 100%; top: 1%;">
    
		<div class="navbar navbar-default " style="width: 98%; left: 1%; box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);">

	<ul class="nav navbar-nav hidden-xs">
	<li >
		<a class="navbar-brand " href="home.php"><span class="glyphicon glyphicon-home" style="left: 1%;"></span></a>
	</li>
	<li class="active"> <a class=" hidden-xs " href="#">Cpanel</a> </li>    
	<li> <a class=" hidden-xs " href="#">Contact</a> </li>    
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
       $sql = "SELECT profilesImg FROM idents WHERE Acode='$pass'";
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
	     <a href="managstdt.php"><div class="col-xs-12 col-sm-2 col-sm-offset-2">manage students<br><br><br><br><br><br><br><br></div></a>
	     <a href="managpst.php"><div class="col-xs-12 col-sm-2 col-sm-offset-1">manage Valve informations<br><br><br><br><br><br><br><br></div></a> 
	     <div class="col-xs-12 col-sm-2 col-sm-offset-1">other dynamic content <br><br><br><br><br><br><br><br></div>
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

			 else {
				header("Location:login.php");
		        echo"<script type='text/javascript'>
		       window.location.href = 'login.php';
		       </script> ";
			 	echo "u r not connected";
			}
			
?>