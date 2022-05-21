<?php // header.php 
session_start();
require_once 'functions.php';
$pass=0;
$varth1="modifstyle.css";
$userstr = ("Guest");
//$thema=0;
echo "<!DOCTYPE html>
<html>
<head>
  <meta name='viewport' content='width=device-width , initial-scale=1.0'>
  <link rel='stylesheet'" . "href='bootstrap/css/bootstrap.css' type='text/css' />
  <link rel='stylesheet'" . "href='$varth1' type='text/css' />
    <link rel='stylesheet'" . "href='lightT.css' type='text/css' />
  <link rel='shortcut icon' href='./images/favicon.ico' type='image/x-icon'>
  </head>
  " ;
  
  if (isset($_SESSION['vUSER']) && isset($_SESSION['vPASS'])) {//if user is connected
    $Vuser=$_SESSION['vUSER'];
    $pass=$_SESSION['vPASS'];
    $loggedin = TRUE;  
	  $userstr  = " $Vuser";
	echo "
<title>$userstr</title>
  ";

}

else //if user is not connected
{

echo "<!DOCTYPE html>
<html>
<head>
  <meta name='viewport' content='width=device-width , initial-scale=1.0'>
  <title>$userstr</title>
  <link rel='stylesheet'" . "href='bootstrap/css/bootstrap.css' type='text/css' />
  <link rel='stylesheet'" . "href='modifstyle.css' type='text/css' />
  <link rel='shortcut icon' href='./images/favicon.ico' type='image/x-icon'>
  </head>
  " ;

// header("Location:index.php");
// echo"<script type='text/javascript'>
//     window.location.href = 'index.php';
//     </script> ";
	// echo "
	// <body>
	// <script type='text/javascript'>
	// 	alert('your are not connected, for accessing main ressources here u need to connect yourself');
	// </script>
	// </body>";
}
?>