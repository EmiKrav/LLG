<!DOCTYPE html>

<html>

<head>

    <title>Main</title>
<!-- Write your comments here <link href="css/style.css?key=<?php echo time(); ?>" type="text/css" rel="stylesheet" />--> 
     <link href="css/style.css?key=<?php echo time(); ?>" type="text/css" rel="stylesheet" />

</head>
<body >

           <?php 
		   
		   $servername = "localhost";
$username = "root";
$password = "alakard13";
$dbname = "llg";

$conn = new mysqli($servername, $username, $password, $dbname);

$svarbu = 0;
$idintifikacija = 2;
$sometink = "";

$exist2= "SELECT tag_name as tag_name FROM tags";

$result3 = mysqli_query($conn, $exist2);
while($row2 = mysqli_fetch_array($result3, MYSQLI_ASSOC)){
	$tags[] = $row2['tag_name'];
}

if (!$result3) {
    echo "Error: " . mysqli_error($conn);
}

    mysqli_close($conn);
  if(array_key_exists('button1', $_POST)) {
            button1();
        }
        function button1() {
           header('Location: main.php');
        }
		

?>
    <div id="header">
	
<form method="POST">
       <input type="text" name="forchecking" id="forchecking" value=""  />
	   <input type="submit" name="forcheckingb" id="forcheckingb"/>
</form>
<div class="register-forget opacity" style="margin-top:20px;margin-right:10px ">
 <form action="" method="post">
			 <input style="float: left; margin-left: 20px;background-color: white;"  type="submit" id="register-forgetbutton" name="button1" value="Back" />
				 </form>
				 </div>
				 
				
		<div class="dropdowna">
  <button onclick="myFunction()" class="dropbtna" id="pavad" style="width:25%; margin-left:40%; margin-top:2%">Category</button>
 
  <div id="myDropdowna" class="dropdown-content" style="width:24%; margin-left:40%">
 
    <input type="text"  class="input" style="width:98%; text-align:left" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
	<script>
function ShowOld(dispname) {
	
  var pav = document.getElementById("pavad");
  pav.innerText =  dispname;
    document.getElementById("forchecking").value = dispname;
	document.getElementById("forcheckingb").click();
   <?php
$conn = new mysqli($servername, $username, $password, $dbname);
$sometink = $_POST['forchecking'];
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
WHERE IF($svarbu=1, tags.tag_id = $idintifikacija, tags.tag_id>0);";

$resultjs2 = mysqli_query($conn, $exist);
while($row = mysqli_fetch_array($resultjs2, MYSQLI_ASSOC)){
	$words[] = $row['word'];
$translations[] = $row['translation'];

 }
  mysqli_close($conn);
 ?>;
  }
var tags = 
    <?php echo json_encode($tags); ?>;
	var words = 
    <?php echo json_encode($words); ?>;
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
<table style="width:100%">
  <tr> 
  <th >ID</th>
    <th >Lithuanian Word</th>
    <th >Translation</th>
  </tr>
  <tr>
   <td><?php for ($x = 1; $x <= count($words); $x++) {
  echo "$x <br>";}
  ?> 
  </td>
    <td><?php foreach ($words as $x) {
  echo "$x <br>";}?> 
  </td>
      <td><?php foreach ($translations as $x) {
  echo "$x <br>";}?> 
  </td>
  </tr>
</table>
    </div>

	
</body>

</html>
