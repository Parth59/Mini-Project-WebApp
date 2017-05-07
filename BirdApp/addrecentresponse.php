<?php
include('session.php');
?>



<?php
if(isset($_POST['submit']) && !empty($_FILES['file']['name'])){


			$conn=new mysqli("localhost","root","","bpp");
			if($conn->connect_error)
			{
					die($conn->connect_error);
			}

		//	$insert_path="INSERT INTO image_table (username,,foldername,imagename,country,state,city,area,date,time) VALUES('".$login_session."','".$path."','".$upload_image."','".$country."','".$state."','".$city."','".$area."','".$date."','".$time."')";
		//	$result=$conn->query($insert_path);


			
$sql="SELECT imageid from image_table ORDER BY imageid DESC LIMIT 1;";


$result=$conn->query($sql);

if($result->num_rows>0)
{
	$row=$result->fetch_assoc();
	$id=$row["imageid"];
	$id=$id+1; 
}
else
{
	$id=1;
}


	$path = "uploadsrecent/".$login_session."/";
	if(!is_dir($path)){
		  mkdir($path);
	}

//	$upload_image=$id;
	
	$imageName=$id.".".pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION);
	
	echo $imageName;
    if(move_uploaded_file($_FILES['file']['tmp_name'],"uploadsrecent/".$login_session."/".$imageName)){
        echo 'File has uploaded successfully.';

		$date=$_POST["date"];
		$time=$_POST["usrtime"];
		$country=$_POST["sql0"];
		$state=$_POST["sql1"];
		$city=$_POST["sql2"];
		$area=$_POST["sql3"];
		$birdname=$_POST["birdname"];


echo $date;
echo $time;

echo $login_session;

$insert_path="INSERT INTO image_table (imageid,username,foldername,imagename,birdname,country,state,city,area,date,time,purpose) VALUES(".$id.",'".$login_session."','".$path."','".$imageName."','".$birdname."','".$country."','".$state."','".$city."','".$area."','".$date."','".$time."',1);";

			$result=$conn->query($insert_path);

			echo $insert_path;

    }else{
        echo 'Some problem occurred, please try again.';
    }








//	$command = escapeshellcmd('/usr/custom/test.py');
//	$output = shell_exec($command);
//	echo $output;






}
?>