<!DOCTYPE html>
<html>
    <head><?php 
$title="About us";
require_once "blocks/head.php";
?></head>
    <body>
<div id="page-wrap"> 
<?php require_once "blocks/header.php"?>
<?php require_once "blocks/menu.php"?>
<div id="center">
     <div id="content"> 
     <?php
        if(isset($_SESSION['login_user']))
        {
        ?>
        <legend>Are you sure you want to logout?</legend>
        <table>
            <tr><ul>
                <td><li><a href="index.php">I can't quit at this moment!</a></li></td>
                    <td><li><a href="blocks/session_end.php">But I am too tired to continue...</a></li>
                    </td>
            <ul></tr>
        </table>
        <?php
        }
        else
        {
            echo "<legend>You can't log out!</legend>";
            echo "You Gotta login first!";
        }
?>
<?php require_once "blocks/advertising.php"?>
</div>
</div>
<?php require_once "blocks/footer.php"?>
    </body>
</html> 