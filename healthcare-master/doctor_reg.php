<?php
    include("config.php");
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $qualify = $_POST['qualifications'];
    
    if($_POST["password"] == $_POST["repassword"]){
		$pass = $_POST["password"];
	}else{
		die("Passwords entered do not match");
	}
    
    $qDoctor = "INSERT INTO doctor (d_name, d_email, d_phone, d_address, d_qualification, d_dob, d_password_hash)
                            VALUES('$name', '$email', '$phone', '$address', '$qualify', '$dob', '$pass')";
    
    $a = mysqli_query($conn,$qDoctor);
    if(!$a){
        die(mysqli_error($conn));
    }
    
    include("doctor_login.php");
    mysqli_close($conn);
    
?>