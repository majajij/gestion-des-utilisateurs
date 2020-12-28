<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once '../includes/head.php'; ?>
<body>
    <?php require_once '../includes/nav.php'; ?>
    
    
    <?php
        include '../class/User.php';
    ?>
    <div class="row">
        <form class="col offset-s4 s4" method="POST" action="actions.php">

            <h3 class="header">Login</h3>

            <div class="row">
                <div class="input-field col s12">
                <input id="email" name="email" type="email" class="validate" required>
                <label for="email">Email</label>
                </div>
            </div>
            
            <div class="row">
                <div class="input-field col s12">
                <input id="password" name="password" type="password" class="validate" required>
                <label for="password">Password</label>
                </div>
            </div>

            <button class="btn waves-effect waves-light" type="submit" name="login">LOGIN
                <i class="material-icons left">login</i>
            </button>

        </form>
    </div>
    

    <?php require_once '../includes/script.html'; ?>
    <?php require_once 'alert.php'; ?>
</body>
</html>