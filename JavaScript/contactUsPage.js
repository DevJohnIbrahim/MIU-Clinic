window.onload=function (){
	var btn1=document.getElementById("loginbtn");
	var btn2=document.getElementById("signupbtn");
	btn1.onclick=redirect;
	btn2.onclick=redirect;
};
function redirect(){
	if(this.id=="loginbtn")
	location.href="http://localhost:9090/WEBPROJECT/HTML/loginPage.php";
    else{
	location.href="http://localhost:9090/WEBPROJECT/HTML/signUpPage.php";
    }
}