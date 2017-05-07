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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js" type="text/javascript"></script>
</head>


<body>


<div class="container">

<div id="profile">
<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
<b id="logout"><a href="logout.php">Log Out</a></b>
<b id="logout"><a href="../profile.php">Home</a></b>


</div>


<form name="basicform" id="basicform" method="POST" action="findbirds.php">

<!-- id will be unique, but class name will be same -->
<div id="sf1" class="frm">




<fieldset>
            <legend>Step 1 of 4</legend>
		


		

            <div class="form-group">
              <label class="col-lg-2 control-label" for="location">Location</label>
              <div class="col-lg-6">


				<?php
							$conn=new mysqli("localhost","root","","bpp");
							if($conn->connect_error)
							{
								die($conn->connect_error);
							}


							$sql1="SELECT distinct(country) FROM location";
							$sql2="select distinct(state) from location";
							$sql3="select distinct(city) from location";
							$sql4="select distinct(area) from location";
							
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




              </div>
            </div>
 
            <!-- <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
              
                <button class="btn btn-primary open1" type="button">Next <span class="fa fa-arrow-right"></span></button> 
              </div>
            </div> -->
 
</fieldset>



</div>

<!-- id will be unique, but class name will be same -->
<div id="sf2" class="frm">

<fieldset>
            <legend>Step 2 of 4</legend>

            <div class="form-group">
              <label class="col-lg-2 control-label" for="date">DATE </label>
              <div class="col-lg-6">
                <input type="date"  id="date" name="date" class="form-control" placeholder="dd-mm-yy">
              </div>
            </div>

            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <!-- <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
            
                <button class="btn btn-warning back2" type="button"><span class="fa fa-arrow-left"></span> Back</button> 
             
                <button class="btn btn-primary open2" type="button">Next <span class="fa fa-arrow-right"></span></button> 
              </div>
            </div> -->
</fieldset>



</div>

<!-- id will be unique, but class name will be same -->
<div id="sf3" class="frm">


<fieldset>
            <legend>Step 3 of 4</legend>

            <div class="form-group">
              <label class="col-lg-2 control-label" for="size">Password: </label>
              <div class="col-lg-6">
		
					   <input type="radio" name="size" value="1" checked> Sparrow sizes or smaller<br>
					  <input type="radio" name="size" value="2"> Between sparrow and pigeon<br>
					  <input type="radio" name="size" value="3"> Pigeon<br>
					  <input type="radio" name="size" value="4"> Between Hen and Pigeon<br>
					  <input type="radio" name="size" value="5"> Hen<br>
				  	  <input type="radio" name="size" value="6"> Between Hen and Peacock<br>
				  	  <input type="radio" name="size" value="7"> Peacock sized or larger<br><br>

              </div>
            </div>


            <!-- <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
              
                <button class="btn btn-warning back3" type="button"><span class="fa fa-arrow-left"></span> Back</button> 
              
                <button class="btn btn-primary open3" type="button">Submit </button> 
                <img src="spinner.gif" alt="" id="loader" style="display: none">
              </div>
            </div> -->
</fieldset>

</div>


<div id="sf4" class="frm">


<fieldset>
            <legend>Step 4 of 4</legend>

            <div class="form-group">
              <label class="col-lg-2 control-label" for="size">Password: </label>
              <div class="col-lg-6">
		


		<?php
			
			$conn = new mysqli("localhost","root","","bpp");
	
				if ($conn->connect_error) {
					    die("Connection failed: " . $conn->connect_error);
					} 
						//echo "Connected successfully";

					$sql = "SELECT distinct(colorname) FROM color";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
    // output data of each row
							   while($row = $result->fetch_assoc()) 
								   {
										    echo "<input type=\"checkbox\" name=\"color[]\" value=\"".$row["colorname"]."\"><label>".$row["colorname"]."</label><br/>\n";
								   }
								} 
								else 
								{
										    echo "0 results";
								}


			$conn->close();

			
			

		?>
              </div>
            </div>


            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <!-- Unique class name -->
                <!-- <button class="btn btn-warning back4" type="button"><span class="fa fa-arrow-left"></span> Back</button>  -->
                <!-- Unique class name -->


                <button class="btn btn-primary open4" type="submit">Submit </button> 
                <img src="spinner.gif" alt="" id="loader" style="display: none">
              </div>
            </div>
</fieldset>

</div>








<!-- 
</form>



<script type="text/javascript">
jQuery().ready(function() {

  // Binding next button on first step
  $(".open1").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf2").show("slow");
      }
   });

   // Binding next button on second step
   $(".open2").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf3").show("slow");
      }
    });

     // Binding back button on second step
    $(".back2").click(function() {
      $(".frm").hide("fast");
      $("#sf1").show("slow");
    });


 $(".open3").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf4").show("slow");
      }
    });

     // Binding back button on second step
    $(".back3").click(function() {
      $(".frm").hide("fast");
      $("#sf2").show("slow");
    });






     // Binding back button on third step
     $(".back4").click(function() {
      $(".frm").hide("fast");
      $("#sf3").show("slow");
    });

    $(".open4").click(function() {
      if (v.form()) {
        // optional
        // used delay form submission for a seccond and show a loader image
        $("#loader").show();
         setTimeout(function(){
           $("#basicform").html('<h2>Thanks for your time.</h2>');
         }, 1000);
        // Remove this if you are not using ajax method for submitting values
        return false;
      }
    });
});
</script> -->

</div>

</body>

</html>