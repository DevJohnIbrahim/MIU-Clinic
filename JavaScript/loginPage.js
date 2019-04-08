window.onload=function (){
	var btn=document.getElementById("signup1");
	btn.onclick=redirect;
	var val=document.getElementById("form1st");
	val.onsubmit=validateForm;
};
function validateForm()
{
var user = document.forms["form1"]["username"].value;
    var pass = document.forms["form1"]["password"].value;
	
if (user==""||pass=="")
{
alert("Please write your username and password!!");
return false;
}

}
function redirect(){
	location.href="http://localhost:9090/WEBPROJECT/HTML/signUpPage.php";
}