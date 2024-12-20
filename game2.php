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
	<div id="cosship"></div>
	<div id="asteroid"></div>
	<div id="asteroid2"></div>
	<div id="asteroid3"></div>
	<div id="bullet"></div>
	<div id="wordbox" ></div>
	<div id="wordbox2" ></div>
	<div id="wordbox3" ></div>
	<div id="wordbox4" ></div>
	<input type="text" id="mytext" value="">
	<h1 id="instruct">How to play: <br> Type your answer (A/B/C) in the grey box<br> Move ship with arrow keys <br> Shoot asteroids with space key</h1>
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

var nr = 0;
var wordc = 0;
var ca = false;
var ca2 = false;
var ca3 = false;
	var x = words[wordc];
	var y = translations[wordc];


var ship = document.getElementById("cosship");
var ast1 = document.getElementById("asteroid");
var ast2 = document.getElementById("asteroid2");
var ast3 = document.getElementById("asteroid3");
var bullet = document.getElementById("bullet");
var instruct = document.getElementById("instruct");
var zodis = document.getElementById("wordbox");

var vert0 = document.getElementById("wordbox2");
var vert1 = document.getElementById("wordbox3");
var vert2 = document.getElementById("wordbox4");

var tekstas = document.getElementById("mytext");

	ship.style.display = "none";
	ast1.style.display = "none";
	ast2.style.display = "none";
	ast3.style.display = "none";
	vert0.style.display = "none";
	vert1.style.display = "none";
	vert2.style.display = "none";
tekstas.style.display = "none";
bullet.style.display = "none";
zodis.style.display = "none";
function displayblock(){
	instruct.style.display = "none";
	answers();
	vert0.style.display = "block";
	vert1.style.display = "block";
	vert2.style.display = "block";
tekstas.style.display = "block";
	if (zodis.style.display == "none"){
	zodis.innerHTML = y;
	zodis.style.display = "block";
	}
	var start =  document.getElementsByTagName('input')[1];
	start.style.display = "none";
	if (ship.style.display == "none"){
	ship.style.display = "block";
	reset();
	}
	if (ast1.style.display == "none"){
	ast1.style.display = "block";
	resetaster();
	moveasteroid();
	}
	if (ast2.style.display == "none"){
	ast2.style.display = "block";
	resetaster2();
		moveasteroid2();
	}
	if (ast3.style.display == "none"){
	ast3.style.display = "block";
	resetaster3();
		moveasteroid3();
	}

function reset(){
	ship.style.left =  window.innerWidth / 2 + "px";
	ship.style.top = window.innerHeight - 50 + "px";
}
function resetaster(){
	ast1.style.left =  Math.floor(Math.random() * (900 - 300 + 1) + 300) + "px";
	ast1.style.top = 80 + "px";
	
}
function resetaster2(){
	ast2.style.left =  Math.floor(Math.random() * (900 - 300 + 1) + 300) + "px";
	ast2.style.top = 80 + "px";
}
function resetaster3(){
	ast3.style.left =  Math.floor(Math.random() * (900 - 300 + 1) + 300) + "px";
	ast3.style.top = 80 + "px";
}
document.addEventListener('keydown', moving);
function moving(e) {
	 let rect = ship.getBoundingClientRect();
 if(e.keyCode == 37 && rect.x > 300) {
	
  ship.style.left =  rect.x - 10 + "px";
    }
	else if(event.keyCode == 39 && rect.x < 900) {
  ship.style.left =  rect.x + 10 + "px";
    }
	else if(event.keyCode == 32) {
	var x = document.getElementById("mytext").value;
	if ((x == "A" || x == "B" || x == "C") && nr == 0){
	nr = 1;
  bullet.style.display = "block";
  bullet.style.left =  rect.x  + 5 + "px";
	bullet.style.top = rect.y - 10 + "px";
	movebullet();
	}
    }

}
function movebullet(){
	 let id = null;
	  clearInterval(null);
  id = setInterval(frame, 1);
  let rect = bullet.getBoundingClientRect();
  let pos = rect.y;
  function frame() {
    if (pos <= 70) {
      clearInterval(id);
	  nr = 0;
	  bullet.style.display = "none";
    }
	   else if (doElsCollide(bullet, ast1)){
	   clearInterval(id);
	  nr = 0;
	  ca = true;
	  bullet.style.display = "none";
	   ast1.style.display = "none";
	   resetasters();
	   }
	    else if (doElsCollide(bullet, ast2)){
	   clearInterval(id);
	  nr = 0;
	   ca2 = true;
	  bullet.style.display = "none";
	   ast2.style.display = "none";
	   resetasters();
	   }
	      else if (doElsCollide(bullet, ast3)){
	   clearInterval(id);
	  nr = 0;
	   ca3 = true;
	  bullet.style.display = "none";
	   ast3.style.display = "none";
	   resetasters();
	   }
	else {
      pos-=5; 
      bullet.style.top = pos + "px"; 
    }
  }
}
function moveasteroid(){
	 let id = null;
	 let pos = null;
	 clearInterval(null);
  id = setInterval(frame2, 10);
  let rect = ast1.getBoundingClientRect();
  pos = rect.y;
function frame2() {
	  if (ca) {
      clearInterval(id);
	  ca = false;
	  setTimeout(() => {
		  ast1.style.display = "block";
		    moveasteroid();
}, 1000);	
	 
    }
    else if (pos >= window.innerHeight - 50) {
	 ca = true;
	 ast1.style.display = "none";
	 resetaster();
    }

	else {
      pos+=0.15; 
      ast1.style.top = pos + "px"; 
    }
  }
}
function moveasteroid2(){
	 let id = null;
	 let pos = null;
	 clearInterval(null);
  id = setInterval(frame3, 10);
  let rect = ast2.getBoundingClientRect();
  pos = rect.y;
function frame3() {
    if (ca2) {
      clearInterval(id);
	   ca2 = false;
	    setTimeout(() => {
		  ast2.style.display = "block";
		    moveasteroid2();
			
}, 1000);
    }
	  else if (pos >= window.innerHeight - 50) {
	 ca2 = true;
	 ast2.style.display = "none";
	 resetaster2();
    }
	else {
      pos+=0.1; 
      ast2.style.top = pos + "px"; 
    }
  }
}
function moveasteroid3(){
	 let id = null;
	 let pos = null;
	 clearInterval(null);
  id = setInterval(frame4, 10);
  let rect = ast3.getBoundingClientRect();
 pos = rect.y;
function frame4() {
    if (ca3) {
      clearInterval(id);
	  ca3 = false;
	    setTimeout(() => {
		  ast3.style.display = "block";
		    moveasteroid3();
			
}, 1000);
    }
	 else if (pos >= window.innerHeight - 50) {
	 ca3 = true;
	 ast3.style.display = "none";
	 resetaster3();
    }
	else {
      pos+=0.2; 
      ast3.style.top = pos + "px"; 
    }
  }
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

function resetasters(){
	changeword();
	if (ast1.style.display == "none" ){
	//ast1.style.display = "block";
	resetaster();
	}
	else if (ast2.style.display == "none" ){
	//ast2.style.display = "block";
	resetaster2();
	}
	else if (ast3.style.display == "none" ){
	//ast3.style.display = "block";
	resetaster3();
	}

	
}
function changeword(){
if (wordc < chosemnamount - 1){
wordc +=1;
x = words[wordc];
y = translations[wordc];
zodis.innerHTML = y;
answers();
}
else{
	ca = false;
	ca2 = false;
	ca3 = false;
	
	ast1.style.display = "none";
	ast2.style.display = "none";
	ast3.style.display = "none";
	zodis.style.display = "none";
	instruct.style.display = "block";
	instruct.innerHTML = "You did it! Good job";
	setTimeout(() => {
 document.getElementsByTagName('input')[0].click();
}, 2000);
}
}

function answers(){
	const fruits = [];
for(var i = 0; i < words.length; i++){
fruits.push(i)
}

	var ats = Math.floor(Math.random() * 3);	
		fruits.splice(fruits.indexOf(wordc) , 1);
if (ats == 0){
	vert0.innerHTML = "A-" + x;
}
else{
	var rw = fruits[Math.floor(Math.random() * fruits.length)];
	vert0.innerHTML = "A-" + words[rw];
	fruits.splice(fruits.indexOf(rw), 1);
}
if (ats == 1){
	vert1.innerHTML = "B-" + x;
}
else{
	var rw = fruits[Math.floor(Math.random() * fruits.length)];
	vert1.innerHTML = "B-" + words[rw];
	fruits.splice(fruits.indexOf(rw) , 1);
}
if (ats == 2){
	vert2.innerHTML = "C-" + x;
}
else{
	var rw = fruits[Math.floor(Math.random() * fruits.length)];
	vert2.innerHTML = "C-" + words[rw];
}
}
}
</script>
	
     

   


</html>