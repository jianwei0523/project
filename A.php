<?php

$con = mysqli_connect("localhost", "root", "1234","join");

if (!$con) {
    die("Connection failed: " .mysql_error());
} 

$result = mysqli_query($con,"SELECT jea_properties.id, jea_properties.house_no, jea_properties.taman_id, jea_properties.adress, jea_towns.value, jea_properties.price, jea_properties.land_space, jea_properties.price -(SELECT AVG(price) FROM jea_properties) as average
FROM jea_properties
LEFT JOIN jea_towns
ON jea_properties.town_id=jea_towns.id
ORDER BY jea_properties.id");

echo "<table border='1'><tr><th>Property ID</th><th>Address</th><th>Price</th><th>Land Space > 1000</th><th>Price - Average</th></tr>";

while($row = mysqli_fetch_array($result)) {

echo "<tr><td><a href='B.php?id=".$row['id']."'>".$row['id']."</a></td><td>".$row['house_no'].", ".$row['adress'].", ".$row['taman_id'].", ".$row['value']."</td><td>".$row['price']."</td>";
if ($row['land_space'] >1000) {echo "<td>Yes</td>";}else{echo"<td>No</td>";};
echo"<td>".$row['average']."</td></tr>";

}
echo "</table>";
mysqli_close($con);

?>