$(document).ready(function(){
	
    $("form").hide();   

	$records1=[];
	$records1=$("#tojs").attr("value");
	if($records1!=null){
	$records1=$records1.split("`");
	
	$("button").on("click",function(){
		
        if($(this).text()=="Go back"){
			 document.location.href="AdminScheduleRecords.php";
		}
		else {
		
			if(confirm("Are you sure you want to delete this record?")){
				$("#Todelete").attr("value",$records1[$(this).attr("id")]);
				$("#form2").trigger("submit");
			}
		    else{
				alert("Record Not deleted");
			}
		}
	});
	}
});