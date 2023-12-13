<!DOCTYPE html>
<?php 
include('session_doctor.php'); ?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Healthcare</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
		<nav class="navbar navbar-default"style="height:15px">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="index.html">Healthcare</a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Upload <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="prescription.php">Prescription</a></li>
	            <li role="separator" class="divider"></li>
							<li><a href="test_upload.php">Test Request</a></li>	
	            <li><a href="test_upload.php">Test Results</a></li>
	            </ul>
	        </li>
	      </ul>
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Patient Info <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	          	<li><a href="view_patient.php">View Patient</a></li>
	             <li><a href="patient_reg.html">Register Patient</a></li>                          
	            </ul>
                </li>
	      </ul>
          </div>
					
					<p style = "text-align: center;font-size:20px"> <b> Dr. <?php echo $_SESSION['user_name']; ?> </b></p>


	      <ul class="nav navbar-nav navbar-right">
	        <li class="dropdown">
	          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"style="margin-top:-85px">Settings <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="logout.php">Log Out</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
    <div class = "col-mod-12">
    <form class="navbar-form" role="search" action = "#" method = "GET">
    <div class="input-group add-on">
      <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
      </div>
    </div>
    </div>
  </form>
  <?php
        if(isset($_GET['srch-term'])){
            include("config.php");
            $id = $_GET['srch-term'];
            
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
  <?php
    $q1 = mysqli_query($conn,"SELECT * from prescription where p_id = '$id'");
    $q2 = mysqli_query($conn, "SELECT * from test where p_id = '$id'");
    
    echo "<h2>PRESCRIPTIONS</h2>";
    while($row = mysqli_fetch_array($q1,MYSQLI_ASSOC)){
        
  ?>
    <div class="container">
  <table class="table table-striped">
    <tbody>
      <tr>
        <td>ID</td>
        <td><?php echo $row['pres_id']; ?></td>
      </tr>
      <tr>
        <td>Diagnosis</td>
        <td><?php echo $row['diagnosis']; ?></td>
      </tr><tr>
        <td>Symptoms</td>
        <td><?php echo $row['symptoms']; ?></td>
      </tr><tr>
        <td>Test Needed</td>
        <td><?php echo $row['test_needed']; ?></td>
      </tr><tr>
        <td>Medication</td>
        <td><?php echo $row['medication']; ?></td>
      </tr>
    </tbody>
  </table>
  </div>
  <?php }   
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
  <?php } ?>
  <?php }} ?>
  
  

</body>
</html>