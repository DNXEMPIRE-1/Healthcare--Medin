<?php
    include("config.php");
    session_start();
    
    //  $user_type = $_SESSION['user_type'];
    
    // $user_email = $_SESSION['user_email'];
    
    // if($user_type == "patient"){
    //     $qSes = mysqli_query($conn, "SELECT p_email from patient where p_email = '$user_email'");    
    // }else if($user_type == "doctor"){
    //     $qSes = mysqli_query($conn, "SELECT d_email from doctor where d_email = '$user_email'");
    // }
   
    // $row = mysqli_fetch_array($qSes,MYSQLI_ASSOC);
    // $login_session = $row['p_email'];   
    
    // if($user_type == "hospital_staff"){
           
    //        if(!isset($_SESSION['hs_id'])){
    //         header("location: hospital_staff_login.php");
    //         }  
            
    //         $hs_id = $_SESSION['hs_id'];
    //         $qSes = mysqli_query($conn, "SELECT hs_id from doctor where hs_id = '$hs_id'");
    //         $row = mysqli_fetch_array($qSes,MYSQLI_ASSOC);
    //         $login_session = $row['hs_id'];
            
    // }  
    
    if($_SESSION['user_type'] != "hospital_staff"){
        header("location: hospital_staff_login.php");
    }
   
?>
