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
                 $texttd = "restricted area";
                 toast($texttd);
            
      header("Location:login.php");
        echo"<script type='text/javascript'>
           window.location.href = 'home.php';
           </script> ";
		}
		
	}
}

 else {
	header("Location:login.php");
    echo"<script type='text/javascript'>
       window.location.href = 'login.php';
       </script> ";
 	echo "oups, no table row found";
}

// the code above checks if it's the admin, he's the only one allowed to this page
// ==============================================================================================
// ==============================================================================================
// here down we check if he's connected


			if (isset($_SESSION['vUSER']) && $testA==TRUE) {
			
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
		<a class="navbar-brand" href="cpanel.php"> <span class="glyphicon glyphicon-home" style="left: 1%;"></span></a>
	</li>
	<li class="active"> <a class=" hidden-xs " href="cpanel.php">Cpanel</a> </li>    
	<li> <a class=" hidden-xs " href="#">Contact</a> </li>    
	</ul>

<ul class="nav navbar-nav visible-xs" style="background-color: lightblue;">
  <li>
    <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-menu-hamburger " style="width: 98%; left: 2%;"></span></a>
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
	     <div class="col-xs-12 col-sm-10 col-sm-offset-1">table of students <br><br>at this free space we are going to display students' profile(picture,name,email,IDcode) at left; and at right options to send a message to each one personnally.which message will be displayed into the notif box of that student<br><br><br><br><br><br></div>
        </div>
        <br>

        <div class="row" style="width: 99%;">
        	<a href='#'>
    		<div class="POST0" >
        	<div class="col-xs-10 col-sm-2 col-sm-offset-2">
        	<h2><strong><span class="glyphicon glyphicon-save"></span> ADD</strong></h2>
        	</div>
        	</div>
        	</a>

        	<a href='#'>
    		<div class='MDF0'>
        	<div class="col-xs-10 col-sm-2 col-sm-offset-2">
        	<h2><strong><span class="glyphicon glyphicon-refresh"></span> UPDATE</strong></h2>
        	</div>
            </div>
            </a>

            <a href='#'>
        	<div class='RMV0'>
        	<div class="col-xs-10 col-sm-2 col-sm-offset-2">
        	<h2><strong><span class="glyphicon glyphicon-trash"></span> DELETE</strong></h2>
        	</div>
        	</div>
        	</a>
        </div>

<span class='POST' >
   <div class="row"><br>
   <form class="col-sm-4 col-xs-12 col-sm-offset-4" method="post" action="managstdt.php" >
   	<span class='closep' style='cursor: pointer;'><h1>&times;</h1></span>
	<legend>ADD</legend>
	<fieldset><br>
		<select name="dprtm" class="form-group">
              <option value="BIT">BIT</option>
              <option value="BBA">BBA</option>
        </select>

        <div class="form-group">
               <input name="Ecodez" type="text" class="form-control" placeholder="enter the code/ID" required="required">
        </div>
        <div class="form-group">
               <input type='submit' name='save' value='Add' class="form-group"/>
        </div>
	</fieldset>
   </form>
</div>
  </span>


<span class='MDF' >
	<div class="row"><br>
   <form class="col-sm-4 col-xs-12 col-sm-offset-4" method="post" action="managstdt.php" >
   	<span class='closem' style='cursor: pointer;'><h1>&times;</h1></span>
	<legend>UPDATE</legend>
	<fieldset>
		<select name="dprtm" class="form-group">
              <option value="BIT">BIT</option>
              <option value="BBA">BBA</option>
        </select>
        <div class="form-group">
               <input name="Ecodez" type="text" class="form-control" placeholder="enter the last code" required="required">
        </div>
        <div class="form-group">
               <input name="Ecode2" type="text" class="form-control" placeholder="enter the new code" required="required">
        </div>
        <div class="form-group">
               <input type='submit' name='subModify' value='UPDATE' class="form-group"/>
        </div>
	</fieldset>
   </form>
   </div>
  </span>

  
<span class='RMV'>
<div class="row"><br>
<form class="col-sm-4 col-xs-12 col-sm-offset-4" method="post" action="managstdt.php">
	<span class='closer' style='cursor: pointer;'><h1>&times;</h1></span>
	<legend>DELETE</legend>
	<fieldset>
		<select name="dprtm" class="form-group">
              <option value="BIT">BIT</option>
              <option value="BBA">BBA</option>
        </select>

        <div class="form-group">
               <input name="Ecodez" type="text" class="form-control" placeholder="enter the code/ID" required="required">
        </div>
        <div class="form-group">
               <input type='submit' name='subRemove' value='REMOVE' class="form-group"/>
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

        /*--variables for getting what will be poped up --*/
    var rmv =  document.getElementsByClassName('RMV')[0];
    var mdf = document.getElementsByClassName('MDF')[0];
    var post = document.getElementsByClassName('POST')[0];

        /*--variables for closing pop up --*/
    var spanr = document.getElementsByClassName('closer')[0];
    var spanm = document.getElementsByClassName('closem')[0];
    var spanp = document.getElementsByClassName('closep')[0];

        
        /*--opening pop up and closing it by click --*/
    RMV0.onclick = function() {   rmv.style.display = 'block';  }
    spanr.onclick = function() {  rmv.style.display = 'none'; }


    MDF0.onclick = function() {    mdf.style.display = 'block';  } 
    spanm.onclick = function() {  mdf.style.display = 'none'; }

    POST0.onclick = function() {   post.style.display = 'block';  }
    spanp.onclick = function() {   post.style.display = ' none'; }

</script>

    </body>

				<?php

// ==================================================================================================================
 	//insetion or adding/creation into our database, of a student's ID code below


if (isset($_POST['save'])) {
  
    $deprtmt = sanitizeString($_POST['dprtm']);
    $Ecod=sanitizeString($_POST['Ecodez']);
    $Ecode=$deprtmt.$Ecod;

     $sql = "SELECT Scode FROM iDents";
     $result = $conn->query($sql);

  while($row = $result->fetch_assoc()) {

  	if ($row["Scode"]==$Ecode) {//this is just to vrify if that ID yet exist
  		$samp=TRUE;
  		break;
  	} else {
  		$samp=FALSE;
  	}
  	 
          }


     $sql = "SELECT Scode FROM iDents " ;
     $result = $conn->query($sql);

  while($row = $result->fetch_assoc()) {

  	if ($samp==TRUE) {

      $texttd = "that student yet exist";
            toast($texttd);
  		break;
  	}

  	 else {

  		if($row["Scode"]!=$Ecode && $result->num_rows == 1){

            $sql = "INSERT INTO iDents (Scode) VALUES ('$Ecode')";
            if ($conn->query($sql) === TRUE) { } else { echo "Error: " . $sql . "<br>" . $conn->error; }

            $texttd = "new ID saved successfully";
            toast($texttd);
            break;
         }

         else {

    		$sql = "INSERT INTO iDents (Scode) VALUES ('$Ecode')";
            if ($conn->query($sql) === TRUE) { } else { echo "Error: " . $sql . "<br>" . $conn->error; }

            $texttd = "new ID saved successfully";
            toast($texttd);

            break;
         }

  	}
  	
         }
  
  
   } 

// ==================================================================================================================
   //modification or update of a student's ID code below


if (isset($_POST['subModify'])) {
    $deprtmt = sanitizeString($_POST['dprtm']);
    $Ecod=sanitizeString($_POST['Ecodez']);
    $Ecod2=sanitizeString($_POST['Ecode2']);
    $Ecode=$deprtmt.$Ecod;
    $Ecode2=$deprtmt.$Ecod2;
    
    $sql = "SELECT Scode FROM iDents";
    $result = $conn->query($sql);
 while($row = $result->fetch_assoc()) {
    
  if ($row["Scode"]==$Ecode) {
    $sql = "UPDATE iDents SET Scode='$Ecode2' WHERE Scode='$Ecode'"; 
            if ($conn->query($sql) === TRUE) { } else { echo "Error: " . $sql . "<br>" . $conn->error; }

            $texttd = "ID modified successfully";
            toast($texttd);
    break;
      }
    }
  
   }
// ==================================================================================================================
//delete or removing of a student's ID code below

   if (isset($_POST['subRemove'])) {
    $deprtmt = sanitizeString($_POST['dprtm']);  
    $Ecod=sanitizeString($_POST['Ecodez']);
    $Ecode=$deprtmt.$Ecod; 

    $sql = "SELECT Scode FROM iDents";
         $result = $conn->query($sql);
     while($row = $result->fetch_assoc()) {
        
    if ($row["Scode"]==$Ecode) {

    $sql = "DELETE  FROM iDents WHERE Scode='$Ecode' ";
            if ($conn->query($sql) === TRUE) { echo "code removed successfully"; } else { echo "Error: " . $sql . "<br>" . $conn->error; }

            $texttd = "ID removed successfully";
            toast($texttd);
         break;
      }
     }
  
   }

// ==================================================================================================================



			}

			 else {
				header("Location:login.php");
		        echo"<script type='text/javascript'>
		       window.location.href = 'login.php';
		       </script> ";
			 	// echo "u r not connected";
			}
			
?>