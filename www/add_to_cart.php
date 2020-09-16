<?php
if (isset($_GET['a']))
{
    $id_good=$_GET["a"];
    include ("blocks/db.php");
    if(!isset($_SESSION)) 
                { 
                    session_start();
                }   
     if (isset($_SESSION['login_user'])) {
            $log=$_SESSION['login_user'];
        }
    $query = mysqli_query($link,"SELECT * FROM users WHERE user_login='".$log."'");
    $data = mysqli_fetch_array($query);
    $ch="SELECT * FROM cart WHERE user_id='".$data[0]."' AND id_good='".$id_good."'";
    $check=mysqli_query($link,$ch);
    if(mysqli_num_rows($check)>0)
    {
        echo '<script language="javascript">';
      echo 'alert("Already here!")';
      echo '</script>';
        echo "<script type='text/javascript'>window.location='index.php'</script>";
    }
    else{
        $r="INSERT INTO cart SET user_id='".$data[0]."',id_good='".$id_good."'";
        $q=mysqli_query($link,$r);
        if($q)
        {
            echo '<script language="javascript">';
             echo 'alert("Added successfully!")';
            echo '</script>';
            echo "<script type='text/javascript'>window.location='cart.php'</script>";
        }
    }
    mysqli_close($link);
}