<?php
require ("blocks/db.php");
$item=$_GET['id'];
        $q2 = "UPDATE goods SET name='$_POST[itm_name]',descryption='$_POST[itm_desc]', id_brand='$_POST[itm_brand]',
        year='$_POST[itm_time]', id_color='$_POST[itm_color]',
        id_ram='$_POST[itm_ram]', id_storage='$_POST[itm_stor]',price='$_POST[itm_price]' WHERE id_good=$item";
        $result2 = mysqli_query($link, $q2) or die(mysqli_error());
        if (($_FILES["itm_img"]["type"] == "image/png" ||
        $_FILES["itm_img"]["type"] == "image/jpeg" ||
            $_FILES["itm_img"]["type"] == "image/gif"
            ) && ($_FILES["itm_img"]["size"] < 2000000)) {
        move_uploaded_file($_FILES['itm_img']['tmp_name'], "img/db/" . $_FILES['itm_img']['name']);
        $loc = "img/db/" . $_FILES['itm_img']['name'];
        $q2 = "UPDATE goods SET main_photo='$loc' WHERE id_good=$item";
        $result2 = mysqli_query($link, $q2) or die(mysqli_error());
            }
            if (($_FILES["itm_s_img1"]["type"] == "image/png" ||
                $_FILES["itm_s_img1"]["type"] == "image/jpeg" ||
                    $_FILES["itm_s_img1"]["type"] == "image/gif" ||
                    $_FILES["itm_s_img1"]["type"] == "image/jpg"
                    ) && ($_FILES["itm_s_img1"]["size"] < 2000000)) {
                move_uploaded_file($_FILES['itm_s_img1']['tmp_name'], "img/db/" . $_FILES['itm_s_img1']['name']);
                $loc1 = "img/db/" . $_FILES['itm_s_img1']['name'];
                $q2 = "UPDATE goods SET small_photo1='$loc1' WHERE id_good=$item";
                 $result2 = mysqli_query($link, $q2) or die(mysqli_error());
            }
        if (($_FILES["itm_s_img2"]["type"] == "image/png" ||
                $_FILES["itm_s_img2"]["type"] == "image/jpeg" ||
                    $_FILES["itm_s_img2"]["type"] == "image/gif" ||
                    $_FILES["itm_s_img2"]["type"] == "image/jpg"
                    ) && ($_FILES["itm_s_img2"]["size"] < 2000000)) {
                move_uploaded_file($_FILES['itm_s_img2']['tmp_name'], "img/db/" . $_FILES['itm_s_img2']['name']);
                $loc2 = "img/db/" . $_FILES['itm_s_img2']['name'];
                $q2 = "UPDATE goods SET small_photo2='$loc2' WHERE id_good=$item";
                 $result2 = mysqli_query($link, $q2) or die(mysqli_error());
        }
        if (($_FILES["itm_s_img3"]["type"] == "image/png" ||
            $_FILES["itm_s_img3"]["type"] == "image/jpeg" ||
                $_FILES["itm_s_img3"]["type"] == "image/gif" ||
                $_FILES["itm_s_img3"]["type"] == "image/jpg"
                ) && ($_FILES["itm_s_img3"]["size"] < 2000000)) {
            move_uploaded_file($_FILES['itm_s_img3']['tmp_name'], "img/db/" . $_FILES['itm_s_img3']['name']);
            $loc3 = "img/db/" . $_FILES['itm_s_img3']['name'];
            $q2 = "UPDATE goods SET small_photo3='$loc3' WHERE id_good=$item";
                 $result2 = mysqli_query($link, $q2) or die(mysqli_error());
        }
        if ($result2) {
            mysqli_close($link);
            echo '<script type="text/javascript">
            window.location="edit_good.php?del='.$item.'"
            </script>';
        } else {
            echo '<script language="javascript">';
             echo 'alert("Something wrong!")';
            echo '</script>';
            mysqli_close($link);
            echo '<script type="text/javascript">
            window.location="edit_good.php?del='.$item.'"</script>';
} 