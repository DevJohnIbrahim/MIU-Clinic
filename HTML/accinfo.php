<?php 
    session_start();
   if(!isset($_SESSION['username'])){    
    header("Location:loginPage.php");
   }
    require 'db.php';

    if($_SERVER["REQUEST_METHOD"]=="POST" && ($_POST['option']=="delete")){	
        $user=$_SESSION['username'];
         $query="DELETE FROM reservedtime WHERE username='$user'";
          $result=$db->execute($query);    
          header("Location:ProfilePage.php"); 
    }
     if($_SERVER["REQUEST_METHOD"]=="POST" && ($_POST['option']=="logout")){	
         session_destroy();
         header("Location:indexPage.html"); 
    }
?>
<html>
<head>
<title>Account Information</title>   
<link rel="stylesheet" type="text/css" href="../CSS/accinfo.css"/>
<link rel="stylesheet" type="text/css" href="../CSS/backgroundImage1.css"/>
<link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
 
<img src="../images/3.png" id="x1" alt="logo" width="100px" height="100px"/>
<b id="b" >Hello, <?php echo " ",$_SESSION["username"];?></b>
<div id='cssmenu'>
<ul>
   <li><a href="indexPage.html">Home</a></li>
   <li><a href="ProfilePage.php">Reserve</a></li>
   <li class='active'><a href="accinfo.php">Account Information</a></li>
   <li><a href="newsPage.html">News</a></li>
   <li><a href="contactUsPage.html">Contact us</a></li>
   <li><a href="aboutUsPage.html">About us</a></li>
</ul>
    </div>
    <div id='info'>
<?php
$user=$_SESSION['username'];
$query = "SELECT * FROM user where Username='$user'";
$result = $db->execute($query);
    $row=$result->fetch_assoc();
    if($result->num_rows>0) {
		$fname = $row['FirstName'];
        $lname = $row['LastName'];
        $gender = $row['Gender'];
        $age = $row['Age'];
        $mob = $row['MobileNumber'];
        $mail = $row['Email'];
        $username = $row['Username'];
        $pass = $row['Password'];
		echo '<b>Firstname:</b><b>' ," ".$fname.'</b><br><br>';
        echo '<b>Lastname:</b><b>' , " ".$lname.'</b><br><br>';
        echo '<b>Gender:</b><b>' ," ".$gender.'</b><br><br>';
        echo '<b>Age:</b><b>' , " ".$age.'</b><br><br>';
        echo '<b>Mobile:</b><b>' , " ".$mob.'</b><br><br>';
        echo '<b>Email:</b><b>' , " ".$mail.'</b><br><br>';
        echo '<b>Username:</b><b>' , " ".$username.'</b><br><br>';
        echo '<b>Password:</b><b>' , " ".$pass.'</b><br><br>';
	    echo '<hr> </div>';

         }
        else {
        echo 'Error!';
    }
    $user=$_SESSION['username'];
    $query2 = "SELECT time,cause FROM reservedtime where Username='$user'";
    $result2 =$db->execute($query2);
    $row2=$result2->fetch_assoc();
  if($result2->num_rows>0) {
		$time = $row2['time'];
        $cause=$row2['cause'];
		echo '<b>Chosen Session:</b>',$time.'<br>';
        echo '<b>Chosen Cause:</b>',$cause;
      echo'<form name="form1" method="POST" action="'; echo htmlspecialchars($_SERVER["PHP_SELF"]);
      echo '">
    <input type="submit"  name="delete" id="res" value="Delete session" >
    <input type="text"  name="option" value="delete" hidden>   
    </form> ';
	}
      
    ?>
         
    
    <form name="form3" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="submit"  name="logout" id="log" value="logout" > 
    <input type="text"  name="option" value="logout" hidden> 
    </form>       
    
</body>



</html>