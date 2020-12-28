<?php
    if (isset($_SESSION['alert'])) {
        $msg = $_SESSION['alert'];
        echo '<script>Toast_msg("'.$msg.'")</script>';
        unset($_SESSION['alert']);
    }
?>