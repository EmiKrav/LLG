<!DOCTYPE html>

<html>

<head>

    <title>Game</title>
<!-- Write your comments here <link href="css/style.css?key=<?php echo time(); ?>" type="text/css" rel="stylesheet" />--> 
     <link href="css/style.css?key=<?php echo time(); ?>" type="text/css" rel="stylesheet" />

</head>

<body>
           <?php 

    
  if(array_key_exists('button1', $_POST)) {
            button1();
        }
        function button1() {
           header('Location: main.php');
        }
		

?>
    <div id="header"style="clear: both">
	

       
 <form action="" method="post">
			 <input style="float: left; margin-left: 20px;" type="submit" id="buttonheader" name="button1"
                 value="Back" />
				 </form>
				 <input style="float: left; margin-left: 20px;" type="submit"onclick = "displayblock()"  id="buttonheader" name="buttonstart"
                 value="Start" /> 
				 <h3 style="float;text-align-last: center;user-select: none;">Game</h3>


    </div>
	

	<script>
	
function displayblock(){
	var dog = document.getElementById("dogPic");
    dog.style.display = "block";

	dog.style.left += screen.width/2 + "px";
	dog.style.top += (screen.height/2) + "px";
	var moving = false;
dog.addEventListener("mousedown", initialClick, false);


function move(e){

  var newX = e.clientX - 10;
  var newY = e.clientY - 10;
if (newX > 10 && newX < 1000){
  image.style.left = newX + "px";
}
if (newY > 100 && newY < 500){
  image.style.top = newY + "px";
}
  
  
}

function initialClick(e) {

  if(moving){
    document.removeEventListener("mousemove", move);
    moving = !moving;
    return;
  }
  
  moving = !moving;
  image = this;

  document.addEventListener("mousemove", move, false);

}}
</script>
	<div id="dogPic">
</div>
     

   
</body>

</html>
