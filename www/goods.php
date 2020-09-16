<!DOCTYPE html>
<html>
    <head><?php 
$title="WithConnect";
require_once "blocks/head.php";
?></head>

    <body>
<div id="page-wrap">
<?php require_once "blocks/header.php"?>
<?php require_once "blocks/menu.php"?>
<div id="center">
<div id="content">
<div class="icons">
<a name="add" href="add_good.php?status=0"><img src="img/icons/add.png" alt="Cart" title="Cart"/></a> 
</div>
        
<?php
include ("blocks/db.php");
$result = mysqli_query($link,"SELECT * FROM goods WHERE added='".$usr_id."'");
while($rows = mysqli_fetch_array($result)){
    $del=$rows["id_good"];
        echo '<div class="product"> <div class="photo"> <img src='.$rows["main_photo"].' alt="product" title="+"/></div>
            <div class="name"> <a href="product-about.php?id='.$rows["id_good"].'" title="name"> <h2>'.$rows["name"].'</h2></a>
        </div>
        <div class="icons">
        <a name="del" href="del_from_goods.php?del='.$del.'"><img src="img/icons/delete.png" alt="Cart" title="Cart"/></a> 
            <a name="edit" href="edit_good.php?del='.$del.'"><img src="img/icons/edit.png" alt="Cart" title="Cart"/></a> 
        </div>
        </div> ';           
}
mysqli_close($link);
?>

</div>
<?php require_once "blocks/advertising.php"?>
</div>
</div>
<?php require_once "blocks/footer.php"?>
    </body>
</html> 