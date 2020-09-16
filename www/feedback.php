<!DOCTYPE html>
<html>
<head>
<?php 
$title="WithConnect";
require_once "blocks/head.php";
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

    <body>
<div id="page-wrap"> 
<?php require_once "blocks/header.php"?>
<?php require_once "blocks/menu.php"?>
<div id="center">
    <div id="content">
        <br/><input type="text" placeholder="Subject" id="subject" name="msg">
         <br/><textarea name="msg" id="msg" placeholder="Yor message"></textarea>
         <br/><input type="button" name="done" id="done" value="Send">
    </div> 
    <?php require_once "blocks/advertising.php"?>
</div>
</div>
<?php require_once "blocks/footer.php"?>
    </body>
</html> 