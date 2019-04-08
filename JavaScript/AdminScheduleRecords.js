function redirect(){
	location.href="AdminScheduleRecordsAdd.php";
}
function redirect2(){
	location.href="AdminScheduleRecordsDisplay.php";
}
function redirect3(){
	location.href="AdminScheduleRecordsDelete.php";
}
function redirect4(){
	location.href="AdminPage.php";
}
function redirect5(){
	location.href="indexPage.html";
}

window.onload=function (){
	var b1 = document.getElementById("b1");
	b1.onclick=redirect;
	var b1 = document.getElementById("b2");
	b2.onclick=redirect2;
	var b3 = document.getElementById("b3");
	b3.onclick=redirect3;
	var b4 = document.getElementById("bac");
	b4.onclick=redirect4;    
    var b5 = document.getElementById("b4");
	b5.onclick = redirect5;
};

