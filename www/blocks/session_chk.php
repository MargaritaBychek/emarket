<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if (isset($_SESSION['login'])) {

} else {
    $status = 2;
    echo "<script type='text/javascript'>window.location='login.php?status=$status'</script>";
}
?>
