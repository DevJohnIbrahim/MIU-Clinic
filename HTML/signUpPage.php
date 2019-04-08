<?php
        require_once('db.php');
        require_once('user.php');
        ?>
<!DOCTYPE html>
<html>    
    <head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title>Signup</title>
    <script type="text/javascript" src="../JavaScript/signUpPage.js"></script> 
    <link rel="stylesheet" type="text/css" href="../CSS/signUpPage.css"/>
    <link rel="stylesheet" type="text/css" href="../CSS/backgroundImage1.css"/>
        <link rel="stylesheet" type="text/css" href="styles.css"/>
        
	
	<?php
		if($_SERVER["REQUEST_METHOD"]=="POST"){
	    $us->add($db);  
	}
	
	?>
	
    </head> 
	
	<body>
	
    <header>
    <img src="../images/3.png" id="x1" alt="logo" width="100px" height="100px"/>
     <div id='cssmenu'>
    <ul>
   <li ><a href="indexPage.html">Home</a></li>
   <li ><a href="ProfilePage.php">Reserve</a></li>
   <li ><a href="accinfo.php">Account Information</a></li>
   <li><a href="newsPage.html">News</a></li>
   <li><a href="contactUsPage.html">Contact us</a></li>
   <li><a href="aboutUsPage.html">About us</a></li>
    </ul>
        </div>
    </header>

    <main class="topnav"   id="mytopnav">
	 
		<fieldset id="so" >
		<legend id="mo">Personal Information</legend>
		<form  id="form1st" name="form1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" >     
		   
        <b>First Name </b>
		<br>
		<input type="text" name ="firstname" placeholder="First Name" value="<?php echo $us->firstname; ?>" > <?php echo"  $us->firstnameerr";?>
		<br><br>
		<b>Last Name </b>
		<br>
		<input type="text" name ="lastname" id="s" placeholder="Last Name" value="<?php echo  $us->lastname; ?>" > <?php echo"  $us->lastnameerr";?>
		<br><br>
        <b>Gender </b><?php echo" $us->gendererr";?>
        <br>
		<input type="radio" name ="gender" value ="Male"  <?php echo  $us->rb1; ?>><b>male</b>
		<br>
		<input type="radio" name ="gender" value ="Female"  <?php echo  $us->rb2; ?>><b>female</b>
		<br><br>
		<b>Mobile Number </b>
		<br>
		<input type="text" name ="code" value ="002" size ="2" maxlength="3"readonly>
	    <input type="text" name ="mobile" maxlength="11" id="kddd"  placeholder="Numbers only" value="<?php echo  $us->mobile; ?>" ><?php echo"  $us->mobileerr";?>
        <br><br>
        <b>AGE </b>
        <SELECT id="1" name="age" value="<?php echo  $us->age; ?>">
        <OPTION Value="">Choose</OPTION>
        <OPTION Value="Under 16" <?php echo  $us->op1; ?>>Under 16</OPTION>
        <OPTION Value="16 to 25" <?php echo  $us->op2; ?>>16 to 25</OPTION>
        <OPTION Value="26 to 40" <?php echo  $us->op3; ?>>26 to 40</OPTION>
        <OPTION Value="40 to 60" <?php echo  $us->op4; ?>>40 to 60</OPTION>
        <OPTION Value="Over 60"  <?php echo  $us->op5; ?> >Over 60</OPTION>
        </SELECT> <?php echo"   $us->ageerr";?>
        <br><br>
		
       
		<div id="AA12">
         <b>E-mail</b> <br>
		<input type="text" name ="email" id="myy" placeholder="E-mail" value="<?php echo  $us->email; ?>"><?php echo"  $us->emailerr";?> <br>
		<b>username</b> <br>
		<input type="text" name ="username" id="username" placeholder="User Name" value="<?php echo $us->username; ?>"><?php echo "$us->usernameerr";?> 
		<br><br>
        <b>Password</b> <br>
        <input type="password" name ="password" placeholder="Password" value="<?php echo  $us->password; ?>"><?php echo"  $us->passworderr";?>
        <br><br>
        <b>Confirm Password</b><br>
        <input type="password" name ="confirmpassword" placeholder="Confirm Password" value="<?php echo  $us->confirmpassword; ?>"><?php echo" $us->confirmpassworderr";?>
		</div>
        </fieldset>  
		
        <fieldset id="my" >
        <legend id="myid">Clinic Questions</legend>
       <br><br><b>Are you having any chornic disease</b> 
        <br>
		<SELECT id="1" name="dis">
		<OPTION Value="">Choose</OPTION>
        <OPTION Value="Diabetes insipidus">Diabetes insipidus</OPTION>
        <OPTION Value="Crohns disease">Crohn's disease </OPTION>
        <OPTION Value="Diabetes mellitus types 1 & 2">Diabetes mellitus types 1 & 2</OPTION>
        <OPTION Value="Addisons disease">Addison's disease</OPTION>
        <OPTION Value="Glaucoma">Glaucoma</OPTION>
        <OPTION Value="Hyperlipidaemia">Hyperlipidaemia</OPTION>
        <OPTION Value="Cardiac failure">Cardiac failure</OPTION>
        <OPTION Value="Hypothyroidism">Hypothyroidism</OPTION>
        <OPTION Value="Systemic lupus erythematosus">Systemic lupus erythematosus</OPTION>
        </SELECT>
            <br><br><br>
        <b>Are you having any other diseases?</b>
		<br>
		<textarea name ="diseases" cols="30" rows="5" ></textarea>
		<br><br>
        <input type="submit" value="Sign Up" id="sub">
		</form>
		<br><br>
		<b id="q1">Already have an account?</b>
		<br><br>
		 <button type="button" id="signin1">Log In</button>
        </fieldset>
	
</main>

<footer>
 <p class="copyright">© Copyrights Mostafa Ahmed, Mina Wasfy and John Hani 2017</p>
</footer>

</body>
</html>