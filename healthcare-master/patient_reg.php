<?php
	
	include("config.php");
	
	$name = $_POST["name"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$dob = $_POST["dob"];
	$address = $_POST["address"];
	$height = $_POST["height"];
	$weight = $_POST['weight'];
	$gender = $_POST["gender"];
	if($_POST["password"] == $_POST["repassword"]){
		$pass = $_POST["password"];
	}else{
		die("Passwords entered do not match");
	}
	
	if($_POST["ec_name"] != null){
		
		$ec_name = $_POST["ec_name"];
		$ec_phone = $_POST["ec_phone"];
		$qContact = "INSERT INTO emergency_contact (ec_name, ec_phone) VALUES ('$ec_name','$ec_phone')";
		
		$a = mysqli_query($conn,$qContact);
		if(!$a){
			die(mysqli_error($conn));
		}
		$ec_id = mysqli_insert_id($conn);

		$qPatient = "INSERT INTO patient (p_name, p_email, p_phone, p_gender, p_dob, p_height, p_weight, p_password_hash, ec_id) 
						   VALUES ('$name','$email','$phone','$gender','$dob','$height','$weight','$pass','$ec_id')";						   
	}else{
		$qPatient = "INSERT INTO patient (p_name, p_email, p_phone, p_gender, p_dob, p_height, p_weight, p_password_hash) 
						   VALUES ('$name','$email','$phone','$gender','$dob','$height','$weight','$pass')";
	}
	
	$a = mysqli_query($conn,$qPatient);
	if(!$a){
		die(mysqli_error($conn));
	}
	
	include("patient_login.php");
	mysqli_close($conn);
?>