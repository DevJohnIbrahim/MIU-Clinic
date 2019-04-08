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
    <script type="text/javascript" src="../JavaScript/AdminScheduleRecordsAdd.js"></script>
    <link rel="stylesheet" type="text/css" href="../CSS/AdminScheduleRecordsAdd.css"/>
	<link rel="stylesheet" type="text/css" href="../CSS/backgroundImage3.css"/>


   <?php

	$day=$month=$year=$dayerr=$montherr=$yearerr=$opentimeerr=$closetimeerr="";
	$opentime=$closetime=$hour=$minutes=0;
        
	if($_SERVER["REQUEST_METHOD"]=="POST"){
			
	  if(empty($_POST["day"])){
		  $dayerr="* Required";
      }
      else{
	    $day=$_POST['day'];
	    }
	  if(empty($_POST["month"])){
		  $montherr="* Required";
      }
      else{
	    $month=$_POST['month'];
	    }
	  if(empty($_POST["year"])){
		  $yearerr="* Required";
      }
      else{
	    $year=$_POST['year'];
	    }
	  if(empty($_POST["opentime"])){
		  $opentimeerr="* Required";
      }
      else{

          $opentime=(int)$_POST['opentime'];
	    }
	  if(empty($_POST["closetime"])){
		  $closetimeerr="* Required";
      }
      else{ 
    
	    $closetime=(int)$_POST['closetime'];
	    }
       if($closetime<$opentime){
           $closetimeerr="* Erorr, close time is before open time";
       } 
      }


    if(($day!="")&&($month!="")&&($year!="")&&($closetime!=0)&&($opentime!=0)&&($closetime>$opentime)){
      $sc->add($db,$day,$month,$year,$closetime,$opentime);
	}  
	 
	 
	?>
    </head> 
	
	<body>
	
    <header>

    </header>

    <main name="main" id="main">
	 <table  id="table" border="2" style="width:15%">
	 <tr> <th>Schedule</th> </tr>
	 <tr> <th>Time</th></tr>
	 <?php 
         $counter1=0;
	 while($rows=$result->fetch_assoc()){
	  echo '<tr> <td>'.$rows["Time"].'</td> </tr>';
         if($counter1==27){
             $counter1=0;
             break;
         }
         $counter1++;
	 } 
	
 
	 ?>
	 </table>
        
     <table  id="table2" border="2" style="width:15%">
	 <tr> <th>Schedule</th> </tr>
	 <tr> <th>Time</th></tr>
	 <?php 
	 while($rows=$result->fetch_assoc()){
	  echo '<tr> <td>'.$rows["Time"].'</td> </tr>';
          if($counter1==27){
             $counter1=0;
             break;
         }
         $counter1++;
	 } 
	
 
	 ?>
	 </table>   
     
      <table  id="table3" border="2" style="width:15%">
	 <tr> <th>Schedule</th> </tr>
	 <tr> <th>Time</th></tr>
	 <?php 
	 while($rows=$result->fetch_assoc()){
	  echo '<tr> <td>'.$rows["Time"].'</td> </tr>';
          if($counter1==27){
             $counter1=0;
             break;
         }
         $counter1++;
	 } 
	
 
	 ?>
	 </table>       
	 
    <table  id="table4" border="2" style="width:15%">
	 <tr> <th>Schedule</th> </tr>
	 <tr> <th>Time</th></tr>
	 <?php 
	 while($rows=$result->fetch_assoc()){
	  echo '<tr> <td>'.$rows["Time"].'</td> </tr>';
          if($counter1==27){
             $counter1=0;
             break;
         }
         $counter1++;
	 } 
	
 
	 ?>
	 </table>
        
     <table  id="table5" border="2" style="width:15%">
	 <tr> <th>Schedule</th> </tr>
	 <tr> <th>Time</th></tr>
	 <?php 
	 while($rows=$result->fetch_assoc()){
	  echo '<tr> <td>'.$rows["Time"].'</td> </tr>';
	 } 
	
 
	 ?>
	 </table> 
        
	 <h2>Add time to schedule</h2>
	 <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" >
	 <b>Choose Day</b>
        <SELECT id="day" name="day" >
        <OPTION Value="">Choose</OPTION>
        <OPTION id="d1" Value="1">1</OPTION>
        <OPTION id="d2" Value="2">2</OPTION>
        <OPTION id="d3" Value="3">3</OPTION>
        <OPTION id="d4" Value="4">4</OPTION>
        <OPTION id="d5" Value="5">5</OPTION>
		<OPTION id="d6" Value="6">6</OPTION>
		<OPTION id="d7" Value="7">7</OPTION>
		<OPTION id="d8" Value="8">8</OPTION>
		<OPTION id="d9" Value="9">9</OPTION>
        <OPTION id="d10" Value="10">10</OPTION>
        <OPTION id="d11" Value="11">11</OPTION>
        <OPTION id="d12" Value="12">12</OPTION>
        <OPTION id="d13" Value="13">13</OPTION>
		<OPTION id="d14" Value="14">14</OPTION>
		<OPTION id="d15" Value="15">15</OPTION>
		<OPTION id="d16" Value="16">16</OPTION>
		<OPTION id="d17" Value="17">17</OPTION>
        <OPTION id="d18" Value="18">18</OPTION>
        <OPTION id="d19" Value="19">19</OPTION>
        <OPTION id="d20" Value="20">20</OPTION>
        <OPTION id="d21" Value="21">21</OPTION>
		<OPTION id="d22" Value="22">22</OPTION>
		<OPTION id="d23" Value="23">23</OPTION>
		<OPTION id="d24" Value="24">24</OPTION>
		<OPTION id="d25" Value="25">25</OPTION>
        <OPTION id="d26" Value="26">26</OPTION>
        <OPTION id="d27" Value="27">27</OPTION>
        <OPTION id="d28" Value="28">28</OPTION>
        <OPTION id="d29" Value="29">29</OPTION>
		<OPTION id="d30" Value="30">30</OPTION>
        <OPTION id="d31" Value="31">31</OPTION>
        </SELECT>  <?php echo"  $dayerr";?>
		<br>
	  <b>Choose Month </b>
        <SELECT id="month" name="month" >
        <OPTION Value="">Choose</OPTION>
        <OPTION id="m1" Value="1">1</OPTION>
        <OPTION id="m2" Value="2">2</OPTION>
        <OPTION id="m3" Value="3">3</OPTION>
        <OPTION id="m4" Value="4">4</OPTION>
        <OPTION id="m5" Value="5">5</OPTION>
		<OPTION id="m6" Value="6">6</OPTION>
		<OPTION id="m7" Value="7">7</OPTION>
		<OPTION id="m8" Value="8">8</OPTION>
		<OPTION id="m9" Value="9">9</OPTION>
        <OPTION id="m10" Value="10">10</OPTION>
        <OPTION id="m11" Value="11">11</OPTION>
        <OPTION id="m12" Value="12">12</OPTION>
		</SELECT>  <?php echo"  $montherr";?>
		<br>
	 <b>Coose Year </b>
        <SELECT id="year" name="year" >
		<OPTION Value="">Choose</OPTION>
        <OPTION id="y17" Value="2017">2017</OPTION>
        <OPTION id="y18" Value="2018">2018</OPTION>
        <OPTION id="y19" Value="2019">2019</OPTION>
        <OPTION id="y20" Value="2020">2020</OPTION>
        <OPTION id="y21" Value="2021">2021</OPTION>
		<OPTION id="y22" Value="2022">2022</OPTION>
		<OPTION id="y23" Value="2023">2023</OPTION>
        </SELECT>  <?php echo"  $yearerr";?>
		<br>
		<b>From</b>
        <SELECT id="opentime" name="opentime" >
        <OPTION Value="">Choose</OPTION>
        <OPTION id="o6" Value="6">6</OPTION>
		<OPTION id="o7" Value="7">7</OPTION>
		<OPTION id="o8" Value="8">8</OPTION>
		<OPTION id="o9" Value="9">9</OPTION>
        <OPTION id="o10" Value="10">10</OPTION>
        <OPTION id="o11" Value="11">11</OPTION>
        <OPTION id="o12" Value="12">12</OPTION>
        <OPTION id="o13" Value="13">13</OPTION>
		<OPTION id="o14" Value="14">14</OPTION>
		<OPTION id="o15" Value="15">15</OPTION>
		<OPTION id="o16" Value="16">16</OPTION>
		<OPTION id="o17" Value="17">17</OPTION>
        <OPTION id="o18" Value="18">18</OPTION>
        <OPTION id="o19" Value="19">19</OPTION>
        <OPTION id="o20" Value="20">20</OPTION>
        <OPTION id="o21" Value="21">21</OPTION>
        <OPTION id="o22" Value="22">22</OPTION>
        <OPTION id="o23" Value="23">23</OPTION>
        <OPTION id="o24" Value="24">24</OPTION>
        </SELECT>  <?php echo"  $opentimeerr";?>
		<br>
	    <b>To</b>
        <SELECT id="closetime" name="closetime" >
        <OPTION Value="">Choose</OPTION>
		<OPTION id="c7" Value="7">7</OPTION>
		<OPTION id="c8" Value="8">8</OPTION>
		<OPTION id="c9" Value="9">9</OPTION>
        <OPTION id="c10" Value="10">10</OPTION>
        <OPTION id="c11" Value="11">11</OPTION>
        <OPTION id="c12" Value="12">12</OPTION>
        <OPTION id="c13" Value="13">13</OPTION>
		<OPTION id="c14" Value="14">14</OPTION>
		<OPTION id="c15" Value="15">15</OPTION>
		<OPTION id="c16" Value="16">16</OPTION>
		<OPTION id="c17" Value="17">17</OPTION>
        <OPTION id="c18" Value="18">18</OPTION>
        <OPTION id="c19" Value="19">19</OPTION>
        <OPTION id="c20" Value="20">20</OPTION>
        <OPTION id="c21" Value="21">21</OPTION>
        <OPTION id="c22" Value="22">22</OPTION>
        <OPTION id="c23" Value="23">23</OPTION>
        <OPTION id="c24" Value="24">24</OPTION>
        </SELECT>  <?php echo"  $closetimeerr";?>
		<br>
		<input type="submit" id="add" value="Add">
	 </form>
	 
	 <button id="btn">Go back</button>
	
    </main>

    <footer>

    </footer>

    </body>
	
</html>