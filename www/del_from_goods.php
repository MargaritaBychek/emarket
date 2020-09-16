<?php
if (isset($_GET['del']))
{
include ("blocks/db.php");
$del = (int)$_GET['del'];
$res=mysqli_query($link,"DELETE FROM cart WHERE id_good=$del");
$result=mysqli_query($link,"DELETE FROM goods WHERE id_good=$del");
if($result)
    echo "<script type='text/javascript'>window.location='goods.php'</script>";
}
?>