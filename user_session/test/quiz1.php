<html>

<link rel="stylesheet" type="text/css" href="quiz1.css">
<?php
session_start();
include "time.php"; 
mysql_connect("localhost","root");
mysql_select_db("test");
for($i=1;$i<=20;$i++)
{
$no[$i]= $_SESSION["no"][$i] ;
} 
$j=$_SESSION["j"];

$r=mysql_query ("SELECT * FROM quiz Where id='$no[$j]' ");

while($row=mysql_fetch_array($r))
{
$pre=$row['id'];
$que=$row['que'];
$ans=$row['ans'];
$opt1=$row['opt1'];
$opt2=$row['opt2'];
$opt3=$row['opt3'];
$opt4=$row['opt4'];
$img=$row['img'];

}
if($img!=NULL)
{
	$img_display = array();
	$img_display['img1'] = "<img src=get.php?id=$pre width=150 height=150 id='que_img'>";
}
$_SESSION["ans"] =$ans ;
$_SESSION['prev']=$pre; 
echo "

<div id='content'>
<div id='title'>
<h1 id='title_text'>RTO ONLINE EXAMINATION</h1><h2 id='time'><p id='demo'>|</p></h2>
</div>
<div id='que'>
";
if(isset($img_display['img1'])) echo $img_display['img1'];
echo "<h3 id='que_text'> <span id='que_color'>Que ".$_SESSION["j"].".</span> ".$que;
echo "</h3></div>";
?>
<head><title>RTO Online Test</title></head>
<body oncontextmenu="return false;">
<script type="text/JavaScript">

function disableselect(e){
return false
}
function reEnable(){
return true
}
document.onselectstart=new Function ("return false")
if (window.sidebar){
document.onmousedown=disableselect
document.onclick=reEnable
}
</script>
<div id="table">
<form action="save.php" method="post">
<table id="t1">
<tr>
<td id="opt_td">
<input type="radio" name="quiz" value="1"> <?php echo $opt1 ?></td>
</tr>
<tr>
<td id="opt_td"><input type="radio" name="quiz" value="2"> <?php echo $opt2 ?></td>
</tr>
</table>

<table id="t2">
<tr>
<td id="opt_td"><input type="radio" name="quiz" value="3"> <?php echo $opt3 ?></td>
</tr>
<tr>
<td id="opt_td"><input type="radio" name="quiz" value="4"> <?php echo $opt4?></td>
</tr>
</table>
</div>


<div id="btn_div">
<table id="btn_table">
<tr><td  id="btn_td"> 
<button id="btn" name="save">Save Answer</button> 
</form>
</td><td id="btn_td">
<form action="prev.php" method="post">
<button id="btn" name="prev"><< Previous</button> 
</form>
</td><td id="btn_td">
<form action="next.php" method="post">
<button id="btn" name="next">Next >></button>
</form>
</td><td id="btn_td">
<form action="submit.php" method="post">
<button id="end_btn" name="submit"  onclick="return confirm('ARE YOU SURE YOU WANT TO END EXAMINATION?')";>End Examination</button>
</form>
</td></tr>
</table>
</div>

<form action="select.php" method="post">
<div id="footer">
<p id="num_label"><u>Choose Questions</u></p>
<button id="num" name="que1">1</button>
<button id="num" name="que2">2</button>
<button id="num" name="que3">3</button>
<button id="num" name="que4">4</button>
<button id="num" name="que5">5</button>
<button id="num" name="que6">6</button>
<button id="num" name="que7">7</button>
<button id="num" name="que8">8</button>
<button id="num" name="que9">9</button>
<button id="num" name="que10">10</button>
<button id="num" name="que11">11</button>
<button id="num" name="que12">12</button>
<button id="num" name="que13">13</button>
<button id="num" name="que14">14</button>
<button id="num" name="que15">15</button>
<button id="num" name="que16">16</button>
<button id="num" name="que17">17</button>
<button id="num" name="que18">18</button>
<button id="num" name="que19">19</button>
<button id="num" name="que20">20</button>
</form>
</div>
</div>
</body>
</html>
