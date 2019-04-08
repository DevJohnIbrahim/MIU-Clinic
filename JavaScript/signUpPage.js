window.onload=function(){
	var val=document.getElementById("form1st");
	val.onsubmit=validateForm;
	var btn=document.getElementById("signin1");
	btn.onclick=redirect;
};
function validateForm()
{
var a = document.forms["form1"]["firstname"].value;
    var b = document.forms["form1"]["lastname"].value;
    var c = document.forms["form1"]["E-mail"].value;
    var d = document.forms["form1"]["password"].value;
    var e = document.forms["form1"]["confirm password"].value;
    var f = document.forms["form1"]["mobile"].value;
	var numericExpression = /^[0-9]+$/;
	var elem = document.getElementById('kddd');
	
if (a==""||b==""||c==""||d==""||e==""||f=="")
{
alert("Please Fill All Personal Information Fields");
return false;
}
else if(!elem.value.match(numericExpression)){
alert("Write number only");
elem.focus();
 return false;
}

}
function redirect(){
	location.href="http://localhost:9090/WEBPROJECT/HTML/logInPage.php";
}
