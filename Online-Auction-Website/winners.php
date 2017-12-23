<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="cssfile.css">
</head>
<body background="images/pic11.jpg">
<header>
<a href="bidbuyuse.php" href="bidbuyuse.php"><font color="#fff">AUCTION HOME</font></a> 
| <a href="about.php"><font color="#fff">HOW TO BID</font> </a>
| <a href="member.php"><font color="#fff">MEMBER PAGE</font></a>
| <a href="contactus.php"><font color="#fff">CONTACT US</font></a> 
</header>

<center>
<b><h2>Winners</h2></b>
<hr style='margin-top:-1em' align="center" size="1" width="15%" color="blue">
<p style="color:#fff;"><i>&nbsp;&nbsp;&nbsp;&nbsp;Congratulations!!!</i></p>

<table cellpadding="10" cellspacing="5">
<tr>
<td bgcolor="#3d4d65" align="center" style="color:white;">Name</td>
<td bgcolor="#3d4d65" align="center" style="color:white;">Product</td>
<td bgcolor="#3d4d65" align="center" style="color:white;">Selling Price</td>
</tr>
<?php
error_reporting(0);
include 'datab.php';
$sql = "SELECT * FROM product where status=0 AND bidcount>0";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)){
	?>
<tr>
<td><?php echo $row['bidder']; ?></td>
<td align="center"><?php echo $row['pname']; ?></td>
<td align="center"><?php echo $row['currentprice']; ?></td>
</tr>
<?php
}
?>
<tr>
<td>Sanket Mhatre</td>
<td align="center">Google Nexus</td>
<td align="center">30000</td>
</tr>

<tr>
<td>Anshul Agarwal</td>
<td align="center">JBL Speakers</td>
<td align="center">8000</td>
</tr>

</table></center>
<footer style="position: fixed; bottom:0; width: 100%;">
<a href="bidbuyuse.php">AUCTION HOME </a>
|<a href="winners.php"> MEET WINNERS </a>
|<a href="about.php"> ABOUT US </a>
|<a href="contactus.php">CONTACT US</a>
<h5>Copyright 2016 - 2017 Bidbuyuse Corporation. All rights reserved.
</h5>
</footer>


</body>
</html>
