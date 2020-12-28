<?php
    session_start();
    require_once '../class/User.php';
    $users_obj = new User();
    if (isset($_POST['add'])) {
    $users_obj->addUser($_POST['name'],$_POST['email'],$_POST['pseudo'],$_POST['password']);
    $_SESSION['alert']='User added successfully';
    echo "<script> window.location.replace('listUsers.php') </script>";
    }

    if (isset($_GET['delete'])) {
        $id_user = $_GET['delete'];
        $users_obj->deleteUser($id_user);
        $_SESSION['alert']='User deleted successfully';
        echo "<script> window.location = 'listUsers.php'; </script>";
    }

    if (isset($_GET['modify_clk'])) {
        $id_user = $_GET['modify_clk'];
        $user = $users_obj->find($id_user);
        echo json_encode($user);
    }

    if (isset($_POST['modify'])) {
        $users_obj->updateUser($_POST['user_modify'],$_POST['name_modify'],$_POST['email_modify'],$_POST['pseudo_modify']);
        $_SESSION['alert']='User updated successfully';
        echo "<script> window.location = 'listUsers.php'; </script>";
    }

    if (isset($_POST['login'])) {
        $user_data = $users_obj->login($_POST['email'],$_POST['password']);
        
        if ($user_data) {
            $_SESSION['user_con'] = $user_data;
            echo "<script> window.location = 'profile.php'; </script>";
        }else{
            echo "<script> window.location = 'login.php'; </script>";
        }
    }

    if (isset($_GET['logout'])) {
        unset($_SESSION['user_con']);
        echo "<script> window.location = 'login.php'; </script>";
    }
?>