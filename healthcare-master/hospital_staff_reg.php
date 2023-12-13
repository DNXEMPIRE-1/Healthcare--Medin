<?php
    include("config.php");
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $hid = $_POST['hospital_id'];
    
    if($_POST["password"] == $_POST["repassword"]){
		$pass = $_POST["password"];
	}else{
		die("Passwords entered do not match");
	}
    
    $query = "INSERT INTO hospital_staff (hs_name, h_id, hs_email, hs_password_hash)
                VALUES ('$name', '$hid', '$email', '$pass')";
                
     $a = mysqli_query($conn, $query);
     if(!$a){
         die(mysqli_error($conn));
     }
    
    include("hospital_staff_login.php");
    mysqli_close($conn);
 ?>