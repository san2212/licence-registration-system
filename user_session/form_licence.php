<?php
session_start();
$username = $_SESSION['username']
?>
<?php
		$msg = "";
		if(isset($_POST['next'])){
				
			include "form_licence_error.php";
			if(count($errors) == 0)
			{
			//path to store images
			$target= "images/".basename($_FILES['image']['name']);
			//database connection
			

			$db = mysqli_connect("localhost","root","","form");
			
			$ltype = mysql_real_escape_string($_POST["ltype"]);
			$adhaar = mysql_real_escape_string($_POST["adhaar"]);
			$state = mysql_real_escape_string($_POST["state"]);
			$fn = mysql_real_escape_string($_POST["fn"]);
			$mn = mysql_real_escape_string($_POST["mn"]);
			$ln = mysql_real_escape_string($_POST["ln"]);
			$gender = mysql_real_escape_string($_POST["gender"]);
			$phone = mysql_real_escape_string($_POST["phone"]);
			$mobile = mysql_real_escape_string($_POST["mobile"]);
			$dob = mysql_real_escape_string($_POST["dob"]);
			$age = mysql_real_escape_string($_POST["age"]);
			$place = mysql_real_escape_string($_POST["place"]);
			$citizenship = mysql_real_escape_string($_POST["citizenship"]);
			$blood = mysql_real_escape_string($_POST["blood"]);
			$email = mysql_real_escape_string($_POST["email"]);
			$education = mysql_real_escape_string($_POST["education"]);
			$identification = mysql_real_escape_string($_POST["identification"]);
			$plot = mysql_real_escape_string($_POST["plot"]);
			$house = mysql_real_escape_string($_POST["house"]);
			$street = mysql_real_escape_string($_POST["street"]);
			$vtc = mysql_real_escape_string($_POST["vtc"]);
			$taluka = mysql_real_escape_string($_POST["taluka"]);
			$pincode = mysql_real_escape_string($_POST["pincode"]);
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			
			$sql = "INSERT INTO form(ltype,adhaar, state,fn,mn,ln,gender,phone,mobile,dob,age,place,citizenship,blood,email,
					education,identification,plot,house,street,vtc,taluka,pincode,image) VALUES 
					('$ltype','$adhaar', '$state', '$fn','$mn','$ln', '$gender','$phone','$mobile','$dob','$age','$place','$citizenship','$blood','$email','$education','$identification','$plot','$house','$street','$vtc','$taluka','$pincode','$image')";
			mysqli_query($db,$sql);
		
			
			$url = "form_licence_doc.php";
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
    $( "#datepicker" ).datepicker({ dateFormat: 'yy/mm/dd' });
  } );
  </script>
</head>

<?php 
include "session_header.php";
include "form_style.php";
?>
