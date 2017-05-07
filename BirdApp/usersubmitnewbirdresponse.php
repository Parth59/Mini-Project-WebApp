<?php

//STEP1
$birdname=strtoupper($_POST["birdname"]);
$scientificbirdname=$_POST["scientificbirdname"];
$size=$_POST["size"];
$Category=$_POST["Category"];
$color=$_POST["color"];
$commonname=$_POST["commonname"];

//STEP 2
$date=$_POST["date"];
$country=$_POST["country"];
$state=$_POST["state"];
$city=$_POST["city"];
$area=$_POST["area"];

//STEP 3
$Description=$_POST["Description"];
$Habitat=$_POST["Habitat"];
$Food=$_POST["Food"];
$Order=$_POST["Order"];
$Family=$_POST["Family"];
$extinctionrisk=$_POST["extinctionrisk"];


$conn = new mysqli("localhost","root","","bpp");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT birdid FROM tempbirdspecies ORDER BY birdid DESC LIMIT 1;";

$result=$conn->query($sql);

if($result->num_rows>0)
{
	$row=$result->fetch_assoc();
	$id=$row["birdid"];
	$id=$id+1;
}
else
$id=1;


$sql = "INSERT INTO tempbirdspecies values(".$id.",'".$birdname."','".$scientificbirdname."',".$size.",".$Category.") ;";

echo $sql."<br><br>";
$result=$conn->query($sql);


		if(strtotime($date)!=false)
		{
			$monthno=date('m',strtotime($date));
					//    echo $monthno;
					
					if($monthno<=3 || $monthno>=11)
					$seasonname="WINTER";
					else if($monthno>=4 || $monthno <=7)
					$seasonname="SUMMER";
					else
					$seasonname="RAINY";


		$sql= "INSERT INTO templocation (birdid,country,state,city,area,date,season) values (".$id.",'".$country."','".$state."','".$city."','".$area."','".$date."','".$seasonname."') ;";

		}
		else
		{
		$sql= "INSERT INTO templocation (birdid,country,state,city,area) values (".$id.",'".$country."','".$state."','".$city."','".$area."') ;";
		}

echo $sql."</br>";

$result=$conn->query($sql);





$sql="INSERT INTO temptaxonomy(birdid,scientificlatinname,description,scientificorder,scientificfamily,extinctionrisk,food,habitat) values (".$id.",'".$scientificbirdname."','".$Description."','".$Order."','".$Family."','".$extinctionrisk."','".$Food."','".$Habitat."');";

echo $sql."</br>";

$result=$conn->query($sql);



$sql="INSERT INTO tempcolor values('".strtoupper($birdname)."','".$color."');";
$result=$conn->query($sql);
echo $sql."</br>";



$sql="INSERT INTO tempbirdcommonname values('".strtoupper($birdname)."','".$commonname."');";
$result=$conn->query($sql);
echo $sql."</br>";

?>