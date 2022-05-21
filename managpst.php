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

           $texttd = "access restricted";
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
// here down we checks if he's connected


      if (isset($_SESSION['vUSER']) && $testA=TRUE) {
      
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
       <div class="col-xs-12 col-sm-10 col-sm-offset-1">table of DB contents' <br><br><br><br><br><br><br><br></div>
        </div>
        <br>

        <div class="row" style="width: 99%;">

          <!-- EXAMS'_SPACE================================================================================== -->
        <a href="#">
        <div class="col-xs-10 col-sm-2 col-sm-offset-2">

            <h2>
              <strong>
                <span class="glyphicon glyphicon-file"></span><br>EXAMS
              </strong>
            </h2>

          
        <div class="POST0" id="postE">
          <div class="col-xs-10 col-sm-11">
          <span class="glyphicon glyphicon-save"></span><b> ADD</b>
          </div>
          </div>
          <br><br>

        <div class='MDF0' id="modE">
          <div class="col-xs-10 col-sm-11">
          <span class="glyphicon glyphicon-refresh"></span><b> UPDATE</b>
          </div>
            </div>
            <br><br>

          <div class='RMV0' id="RMV0">
          <div class="col-xs-10 col-sm-11">
          <span class="glyphicon glyphicon-trash"></span><b> DELETE</b>
          </div>
          </div>
          <br><br>

        </div>
        </a>

  <!-- END_OF EXAMS' SPACE========================================================================================== -->

  <!-- COURSES' SPACE================================================================================================ -->
        <a href='#'>
                <div class="col-xs-10 col-sm-2 col-sm-offset-2">

            <h2>
              <strong>
                <span class="glyphicon glyphicon-list-alt"></span><br>COURSES
              </strong>
            </h2>

          
        <div class="POSTCC" >
          <div class="col-xs-10 col-sm-11">
          <span class="glyphicon glyphicon-save"></span><b> ADD</b>
          </div>
          </div>
          <br><br>

        <div class='MDFCC' id="MDFCC">
          <div class="col-xs-10 col-sm-11">
          <span class="glyphicon glyphicon-refresh"></span><b> UPDATE</b>
          </div>
          </div>
          <br><br>

          <div class='RMVCC' id="RMVCC">
          <div class="col-xs-10 col-sm-11">
          <span class="glyphicon glyphicon-trash"></span><b> DELETE</b>
          </div>
          </div>
          <br><br>

        </div>
        </a>
  <!-- END_OF COURSES' SPACE========================================================================================== -->

  <!-- OTHER INFO SPACE=============================================================================================== -->
        <a href='#'>
        <div class="col-xs-10 col-sm-2 col-sm-offset-2">

            <h2>
              <strong>
                <span class="glyphicon glyphicon-calendar"></span><br>INFO
              </strong>
            </h2>

        <div class="POSTII" id="POSTII">
          <div class="col-xs-10 col-sm-11">
          <span class="glyphicon glyphicon-save"></span><b> ADD</b>
          </div>
          </div>
          <br><br>

        <div class='MDFII' id="MDFII">
          <div class="col-xs-10 col-sm-11">
          <span class="glyphicon glyphicon-refresh"></span><b> UPDATE</b>
          </div>
          </div>
          <br><br>

          <div class='RMVII' id="RMVII">
          <div class="col-xs-10 col-sm-11">
          <span class="glyphicon glyphicon-trash"></span><b> DELETE</b>
          </div>
          </div>
          <br><br>

        </div>
        </a>
 <!-- END_OF OTHER INFO=================================================================================== -->
        </div>


<span class='POST' >
   <div class="row"><br>
   <form class="col-sm-4 col-xs-12 col-sm-offset-4" method="post" action="managpst.php" enctype="multipart/form-data">
    <span class='closep' style='cursor: pointer;'><h1>&times;</h1></span>
  <legend>ADD</legend>
  <fieldset><br>
    <select name="exmpost" class="form-group">
      <option value="ex_all" selected="selected">all</option>
      <option value="01stEx">semester 01</option>
      <option value="02ndEx">semester 02</option>
      <option value="03rdEx">semester 03</option>
      <option value="04thEx">semester 04</option>
      <option value="05thEx">semester 05</option>
      <option value="06thEx">semester 06</option>
    </select>

        <div class="form-group">
               <input name="postExm" type="file" class="form-control" placeholder="upload the file" required="required">
        </div>
        <div class="form-group">
               <input type='submit' name='ExmSave' value='Add' class="form-group"/>
        </div>
  </fieldset>
   </form>
</div>
  </span>


<span class='MDF' >
  <div class="row"><br>
   <form class="col-sm-4 col-xs-12 col-sm-offset-4" method="post" action="managpst.php" enctype="multipart/form-data">
    <span class='closem' style='cursor: pointer;'><h1>&times;</h1></span>
  <legend>UPDATE</legend>
  <fieldset>
    <select name="exmmod" class="form-group">
      <option value="ex_all" selected="selected">all</option>
      <option value="01stEx">semester 01</option>
      <option value="02ndEx">semester 02</option>
      <option value="03rdEx">semester 03</option>
      <option value="04thEx">semester 04</option>
      <option value="05thEx">semester 05</option>
      <option value="06thEx">semester 06</option>
    </select>

        <div class="form-group">
               <input name="modExm" type="file" class="form-control" placeholder="upload the new file" required="required">
        </div>

        <div class="form-group">
               <input type='submit' name='ExmModify' value='UPDATE' class="form-group"/>
        </div>
  </fieldset>
   </form>
   </div>
  </span>

  
<span class='RMV'>
<div class="row"><br>
<form class="col-sm-4 col-xs-12 col-sm-offset-4" method="post" action="managpst.php">
  <span class='closer' style='cursor: pointer;'><h1>&times;</h1></span>
  <legend>DELETE</legend>
  <fieldset>
    <select name="exmrem" class="form-group">
    <option value="ex_all" selected="selected">all</option>
      <option value="01stEx">semester 01</option>
      <option value="02ndEx">semester 02</option>
      <option value="03rdEx">semester 03</option>
      <option value="04thEx">semester 04</option>
      <option value="05thEx">semester 05</option>
      <option value="06thEx">semester 06</option>
    </select>

        <div class="form-group">
               <input type='submit' name='ExmRemove' value='REMOVE' class="form-group"/>
        </div>
  </fieldset>
   </form>
  </div>
  </span>
  <!--  end exams========================================================================================== -->



  <!-- course========================================================================================== -->       
         <span class="POSTC">
   <div class="row"><br>
   <form class="col-sm-4 col-xs-12 col-sm-offset-4" method="post" action="managpst.php" enctype="multipart/form-data">
    <span class='closepc' style='cursor: pointer;'><h1>&times;</h1></span>
  <legend>ADD</legend>
  <fieldset><br>
    <select name="copost" class="form-group">
      <option value="co_all">all</option>
      <option value="01stco">semester 01</option>
      <option value="02ndco">semester 02</option>
      <option value="03rdco">semester 03</option>
      <option value="04thco">semester 04</option>
      <option value="05thco">semester 05</option>
      <option value="06thco">semester 06</option>
    </select>

        <div class="form-group">
               <input name="postCo" type="file" class="form-control" placeholder="upload the file" required="required">
        </div>
        <div class="form-group">
               <input type='submit' name='coSave' value='Add' class="form-group"/>
        </div>
  </fieldset>
   </form>
</div>
  </span>


<span class='MDFC' >
  <div class="row"><br>
   <form class="col-sm-4 col-xs-12 col-sm-offset-4" method="post" action="managpst.php" enctype="multipart/form-data">
    <span class='closemc' style='cursor: pointer;'><h1>&times;</h1></span>
  <legend>UPDATE</legend>
  <fieldset>
    <select name="comod" class="form-group">
      <option value="co_all">all</option>
      <option value="01stco">semester 01</option>
      <option value="02ndco">semester 02</option>
      <option value="03rdco">semester 03</option>
      <option value="04thco">semester 04</option>
      <option value="05thco">semester 05</option>
      <option value="06thco">semester 06</option>
    </select>
        <div class="form-group">
               <input name="modCo" type="file" class="form-control" placeholder="upload the file" required="required">
        </div>
        <div class="form-group">
               <input type='submit' name='coModify' value='UPDATE' class="form-group"/>
        </div>
  </fieldset>
   </form>
   </div>
  </span>

  
<span class='RMVC'>
<div class="row"><br>
<form class="col-sm-4 col-xs-12 col-sm-offset-4" method="post" action="managpst.php">
  <span class='closerc' style='cursor: pointer;'><h1>&times;</h1></span>
  <legend>DELETE</legend>
  <fieldset>
    <select name="corem" class="form-group">
      <option value="co_all">all</option>
      <option value="01stco">semester 01</option>
      <option value="02ndco">semester 02</option>
      <option value="03rdco">semester 03</option>
      <option value="04thco">semester 04</option>
      <option value="05thco">semester 05</option>
      <option value="06thco">semester 06</option>
    </select>

        <div class="form-group">
               <input type='submit' name='coRemove' value='REMOVE' class="form-group"/>
        </div>
  </fieldset>
   </form>
  </div>
  </span>
  <!--  end courses==================================================================================================== -->


  <!-- other informations============================================================================================= -->
<span class="POSTI">
   <div class="row"><br>
   <form class="col-sm-4 col-xs-12 col-sm-offset-4" method="post" action="managpst.php" enctype="multipart/form-data">
    <span class='closepi' style='cursor: pointer;'><h1>&times;</h1></span>
  <legend>ADD</legend>
  <fieldset><br>
        <div class="form-group">
               <input name="infoPost" type="text" class="form-control" placeholder="name of doc" required="required">
        </div>

        <div class="form-group">
               <input name="postInfo" type="file" class="form-control" placeholder="upload the file" required="required">
        </div>

        <div class="form-group">
               <input type='submit' name='infoSave' value='Add' class="form-group"/>
        </div>
  </fieldset>
   </form>
</div>
  </span>


<span class='MDFI' >
  <div class="row"><br>
   <form class="col-sm-4 col-xs-12 col-sm-offset-4" method="post" action="managpst.php" enctype="multipart/form-data">
    <span class='closemi' style='cursor: pointer;'><h1>&times;</h1></span>
  <legend>UPDATE</legend>
  <fieldset>

        <div class="form-group">
               <input name="infoMod" type="text" class="form-control" placeholder="enter the name of doc to update" required="required">
        </div>

        <div class="form-group">
               <input name="modInfo" type="file" class="form-control" placeholder="upload the file" required="required">
        </div>
        <div class="form-group">
               <input type='submit' name='infoModify' value='UPDATE' class="form-group"/>
        </div>
  </fieldset>
   </form>
   </div>
  </span>

  
<span class='RMVI'>
<div class="row"><br>
<form class="col-sm-4 col-xs-12 col-sm-offset-4" method="post" action="managpst.php">
  <span class='closeri' style='cursor: pointer;'><h1>&times;</h1></span>
  <legend>DELETE</legend>
  <fieldset>
        <div class="form-group">
               <input name="infoRem" type="text" class="form-control" placeholder="enter the name of doc to delete" required="required">
        </div>

        <div class="form-group">
               <input type='submit' name='infoRemove' value='REMOVE' class="form-group"/>
        </div>
  </fieldset>
   </form>
  </div>
  </span>
  <!--end_of other info=============================================================================================== -->
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
// =================================================================================

    var RMV1 = document.getElementsByClassName('RMVCC')[0];
    var MDF1 = document.getElementsByClassName('MDFCC')[0];
    var POST1 = document.getElementsByClassName('POSTCC')[0];

        /*--variables for getting what will be poped up --*/
    var rmvc =  document.getElementsByClassName('RMVC')[0];
    var mdfc = document.getElementsByClassName('MDFC')[0];
    var postc = document.getElementsByClassName('POSTC')[0];

        /*--variables for closing pop up --*/
    var spanr1 = document.getElementsByClassName('closerc')[0];
    var spanm1 = document.getElementsByClassName('closemc')[0];
    var spanp1 = document.getElementsByClassName('closepc')[0];

        
        /*--opening pop up and closing it by click --*/
    RMV1.onclick = function() {   rmvc.style.display = 'block';  }
    spanr1.onclick = function() {  rmvc.style.display = 'none'; }


    MDF1.onclick = function() {    mdfc.style.display = 'block';  } 
    spanm1.onclick = function() {  mdfc.style.display = 'none'; }

    POST1.onclick = function() {   postc.style.display = 'block';  }
    spanp1.onclick = function() {   postc.style.display = ' none'; }
// =======================================================================================

    var RMV2 = document.getElementsByClassName('RMVII')[0];
    var MDF2 = document.getElementsByClassName('MDFII')[0];
    var POST2 = document.getElementsByClassName('POSTII')[0];

        /*--variables for getting what will be poped up --*/
    var rmvi =  document.getElementsByClassName('RMVI')[0];
    var mdfi = document.getElementsByClassName('MDFI')[0];
    var posti = document.getElementsByClassName('POSTI')[0];

        /*--variables for closing pop up --*/
    var spanr2 = document.getElementsByClassName('closeri')[0];
    var spanm2 = document.getElementsByClassName('closemi')[0];
    var spanp2 = document.getElementsByClassName('closepi')[0];

        
        /*--opening pop up and closing it by click --*/
    RMV2.onclick = function() {   rmvi.style.display = 'block';  }
    spanr2.onclick = function() {  rmvi.style.display = 'none'; }


    MDF2.onclick = function() {    mdfi.style.display = 'block';  } 
    spanm2.onclick = function() {  mdfi.style.display = 'none'; }

    POST2.onclick = function() {   posti.style.display = 'block';  }
    spanp2.onclick = function() {   posti.style.display = ' none'; }

</script>

    </body>

        <?php

// ==================================================================================================================
        // EXAMS BACK HALL


if (isset($_POST['ExmSave'])) {

  $dossier='doc/';
  $file_name = sanitizeString($_POST['exmpost']);
  $saveto = $dossier."$file_name.pdf";

  if (isset($_FILES['postExm']['name'])) {

  $sql = "SELECT exams FROM Timetables";
  $result = $conn->query($sql);

  if ($result->num_rows == 0) {
    $sql = "INSERT INTO Timetables (exams) VALUES ('$saveto')";
            if ($conn->query($sql) === TRUE) { echo "New record created successfully"; } else { echo "Error: " . $sql . "<br>" . $conn->error; }

    move_uploaded_file($_FILES['postExm']['tmp_name'],$saveto);
    echo "done";
  }

  else{

    $sql = "SELECT exams FROM Timetables";
    $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {

       if ($row["exams"]==$saveto && $row["exams"]!=NULL) {
        $tyga=TRUE;
        break;
       }
       else{$tyga=FALSE;}

      }

      if ($tyga==TRUE) {

        $texttd = "that row yet exist";
          toast($texttd);
      }

     else {
      $sql = "INSERT INTO Timetables (exams) VALUES ('$saveto')";
            if ($conn->query($sql) === TRUE) { } else { echo "Error: " . $sql . "<br>" . $conn->error; }

      move_uploaded_file($_FILES['postExm']['tmp_name'],$saveto);

      $texttd = "exam timetable saved";
          toast($texttd);

        }
    
   }

  }

   else {
    $texttd = "you didn't insert any file";
          toast($texttd);
  }

}
// ----------------------------------------------------------------above insertion of exam
// ---------------------------------------------------------------below modif of exam
 
if (isset($_POST['ExmModify'])) {
  $dossier='doc/';
  $file_name = sanitizeString($_POST['exmmod']);
  $saveto = $dossier."$file_name.pdf";

  if (isset($_FILES['modExm']['name'])) {

    $sql = "SELECT exams FROM Timetables";
    $result = $conn->query($sql);

      while ($row = $result->fetch_assoc()) {

       if ($row["exams"]==$saveto && $row["exams"]!=NULL) {
        $tyga=TRUE;
        break;
       }
       else{
        $tyga=FALSE;
      }

    }

    if ($tyga==TRUE) {
      move_uploaded_file($_FILES['modExm']['tmp_name'],$saveto);
      $texttd = "exam timetable updated";
          toast($texttd);
    } else {
      $texttd = "nothing to modify";
          toast($texttd);
    }
    
  }

}
// -------------------------------------------------------------------------above modif or update of exms
// -------------------------------------------------------------------------below delete or remove of exms

if (isset($_POST['ExmRemove'])) {
  $dossier='doc/';
  $file_name = sanitizeString($_POST['exmrem']);
  $saveto = $dossier."$file_name.pdf";

  $sql = "SELECT exams FROM Timetables";
    $result = $conn->query($sql);

      while ($row = $result->fetch_assoc()) {

       if ($row["exams"]==$saveto && $row["exams"]!=NULL) {
        $tyga=TRUE;
        break;
       }
       else{
        $tyga=FALSE;
      }

    }

    if ($tyga==TRUE) {
      unlink($saveto);

      $sql = "DELETE  FROM Timetables WHERE exams='$saveto' ";
            if ($conn->query($sql) === TRUE) { echo "code removed successfully"; } else { echo "Error: " . $sql . "<br>" . $conn->error; }
            
            $texttd = "exam timetable removed";
            toast($texttd);
    } else {
      $texttd = "nothing to delete";
          toast($texttd);
    }
}

// END_OF EXAM BACK HALL
// ==================================================================================================================

// ==================================================================================================================
        // COURES" BACK HALL

if (isset($_POST['coSave'])) {

  $dossier='doc/';
  $file_name = sanitizeString($_POST['copost']);
  $saveto = $dossier."$file_name.pdf";

  if (isset($_FILES['postCo']['name'])) {

  $sql = "SELECT courses FROM Timetables";
  $result = $conn->query($sql);

  if ($result->num_rows == 0) {
    $sql = "INSERT INTO Timetables (courses) VALUES ('$saveto')";
            if ($conn->query($sql) === TRUE) { } else { echo "Error: " . $sql . "<br>" . $conn->error; }

    move_uploaded_file($_FILES['postCo']['tmp_name'],$saveto);

    $texttd = "courses' timetable saved";
          toast($texttd);
          
  }

  else{

    $sql = "SELECT courses FROM Timetables";
    $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {

       if ($row["courses"]==$saveto && $row["courses"]!=NULL) {
        $tyga=TRUE;
        break;
       }
       else{$tyga=FALSE;}

      }

      if ($tyga==TRUE) {
      $texttd = "that row yet exist";
          toast($texttd);
      }

     else {
      $sql = "INSERT INTO Timetables (courses) VALUES ('$saveto')";
            if ($conn->query($sql) === TRUE) { } else { echo "Error: " . $sql . "<br>" . $conn->error; }

      move_uploaded_file($_FILES['postCo']['tmp_name'],$saveto);

            $texttd = "courses' timetable saved";
            toast($texttd);
        }
    
   }

  }

   else {
   $texttd = "you didn't insert a file";
          toast($texttd);
  }

}

// ----------------------------------------------------------------above insertion of courses
// ---------------------------------------------------------------below modif of courses

if (isset($_POST['coModify'])) {
  $dossier='doc/';
  $file_name = sanitizeString($_POST['comod']);
  $saveto = $dossier."$file_name.pdf";

  if (isset($_FILES['modCo']['name'])) {

    $sql = "SELECT courses FROM Timetables";
    $result = $conn->query($sql);

      while ($row = $result->fetch_assoc()) {

       if ($row["courses"]==$saveto && $row["courses"]!=NULL) {
        $tyga=TRUE;
        break;
       }
       else{
        $tyga=FALSE;
      }

    }

    if ($tyga==TRUE) {
      move_uploaded_file($_FILES['modCo']['tmp_name'],$saveto);

            $texttd = "courses' timetable updated";
            toast($texttd);

    } else {
      $texttd = "nothing to modify";
          toast($texttd);
    }
    
  }

}
// -------------------------------------------------------------------------above modif or update of courses
// -------------------------------------------------------------------------below delete or remove of exms

if (isset($_POST['coRemove'])) {
  $dossier='doc/';
  $file_name = sanitizeString($_POST['corem']);
  $saveto = $dossier."$file_name.pdf";

  $sql = "SELECT courses FROM Timetables";
    $result = $conn->query($sql);

      while ($row = $result->fetch_assoc()) {

       if ($row["courses"]==$saveto && $row["courses"]!=NULL) {
        $tyga=TRUE;
        break;
       }
       else{
        $tyga=FALSE;
      }

    }

    if ($tyga==TRUE) {
      unlink($saveto);

      $sql = "DELETE  FROM Timetables WHERE courses='$saveto' ";
            if ($conn->query($sql) === TRUE) { } else { echo "Error: " . $sql . "<br>" . $conn->error; }
            
           $texttd = "courses timetable removed";
          toast($texttd);
    } else {
      echo "nothing to delete";
    }
}

// END_OF COURSES' BACK HALL
// ==================================================================================================================

// ==================================================================================================================
// INFOS' BACK HALL infoSave

if (isset($_POST['infoSave'])) {
  $dossier='doc/';
  $file_name = sanitizeString($_POST['infoPost']);
  $saveto = $dossier."$file_name.pdf";

  if (isset($_FILES['postInfo']['name'])) {
      $sql = "SELECT docsNames FROM info";
      $result = $conn->query($sql);

      if ($result->num_rows == 0) {
        $sql = "INSERT INTO info (docsNames) VALUES ('$saveto')";
            if ($conn->query($sql) === TRUE) { } else { echo "Error: " . $sql . "<br>" . $conn->error; }

            move_uploaded_file($_FILES['postInfo']['tmp_name'],$saveto);

                  $texttd = "info saved";
                  toast($texttd);
      }


      else{

    $sql = "SELECT docsNames FROM info";
    $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {

       if ($row["docsNames"]==$saveto && $row["docsNames"]!=NULL) {
        $tyga=TRUE;
        break;
       }
       else{$tyga=FALSE;}

      }

      if ($tyga==TRUE) {
      $texttd = "that row yet exist";
          toast($texttd);
      }

     else {
      $sql = "INSERT INTO info (docsNames) VALUES ('$saveto')";
            if ($conn->query($sql) === TRUE) { } else { echo "Error: " . $sql . "<br>" . $conn->error; }

      move_uploaded_file($_FILES['postInfo']['tmp_name'],$saveto);
            
            $texttd = "info saved";
            toast($texttd);

        }
    
   }


  }
}

// ----------------------------------------------------------------above insertion of info
// ---------------------------------------------------------------below modif of info

if (isset($_POST['infoModify'])) {
  $dossier='doc/';
  $file_name = sanitizeString($_POST['infoMod']);
  $saveto = $dossier."$file_name.pdf";

  if (isset($_FILES['modInfo']['name'])) {

    $sql = "SELECT docsNames FROM info";
    $result = $conn->query($sql);

      while ($row = $result->fetch_assoc()) {

       if ($row["docsNames"]==$saveto && $row["docsNames"]!=NULL) {
        $tyga=TRUE;
        break;
       }
       else{
        $tyga=FALSE;
      }

    }

    if ($tyga==TRUE) {
      move_uploaded_file($_FILES['modInfo']['tmp_name'],$saveto);
      
            $texttd = "info saved";
            toast($texttd);
    } else {
      $texttd = "nothing to modify or that file doesn't exist";
          toast($texttd);
    }
    
  }

}
// -------------------------------------------------------------------------above modif or update of courses
// -------------------------------------------------------------------------below delete or remove of exms

if (isset($_POST['infoRemove'])) {
  $dossier='doc/';
  $file_name = sanitizeString($_POST['infoRem']);
  $saveto = $dossier."$file_name.pdf";

  $sql = "SELECT docsNames FROM info";
    $result = $conn->query($sql);

      while ($row = $result->fetch_assoc()) {

       if ($row["docsNames"]==$saveto && $row["docsNames"]!=NULL) {
        $tyga=TRUE;
        break;
       }
       else{
        $tyga=FALSE;
      }

    }

    if ($tyga==TRUE) {
      unlink($saveto);

      $sql = "DELETE  FROM info WHERE docsNames='$saveto' ";
            if ($conn->query($sql) === TRUE) { } else { echo "Error: " . $sql . "<br>" . $conn->error; }
            
            $texttd = "info removed";
            toast($texttd);
    } else {
      $texttd = "nothing to delete or that doc doesn't exist anymore";
          toast($texttd);
    }
}

// END_OF INFOS' BACK HALL
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