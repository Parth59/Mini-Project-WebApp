<?php
   include('session.php');
   ?>
<html>
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
      <div id="products" class="row list-group">
         <?php
            $country=$_POST["sql0"];
            $state=$_POST["sql1"];
            $city=$_POST["sql2"];
            $area=$_POST["sql3"];
            
            $date=$_POST["date"];
            $size=$_POST["size"];
            
            
            $ifset=0;
            if(isset($_POST["color"])	)
            {
            	$color=$_POST["color"];
            	$ifset=1;
            }
            
            
            
            /*   echo $country."<br>";
            echo $state."<br>";
            echo $city."<br>";
            echo $area."<br>";
            echo $date."<br>";
            echo $size."<br>";
                    
            if($ifset==1)
            {
            	foreach($color as $colorname)
            {
            	echo $colorname."<br>";
            
            }
            
            
            }
            
            */    
            
            						$conn=new mysqli("localhost","root","","bpp");
            
            							if ($conn->connect_error) {
            									die("Connection failed: " . $conn->connect_error);
            											} 
            								//echo "Connected successfully";
            
            								if($ifset==1)		
            								{
            										$count=0;
            										$strin = "color.colorname ="; 
            										foreach($color as $colorname)
            													{
            													if($count==0)
            														{
            														$strin=$strin."'".$colorname."'";
            														$count=1;
            														}
            													else
            														$strin=$strin." or color.colorname='".$colorname."'";
            													}
            
            
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
            
            
            $sql="select * from birdspecies NATURAL JOIN color NATURAL JOIN location NATURAL JOIN taxonomy where (birdspecies.size=".$size.") and (".$strin.") and  location.season='".$seasonname."' and location.area='".$area."' and location.country='".$country."' and location.state='".$state."' and location.city='".$city."'";
            
            }
            else
            		      	$sql="select * from birdspecies NATURAL JOIN color NATURAL JOIN location NATURAL JOIN taxonomy where (birdspecies.size=".$size.") and (".$strin.") and location.area='".$area."' and location.country='".$country."' and location.state='".$state."' and location.city='".$city."'";
            			
            								}
            								else
            								{
            
            			 if(strtotime($date)!=false)
            			 {
            			 $monthno=date('m',strtotime($date));
            		//	 echo $monthno;
            			 
            			 if($monthno<=3 || $monthno>=11)
            			 $seasonname="WINTER";
            			 else if($monthno>=4 || $monthno <=7)
            			 $seasonname="SUMMER";
            			 else
            			 $seasonname="RAINY";
            			 
            			 $sql="select * from birdspecies NATURAL JOIN color NATURAL JOIN location NATURAL JOIN taxonomy where (birdspecies.size=".$size.") and location.season='".$seasonname."' and location.area='".$area."' and location.country='".$country."' and location.state='".$state."' and location.city='".$city."'";
            			 
            			 }
            			 else
            												$sql="select * from birdspecies NATURAL JOIN color NATURAL JOIN location NATURAL JOIN taxonomy where (birdspecies.size=".$size.") and location.area='".$area."' and location.country='".$country."' and location.state='".$state."' and location.city='".$city."'";			
            			 }
            					//	echo $sql;
            					
            					$result = $conn->query($sql);
            
            
            if($result->num_rows>0)
            {
            
            while($row=$result->fetch_assoc())     {  ?>
         <div class="item col-xs-4 col-lg-4">
            <div class="tumbnail">
               <?php $imagesDir = '../Oriental_images/'.$row["primarybirdname"]."/";
                  //	echo $imagesDir;
                  	$images = glob($imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
                  
                  	//echo $images;
                  
                  	$randomImage = $images[array_rand($images)]; // See comments
                  
                  	//echo $randomImage;
                  						?>
               <img class="img-thumbnail" style="margin:15px" src="<?=$randomImage?>"  width="270" height="420" alt="" />
               <div class="caption">
                  <h4 class="group inner list-group-item-heading"><strong><?=($row["primarybirdname"]) ?></strong></h4>
                  <h4 class="group inner list-group-item-heading"><em><?=$row["scientificlatinname"] ?></em></h4>
                  <br>
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
                        <a  target="_blank" class="btn btn-success" href="<? echo strtolower($row["description"])?>">Wiki Description</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php	} }    $conn->close(); ?>
      </div>
      <!-- /**if ($result->num_rows > 0) {
         $first_row = true;
         echo("<table>");
          while($row = $result->fetch_assoc()) 
           {
         if ($first_row) {
         $first_row = false;
         // Output header row from keys.
         echo '<tr>';
         foreach($row as $key => $field) {
         echo '<th>' . htmlspecialchars($key) . '</th>';
         }
         echo '</tr>';
         }
         echo '<tr>';
         foreach($row as $key => $field) {
         echo '<td>' . htmlspecialchars($field) . '</td>';
         }
         echo '</tr>';
           }
         
         
           echo("</table>");
         } 
         else 
         {
         	    echo "0 results";
         }
         **/
         
         
         
         
         
         
         $conn->close(); -->
      <script>
         $(document).ready(function() {
             $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
         	    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
         
         });
      </script>
   </body>
</html>