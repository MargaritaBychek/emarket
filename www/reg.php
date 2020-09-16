<!DOCTYPE html>
<html>
<head>
<?php 
$title="WithConnect";
require_once "blocks/head.php";
?>
<script src="js/jquery-3.4.1.min.js"></script>

</head>

<body>
<?php
if ($_GET['status'] == 1) {
    echo "Registration Successful";
} elseif ($_GET['status'] == 2) {
    echo "Registration unsuccessful";
} else {
    echo "";
}
?>
<div id="page-wrap"> 
<?php require_once "blocks/header.php"?>
<?php require_once "blocks/menu.php"?>
<div id="center">
    <div id="content">
    <form name="reg_frm" method="post" action="reg_db.php" onsubmit="return validate_registration(this);">
        <br/><input type="text" name="user_login" placeholder="Username" required>
        <br/><input type="password" name="usr_pass" placeholder="Password" required>
        <br/><input type="password" name="c_pass" placeholder="Confirm password" required>
        <br/><input type="text" name="email" placeholder="Email" required>
        <br/><input id="done" type="submit" name="submit" value="Send">
        </form>
    </div> 
    <?php require_once "blocks/advertising.php"?>
</div>
</div>
<?php require_once "blocks/footer.php"?>
    </body>
</html> 