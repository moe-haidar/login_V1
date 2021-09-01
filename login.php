<?php

include("connection.php");


	if(isset($_POST["email"]) && $_POST["email"] != ""){
		$email = $_POST["email"];
	}else{
		die("please Try again ,email is required;)");
	}
	
	
	if(isset($_POST["password"]) && $_POST["password"] != ""){
		$password = hash('sha256', $_POST['password']);
	}else{
		die("please Try again , password is required;)");
	}
	
	
		
			$checking= $connection->prepare("select * from users where email=? and password=?");
			$checking->bind_param("ss",$email,$password);
			$checking->execute();

			$result = $checking->get_result();
			$row = $result->fetch_assoc();
			$_SESSION['gender']=$row['gender'];
			$_SESSION['full_name']=$row['full_name'];
			
			
			$checking_email= $connection->prepare("select email  from users where email=? ");
			$checking_email->bind_param("s",$email);
			$checking_email->execute();
			$result2 = $checking_email->get_result();
			$row2 = $result2->fetch_assoc();
			
			
			
						if( isset($row["email"])   && isset($row["password"])    )  {
							
							
							header("Location:home.php");
																
						}
						else if (isset($row2["email"])){
							
							
							 header("Location:index.html");
						}
						
						else{
							
							header("Location:signup.html");
						}
							
							
							
							
						
							
				
		
	
	
?>