<?php

$con = mysqli_connect("localhost", "root", "1234","join");

if (!$con) {
    die("Connection failed: " .mysql_error());
} 

if(isset($_GET['id'])){
	
$id=$_GET['id'];
$query = mysqli_query($con,"SELECT jea_properties.id, jea_properties.house_no, jea_properties.taman_id, jea_properties.adress, jea_towns.value, jea_properties.price, jea_properties.availability
FROM jea_properties
LEFT JOIN jea_towns
ON jea_properties.town_id=jea_towns.id
WHERE jea_properties.id ='$id'
ORDER BY jea_properties.id ");

$row = mysqli_fetch_array($query);

$taman = $row['taman_id'];
$price = $row['price'];

echo "<div><table border='1'>
<tr><td>Porperty ID: ".$row['id']."</td></tr>". 
"<tr><td>Address: ".$row['house_no'].", ".$row['adress'].", ".$row['taman_id'].", ".$row['value']."</td></tr>".
"<tr><td>Price: ".$row['price']."</td></tr>". 
"<tr><td>Availability Date: ".$row['availability']."</td></tr>".
"</table></div>";

$query2 = mysqli_query($con,"SELECT jea_properties.id, jea_properties.house_no, jea_properties.taman_id, jea_properties.adress, jea_towns.value, jea_properties.price, jea_properties.availability
FROM jea_properties
LEFT JOIN jea_towns
ON jea_properties.town_id=jea_towns.id
WHERE taman_id LIKE '%$taman%' 
AND price >($price)-50000 AND price <($price)+50000
AND jea_properties.id != '$id'
ORDER BY jea_properties.id 
LIMIT 5");

echo "<p><table border='1'><tr><th>Property ID</th><th>Address</th><th>Price</th><th>Availability Date</th></tr>";

while($row2 = mysqli_fetch_array($query2)) {
echo "<tr>
<td>".$row2['id']."</td>
<td>".$row2['house_no'].", ".$row2['adress'].", ".$row2['taman_id'].", ".$row2['value']."</td>
<td>".$row2['price']."</td>
<td>".$row2['availability']."</td>
</tr>";
}
echo "</table>";
}

mysqli_close($con);
?>