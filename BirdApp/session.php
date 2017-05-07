<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$conn = new mysqli("localhost", "root", "","bpp");
// Selecting Database


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";




session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User

//echo $user_check;
$sql=("select username from observer where username='$user_check'");

//echo $sql;

$result = $conn->query($sql);


if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}



if ($result->num_rows > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	$login_session=$row["username"];
	
    }
} else {
    echo "0 results";
}


if(!isset($_SESSION['login_user'])){
mysqli_close($conn); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>
