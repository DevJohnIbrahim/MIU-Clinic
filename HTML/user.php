<?php
class user{
	public $var1;
	public $var2;
    public $Times;
    public $username;
    public $usernameerr;
    public $firstname;
    public $lastname;
    public $gender;
    public $gendererr;
    public $mobile;
    public $mobileerr;
    public $email;
    public $age;
    public $password;
    public $confirmpassword;
    public $diseases;
	public $cond;
    public $firstnameerr;
    public $lastnameerr;
    public $emailerr;
    public $ageerr;
    public $passworderr;
    public $confirmpassworderr;
	public $op1;
    public $op2;
    public $op3;
    public $op4;
    public $op5;
    public $rb1;
    public $rb2;
    public $err;
	function __construct(){
        $this->var1=0;
        $this->records=[];
        $this->Times="";
        $this->username="";
        $this->usernameerr="";
        $this->firstname="";
        $this->lastname="";
        $this->gender="";
        $this->gendererr="";
        $this->mobile="";
        $this->mobileerr="";
        $this->email="";
        $this->age="";
        $this->password="";
        $this->confirmpassword="";
        $this->diseases="";
        $this->cond=true;
        $this->firstnameerr="";
    $this->lastnameerr="";
    $this->emailerr="";
    $this->ageerr="";
    $this->passworderr="";
    $this->confirmpassworderr="";
	$this->op1="";
    $this->op2="";
    $this->op3="";
    $this->op4="";
    $this->op5="";
    $this->rb1="";
    $this->rb2="";
    $this->err="";
	}
    
    
    public function check($db){
       if(empty($_POST["username"])||empty($_POST["password"])){
	$this->err="Write your username and password!";
    }
    else{
	$this->username=$this->valid($_POST["username"]);
	$this->password=$_POST["password"];
	 $sql="SELECT COUNT(Username) FROM user WHERE Username='$this->username' AND Password='$this->password'; ";
		  $result=$db->execute($sql);
		  $result->num_rows;
		  $row = $result->fetch_assoc();
		  if($row['COUNT(Username)']==0){
			 $this->err="Incorrect Username or Password!";
	   	     $this->username=""; 
			 $this->password=""; 
		  }
		  else{
			  	session_start(); 
	        	$_SESSION["username"]=$this->username;
			  header("Location:ProfilePage.php");
		      exit;
		  }
    }
    }
    
    public function add($db){
      if(empty($_POST["firstname"])){
	    $this->firstnameerr="Requiered";
      }
      else{
	    $this->firstname=$this->valid($_POST["firstname"]);
	    if(!preg_match("/^[a-zA-Z]*$/",$this->firstname)){
		  $this->firstnameerr="Only Letters and wightspaces are Allowed!";
		  $this->firstname="";
	    }
      }
	  if(empty($_POST["lastname"])){
	    $this->lastnameerr="Requiered";
      }
      else{
	    $this->lastname=$this->valid($_POST["lastname"]);
	    if(!preg_match("/^[a-zA-Z]*$/",$this->lastname)){
		  $this->lastnameerr="Only Letters and wightspaces are Allowed!";
		  $this->lastname="";
	    }
      }
      if(empty($_POST["email"])){
	    $this->emailerr="Requiered";
      }
      else{
	  $this->email=valid($_POST["email"]);
	  if(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
		 $this->emailerr="Inavlid email format";
	   	$this->email="";
	  }
	  else{
		  $sql="SELECT COUNT(Username) FROM user WHERE Email='$this->email'; ";
		  $result=$db->execute($sql);
		  $result->num_rows;
		  $row = $result->fetch_assoc();
		  if($row['COUNT(Username)']>0){
			 $this->emailerr="Email already in use";
	   	     $this->email=""; 
		  }
	  }
    }
	if(empty($_POST["password"])){
	  $this->passworderr="* Requiered";
    }
	else{
	  $this->password=$_POST["password"];
	}
	if(empty($_POST["mobile"])){
	  $this->mobileerr="* Requiered";
    }
	else{
	  $this->mobile=$_POST["mobile"];
	  $sql="SELECT COUNT(Username) FROM user WHERE MobileNumber='$this->mobile'; ";
		  $result=$db->execute($sql);
		  $result->num_rows;
		  $row = $result->fetch_assoc();
		  if($row['COUNT(Username)']>0){
			 $this->mobileerr="Mobile number already in use";
	   	     $this->mobile=""; 
		  }
	}
	if(empty($_POST["confirmpassword"])){
	  $this->confirmpassworderr="* Requiered";
    }
	else if(!empty($_POST["password"])){
	$this->confirmpassword=$_POST["confirmpassword"];
	  if($this->password!=$this->confirmpassword){
	  $this->confirmpassworderr="Passwords don't match";
	  $this->password="";
	  $this->confirmpassword="";
	  }
	}
    if(empty($_POST["gender"])){
	$this->gendererr="* Requiered";
    }
    else{
	$this->gender=$this->valid($_POST["gender"]);
	if($this->gender=="Male"){
		$this->rb1="checked";
	}
	else if($this->gender=="Female"){
		$this->rb2="checked";
	}
    }

	if(!empty($_POST["diseases"])){
	$this->diseases=$this->valid($_POST["diseases"]);
    }
	else if(!empty($_POST["dis"])){
	$this->diseases=$_POST["dis"];
    }
	else if($this->diseases==""){
	$this->diseases="none";
    }
    
	if(empty($_POST["age"])){
	$this->ageerr="* Requiered";
    }
    else{
	$this->age=$this->valid($_POST["age"]);
	if($this->age=="Under 16"){
		$this->op1="selected";
	}
	else if($this->age=="16 to 25"){
		$this->op2="selected";
	}
	else if($this->age=="26 to 40"){
		$this->op3="selected";
	}
	else if($this->age=="40 to 60"){
		$this->op4="selected";
	}
	else if($this->age=="Over 60"){
		$this->op5="selected";
	}
    }
	if(empty($_POST["username"])){
	$this->usernameerr="* Requiered";
    }
    else{
	$this->username=$this->valid($_POST["username"]);
	 $sql="SELECT COUNT(Username) FROM user WHERE Username='$this->username'; ";
		  $result=$db->execute($sql);
		  $result->num_rows;
		  $row = $result->fetch_assoc();
		  if($row['COUNT(Username)']>0){
			 $this->usernameerr="username already in use";
	   	     $this->username=""; 
		  }
    }
    if(($this->firstname!="")&&($this->lastname!="")&&($this->age!="")&&($this->mobile!="")&&($this->gender!="")&&($this->email!="")&&($this->password!="")&&($this->username!="")&&($this->confirmpassword!="")&&($this->diseases!="")){
	$sql="INSERT INTO user(FirstName,LastName,Gender,Age,MobileNumber,Email,Username,Password,Diseases) VALUES('$this->firstname', '$this->lastname', '$this->gender', '$this->age','$this->mobile', '$this->email', '$this->username', '$this->password', '$this->diseases')";

	 if($db->execute($sql)===true){
		session_start(); 
	
		$_SESSION["username"]=$this->username;
	    header("Location:ProfilePage.php");
		exit;
	
	  }
	  else{
	    echo "error";
	  }
	} 
    }
    
	
	public function display($result){
        while($rows=$result->fetch_assoc()){
	  echo '<tr> <td>'.$rows["FirstName"]." ".$rows["LastName"].'</td> <td>'.$rows["Email"]." ".'</td> <td>'.$rows["Username"].'</td> <td><button id="'.$this->var1."m".'">Modify</button> <button id="'.$this->var1."d".'">Delete</button> </td> </tr>';
	 $this->records[$this->var1]=implode("`",$rows);
	 $this->var1++;
	 } 
	 if(isset($this->records)){
    	return $users=implode("~",$this->records);
	 }
     else{
    ?>
    <?php
		return $users="";
	 }
    }
    
    public function delete($db){
      $sql1='Delete FROM user where Username="'.$_POST["todelete"].'"';

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
    
    public function update($db){
     		
	  if(empty($_POST["firstname"])){
      }
      else{
	    $this->firstname=$this->valid($_POST["firstname"]);
	    if(!preg_match("/^[a-zA-Z]*$/",$this->firstname)){
		  $this->firstname="";
	    }
      }
	  if(empty($_POST["lastname"])){
      }
      else{
	    $this->lastname=$this->valid($_POST["lastname"]);
	    if(!preg_match("/^[a-zA-Z]*$/",$this->lastname)){
		  $this->lastname="";
	    }
      }
	  if(empty($_POST["username"])){
    }
    else{
	$this->username=$this->valid($_POST["username"]);
    }
      if(empty($_POST["email"])){
      }
      else{
	  $this->email=$this->valid($_POST["email"]);
	  if(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
		$this->email="";
	  }
	  else{
		  $sql="SELECT COUNT(Username) FROM user WHERE NOT Username='$this->username' AND  Email='$this->email'; ";
		  $result=$db->execute($sql);
		  $result->num_rows;
		  $row = $result->fetch_assoc();
		  if($row['COUNT(Username)']>0){
			 $this->email=""; 
		  }
	  }
    }
	if(empty($_POST["password"])){
    }
	else{
	  $this->password=$_POST["password"];
	}
	if(empty($_POST["mobile"])){
    }
	else{
	  $this->mobile=$_POST["mobile"];
	  $sql="SELECT COUNT(Username) FROM user WHERE NOT Username='$this->username' AND  MobileNumber='$this->mobile'; ";
		  $result=$db->execute($sql);
		  $result->num_rows;
		  $row = $result->fetch_assoc();
		  if($row['COUNT(Username)']>0){
			 $this->mobile=""; 
		  }
	}
	if(empty($_POST["confirmpassword"])){
    }
	else if(!empty($_POST["password"])){
	$this->confirmpassword=$_POST["confirmpassword"];
	  if($this->password!=$this->confirmpassword){
	  $this->password="";
	  $this->confirmpassword="";
	  }
	}
    if(empty($_POST["gender"])){
    }
    else{
	$this->gender=$this->valid($_POST["gender"]);
    }

	if(!empty($_POST["diseases"])){
		$this->diseases=$_POST["diseases"];

    }
    else {
          if(!empty($_POST["dis"])){
	    	$this->diseases=$_POST["dis"];
        
            }
	     else {
		   $this->diseases=" ";
	        }
	}        
	if(empty($_POST["age"])){
    }
    else{
	$this->age=$this->valid($_POST["age"]);
    }
	
    if(($this->firstname!="")&&($this->lastname!="")&&($this->age!="")&&($this->mobile!="")&&($this->gender!="")&&($this->email!="")&&($this->password!="")&&($this->username!="")&&($this->confirmpassword!="")){
	$sql3="UPDATE user SET FirstName='$this->firstname',LastName='$this->lastname',Gender='$this->gender',Age='$this->age',MobileNumber='$this->mobile',Email='$this->email',Password='$this->password',Diseases='$this->diseases' WHERE Username='$this->username'";
      if($db->execute($sql3)===true){
		  ?>
		  <script>alert("<?php echo "Record Updated"; ?>");</script>
		  <?php
		  echo "<meta http-equiv='refresh' content='0'>";
	  }
	  else{
	    ?>
		  <script>alert("<?php echo "Error can't update"; ?>");</script>
		  <?php
		   echo "<meta http-equiv='refresh' content='0'>";
	  }
	}  
	else{
	  ?>
		  <script>alert("<?php echo "Error try again"; ?>");</script>
		  <?php	
		 echo "<meta http-equiv='refresh' content='0'>";
	}
	}
    
    public function valid($data){
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
    }
	 
    
    function __destruct(){

	}
  
}
  $us=new user();
?>