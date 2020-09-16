<?php
require ("blocks/db.php");
$usr_id=$_GET['id'];
if ($_FILES["itm_img"]["error"] == 0) {
    if (($_FILES["itm_img"]["type"] == "image/png" ||
        $_FILES["itm_img"]["type"] == "image/jpeg" ||
            $_FILES["itm_img"]["type"] == "image/gif" ||
            $_FILES["itm_img"]["type"] == "image/jpg"
            ) && ($_FILES["itm_img"]["size"] < 2000000)) {
        move_uploaded_file($_FILES['itm_img']['tmp_name'], "img/db/" . $_FILES['itm_img']['name']);
        $loc = "img/db/" . $_FILES['itm_img']['name'];
        if($_FILES["itm_s_img1"]["error"] == 0)
                $loc1=NULL;
        if($_FILES["itm_s_img2"]["error"] == 0)
                $loc2=NULL;
        if($_FILES["itm_s_img3"]["error"] == 0)
                $loc3=NULL;
        if (($_FILES["itm_s_img1"]["type"] == "image/png" ||
                $_FILES["itm_s_img1"]["type"] == "image/jpeg" ||
                    $_FILES["itm_s_img1"]["type"] == "image/gif" ||
                    $_FILES["itm_s_img1"]["type"] == "image/jpg"
                    ) && ($_FILES["itm_s_img1"]["size"] < 2000000)) {
                move_uploaded_file($_FILES['itm_s_img1']['tmp_name'], "img/db/" . $_FILES['itm_s_img1']['name']);
                $loc1 = "img/db/" . $_FILES['itm_s_img1']['name'];
            }
        if (($_FILES["itm_s_img2"]["type"] == "image/png" ||
                $_FILES["itm_s_img2"]["type"] == "image/jpeg" ||
                    $_FILES["itm_s_img2"]["type"] == "image/gif" ||
                    $_FILES["itm_s_img2"]["type"] == "image/jpg"
                    ) && ($_FILES["itm_s_img2"]["size"] < 2000000)) {
                move_uploaded_file($_FILES['itm_s_img2']['tmp_name'], "img/db/" . $_FILES['itm_s_img2']['name']);
                $loc2 = "img/db/" . $_FILES['itm_s_img2']['name'];
        }
        if (($_FILES["itm_s_img3"]["type"] == "image/png" ||
            $_FILES["itm_s_img3"]["type"] == "image/jpeg" ||
                $_FILES["itm_s_img3"]["type"] == "image/gif" ||
                $_FILES["itm_s_img3"]["type"] == "image/jpg"
                ) && ($_FILES["itm_s_img3"]["size"] < 2000000)) {
            move_uploaded_file($_FILES['itm_s_img3']['tmp_name'], "img/db/" . $_FILES['itm_s_img3']['name']);
            $loc3 = "img/db/" . $_FILES['itm_s_img3']['name'];
        }
        $q2 = "INSERT INTO goods (name,descryption, id_brand,year, main_photo,small_photo1,small_photo2,small_photo3, added, id_color, id_ram, id_storage,price) 
        VALUES('$_POST[itm_name]','$_POST[itm_desc]','$_POST[itm_brand]','$_POST[itm_time]','$loc','$loc1','$loc2','$loc3','$usr_id','$_POST[itm_color]',
'$_POST[itm_ram]','$_POST[itm_stor]','$_POST[itm_price]')";
        $result2 = mysqli_query($link, $q2) or die(mysqli_error());
        if ($result2) {
            $status = 1;
        } else {
            $status = 2;
        }
    } else {
        $status = 3;
    }
} else {
    $status = 3;
}
mysqli_close($connect);
?>
<script type="text/javascript">
window.location="add_good.php?status=<?php echo $status; ?>";
</script>