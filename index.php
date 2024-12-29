<!DOCTYPE html>
<?php
// Start the session
session_start();
?>
<html>

<head >
<!-- <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="pragma" content="no-cache">
	<script src="filename.js?version=1.0"></script>--> 
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
	 wrong($msg );
}
else if (!preg_match($pattern, $userpassword)) {
     $msg = 'Invalid Password';
	 wrong($msg );
}else{

$exist= "SELECT account as total, hash as ident, id as ind, username as user FROM users WHERE email = '$email'  AND password = '$userpassword'";

$result2 = mysqli_query($conn, $exist);

$row = mysqli_fetch_assoc($result2);
$_SESSION["hash"] = $row['ident'];
$_SESSION["ind"] = $row['ind'];
$_SESSION["username"] = $row['user'];
if (!$result2) {
    echo "Error: " . mysqli_error($conn);
}
if (empty($row)) {
       $msg = 'Invalid email or password';
	 wrong($msg );
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

      

         <?php 
    
  if(array_key_exists('button1', $_POST)) {
            button1();
        }
        function button1() {
           header('Location: registration.php');
        }
	  if(array_key_exists('button2', $_POST)) {
            button2();
        }
        function button2() {
			if(isset($_POST['email']) && !empty($_POST['email'])){
    $email = $_POST['email'];
           if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	 $msg = 'The email you have entered is invalid, please try again.';
	 wrong($msg );
	}
	else{
		$servername = "localhost";
$username = "root";
$password = "alakard13";
$dbname = "llg";
		$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
	$exist= "SELECT COUNT(password) as total FROM users WHERE email = '$email'";
$result2 = mysqli_query($conn, $exist);
$row = mysqli_fetch_assoc($result2);
if (!$result2) {
    echo "Error: " . mysqli_error($conn);
}
if ($row['total'] == 1){
	
	$query = "SELECT password as userpassword FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Error: " . mysqli_error($conn);
}else{
$row = mysqli_fetch_assoc($result);	
$userpassword = $row['userpassword'];
$to= $email; 
$message = '


Your password:

------------------------

Password: '.$userpassword.'

------------------------

';
// send email
mail($to,"Your password",$message,'From: ema.krav1@gmail.com');
header('Location: passwordrecoverydone.php');	
}
}
	}
		}
		else{
			$msg = 'Type your email for password recovery';
			wrong($msg );
		}
		}

?>
        <h3>Login</h3>

       
<?php function wrong($msg){echo "<p>$msg</p>";}?>

        <form action="" method="post" class="form2">
			<p>
            <label for="email">Email:</label>

            <input type="text" name="email" value="" />
			</p>
			<p>
            <label for="userpassword">Password:</label>

            <input type="password" name="userpassword" value="" />
			</p>
			<p>
            <input type =  "submit" name="submit" id = "btn" value = "Submit" />
			
			 <input type="submit" name="button1"
                id = "btn" value="Register" />
				 <input type="submit" name="button2"
               id="pasmyg" value="Forgot Password" />
			</p>

        </form>

    </div>
</body>
</html>
