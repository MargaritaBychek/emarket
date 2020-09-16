<?php
require ("blocks/db.php");
/*never ever add session checking pages in the login working page.....*/
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}
    $login=$_POST['user_login'];
    $pwd = $_POST['usr_pass'];
    $query = mysqli_query($link,"SELECT user_id, user_password FROM users WHERE user_login='".mysqli_real_escape_string($link,$_POST['user_login'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);
    if($data['user_password'] === md5(md5(trim($_POST['usr_pass'])))){
        echo "ok";
        $hash = md5(generateCode(10));
        $insip = ", user_ip='".$_SERVER['REMOTE_ADDR']."'";
        print $_SERVER['REMOTE_ADDR'];
        mysqli_query($link, "UPDATE users SET user_hash='".$hash."' ".$insip." WHERE user_id='".$data['user_id']."'");
            session_start();
            $_SESSION['login_user'] = $login or die("Error");
            echo "<script type='text/javascript'>window.location='index.php'</script>"; 
    }
    else {
        echo $data['user_password'];
        echo "_____________";
        echo md5(md5(trim($_POST['usr_pass'])));
        $status = 1;
        //echo "<script type='text/javascript'>window.location='login.php?status=$status'</script>";
    }
?>