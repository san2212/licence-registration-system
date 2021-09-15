<html>
<head><title>hello</title></head>
<style>
#select_date
{
padding: 10px;	
border-radius: 4px;
border: 1px solid #4285f4;
}
#datepicker
{
padding: 10px;	
margin-top:30px;
margin-left:295px;
border-radius: 4px;
border: 1px solid #4285f4;
width:90px;
}
#custom_dt
{
	margin-top:60px;
	padding: 300px;
	background-image: url("date.gif");
	background-color: white;
	background-position: 50% -150%;
	background-repeat: no-repeat;
}
#save_btn
{
background-color: #4285f4; 
padding: 10px;
border: none;
border-radius: 4px;
color: white;
-webkit-transition-duration: 0.4s; /* Safari */
cursor: pointer;
}
#save_btn:hover
{
background-color: #17202A;
transition: 1s;
}
#date_label
{
	font-family: "corbel";
	font-size: 18px;
	color: grey;
	margin-left:220px;
}
</style>
<body>
<form method="post">

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>

<?php
 function datese($ta) {
	 
 $r=mysql_query("SELECT * FROM form WHERE date='$ta'");
 while($row=mysql_fetch_array($r))
  {
	  $da=$row['date'];
  }
      $c=mysql_affected_rows();
	  return $c;
 }  
?>

<?php 
$li=mysql_connect("localhost","root") or die("Could not connect");
mysql_select_db("form") or die("could not connect");
  
     $dat=array();
  $d=strtotime("tomorrow");
$first=date("d/m/Y", $d) ;
 $t=2;
 $i=0;
 while($i<3)
 {
	$c=datese($first);
	if($c<2)
	{
		$date1[$i]=$first;
	
	$i++;
	}
	
		$time=time();
		$first=date("d/m/Y", mktime(0,0,0,date("n", $time),date("j",$time)+ $t ,date("Y", $time)));
      $t++;
	  
 
 }

	 ?>
<?php
if( isset($_GET['success']) && $_GET['success'] == 1 )
{	
?>
<p id='above'>
<div id="custom_dt">
<input type="text" id="datepicker" />
<input type="submit" name="en" value="SAVE" id="save_btn"><br><br>
<label id="date_label">Select any valid date from the date picker</label>
</div>
</p>
<?php
}
else
{
?>
<p id='above'>
<select name="date" id="select_date">
<option value = "<?php echo $date1[0] ;?>" selected><?php echo $date1[0] ;?></option>
<option value = "<?php echo $date1[1] ;?>" ><?php echo $date1[1] ;?></option>
<option value = "<?php echo $date1[2] ;?>" ><?php echo $date1[2] ;?></option>
</select></td>
<input type="submit" name="en" value="SAVE" id="save_btn"><br><br>
<!--or add custom date <a href="date_select.php?success=1">here</a><br>!-->
</p>
</html>
<?php 
}
if(isset($_POST['en']))
{
//$username = $_SESSION['username'];
$date= mysql_real_escape_string($_POST["date"]);
$name=addslashes($_REQUEST['fn']);
		
if(mysql_query("UPDATE form SET `date`='$date' WHERE fn ='$username'"))
	{
		header ('location: date_validation.php');		
	}
	else
	{
		echo "Fail to update date please retry";
	}
}
mysql_close($li);
?>