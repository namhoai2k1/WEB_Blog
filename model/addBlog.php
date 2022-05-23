<?php 
    include '../model/controller.php';
    $get_data = new Data();
    $id = $_GET['id'];
    $account = $get_data->getAccountById($id);
    $author = $account['user_name'];
    if(isset($_POST['addBlog'])) {
        // taọ biên lấy date hôn nay
        $date = date('Y-m-d');
        // lấy biến từ form
        $title = $_POST['title'];
        $content = $_POST['content'];
        try {
            $get_data->addBlogs($title, $content,$author,$date);
            echo '<script>alert("Them thanh cong")</script>';
            header('Location: ../view/account.php?id=' . $id);
        } catch (Exception $e) {
            echo '<script>alert("Them that bai")</script>';
        }
    }
?>