 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dpp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "select password,access from observer where username=".$_POST["uname"];

$result=$conn->query($sql);


if($result->num_rows >0)
{

$row=$result->fetch_assoc();

		if($_POST["psw"]==$row["password"])
	{
		// Start the session
				session_start();

				$_SESSION['username']=$_POST["uname"];

				if($row["access"]==1)
					$_SESSION['access']=1;
				else
					$_SESSION['access']=0;
	}
	else
	{
		echo "Wrong Password";
	}

}
else
{
echo "Sorry But you Don't Have Access As you are Not Registered";
}



$conn->close();
?> 