<!DOCTYPE html>
<html lang="en">
<head>
<title>BidBuyUse</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="cssfile.css">
<style>
	.row::after 
	{
    	content: "";
    	clear: both;
    	display: block;
	}
	[class*="col-"] 
	{
    	float: left;
   		padding: 15px;
	}
.col-1 {width: 8.33%;}
.col-2 {width: 16.66%;}
.col-3 {width: 25%;}
.col-4 {width: 33.33%;}
.col-5 {width: 41.66%;}
.col-6 {width: 50%;}
.col-7 {width: 58.33%;}
.col-8 {width: 66.66%;}
.col-9 {width: 75%;}
.col-10 {width: 83.33%;}
.col-11 {width: 91.66%;}
.col-12 {width: 100%;}
	.menu 
	{
    	color: #ffffff;
    	font: normal normal normal 14px/1 FontAwesome;
    	font-size: inherit;
    	text-rendering: auto;
	}
</style>
<script type="text/javascript">
    function getTimeRemaining(endtime){
      var t = Date.parse(endtime) - Date.parse(new Date());
      var seconds = Math.floor( (t/1000) % 60 );
      var minutes = Math.floor( (t/1000/60) % 60 );
      var hours = Math.floor( (t/(1000*60*60)) % 24 );
      var days = Math.floor( t/(1000*60*60*24) );
      return {
        'total': t,
        'days': days,
        'hours': hours,
        'minutes': minutes,
        'seconds': seconds
      };
    }
    function initializeClock(id, endtime){
      var clock = document.getElementById(id);
      var daysSpan = clock.querySelector('.days');
    var hoursSpan = clock.querySelector('.hours');
    var minutesSpan = clock.querySelector('.minutes');
    var secondsSpan = clock.querySelector('.seconds');

        var timeinterval = setInterval(function(){
      var t = getTimeRemaining(endtime);
      clock.innerHTML =  t.days + ':' +
                       t.hours
                       + ':' + t.minutes + ':' +
                       t.seconds;
      if(t.total<=0){
        clearInterval(timeinterval);}     
      },1000);
      daysSpan.innerHTML = t.days;
      hoursSpan.innerHTML = t.hours;
      minutesSpan.innerHTML = t.minutes;
      secondsSpan.innerHTML = t.seconds;
    }
    
        
    

  </script>

</head>
<body>

<div>
<ul class="ul">
	<li style="float: left;"><img src="images/logo2.png" height="120px" width="auto" vspace="1%" hspace="5%" /></li>
			<a href="register_form.php">
			<li class="li"><button class="buttonp" style="background-color: blue;">Sign Up</button></li></a>
			<a href="login.php"><li class="li"><button class="buttonp">Login</button></li></a>
			
</ul>
</div>

<div id="div2">
  <div id="slider">
    <img src="images/pic5.jpg">
    <img src="images/pic6.jpg">
    <img src="images/pic7.jpg">
  <img src="images/pic1.jpg">
   </div>
</div>

<div>
<ul class="ul2">
  <li><a class="active" href="bidbuyuse.php">Home</a></li>
  <li><a href="about.php">About us</a></li>
  <li><a href="contactus.php">Contact us</a></li>
  <li><a href="member.php">Products</a></li>
  <li><a href="register_form.php">Sign up</a></li>
  <li><a href="winners.php">Winners</a></li>
 
</ul>
</div>
  



<h1><p align="center">Mumbai's No#1 Auction Bidding Platform</p></h1>
<p align="center" >The freedom to sell/auction as many products as the user wants.</p> 
<p align="center" >Highest standards for our customer’s privacy</p>
<p align="center" >Accurate product and pricing information</p>

<a href="register_form.php"><button type="button" class="button">Join now</button></a>


<div class="row">

<div class="col-5 menu">
<div class="button1">
<ul>
<li>Choice of Auction/Bid.</li>
<li>Experts advice.</li>
<li>Sell your Product.</li>
<li>No limit on sell/bid.</li>
<li>Easy pick up and delivery.</li>
</ul>
</div>
</div>
<div class="col-4">
<video width="400" controls>
<source src="videos/Welcome to bidbuyuse.mp4" type="video/mp4">
</video>
</div>

</div>
          

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div style="position: relative; left: 0; top: 0;">
  <img src="images/auction.jpg" style="position: relative; top: 0; left: 0;width:100%;height:300px"/>
  <img src="images/mobile.png" style="position: absolute; bottom: 180px; left: 70px;"/>
</div>


  
    <h1 align="center">---- LIVE AUCTION ----</h1>
  


<?php
error_reporting(0);
include 'datab.php';
$sql = "SELECT * FROM product";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)){
  if($row['status']==1)
{
?>	<div class="spacing">
	<div class="col-3">
    <table style="border:1px solid black;">
    	<tr>
    		<th>
    		<h3><?php echo $row['pname']; ?></h3>
        	</th>
        </tr>

        <tr>
        	<td>
            <h3>MRP:<?php echo $row['currentprice']; ?></h3><br>
            <img  src="check.php?image_id=<?php echo $row["pid"]; ?>" width="300pd" height="250pd"><br>
            <h4>Auction id:<?php echo $row['pid']; ?></h4>
            <h5 align="right"><div id='clockdi<?php echo $row["pid"]?>'></div></h5>
            </td>
        </tr>

        <tr bgcolor="#3d4d65">
        <td style="text-align:center" padding:30px;>      
            <a href="login.php"><h3><font color="#fff">BID</font></h3></a>
        </td>
        </tr>
   	</table>
   	</div>
   	</div>
<?php
echo  "<script type='text/javascript'>";
echo 'var a='.json_encode($row['enddate']).';';
echo 'initializeClock("clockdi'.$row['pid'].'",a);';
echo "</script>";
}
}
?>

<div style=" padding-bottom: 15px">
  <div class="row">
      	<div class="col-6">
        	
          		<h4><u>ONLINE AUCTION RULES</u></h4>
          		
            		<ul>
              		<li>One User Account Per Person / IP Address / House is allowed</li>
              		<li>Group Bidding is strictly not allowed</li>
              		<li>Do not use any 3rd party bidding softwares of bots for bidding</li>
              		<li>Misleading USER IDs are not allowed - Please don't try your tricks</li>
              		<li>Violation of rules will result in Suspension of your account</li>
            		</ul>
           			
      	</div>

      	
    
  </div>

<footer>
<br>
<a href="bidbuyuse.php"><font color="#fff">AUCTION HOME</font></a> 
| <a href="about.php"><font color="#fff">HOW IT WORKS </font></a>
| <a href="login.php"><font color="#fff">HOT PRODUCTS</font></a>
| <a href="contactus.php"><font color="#fff">CONTACT US</font></a>
<h5>Copyright 2016 - 2017 Bidbuyuse Corporation. All rights reserved.
</h5>
</footer>

</body>
</html>

