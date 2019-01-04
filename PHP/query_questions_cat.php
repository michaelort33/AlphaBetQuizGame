<?php
//query for questions_cat.php
// Create connection

include("query_connection.php");


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else{
}

// take away the numQeustions parameter

$sub_cats=$_GET;
	if(isset($sub_cats["numQuestions"])){
		unset($sub_cats["numQuestions"]);
	}

//set conditions for categories

$cat_names = array_keys($sub_cats);

$conditions='';
$i=0;
foreach($sub_cats as $cat) {
	if ($i === 0) {
		$conditions=$conditions.' '.$cat_names[$i]." IN ".$cat;
		$i++;
	}else{
		$conditions=$conditions.' AND '.$cat_names[$i]." = ".$cat;
	}
}


$sql = 'SELECT myPath,Answ1,Answ2,Correct FROM aleph_bais WHERE'.' '.$conditions;

$result = mysqli_query($conn,$sql);	

//also pass a row count to java script
$rowcount=mysqli_num_rows($result);

$row=mysqli_fetch_all($result);

$conn->close();

?>