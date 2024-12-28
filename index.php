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
     

    <div id="wrap2">


         <?php

$servername = "localhost";
$username = "root";
$password = "alakard13";
$dbname = "llg";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$msg = null;
if(isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['userpassword']) && !empty($_POST['userpassword'])){


    $email = $_POST['email'];
	$userpassword =$_POST['userpassword'];
	$pattern = '/^(?=.*[a-z])(?=.*\d).{8,}$/';

 if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	 $msg = 'The email you have entered does not exist';
}
else if (!preg_match($pattern, $userpassword)) {
     $msg = 'Invalid Password';
}else{

$exist= "SELECT account as total, hash as ident, id as ind FROM users WHERE email = '$email'  AND password = '$userpassword'";

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
	



mysqli_close($conn);
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

        <form action="" method="post" class="form2">
			<p>
            <label for="email">Email:</label>

            <input type="text" name="email" value="" />
			</p>
			<p>
            <label for="userpassword">Password:</label>

            <input type="text" name="userpassword" value="" />
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
