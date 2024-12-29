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
    
        <h3>Signup Form</h3>

       
                 <?php 

    
  if(array_key_exists('button1', $_POST)) {
            button1();
        }
        function button1() {
           header('Location: index.php');
        }

?>

 <p>Password recovery done, check email</p>
        <form action="" method="post">

			<p>
           
			 <input type="submit" name="button1"
                id = "btn" value="Log In" />
			</p>

        </form>

    </div>
</body>

</html>
