<!DOCTYPE html>
<?php
// Start the session
session_start();
?>
<html>

<head>

    <title>Login</title>
<!-- Write your comments here <link href="css/style.css?key=<?php echo time(); ?>" type="text/css" rel="stylesheet" />--> 
    <link href="css/style.css?key=<?php echo time(); ?>" type="text/css" rel="stylesheet" />

</head>

<body>

    <div id="header">

        <h3>Login</h3>

    </div>
     

    <div id="wrap">


         <?php


		 
		 
$msg = null;
  if(array_key_exists('submit', $_POST)) {
            submitb();
        }
        function submitb() {
$servername = "localhost";
$username = "root";
$password = "alakard13";
$dbname = "llg";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
 
if(isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['email']) && !empty($_POST['email'])){




    $name = $_POST['name']; 

    $email = $_POST['email'];
	 if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $msg = 'The name you have entered does not exist';
    }
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	 $msg = 'The email you have entered does not exist';


}else{

$exist= "SELECT account as total, hash as ident, id as ind FROM users WHERE email = '$email' AND username = '$name'";

$result2 = mysqli_query($conn, $exist);
$row = mysqli_fetch_assoc($result2);

$_SESSION["hash"] = $row['ident'];
$_SESSION["ind"] = $row['ind'];

if (!$result2) {
    echo "Error: " . mysqli_error($conn);
}
if ($row['total']=='1'){
	header('Location: main.php');
}
else if ($row['total']=='0'){
	
	header('Location: activation.php');
}
else{
	echo $row['total'];
	echo $row['ident'];
	echo "This user does not exist";
}
	



mysqli_close($conn);
}
}
}

             

?>


    

        <h3>Login</h3>

             



         <?php 

    if(isset($msg)){  

        echo '<div class="statusmsg" >'.$msg.'</div>'; 

    } 
  if(array_key_exists('button1', $_POST)) {
            button1();
        }
        function button1() {
           header('Location: registration.php');
        }

?>

        <form action="" method="post">

            <label for="name">Name:</label>

            <input type="text" name="name" value="" />
			<p>
            <label for="email">Email:</label>

            <input type="text" name="email" value="" />
			</p>
			<p>
            <input type =  "submit" name="submit" id = "btn" value = "Submit" />
			
			 <input type="submit" name="button1"
                id = "btn" value="Register" />
			</p>

        </form>

    </div>
</body>

</html>
