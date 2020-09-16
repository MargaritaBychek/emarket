<?php
if (isset($_GET['del']))
{
    include ("blocks/db.php");
    if(!isset($_SESSION)) 
                { 
                    session_start();
                }   
     if (isset($_SESSION['login_user'])) {
            $log=$_SESSION['login_user'];
        }
    $u=mysqli_query($link,"SELECT * FROM users WHERE user_login='$log' LIMIT 1;");
    $usr=mysqli_fetch_array($u);
$del = (int)$_GET['del'];
$result=mysqli_query($link,"DELETE FROM cart WHERE id_good=$del AND user_id=$usr[0]");
if($result)
    echo "<script type='text/javascript'>window.location='cart.php'</script>";
}
?>