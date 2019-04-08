function redirect() {
	location.href = "AdminUserRecordsModify_Delete.php";
}
function redirect2() {
	location.href = "AdminScheduleRecords.php";
}
function redirect3() {
	location.href = "AdminReservedRecords.php";
}
function redirect4() {
	location.href = "indexPage.html";
}

this.window.onload = function () {
	var b1 = document.getElementById("b1");
	b1.onclick = redirect;
	var b2 = document.getElementById("b2");
	b2.onclick = redirect2;
	var b3 = document.getElementById("b3");
	b3.onclick = redirect3;
    var b4 = document.getElementById("b4");
	b4.onclick = redirect4;
};

