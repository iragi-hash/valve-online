<?php
include 'headers.php';
if (isset($_SESSION['vUSER'])) destroySession();
// include_once "headers.php";
$sql = "SELECT Acode FROM iDents";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                  if ($pass==$row["Acode"] && $row["Acode"]!=NULL) {//here it will compare IDs in order to desconnect the admin, if he's the one
                  //cfr last code in functions.php
                 
                 $sql = "UPDATE tmpA SET unicAccnt='0' WHERE 1 ";
                 if ($conn->query($sql) === TRUE) {break;} else { echo "Error: " . $sql . "<br>" . $conn->error; }
                    } 
                  } 
                }
                else if ($result->num_rows == 0) {
                  header("Location:signu.php");
                      echo"<script type='text/javascript'>
                           window.location.href = 'signu.php';
                           </script> ";
                }

?>
 <head>    
 	  <link rel='stylesheet' href='bootstrap/jquery-3.5.1.js' type='text/css' />
 </head>  
 <body>
 	
<!-- header -->
	<header class="row" style="width: 100%; top: 1%;">
    
		<div class="navbar navbar-default " style=" width: 98%; left: 1%; box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);">

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
      <li class="active"><a href="#"><span class="glyphicon glyphicon-log-in"></span><b> Login</b></a></li>
    </ul>
	</div>

	</header>
<!-- header end --> 

<!-- section -->
	<section>
		<div class="row" style="width: 99%;">  
	     <div class="col-sm-1 hidden-xs" style="left: 1%;">brands, our adds, links..<br><br><br><br></div>
	     <div class="col-xs-12 col-sm-10 col-sm-offset-1">

        <form class="col-sm-6 col-xs-12" method='post' action='login.php'>
          <legend>Login</legend>
          <fieldset>
            <div class="form-group">
               <input name="uname" type="text" class="form-control" placeholder="insert your username" required="required" autocomplete='off'>
            </div>
            <div class="form-group">
               <input name="upass" type="password" class="form-control" placeholder="insert your password" required="required">
            </div>
            <div class="form-group">
               <input name="ncode" type="text" class="form-control" placeholder="code/ID" required="required" autocomplete='off'>
            </div>
            <select name="dprtm" class="form-group">
              <option value="BIT">BIT</option>
              <option value="BBA">BBA</option>
            </select>
            <div class="form-group">
               <input type='submit' name='save' value='send' class="form-group"/>
            </div>
            <label><a href="forgotpass.php">forgot password?</a></label><br>
            <label>you don't have an account? <a href="signup.php"> sign up</a></label>         
          </fieldset>
        </form>

        <br>
        <div class="col-sm-4 col-xs-12 col-sm-offset-1 " style="background-color: lightgreen;">
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

<?php

if (isset($_POST['save'])) {
  
     $user = sanitizeString($_POST['uname']);    
     $pass = sanitizeString($_POST['upass']);
     $ncod  = sanitizeString($_POST['ncode']);
     $dprtm = sanitizeString($_POST['dprtm']);
     $ncode = $dprtm.$ncod;

     $sql = "SELECT usernames,passwords FROM iDents";
     $result = $conn->query($sql);

     if ($result->num_rows > 0) {
       while ($row = $result->fetch_assoc()) {

         if ($user==$row["usernames"] && $pass==$row["passwords"]) {
           $testC=TRUE;
           break;
         }
          else {
              //the idents are just incorrect but there is something within the rows..
              $testC=FALSE;
         }
        
       }

       if ($testC==TRUE) {
         $sql = "SELECT Acode,Scode FROM iDents WHERE usernames='$user'";
         $result = $conn->query($sql);

         if ($result->num_rows > 0) {


           while ($row = $result->fetch_assoc()) {
             
             if ($ncod==$row["Acode"] && $row["Acode"]!=NULL) {
                  //here it will check the admin's ID without adding the departmt($ncod)
                  $testD=TRUE;
                  break;
             }
             else if($ncode==$row["Scode"] && $row["Scode"]!=NULL){
                //here it checks the studts' ID, where the dprtmt(variable) is yet added($ncode)
                   $typet=TRUE;
                   break;
             }
             else{
                    $testD=FALSE;
                    $typet=FALSE;
                    //the ID is just incorrect but there is something within the ID rows..
             }

           }

           if ($testD==TRUE) {
             
                  // $sql = "SELECT unicAccnt FROM tmpA";
                  // $result = $conn->query($sql);

                  // if ($result->num_rows > 0) {
                  //   while ($row = $result->fetch_assoc()) {
                  //     // $zero=0;
                      // if ($row["unicAccnt"]==$zero) {
                        
                    $type=TRUE;
                    $_SESSION['vUSER'] = $user;
                    $_SESSION['vPASS'] = $ncod;

//here now, no other device can connect itself as admin
                 //    $sql = "UPDATE tmpA SET unicAccnt='1' WHERE unicAccnt='0' ";
                 // if ($conn->query($sql) === TRUE) {} else { echo "Error: " . $sql . "<br>" . $conn->error; }

                      header("Location:cpanel.php");
                      echo"<script type='text/javascript'>
                           window.location.href = 'cpanel.php';
                           </script> ";
                      // }
                      // else{
                      //   echo "you are not allowed to use this account..";
                      // }

                  //   }
                  // }

           }
           else if($typet==TRUE){
                   $_SESSION['vUSER'] = $user;
                   $_SESSION['vPASS'] = $ncode;

                   header("Location:home.php");
                      echo"<script type='text/javascript'>
                           window.location.href = 'home.php';
                           </script> ";
           }
           elseif ($testD==FALSE && $typet==FALSE) {
               $texttd = "wrong ID code";
               toast($texttd);
           }
           else{
            echo "unknown error";
           }

         }

       }
        else if($testC==FALSE){
          $texttd = "wrong username or password";
          toast($texttd);
       }
       else{
          $texttd = "unknow error";
          toast($texttd);
       }
       
     }

}

?>