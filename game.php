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
	

 <form action="" method="post">
 <div class="register-forget opacity" style="margin-top:20px;margin-right:10px ">
       </div>
			<input class="register-forget opacity" style="float: left;background-color: white;margin-left:5%;width:10%" type="submit" id="register-forgetbutton" name="button1"
                 value="Back" />
				 </form>
				
				<input class="register-forget opacity" style="float: left; width:10%;margin-left:85%;background-color: white;margin-top:-64px;" type="submit"onclick = "displayblock()" 
				 id="register-forgetbutton" name="buttonstart"value="Start" /> 
				 
 
 </div>
	<strong id="monster"></strong>
	<strong id="box"></strong>
	<div id="dogPic"></div>
	<div id="badPic"></div>
	<div id="badPic2"></div>
	<h1 id="instruct" style="user-select: none;">How to play: <br> Drag cube with correct letter to the box </h1>
	<div class="login-container" style="margin-left:35%">
	
			<form method="POST">
		<p>
		
	 <label for="wordamount" id="wordamountl" style="margin-left:40%">Words:</label>
	 </p>
		<input style=" background-color: #ddd; text-align:center" type="number" id="wordamount" name="wordamount" min="1" max="051" value="0">
       <input type="text" name="forchecking" id="forchecking" value=""  />
	   <input type="submit" name="forcheckingb" id="forcheckingb"/>
</form>
	<div class="dropdowna">
  <button onclick="myFunction()" class="dropbtna" style="width:69%; margin-left:15%" id="pavad">Category</button>
 
  <div id="myDropdowna" style=" margin-left:15%;overflow-x:auto;overflow-y:scroll;height: 150px;" class="dropdown-content">
 
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
$randomas=rand(1,7);
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
</body>
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
 //document.write(chosemnamount);    	
//Display the array elements
// for(var i = 0; i < words.length; i++){
   // document.write(words[i]);
// }
var alphabet = "aąbcčdeęėfghiįjklmnoprsštuųūvzž";
var alb = alphabet;
var nr = 0;
	var x = words[nr];
	var y = translations[nr];
var letter = Math.floor(Math.random() * x.length);
var correct = document.getElementById("dogPic");
var box = document.getElementById("box");
var monster = document.getElementById("monster");

var bad = document.getElementById("badPic");
var bad2 = document.getElementById("badPic2");
	
	correct.style.display = "none";
	monster.style.display = "none";
	box.style.display = "none";
	bad.style.display = "none";
	bad2.style.display = "none";
	
var klaidukiek=0;
var sx = screen.availWidth;
var sy = screen.availHeight;




function displayblock(){
	
	document.getElementById("wordamount").style.display="none";
	document.getElementById("wordamountl").style.display="none";
	document.getElementById("pavad").style.display="none";
	if(document.getElementById("wordamount").value < 1){
	document.getElementById("wordamount").value = document.getElementById("wordamount").max;
	chosemnamount = document.getElementById("wordamount").value;
	}
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
if (monster.style.display == "none"){
	
	monster.style.display = "block";
	for(var i = 0; i < x.length; i++){
  if (i != letter){
	document.getElementById("monster").innerHTML += x[i];
  }
   else{
	  document.getElementById("monster").innerHTML += "_";
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
  
if (newX > 50 && newX < sx-50){
  image.style.left = newX + "px";
}
if (newY > 100 && newY <sy -200){
  image.style.top = newY + "px";
}

  if (newX <= 50 || newX >= sx-50){
	initialClick();
}
  if (newY <= 100 || newY >= sy-200){
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
	document.getElementById("monster").innerHTML ="";
		for(var i = 0; i < x.length; i++){
  if (i != letter){
	document.getElementById("box").innerHTML += x[i];
	document.getElementById("monster").innerHTML += x[i];
  }
  else{
	  document.getElementById("box").innerHTML += "_";
	  document.getElementById("monster").innerHTML += "_";
  }
		}
	bad.style.display = "block";
	bad2.style.display = "block";	
	correct.style.display = "block";
}
function reset(){
	var leftorright=Math.floor(Math.random() * 2) + 1;
	if (leftorright==1){
		correct.style.left = Math.floor(Math.random() * (551-280)) + 180 + "px";
	}else{
	correct.style.left = Math.floor(Math.random() * (sx-880)) + 671+80 + "px";
	}
	correct.style.top = Math.floor(Math.random() * (475-200)) + 130 + "px";
}
function resetbad(){
	var leftorright=Math.floor(Math.random() * 2) + 1;
	if (leftorright==1){
		bad.style.left = Math.floor(Math.random() * (551-280)) + 180 + "px";
	}else{
	bad.style.left = Math.floor(Math.random() * (sx-880)) + 671+80 + "px";
	}
	
	bad.style.top = Math.floor(Math.random() * (475-200)) + 130 + "px";

}
function resetbad2(){
	var leftorright=Math.floor(Math.random() * 2) + 1;
	if (leftorright==1){
		bad2.style.left = Math.floor(Math.random() * (551-280)) + 180 + "px";
	}else{
	bad2.style.left = Math.floor(Math.random() * (sx-880)) + 671+80 + "px";
	}
	bad2.style.top = Math.floor(Math.random() * (475-200)) + 130 + "px";
	
}
function mouseUp() {
  if (doElsCollide(correct, box)){
	  reset();
	  correct.style.display = "none";
	   document.getElementById("box").innerHTML = "Correct!";
	    document.getElementById("monster").innerHTML = "Correct!";
	  setTimeout(() => {
		   document.getElementById("box").innerHTML = x;
		   document.getElementById("monster").innerHTML = x;
		   resetall();
}, 2000);
if (nr < chosemnamount-1){
nr +=1;
x = words[nr];
y = translations[nr];
}
else{
	
		instruct.innerHTML = "You did it! Good job"+"<br />"+"You made" +"<br />"+klaidukiek+"<br />"+" mistakes!";
	document.getElementById("box").innerHTML = "Complete";
		document.getElementById("monster").innerHTML = "Complete";
 setTimeout(() => {
	 box.style.display = "none";
	 monster.style.display = "none";
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
	   var xx = document.getElementById("box").innerHTML;
	   var xx = document.getElementById("monster").innerHTML;
	  document.getElementById("box").innerHTML = "Wrong!";
	  document.getElementById("monster").innerHTML = "Wrong!";
	  klaidukiek++;
	  setTimeout(() => {
		    document.getElementById("box").innerHTML = xx;
			  document.getElementById("monster").innerHTML = xx;
}, 2000);

  }
    if (doElsCollide(bad2, box)){
	  resetbad2();
	  bad2.style.display = "none";
	 var xx =   document.getElementById("box").innerHTML;
	  document.getElementById("box").innerHTML = "Wrong!";
	  var xx =   document.getElementById("monster").innerHTML;
	  document.getElementById("monster").innerHTML = "Wrong!";
	  klaidukiek++;
	  setTimeout(() => {
		    document.getElementById("box").innerHTML = xx;
				    document.getElementById("monster").innerHTML = xx;
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
	
     

   
 <script type="text/javascript">
        function preventBack() {
            window.history.forward();
        }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script>

</html>
