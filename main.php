<!DOCTYPE html>
<?php
session_start();
?>

<html>

<head>

    <title>Main</title>
<!-- Write your comments here <link href="css/style.css?key=<?php echo time(); ?>" type="text/css" rel="stylesheet" />--> 
     <link href="css/style.css?key=<?php echo time(); ?>" type="text/css" rel="stylesheet" />

</head>

<body>
<div id="header">
           <?php 
$change = false;
		if(array_key_exists('button1', $_POST)) {
            button1();
        }
        function button1() {
		   unset($_SESSION['username']);
			session_destroy();
			 header('Location: index.php');
        }
		  if(array_key_exists('buttongame', $_POST)) {
            buttongame();
        }
        function buttongame() {
           header('Location: game.php');
        }
		  if(array_key_exists('button2game', $_POST)) {
            button2game();
        }
        function button2game() {
           header('Location: game2.php');
        }
		  if(array_key_exists('wordsreview', $_POST)) {
            wordsreview();
        }
        function wordsreview() {
           header('Location: words.php');
        }
		if(array_key_exists('button2', $_POST)) {
            gochangepassword();
        }
		function gochangepassword() {
		  header('Location: passwordchange.php');
        }
		if(array_key_exists('button3', $_POST)) {
            deletea();
        }
		function deletea() {

		  header('Location: accountdelete.php');
        }
		
?>
<?php 
if (isset($_SESSION["username"] )){?>
   
	 				 <div class="dropdowna" style="float: right; margin-top:0px;">
  <button onclick="myFunction()" class="dropbtna">  ⮟ <?php  echo $_SESSION["username"] ?> </button>
  <div id="myDropdown" class="dropdown-contenta">
    <a onclick="myFunction2()">Log Out</a>
	 <a onclick="passwordchange()">Change password</a>
	  <a onclick="deleteacc()">Delete Account</a>
  </div>

</div>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("showa");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtna')) {
    var dropdowns = document.getElementsByClassName("dropdown-contenta");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('showa')) {
        openDropdown.classList.remove('showa');
      }
    }
  }
}
function myFunction2() {
  document.getElementById("logoutbutton").click();
}
function passwordchange() {
	  document.getElementById("passwordbutton").click();
}
function deleteacc() {
	  document.getElementById("deletebutton").click();
}
</script>
<h1 style="text-align: left; margin-left:10px; user-select: none">Language learning games </h1>
    </div>
	   
	

		 <form action="" method="post">
		 
  <div class="register-forget opacity" style="margin-top:0px;margin-right:10px ">
			 <input style="float: left;margin-left: 20px; background-color: white; height: 100px" type="submit" id="register-forgetbutton" name="buttongame"
                 value="Cube Game"/>
			 <input style="float: left;margin-left: 20px;background-color: white;" type="submit" id="register-forgetbutton" name="button2game"
                 value="Ship Game"/>
				 <input style="float: left;margin-left: 20px;background-color: white;" type="submit" id="register-forgetbutton" name="wordsreview"
                 value="Learn Words"/>
			
				 <input style="float: right;margin-right: 20px;" type="submit" id="logoutbutton" name="button1"
                 value="Log Out" />
				  <input style="float: right;margin-right: 40px;" type="submit" id="passwordbutton" name="button2"
                 value="Change Password" />
				  <input style="float: right;margin-right: 40px;" type="submit" id="deletebutton" name="button3"
                 value="Delete Account" />
				 </form>
			 </div>	
	
	
	

     

   
</body>
</html>
<?php } ?>
  <script type="text/javascript">
		window.history.forward();
        window.onunload = function () { null };
    </script>