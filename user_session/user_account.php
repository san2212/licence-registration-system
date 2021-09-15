<?php
session_start();
include "session_header.php";
$username = $_SESSION['username'];
?>
<html>
<head>
<title>
User Account
</title>
<link rel="stylesheet" type="text/css" href="user_account.css">
</head>
<body>
<div id="optlayout">
<div id="table">
<h1 id="title_head">User Account</h1>
<table id="content_table">
<tr>
<td id="content_td"><a href="licence_session_validation.php" id="navlink"><img src="form.png" id="image" title="Licence Form"></a></td>
<td id="content_td"><a href="vehicle_session_validation.php" id="navlink"><img src="form2.png" id="image" title="Vehicle Form"></a></td>
<td id="content_td"><a href="renew_session_validation.php" id="navlink"><img src="form5.png" id="image" title="Renew Form"></a></td>
<td id="content_td"><a href="user_notification.php" id="navlink"><img src="form3.png" id="image" title="User Notification"></a></td>
<td id="content_td"><a href="test/online_test.php" id="navlink"><img src="form4.png" id="image" title="Online Demo Examination"></a></td>
</tr>
</table>
</div>
</div>
</body>
</html>