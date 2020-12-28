<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once '../includes/head.php'; ?>
<body>
    <?php require_once '../includes/nav.php'; ?>
    <br>
    <span class="badge">
        <a href="#modal1" class="btn-floating btn-large waves-effect waves-light red modal-trigger"><i class="material-icons">add</i></a>
    </span>   


    <div id="modal1" class="modal">
        <form class="col offset-s4 s4" method="post" action="actions.php">
            <div class="modal-content">
                <h4>Add User</h4>

                <div class="row">
                    <div class="input-field col s12">
                    <input id="name" name="name" type="text" class="validate" required>
                    <label for="name">Name</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                    <input id="pseudo" name="pseudo" type="text" class="validate" required>
                    <label for="pseudo">Pseudo</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                    <input id="password" name="password" type="password" class="validate" required>
                    <label for="password">Password</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                    <input id="email" name="email" type="email" class="validate" required>
                    <label for="email">Email</label>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn waves-effect waves-light" type="submit" name="add">ADD
                    <i class="material-icons left">add</i>
                </button>
            </div>
        </form>
    </div>

    <div id="modal2" class="modal">
        <form class="col offset-s4 s4" method="post" action="actions.php">
            <div class="modal-content">
                <h4>Modify User</h4>

                <div class="row">
                    <div class="input-field col s12">
                    <input id="name_modify" name="name_modify" type="text" class="validate" value="" required>
                    <label for="name_modify">Name</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                    <input id="pseudo_modify" name="pseudo_modify" type="text" class="validate" value="" required>
                    <label for="pseudo_modify">Pseudo</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                    <input id="email_modify" name="email_modify" type="email" class="validate" value="" required>
                    <label for="email_modify">Email</label>
                    </div>
                </div>
                
                <input id="id_modify" type="hidden" name="user_modify" type="hidden" value="">

            </div>
            <div class="modal-footer">
                <button class="btn waves-effect waves-light" type="submit" name="modify">Modify
                </button>
            </div>
        </form>
    </div>


    <br> 
    <div class="collection" style="margin: 20px;">
    <?php
        include '../class/User.php';
        $users_obj = new User();
        $users = $users_obj->getAll();
        if (count($users) > 0) {
            foreach ($users as $user) {
                echo '<div class="collection-item">'.$user['name'].' <span class="badge"> <a href="#modal2" onclick="modifyUser('.$user['id'].')" class="modal-trigger"><i class="material-icons dp48">edit</i></a> <a href="#" onclick="confirmDeleteUser('.$user['id'].')"><i class="material-icons dp48">delete</i></a> </span> </div>';
            }
        }else{
            echo '<div class="collection-item"> There is no users on this list, you can <a href="#modal1" class="modal-trigger">create a new one</a>. </div>';
        }
    ?>
    </div>
    
    <?php require_once '../includes/script.html'; ?>
    <?php require_once 'alert.php'; ?>
</body>
</html>