<?php
class reservedtime{
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
           while($rows=$result->fetch_assoc()){
	           echo '<tr> <td>'.$rows["username"].'</td> <td>'.$rows["time"].'</td> <td>'.$rows["cause"].'</td></tr>';
	       }   
        }
        else if($number==2){
             while($rows=$result->fetch_assoc()){
	         echo '<tr> <td>'.$rows["username"].'</td> <td>'.$rows["time"].'</td>  <td>'.$rows["cause"].'</td> <td><button id="'. $this->var1.'">Delete</button> </td></tr>';
	         $this->var2[ $this->var1]=$rows['username'];
	         $this->var1++;
	         } 
	        $this->Times=implode('`', $this->var2);
        }
    }
    
    public function delete($db){
        
      	     
		$sql1="Delete FROM reservedtime where username='".$_POST["todelete"]."'";

		$result1=$db->execute($sql1);
		
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
    
    function __destruct(){

	}
  
}
$rt=new reservedtime();
?>