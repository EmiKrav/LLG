<!DOCTYPE html>

<html>

<head>

    <title>Main</title>
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
$existwords ="SELECT word as word, translation as translation FROM words";

$resultexistwords = mysqli_query($conn, $existwords);
while($rowwordsall = mysqli_fetch_array($resultexistwords, MYSQLI_ASSOC)){
	$wordsall[] = $rowwordsall['word'];
	$translationall[] = $rowwordsall['translation'];
}
if (!$resultexistwords) {
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

    <div id="header"style="clear: both">
	
<form method="POST">
       <input type="text" name="forchecking" id="forchecking" value=""  />
	   <input type="submit" name="forcheckingb" id="forcheckingb"/>
</form>
 <form action="" method="post">
			 <input style="float: left; margin-left: 20px;" type="submit" id="buttonheader" name="button1"
                 value="Back" />
				 </form>
				 <h3 style="float;text-align-last: center;user-select: none;">Admin</h3>
				 </div>
				 
				
		<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn" id="pavad">Category</button>
 
  <div id="myDropdown" class="dropdown-content">
 
    <input type="text"  class="input" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
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
$exist= "SELECT word as 'word', translation as 'translation', word_tags.word_id as 'id' , tags.tag_id as 'id2' , tags.tag_name as 'tagname' 
FROM ((words
INNER JOIN word_tags ON words.word_id=word_tags.word_id)
INNER JOIN tags ON tags.tag_id = word_tags.tag_id)
WHERE IF($svarbu=1, tags.tag_id = $idintifikacija, tags.tag_id>0);";

$resultjs2 = mysqli_query($conn, $exist);
while($row = mysqli_fetch_array($resultjs2, MYSQLI_ASSOC)){
	$words[] = $row['word'];
$translations[] = $row['translation'];
$wordtagsid[] = $row['id'];
$tagswordid[] = $row['id2'];
$tagsnames[] = $row['tagname'];
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
const element = document.getElementById("myDropdown");
element.appendChild(para);
	 }

var change = false;
window.onclick = function(event) {
  if (
  !event.target.matches('.dropbtn') 
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
  document.getElementById("myDropdown").classList.toggle("show");
  const input = document.getElementById("myInput");
  input.value = null;
  filterFunction();
}
function filterFunction() {
  const input = document.getElementById("myInput");
  const filter = input.value.toUpperCase();
  const div = document.getElementById("myDropdown");
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
<?php
if(array_key_exists('addbutton', $_POST)) {
            addbutton();
        }
        function addbutton() {
			$servername = "localhost";
$username = "root";
$password = "alakard13";
$dbname = "llg";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

 if(isset($_POST['word'])&& isset($_POST['translation'])&& !empty($_POST['word'])&& !empty($_POST['translation'])){

    $wordadd = $_POST['word'];
	$translationadd = $_POST['translation'];

$exist= "INSERT INTO words (word, translation) VALUES ( '$wordadd', '$translationadd')";
$resultadd2 = mysqli_query($conn, $exist);
if (!$resultadd2) {
    echo "Error: " . mysqli_error($conn);
}else{
	header('Location: wordsadmin.php');
}

mysqli_close($conn);
}
}

if(array_key_exists('addbuttontags', $_POST)) {
            addbuttontags();
        }
        function addbuttontags() {
			$servername = "localhost";
$username = "root";
$password = "alakard13";
$dbname = "llg";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

 if(isset($_POST['tag'])&& !empty($_POST['tag'])){

    $tagadd = $_POST['tag'];

$existtag= "INSERT INTO tags (tag_name ) VALUES ( '$tagadd')";
$resultaddtag = mysqli_query($conn, $existtag);
if (!$resultaddtag) {
    echo "Error: " . mysqli_error($conn);
}else{
	header('Location: wordsadmin.php');
}

mysqli_close($conn);
}
}
if(array_key_exists('addtwo', $_POST)) {
            addtwo();
        }
        function addtwo() {
			$servername = "localhost";
$username = "root";
$password = "alakard13";
$dbname = "llg";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

 if(isset($_POST['tagid'])&& !empty($_POST['tagid']) && isset($_POST['wordid'])&& !empty($_POST['wordid'])){

    $tagidadd = $_POST['tagid'];
	$wordidadd = $_POST['wordid'];
$existwo= "INSERT INTO word_tags (word_id, tag_id ) VALUES ( '$wordidadd','$tagidadd')";
$resultexistwo = mysqli_query($conn, $existwo);
if (!$resultexistwo) {
    echo "Error: " . mysqli_error($conn);
}else{
	header('Location: wordsadmin.php');
}

mysqli_close($conn);
}
}
?>
 <form action="" method="post">   
			<p>
			<label for="word">Word:</label>
            <input type="text" name="word" value="" />
			<label  style="margin-left:5%" for="tag">Tag:</label>
            <input type="text" name="tag" value="" />
			
			
			<label  style="margin-left:5%" for="tag">WordID:</label>
            <input type="text" name="wordid" value="" />
			</p>
			<p>
			<label for="translation">Translation:</label>
            <input type="text" name="translation" value="" />
			<input type="submit" name="addbuttontags"
                id = "btn" value="Add" style="margin-left:2%"/>
				
				
			<label  style="margin-left:23%" for="tag">TagID:</label>
            <input type="text" name="tagid" value="" />
			</p>
          
			<input type="submit" name="addbutton"
                id = "btn" value="Add" />
	
		<input type="submit" name="addtwo"
                id = "btn" value="Add" style="margin-left:49%"/>
 
        </form>
		<div style="overflow-x:auto;overflow-y:scroll;height: 150px;">
		<table style="width:100%">
  <tr> 
  <th style="position: sticky; top: 0";>ID</th>
    <th style="position: sticky; top: 0";>Word</th>
	<th style="position: sticky; top: 0";>Translation</th>
  </tr>
  <tr>
   <td><?php for ($x = 1; $x <= count($wordsall); $x++) {
  echo "$x <br>";}
  ?> 
  </td>
    <td><?php foreach ($wordsall as $x) {
  echo "$x <br>";}?> 
  </td>
   <td><?php foreach ($translationall as $x) {
  echo "$x <br>";}?> 
  </td>
  </tr>
</table>
</div>
<div style="overflow-x:auto;overflow-y:scroll;height: 150px;">
<table style="width:100%">
  <tr> 
  <th style="position: sticky; top: 0";>ID</th>
    <th style="position: sticky; top: 0"; >Tag name</th>
  </tr>
  <tr>
   <td><?php for ($x = 1; $x <= count($tags); $x++) {
  echo "$x <br>";}
  ?> 
  </td>
    <td><?php foreach ($tags as $x) {
  echo "$x <br>";}?> 
  </td>
  </tr>
</table>
</div>
<div style="overflow-x:auto;overflow-y:scroll;height: 150px;">
<table style="width:100% ">
  <tr> 
  <th style="position: sticky; top: 0";>ID</th>
    <th style="position: sticky; top: 0";>Lithuanian Word</th>
    <th style="position: sticky; top: 0";>Translation</th>
	 <th style="position: sticky; top: 0";>Tag name</th>
	<th style="position: sticky; top: 0";>Word Id</th>
	<th style="position: sticky; top: 0";>Tag Id</th>
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
    <td><?php foreach ($tagsnames as $x) {
  echo "$x <br>";}?> 
  </td>
   <td><?php foreach ($wordtagsid as $x) {
  echo "$x <br>";}?> 
  </td>
  <td><?php foreach ($tagswordid as $x) {
  echo "$x <br>";}?> 
  </td>
  </tr>
</table>
</div>
    </div>

	
</body>

</html>
