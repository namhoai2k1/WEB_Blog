<?php 
    include '../model/controller.php';
    $get_data = new Data();
    $id = $_GET['id'];
    if(isset($_POST['update'])){
        $nickname = $_POST['nickname'];
        $date = $_POST['date'];
        $interests = $_POST['interests'];
        $address = $_POST['address']; 
        $workplace = $_POST['workplace'];
        // upload avatar
        $avatar = basename($_FILES["avatar"]["name"]);
        $coverimage = basename($_FILES['coverimage']['name']);
        $target_dir = "../upload/";
        $target_file_avat = $target_dir . $avatar;
        $target_file_cover = $target_dir . $coverimage;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file_avat,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["avatar"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        // Check if file already exists
        if (file_exists($target_file_avat)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["avatar"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file_avat)) {
                // echo "The file ". basename( $_FILES["avatar"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        // upload coverimage
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file_cover,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["coverimage"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        // Check if file already exists
        if (file_exists($target_file_cover)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["coverimage"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["coverimage"]["tmp_name"], $target_file_cover)) {
                // echo "The file ". basename( $_FILES["coverimage"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        $sothich = implode(' ', $interests);
        try {
            $flag = $get_data->updateProfile($id , $nickname, $date, $sothich, $address, $workplace, $avatar, $coverimage);
            if ($flag) {
                header('Location: ../view/account.php?id=' . $id);
            } else {
                // hien thi thong bao sua that bai
                echo '<div class="toast show">
                        <div class="toast-header"> 
                            Toast Header
                            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                        </div>
                        <div class="toast-body">
                            Update profile fail
                        </div>'
                    .'</div>';
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }  
    }
?>