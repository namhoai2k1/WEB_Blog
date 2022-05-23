<?php
    include '../model/controller.php';
    $get_data = new Data();
    $id = $_GET['id'];
    $blog = $get_data->getBlogById($id);
    $author = $blog['author'];
    $profile = $get_data->getProfileByName($author);
    $getAuthor = $profile['id'];
    $data = $get_data->deleteBlog($id);
    header('location: ../view/account.php?id='.$getAuthor);
?> 