<!DOCTYPE html>

<html>

<head>

    <title>Main</title>
<!-- Write your comments here <link href="css/style.css?key=<?php echo time(); ?>" type="text/css" rel="stylesheet" />--> 
     <link href="css/style.css?key=<?php echo time(); ?>" type="text/css" rel="stylesheet" />

</head>

<body>
           <?php 

    
  if(array_key_exists('button1', $_POST)) {
            button1();
        }
        function button1() {
           header('Location: index.php');
        }

?>

    <div id="header"style="clear: both">
	

        <h3 style="float: left">Main</h3>
 <form action="" method="post">

			 <input style="float: right" type="submit" id="buttonheader" name="button1"
                 value="Log Out" />
				 </form>
 <h3 style="float: right">User</h3>
    </div>
     

   
</body>

</html>
