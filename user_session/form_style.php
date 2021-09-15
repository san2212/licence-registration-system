<body id="body">
<link rel="stylesheet" type="text/css" href="form_style.css">
<div id="optlayout">
<div id="table">
<h1 id="form_licence">Licence Registration Form</h1>
<form method="post" action="form_licence.php" enctype="multipart/form-data">
<table>
<tr>
<td align="right" colspan="3">
<input type="hidden" name="size" value="1000000">
<div id="imagePreview"></div>
</td>
<tr/>

<tr>
<td colspan="3"><p  id="upload_p"><input id="uploadFile" type="file" name="image" class="img" accept="file_extension|.gif, .jpg, .png"></p></td>  	
<tr/>
<?php if(isset($errors['all_empty'])) echo $errors['all_empty'];?>
<tr>
<td colspan="2" id="field_head"><label id="err">*</label>Licence Type
<?php if(isset($errors['ltype_empty'])) echo $errors['ltype_empty'];?></td>  	
<tr/>

<tr>
<td><input type="radio" name="ltype" value="Learning Licence">Learning Licence</td>
<td colspan="2"><input type="radio" name="ltype" value="Driving Licence">Driving Licence</td>
</tr>


<tr>
<td colspan="2" id="field_head"><label id="err">*</label> Adhaar Card No.
<?php if(isset($errors['adhaar_empty'])) echo $errors['adhaar_empty'];?> 	
<?php if(isset($errors['adhaar_len'])) echo $errors['adhaar_len'];?>
</td> 
<td id="field_head"><label id="err">*</label>State</td>
<tr/>

<tr>
<td colspan="2">
<div class="group">  
<input type ="number" name="adhaar" class="textInput" placeholder="Enter your 12-digit UID number" onKeyDown="if(this.value.length==12 && event.keyCode!=8) return false;">
<span class="bar"></span>
</div>
</td><td>		
<select name="state">
<option value = "Maharashtra" selected>Maharashtra</option>
<option value = "Gujrat">Gujarat</option>
<option value = "Madhya Pradesh">Madhya Pradesh</option>
</select></td>
</tr>

<tr>
<td id="field_head"><label id="err">*</label>Name
</td>
</tr>

<tr>
<td>
<div class="group">  
<?php if(isset($errors['fn_empty'])) echo $errors['fn_empty'];?>
<input type ="text" name="fn" class="bar" placeholder="First">
<span class="bar"></span>
</div>
</td><td>
<div class="group">  
<input type ="text" name="mn" class="textInput" placeholder="Middle">
<span class="bar"></span>
</div>
</td><td>
<div class="group">  
<?php if(isset($errors['ln_empty'])) echo $errors['ln_empty'];?>
<input type ="text" name="ln" class="textInput" placeholder="Last">
<span class="bar"></span>
</div>
</td>
</tr>

<tr>
<td id="field_head"><label id="err">*</label>Gender
<?php if(isset($errors['gen_empty'])) echo $errors['gen_empty'];?>
</td>
<td id="field_head"><label id="err">*</label>Date of Birth
<?php if(isset($errors['dob_empty'])) echo $errors['dob_empty'];?>
</td>
<td id="field_head"><label id="err">*</label>Age</td>
</tr>

<tr>
<td><input type="radio" name="gender" value="Male">Male &nbsp&nbsp
<input type="radio" name="gender" value="Female">Female</td>
<td>
<div class="group">  
<input type="date" name="dob" id="datepicker">
<span class="bar"></span>
</div>
</td>
<td>
<input type ="number" name="age" class="textInput" style="width:80px" placeholder="18+" onKeyDown="if(this.value.length==3 && event.keyCode!=8) return false;"></td>
</tr>

<tr>
<td id="field_head"><label id="err">*</label>Contact
<?php if(isset($errors['mobile_empty'])) echo $errors['mobile_empty'];?>
<?php if(isset($errors['phone_len'])) echo $errors['phone_len'];?>
</td>
</tr>

<tr>
<td>
<div class="group">
<input type ="number" name="phone" class="textInput" placeholder="Phone" onKeyDown="if(this.value.length==10 && event.keyCode!=8) return false;">
<span class="bar"></span>
</div>
</td>
<td>
<div class="group">
<input type ="number" name="mobile" class="textInput" placeholder="Mobile" onKeyDown="if(this.value.length==10 && event.keyCode!=8) return false;">
<span class="bar"></span>
</div>
</td>
</tr>

<tr>
<td id="field_head"><label id="err">*</label>Place Of Birth
<?php if(isset($errors['place_empty'])) echo $errors['place_empty'];?>
</td>
<td id="field_head"><label id="err">*</label>Citizenship By</td>
<td id="field_head">Blood Group</td>
</tr>

<tr>
<td>
<div class="group">
<input type ="text" name="place" class="textInput">
<span class="bar"></span>
</div>
</td>

<td><select name="citizenship">
<option value = "Birth" selected>Birth</option>
<option value = "Registration">Registration</option>
</select></td>

<td><select name="blood">
<option value = "O+">O+</option>
<option value = "O-">O-</option>
<option value = "A+">A+</option>
<option value = "A-">A-</option>
<option value = "B+">B+</option>
<option value = "B-">B-</option>
<option value = "AB+">AB+</option>
<option value = "AB-">O-</option>
</select></td>
</tr>

<tr>
<td id="field_head"><label id="err">*</label>Email
<?php if(isset($errors['email_empty'])) echo $errors['email_empty'];?>
</td>
<td id="field_head"><label id="err">*</label>Education Qualification
</td>
<td id="field_head">Identification Marks</td>
</tr>

<tr>
<td>
<div class="group">
<input type ="email" name="email" class="textInput" placeholder="example@mail.com">
<span class="bar"></span>
</div>
</td>
<td>
<select name="education">
<option value = "SSC" selected>SSC</option>
<option value = "HSC">HSC</option>
</select></td>
<td>
<div class="group">
<input type ="text" name="identification" class="textInput">
<span class="bar"></span>
</div>
</td>
</tr>

<tr><td colspan="3" id="field_head"><u>Address Details
</u></td></tr>
<tr><td colspan="3">
<div class="group">
<input type="number" name="plot" class="textInput" placeholder="Plot No." onKeyDown="if(this.value.length==4 && event.keyCode!=8) return false;">
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
<?php if(isset($errors['vtc_empty'])) echo $errors['vtc_empty'];?>
<input type="text" name="vtc" class="textInput" placeholder="Village/Town/City">
<span class="bar"></span>
</div>
</td></tr>
<tr><td colspan="3">
<div class="group">
<?php if(isset($errors['taluka_empty'])) echo $errors['taluka_empty'];?>
<input type="text" name="taluka" class="textInput" placeholder="Taluka">
<span class="bar"></span>
</div>
</td></tr>
<tr><td colspan="3">
<div class="group">
<?php if(isset($errors['pincode_empty'])) echo $errors['pincode_empty'];?>
<?php if(isset($errors['pincode_len'])) echo $errors['pincode_len'];?>
<input type="number" name="pincode" class="textInput" placeholder="Pincode" onKeyDown="if(this.value.length==6 && event.keyCode!=8) return false;">
<span class="bar"></span>
</div>
</td></tr>

<tr><td colspan="3"><p align="right"><button type ="submit" name="next" class="button btn"  onclick="return confirm('Are you sure to go next step?');">NEXT >></button></p></td></tr>

</table>
</form>
</div>

</div>
</body>
</html>