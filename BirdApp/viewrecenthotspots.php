<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Recent Sighting's</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="style.css" rel="stylesheet" type="text/css">

</head>
<body class="container">
  <div id="profile">
<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
<b id="logout"><a href="logout.php">Log Out</a></b>
<b id="logout"><a href="addrecent.php">Add</a></b>
<b id="logout"><a href="profile.php">Home</a></b>

</div>
<br><br><br>


<?php
 
			$conn=new mysqli("localhost","root","","bpp");
			if($conn->connect_error)
			{
					die($conn->connect_error);
			}
			
			$sql="SELECT * from image_table where purpose=1";
			
			$result=$conn->query($sql);

			if( $result->num_rows > 0)
			{
				while($row=$result->fetch_assoc()) { ?>
				
					<div class="row">
						<div class="col-sm-3 resource-thumbnail">
							
							<img src="<?php echo $row["foldername"].$row["imagename"]; ?>" class="img-thumbnail img-responsive image_square">
							
						</div>
						<div class="col-sm-6 resource-contents">
							<h2 class="resouce-name"><?php echo $row['birdname']; ?></h2>
							<div class="resource-description">Just Spotted this near:- <?php echo $row["area"];?></div>
						</div>
						<div class="col-sm-3 actions">
						<div class="lead">Sighted By:- <?php echo strtoupper($login_session); ?></div>
							<div class="time-ranges">DATE: <?php echo $row["date"]; ?></div>
							 <div class="time-ranges">Time: <?php echo $row["time"]; ?></div><br>
						
						  
						</div>


					</div><br>

				
			<?php	}

			}
			else
			{
				
			}
			


				
?>






</body>
</html>


