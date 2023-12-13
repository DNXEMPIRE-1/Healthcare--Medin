<?php include_once('includes/config.php');
if(isset($_POST['submit'])){
$fname=$_POST['fullname'];    
$mno=$_POST['mobilenumber'];   
$location=$_POST['location'];   
$message=$_POST['message'];   
$query=mysqli_query($con,"INSERT INTO `tblfirereport`( `fullName`, `mobileNumber`, `location`, `messgae`) VALUES ('[$fname]','[$mno]','[$location]','[$message]')");
if($query){
echo "<script>alert('Reporting successfull');</script>";
echo "<script>window.location.href ='reporting.php'</script>";
} else {
echo "<script>alert('Something went wrong. Please try again.');</script>";
echo "<script>window.location.href ='reporting.php'</script>";
}
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>OFMS | Reporting</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
<?php include_once('includes/header.php') ?>
        <!-- Page Content-->
        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                <div class="col-lg-12"><img class="img-fluid rounded mb-4 mb-lg-0" src="assets/6094899.jpg" alt="..." /></div>
         
            </div>

            <!-- Content Row-->
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-12 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Online Fire Report</h2>

<form method="post">
  <table class="table table-bordered">

    <tbody>
      <tr>
        <th>Name</th>
        <td><input type="text" name="fullname" class="form-control" required></td>
      </tr>
      <tr>
        <th>Mobile Number</th>
        <td><input type="text" name="mobilenumber" class="form-control" required></td>
      </tr>
      <tr>
        <th>Location</th>
        <td><textarea class="form-control" required name="location"></textarea></td>
      </tr>

          <tr>
              <th>Message (if Any)</th>
              <td><textarea class="form-control" required name="message"></textarea></td>
          </tr>

          <tr>
              <td></td>
              <td><input type="submit" name="submit" class="btn btn-primary"></td>
          </tr>

    </tbody>
  </table>
</form>                        
</div>
                    </div>
                </div>
       
            </div>
        </div>
        <!-- Footer-->
<?php include_once('includes/footer.php') ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
