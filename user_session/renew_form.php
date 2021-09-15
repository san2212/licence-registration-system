<?php
session_start(); 
$username = $_SESSION['username']
?>
<?php
		$msg = "";
		if(isset($_POST['submit'])){
			//path to store images
			$target= "images/".basename($_FILES['image']['name']);
			//database connection
			
			$db = mysqli_connect("localhost","root","","form");
			
			$fn = mysql_real_escape_string($_POST["fn"]);
			$mn = mysql_real_escape_string($_POST["mn"]);
			$ln = mysql_real_escape_string($_POST["ln"]);
			$gender = mysql_real_escape_string($_POST["gender"]);
			$mobile = mysql_real_escape_string($_POST["mobile"]);
			$email = mysql_real_escape_string($_POST["email"]);
			$lic_no = mysql_real_escape_string($_POST["lic_no"]);
			$issue_dt = mysql_real_escape_string($_POST["issue_dt"]);
			$authority = mysql_real_escape_string($_POST["authority"]);
			$expiry_dt = mysql_real_escape_string($_POST["expiry_dt"]);
			$plot = mysql_real_escape_string($_POST["plot"]);
			$house = mysql_real_escape_string($_POST["house"]);
			$street = mysql_real_escape_string($_POST["street"]);
			$vtc = mysql_real_escape_string($_POST["vtc"]);
			$taluka = mysql_real_escape_string($_POST["vtc"]);
			$pincode = mysql_real_escape_string($_POST["pincode"]);
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$date = date('Y-m-d H:i:s');
			
			if($fn !== $username)
			{
				?>
				<script>
				alert("Name is Invalid");
				</script>
			<?php
			}
			else
			{
			$sql = "INSERT INTO form_renew(fn,mn,ln,gender,mobile,email,lic_no,issue_dt,expiry_dt,authority,
					plot,house,street,vtc,taluka,pincode,image,date) VALUES 
					('$fn','$mn','$ln', '$gender','$mobile','$email','$lic_no','$issue_dt','$expiry_dt','$authority'
					,'$plot','$house','$street','$vtc','$taluka','$pincode','$image','$date')";
			mysqli_query($db,$sql);
			}
		//Moving uploaded image into the folder
			if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
				$msg = "Success!";
				$url = "renew_session_validation.php";
				echo '<script>window.location = "'.$url.'";</script>';
			}
			else{
				$msg = "Failed";
			}
			if($fn == $username)
			{
			$url = "renew_session_validation.php";
			echo '<script>window.location = "'.$url.'";</script>';
			}
		}
?>
<html>
<head>
<title></title>
<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
<style>
#imagePreview {
    width: 180px;
    height: 180px;
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
<meta charset = "utf-8">
      <title>jQuery UI Datepicker functionality</title>
      <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
  } );
  </script>
  <meta charset = "utf-8">
      <title>jQuery UI Datepicker functionality</title>
      <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker1" ).datepicker({ dateFormat: 'dd/mm/yy' });
  } );
  </script>
</head>
<?php 
include "session_header.php";
?>
<body id="body">
<link rel="stylesheet" type="text/css" href="renew_form.css">
<div id="optlayout">
<div id="table">
<h1 id="form_licence">Licence Renewation Form</h1>
<form method="post" action="" enctype="multipart/form-data">

<table>

<tr>
<td colspan="3">
<input type="hidden" name="size" value="1000000">
<div id="imagePreview"></div>
</td>
<tr/>

<tr>
<td colspan="3"><p align="right" style="padding : 0px;"><input id="uploadFile" type="file" name="image" class="img"></p></td>  	
<tr/>

<tr>
<td colspan="3">Name</td>
</tr>

<tr>
<td>
<div class="group">   
<input type ="text" name="fn" class="textInput" placeholder="First">
<span class="bar"></span>
</div>
</td>
<td>
<div class="group">   
<input type ="text" name="mn" class="textInput" placeholder="Middle">
<span class="bar"></span>
</div>
</td>
<td>
<div class="group">   
<input type ="text" name="ln" class="textInput" placeholder="Last">
<span class="bar"></span>
</div>
</td>
</tr>

<tr>
<td colspan="1">Gender</td>
<td>Contact</td>
</tr>

<tr>
<td colspan="1"><input type="radio" name="gender" value="Male">Male &nbsp&nbsp
<input type="radio" name="gender" value="Female">Female</td>
<td>
<div class="group"> 
<input type ="number" name="mobile" class="textInput" placeholder="Mobile">
<span class="bar"></span>
</div>
</td>
</tr>

<tr>
<td>Email</td>
<td colspan="2">Licence Number.</td>
</tr>

<tr>
<td>
<div class="group">  
<input type ="email" name="email" class="textInput" placeholder="example@mail.com">
<span class="bar"></span>
</div>
</td>
<td colspan="2">
<div class="group"> 
<input type ="number" name="lic_no" class="textInput" placeholder="Enter your Licence Number">
<span class="bar"></span>
</div>
</td>	
</tr>

<tr>
<td colspan="1">Issue Date</td>
<td>Expiry Date</td>
</tr>

<tr>
<td colspan="1">
<div class="group"> 
<input type="date" name="issue_dt" placeholder="dd-mm-yyyy" id="datepicker">
<span class="bar"></span>
</div>
</td>
<td>
<div class="group"> 
<input type="date" name="expiry_dt" placeholder="dd-mm-yyyy" id="datepicker1">
<span class="bar"></span>
</div>
</td>
</tr>

<tr>
<td colspan="1">RTO Authority</td>
</tr>

<tr>
<td colspan="1"><select name="authority">
<option value = "Regional Transport Officer, Mumbai (C) MH-01">Regional Transport Officer, Mumbai (C) MH-01</option>
<option value = "Regional Transport Officer, Pune MH-12">Regional Transport Officer, Pune MH-12</option>
<option value = "Regional Transport Officer, Jalgaon MH-19">Regional Transport Officer, Jalgaon MH-19</option>
<option value = "Regional Transport Officer, Nagpur MH-31">Regional Transport Officer, Nagpur MH-31</option>
</select></td>
</tr>

<tr><td colspan="3"><u>Address Details</u></td></tr>
<tr><td colspan="3">
<div class="group"> 
<input type="number" name="plot" class="textInput" placeholder="Plot No.">
<span class="bar"></span>
</div>
</td></tr>
<tr><td colspan="3">
<div class="group"> 
<input type="text" name="house" class="textInput" placeholder="House Name">
<span class="bar"></span>
</div>
</td></tr>
<tr><td colspan="3">
<div class="group"> 
<input type="text" name="street" class="textInput" placeholder="Street">
<span class="bar"></span>
</div>
</td></tr><br>
<tr><td colspan="3">
<div class="group"> 
<input type="text" name="vtc" class="textInput" placeholder="Village/Town/City">
<span class="bar"></span>
</div>
</td></tr>
<tr><td colspan="3">
<div class="group"> 
<input type="text" name="taluka" class="textInput" placeholder="Taluka">
<span class="bar"></span>
</div>
</td></tr>
<tr><td colspan="3">
<div class="group"> 
<input type="number" name="pincode" class="textInput" placeholder="Pincode">
<span class="bar"></span>
</div>
</td></tr>

<tr><td colspan="3"><p align="right"><button type ="submit" name="submit" class="button btn"  onclick="return confirm('Are you sure, want to submit your form?');">Submit</button></p></td></tr>

</table>
</form>
</div>

</div>
</body>
</html>