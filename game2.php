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
$sk=0;
$svarbu = 0;
$idintifikacija = 2;
$sometink = "";
$chosemnamount = 0;
$exist2= "SELECT tag_name as tag_name FROM tags";

$result3 = mysqli_query($conn, $exist2);
while($row2 = mysqli_fetch_array($result3, MYSQLI_ASSOC)){
	$tags[] = $row2['tag_name'];
}
// $exist= "SELECT word as word, translation as translation FROM words ORDER BY RAND()";

// $result2 = mysqli_query($conn, $exist);
// while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
	// $words[] = $row['word'];
// $translations[] = $row['translation'];
// }

// if (!$result2) {
    // echo "Error: " . mysqli_error($conn);
// }
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
    <div id="header">
	

       
 <form action="" method="post" >
 <div class="register-forget opacity" style="margin-top:20px;margin-right:10px " >
 </div>
			 <input class="register-forget opacity"  style="float: left;background-color: white;margin-left:5%;width:10%"id="register-forgetbutton" 
			 type="submit"  name="button1" value="Back" />
				 </form>
				 <input class="register-forget opacity" style="float: left; width:10%;margin-left:85%;background-color: white;margin-top:-64px;"
				 type="submit" onclick = "displayblock()"   id="register-forgetbutton" name="buttonstart" value="Start"/>


    </div>
	<div id="cosship"></div>
	<div id="asteroid"></div>
	<div id="asteroid2"></div>
	<div id="asteroid3"></div>
	<div id="bullet"></div>
	<div style="user-select: none" id="wordbox" ></div>
	<div style="user-select: none" id="wordbox2" ></div>
	<div style="user-select: none" id="wordbox3" ></div>
	<div style="user-select: none" id="wordbox4" ></div>
	<input type="text" maxlength="1" id="mytext" value="">
	<h1 id="instruct" style="user-select: none">How to play: <br> Type your answer (A/B/C) in the box<br> Move ship with arrow keys <br> Shoot asteroids with space key</h1>
	<div class="login-container" style="margin-left:35%" >
	
<form method="post" >
		<p >
		
	 <label for="wordamount" id="wordamountl" style="margin-left:40%">Words:</label>
	 </p>
		<input style=" background-color: #ddd; text-align:center" type="number" id="wordamount" name="wordamount" min="1" max="051" value="0">
       <input type="text" name="forchecking" id="forchecking" value=""  />
	   <input type="submit" name="forcheckingb" id="forcheckingb"/>
</form>
<div class="dropdowna">
  <button onclick="myFunction()" class="dropbtna" style="width:69%; margin-left:15%"  id="pavad">Category</button>
 
  <div id="myDropdowna" style=" margin-left:15%;overflow-x:auto;overflow-y:scroll;height: 100px;"  class="dropdown-content">
 
    <input type="text"  class="input" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
	<script>
var chosemnamount;
	document.getElementById("wordamount").addEventListener("input", function() {
		  document.getElementById("wordamount").max = document.getElementById("wordamount").max.slice(0,2).padStart(2,"0")
   if (document.getElementById("wordamount").value == '0'){
	  document.getElementById("wordamount").value = '1';
  }
   if (document.getElementById("wordamount").value <= '9'){
	  document.getElementById("wordamount").value = document.getElementById("wordamount").value.slice(0, 2);
  }
   if (document.getElementById("wordamount").value.padStart(2,"0") > document.getElementById("wordamount").max){
	 document.getElementById("wordamount").value = document.getElementById("wordamount").max.slice(0,2);
	  if (document.getElementById("wordamount").value <= '9'){
	  document.getElementById("wordamount").value = document.getElementById("wordamount").value.slice(0, 2);
  }
	   chosemnamount = document.getElementById("wordamount").value;
  }
  else{
	  chosemnamount = document.getElementById("wordamount").value;
  }
});
function ShowOld(dispname) {
	
  var pav = document.getElementById("pavad");
  pav.innerText =  dispname;
    document.getElementById("forchecking").value = dispname;
	document.getElementById("forcheckingb").click();
   <?php
$conn = new mysqli($servername, $username, $password, $dbname);
$sometink = $_POST['forchecking'];
$chosemnamount = $_POST['wordamount'];
if (!empty($sometink)){
	 $svarbu = 1;
}
else{
	$svarbu = 0;
}

$tagoid = "SELECT tag_id as 'tag_id', tag_name as 'tag_name' FROM `tags` WHERE `tag_name` = '$sometink'";
 $result3 = mysqli_query($conn, $tagoid);
 while($row2 = mysqli_fetch_array($result3, MYSQLI_ASSOC)){
 $idintifikacija = $row2['tag_id'];
 }
$exist= "SELECT word as 'word', translation as 'translation', word_tags.word_id as 'id' , tags.tag_id as 'id2' 
FROM ((words
INNER JOIN word_tags ON words.word_id=word_tags.word_id)
INNER JOIN tags ON tags.tag_id = word_tags.tag_id)
WHERE IF($svarbu=1, tags.tag_id = $idintifikacija, tags.tag_id>0) ORDER BY RAND();";

$resultjs2 = mysqli_query($conn, $exist);
while($row = mysqli_fetch_array($resultjs2, MYSQLI_ASSOC)){
	$words[] = $row['word'];
$translations[] = $row['translation'];
$sk+=1;
 }
  mysqli_close($conn);
 ?>;
  document.getElementById("wordamount").max = <?php echo json_encode($sk); ?>;
 
    if (<?php echo json_encode($chosemnamount); ?> != 0 && <?php echo json_encode($chosemnamount); ?> < words.length ){
 document.getElementById("wordamount").value = <?php echo json_encode($chosemnamount); ?>;
 
 }
 else{
	 document.getElementById("wordamount").value =  <?php echo json_encode($sk); ?>;
 }
  }
  
var tags = 
    <?php echo json_encode($tags); ?>;
	var words = 
    <?php echo json_encode($words); ?>;
	 if (<?php echo json_encode($chosemnamount); ?> == 0 ){
	 document.getElementById("wordamount").value =  words.length;
	 }
	 for (i = 0; i < tags.length; i++) {
const para = document.createElement("a");
const node = document.createTextNode(tags[i]);
para.appendChild(node);
para.onclick = function() {
	ShowOld(this.innerText);
 };
 if (<?php echo json_encode($sometink); ?> != null){
 document.getElementById("pavad").innerText = <?php echo json_encode($sometink); ?>;
 }


const element = document.getElementById("myDropdowna");
element.appendChild(para);
	 }

var change = false;
window.onclick = function(event) {
  if (
  !event.target.matches('.dropbtna') 
	  && !event.target.matches('.input')
)  {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
     if (openDropdown.classList.contains('show')) {
       openDropdown.classList.remove('show');
     }
    }
  }
}
function myFunction() {
  document.getElementById("myDropdowna").classList.toggle("show");
  const input = document.getElementById("myInput");
  input.value = null;
  filterFunction();
}
function filterFunction() {
  const input = document.getElementById("myInput");
  const filter = input.value.toUpperCase();
  const div = document.getElementById("myDropdowna");
  const a = div.getElementsByTagName("a");
  for (let i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}

</script>
</div>
</div>
</div>
 <div id="console" style="display:none">
 <div id="console2" style="display:none">
</div>
 </div>
</body>

 <script type="text/javascript">
        function preventBack() {
            window.history.forward();
        }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script>
	<script>
var y = "<?php echo $sk?>";
var words = 
    <?php echo json_encode($words); ?>;
var translations = 
    <?php echo json_encode($translations); ?>;
	 document.getElementById("wordamount").max = <?php echo json_encode($sk); ?>;
	  if (<?php echo json_encode($chosemnamount); ?> != 0 && <?php echo json_encode($chosemnamount); ?> < words.length ){
 document.getElementById("wordamount").value = <?php echo json_encode($chosemnamount); ?>;
 }
 else{
	
	 document.getElementById("wordamount").value =  words.length;
 }
chosemnamount = document.getElementById("wordamount").value;//words.length;
//chosemnamount = words.length;
     	
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
var teisraid ="";


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

tekstas.value="";
var tekstasv = tekstas.value;
var paspausta = false;

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

var klaidukiekis=0;
function displayblock(){
	document.getElementsByTagName('body')[0].setAttribute('id', "cosmos");
	document.getElementById("wordamount").style.display="none";
	document.getElementById("wordamountl").style.display="none";
	document.getElementById("pavad").style.display="none";
	document.getElementById("console").style.display="block";
	document.getElementById("console2").style.display="block";
	instruct.style.display = "none";
		  setTimeout(() => {

	tekstas.addEventListener("input", updateValue);
	function updateValue(e) {
  tekstas.value = e.target.value.toUpperCase();
}
	
	if(document.getElementById("wordamount").value < 1){
	document.getElementById("wordamount").value = document.getElementById("wordamount").max;
	chosemnamount = document.getElementById("wordamount").value;
	}
	answers();
	vert0.style.display = "block";
	vert1.style.display = "block";
	vert2.style.display = "block";
tekstas.style.display = "block";
tekstas.focus();
paspausta = true;
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
  if (paspausta == true){
	  tekstas.disabled = true; 
	  paspausta = false;
	 setTimeout(() => {
  tekstas.disabled = false; 
}, 10);
    }
 }
	else if(event.keyCode == 39 && rect.x < 900) {
		
  ship.style.left =  rect.x + 10 + "px";
  
	   if (paspausta == true){
	  tekstas.disabled = true; 
	  paspausta = false;
	 setTimeout(() => {
  tekstas.disabled = false; 
}, 10);
    }
    }
	else if(event.keyCode == 32) {
		
	   if (paspausta == true){
	  tekstas.disabled = true; 
	  paspausta = false;
	 setTimeout(() => {
  tekstas.disabled = false; 
}, 10);
    }
	
	tekstasv = tekstas.value.toUpperCase();
	if ((tekstasv == "A" || tekstasv == "B" || tekstasv == "C") && nr == 0){
	nr = 1;
  bullet.style.display = "block";
  bullet.style.left =  rect.x  + 25 + "px";
	bullet.style.top = rect.y - 10 + "px";
	movebullet();
	}
    }
}

// tekstas.addEventListener('focus', function(){
  // alert('Focused');
// });
tekstas.onclick = function () {
	paspausta = true;
}
                   // if (tekstas.value.length == 1){
					   // alert("Button Clicked");
				   // }
                // }
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
	   else if (doElsCollide(bullet, ast1) ){
		    clearInterval(id);
	  nr = 0;
	  ca = true;
	  bullet.style.display = "none";
		   if (teisraid == tekstasv){
	   ast1.style.display = "none";
	   resetasters();
		   }
		   else{
			   klaidukiekis++;
		   }
	   }
	    else if (doElsCollide(bullet, ast2) ){
			 clearInterval(id);
	  nr = 0;
	   ca2 = true;
	  bullet.style.display = "none";
			  if (teisraid == tekstasv){
	 
	   ast2.style.display = "none";
	   resetasters();
	   }
	   else{
		   klaidukiekis++;
	   }
		}
	      else if (doElsCollide(bullet, ast3) ){
			   clearInterval(id);
	  nr = 0;
	   ca3 = true;
	  bullet.style.display = "none";
			    if (teisraid == tekstasv){
	  
	   ast3.style.display = "none";
	   resetasters();
				}
				else{
		   klaidukiekis++;
	   }
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
    else if (pos >= window.innerHeight - 80) {
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
	  else if (pos >= window.innerHeight - 80) {
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
	 else if (pos >= window.innerHeight - 80) {
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
	document.getElementById("console").style.display= "none";
	document.getElementById("console2").style.display= "none";
	vert0.style.display = "none";
	vert1.style.display = "none";
	vert2.style.display = "none";
	document.getElementById("mytext").style.display= "none";
	ast1.style.display = "none";
	ast2.style.display = "none";
	ast3.style.display = "none";
	zodis.style.display = "none";
	instruct.style.display = "block";
	instruct.innerHTML = "You did it! Good job"+"<br />"+"You made" +"<br />"+klaidukiekis+"<br />"+" mistakes!";
	
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
	if (words.length<=2){
	words.push("vienas");
	fruits.push(fruits.length);
}
if (words.length<=2){
	words.push("du");
	fruits.push(fruits.length);
}

	var ats = Math.floor(Math.random() * 3);	
		fruits.splice(fruits.indexOf(wordc) , 1);
if (ats == 0){
	vert0.innerHTML = "A-" + x;
	teisraid="A";
}
else{
	var rw = fruits[Math.floor(Math.random() * fruits.length)];
	vert0.innerHTML = "A-" + words[rw];
	fruits.splice(fruits.indexOf(rw), 1);
}
if (ats == 1){
	vert1.innerHTML = "B-" + x;
	teisraid="B";
}
else{
	var rw = fruits[Math.floor(Math.random() * fruits.length)];
	vert1.innerHTML = "B-" + words[rw];
	fruits.splice(fruits.indexOf(rw) , 1);
}
if (ats == 2){
	vert2.innerHTML = "C-" + x;
	teisraid="C";
}
else{
	var rw = fruits[Math.floor(Math.random() * fruits.length)];
	vert2.innerHTML = "C-" + words[rw];
}
}
}, 100);
}
</script>
	
     

   


</html>
