<?php
include('session.php');
?>

<?php

//STEP1
$birdname=$_POST["birdname"];
$numberssighted=$_POST["numberssighted"];


//STEP 2
$date=$_POST["date"];
$country=$_POST["country"];
$state=$_POST["state"];
$city=$_POST["city"];
$area=$_POST["area"];

//STEP 3
$behaviour=$_POST["behaviour"]; 


$conn = new mysqli("localhost","root","","bpp");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="SELECT samplingid from samplingtable ORDER BY samplingid DESC LIMIT 1;";

$result=$conn->query($sql);
$row=$result->fetch_assoc();
$id=$row["samplingid"];

$id=$id+1;

$observerid = $login_session;
   
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
		
		$season=$seasonname;
		
		$sql="INSERT INTO samplingtable(samplingid,username,primarybirdname,numberssighted,season,observedbehaviour,country,state,city,area) values(".$id.",'".$observerid."','".$birdname."',".$numberssighted.",'".$season."','".$behaviour."','".$country."','".$state."','".$city."','".$area."');";

	}
else
{
		$sql="INSERT INTO samplingtable(samplingid,username,primarybirdname,numberssighted,observedbehaviour,country,state,city,area) values(".$id.",".$observerid.",'".$birdname."',".$numberssighted.",'".$behaviour."','".$country."','".$state."','".$city."','".$area."');";
}
$result=$conn->query($sql);


echo $sql;


?>