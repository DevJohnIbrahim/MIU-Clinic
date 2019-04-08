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
    <meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
	<title>Admin</title>
    <script type="text/javascript" src="../JavaScript/AdminPage.js"></script> 
    <link rel="stylesheet" type="text/css" href="../CSS/AdminPage.css"/>
    <link rel="stylesheet" type="text/css" href="../CSS/backgroundImage3.css"/>
	
    </head> 
	
	<body>
	<form name="form3" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="submit"  name="delete" id="log" value="logout" > 
    <input type="text"  name="option" value="logout" hidden> 
      </form>  
    <header>
	<button type="button" id="b4" >Home</button>
	<h1>Adminstrative page</h1>
	   
    
    </header>

    <main>
	 
	<button type="button" id="b1" >Patient records </button>
	<br>
	<button type="button" id="b2" >Schedule records </button>
	<br>
	<button type="button" id="b3" >Reserved appointments records </button>
	
    </main>

    <footer>
 
    </footer>

</body>
	
</html>