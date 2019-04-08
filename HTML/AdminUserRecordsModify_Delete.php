<?php
session_start();
if(!isset($_SESSION["adminname"])){
    header("Location:AdminLoginPage.php");
}
require_once('db.php');
require_once('user.php');
$result=$db->execute("SELECT * FROM user");
?>
<!DOCTYPE html>
<html>    
    <head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
	<title></title>
	<script type="text/javascript" src="../JavaScript/jquery-3.2.1.min.js"></script> 
    <script type="text/javascript" src="../JavaScript/AdminUserRecordsModify_Delete.js"></script>
    <link rel="stylesheet" type="text/css" href="../CSS/AdminUserRecords.css"/>
	<link rel="stylesheet" type="text/css" href="../CSS/backgroundImage3.css"/>

   <?php
  
	$records;
	$var1=0;

		if(($_SERVER["REQUEST_METHOD"]=="POST") && ($_POST['option']=="delete")){
        $us->delete($db);
        }
		
		if(($_SERVER["REQUEST_METHOD"]=="POST") && ($_POST['option']=="update")){
	    $us->update($db);
	    }

	 
	?>
    </head> 
	
	<body>
	
    <header>

    </header>

    <main name="main" id="main">
	 <table border="2" id="table" style="width:70%">
	 <tr> <th colspan="4">Patient</th>  </tr>
	 <tr> <th>Name</th> <th>Email</th> <th>Username</th> <th>Buttons</th> </tr>
	 <?php 
	  $users= $us->display($result);
	 ?>
	 </table>
	 <button id="btn">Go back</button>
	 <form method="POST" id="form2" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
	 <input type="text" name="todelete" id="Todelete" >
	 <input type="submit" name="Submit"  >
	 <input name="option" value="delete"  >
	 </form>
	 
	 <p type="hidden" id="tojs" value="<?php echo $users;?> " ></p>
	 
	 <form  id="form1st" name="form1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" > 
         
        <fieldset id="so" >
		<legend id="mo">Personal Information</legend> 
            
        <b>First Name </b>
		<br>
		<input type="text" name ="firstname" id="Fname" placeholder="First Name"  > 
		<br><br>
		<b>Last Name </b>
		<br>
		<input type="text" name ="lastname" id="Lname" placeholder="Last Name"  > 
		<br><br>
        <b>Gender </b>
        <br>
		<input type="radio" id="M" name ="gender" value ="Male" ><b>male</b>
		<br>
		<input type="radio" id="Fe" name ="gender" value ="Female" ><b>female</b>
		<br><br>
		<b>Mobile Number </b>
		<br>
		<input type="text" name ="code" value ="002" size ="2" maxlength="3"readonly>
	    <input type="text" name ="mobile" maxlength="11" id="mobile"  placeholder="Numbers only"  >
        <br><br>
        <b>AGE </b>
        <SELECT id="age" name="age" >
        <OPTION Value="">Choose</OPTION>
        <OPTION id="A16" Value="Under 16">Under 16</OPTION>
        <OPTION id="A25" Value="16 to 25">16 to 25</OPTION>
        <OPTION id="A40" Value="26 to 40">26 to 40</OPTION>
        <OPTION id="A60" Value="40 to 60">40 to 60</OPTION>
        <OPTION id="A60+" Value="Over 60">Over 60</OPTION>
        </SELECT>
        <br><br>
        <b>E-mail</b> <br>
		<input type="text" name ="email" id="email" placeholder="E-mail" > <br>
		<b>username</b> <br>
		<input type="text" name ="username" id="username" placeholder="User Name" readonly>
		<br><br>
        <b>Password</b> <br>
        <input type="password" name ="password" id="password" placeholder="Password" >
        <br><br>
        <b>Confirm Password</b><br>
        <input type="password" name ="confirmpassword" id="confirmpassword" placeholder="Confirm Password" >
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
        <b>your disease is not listed?</b>
		<br>
		<textarea name ="diseases" cols="80" rows="10" id="diseases" ></textarea>
		<br><br>
         
        <input name="option" value="update" style="display:none;" >
        <input type="hidden" name="up" id="up">
        <input type="submit" value="Update" id="sub">
        
         </fieldset>
	   
		</form> 
	  
    </main>

    <footer>

    </footer>

    </body>
	
</html>