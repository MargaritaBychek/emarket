<!DOCTYPE html>
<html>
<head>
<?php 
$title="WithConnect";
require_once "blocks/head.php";
?>
</head>

    <body>
<div id="page-wrap"> 
<?php require_once "blocks/header.php";
require_once "blocks/menu.php"?>
<?php
if ($_GET['status'] == 1) {
    echo "Invalid login or password";
} elseif ($_GET['status'] == 2) {
    echo "LOGIN first!";
} else {
}
?>
<div id="center">
    <div id="content">
        <div class="auth">
    <form name="login_frm" method="POST" action="login_db.php" onsubmit="return validate_login(this)">
    <br/><input name="user_login" type="text" class="form-control" placeholder="Username" required>
        <br/><input name="usr_pass" type="password" class="form-control" placeholder="Password" required>
        <input id="done" type="submit" name="submit" value="Log In">
    </form>
    </div>
</div> 
    <?php require_once "blocks/advertising.php"?>
</div>
</div>
<?php require_once "blocks/footer.php"?>
    </body>
</html> 