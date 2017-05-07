<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>

<script>
function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
	}
</script><link href="styleadminverifynewsighting.css" rel="stylesheet" type="text/css">


<script>
function mouseOver(str) {
 //   document.getElementById("demo").style.color="red";
	//document.getElementById("demo").innerHTML=str;



	        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
		


//	alert(str);
}
</script>


 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="container">
<div id="profile">
<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
<b id="logout"><a href="logout.php">Log Out</a></b>
<b id="logout"><a href="profile.php">Home</a></b>

</div>
<br><br><br>

<!-- <div style="text-align: center; display:table; margin:auto;  " id="clock">
 -->

	<form method="POST" action="adminverifynewsightingsresponse.php">
		<input type="checkbox" onclick="toggle(this);" >Check all?<br>

<div class="row" >
<div class="col-md-6" >
<?php

$conn = new mysqli("localhost","root","","bpp");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tempbirdspecies NATURAL JOIN templocation NATURAL JOIN tempcolor NATURAL JOIN temptaxonomy NATURAL JOIN tempbirdcommonname;";

$result=$conn->query($sql);

if($result->num_rows>0)
{

	echo "<table class='table table-responsive'>";
	$first_row = true;

		while($row=$result->fetch_assoc())   {   
			if($first_row)
				{$first_row=false;
		
		echo '  <thead><tr>';
		echo "<th>Check</th>";
		foreach($row as $key=>$field)
			{

		if(htmlspecialchars($key)=="ID" ||htmlspecialchars($key)=="size" || htmlspecialchars($key)=="category"||htmlspecialchars($key)=="description"||htmlspecialchars($key)=="scientificorder"||htmlspecialchars($key)=="scientificfamily"||htmlspecialchars($key)=="extinctionrisk"||htmlspecialchars($key)=="food"||htmlspecialchars($key)=="habitat"||htmlspecialchars($key)=="commonname" || htmlspecialchars($key)=="birdid" || htmlspecialchars($key)=="scientificlatinname"  )
								continue;
				else
				{
			echo '<th>'.htmlspecialchars($key).'</th>';
				}
			
			
			}
			echo  '</tr>  </thead><tbody>';

		}
      ?>
		
				

				<?php  echo '<tr>';


echo '<td><input type="checkbox" name="birdid[]" value="'.$row["birdid"].'"></td>';
						
						foreach($row as $key => $field)
							{
						
							if(htmlspecialchars($key)=="ID" || htmlspecialchars($key)=="size" || htmlspecialchars($key)=="category"||htmlspecialchars($key)=="description"||htmlspecialchars($key)=="scientificorder"||htmlspecialchars($key)=="scientificfamily"||htmlspecialchars($key)=="extinctionrisk"||htmlspecialchars($key)=="food"||htmlspecialchars($key)=="habitat"||htmlspecialchars($key)=="commonname" || htmlspecialchars($key)=="birdid" || htmlspecialchars($key)=="scientificlatinname" )
								continue;
							else
							{

					if(htmlspecialchars($key)=="primarybirdname")
								{	

								?>
								
									<td onmouseover='mouseOver("<?php echo htmlspecialchars($field); ?>")'><?php echo htmlspecialchars($field); ?></td>

								<?php
								//	$strings = "<td onmouseover='alert("."."."ckf".".".")'>";
								//	echo $strings.htmlspecialchars($field).'</td>';
								}
							else
							echo '<td>' . htmlspecialchars($field) . '</td>';
							}

						}


				  echo '</tr>';?><br>
	
			
	<?php	}

	echo "<tbody></table>";
}

?>


<input type="submit" value="Verify">

</div>




<div class="col-md-2">
</div>

<div class="col-md-4">
<h3 id="demo">dsvjiksdc
</h3></div>




</div>
</form>





<!-- </div>
 -->


</body>
</html>