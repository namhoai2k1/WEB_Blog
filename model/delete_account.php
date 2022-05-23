<?php
    include '../model/controller.php';
    $get_data = new Data();
    $data = $get_data->deleteAccount($id);
    $data2 = $get_data->deleteProfile($id);
    header('location: ../view/admin_account.php');
?> 