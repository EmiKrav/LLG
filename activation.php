<!DOCTYPE html>
<?php
// Start the session
session_start();
?>

<html>

<head>

    <title>Activation</title>
<!-- Write your comments here <link href="css/style.css?key=<?php echo time(); ?>" type="text/css" rel="stylesheet" />--> 
     <link href="css/style.css?key=<?php echo time(); ?>" type="text/css" rel="stylesheet" />

</head>

<body>
           <?php 
	 $sh =$_SESSION["hash"];
	 $idy =$_SESSION["ind"];
     $code = $_POST['name']; 
  if(array_key_exists('button1', $_POST)) {
            button1();
        }
        function button1() {
			if(isset($_SESSION['hash'])  && isset($_POST['name'])){

			if ($_POST['name'] == $_SESSION["hash"]){
				$servername = "localhost";
$username = "root";
$password = "alakard13";
$dbname = "llg";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$exist= "UPDATE users SET account='1' WHERE id = '" .$_SESSION["ind"]. "'";

if ($conn->query($exist) === TRUE) {
 
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
			header('Location: main.php');
			}
				else{
				echo "Wrong code!";
			}
			}
        }

?>

   <form action="" method="post">

            <label for="name">Code:</label>

            <input type="text" name="name" value="" />
		
			<input type="submit" name="button1"
                id = "btn" value="Submit" />
			</p>

        </form>
     

   
</body>

</html>
