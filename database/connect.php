<?php
// Create connection
$conn = new mysqli_connect("localhost","root","root");

// Check connection
if (!$con)
{
	die('Could not connect:'.mysqli_error());
}
mydqli_select_db($con, "ip-project");
?>