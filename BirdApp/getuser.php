 <!DOCTYPE html>
<html>
<head>
<style>


th {text-align: left;}
</style>
</head>
<body>

<?php
$q = $_GET['q'];

$conn = new mysqli("localhost","root","","bpp");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM tempbirdspecies NATURAL JOIN templocation NATURAL JOIN tempcolor NATURAL JOIN temptaxonomy NATURAL JOIN tempbirdcommonname where tempbirdspecies.primarybirdname='".$q."'";


$result =$conn->query($sql);

$row=$result->fetch_assoc();
$size=$row['size'];
$category    =$row['category'];
$description = $row['description'];
$scientificorder = $row['scientificorder'];
$scientificfamily=$row['scientificfamily'];
$scientificlatinname=$row['scientificlatinname'];
$commonname=$row['commonname'];
$food=$row['food'];
$habitat=$row['habitat'];
$extinctionrisk=$row['extinctionrisk'];





/*while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['size'] . "</td>";
    echo "<td>" . $row['category'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td>" . $row['scientificorder'] . "</td>";
    echo "<td>" . $row['scientificfamily'] . "</td>";
    echo "</tr>";
}*/








echo "<table>

<tr>
<th>size</th>
<td>".$size."</td>
</tr>
	
<tr>
<th>category</th>
<td>".$category."</td>
</tr>


<tr>
<th>description</th>
<td>".$description."</td>
</tr>

<tr>
<th>scientificorder</th>
<td>".$scientificorder."</td>
</tr>

<tr>
<th>scientificfamily</th>
<td>".$scientificfamily."</td>
</tr>

<tr>
<th>scientificlatinname</th>
<td>".$scientificlatinname."</td>
</tr>

<tr>
<th>commonname</th>
<td>".$commonname."</td>
</tr>

<tr>
<th>Food</th>
<td>".$food."</td>
</tr>

<tr>
<th>Habitat</th>
<td>".$habitat."</td>
</tr>


<tr>
<th>extinctionrisk</th>
<td>".$extinctionrisk."</td>
</tr>


";

echo "</table>";

?>
</body>
</html>