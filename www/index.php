<!DOCTYPE html>
<html>
<head><?php 
    $title="WithConnect";
    require_once "blocks/head.php";
    ?></head>
<body>
<div id="page-wrap">
<?php require_once "blocks/header.php";
require_once "blocks/menu.php"?>
<div id="center">
<div id="left-menu">
    <form name="search_frm" method="get" enctype="multipart/form-data">
    <input name="itm_search" type="text" class="field" placeholder="Search" />
    <span class="brand">
            <label for="block-head" >Brand</label>
        <div>
        <?php
                include ("blocks/db.php");
                $x="SELECT * FROM brands";
                $res=mysqli_query($link,$x);
                while($rows = mysqli_fetch_array($res))
                echo'
                <div class="checkbox"><label><input type="checkbox" name="brands[]" value="'.$rows[0].'"> '.$rows[1].'</label></div>';
                ?>
        </div>
        <br/>
        <hr/>
    </span>
    <span class="price">
        <label class="block-head">Price</label>
        <br>
            <input type="text" id="min-price" name="min_price" value="0">-
            <input type="text" id="max-price" name="max_price" value="50000">$
            <div id="prices"></div>
            <br/>
            <hr/> 
    </span>
    <span class="year">
        <label class="block-head">Year</label>
        <br>
            <input type="text" id="min-price" name="min_year" value="2000">-
            <input type="text" id="max-price" name="max_year" value="<?php echo date('Y')?>">
            <div id="prices"></div>
            <br/>
            <hr/> 
    </span>
    <span class="color">
        <label class="block-head" title="Charge">Color</label>
        <div><select id="itm_color" name="itm_color">
                <option value="0"></option>
                <?php
            include ("blocks/db.php");
            $x="SELECT * FROM colors";
            $res=mysqli_query($link,$x);
            while($rows = mysqli_fetch_array($res))
            echo'
                <option value="'.$rows[0].'">'.$rows[1].'</option>';
            ?>
                </select></div>
                <br/>
            <hr/> 
    </span>
    <span class="RAM">
        <label class="block-head">RAM</label>
        <div>
                <select id="itm_ram" name="itm_ram">
                <option value="0"></option>
                <?php
            include ("blocks/db.php");
            $x="SELECT * FROM rams";
            $res=mysqli_query($link,$x);
            while($rows = mysqli_fetch_array($res))
            echo'
                <option value="'.$rows[0].'">'.$rows[1].'</option>';
            ?>
                </select> 
         </div><br/> <hr/> 
    </span>
    <span class="Storage">
        <label class="block-head">Storage</label>
        <div>
        <select name="itm_stor">
                <option value="0"></option>
                <?php
            include ("blocks/db.php");
            $x="SELECT * FROM storages";
            $res=mysqli_query($link,$x);
            while($rows = mysqli_fetch_array($res))
            echo'
                <option value="'.$rows[0].'">'.$rows[1].'</option>';
            ?>
                </select>
                </div> <br/>
    </span>
    <input id="done" type="submit" name="sub" value="Search">
     </form>
</div>
<div id="content">
<?php
include ("blocks/db.php");
	if (isset($_GET['page'])){
		$page = $_GET['page'];
	}else $page = 1;
	$limit=2;
	$kol = 4;  
	$art = ($page * $kol) - $kol;
    $minPrice = (isset($_GET['min_price'])) ? (int)$_GET['min_price'] : 0;
    $maxPrice = (isset($_GET['max_price'])) ? (int)$_GET['max_price'] : 1000000;
    $minYear=(isset($_GET['min_year'])) ? (int)$_GET['min_year'] : 2000;
    $maxYear = (isset($_GET['max_year'])) ? (int)$_GET['max_year'] : date('Y');
    //not required
    $name_model = (isset($_GET['itm_search'])) ? $_GET['itm_search'] : null;
    $brands = (isset($_GET['brands'])) ? implode($_GET['brands'], ',') : null;
    $colorId = (isset($_GET['itm_color'])) ? (int)$_GET['itm_color'] : 0;
    $ramId = (isset($_GET['itm_ram'])) ? (int)$_GET['itm_ram'] : 0;
    $storId = (isset($_GET['itm_stor'])) ? (int)$_GET['itm_stor'] : 0;
    $modelWhere=
        ($name_model !== '')
            ? " name LIKE '%". $name_model."%' and "
                    : '';
    $brandsWhere=
        ($brands !== null)
                ? " id_brand IN ($brands) and "
                : '';
    $colorWhere=
        ($colorId !== 0) ? " id_color = $colorId and ": '';
    $ramWhere=
    ($ramId !== 0)
            ? " id_ram = $ramId and "
            : '';
    $storWhere=
    ($storId !== 0)
            ? " id_storage = $storId and "
            : '';
    $query = "
            SELECT *
            from
                goods
            where
            $brandsWhere
                $modelWhere
                $colorWhere
                $ramWhere
                $storWhere
                (price between $minPrice and $maxPrice)
                and
                (year between $minYear and $maxYear)
                LIMIT $art,$kol";
    $counting= "
        SELECT COUNT(*) FROM goods 
    where
    $modelWhere
    $brandsWhere
    $colorWhere
    $ramWhere
    $storWhere
    (price between $minPrice and $maxPrice)
    and
    (year between $minYear and $maxYear)";
    $result=mysqli_query($link,$query);
    $res = mysqli_query($link,$counting);
	$row = mysqli_fetch_row($res);
	$total = $row[0]; 
    $str_pag = ceil($total / $kol);
    $begin="<<";
    $more="..";
    if($str_pag>1 && $page!=1)
        echo '<a class="pages-links" href=index.php?page=1>'.$begin.' </a>';
    if($page<=3)
    {
        if($page+$limit>=$str_pag)
        {
            for ($i = 1; $i <= $str_pag; $i++){
                if($i==$page)
                    echo '<a class="pages-links" href=index.php?page='.$i.'><h3> '.$i.'</h3> </a>';
                else
                    echo '<a class="pages-links" href=index.php?page='.$i.'>'.$i.' </a>';
            }
        }
        else
        {
            for ($i = 1; $i <= $page+$limit; $i++){
                if($i==$page)
                    echo '<a class="pages-links" href=index.php?page='.$i.'><h3> '.$i.'</h3> </a>';
                else
                    echo '<a class="pages-links" href=index.php?page='.$i.'>'.$i.' </a>';
            }
            $tmp=$page+3;
        echo '<a class="pages-links" href=index.php?page='.$tmp.'><h3> '.$more.'</h3> </a>';
        }
    }
    elseif($page>=4){
        if($page<$str_pag-3)
        {
            $tmp=$page-3;
            echo '<a class="pages-links" href=index.php?page='.$tmp.'>'.$more.'</a>';
            for($i=$page-$limit;$i<=$page+$limit;$i++){
                if($i==$page)
                echo '<a class="pages-links" href=index.php?page='.$i.'><h3> '.$i.'</h3> </a>';
            else
                echo '<a class="pages-links" href=index.php?page='.$i.'>'.$i.' </a>';
            }
            $tmp=$page+3;
            echo '<a class="pages-links" href=index.php?page='.$tmp.'>'.$more.'</a>';
        }
        else{
            $tmp=$page-3;
            echo '<a class="pages-links" href=index.php?page='.$tmp.'><h3> '.$more.'</h3> </a>';
            for($i=$page-$limit;$i<=$str_pag;$i++){
                if($i==$page)
                echo '<a class="pages-links" href=index.php?page='.$i.'><h3> '.$i.'</h3> </a>';
            else
                echo '<a class="pages-links" href=index.php?page='.$i.'>'.$i.' </a>';
            }
        }
    } 
    $end=">>";
    if($str_pag>1&&$page!=$str_pag)
        echo '<a class="pages-links" href=index.php?page='.$str_pag.'>'.$end.' </a>';
while($rows = mysqli_fetch_array($result)){
    $a=$rows["id_good"];
    if (isset($_SESSION['login_user'])){
        echo '<div class="product"> <div class="photo"> <img src='.$rows["main_photo"].' alt="product" title="+"/></div>
        <div class="name"> <a href="product-about.php?id='.$rows["id_good"].'" title="name"> <h2>'.$rows["name"].'</h2></a>
        <br/> 
        '.$rows["descryption"].'
            <br/>
        </div>
        <div class="icons">
        <a name="del" href="add_to_cart.php?a='.$a.'"><img src="img/icons/cart.png" alt="Cart" title="Add to Cart"/></a> 
        </div>       
        </div> ';  
    }
    else{
        echo '<div class="product"> <div class="photo"> <img src='.$rows["main_photo"].' alt="product" title="+"/></div>
        <div class="name"> <a href="product-about.php?id='.$rows["id_good"].'" title="name"> <h2>'.$rows["name"].'</h2></a>
        </div>     
        </div> ';    
    }
            
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