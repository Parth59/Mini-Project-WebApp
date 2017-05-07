<?php
$conn = new mysqli("localhost","root","","bpp");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
foreach($_POST['samplingid'] as $sample)
{
	//echo $sample;
	

	$sql="SELECT * from samplingtable where samplingid=".$sample;
	$result = $conn->query($sql);
	$row=$result->fetch_assoc();
	
	//echo $row['primarybirdname'];
	$sql2="Select birdid from birdspecies where primarybirdname='".$row['primarybirdname']."';";

	$result2=$conn->query($sql2);
	$row2=$result2->fetch_assoc();
	$birdid=$row2["birdid"];

	
	$sql= "INSERT INTO location (birdid,country,state,city,area,season) values (".$birdid.",'".$row["country"]."','".$row["state"]."','".$row["city"]."','".$row["area"]."','".$row["season"]."')";
	
	//echo $sql;

	$result3=$conn->query($sql);
	
	$sql = 'UPDATE samplingtable set verified = 1 where samplingid='.$sample;
	$result=$conn->query($sql);
	


}	

$conn->close();
?>