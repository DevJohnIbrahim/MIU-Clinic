<?php 
 require 'db.php';
    session_start();
    if(!isset($_SESSION['username'])){    
    header("Location:loginPage.php");
    }
$user=$_SESSION['username'];
$query="SELECT COUNT(username) FROM reservedtime WHERE username='$user'" ;
$res = $db->execute($query);
$row=$res->fetch_assoc();
if(!$row['COUNT(username)']==0)
{
    header("Location:accinfo.php");
}
   
?>
<!doctype html>
<html>
<head>
<title>Profile</title>
<link rel="stylesheet" type="text/css" href="../CSS/ProfilePage.css"/>
<link rel="stylesheet" type="text/css" href="../CSS/backgroundImage1.css"/>
<link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
  <?php
    $sess=$cause="";
    if($_SERVER["REQUEST_METHOD"]=="POST" && ($_POST['option']=="add")){
        $user=$_SESSION['username'];
        if(!empty($_POST['session'])){
            $sess=$_POST['session'];
        }
        if(!empty($_POST['cause'])){
            $cause=$_POST['cause']; 
        }
        
       if($cause!=""&&$sess!=""){
        $qry="INSERT INTO reservedtime(username,time,cause) VALUES('$user','$sess','$cause')" ; 
        if($db->execute($qry))
                {
                 header("Location:accinfo.php");
                }
        else{
            echo '<p style="background:#47c9af;color:#fff;font-size:40px;">Error in Register!</p>';
         }
       }
        
            }
    else if($_SERVER["REQUEST_METHOD"]=="POST" && ($_POST['option']=="logout")){	
         session_destroy();
         header("Location:indexPage.html"); 
    }
    ?>
<body>
<header>
<img src="../images/3.png" id="x1" alt="logo" width="100px" height="100px"/>
<b id="bb" >Hello,<?php echo " ",$_SESSION["username"];?></b>

    <div id='cssmenu'>
<ul>
   <li><a href="indexPage.html">Home</a></li>
   <li class='active'><a href="ProfilePage.php">Reserve</a></li>
   <li ><a href="accinfo.php">Account Information</a></li>
   <li><a href="newsPage.html">News</a></li>
   <li><a href="contactUsPage.html">Contact us</a></li>
   <li><a href="aboutUsPage.html">About us</a></li>
</ul>
    </div>
</header>
    
   <form name="form3" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="submit"  name="delete" id="log" value="logout" > 
    <input type="text"  name="option" value="logout" hidden> 
    </form>
    
<form name="form2" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
<fieldset id="fieldset1"> 
<legend><h1>Patient Guide</h1></legend>
<b>What Do you complain of?</b>
<br><br>
<input type="radio" name="cause" value="Complain of Hot & Cold tooth ache">Complain of Hot & Cold tooth ache.
<br><br>
<input type="radio" name="cause" value="Complain of Too much sugar tooth ache">Complain of Too much sugar tooth ache.
<br><br>
<input type="radio" name="cause" value="Complain of Tooth ache when sleeping">Complain of Tooth ache when sleeping.
<br><br>
<input type="radio" name="cause" value="Complain of High tooth and tooth ache">Complain of High tooth and tooth ache.
<br><br>
<div class="v1">    
<input type="radio" name="cause" value="Complain of Headache with tooth ache">Complain of Headache with tooth ache.
<br><br>
<input type="radio" name="cause" value="Complain of Bleeding in Gum">Complain of Bleeding in Gum.
<br><br>
<input type="radio" name="cause" value="Complain of Bad smell in mouth">Complain of Bad smell in mouth.
<br><br>
<input type="radio" name="cause" value="Complain of Looseness of teeth">Complain of Looseness of teeth.
<br><br>
<input type="radio" name="cause" value="Others">Others.
<br><br>    
</div>    
</fieldset>    

<fieldset>    
<center>
<table  style="height 50px" width="100%"><caption>
<h3 style="background:#f4a742;color:#fff;font-size:20px;"><strong>Schedule Time</strong></h3>
</caption>
    
<tr>
    <?php
    $counter=0;
$query = "SELECT Time FROM schedule";    
$result = $db->execute($query);
    if($result->num_rows>0) {
	while ($row = $result-> fetch_assoc()) {
		$time = $row['Time'];
        $query2="SELECT COUNT(username) FROM reservedtime WHERE time='$time'";
        $result2 = $db->execute($query2);
        $row2=$result2->fetch_assoc();
        if($row2['COUNT(username)']==0){
            
           echo '<td style="background:#f48c41;color:#fff;text-align:center;"><strong><input type="radio" value="'.$time.'" name="session">' ,$time.'</strong</td>'; 
            $counter++;
            if($counter==9){
               echo '</tr> <tr>'; 
                $counter=0;
            }
          
        }
        
    }
        echo '</tr> '; 
}
    ?>

 
</tr>
</table>
<br><br>
<input type="submit" name="submit" id="res" value="reserve">
</center>
</fieldset>    
      <input type="text"  name="option" value="add" hidden> 
</form>
    
    
</body>
</html>