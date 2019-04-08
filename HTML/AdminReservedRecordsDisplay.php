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
    <script type="text/javascript" src="../JavaScript/AdminReservedRecordsDisplay.js"></script> 
    <link rel="stylesheet" type="text/css" href="../CSS/AdminReservedRecordsDisplay.css"/>
    <link rel="stylesheet" type="text/css" href="../CSS/backgroundImage3.css"/>

    </head> 
	
	<body>
	
    <header>

    </header>

    <main name="main" id="main">
	 <table  id="table" border="1" style="width:50%">
	 <tr> <th colspan="3">Reserved Apointments</th> </tr>
	 <tr> <th>User</th> <th>Time</th> <th>Cause</th></tr>
	 <?php 
	  $rt->display($result,1);
	 ?>
	 </table>
	 
	 <button id="btn">Go back</button>
	
    </main>

    <footer>

    </footer>

    </body>
	
</html>