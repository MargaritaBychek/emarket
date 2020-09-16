<!DOCTYPE html>
<html>
    <head><?php 
$title="WithConnect";
require_once "blocks/head.php";
?></head>

    <body>
<div id="page-wrap">
<?php require_once "blocks/header.php";
require_once "blocks/menu.php";
?>
<div id="center">
<div id="content">
  <?php
  $id_good=$_GET["id"];
  include ("blocks/db.php");
  $result = mysqli_query($link,"SELECT * FROM goods WHERE id_good='".$id_good."' LIMIT 1");
  if($result)
  {
      $rows = mysqli_fetch_assoc($result);
      $a=$rows["id_good"];
  }
    mysqli_close($link);
  ?>

  <div class="product-info">
          <div class="photo">
            <img class="main-p" src=<?php echo $rows["main_photo"]?> alt="product"/>  
          </div>
          <div class="name">
            <a href="product-about.php?id=<?php echo $a?>"><h2><?php echo $rows["name"]?></h2></a>
            <br/> 
            <p><?php echo $rows["descryption"]?></p>
            <br/>
            <?php
            if (isset($_SESSION['login_user']))
            echo '<a name="del" href="add_to_cart.php?a= '.$a.'"><img src="img/icons/add_cart.png" alt="Cart" title="Add to Cart"/></a>';
            ?>     
          </div>
          <div class="small-photo">
          <?php
            if($rows["small_photo1"]!=NULL)
              echo '<div><img  src="'.$rows["small_photo1"].'" alt="product" /></div>';
            if($rows["small_photo2"]!=NULL)
              echo '<div><img  src="'.$rows["small_photo2"].'" alt="product" /></div>';
            if($rows["small_photo3"]!=NULL)
              echo '<div><img src="'.$rows["small_photo3"].'" alt="product" /></div>';
          ?>
            </div>   
        <div class="information">
          <h2>Other information</h2>
            <table class="product-view-table">
                    <tbody>
                    <tr>
              <td class="gray">Brand</td>
              <?php 
              include ("blocks/db.php");
              $result = mysqli_query($link,"SELECT * FROM brands WHERE id_brand='".$rows["id_brand"]."' LIMIT 1");
              if($result)
              {
                  $row = mysqli_fetch_assoc($result);
                  $a=$row["brand"];
              }
                mysqli_close($link);
              echo '<td> '.$a.'</td>';
              ?>
              </tr>
              <tr>
                <td class="gray">Price</td>
                <td> <?php echo $rows['price']?></td>
              </tr>
              <tr>
                <td class="gray">Year</td>                                                                                                                 
                <td> <?php echo $rows["year"]?></td>
              </tr>
              <tr>
                <td class="gray">Color</td>                                                                                                        
                  <?php 
                include ("blocks/db.php");
                $result = mysqli_query($link,"SELECT * FROM colors WHERE id_color='".$rows["id_color"]."' LIMIT 1");
                if($result)
                {
                    $row = mysqli_fetch_assoc($result);
                    $b=$row["color"];
                }
                  mysqli_close($link);
                echo '<td> '.$b.'</td>';
                ?>
              </tr>
              <tr>
                <td  class="gray">RAM </td>                         
                <?php 
                include ("blocks/db.php");
                $result = mysqli_query($link,"SELECT * FROM rams WHERE id_ram='".$rows["id_ram"]."' LIMIT 1");
                if($result)
                {
                    $row = mysqli_fetch_assoc($result);
                    $c=$row["ram"];
                }
                  mysqli_close($link);
                echo '<td> '.$c.'</td>';
                ?>
              </tr>
              <tr>
                <td class="gray">Storage</td>
                <?php 
                include ("blocks/db.php");
                $result = mysqli_query($link,"SELECT * FROM storages WHERE id_storage='".$rows["id_storage"]."' LIMIT 1");
                if($result)
                {
                    $row = mysqli_fetch_assoc($result);
                    $d=$row["storage"];
                }
                  mysqli_close($link);
                echo '<td> '.$d.'</td>';
                ?>
              </tr>
              </tbody>
              </table>
            </div>
      </div>
  </div>
<?php require_once "blocks/advertising.php"?>
</div>
</div>
<?php require_once "blocks/footer.php"?>
    </body>
</html> 