<!DOCTYPE html>

<html>

<head>

    <title>Forgot password</title>
<!-- Write your comments here <link href="css/style.css?key=<?php echo time(); ?>" type="text/css" rel="stylesheet" />--> 
    <link href="css/style.css?key=<?php echo time(); ?>" type="text/css" rel="stylesheet" />

</head>

<body>

     

<section class="container" >
<div class="login-container" >
<form action="" method="post" class="form-container" style="margin-right:30px;">
	<h1 class="opacity">Forgot Password</h1>
		<p class="opacity">
       
                 <?php 

    
  if(array_key_exists('button1', $_POST)) {
            button1();
        }
        function button1() {
           header('Location: index.php');
        }
	echo "Password recovery done, check email";
?>
       

			<p>
           
			 <input type="submit" name="button1"
                id="register-forgetbutton"  value="Log In" />
			</p>

        </form>

    </div>
</body>

</html>
