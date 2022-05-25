<?php 
    include '../model/controller.php';
    $get_data = new Data();
    $id = $_GET['id'];
    $data = $get_data->getData($id);
    if($data['password'] == $_POST['pass']) {
        $new_password = $_POST['newpass'];
        $get_data->updatePassword($id, $new_password);
        header('location: ../view/account.php?id='.$id);
    } else {
        echo '<script>alert("Wrong password!")</script>';
        header('location: ../view/changepass.php?id='.$id);
    }
?>