<?php
    include './shared/header.php';
    // lay bien  tu link
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    else {
        header('Location: login.php');
    }
    // lay bien  section
    $value = $get_data->getAccountById($id);
    $role = $value['role'];
    $profile = $get_data->getProfileByName($value['user_name']);
?>
<!-- End of header.php -->
<!-- Start of content -->
<div class="container">
    <!-- update profile -->
    <div class="row my-3">
        <div class="col-3"></div>
        <div class="col-6">
        </div>
        <div class="col-3"></div>
    </div>
</div>
<!-- End of content -->
<!-- Start of footer.php -->
<?php 
    include './shared/fooder.php';
?>