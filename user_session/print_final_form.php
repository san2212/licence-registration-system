<?php 
session_start();
$username = $_SESSION['username'];
  mysql_connect('localhost','root') or die('could not connect');
  mysql_select_db('form') or die('could not connect');
?>

	   <?php
		$query= mysql_query("SELECT * FROM form where fn = '$username' ");
        
		
      while($row=mysql_fetch_array($query))
		{
		$id=$row["id"]; 
		$ltype=$row["ltype"];
		$vca=$row["vc"];
		$adhaar=$row["adhaar"]; 
		$state=$row["state"]; 
        $fname=$row["fn"];
		$mname=$row["mn"];
		$lname =$row["ln"]; 
        $gen= $row["gender"]; 
	    $phone= $row["phone"]; 
        $mobile=$row["mobile"]; 
		$dob=$row["dob"];
        $age= $row["age"]; 
	    $place=$row["place"]; 
		$citiz= $row["citizenship"]; 
        $blood=$row["blood"]; 
		$email=$row["email"]; 
		$edu= $row["education"]; 
        $idi=$row["identification"]; 
        $plot=$row["plot"];
		$house=$row["house"];
	    $street=$row["street"];
		$vtc=$row["vtc"];
		$taluka=$row["taluka"]; 
		$pin=$row["pincode"];
		$image=$row["image"];
		$verify=$row["verify"];
		}		
?>
<html>
<head>
</head>
<style>
#form_layout
{
	height:1000px;
	padding:60px;
}
#identity
{
	width:100%;
}
#main:nth-child(even) {background-color: #ECECEC}
#main:nth-child(odd) {background-color: #DADADA}
a:link:after, a:visited:after {
    content: "";
}
</style>
<body>
<div id="form_layout">
<h5 id="title" align="center"><u>FORM OF APPLICATION FOR LICENCE TO DRIVE A VEHICLE</u></h5>
To,<br>
THE LICENSING AUTORITY,<br>
___________________________<br><br>

<table>
<tr>
<td colspan="2">
I apply for licence to enable me to drive vehicles<br>of the following description :-<br><br>
<?php echo $vca ?>
</td>
<td></td>
</table><br><hr>
<h5 id="title" align="center">Particulars to be furnished by the applicant</h5>

<table id="identity">

<tr id="main">
<td>Full name</td>
<td>&nbsp<?php echo $fname;?>&nbsp<?php echo $mname;?>&nbsp<?php echo $lname ?></td>
</tr>

<tr id="main">
<td>Email Id</td>
<td>&nbsp<?php echo $email;?></td>
</tr>

<tr id="main">
<td>Permanent Address</td>
<td>&nbsp<?php echo $plot;?>-&nbsp'<?php echo $house;?>',&nbsp<?php echo $street;?>,&nbsp<?php echo $taluka;?>-&nbsp<?php echo $pin;?></td>
</tr>

<tr id="main">
<td>Date of Birth (Proof to be enclosed)</td>
<td>&nbsp<?php echo $dob ?></td>
</tr>

<tr id="main">
<td>Education Qualification</td>
<td>&nbsp<?php echo $edu ?></td></td>
</tr>

<tr id="main">
<td>Blood Group</td>
<td>&nbsp<?php echo $blood ?></td></td>
</tr>

<tr id="main">
<td>Identification Marks</td>
<td>&nbsp<?php echo $idi ?></td></td>
</tr>

</table>
<br><br><br><br>
I have submitted along with my application for <?php echo $ltype?>. I enclose the Address Proof & the Identity Proof.<br><br>
I am exempted for preliminary test under rule 11(2) of the central motor vehicles rule<br>
I have paid the fee of Rs.___________<br><br><br><br><br><br><br>

<p align="right"><?php echo $fname;?>&nbsp<?php echo $lname ?><br><i>Signature or Thumb Impression of Applicant</i></p>
</div>
</body>
</html>