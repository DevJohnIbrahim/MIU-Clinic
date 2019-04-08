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
    <script type="text/javascript" src="../JavaScript/AdminScheduleRecordsDelete.js"></script>
    <link rel="stylesheet" type="text/css" href="../CSS/AdminScheduleRecordsDelete.css"/>
	<link rel="stylesheet" type="text/css" href="../CSS/backgroundImage3.css"/>
   <?php

	
		if($_SERVER["REQUEST_METHOD"]=="POST"){		
        
		$sc->delete($db);
        }
	?>
    </head> 
	
	<body>
	
    <header>

    </header>

    <main name="main" id="main">
	 <table  id="table" border="2" style="width:17%">
	 <tr> <th colspan="3">Schedule</th> </tr>
	 <tr> <th>Time</th> <th>buttons</th></tr>
	 <?php 
      $sc->display($result,3);
	 ?>
	 </table>
        
     <table  id="table2" border="2" style="width:17%">
	 <tr> <th colspan="3">Schedule</th> </tr>
	 <tr> <th>Time</th> <th>buttons</th></tr>
	 <?php 
	 $sc->display($result,3);
	 ?>
	 </table>
        
        
    <table  id="table3" border="2" style="width:17%">
	 <tr> <th colspan="3">Schedule</th> </tr>
	 <tr> <th>Time</th> <th>buttons</th></tr>
	 <?php 
	 $sc->display($result,3);
	 ?>
	 </table>
        
        
    <table  id="table4" border="2" style="width:17%">
	 <tr> <th colspan="3">Schedule</th> </tr>
	 <tr> <th>Time</th> <th>buttons</th></tr>
	 <?php 
	 $sc->display($result,3);
	 ?>
	 </table>
        
        
    <table  id="table5" border="2" style="width:17%">
	 <tr> <th colspan="3">Schedule</th> </tr>
	 <tr> <th>Time</th> <th>buttons</th></tr>
	 <?php 
	 $sc->Times=$sc->display($result,4);
	 ?>
	 </table>    
        
        
	 
	 <form method="POST" id="form2" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
	 <input type="text" name="todelete" id="Todelete" >
	 <input type="submit" name="Submit"  >
	 <input name="option" value="delete"  >
	 </form>
	 
	 <p type="hidden" id="tojs" value="<?php echo $sc->Times;?> " ></p>
	 <button id="btn">Go back</button>
	
    </main>

    <footer>

    </footer>

    </body>
	
</html>