
<?php
include('session.php');
?>
<html>


<body class="container">


<form method="post" action="submitexistingbirdresponse.php">
	<?php

$conn = new mysqli("localhost","root","","bpp");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$sql="Select primarybirdname from birdspecies;";

$result=$conn->query($sql);



if($result->num_rows>0)
{
	
		echo  "<fieldset>";
	
        echo   "<legend>Submit Details</legend>";
		echo   "<div class='form-group'>";
        echo   "<div class='row'>";
		echo   "<label class='col-lg-4 control-label' for='birdname'>Bird Name</label> ";

		echo   "<select name='birdname'>";

	

		while($row=$result->fetch_assoc()) { ?>

		
			<option value='<?=$row["primarybirdname"]?>' ><?=$row["primarybirdname"]?></option>	<br>
		

	<?php }

	echo "</select></div><br>";
?>
               <div class="form-group">
				
				  <div class="row">
                     <label class="col-lg-4 control-label" for="numberssighted">Numbers Sighted </label>
  <input type="number" name="numberssighted" min="1" max="85">
                  </div>
				  <br>
                  <div class="row">
                     <label class="col-lg-4 control-label" for="date">Date </label>
                     <input   type="date"  id="date" name="date" placeholder="dd-mm-yy">
                  </div>
                  <br>
                  <div class="row">
                     <label class="col-lg-4 control-label" for="country">Country </label>
                     <input type="text" name="country">
                  </div>
                  <br>	
                  <div class="row">
                     <label class="col-lg-4 control-label" for="state">State </label>
                     <input type="text" name="state">
                  </div>
                  <br>
                  <div class="row">
                     <label class="col-lg-4 control-label" for="city">City </label>
                     <input type="text" name="city">
                  </div>
                  <br>
                  <div class="row">
                     <label class="col-lg-4 control-label" for="area">Area </label>
                     <input type="text" name="area">
                  </div>
                  <br>
				  <div class="row">
                     <label class="col-lg-4 control-label" for="behaviour">Observed Behaviour </label>
                     <input type="text" name="behaviour">
                  </div>
                  <br>


               </div>
               <div class="clearfix" style="height: 10px;clear: both;"></div>

<?php
	echo "</fieldset>";
}
else
{
	echo "0 rows";
}

$conn->close();




?>
<input type="submit">
</form>

</body>

</html>