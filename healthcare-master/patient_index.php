<!DOCTYPE html>
<?php 
include('session_patient.php'); ?>
<html>
<head>
	<title>Healthcare</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Welcome <?php echo $_SESSION["user_name"] ?></a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="dropdown">
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">View Details<span class="caret"></span></a>
	          <ul class="dropdown-menu"> 
	            <li><a href="view_test_results.php">Test results</a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="view_prescriptions.php">Prescriptions</a></li>
	            </ul>
	        </li>
	      </ul>
				
	      <ul class="nav navbar-nav navbar-right">
	        <li class="dropdown">
	          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"style="padding-left:750px">Settings<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="logout.php">Log Out</a></li>
            </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav><!-- 
	<a href="./doctor_reg.html">Sign up</a>
	<a href="./doctor_login.html">Log in</a>

	<a href="./patient_reg.html">Sign up</a>
	<a href="./patient_login.html">Log in</a> -->
	  <?php
            include("config.php");
            $id = $_SESSION['user_id'];
            $a = mysqli_query($conn,"SELECT * from patient where p_id = '$id'");
            if(!$a || mysqli_num_rows($a) == 0){
                echo "NOT FOUND";
            }else{
                
            $row = mysqli_fetch_array($a,MYSQLI_ASSOC);                    
    ?>   
    
  <div class="container">
  <table class="table table-striped">
    <tbody>
      <tr>
        <td>ID</td>
        <td><?php echo $row['p_id']; ?></td>
      </tr>
      <tr>
        <td>Name</td>
        <td><?php echo $row['p_name']; ?></td>
      </tr><tr>
        <td>Email</td>
        <td><?php echo $row['p_email']; ?></td>
      </tr><tr>
        <td>Phone</td>
        <td><?php echo $row['p_phone']; ?></td>
      </tr><tr>
        <td>Height</td>
        <td><?php echo $row['p_height']; ?></td>
      </tr><tr>
        <td>Weight</td>
        <td><?php echo $row['p_weight']; ?></td>
      </tr>
    </tbody>
  </table>
  </div>
	<?php } ?>
	
</body>
</html>