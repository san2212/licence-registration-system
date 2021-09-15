<?php
session_start();
$username = $_SESSION['username'];
?>
<?php
		if(isset($_POST['submit']))
		{
		
		$db = mysqli_connect("localhost", "root", "","form") or die(mysql_error());

		$vca = $_POST["vca"];

		$doc = addslashes(file_get_contents($_FILES['doc']['tmp_name']));
		$doc1 = addslashes(file_get_contents($_FILES['doc1']['tmp_name']));
		
		$query = "UPDATE form SET `vc`='$vca',`doc`='$doc',`doc1`='$doc1' WHERE fn='$username'";
		mysqli_query($db,$query); 
		header('location: licence_session_validation.php');

		}
?>
<?php
include "session_header.php";
?>	
<html>
<head>
<title>
</title>
<body id="body">
<link rel="stylesheet" type="text/css" href="form_licence_doc.css">
<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
<style>
#imagePreview {
    width: 300px;
    height: 300px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}
</style>
<script type="text/javascript">
$(function() {
    $("#uploadFile").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
</script>
<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
<style>
#imagePreview1 {
    width: 300px;
    height: 300px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}
</style>
<script type="text/javascript">
$(function() {
    $("#uploadFile2").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview1").css("background-image", "url("+this.result+")");
            }
        }
    });
});
</script>
<div id="optlayout">
<div id="table">
<h1 id="form_licence">Licence Registration Form</h1>
<form method="post" action="" enctype="multipart/form-data">
<table>
<tr><td colspan="2">
<u>Class of Vehicles</u>
</td></tr>
<tr><td>
<input type="radio" name="vca" value="MOTOR CYCLE LESS THAN 50CC(MC50CC)"> MOTOR CYCLE LESS THAN 50CC(MC50CC)
</td><td>
<input type="radio" name="vca" value="MOTOR CYCLE WITHOUT GEAR(NON TRANSPORT)(MCWOG)"> MOTOR CYCLE WITHOUT GEAR(NON TRANSPORT)(MCWOG)
</td></tr>
<tr><td>
<input type="radio" name="vca" value="MOTOR CYCLE WITH GEAR (NON TRANSPORT)(MCWG)"> MOTOR CYCLE WITH GEAR (NON TRANSPORT)(MCWG)
</td><td>
<input type="radio" name="vca" value="LMV-NT-CAR(LMV)"> LMV-NT-CAR(LMV)
</td></tr>
<tr><td>
<input type="radio" name="vca" value="LMV -3 WHEELER NT(3W-NT)"> LMV -3 WHEELER NT(3W-NT)
</td><td>
<input type="radio" name="vca" value="LMV-TRACTOR-NT(TRCTOR)"> LMV-TRACTOR-NT(TRCTOR)
</td></tr>
<tr><td>
<input type="radio" name="vca" value="INVALID CARRIAGE VEHICLE(INVCRG)"> INVALID CARRIAGE VEHICLE(INVCRG)
</td><td>
<input type="radio" name="vca" value="ROAD ROLLER(RDRLR)"> ROAD ROLLER(RDRLR)
</td></tr>
<tr><td colspan="2">
<input type="radio" name="vca" value="OTHERS - CONSTRUCTION EQUIPMENTS(CNEQP)"> OTHERS - CONSTRUCTION EQUIPMENTS(CNEQP)
</td></tr>

<tr>
<td colspan="2">
<u>Documents Upload</u>
<td>
</tr>
<tr>
<td>Adhaar Card</td>
<td>Address Proof</td>
</td>
</tr>

<tr>
<td>
<input type="hidden" name="size" value="1000000">
<div id="imagePreview"></div>
</td>
<td>
<input type="hidden" name="size" value="1000000">
<div id="imagePreview1"></div>
</td>
</tr>

<tr>
<td><input id="uploadFile" type="file" name="doc" class="img"></td>
<td><input id="uploadFile2" type="file" name="doc1" class="img"></td>
</tr>

<tr>
<td colspan=2>
<p align="right"><button type="submit" name="submit" class="button btn" onclick="return confirm('Are you sure, want to submit your form?');">SUBMIT</button></p>
</td></tr>

</table>
</form>
</div>
</div>
</body>
</html>