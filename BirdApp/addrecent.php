<?php
include('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>

<link href="style.css" rel="stylesheet" type="text/css">



  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



</head>



<body>

<div  class="container">

<div id="profile">
<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
<b id="logout"><a href="logout.php">Log Out</a></b>
<b id="logout"><a href="profile.php">Home</a></b>

</div>
<br><br><br>



<form method="post" action="addrecentresponse.php" enctype="multipart/form-data" id="uploadForm">
<div class="row">
	<div class="col-md-6">
	<input type="file" name="file" id="file" />
    </div>

		<div class="col-md-6" class="input-group">
		<label style="margin:5px" > DATE </label> 
      <input type="date" name="date"><br>
	<label  > TIME (24 hours format)</label> 
  <input type="time" name="usrtime"><br>

<label > BIRDNAME</label> 
  <input type="text" class="form-control" name="birdname"><br>


		<label style="margin:5px" > LOCATION DETAILS </label>  

	<?php
							$conn=new mysqli("localhost","root","","bpp");
							if($conn->connect_error)
							{
								die($conn->connect_error);
							}


							$sql1="SELECT distinct(country) FROM location";
							$sql2="select distinct(state) from Location";
							$sql3="select distinct(city) from Location";
							$sql4="select distinct(area) from Location";
							
							$temp=array($sql1,$sql2,$sql3,$sql4);


					for($i=0;$i<4 ;$i++)
					{
							$result=$conn->query($temp[$i]);
							
							if ($result->num_rows > 0) {

							echo '<select class="form-control" name="sql'.$i.'">';

							   while($row = $result->fetch_assoc()) 
								   {		
//									echo $row["country"];
												if($i==0)
														$strin="country";
												else if ($i==1)
														$strin="state";
												else if ($i==2)
														$strin="city";
												else
														$strin="area";

										    echo "<option  value=\"".$row[$strin]."\">".$row[$strin]."</option>";

									}

							echo "</select></br>";

								} 
								else 
								{
										    echo "0 results";
								}
						
						
					}
		
						
			$conn->close();	

							
					?>


	<input style="margin:5px" type="submit" name="submit" value="Submit"/>
		</div>



</div>
</form>



<script src="jquery.min.js"></script>
<script>
function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#uploadForm + img').remove();
            $('#uploadForm').after('<img src="'+e.target.result+'" width="450" height="300"/>');
            //$('#uploadForm + embed').remove();
            //$('#uploadForm').after('<embed src="'+e.target.result+'" width="450" height="300">');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#file").change(function () {
    filePreview(this);
});
</script>


</div>
</body>
</html>