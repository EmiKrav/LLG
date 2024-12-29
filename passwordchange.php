<!DOCTYPE html>
<?php
// Start the session
session_start();
?>

<html>

<head>

    <title>Password change</title>
<!-- Write your comments here <link href="css/style.css?key=<?php echo time(); ?>" type="text/css" rel="stylesheet" />--> 
     <link href="css/style.css?key=<?php echo time(); ?>" type="text/css" rel="stylesheet" />

</head>

<body>
 <div id="header"style="clear: both">
	
		<form action="" method="post">
			 <input style="float: left; margin-left: 20px;" type="submit" id="buttonheader" name="buttonback"
                 value="Back" />
				 </form>
				 </div>
           <?php 
$msg = null;
	  if(array_key_exists('buttonback', $_POST)) {
            buttonback();
        }
        function buttonback() {
           header('Location: main.php');
        }
  if(array_key_exists('button1', $_POST)) {
            button1();
        }
        function button1() {
			$servername = "localhost";
$username = "root";
$password = "alakard13";
$dbname = "llg";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

 if(isset($_SESSION['username'])  && isset($_POST['userpassword']) && !empty($_POST['userpassword'])&& isset($_POST['email'])&& !empty($_POST['email'])){
	$userpassword = $_POST['userpassword'];
    $email = $_POST['email'];
$pattern = '/^(?=.*[a-z])(?=.*\d).{8,}$/';
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	 $msg = 'The email you have entered is invalid, please try again.';
	 wrong($msg);
	}
	else if (!preg_match($pattern, $userpassword)) {
		
     $msg = 'Invalid Password. Password minimum length should be 8, at least one lowercase letter, and one digit.';
	 wrong($msg);
	 }
else{

$exist= "SELECT COUNT(email) as total FROM users WHERE email = '$email'";

$result2 = mysqli_query($conn, $exist);
$row = mysqli_fetch_assoc($result2);

if (!$result2) {
    echo "Error: " . mysqli_error($conn);
}

if ($row['total'] == 1){
$query = "UPDATE users SET password='$userpassword' WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Error: " . mysqli_error($conn);
}else{

$to= $email; 
$message = '


Your new password:

------------------------

Password: '.$userpassword.'

------------------------

';
// send email
mail($to,"New password",$message,'From: ema.krav1@gmail.com');
header('Location: main.php');	
}
}
else{
    $msg = 'This email is not registered';
	wrong($msg);
}

mysqli_close($conn);
}
}
}

?>
 <div id="wrap">
  <h3>Password Change</h3>
   

<?php function wrong($msg){echo "<p id=wrap>$msg</p>";}?>
   <form action="" method="post">   
			<p>
			<label for="email">Your Email:</label>
            <input type="text" name="email" value="" />
			</p>
            <p>
			<label for="name">New Password:</label>

            <input type="password" name="userpassword" value="" />
		
			<input type="submit" name="button1"
                id = "btn" value="Submit" />
			</p>
 
        </form>
</div>

   
</body>

</html>
