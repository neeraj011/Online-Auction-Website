<?php

$conn = mysqli_connect("localhost", "root", "", "login");
if(!$conn)
{
	die("Connection Failed: ".mysqli_connect_error());
}
