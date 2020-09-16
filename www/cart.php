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
<?php
include ("blocks/db.php");
$u=mysqli_query($link,"SELECT * FROM users WHERE user_login='$log' LIMIT 1;");
$usr=mysqli_fetch_array($u);
$result = mysqli_query($link,"SELECT * FROM goods INNER JOIN cart ON goods.id_good=cart.id_good where cart.user_id=$usr[0]");
while($rows = mysqli_fetch_array($result)){
    $del=$rows["id_good"];
    echo '<div class="product"> <div class="photo"> <img src='.$rows["main_photo"].' alt="product" title="+"/></div>
        <div class="name"> <a href="product-about.php?id='.$rows["id_good"].'" title="name"> <h2>'.$rows["name"].'</h2></a>
    </div>
    <div class="icons">
    <a name="del" href="del_from_cart.php?del='.$del.'"><img src="img/icons/delete.png" alt="Cart" title="Delete from Cart"/></a> 
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