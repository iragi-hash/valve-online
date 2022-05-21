<?php 
include_once "headers.php";
if (isset($_SESSION['vUSER'])) {
	?>
        <head>
          <link rel="stylesheet" type="text/css" href="lightT.css">

        </head>
        <body>
<!-- header -->
	<header class="row" style="width: 100%; top: 1%;">
    
    <div class="navbar navbar-default " style="width: 98%; left: 1%; box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);">

  <ul class="nav navbar-nav hidden-xs">
  <li >
    <a class="navbar-brand " href="home.php"><span class="glyphicon glyphicon-home" style="left: 1%;"></span></a>
  </li>
  <?php
  $sql = "SELECT Acode FROM iDents WHERE usernames='$Vuser'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      if ($pass==$row["Acode"] && $row["Acode"]!=NULL) {
        $testA=TRUE;
        break;
      }
      else{
        $testA=FALSE;
      }
    }
    if ($testA==TRUE) {
      echo "<li> <a class='hidden-xs' href='cpanel.php'>Cpanel</a> </li>";
    }
  }
   ?>
   <li> <a class=" hidden-xs " href="#">Messages</a> </li>    
   <li> <a class=" hidden-xs " href="#">Notifications</a> </li>    
  </ul>

<ul class="nav navbar-nav navbar-right visible-xs" style="right: 5%; background-color: lightblue;">
  <li>
    <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-menu-hamburger "></span></a>
  </li>
</ul>

  <ul class="nav navbar-nav navbar-right hidden-xs" style="padding-right: 5%; text-align: right;">
      <li class="active"><a href="#"><span class="glyphicon glyphicon-cog"></span><b>Settings</b></a></li>
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
	     <div class="col-xs-12 col-sm-10 col-sm-offset-1">
	     <br>
	     <div class="row" style="width: 99%;">
        	<a href='#' >
    		<div class="POST0" >
        	<div class="col-xs-10 col-sm-2 col-sm-offset-2" >
        	<h2><strong><span class="glyphicon glyphicon-level-up"></span> change username</strong></h2>
        	</div>
        	</div>
        	</a>

        	<a href='#'>
    		<div class='MDF0'>
        	<div class="col-xs-10 col-sm-2 col-sm-offset-2">
        	<h2><strong>*****<span class="glyphicon glyphicon-refresh"></span> change password</strong></h2>
        	</div>
            </div>
            </a>

            <a href='#'>
        	<div class='RMV0'>
        	<div class="col-xs-10 col-sm-2 col-sm-offset-2">
        	<h2><strong><span class="glyphicon glyphicon-picture"></span> change profile picture</strong></h2>
        	</div>
        	</div>
        	</a>
        </div>

	    </div>
    </div>
<br>
        <div class="row" style="width: 99%;">
        	<div class="col-xs-12 col-lg-10 col-lg-offset-2">
            <br>
        		<div class="row" style="width: 99%;">

            <a href='#'>
        	<div class='TRNSCRPT'>
        	<div class="col-xs-10 col-sm-2 col-sm-offset-2">
        	<h2><strong><span class="glyphicon glyphicon-inbox"></span> request a transcript</strong></h2>
        	</div>
        	</div>
        	</a>

          <a href='#'>
          <div class='thma'>
          <div class="col-xs-10 col-sm-2 col-sm-offset-2">
          <h2><strong><span class="glyphicon glyphicon-certificate"></span><br> light mode</strong></h2>
          </div>
          </div>
          </a>

        </div>
        <br>

           </div>
        </div>

        <span class='POST' >
	<div class="row"><br>
   <form class="col-sm-4 col-xs-12 col-sm-offset-4" method="post" action="settings.php" >
   	<span class='closep' style='cursor: pointer;'><h1>&times;</h1></span>
	<legend>UPDATE USERNAME</legend>
	<fieldset>
        <div class="form-group">
               <input name="nusern" type="text" class="form-control" placeholder="enter the new username" required="required" autocomplete='off'>
        </div>
        <div class="form-group">
               <input name="pass2" type="password" class="form-control" placeholder="enter your password" required="required">
        </div>

        <div class="form-group">
               <input type='submit' name='Modifyusnm' value='UPDATE' class="form-group"/>
        </div>
	</fieldset>
   </form>
   </div>
  </span>

<span class='MDF' >
	<div class="row"><br>
   <form class="col-sm-4 col-xs-12 col-sm-offset-4" method="post" action="settings.php" >
   	<span class='closem' style='cursor: pointer;'><h1>&times;</h1></span>
	<legend>UPDATE PASSWORD</legend>
	<fieldset>

        <div class="form-group">
               <input name="lpass" type="password" class="form-control" placeholder="enter the last password" required="required" autocomplete='off'>
        </div>
        <div class="form-group">
               <input name="npass" type="password" class="form-control" placeholder="enter the new password" required="required" autocomplete='off'>
        </div>
        <div class="form-group">
               <input type='submit' name='Modifypass' value='UPDATE' class="form-group"/>
        </div>
	</fieldset>
   </form>
   </div>
  </span>

  <span class='RMV' >
  <div class="row"><br>
   <form class="col-sm-4 col-xs-12 col-sm-offset-4" method="post" action="settings.php" enctype="multipart/form-data">
    <span class='closer' style='cursor: pointer;'><h1>&times;</h1></span>
  <legend>UPDATE PROFILE PICTURE</legend>
  <fieldset>

        <div class="form-group">
               <input name="image" type="file" class="form-control" placeholder="upload a picture" required="required">
        </div>
        <div class="form-group">
               <input type='submit' name='Modifypp' value='UPDATE' class="form-group"/>
        </div>
  </fieldset>
   </form>
   </div>
  </span>

  <span class='POSTC' >
  <div class="row"><br>
   <form class="col-sm-4 col-xs-12 col-sm-offset-4" method="post" action="settings.php" enctype="multipart/form-data">
    <span class='closepc' style='cursor: pointer;'><h1>&times;</h1></span>
  <legend>REQUEST A TRANSCRIPT</legend>
  <fieldset>

        <div class="form-group">
               <input type='submit' name='trscrptr' value='Confirm your request' class="form-group"/>
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
  } else {
    navBar.classList.remove('navbar-fixed-top');
  }
});

/*--variables used when click, for opening pop up --*/
    var RMV0 = document.getElementsByClassName('RMV0')[0];
    var MDF0 = document.getElementsByClassName('MDF0')[0];
    var POST0 = document.getElementsByClassName('POST0')[0];
    var TRNSCRPT = document.getElementsByClassName('TRNSCRPT')[0];

        /*--variables for getting what will be poped up --*/
    var rmv =  document.getElementsByClassName('RMV')[0];
    var mdf = document.getElementsByClassName('MDF')[0];
    var post = document.getElementsByClassName('POST')[0];
    var trscrptrr = document.getElementsByClassName('POSTC')[0];

        /*--variables for closing pop up --*/
    var spanr = document.getElementsByClassName('closer')[0];
    var spanm = document.getElementsByClassName('closem')[0];
    var spanp = document.getElementsByClassName('closep')[0];
    var spanpc = document.getElementsByClassName('closepc')[0];

        
        /*--opening pop up and closing it by click --*/
    RMV0.onclick = function() {   rmv.style.display = 'block';  }
    spanr.onclick = function() {  rmv.style.display = 'none'; }


    MDF0.onclick = function() {    mdf.style.display = 'block';  } 
    spanm.onclick = function() {  mdf.style.display = 'none'; }

    POST0.onclick = function() {   post.style.display = 'block';  }
    spanp.onclick = function() {   post.style.display = ' none'; }

    TRNSCRPT.onclick = function() {   trscrptrr.style.display = 'block';  }
    spanpc.onclick = function() {  trscrptrr.style.display = 'none'; }


</script>

    </body>
	<?php

if (isset($_POST['Modifyusnm'])) {
  
    $nusern=sanitizeString($_POST['nusern']);
    $pass2=sanitizeString($_POST['pass2']);

     $sql = "SELECT usernames,passwords FROM iDents WHERE Scode='$pass' OR Acode='$pass'";
     $result = $conn->query($sql);

     if ($result->num_rows > 0) {
       while ($row = $result->fetch_assoc()) {
        
         if ($pass2==$row["passwords"]) {
           $lsd=TRUE;
           break;
         }
         else{
          $lsd=FALSE;
         }

       }
     }

          if ($lsd==TRUE) {
            $sql = "UPDATE iDents SET usernames='$nusern' WHERE Scode='$pass' OR Acode='$pass'"; 
            if ($conn->query($sql) === TRUE) {  } else { echo "Error: " . $sql . "<br>" . $conn->error; }
            $_SESSION['vUSER'] = $nusern;

            $texttd = "name modified successfully";
            toast($texttd);

          }
          else{

            $texttd = "wrong password";
            toast($texttd);
          }
  
   } 


if (isset($_POST['Modifypass'])) {
  
    $lpass=sanitizeString($_POST['lpass']);
    $npass=sanitizeString($_POST['npass']);

          $sql = "SELECT usernames,passwords FROM iDents WHERE Scode='$pass' OR Acode='$pass'";
          $result = $conn->query($sql);

     if ($result->num_rows > 0) {
       while ($row = $result->fetch_assoc()) {
        
         if ($lpass==$row["passwords"]) {
           $lsd=TRUE;
           break;
         }
         else{
          $lsd=FALSE;
         }
       }
     }
     

          if ($lsd==TRUE) {
            $sql = "UPDATE iDents SET passwords='$npass' WHERE Scode='$pass' OR Acode='$pass'"; 
            if ($conn->query($sql) === TRUE) { } else { echo "Error: " . $sql . "<br>" . $conn->error; }

            $texttd = "password modified successfully";
            toast($texttd);
          }
          else{
            $texttd = "wrong password";
            toast($texttd);
          }
  
   } 

   if (isset($_POST['Modifypp'])) {

    if (isset($_FILES['image']['name'])) {
      $dossier='images/';
      $saveto = $dossier."$Vuser$pass.jpg";

      move_uploaded_file($_FILES['image']['tmp_name'], $saveto);
      $typeok = TRUE;

      switch ($_FILES['image']['type']) {
         case "image/gif":$src = imagecreatefromgif($saveto);
           break;
         case "image/jpeg":$src = imagecreatefromjpeg($saveto);
           break;
         case "image/pjpeg":$src = imagecreatefrompjpeg($saveto);
           break;
         case "image/png":$src = imagecreatefromppng($saveto);
           break;
         
         default:
           $typeok = FALSE;
           break;
       }

       if ($typeok) {
            //code for resizing the image..      
                        list($w, $h) = getimagesize($saveto);
                          $max = 100;        
                          $tw  = $w;        
                          $th  = $h;
                          if ($w > $h && $max < $w) { 
                            $th = $max / $w * $h;            
                            $tw = $max;        
                          }        
                          else if ($h > $w && $max < $h)  {
                            $tw = $max / $h * $w;
                            $th = $max;        
                          }        
                          else if ($max < $w) {
                            $tw = $th = $max;        }
                                     
        }

                            $tmp = imagecreatetruecolor($tw, $th);  //below the code for recolor the image
                            imagecopyresampled($tmp, $src, 0, 0, 0, 0, $tw, $th, $w, $h);        
                             imageconvolution($tmp, array(array(-1, -1, -1), array(-1, 16, -1), array(-1, -1, -1)), 8, 0); 
                            imagejpeg($tmp, $saveto);
                            imagedestroy($tmp);
                            imagedestroy($src);


                            $sql = "UPDATE iDents SET profilesImg='$saveto' WHERE Scode='$pass' OR Acode='$pass'"; 
            if ($conn->query($sql) === TRUE) { } else { echo "Error: " . $sql . "<br>" . $conn->error; }
            move_uploaded_file($_FILES['image']['tmp_name'], $saveto);

            $texttd = "profile picture modified successfully";
            toast($texttd);
            // echo "<script type='text/javascript'>
            //       window.location.href = 'settings.php';
            //       </script> ";

    }
     
   }

   if (isset($_POST['trscrptr'])) {
     $username = $Vuser;
     $code = $pass;
     //r going to be sent to the admin..

     $texttd = "check your email within 4 hours";
            toast($texttd);
   }




}

 else {
	header("Location:login.php");
    echo"<script type='text/javascript'>
      window.location.href = 'login.php';
		       </script> ";
}
?>