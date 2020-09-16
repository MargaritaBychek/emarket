<!DOCTYPE html>
<html>
    <head><?php 
$title="Add Good";
require_once "blocks/head.php";
?></head>

    <body>
<div id="page-wrap">
<?php require_once "blocks/header.php"?>
<?php require_once "blocks/menu.php"?>
<div id="center">
<div id="content">
<?php
    $item=$_GET['del'];
    include ("blocks/db.php");
    $result = mysqli_query($link,"SELECT * FROM goods WHERE id_good=$item");
    $arr = mysqli_fetch_array($result);
    ?>
<div class="item">
    <form name="itm_frm" action="edit_item_db.php?id=<?php echo $item?>" method="post" enctype="multipart/form-data" onsubmit="return validate_item(this)">
    <table>
        <tr>
            <td><label>Name</label></td>
            <td><input type="text" name="itm_name" value="<?= $arr['name']; ?>"></td>
        </tr>
        <tr>
            <td><label>Descryption</label></td>
            <td><input type="text" name="itm_desc" value="<?= $arr['descryption']; ?>"></td>
        </tr>
        <tr>
            <td><label>Brand</label></td>
            <td><select name="itm_brand">
            <?php
            include ("blocks/db.php");
            $x="SELECT * FROM brands";
            $res=mysqli_query($link,$x);
            while($rows = mysqli_fetch_array($res)){
            if($rows[0]==$arr['id_brand'])
                echo'<option value="'.$rows[0].'" selected="selected">'.$rows[1].'</option>';
            else
                echo'<option value="'.$rows[0].'">'.$rows[1].'</option>';
            }
            ?>
            </select>
            </td>
        </tr>
        <tr>
            <td><label>Year</label></td>
            <td><input type="text" name="itm_time" value="<?=$arr['year']; ?>"></td>
        </tr>

        <tr>
            <td><label>Price,$</label></td>
            <td><input type="text" name="itm_price" value="<?= $arr['price']; ?>"></td>
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
            {
                if($rows[0]==$arr['id_color'])
                    echo'<option value="'.$rows[0].'" selected="selected">'.$rows[1].'</option>';
                else
                    echo'<option value="'.$rows[0].'">'.$rows[1].'</option>';
                }
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
            while($rows = mysqli_fetch_array($res)){
                if($rows[0]==$arr['id_ram'])
                    echo'<option value="'.$rows[0].'" selected="selected">'.$rows[1].'</option>';
                else
                    echo'<option value="'.$rows[0].'">'.$rows[1].'</option>';
                }?>
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
            while($rows = mysqli_fetch_array($res)){
                if($rows[0]==$arr['id_storage'])
                    {echo'<option value="'.$rows[0].'" selected="selected">'.$rows[1].'</option>';
                    }
                else
                    echo'<option value="'.$rows[0].'">'.$rows[1].'</option>';
                }
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
    <input id="done" type="submit" name="sub" value="Edit">
    </form>
    </div>
</div>
<?php require_once "blocks/advertising.php"?>
</div>
</div>
<?php require_once "blocks/footer.php"?>
    </body>
</html> 