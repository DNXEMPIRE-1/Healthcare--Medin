<?php
session_start();
include_once('includes/config.php');
session_unset();
session_destroy();
 echo "<script>window.location.href='index.php'</script>";

?>