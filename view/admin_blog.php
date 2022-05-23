<?php
    include './shared/header.php';
    // lay bien  tu link
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // lay bien  section
    $profile = $get_data->getProfileByName($value['user_name']);
?>
<!-- End of header.php -->
<!-- Start of content -->
<div class="container-fluid">
    <div class="row">
        <div class="alert alert-primary" role="alert">
            <strong>Blog of All User</strong>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <!-- hien thi cac blogs -->
        <div class="col-md-8">
            <?php
                $data = $get_data->getAllBlogs();
                foreach ($data as $key => $value) {
            ?>
            <div class="card mb-3">
                <div class="card-header d-flex align-center justify-content-between">
                    <div>
                        <h4 class="card-title">
                            <?php echo $value['title']; ?>
                        </h4>
                        <span><?php echo $value['date'] ?></span>
                    </div>
                    <!-- hien thi ten Author -->
                    <h4>
                        Author: 
                        <?php
                            echo $value['author'];
                        ?>
                    </h4>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <?php echo $value['description']; ?>
                    </p>
                </div>
                <div class="card-footer">
                    <a href="./edit_blog.php?id=<?php echo $value['id']; ?>" class="btn btn-primary">
                        Edit
                    </a>
                    <a href="./delete_blog.php?id=<?php echo $value['id']; ?>" class="btn btn-danger">
                        Delete
                    </a>
                    <!-- them nut duyet -->
                    <?php if($value['status'] != 1) { ?>
                        <a href="../model/accept_blog.php?id=<?php echo $value['id']; ?>" class="btn btn-success">
                            Accept
                        </a>
                    <?php } else {?>
                        <a href="../model/unaccept_blog.php?id=<?php echo $value['id']; ?>" class="btn btn-warning">
                            Unaccept
                        </a>
                    <?php } ?>
                </div>
            </div>
            <?php
                }
            ?>
        <div class="col-md-2"></div>
    </div>
</div>
<!-- End of content -->
<!-- Start of footer.php -->
<?php 
    include './shared/fooder.php';
?>