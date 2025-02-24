<?php
$username= $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
$conn = new mysqli('localhost','root','','database');
if($conn->connect_error){
    die("Connection failed".$conn->connect_error);
}
else{
	$stmt = $conn->prepare("insert into register(username, email, password, confirmpassword) 
		values(?, ?, ?, ?)");
	$stmt->bind_param("ssss",$username, $email, $password, $confirmpassword);
	$stmt->execute();
	echo "registration successfull";
	$stmt->close();
	$conn->close();
}
?>