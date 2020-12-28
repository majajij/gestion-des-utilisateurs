<nav>
    <div class="nav-wordwrap" style="padding-left: 10px;">
    <a href="" class="brand-logo"><b>Test BEWEB</b></a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="../pages/listUsers.php">List users</a></li>
        
        <?php
            if (isset($_SESSION['user_con'])) {
                echo "<li><a href='../pages/profile.php'>Profile</a></li>";
                echo "<li><a href='#' onclick='logout()'>Logout</a></li>";
            }else{
                echo "<li><a href='../pages/login.php'>Login</a></li>";
            }
        ?>
      
    </ul>
    </div>
</nav>