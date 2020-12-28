<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once '../includes/head.php'; ?>
<body>
    <?php require_once '../includes/nav.php'; ?>
    
   
    <div class="collection-item"> Welcom <?php echo $_SESSION['user_con']['name'] ?> on your Profile</a>. </div>

    <?php require_once '../includes/script.html'; ?>
    <?php require_once '../pages/alert.php'; ?>
</body>
</html>