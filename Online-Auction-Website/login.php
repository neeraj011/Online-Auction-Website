<?php
session_start();
include 'datab.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="cssfile.css">
<style>
.error {color: #FF0000;} /*Embedded CSS */
</style>
<title></title>

</head>

<body background="images/pic5.jpg">
<?php
$username = $password= "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	if($username && $password)
	{
			$sql = "SELECT * FROM user1 WHERE uid='$username' AND pwd='$password'";
			$result = mysqli_query($conn,$sql);
			if(!$row = mysqli_fetch_assoc($result))
			{
					echo "Your username or password is incorrect";
			}
			else
{
	session_start();
	$_SESSION['uname'] = $username;
	$_SESSION['pwd'] = $password;
	header('location: member.php');
}

	}
	else
	{
		echo "Please enter a username and password" ;
	}
}

?>
<div id="login">
<h2>Login</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

 <br><input type="text" name="username" placeholder="UserName" id="text"><span class="error">*</span><br>
 <br><input type="password" name="password" placeholder="Password" id="text"><span class="error">*</span><br><br>
<input type="submit" class="buttonp">

</form>
</div>


</body>
</html>

