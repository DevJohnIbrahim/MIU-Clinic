<?php session_start();
   if(isset($_SESSION['username'])){    
    header("Location:ProfilePage.php");
   }
  require_once('db.php');
  require_once('user.php');

?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<title>Login</title>
    <script type="text/javascript" src="../JavaScript/loginPage.js"></script>
    <link rel="stylesheet" type="text/css" href="../CSS/logInPage.css"/>
    <link rel="stylesheet" type="text/css" href="../CSS/backgroundImage1.css"/>
    <link rel="stylesheet" type="text/css" href="styles.css"/>

	<?php
	
	
	if($_SERVER["REQUEST_METHOD"]=="POST"){
         $us->check($db);
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
    <img src="../images/3.png" id="x1" alt="logo" width="100px" height="100px"/>
     <div id='cssmenu'>
<ul>
   <li><a href="indexPage.html">Home</a></li>
   <li ><a href="ProfilePage.php">Reserve</a></li>
   <li ><a href="accinfo.php">Account Information</a></li>
   <li><a href="newsPage.html">News</a></li>
   <li><a href="contactUsPage.html">Contact us</a></li>
   <li><a href="aboutUsPage.html">About us</a></li>
</ul>
    </div>


</header>

<main>
<div class="login1">
<br>
<br>
<br>
<h1 id="head1">LoginIn to  your Account</h1>
<form name="form1" id="form1st"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" >
 <b id="user11">UserName</b>
 <input type="text" id="txt11" name="username" >
 <br>
 <b id="pass22">Password</b>
 <input type="password" id="txt22" name="password" >
 <br>
 <input type="submit" value="Log In" id="login2"><?php echo " $us->err"; ?>
 </form>
 <h2 id="q1">Don't have an account?</h2>
 <br>
 <button type="button" id="signup1">Sign Up</button>
 </div>
</main>

<footer>
 <p class="copyright">© Copyrights Mostafa Ahmed, Mina Wasfy and John Hani 2017</p>
</footer>

</body>

</html>