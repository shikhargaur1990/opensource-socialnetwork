<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cmpe281";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$n=$_POST["name"];
$c=$_POST["comm"];
$m=$_POST["message"];
$v=$_POST["var"];
$s=$_POST["sitename"]
//echo $v;
if($n!='' && $c!='' && $m!='')
{
	$sql = "INSERT INTO data (name, comm, message, username, site) 
			VALUES ('$n', '$c', '$m' , '$v', '$s')";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
    	echo "Your Message has been sent";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
else
	echo "Please fill all the values";

$conn->close();
?>
