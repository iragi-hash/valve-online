<?php 
include "headers.php";

$sql = "SELECT Acode FROM iDents";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                  if ($pass==$row["Acode"]) {//here it will compare IDs in order to desconnect the admin, if he's the one
                  //cfr last code in functions.php
                
                 $sql = "UPDATE tmpA SET unicAccnt='0' WHERE 1 ";
                 if ($conn->query($sql) === TRUE) {break;} else { echo "Error: " . $sql . "<br>" . $conn->error; }
                    } 
                  } 
                }

                if (isset($_SESSION['vUSER'])) destroySession();
                include_once "headers.php";

                header("Location:login.php");
		        echo"<script type='text/javascript'>
		       window.location.href = 'login.php';
		       </script> ";
?>