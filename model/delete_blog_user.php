<?php
    include '../model/controller.php';
    $get_data = new Data();
    $id = $_GET['id'];
    $data = $get_data->deleteBlog($id);
    header('location: ../view/admin_blog.php');
?> 