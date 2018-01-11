<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

th{
 background-color: #4CAF50;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>

<?php
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$user=$_POST["var"];
$user=trim($user);
$sitename = $_POST["sitename"];
$sitename=trim($sitename);
//var_dump($user);
$sql = "SELECT username, message, site FROM data WHERE name ='$user' and comm='$sitename'";
//echo $sql;
$result = $conn->query($sql);
echo "<table>"; 
echo "<tr><th>"."FROM"."</th><th>"."COMMUNITY"."</th><th>"."MESSAGE"."</th></tr>";
if ($result->num_rows > 0)
{   // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        echo "<tr><td>".$row["username"]."</td><td>".$row["site"]."</td><td>". $row["message"]."</td></tr>";
    }
} else {
    echo "0 results";
}
echo "</table>";
$conn->close();
?>

</body>
</html>