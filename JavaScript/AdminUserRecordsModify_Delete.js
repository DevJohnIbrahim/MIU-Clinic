$(document).ready(function(){
	
    $("form").hide();   

	$records1=[];
	$records1=$("#tojs").attr("value");
	if($records1!=null){
	//alert($records1);
	$records1=$records1.split("~");
	$var=[];
 
	for(var i=0;i<$records1.length;i++){
		$var[i]=$records1[i].split("`");
	}
	$("button").on("click",function(){
		$("#up").attr("value",$(this).attr("id"));
		
		if($(this).attr("id").indexOf("d")>=0){
		
			if(confirm("Are you sure you want to delete this record?")){
				$("#Todelete").attr("value",$var[parseInt($(this).attr("id"))][6]);
				$("#form2").trigger("submit");
			}
		    else{
				alert("Record Not deleted");
			}
		}
		else if($(this).attr("id").indexOf("m")>=0){
			
			$("#Fname").attr("value",$var[parseInt($(this).attr("id"))][0]);
			$("#Lname").attr("value",$var[parseInt($(this).attr("id"))][1]);
	
			if($var[parseInt($(this).attr("id"))][2]=="Male"){
				$("#M").attr("checked","checked");
			}
			else{
				$("#Fe").attr("checked","checked");
			}
			
			if($var[parseInt($(this).attr("id"))][3]=="Under 16"){
				$("#A16").attr('selected','selected');
			}
			else if($var[parseInt($(this).attr("id"))][3]=="16 to 25"){
				
				$("#A25").attr('selected','selected');
			}
			else if($var[parseInt($(this).attr("id"))][3]=="26 to 40"){
				$("#A40").attr('selected','selected');
			}
			else if($var[parseInt($(this).attr("id"))][3]=="40 to 60"){
				$("#A60").attr('selected','selected');
			}
			else {
				$("#A60+").attr('selected','selected');
			}
			$("#mobile").attr("value",$var[parseInt($(this).attr("id"))][4]);
			$("#email").attr("value",$var[parseInt($(this).attr("id"))][5]);
			$("#username").attr("value",$var[parseInt($(this).attr("id"))][6]);
			$("#password").attr("value",$var[parseInt($(this).attr("id"))][7]);
			$("#confirmpassword").attr("value",$var[parseInt($(this).attr("id"))][7]);
			$("#diseases").text($var[parseInt($(this).attr("id"))][8]);
			$("#form1st").show();
			$("#table").hide();
			$("#btn").hide();
			
		}
		else if($(this).text()=="Go back"){
			 document.location.href="AdminPage.php";
		}
	});
	}
});