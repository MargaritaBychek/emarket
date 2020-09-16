<!DOCTYPE html>
<html>
    <head><?php 
$title="Add Good";
require_once "blocks/head.php";
?></head>

    <body>
    <?php
if ($_GET['status'] == 1) {
    echo "Succesfully added";
} elseif ($_GET['status'] == 2) {
    echo "Action Unsuccesful";
} elseif ($_GET['status'] == 3) {
    echo "Action unsuccessful(File related error)";
} else {
    echo "";
}?>
<div id="page-wrap">
<?php require_once "blocks/header.php"?>
<?php require_once "blocks/menu.php"?>
<div id="center">
<div id="content">
<div class="item">
    <form name="itm_frm" action="add_item_db.php?id=<?php echo $usr_id?>" method="post" enctype="multipart/form-data" onsubmit="return validate_item(this)">
    <table>
        <tr>
            <td><label>Name</label></td>
            <td><input type="text" name="itm_name"></td>
        </tr>
        <tr>
            <td><label>Descryption</label></td>
            <td><textarea type="text" name="itm_desc"></textarea></td>
        </tr>
        <tr>
            <td><label>Brand</label></td>
            <td><select name="itm_brand">
            <?php
            include ("blocks/db.php");
            $x="SELECT * FROM brands";
            $res=mysqli_query($link,$x);
            while($rows = mysqli_fetch_array($res))
            echo'
                <option value="'.$rows[0].'">'.$rows[1].'</option>';
            ?>
            </select>
            </td>
        </tr>
        <tr>
            <td><label>Year</label></td>
            <td><input type="text" name="itm_time"></td>
        </tr>

        <tr>
            <td><label>Price,$</label></td>
            <td><input type="text" name="itm_price"></td>
        </tr>
        </tr>

        <tr>
            <td><label>Color</label></td>
            <td><select name="itm_color">
            <?php
            include ("blocks/db.php");
            $x="SELECT * FROM colors";
            $res=mysqli_query($link,$x);
            while($rows = mysqli_fetch_array($res))
            echo'
                <option value="'.$rows[0].'">'.$rows[1].'</option>';
            ?>
                </select>
            </td>
        </tr>

        <tr>
        <td><label>RAM</label></td>
            <td><select name="itm_ram">
            <?php
            include ("blocks/db.php");
            $x="SELECT * FROM rams";
            $res=mysqli_query($link,$x);
            while($rows = mysqli_fetch_array($res))
            echo'
                <option value="'.$rows[0].'">'.$rows[1].'</option>';
            ?>
                </select>
            </td>
        </tr>

        <tr>
        <td><label>Storage</label></td>
            <td><select name="itm_stor">
            <?php
            include ("blocks/db.php");
            $x="SELECT * FROM storages";
            $res=mysqli_query($link,$x);
            while($rows = mysqli_fetch_array($res))
            echo'
                <option value="'.$rows[0].'">'.$rows[1].'</option>';
            ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Main Photo</label></td>
            <td><input type="file" name="itm_img" value="Choose file"></td>
        </tr>
        <tr>
            <td><label>Small photos</label></td>
            <td><input type="file" name="itm_s_img1"></td>
        </tr>
        <tr>
            <td><label>Small photos</label></td>
            <td><input type="file" name="itm_s_img2"></td>
        </tr>
        <tr>
            <td><label>Small photos</label></td>
            <td><input type="file" name="itm_s_img3"></td>
        </tr>
    </table>
    <input id="done" type="submit" name="sub" value="Insert">
    </form>
    </div>
</div>
<?php require_once "blocks/advertising.php"?>
</div>
</div>
<?php require_once "blocks/footer.php"?>
    </body>
</html> 