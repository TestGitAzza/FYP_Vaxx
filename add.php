

<head>
<title>Course Info</title>
</head>
<body>
<form method="post" action="add.php">
<h2>Course Information</h2>
<p>Course Code: <input type="text" name="title" required/></p>
<p>Course Name: <input type="text" name="descr" required/></p>
<input type="submit" name="submit" value="Submit Information"/>
</form>

<?php
// Creating database connection
$dbc = new mysqli("localhost", "root", "", "vaccination");
// Checking dbcection
if($dbc == false) {
die("ERROR: Could not connect. " . $dbc->connect_error ); 
}


$errors = array();
$title = ($_POST["title"]);
$descr = ($_POST["descr"]);
$sql = "INSERT INTO testcalendar (title, descr) VALUES ('$title', '$descr')";
if ($dbc->query($sql) == true) {
echo "Records inserted succesfully.";
} else {
echo "ERROR: Could not able to execute $sql . " . $dbc->error;
}

// Close connection
$dbc->close();
?>
</body>
