<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
<b id="logout"><a href="logout.php">Log Out</a></b>
<b id="logout"><a href="profile.php">Home</a></b>

</div>
<br><br><br>

<div style="text-align: center; display:table; margin:auto;  " id="clock">

<a href="/BirdApp/PHOTOID/photoid.php">PHOTOID</a><br><br>
<a href="/BirdApp/BIRDID/birdid.php">BIRDID</a><br><br>
<a href="/BirdApp/BROWSEALL/browseall.php">BROWSE ALL BIRDS</a><br><br>
<a href="viewrecenthotspots.php">VIEW RECENT HOTSPOTS</a><br><br>

<?php
if($login_session=='admin')
{
	echo "<a href=\"adminverifysightingsask.php\">VERIFY USER'S SIGHTINGS</a><br><br>";
	echo "<a href=\"addnewbird.php\">ADD NEW BIRD TO DATABASE</a><br>";

}
?>

<?php
if($login_session=='user')
{
	echo "<a href=\"submitexistingbird.php\">SUBMIT EXISTING BIRD SIGHTINGS</a><br><br>";
	echo "<a href=\"usersubmitnewbird.php\">SUBMIT NEW BIRD SIGHTINGS</a><br>";

}
?>



</div>



</body>
</html>