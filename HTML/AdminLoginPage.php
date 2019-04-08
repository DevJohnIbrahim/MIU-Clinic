<?php
session_start();
if(isset($_SESSION["adminname"])){
    header("Location:AdminPage.php");
}
require_once('db.php');
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<title>Login</title>
<script type="text/javascript" src="../JavaScript/loginPage.js"></script>
<link rel="stylesheet" type="text/css" href="../CSS/AdminLoginPage.css"/>
<link rel="stylesheet" type="text/css" href="../CSS/backgroundImage3.css"/>

	<?php
	$err=$adminname=$adminpassword="";
	
	if($_SERVER["REQUEST_METHOD"]=="POST"){
   if(empty($_POST["adminname"])||empty($_POST["adminpassword"])){
	$err="Write your Adminname and password!";
    }
    else{
	$adminname=valid($_POST["adminname"]);
	$adminpassword=$_POST["adminpassword"];
         
		  $result=$db->execute("SELECT COUNT(adminname) FROM admin WHERE adminname='$adminname' AND adminpassword='$adminpassword'; ");
		  
		  $row = $result->fetch_assoc();
		  if($row['COUNT(adminname)']==0){
			 $err="Incorrect Adminname or Password!";
	   	     $adminname=""; 
			 $adminpassword=""; 
		  }
		  else{
			  	
	        	$_SESSION["adminname"]=$adminname;
				header("Location:AdminPage.php");
		      exit;
		  }
	
    }
	}
    function valid($data){
	 $data=trim($data);
	 $data=stripslashes($data);
	 $data=htmlspecialchars($data);
	 return $data;
    }
	?>
</head>

<body>
<header>
</header>

<main>
<div class="login1">
<h1 id="head1">LoginIn to  Admin Page</h1>
<form name="form1" id="form1st"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" >
 <b id="user11">AdminName</b>
 <input type="text" id="txt11" name="adminname" >
 <br>
 <b id="pass22">Password</b>
 <input type="password" id="txt22" name="adminpassword" >
 <br>
 <input type="submit" value="Log In" id="login2"><?php echo "$err"; ?>
 </form>
 </div>
</main>

<footer>
</footer>

</body>

</html>