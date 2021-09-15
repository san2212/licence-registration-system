<?php 
session_start();
$username = $_SESSION['username'];
?>
<html>
<style>
#layout
{
	float:left;
}
#image
{
	background-color:  #00BAED;
}
body
{
	margin:0px;
	background-color:#1A386C;
}
table
{
	font-family : calibri; 
	margin: 120px;
	padding:30px;
	width:300px;
	background-color: white;
    box-shadow: 0px 0px 10px  #4B4B4B;
}
input[type="text"], input[type="number"], input[type="email"] 
{
	width: 100%; 
	margin: 10px 0px; 
	margin-right: 5px;
	border: none;
	box-sizing: border-box;
	background-color: #ECF6FF;
	border-bottom: 2px solid #41AFF5;
    color: grey;
}
.button {
  border-radius: 2px;
  background-color: #41AFF5;
  border: none;
  color: #FFFFFF;
  text-align: center;
  width: 60px;
  height: 30px;
  transition: all 0.5s;
  cursor: pointer;
}
.button:hover
{
	background-color: grey;
}
p
{
	margin-left:550px;
	margin-right:250px;
	border: 1px dashed #00BAED;

	color: #00BAED;
	padding:10px;
	font-family: "corbel";
}
</style>
<body>
<form method="post" action="payment_validation.php">
<div id="layout">
<table id="pay_table">
<tr>
<td>Account Number.</td>
</tr><tr>
<td>
<input type="text" id="ORDER_ID" tabindex="1" maxlength="16" size="20" name="ORDER_ID" autocomplete="off" placeholder="Enter account no.">
</td></tr>
<td>Expiry Date</td>
</tr><tr>
<td>
<input type="text" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" placeholder="dd-mm-yyyy">
</td></tr>
<td>IFSC Code</td>
</tr><tr>
<td>
<input  type="text" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="8" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" placeholder="Enter IFSC Code">
</td></tr><tr>
<td>Amount</td>
</tr><tr>
<td>
<input  type="text" title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" value="30" readonly>
</td></tr>
</tr><tr>
<td>
<input value="PAY" class="button button" onclick="return confirm('Are you sure you want to proceed with the transaction');" type="submit">
</td>
</tr>
</table>
</div>
<div id="image">
<img src="image.jpg">
</div>
</form>
<p align="justify">
A KIND INFORMATION TO ALL READERS,<br><br>
This Payment gateway has no association with Paytm (Indian payment and commerce company), and portraying as a skeleton payment option.<br>
Once, this website is hosted, paytm gateway will be available along with proper plugin and gateways. Until then, this is just a display figure of actual payment scheme.<br>
[Viewed page is not for valid transactions at all & displayed in context to college level final year project]
</p>
</body>
</html>