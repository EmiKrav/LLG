<!DOCTYPE html>

<html>

<head>

    <title>Game</title>
<!-- Write your comments here <link href="css/style.css?key=<?php echo time(); ?>" type="text/css" rel="stylesheet" />--> 
     <link href="css/style.css?key=<?php echo time(); ?>" type="text/css" rel="stylesheet" />

</head>

<body>

           <?php 
		   
		   $servername = "localhost";
$username = "root";
$password = "alakard13";
$dbname = "llg";

$conn = new mysqli($servername, $username, $password, $dbname);

$exist= "SELECT word as word, translation as translation FROM words ORDER BY RAND()";

$result2 = mysqli_query($conn, $exist);
while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
	$words[] = $row['word'];
$translations[] = $row['translation'];
}

if (!$result2) {
    echo "Error: " . mysqli_error($conn);
}
//else{
	//printf ("%s %s %s\n", $words[1], $translations[1], $sk);

//}
    mysqli_close($conn);
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
	<strong id="box"></strong>
	<div id="dogPic"></div>
	<div id="badPic"></div>
	<div id="badPic2"></div>
	<h1 id="instruct">How to play: <br> Drag cube with correct letter to the box </h1>
</body>
	<script>
var y = "<?php echo $sk?>";
var words = 
    <?php echo json_encode($words); ?>;
var translations = 
    <?php echo json_encode($translations); ?>;
var chosemnamount = words.length;
     	
// Display the array elements
//for(var i = 0; i < words.length; i++){
  //  document.write(words[i]);
//}
var alphabet = "aąbcčdeęėfghiįjklmnoprsštuųūvzž";
var alb = alphabet;
var nr = 0;
	var x = words[nr];
	var y = translations[nr];
var letter = Math.floor(Math.random() * x.length);
var correct = document.getElementById("dogPic");
var box = document.getElementById("box");

var bad = document.getElementById("badPic");
var bad2 = document.getElementById("badPic2");
	
	correct.style.display = "none";
	box.style.display = "none";
	bad.style.display = "none";
	bad2.style.display = "none";
function displayblock(){
	var instruct = document.getElementById("instruct");
	var start =  document.getElementsByTagName('input')[1];
	instruct.innerHTML = y;
	start.style.display = "none";
	if (correct.style.display == "none"){
	correct.innerHTML = x[letter];
	correct.style.display = "block";
	reset();
	}
if (bad.style.display == "none"){
	
	alb = alb.replace(correct.innerHTML,'');
	bad.innerHTML = alb[Math.floor(Math.random() * alb.length)];
	alb = alb.replace(bad.innerHTML,'');
	bad.style.display = "block";
	resetbad();
	}
if (bad2.style.display == "none"){
	bad2.innerHTML = alb[Math.floor(Math.random() * alb.length)];
	alb = alb.replace(bad2.innerHTML,'');
	bad2.style.display = "block";
	resetbad2();
	}
if (box.style.display == "none"){
	
	box.style.display = "block";
	for(var i = 0; i < x.length; i++){
  if (i != letter){
	document.getElementById("box").innerHTML += x[i];
  }
   else{
	  document.getElementById("box").innerHTML += "_";
  }
	}
	}

	var moving = false;
correct.addEventListener("mousedown", initialClick, false);
bad.addEventListener("mousedown", initialClick, false);
bad2.addEventListener("mousedown", initialClick, false);
function move(e){

  var newX = e.clientX - 10;
  var newY = e.clientY - 10;
if (newX > 100 && newX < 1100){
  image.style.left = newX + "px";
}
if (newY > 100 && newY < 500){
  image.style.top = newY + "px";
}

  if (newX <= 100 || newX >= 1100){
	initialClick();
}
  if (newY <= 100 || newY >= 500){
	initialClick();
}
  
}
function resetall(){
	reset();
	resetbad();
	resetbad2();
	letter = Math.floor(Math.random() * x.length);
	correct.innerHTML = x[letter];
	alb = alphabet;
	alb = alb.replace(correct.innerHTML,'');
	bad.innerHTML = alb[Math.floor(Math.random() * alb.length)];
	alb = alb.replace(bad.innerHTML,'');
	bad2.innerHTML = alb[Math.floor(Math.random() * alb.length)];
	alb = alb.replace(bad2.innerHTML,'');
	instruct.innerHTML = y;
	document.getElementById("box").innerHTML ="";
		for(var i = 0; i < x.length; i++){
  if (i != letter){
	document.getElementById("box").innerHTML += x[i];
  }
  else{
	  document.getElementById("box").innerHTML += "_";
  }
	}
	if (doElsCollide(correct, box)){
	  resetall();
	}
	if (doElsCollide(bad, box)){
	  resetall();
	}
	if (doElsCollide(bad2, box)){
	  resetall();
	}
	bad.style.display = "block";
	bad2.style.display = "block";	
	correct.style.display = "block";
}
function reset(){
	correct.style.left = Math.floor(Math.random() * (1080 - 120 + 1) + 120) + "px";
	correct.style.top = Math.floor(Math.random() * (480 - 120 + 1) + 120) + "px";
	
}
function resetbad(){
	
	bad.style.left = Math.floor(Math.random() * (1080 - 120 + 1) + 120) + "px";
	bad.style.top = Math.floor(Math.random() * (480 - 120 + 1) + 120) + "px";
	
}
function resetbad2(){
	bad2.style.left = Math.floor(Math.random() * (1080 - 120 + 1) + 120) + "px";
	bad2.style.top = Math.floor(Math.random() * (480 - 120 + 1) + 120) + "px";
	
}
function mouseUp() {
  if (doElsCollide(correct, box)){
	  reset();
	  correct.style.display = "none";
	   document.getElementById("box").innerHTML = "Correct!";
	  setTimeout(() => {
		   document.getElementById("box").innerHTML = x;
		   resetall();
}, 2000);
if (nr < chosemnamount - 1){
nr +=1;
x = words[nr];
y = translations[nr];
}
else{
	
		instruct.innerHTML = "You did it! Good job";
	document.getElementById("box").innerHTML = "Complete";
 setTimeout(() => {
	 box.style.display = "none";
	 instruct.style.display = "none";
	 correct.style.display = "none";
	bad.style.display = "none";
	bad2.style.display = "none";
 document.getElementsByTagName('input')[0].click();
}, 2000);

}
  }
    if (doElsCollide(bad, box)){
	  resetbad();
	  bad.style.display = "none";
	   var xx =   document.getElementById("box").innerHTML;
	  document.getElementById("box").innerHTML = "Wrong!";
	  setTimeout(() => {
		    document.getElementById("box").innerHTML = xx;
}, 2000);

  }
    if (doElsCollide(bad2, box)){
	  resetbad2();
	  bad2.style.display = "none";
	 var xx =   document.getElementById("box").innerHTML;
	  document.getElementById("box").innerHTML = "Wrong!";
	  setTimeout(() => {
		    document.getElementById("box").innerHTML = xx;
}, 2000);	

  }
}
function initialClick(e) {

  if(moving){
    document.removeEventListener("mousemove", move);
    moving = !moving;
	mouseUp();
    return;
  }
  
  moving = !moving;
  image = this;


  document.addEventListener("mousemove", move, false);

}
doElsCollide = function(correct, box) {
    correct.offsetBottom = correct.offsetTop + correct.offsetHeight;
    correct.offsetRight = correct.offsetLeft + correct.offsetWidth;
    box.offsetBottom = box.offsetTop + box.offsetHeight;
    box.offsetRight = box.offsetLeft + box.offsetWidth;
    
    return !((correct.offsetBottom < box.offsetTop) ||
             (correct.offsetTop > box.offsetBottom) ||
             (correct.offsetRight < box.offsetLeft) ||
             (correct.offsetLeft > box.offsetRight))
}


}
</script>
	
     

   


</html>
