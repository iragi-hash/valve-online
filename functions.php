<?php

$dbname= "ValveDB2";
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$appname= " VALVE";
// Create connection


       
 $conn = new mysqli($servername, $username, $password);
  // Check connection 
 if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); } 
 echo " &nbsp;";


 $sql = "CREATE DATABASE ValveDB2"; 
 if ($conn->query($sql) === TRUE) { echo "&nbsp;"; } //else { echo $conn->error;}


mysqli_select_db($conn ,$dbname)
or die("Unable to select database: ");
echo "&nbsp; &nbsp;";

function destroySession() {  
  $_SESSION=array();
    if (session_id() != "" || isset($_COOKIE[session_name()])) 
           setcookie(session_name(), '', time()-2592000, '/');
    session_destroy();
                
}

function sanitizeString($var) { 
   $var = strip_tags($var); 
      $var = htmlentities($var);  
        $var = stripslashes($var);  
          return ($var); 
      }#mysqli_real_escape_string
 
function showProfile($user) {  
  if (file_exists("$user.jpg"))    
      #echo "<img src='$user.jpg' align='left' />yuyuyu $user";
      #echo"$text"
     
    $sql = "SELECT * FROM profiles WHERE user='$user'";
    $result = "SELECT user FROM profiles WHERE user='$user'";
    
    if ($result)  
      {   $row  = mysqli_fetch_row($result);    
          echo stripslashes($row[1]) . "<br clear=left /><br/>";  
            } 
      }

      function toast($sometext){
        ?>
            <body>
             <div id="snackbar" > <?php echo$sometext; ?> </div>
             <script type="text/javascript">

              function myFunction() {
                // var x = document.getElementsByClassName('snackbar')[0];
                var x = document.getElementById("snackbar");
                x.className = "show";
                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                
                 window.onload = function() {
                 if(!window.location.hash) {
                 window.location = window.location + '#rf';
                 window.location.reload();
                 }
                }

                                }
             myFunction()
           </script>
            </body>
            <?php
      }




  $sql = "CREATE TABLE IF NOT EXISTS iDents(
               usernames VARCHAR(160),              
               passwords VARCHAR(160),
               profilesImg  VARCHAR(160),
               Acode VARCHAR(16),              
               Ecode VARCHAR(16),
               Scode VARCHAR(16),
               AEmails VARCHAR(90),
               SEmails VARCHAR(90),                            
               INDEX(usernames(6)))";   
  if ($conn->query($sql) === TRUE) { echo ""; } 
  else { echo "Error: " . $sql . "<br>" . $conn->error; }

  // $sql = "CREATE TABLE IF NOT EXISTS iDs(
  //              Acode VARCHAR(16),              
  //              Ecode VARCHAR(16),
  //              Scode VARCHAR(16),              
  //              INDEX(Scode(6)))";   
  // if ($conn->query($sql) === TRUE) { echo "\n"; } 
  // else { echo "Error: " . $sql . "<br>" . $conn->error; }

  // $sql = "CREATE TABLE IF NOT EXISTS Emails(
  //              AEmails VARCHAR(16),
  //              SEmails VARCHAR(16))";              
  // if ($conn->query($sql) === TRUE) { echo "\n"; } 
  // else { echo "Error: " . $sql . "<br>" . $conn->error; }

   $sql = "CREATE TABLE IF NOT EXISTS Timetables(
               courses VARCHAR(16),              
               exams VARCHAR(16))";   
  if ($conn->query($sql) === TRUE) { echo "\n"; } 
  else { echo "Error: " . $sql . "<br>" . $conn->error; }

   $sql = "CREATE TABLE IF NOT EXISTS info(
               docsNames VARCHAR(16),              
               comments VARCHAR(16))";   
  if ($conn->query($sql) === TRUE) { echo "\n"; } 
  else { echo "Error: " . $sql . "<br>" . $conn->error; }


  $sql = "CREATE TABLE IF NOT EXISTS transcripts(
               transcriptsn VARCHAR(16),              
               Scode VARCHAR(16))";   
  if ($conn->query($sql) === TRUE) { echo " \n"; } 
  else { echo "Error: " . $sql . "<br>" . $conn->error; }

//the cod query below is to ensure that there is only one Admin's active account online on one device, so that no one else will be able to connect himself as admin elsewhere
  $sql = "CREATE TABLE IF NOT EXISTS tmpA(            
               unicAccnt VARCHAR(1))";   
  if ($conn->query($sql) === TRUE) { echo " \n"; } 
  else { echo "Error: " . $sql . "<br>" . $conn->error; } 


       ?>
