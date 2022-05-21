<?php
include_once 'headers.php';

?>

<head>    
 	
 </head>  
 <body>
 	
<!-- header -->
	<header class="row" style="width: 100%; top: 1%;">
    
		<div class="navbar navbar-default " style="width: 98%; left: 1%; box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);">

	<ul class="nav navbar-nav hidden-xs">
	<li >
		<a class="navbar-brand navbar-right"  href="home.php"><span class="glyphicon glyphicon-home"></span></a>
	</li>
	<li> <a class=" hidden-xs " href="#">About us</a> </li>    
	<li> <a class=" hidden-xs " href="#">Contact</a> </li>    
	</ul>

<ul class="nav navbar-nav navbar-right visible-xs" style="right: 5%;">
  <li>
    <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-bullhorn "></span></a>
  </li>
</ul>

	<ul class="nav navbar-nav navbar-right hidden-xs" style="padding-right: 5%; text-align: right;">
      <li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span><b>Sign Up</b></a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span><b> Login</b></a></li>
    </ul>
	</div>

	</header>
<!-- header end --> 

<!-- section -->
	<section>
		<div class="row" style="width: 99%;">  
	     <div class="col-sm-1 hidden-xs" style="left: 1%;">brands, our adds, links..<br><br><br><br></div>
	     <div class="col-xs-12 col-sm-10 col-sm-offset-1">

        <form class="col-sm-6 col-xs-12" method="post" action="signu.php">
          <legend>Sign Up/Admin</legend>
          <fieldset id="tl">
            <div class="form-group">
               <input name="uname" type="text" class="form-control" placeholder="insert your username" required="required">
            </div>
            <div class="form-group">
               <input name="upass" type="password" class="form-control" placeholder="insert your password" required="required">
            </div>
            <div class="form-group">
               <input name="confirmp" type="password" class="form-control" placeholder="confirm your password" required="required">
            </div>
            <div class="form-group">
               <input name="dcode" type="text" class="form-control" placeholder="manufcturer code/ID" required="required">
            </div>
            <div class="form-group">
               <input name="ncode" type="text" class="form-control" placeholder="new code/ID" required="required">
            </div>
            <div class="form-group">
               <input name="email" type="text" class="form-control" placeholder="insert your email" required="required">
            </div>
            <div class="form-group">
               <input type='submit' name='save' value='send' class="form-group"/>
            </div>
          </fieldset>
        </form>

        <br>
        <div class="col-sm-4 col-xs-12 col-sm-offset-1" style="background-color: lightgreen;">
         <br><br><br><br><br><br>
        </div>

        <br><br><br><br><br><br><br><br>
      </div>
    </div>
<br>
	</section>
        <br>
       <!-- section end -->

<!-- footer -->
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
          <a href="Login.php">My Account</a>
          <a href="#">Newsletter</a>
          <a href="#">Returns</a>
        </div>
        <div class="footer-center">
          <h3>CONTACT US</h3>
          <div>

            <span>
              <i class="glyphicon glyphicon-map-marker-alt"></i>
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
              <i class="glyphicon glyphicon-paper-plane"></i>
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

<?php

if(isset($_POST['save'])){
		 $user = sanitizeString($_POST['uname']);    
		 $pass = sanitizeString($_POST['upass']);
		 $confirmp = sanitizeString($_POST['confirmp']);    
		 $mail = sanitizeString($_POST['email']);    
		 $dcode = sanitizeString($_POST['dcode']);
		 $ncode = sanitizeString($_POST['ncode']);

		 if ($pass!=$confirmp) {
		 	echo " not same password";
		 	# code...
		 }
		 else if ($dcode!='9090'){
		 	echo " not default ID";
		 }

		 else if ($dcode=='9090' && $pass==$confirmp){
		 	$sql = "INSERT INTO iDents (usernames,passwords) VALUES ('$user', '$pass')";
            if ($conn->query($sql) === TRUE) { echo "New record created successfully"; } else { echo "Error: " . $sql . "<br>" . $conn->error; }

            $sql = "INSERT INTO iDs (Acode) VALUES ('$ncode')";
            if ($conn->query($sql) === TRUE) { echo "New record created successfully"; } else { echo "Error: " . $sql . "<br>" . $conn->error; }

            $sql = "INSERT INTO Emails (AEmails) VALUES ('$mail')";
            if ($conn->query($sql) === TRUE) { echo "New record created successfully"; } else { echo "Error: " . $sql . "<br>" . $conn->error; }

            $sql = "INSERT INTO Emails (AEmails) VALUES ('$mail')";
            if ($conn->query($sql) === TRUE) { echo "New record created successfully"; } else { echo "Error: " . $sql . "<br>" . $conn->error; }

         unlink('signu.php');
         header("Location:login.php");
	     echo"<script type='text/javascript'>
	           window.location.href = 'login.php';
	           </script> ";
         
		 }
		 
}

?>