	
	<head>
	<script>
	function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
	}
	</script>
	</head>

		<body>
		<form method="POST" action="adminverifysightingsresponse.php">
		<input type="checkbox" onclick="toggle(this);" >Check all?<br>

		<?php

$conn = new mysqli("localhost","root","","bpp");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="Select *  from samplingtable where verified=0;";

$result=$conn->query($sql);


if($result->num_rows>0)
{

	echo "<table>";
	$first_row = true;

		while($row=$result->fetch_assoc())   {   if($first_row){$first_row=false;
		
		echo '<tr>';
		echo "<th>Check</th>";
		foreach($row as $key=>$field)
			{
			echo '<th>'.htmlspecialchars($key).'</th>';
			}
			echo  '<tr>';

		}
      ?>
		
				

				<?php  echo '<tr>';


echo '<td><input type="checkbox" name="samplingid[]" value="'.$row["samplingid"].'"></td>';
						foreach($row as $key => $field) {
							echo '<td>' . htmlspecialchars($field) . '</td>';
						}
				  echo '</tr>';?><br>
	
			
	<?php	}

	echo "</table>";
}

?>
<input type="submit" value='Verify'>
	</form>

	</body>