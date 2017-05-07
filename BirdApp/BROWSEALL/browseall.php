<?php
include('session.php');
?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>BrowseAll</title>

  <script type="text/javascript">
        function codeAddress() {
$('#products .item').addClass('list-group-item');

}
        
        </script>
<link href="style.css" rel="stylesheet" type="text/css">

<link href="style2.css" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 </head>

 <body class="container"  >
 <!-- onload="codeAddress();" -->

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

<div id="products" class="row list-group">



<?php

$conn=new mysqli("localhost","root","","bpp");
if($conn->connect_error)
							{
								die($conn->connect_error);
							}

$sql="select * from birdspecies NATURAL JOIN taxonomy";
$result=$conn->query($sql);



if($result->num_rows>0)
{
		while($row = $result->fetch_assoc())                           {	?>
        <div class="item  col-xs-4 col-lg-4">
            <div class="thumbnail">

				<?php $imagesDir = '../Oriental_images/'.$row["primarybirdname"]."/";
//echo $imagesDir;
$images = glob($imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

//echo $images;

$randomImage = $images[array_rand($images)]; // See comments

//echo $randomImage;
					?>

                <img class="img-thumbnail" style="margin:15px" src="<?=$randomImage?>"  width="270" height="420" alt="" />
                <div class="caption">
                    <h4 class="group inner list-group-item-heading"><strong><?=($row["primarybirdname"]) ?></strong></h4>
                    <h4 class="group inner list-group-item-heading"><em><?=$row["scientificlatinname"] ?></em></h4><br>
					<h5 class="group inner list-group-item-heading">Order: <?=ucwords(strtolower($row["scientificorder"]))?></h5>
					<h5 class="group inner list-group-item-heading">Family: <?=ucwords(strtolower($row["scientificfamily"]))?></h5>
					<h5 class="group inner list-group-item-heading">Food: <?=ucwords(strtolower($row["food"]))?></h5>
					<h5 class="group inner list-group-item-heading">Habitat: <?=ucwords(strtolower($row["habitat"]))?></h5>
					<h5 class="group inner list-group-item-heading">Size: <?=$row["size"]?></h5>
					
					
					<div class="row">
                        <div class="col-xs-12 col-md-6">
                            <!-- <p class="lead">Extinction Risk:<?php
													if($row["extinctionrisk"]=='LC')
															echo "Least Concerned";
													else
															echo 'Threatened';
							?> -->
							
							
							</p>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <a target="_blank" class="btn btn-success" href="<?=strtolower($row["description"])?>">Wiki Description</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>   

<?php }  } ?>
</div>


<script>
$(document).ready(function() {
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
	    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});

});
</script>




 </body>

</html>
