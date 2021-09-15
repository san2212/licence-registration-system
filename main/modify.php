<!DOCTYPE HTML>
<html>
<body>  
<form action="" method="post">
<input type="text" name="search" placeholder="Search">
<input type="submit" value="Go">
</form>
</body>
</html>
<?php
  mysql_connect('localhost','root') or die('could not connect');
  mysql_select_db('form') or die('could not connect');

  if(isset($_POST['search']))
  {
	$searchq=$_POST['search'];
	$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
    $query=mysql_query("SELECT fn,ln FROM form WHERE fn LIKE '%$searchq%' OR ln LIKE '%$searchq%'") or die("could not search");
	$count =mysql_num_rows($query);
	if($count==0)
	{
		echo 'Db not found';
	}
	else
	{
		
		 echo 
		 '<br><br><table width="400" border="0" cellspacing="1" cellpadding="0">
          <tr> 
		  <td><b>Firstname</b></td>
		  <td><b>Lastname</b></td>
		  </tr>';
	  
      while($row=mysql_fetch_array($query))
		{
		
		echo '
		<tr>
		<td>'.$row['fn'].'</td>
		<td>'.$row['ln'].'</td>
		</tr>';
		 }
		 
		 echo '</table>';
	}
  } 
  ?>

