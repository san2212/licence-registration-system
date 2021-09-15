<script>
function countDown(secs,elem) {
	var element = document.getElementById(elem);
	element.innerHTML = "Please wait for "+secs+" seconds";
	if(secs < 1) {
		clearTimeout(timer);
		location.href = "signup.php";
	}
	secs--;
	var timer = setTimeout('countDown('+secs+',"'+elem+'")',1000);
}
</script>
<div id="status"></div>
<script>countDown(10,"status");</script>