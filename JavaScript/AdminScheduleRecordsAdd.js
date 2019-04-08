$(document).ready(function(){

	$("button").on("click",function(){
		
        if($(this).text()=="Go back"){
			 document.location.href="AdminScheduleRecords.php";
		}
		
	});
	
});