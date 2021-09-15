<html>
<link rel="stylesheet" type="text/css" href="submit.css">
<body>
<div id='container'>

<div id="nav">
	<button id="nav_btn1"  onclick="window.location.href='http://localhost/modules/user_session/user_account.php'">🏠 HOME</button>
	<button id="nav_btn1" onclick="window.location.href='online_test.php'">&#x21bb; Repeat Test</button>
</div>
<?php

session_start();
  
$count=$_SESSION['count'];
mysql_connect("localhost","root");
mysql_select_db("test");
if($count > 9)
{
echo "<p id='status'>PASSED</p> <p id='num'>$count";
}
else
{
echo "<p id='statusf'>FAILED</p> <p id='numf'>$count"; 	
}
echo "<p id='score'>Your score </p><br>";
echo "<p id='title'>Correct Answers</p>";
for($i=1;$i<=20;$i++)
{
$no[$i]= $_SESSION["no"][$i] ;
} 
$j=$_SESSION["j"];
for($j=1;$j<=20;$j++)
{
$r=mysql_query ("SELECT * FROM quiz Where id='$no[$j]'");

while($row=mysql_fetch_array($r))
{
$pre=$row['id'];
$que=$row['que'];
$ans1=$row['ans1'];
$img=$row['img'];

echo "<table><tr><td>";
echo "<p id='que'>"; echo $j; echo ") $que</p>";

if($img!=NULL)
{
echo "<p /><img src=get.php?id=$pre width=120 height=120 align='left'>";
}
echo "</td><tr><td>";
echo "<p id='ans'>Ans. ".$ans1."</p>";
echo "</td></table>";
}
echo "<hr>";
$_SESSION['count']=0;
}
echo "</div>";
?>
</body>
</html>