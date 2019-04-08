<?php
session_start();
if(!isset($_SESSION["adminname"])){
    header("Location:AdminLoginPage.php");
}
require_once('db.php');
require_once('schedule.php');
$result=$db->execute("SELECT * FROM schedule");
?>
<!DOCTYPE html>
<html>    
    <head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title></title>
	<script type="text/javascript" src="../JavaScript/jquery-3.2.1.min.js"></script> 
    <script type="text/javascript" src="../JavaScript/AdminScheduleRecordsDisplay.js"></script> 
    <link rel="stylesheet" type="text/css" href="../CSS/AdminScheduleRecordsDisplay.css"/>
	<link rel="stylesheet" type="text/css" href="../CSS/backgroundImage3.css"/>
        
    </head> 
	
	<body>
	
    <header>

    </header>

    <main name="main" id="main">
		 <table  id="table" border="2" style="width:15%">
	 <tr> <th>Schedule</th> </tr>
	 <tr> <th>Time</th></tr>
	  <?php 
	  $sc->display($result,1);
	 ?>
	 </table>
        
     <table  id="table2" border="2" style="width:15%">
	 <tr> <th>Schedule</th> </tr>
	 <tr> <th>Time</th></tr>
	 <?php 
	  $sc->display($result,1);
	 ?>
	 </table>   
     
      <table  id="table3" border="2" style="width:15%">
	 <tr> <th>Schedule</th> </tr>
	 <tr> <th>Time</th></tr>
	 <?php 
	 $sc->display($result,1);
	 ?>
	 </table>       
	 
    <table  id="table4" border="2" style="width:15%">
	 <tr> <th>Schedule</th> </tr>
	 <tr> <th>Time</th></tr>
	 <?php 
     $sc->display($result,1);
	 ?>
	 </table>
        
     <table  id="table5" border="2" style="width:15%">
	 <tr> <th>Schedule</th> </tr>
	 <tr> <th>Time</th></tr>
	 <?php 
	 while($rows=$result->fetch_assoc()){
	  echo '<tr> <td>'.$rows["Time"].'</td> </tr>';
	 } 
	  $sc->display($result,1);
	 ?>
	 </table>
	 
	 <button id="btn">Go back</button>
	
    </main>

    <footer>

    </footer>

    </body>
	
</html>