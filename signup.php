<?php
	
	include("connection.php");
	
	$checking_email=$connection->prepare("select * from users ");
	$checking_email->execute();
	$result = $checking_email->get_result();
	
	
	while($row = $result->fetch_assoc())
	{
		
			if ($_POST["email"] === $row["email"] ){
				
				echo  ' <a href="signup.html">Click here to go back </a> <br ><br>';
				die("please Enter another email this email already exists");
				
				
			}
	
		
	
	}
	if(isset($_POST["user"]) && $_POST["user"] != ""){
		$full_name = $_POST["user"];
	}else{
		die("please Try again ;)");
	}
	
	
	if(isset($_POST["gender"]) && $_POST["gender"] != ""){
		$gender = $_POST["gender"];
	}else{
		die("please Try again ;)");
	}


		
	if(isset($_POST["email"]) && $_POST["email"] != ""){
		$email = $_POST["email"];
	}else{
		die("please Try again ;)");
	}

	if(isset($_POST["pass"]) && $_POST["pass"] != ""){
		$password = hash('sha256', $_POST['pass']);
	}else{
		die("Please Try again ;)");
	}
	$is_admin = 0;
	
	$x = $connection->prepare("INSERT INTO users (full_name,email, password,gender, is_admin) VALUES (?,?,?, ?, ?)");
	$x->bind_param("ssssi",$full_name, $email, $password,$gender, $is_admin);
	$x->execute();
	
	$x->close();
	$connection->close();
	header("Location:index.html");
	
?>