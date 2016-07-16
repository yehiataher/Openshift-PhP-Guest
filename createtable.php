<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns=”http://www.w3.org/1999/ xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Create a Table</title>
</head>
<body>


<?php
$servername = "mysql";
$username = "root";
$password = "sausage";
$dbname = "myblog";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = 'CREATE TABLE entries (entry_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
		title VARCHAR(100) NOT NULL, entry TEXT NOT NULL, date_entered DATETIME NOT NULL)';

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table entries created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>
 </body>
 </html>
		