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
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-2"></div>
        <!-- hien thi cac blogs -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>All User</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $data = $get_data->getAllUser();
                                foreach ($data as $key => $value) {
                            ?>
                            <tr>
                                <td><?php echo $value['id'] ?></td>
                                <td><?php echo $value['user_name'] ?></td>
                                <td><?php echo $value['password'] ?></td>
                                <td><?php echo $value['role'] ?></td>
                                <td class="d-flex align-center justify-content-around">
                                    <a href="../model/delete_account.php?id=<?php echo $value['id'] ?>"
                                        ><i class="fa fa-trash" aria-hidden="true"></i
                                    ></a>
                                    <a href=""
                                        ><i class="fa fa-pencil" aria-hidden="true"></i
                                    ></a>
                                    <!-- tao them icon phân quyên -->
                                    <?php if($value['role'] == 'admin') { ?>
                                        <a href="../model/unaccept_account.php?id=<?php echo $value['id']; ?>"
                                            ><i class="fa fa-user-secret" aria-hidden="true"></i
                                        ></a>
                                    <?php } else { ?>
                                        <a href="../model/accept_account.php?id=<?php echo $value['id']; ?>"
                                            ><i class="fa fa-user" aria-hidden="true"></i
                                        ></a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<!-- End of content -->
<!-- Start of footer.php -->
<?php 
    include './shared/fooder.php';
?>