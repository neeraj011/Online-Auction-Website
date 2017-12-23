<!DOCTYPE html>
<html lang="en">
<head>
<style type="text/css">
input[type=submit] {
    width: 100%;
    background-color: #3d4d65;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
div.container
{
  width:100%;
  
}
header,footer
{
   background-color:#3d4d65;
   color:#b4becd;
   padding: 1em;
   text-align: center;


}
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
</style>
  <title>BidBuyUse</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script type="text/javascript">
    var deadline='2016-10-22';
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
<body padding="10">


<div class="container">
<header>
<a href="bidbuyuse.php" href="bidbuyuse.php"><font color="#fff">AUCTION HOME</font></a> 
| <a href="about.php"><font color="#fff">HOW TO BID</font> </a>
| <a href="member.php"><font color="#fff">MEMBER PAGE</font></a>
| <a href="contactus.php"><font color="#fff">CONTACT US</font></a> 
</header>

 

<div class="row">
<?php
error_reporting(0);
include 'datab.php';
$sql = "SELECT * FROM product";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)){
  if($row['enddate'] < date("Y-m-d"))
  {
    $pid=$row['pid'];
    $up = "UPDATE product set status=0 where pid=$pid";
    mysql_select_db('login');
         $res=mysqli_query($conn,$up);
  }
if($row['status']==1)
{
?><div class="spacing">

  <div class="col-3">
  <table style="border:1px solid black;">
    <tr>
      <th>
        <h1><?php echo $row['pname']; ?></h1>
      </th>
    </tr>
    <tr>
      <td>
        <h3>Price:<?php echo $row['currentprice']; ?></h3><br>
        <img  src="check.php?image_id=<?php echo $row["pid"]; ?>" width="300pd" height="250pd" >
        <h4 align="left">Min bidding price:<?php echo $row['startprice']; ?></h4>
        <h4>Auction id:<?php echo $row['pid']; ?></h4>
        <h5 align="right"><div id='clockdi<?php echo $row["pid"]?>'></div></h5>
      </td >
    </tr>
    <tr>
      <td>        
      
        
      </td>
    </tr>
    <tr>
      <th bgcolor="#3d4d65">
        <form method ="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="submit" background-color : #3d4d65; value="BID"  name="submit<?php echo $row["pid"]?>">
    </tr>
    <tr>
      <td>
        <input type="text"  placeholder="Enter your bid" name="bidamount<?php echo $row["pid"]?>">
      </td>
      </th>
    </tr>
        </form>
    </tr>
        <?php
        if (isset($_POST))
        {
          session_start();
          $user=$_SESSION['uname'];
        $BID=$_POST["bidamount".$row['pid']];
        $pid=$row['pid'];
         $sql ="UPDATE product set currentprice = currentprice+$BID, bidcount=bidcount+1,bidder='$user' where pid=$pid ";
         mysql_select_db('login');
         $res1=mysqli_query($conn,$sql);
       }
       else
       {

       }
        ?>

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
</div>

<div>
<footer>
<br>
<a href="bidbuyuse.php">AUCTION HOME </a>
|<a href="winners.php"> MEET WINNERS </a>
|<a href="about.php"> ABOUT US </a>
|<a href="contactus.php">CONTACT US</a>
<h5>Copyright 2016 - 2017 Bidbuyuse Corporation. All rights reserved.
</h5>
</footer>
</div>
</body>