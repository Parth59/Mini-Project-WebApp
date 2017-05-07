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

<a href="adminverifysightings.php">VERIFY EXISTING SIGHTINGS</a><br><br>
<a href="adminverifynewsightings.php">VERIFY NEW BIRD SIGHTINGS</a><br><br>






</div>



</body>
</html>