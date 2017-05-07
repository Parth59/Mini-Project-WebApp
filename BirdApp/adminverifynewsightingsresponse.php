<?php
$conn = new mysqli("localhost","root","","bpp");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
foreach($_POST['birdid'] as $sample)
{
	echo $sample;




//SPECIES TABLE START
	$sqlt="SELECT birdid from birdspecies ORDER BY birdid DESC LIMIT 1";					
	$result = $conn->query($sqlt);
	$row2=$result->fetch_assoc();	
	$idd=$row2["birdid"]+1;
	



	$sql="SELECT * from tempbirdspecies where birdid=".$sample;
	$result = $conn->query($sql);
	$row=$result->fetch_assoc();
	

	$birdnametobeinserted = $row["primarybirdname"];
	$sql="INSERT INTO birdspecies VALUES(".$idd.",'".$birdnametobeinserted."','".$row["scientificlatinname"]."',".$row["size"].",".$row["category"].");";



	$result = $conn->query($sql);

//SPECIES TABLE END



//COLOR START

	$sql="SELECT * from tempcolor where primarybirdname='".$birdnametobeinserted."'";
	$result = $conn->query($sql);
	$row=$result->fetch_assoc();
	$sql="INSERT INTO color VALUES('".$row["primarybirdname"]."','".$row["colorname"]."')";

	$result = $conn->query($sql);



		
	$sql="DELETE from tempcolor where primarybirdname='".$birdnametobeinserted."'";
	$result = $conn->query($sql);


	if ($result=== TRUE) {
    echo "Record deleted successfully";
	} else {
		echo "Error deleting record: " . $conn->error;
	}

//COLOR END







//LOCATION START 

	$sqlt="SELECT ID from location ORDER BY ID DESC LIMIT 1";					
	$result = $conn->query($sqlt);
	$row2=$result->fetch_assoc();	
	$idd2=$row2["ID"]+1;


	$sql="SELECT * from templocation where birdid=".$sample;
	$result = $conn->query($sql);
	$row=$result->fetch_assoc();

	$sql="INSERT INTO location (ID,birdid,country,state,city,area,date,season) VALUES(".$idd2.",".$idd.",'".$row["country"]."','".$row["state"]."','".$row["city"]."','".$row["area"]."','".$row["date"]."','".$row["season"]."')";

	$result = $conn->query($sql);
	

	$sql="DELETE from templocation where birdid=".$sample;
	$result = $conn->query($sql);

	if ($result=== TRUE) {
		echo "Record deleted successfully";
	} else {
		echo "Error deleting record: " . $conn->error;
	}

//LOCATION END



//Taxonomy Start  

	$sql="SELECT * from temptaxonomy where birdid=".$sample;
	$result = $conn->query($sql);
	$row=$result->fetch_assoc();
	$sql="INSERT INTO taxonomy VALUES(".$idd.",'".$row["scientificlatinname"]."','".$row["description"]."','".$row["scientificorder"]."','".$row["scientificfamily"]."','".$row["extinctionrisk"]."','".$row["food"]."','".$row["habitat"]."')";

	$result = $conn->query($sql);


	
	$sql="DELETE from temptaxonomy where birdid=".$sample;
	$result = $conn->query($sql);

	if ($result=== TRUE) {
		echo "Record deleted successfully";
	} else {
		echo "Error deleting record: " . $conn->error;
	}


//Taxonomy END





//Bird Commonname START

$sql="SELECT * from tempbirdcommonname where primarybirdname='".$birdnametobeinserted."'";
$result = $conn->query($sql);
$row=$result->fetch_assoc();

$sql="INSERT INTO birdcommonnname values('".$row["primarybirdname"]."','".$row["commonname"]."')";


$sql="DELETE from tempbirdcommonname 
 where primarybirdname='".$birdnametobeinserted."'";

$result = $conn->query($sql);
	


//Bird Commonname END









//DELETING STARTS







	


	$sql="DELETE from tempbirdspecies where birdid=".$sample;
	$result = $conn->query($sql);

	
	if ($result=== TRUE) {
		echo "Record 1 deleted successfully";
	} else {
		echo "Error deleting record: " . $conn->error;
	}




//DELETING STOPS



}	

$conn->close();
?>