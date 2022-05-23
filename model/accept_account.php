<?php
        include('./controller.php'); 
        $get_data = new Data();
        $id = $_GET['id'];
        // accept
        $data = $get_data->upgradeAccount($id);
        header('location: ../view/admin_account.php');
?>
