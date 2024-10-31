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
		  if(array_key_exists('buttongame', $_POST)) {
            buttongame();
        }
        function buttongame() {
           header('Location: game.php');
        }

?>

    <div id="header"style="clear: both">
	
		 <form action="" method="post">

			 <input style="float: left;margin-left: 20px;" type="submit" id="buttonheader" name="buttongame"
                 value="Game"/>

			 <input style="float: right;margin-right: 20px;" type="submit" id="buttonheader" name="button1"
                 value="Log Out" />
				 </form>
 <h3 style="float: right">User</h3>
    </div>
     

   
</body>

</html>
