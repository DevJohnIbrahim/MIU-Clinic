<?php
session_start();
if(!isset($_SESSION["adminname"])){
    header("Location:AdminLoginPage.php");
}
require_once('db.php');
require_once('reservedtime.php');
$result=$db->execute("SELECT * FROM reservedtime");
?>
<!DOCTYPE html>
<html>    
    <head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
	<title></title>
	<script type="text/javascript" src="../JavaScript/jquery-3.2.1.min.js"></script> 
    <script type="text/javascript" src="../JavaScript/AdminReservedRecordsDelete.js"></script>
        <link rel="stylesheet" type="text/css" href="../CSS/AdminReservedRecordsDelete.css"/>
    <link rel="stylesheet" type="text/css" href="../CSS/backgroundImage3.css"/>
   <?php
	 if($_SERVER["REQUEST_METHOD"]=="POST"){	
       $rt->delete($db);
	 } 	 
	?>
    </head> 
	
	<body>
	
    <header>

    </header>

    <main name="main" id="main">
	 <table  id="table" border="1" style="width:50%">
	 <tr> <th colspan="4">Reserved Apointments</th> </tr>
	 <tr> <th>User</th> <th>Time</th> <th>Cause</th>  <th>buttons</th></tr>
	 <?php 
	  $rt->display($result,2);
	 ?>
	 </table>
	 
	 <form method="POST" id="form2" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
	 <input type="text" name="todelete" id="Todelete" >
	 <input type="submit" name="Submit"  >
	 <input name="option" value="delete"  >
	 </form>
	 
	 <p type="hidden" id="tojs" value="<?php echo $rt->Times;?> " ></p>
	
	
    </main>
     <button id="btn">Go back</button>
    <footer>

    </footer>

    </body>
	
</html>