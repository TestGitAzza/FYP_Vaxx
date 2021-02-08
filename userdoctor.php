<?php
include_once "header.php";
if ($_SESSION['user_role'] != "Admin") {
  // header('location: index.php');
}


$id = $_POST['id'];

$sql = "INSERT INTO doctor (fullname, gender, birthday, address, parents, mykid, placebirth, nationality, phone) VALUES ('$fullname','$gender','$birthday','$address', '$parents','$mykid', '$placebirth', '$nationality', '$phone')";
?>