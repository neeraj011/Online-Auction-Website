<?php
include 'datab.php';
session_start();
if(!isset($_SESSION['uname']) || !isset($_SESSION['pwd'])){
  header('location: login.php');
}




    echo "<h1>".$_SESSION['uname']."</h1>";
    
?>
<!Doctype html>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
	body{
		background-image:url("images/pic11.jpg");
	}
	.mem_but {
    background-color: #37F7E9;
    border: none;
    color: white;
    padding: 10px 40px;
    text-align: center;
    text-decoration: none;
    font-size: 20px;

}
.div{
	display: block;
	border:none;
}
</style>
	<title>Members</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="cssfile.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<header style="text-align:left;">
<a href="logout.php" align="right" style="color:white; text-decoration:none;">LOGOUT</a> 
</header>


	
	
<br>
<br>

<div class="div">
<h1 style="font-family:Times New Roman, Times, serif;color: white; font-weight: bold;
" align="center"> To start bidding click here</h1>
<center><button  class="mem_but" ><a href="bidtest.php" style="text-decoration:none; color:white;">Bid</a></button></center>

</div >
<div  class="div">
<h1 style="font-family:Times New Roman, Times, serif ; color: white; font-weight: bold;
" align="center"> To sell your product click here</h1>
<center><button  class="mem_but"><a href="sell12.php" style="text-decoration:none; color: white; ">Sell</a></button></center>
</div>

</ul>
<footer style="position: fixed; bottom:0; width: 100%;">
<br>
<a href="bidbuyuse.php">AUCTION HOME </a>
|<a href="winners.php"> MEET WINNERS </a>
|<a href="about.php"> ABOUT US </a>
|<a href="contactus.php">CONTACT US</a>
<h5>Copyright 2016 - 2017 Bidbuyuse Corporation. All rights reserved.
</h5>
</footer>




</body>
</html>