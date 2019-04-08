<?php
session_start();
if(!isset($_SESSION["adminname"])){
    header("Location:AdminLoginPage.php");
}
if($_SERVER["REQUEST_METHOD"]=="POST" && ($_POST['option']=="logout")){	
         session_destroy();
         header("Location:indexPage.html"); 
    }
?>
<!DOCTYPE html>
<html>    
    <head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
	<title>Schedule Records</title>
    <script type="text/javascript" src="../JavaScript/AdminScheduleRecords.js"></script> 
    <link rel="stylesheet" type="text/css" href="../CSS/AdminScheduleRecords.css"/>
	<link rel="stylesheet" type="text/css" href="../CSS/backgroundImage3.css"/>
    </head> 
	
	<body>
	
    <header>
	<button type="button" id="b4" >Home</button>
	<h1>Available Schedule Records</h1>
	   <form name="form3" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="submit"  name="delete" id="log" value="logout" > 
    <input type="text"  name="option" value="logout" hidden> 
    </form>
    </header>

    <main>
	 
	<button type="button" id="b1" > Add Schedule records </button>
	<br>
	<button type="button" id="b2" > Display Schedule records  </button>
	<br>
	<button type="button" id="b3" > Delete Schedule records  </button>
	<br>
    </main>
    <button type="button" id="bac" > Go back  </button>    

    <footer>
 
    </footer>

</body>
	
</html>