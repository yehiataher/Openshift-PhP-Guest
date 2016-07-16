<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Add a Blog Entry</title>
</head>
<body>

<?php
$servername = "mysql";
$username = "root";
$password = "sausage";
$dbname = "myblog";

if (isset($_POST['submitted']))
{
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $problem = FALSE;
if (!empty($_POST['title']) && !empty($_POST['entry'])) {
$title = trim($_POST['title']);
$entry = trim($_POST['entry']);} 

else {
	print '<p style="color: red;">Please submit both a title and an entry.</p>';
	 $problem = TRUE;
	 }
	 if (!$problem) {
		 // Define the query:
		$sql = "INSERT INTO entries (entry_id, title, entry, date_entered) 
		VALUES (0, '$title', '$entry', NOW( ))";
		 
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

}
?>
		<form action="add_entry.php" method="post">
				 <p>Entry Title: <input type="text" name="title" size="40" maxsize="100"/></p>
				 <p>Entry Text: <textarea name="entry" cols="40" rows="5"></textarea></p>
				 <input type="submit" name="submit" value="Post This Entry!"/>
	 			 <input type="hidden" name="submitted" value="true" />
	  	</form>
  
  </body>

</html>