<?php
session_start();
include 'datab.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sell Product</title>
<style>
.error {color: #FF0000;}
</style>
<link rel="stylesheet" type="text/css" href="cssfile.css">
</head>
<body background="images/pic11.jpg">


<div id="login">
<?php
include 'datab.php';


    
    

//define variables and set them to empty values
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$pname = $_POST["title"];
$pdesc = $_POST["desc"];
$imageName = mysql_real_escape_string($_FILES["image"]["name"]);
    $imageData = mysql_real_escape_string(file_get_contents($_FILES["image"]["tmp_name"]));
    $imageType = mysql_real_escape_string($_FILES["image"]["type"]);
    
$seller=$_SESSION["uname"];

$startprice = $_POST["base_price"];
$currentprice = $_POST["base_price"];
$cid = $_POST["category"];
$sql = "INSERT INTO product(pname,pdesc,name,image,startprice,currentprice,status,bidcount,cid,startdate,enddate,seller)
VALUES ('$pname','$pdesc','$imageName','$imageData','$startprice','$currentprice','1',0,'$cid',sysdate(),DATE_ADD(sysdate(), INTERVAL 7 day),'$seller')";


//$result = mysqli_query($conn,$sql);
if (mysqli_query($conn, $sql)) 
{
    echo "<b><h3>New record created successfully</h3></b>";
} else 
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}


?>
<h2>Sell Your Product here!!</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
	

		<p><input type="text" name="title" placeholder="Add title" required id="text"><span class="error">*</p>

		<p>
			<select name="category" required id="text">
        	<option selected="" value=0 >Mobiles</option>
         	<option value=1>Mobile Accessories</option>
         	<option value=2>Wearables</option>
         	<option value=3>Laptops</option>
         	<option value=4>Computer Accessories</option>
         	<option value=5>Cameras</option>
         	<option value=6>Tablets</option>
     		</select>
     	</p>

     	<p><TEXTAREA name="desc" placeholder="Add description" id="text"></TEXTAREA></p>

     	<p>Select image to upload:<br>
    	<input type="file" name="image" accept="image/*" id="text" required>

		<p><input type="text" name="mobile" placeholder="Mobile no." required id="text"><span class="error">*</p>

		<p><input type="number" name="base_price" placeholder="Enter the base price" id="text" required><span class="error">*</p>

			
		<p><button type="submit" class="buttonp">Upload</button></p>
	
	</form>

	</div>


</body>

</html>