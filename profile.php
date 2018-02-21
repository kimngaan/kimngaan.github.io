<html>
<head>
<title>User Registatrion</title>
</head>
<body>
<br />
<h2 align ="center"> User Registration</h2>
<!--This is a comment in HTML-->
<form name="user_reg" action="adduser.php" " method="post"> <!--Start Form-->
<table align="center" width="80%" border=0> <!--Start Table-->
<!--We want to put the label, e.g. "Enter Last Name", and the textbox to actually input the last name in 2
different columns of the table -->
<!--Table rows are specified by the TR tags, while cells within the rows are specified with the TD tags -->
<tr><td align=right>Enter Username </td><td><input type="text" name="username"></td></tr>
<tr><td align=right>Enter Password </td><td><input type="password" name="password"></td></tr> <!--Note
this input type!!!-->
<tr><td align=right>Enter Firstname (Optional) </td><td><input type="text" name="firstname"></td></tr>
<tr><td align=right>Enter LastName (Optional) </td><td><input type="text" name="lastname"></td></tr>
<tr><td align=right>Enter Email (Optional) </td><td><input type="text" name="email"></td></tr>
<tr><td align=right><input type="submit" name="sub_btn" value="OK"></td><td><input type="reset"
name="res_btn" value="Cancel"></td></tr><!--Buttons for submitting the values entered or for resetting the
form-->
</table><!--End Table-->
</form> <!--End Form-->
</body>
</html>