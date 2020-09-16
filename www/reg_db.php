<?php
require ("blocks/db.php");
$login = $_POST['user_login'];
$password = md5(md5(trim($_POST['usr_pass'])));
//$password=$_POST['password'];
$q="INSERT INTO users SET user_login='".$login."', user_password='".$password."'";
$result = mysqli_query($link,$q);
if ($result) {
    $status = 1;
} else {
    $status = 2;
}
mysqli_close($link);
?>
<script type='text/javascript'>
    window.location='reg.php?status=<?php echo $status; ?>';
</script>




