<?php 
include_once "headers.php";
if (isset($_SESSION['vUSER']) && $testA=TRUE) {
  header("Location:settings.php");
            echo"<script type='text/javascript'>
           window.location.href = 'settings.php';
           </script> ";}
	?>
  <body>
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
      <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span><b>Sign Up</b></a></li>
      <li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span><b> Login</b></a></li>
    </ul>
  </div>

  </header>
<!-- header end -->

<!-- section -->
  <section>
    <div class="row" style="width: 99%;">
      
    	 <div class="col-sm-1 hidden-xs" style="left: 1%;">
        add device<br>settings<br>log out<br></div>

    <br>

  <span class='POSTs' >
   <br>
   <form class="col-sm-4 col-xs-12 col-sm-offset-4" method="post" action="forgotpass.php" >
  <legend>RESETTING PASSWORD</legend>
  <fieldset><br>
        <div class="form-group">
               <input name="Email" type="email" class="form-control" placeholder="enter your email" required="required">
        </div>
        <div class="form-group">
               <input type='submit' name='save' value='Send' class="form-group"/>
        </div>
  </fieldset>
   </form>
</div>
  </span>

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

  if (isset($_POST['save'])) {
    $Email=sanitizeString($_POST['Email']);
    $texttd = "check your emails, a password recovery link was sent to"." ".$Email;
    toast($texttd);
  }
?>