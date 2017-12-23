<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
<title>SignUp</title>
<link rel="stylesheet" type="text/css" href="cssfile.css">
</head>
<body background="images/pic5.jpg">

<?php
include 'datab.php';
//define variables and set them to empty values
$fname = $lname = $uname = $pwd = $email = $dob = $address = $mobile= "";

$errfname = $erruname = $errpwd = $erremail = $errdob = $erraddress= $errmobile ="";
echo "<link rel='stylesheet' type='text/css' src='cssfile.css'>";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{	
	$err = false;
	if(empty($_POST["fname"]))
	{
		$errfname="Name is required";
		$err = true;
	}
	else
	{
		$fname = test_input($_POST["fname"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$fname)) 
		{
  			$errfname = "Only letters and white space allowed"; 
  			$err = true;
		}
	}
	
	$lname = test_input($_POST["lname"]);
	if (!preg_match("/^[a-zA-Z ]*$/",$lname)) 
		{
  			$errlname = "Only letters and white space allowed"; 
  			$err = true;
		}
	
	if(empty($_POST["uname"]))
	{
		$erruname="UserName is required";
		$err = true;
	}
	else
	{
		$uname = test_input($_POST["uname"]);
		$sql = "SELECT * FROM user1 WHERE uid='$uname'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		$getdata = $row['uid'];
		if($uname==$getdata)
		{
			$erruname="Try with another username";
			$err = true;
		}
	}

	if(empty($_POST["pwd"]))
	{
		$errpwd="Password is required";
		$err = true;
	}
	else
	{
		$pwd = $_POST["pwd"];
	}

	if(empty($_POST["email"]))
	{
		$erremail="Email is required";
		$err = true;
	}
	else
	{
		$email = test_input($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
 			$erremail = "Invalid email format"; 
 			$err = true;
		}
	}
	
	$mobile = $_POST["mobile"];
	if (!preg_match("/^[1-9][0-9]*$/",$mobile)) 
		{
  			$errmobile = "Invalid format"; 
  			$err = true;
		}
	$dob = $_POST["dob"];

	$address = $_POST["address"];
	if(!$err){
		
$sql = "INSERT INTO user1 (fname,lname,uid,pwd,email,mobile,dob,address)
VALUES ('$fname','$lname','$uname','$pwd','$email','$mobile','$dob','$address')";
//$result = mysqli_query($conn,$sql);

if (mysqli_query($conn, $sql)) 
{
    echo "<b style='color:white; font-size:40px;'><h3>New record created successfully</h3></b>";
} else 
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

}
function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>

	 <div id="login">

	 <h1>Sign Up.</h1>
	 <p><span class="error">* required field.</span></p>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
	

		<p><input type="text" name="fname" placeholder="FirstName" id="text"><span class="error">*<?php echo $errfname;?></p>

		<p><input type="text" name="lname" placeholder="LastName" id="text"></p>

		<p><input type="text" name="uname" placeholder="UserName" id="text"><span class="error">*<?php echo $erruname;?></p>

		<p><input type="password" name="pwd" placeholder="Password" id="text"><span class="error">*<?php echo $errpwd;?></p>

		<p><input type="text" name="email" placeholder="Email Id" id="text"><span class="error">*<?php echo $erremail;?></p>

		<p><input type="text" name="mobile" placeholder="Mobile" id="text" maxlength="10" minlength="10"><span class="error"><?php echo $errmobile;?></p>

		<p><input type="text" name="dob" placeholder="Date of Birth" id="text"></p>

		<p><TEXTAREA name="address" placeholder="Address" id="text1"></TEXTAREA></p>
		
		<p><button type="submit" class="buttonp" >Sign up!</button></p>
	
	</form>
	<p>Have an Account?</p>
<p><a href="login.php" >Login Up Here</a></p>
</div>



</body>
</html>