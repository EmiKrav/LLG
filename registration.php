<!DOCTYPE html>

<html>

<head>

    <title>Sign up</title>
<!-- Write your comments here <link href="css/style.css?key=<?php echo time(); ?>" type="text/css" rel="stylesheet" />--> 
    <link href="css/style.css?key=<?php echo time(); ?>" type="text/css" rel="stylesheet" />

</head>

<body>

    <div id="header">

        <h3>Sign up</h3>

    </div>
     

    <div id="wrap">


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
 
if(isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['email']) && !empty($_POST['email'])AND isset($_POST['userpassword']) && !empty($_POST['userpassword'])){
    $name = $_POST['name']; 
	$userpassword = $_POST['userpassword'];
    $email = $_POST['email'];
	$pattern = '/^(?=.*[a-z])(?=.*\d).{8,}$/';
	 if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $msg = 'Only letters and white space allowed';
    }
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	 $msg = 'The email you have entered is invalid, please try again.';
	}
else if (!preg_match($pattern, $userpassword)) {
     $msg = 'Invalid Password. Password minimum length should be 8, at least one lowercase letter, and one digit.';

}else{

	$hash = rand(0,1000); 
$exist= "SELECT COUNT(username) as total FROM users WHERE email = '$email'";

$result2 = mysqli_query($conn, $exist);
$row = mysqli_fetch_assoc($result2);

if (!$result2) {
    echo "Error: " . mysqli_error($conn);
}

if ($row['total'] == 0){
$query = "INSERT INTO users (username, password, email, hash) VALUES ('$name', '$userpassword', '$email', '$hash')";

$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Error: " . mysqli_error($conn);
}
else{
$to= $email; 
$message = '


Thanks for signing up!

Your account has been created, you can login with the following code after you have activated your account by pressing the url below.


------------------------

Username: '.$name.'

Password: '.$password.'

------------------------

Your activation code:

https://llgactivation.web.app/email='.$email.'&hash='.$hash.'


';
// send email
mail($to,"Registration validation",$message,'From: ema.krav1@gmail.com');
header('Location: registrationdone.php');	
}
}
else{
	
    $msg = 'This email is already registered. Please choose another one';
}

mysqli_close($conn);
}
}

             

?>


    

        <h3>Register</h3>

        

         <?php 

    if(isset($msg)){  

        echo '<div class="statusmsg" >'.$msg.'</div>'; 

    } 
	if(array_key_exists('button1', $_POST)) {
            button1();
        }
        function button1() {
           header('Location: index.php');
        }

?>

        <form action="" method="post">
			<p>
            <label for="name">Username:</label>

            <input type="text" name="name" value="" />
			</p>
			<p>
            <label for="userpassword">Password:</label>

            <input type="text" name="userpassword" value="" />
			</p>
			<p>
            <label for="email">Email:</label>

            <input type="text" name="email" value="" />
			</p>
			<p>
            <input type =  "submit" id = "btn" value = "Submit" />
			<input type="submit" name="button1"
                id = "btn" value="Log In" />
			</p>

        </form>

    </div>
</body>

</html>
