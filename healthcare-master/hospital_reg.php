<?php
    include("config.php");
    
    $name = $_POST['hospital_name'];
    $location = $_POST['location'];
    $id = $_POST['hospital_id'];
        
    if($_POST["password"] == $_POST["repassword"]){
		$pass = $_POST["password"];
	}else{
		die("Passwords entered do not match");
	}
    
    $qDoctor = "INSERT INTO hospital (h_name, h_location, h_password_hash, h_id)
                            VALUES('$name', '$location', '$pass', '$id')";
    
    $a = mysqli_query($conn,$qDoctor);
    if(!$a){
        die(mysqli_error($conn));
    }
    
    include("index.html");
    
    mysqli_close($conn);
    
?>