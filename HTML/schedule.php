<?php
class schedule{
	public $var1;
	public $var2;
    public $Times;
	function __construct(){
        $this->var1=0;
        $this->var2=[];
        $this->Times="";
	}
	
	public function display($result,$number){
        
	   
     if($number==1){
          $counter1=0;
          while($rows=$result->fetch_assoc()){
	          echo '<tr> <td>'.$rows["Time"].'</td> </tr>';
              if($counter1==27){
                $counter1=0;
                break;
              }
              $counter1++;
	      } 
        }
        
    else if($number==2){
         while($rows=$result->fetch_assoc()){
	        echo '<tr> <td>'.$rows["Time"].'</td> </tr>';
	     } 
        }
        
    else if($number==3){
            $counter1=0;
	       while($rows=$result->fetch_assoc()){
	            echo '<tr> <td>'.$rows["Time"].'</td> <td><button id="'.$this->var1.'">Delete</button> </td></tr>';
                if($counter1==26){
                $counter1=0;
                $this->var2[$this->var1]=$rows['Time'];
	            $this->var1++;
                break;
                }
           $counter1++;
	      $this->var2[$this->var1]=$rows['Time'];
	       $this->var1++;
	       }  
        }
        
    else if($number==4){
        $counter1=0;
        while($rows=$result->fetch_assoc()){
	         echo '<tr> <td>'.$rows["Time"].'</td> <td><button id="'.$this->var1.'">Delete</button> </td></tr>';
	         $this->var2[$this->var1]=$rows['Time'];
	         $this->var1++;
       } 
	   return $Times=implode('`',$this->var2); 
	}
    }
    
    public function delete($db){
        $sql='Delete FROM schedule where Time="'.$_POST["todelete"].'"';
		$result1=$db->execute($sql);
			if($result1===true){
			?>
			<script>alert("<?php echo "Deleted Successfully"; ?>");</script>
		<?php
		
		 echo "<meta http-equiv='refresh' content='0'>";
		
		}
		
		else{
			?>
			<script>alert("<?php echo "Error deleting"; ?>");</script>
	<?php
		}
	}
    
    public function add($db,$day,$month,$year,$closetime,$opentime){
        $hour=$opentime;
        $minutes=0;
			$count=0;
            $cond=true;
         while ($hour<$closetime){    
	$sql3="INSERT INTO schedule(Time) VALUES('$year-$month-$day $hour-$minutes-00')  ";
        if($db->execute($sql3)!=true){
             $cond=false;
	  }
	//echo $sql3;
        $count++;
        if($count==4){
            $count=0;
            $hour++;
        }
        $minutes=$minutes+15;
        if($minutes==60){
            $minutes=0;
        }
    }
        
     if($cond===true){
		  ?>
		  <script>alert("<?php echo "New Records Added"; ?>");</script>
		  <?php
		  echo "<meta http-equiv='refresh' content='0'>";
	  }
	  else{
	    ?>
		  <script>alert("<?php echo "Error, some/all of the times are Already written "; ?>");</script>
		  <?php
		   echo "<meta http-equiv='refresh' content='0'>";
	  }     
        
        
        
        
	}
    
    function __destruct(){

	}
  
}
$sc=new schedule();
?>