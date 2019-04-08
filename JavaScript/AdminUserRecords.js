window.onload=function (){
	var b1=document.getElementById("b1");
	b1.onclick=redirect;
	var b1=document.getElementById("b2");
	b2.onclick=redirect2;
	var b4=document.getElementById("bac");
	b4.onclick=redirect4;
};
function redirect(){
	location.href="AdminUserRecordsModify.php";
}
function redirect2(){
	location.href="AdminUserRecordsDelete.php";
}

function redirect4(){
	location.href="AdminPage.php";
}