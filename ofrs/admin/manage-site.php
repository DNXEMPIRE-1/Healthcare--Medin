<?php session_start();
error_reporting(0);
//DB conncetion
include_once('includes/config.php');
//validating Session
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{


    if(isset($_POST['submit']))
  {
    $wtitle=$_POST['webtitle'];
   $cphoto=$_POST['currentphoto'];
   $imgfile=$_FILES["image"]["name"];
   $currentppath="uploadeddata"."/".$cphoto;
// get the image extension
$extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
$uname=$_SESSION['uname'];     
$uip = $_SERVER ['REMOTE_ADDR'];
$link= $_SERVER['REQUEST_URI'];
$action='Manage Site';

if(!in_array($extension,$allowed_extensions))
{
$status=0;
mysqli_query($con,"insert into  tbllogs(userName,userIp,userAction,actionUrl,actionStatus) values('$uname','$uip','$action','$link','$status')") ;   
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//rename the image file
$imgnewfile=md5($imgfile).$extension;
// Code for move image into directory
move_uploaded_file($_FILES["image"]["tmp_name"],"uploadeddata/".$imgnewfile);
   
$sql=mysqli_query($con,"update tblsite set siteLogo='$imgnewfile',siteTitle='$wtitle'");
unlink($currentppath);
  $status=1;
      mysqli_query($con,"insert into  tbllogs(userName,userIp,userAction,actionUrl,actionStatus) values('$uname','$uip','$action','$link','$status')");
echo "<script>alert('Website Details Updated');</script>";
//echo "<script>window.location.href='manage-employee.php'</script>";
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Manage Website</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
<style type="text/css">
label{
    font-size:16px;
    font-weight:bold;
    color:#000;
}

</style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

<?php include_once('includes/sidebar.php');?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
          <?php include_once('includes/topbar.php');?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Manage Website</h1>
     <form method="post" enctype="multipart/form-data">

<?php 
$query=mysqli_query($con,"select * from tblsite");
while($row=mysqli_fetch_array($query)){ 
    ?>

  <div class="row">

                        <div class="col-lg-10">

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
<input type="hidden" name="currentphoto" value="<?php echo $row['siteLogo'];?>">                      
   <div class="card-body">
   <div class="form-group">
                        <label for="inputSubject">Current Logo</label>
                      <img src="uploadeddata/<?php echo $row['siteLogo'];?>" width="250">
                    </div>

                                   
                    <div class="form-group">
                        <label for="inputSubject">Website Title</label>
                        <input class="form-control" id="webtitle" name="webtitle" required="true" value="<?php echo $row['siteTitle'];?>">  
                    </div>
            
     
      <div class="form-group">
                        <label for="inputSubject">Website Logo</label>
                       <input type="file" name="image"  required class="form-control" />
<small style="color:red;">Only jpg / jpeg/ png /gif format allowed.</small>
                   </td>
<?php } ?>
        <div class="form-group">
                                 <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" id="submit" value="Update">                           
                             </div>                                        

                                </div>

                            </div>


                        </div>

               

                    </div>

</form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           <?php include_once('includes/footer.php');?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->

           <?php include_once('includes/footer2.php');?>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
</html>
<?php } ?>