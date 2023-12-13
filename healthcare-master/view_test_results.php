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
	          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings <span class="caret"></span></a>
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
   $q2 = mysqli_query($conn,"SELECT * from test where p_id = '$id'");
  echo "<h2>TESTS</h2>";
    while($row = mysqli_fetch_array($q2,MYSQLI_ASSOC)){
        
  ?>
    <div class="container">
  <table class="table table-striped">
    <tbody>
      <tr>
        <td>ID</td>
        <td><?php echo $row['test_id']; ?></td>
      </tr>
      <tr>
        <td>Test Name</td>
        <td><?php echo $row['test_name']; ?></td>
      </tr><tr>
        <td>Test Result</td>
        <td><?php echo $row['test_result']; ?></td>
      </tr><tr>
        <td>Test Report</td>
        <td><?php echo $row['test_report']; ?></td>
      </tr><tr>
        <td>Prescription ID</td>
        <td><?php echo $row['pres_id']; ?></td>
      </tr>
      </tr><tr>
        <td>Doctor ID</td>
        <td><?php echo $row['d_id']; ?></td>
      </tr>
    </tbody>
  </table>
  </div>
	<?php }} ?>
	
</body>
</html>