<?php
$conn = mysql_connect("localhost", "root", "");
mysql_select_db("login") or die(mysql_error());
if(isset($_GET['image_id'])) {
$sql = "SELECT name,image FROM product WHERE pid=" . $_GET['image_id'];
$result = mysql_query("$sql") or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysql_error());
$row = mysql_fetch_array($result);
header("Content-type: " . $row["name"]);
echo $row["image"];
}
mysql_close($conn);
?>