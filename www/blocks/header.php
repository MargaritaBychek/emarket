<header>
    <div id="logo">
    <a href="index.php"><img src="img/icons/main.png" alt="WithConnect" title="WithConnect"/></a>
        <a href="index.php" title="Home" id="logo">WithConnect</a>
</div>
<?php
require "db.php";
                if(!isset($_SESSION)) 
                { 
                    session_start();
                }   
                if (isset($_SESSION['login_user'])) {
                    $log=$_SESSION['login_user'];
                    $u=mysqli_query($link,"SELECT * FROM users WHERE user_login='$log' LIMIT 1;");
                    $usr=mysqli_fetch_array($u);
                    $usr_id=$usr[0];
                    echo '<span class="right-menu">
                    <a href="logout.php"><img src="img/icons/logout.png" alt="LogOut" title="Log Out"/></a>
                    <a href="cart.php" ><img src="img/icons/cart.png" alt="Cart" title="Cart"/></a>
                    <a href="goods.php" ><img src="img/icons/profile.png" alt="Profile" title="'.$log.'"/></a>
                </span>';
                } else {
                    echo '<span class="right">
                    <span class="contact"> <a href="login.php?status=0" title="authorization">Log In</a></span> | 
                    <span class="contact"> <a href="reg.php?status=0" title="registration"> Sign In </a></span>
                </span>';
                }
                ?>   
</header>