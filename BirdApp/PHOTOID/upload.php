<?php
include('session.php');
?>
   <head>
      <link href="style.css" rel="stylesheet" type="text/css">
      <link href="style2.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <!-- 
         <style>
                 table, th, td {
                 border: 1px solid black;
                 }
              </style> -->
      <script type="text/javascript">
         function codeAddress() {
         $('#products .item').addClass('list-group-item');
         
         }
         
      </script>
   </head>

     <body class="container" onLoad="codeAddress();">
      <div id="profile">
         <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
         <b id="logout"><a href="/BirdApp/logout.php">Log Out</a></b>
         <b id="logout"><a href="../profile.php">Home</a></b>

      </div>
      <br><br><br>
      <div class="well well-sm">
         <strong>Category Title</strong>
         <div class="btn-group">
            <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
            </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
               class="glyphicon glyphicon-th"></span>Grid</a>
         </div>
      </div>
<?php
if(isset($_POST['submit']) && !empty($_FILES['file']['name'])){

	
	$path = "uploads/".$login_session."/";
	if(!is_dir($path)){
		  mkdir($path);
	}

	$upload_image=$_FILES["file"]["name"];


    if(move_uploaded_file($_FILES['file']['tmp_name'],"uploads/".$login_session."/".$_FILES['file']['name'])){
      //  echo 'File has uploaded successfully.';

		$date=$_POST["date"];
	//	$time=$_POST["usr_time"];
		$country=$_POST["sql0"];
		$state=$_POST["sql1"];
		$city=$_POST["sql2"];
		$area=$_POST["sql3"];



//echo $date;
//echo $time;
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

//echo $login_session;

$insert_path="INSERT INTO image_table (imageid,username,foldername,imagename,country,state,city,area,date) VALUES(".$id.",'".$login_session."','".$path."','".$upload_image."','".$country."','".$state."','".$city."','".$area."','".$date."');";

			$result=$conn->query($insert_path);

			//echo $insert_path;

    }else{
        echo 'Some problem occurred, please try again.';
    }

if($_POST['whichone']=="1")
{
$stringinuse = "python oriental/test_images.py ".$path.$upload_image;
//echo $stringinuse;

$command = escapeshellcmd($stringinuse);
$output = shell_exec($command);
//echo $output;

$arr = explode("\n", $output);
//var_dump($arr);


for ($i=0;$i<3;$i++)
{
	$array2=explode(":",$arr[$i]);
?>


	  <div id="products" class="row list-group">

	  		         <div class="item col-xs-4 col-lg-4">
            <div class="tumbnail">
               <?php $imagesDir = '../Oriental_images/'.strtoupper($array2[0])."/";
                  //	echo $imagesDir;
                  	$images = glob($imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
                  
                  	//echo $images;
                  
                  	$randomImage = $images[array_rand($images)]; // See comments
                  
                  	//echo $randomImage;
                  						?>
               <img class="img-thumbnail" style="margin:15px" src="<?=$randomImage?>"  width="270" height="420" alt="" />
               <div class="caption">
                  <h4 class="group inner list-group-item-heading"><strong><?=strtoupper($array2[0]) ?></strong></h4>
                  
                  <h5 class="group inner list-group-item-heading">Matching Percentage:<?=($array2[1])  ?> </h5>
                 
                                 </div>
            </div>
         </div>


	  </div>


<?php

}

}
else
{
$stringinuse = "python stanford/test_images.py ".$path.$upload_image;
//echo $stringinuse;

$command = escapeshellcmd($stringinuse);
$output = shell_exec($command);
//echo $output;

$arr = explode("\n", $output);
//var_dump($arr);




for ($i=0;$i<3;$i++)
{
	$array2=explode(":",$arr[$i]);
?>
		<div id="products" class="row list-group">

	  		         <div class="item col-xs-4 col-lg-4">
            <div class="tumbnail">
               <?php $imagesDir = '../Oriental_images/'.strtoupper($array2[0])."/";
                  //	echo $imagesDir;
                  	$images = glob($imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
                  
                  	//echo $images;
                  
                  	$randomImage = $images[array_rand($images)]; // See comments
                  
                  	//echo $randomImage;
                  						?>
               <img class="img-thumbnail" style="margin:15px" src="<?=$randomImage?>"  width="270" height="420" alt="" />
               <div class="caption">
                  <h4 class="group inner list-group-item-heading"><strong><?=strtoupper($array2[0]) ?></strong></h4>
                  
                  <h5 class="group inner list-group-item-heading">Matching Percentage:<?=($array2[1])  ?> </h5>
                 
                                 </div>
            </div>
         </div>


	  </div>





<?php

}


}




$sql="Select * from birdspecies NATURAL JOIN location where location.area='".$area."'";

$result=$conn->query($sql);


if($result->num_rows>0)
{
	while($row=$result->fetch_assoc()){      ?>
			


		<div id="products" class="row list-group">

	  		         <div class="item col-xs-4 col-lg-4">
            <div class="tumbnail">
               <?php $imagesDir = '../Oriental_images/'.strtoupper($row["primarybirdname"])."/";
                  //	echo $imagesDir;
                  	$images = glob($imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
                  
                  	//echo $images;
                  
                  	$randomImage = $images[array_rand($images)]; // See comments
                  
                  	//echo $randomImage;
                  						?>
               <img class="img-thumbnail" style="margin:15px" src="<?=$randomImage?>"  width="270" height="420" alt="" />
               <div class="caption">
                  <h4 class="group inner list-group-item-heading"><strong><?=strtoupper($row["primarybirdname"]) ?></strong></h4>
                  
                  <h5 class="group inner list-group-item-heading">Area= <?=($row["area"])  ?> </h5>
                 
                                 </div>
            </div>
         </div>


	  </div>








	<?  }
	
}
else
{
  echo "None found using Area wise search";
}




}
?>


</body>