<?php
    include './shared/header.php';
    // lay bien  tu link
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    } else {
        header('Location: login.php');
    }
    // lay bien  section
    $value = $get_data->getAccountById($id);
    $role = $value['role'];
    $profile = $get_data->getProfileByName($value['user_name']);
?>
<!-- End of header.php -->
<!-- Start of content -->
<div class="container-fluid bg-dark">
    <div class="row">
        <div class="text-white text-center container position-relative" style="height:500px"">
            <img
                src="../upload/<?php 
                    if($profile['coverimage'] == ''){
                        echo 'default_cover.jpg';
                    }
                    else {
                        echo $profile['coverimage'];
                    }
                ?>"
                alt=""
                srcset=""
                style="width: 85%; height: 350px; object-fit: cover; object-position: center;"
                class="img-responsive rounded" 
            />
            <div class="overlay"></div>
            <div
                class="nav-item d-flex position-absolute"
                style="bottom: 0px; left: 150px; z-index: 100;"
            >
            <!-- ! -->
                <a class="navbar-brand" href="#">
                    <img
                        src="../upload/<?php 
                            if($profile['avatar'] == ''){
                                echo 'default.jpeg';
                            }
                            else {
                                echo $profile['avatar'];
                            }
                        ?>"
                        alt="Logo"
                        style="width: 180px; height: 180px; object-fit: cover; object-position: center;"
                        class="rounded-pill border border-5 border-secondary"
                    />
                </a>
                <div class="mt-5">
                    <a class="nav-link active h1 text-white" href="#"><?php echo $_SESSION['name']?></a>
                    <span><?php echo $profile['nickname'] ?></span>
                </div>
            </div>
            <div class="position-absolute" style="bottom: 10px; right: 150px; z-index: 100;">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalBlog">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    <span class="ml-2">Them vao tin</span>
                </button>
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalProfile">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                    <span class="ml-2">Chinh sua trang ca nhan</span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark border-top border-secondary">
        <div class="container">
            <div class="row">
                <div class="ms-5 ps-5 col">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalPass">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <span class="ml-2">thay đổi mật khẩu</span>
                        </button>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Disabled</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </nav>
</div>
<div class="container mt-3">
    <div class="row">
        <div class="col-4">
            <div class="card bg-dark text-white">
                <div class="card-header">
                    <h5 class="card-title">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        <span class="ml-2">Giới thiệu</span>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="row">
                            <div class="col-12">
                                <span class="h5"><strong>Biêt danh: </strong><?php echo $profile['nickname'] ?></span>
                            </div>
                        <div class="row">
                            <div class="col-12">
                                <span class="h6"><strong>Ngày sinh: </strong><?php echo $profile['date'] ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <span class="h6"><strong>Địa chỉ: </strong><?php echo $profile['address'] ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <span class="h6"><strong>Nơi làm việc: </strong></strong><?php echo $profile['workplace'] ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <span class="h6"><strong>Sở thích: </strong><?php echo $profile['interests'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-8">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card  bg-dark text-white">
                        <div class="card-body">
                            <h4 class="card-title">Bài viết</h4>
                            <p class="card-text">Tất cả các bài viết của bạn</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                    $blogs = $get_data->getAllBlogsByAuthor($value['user_name']);
                    foreach($blogs as $blog){
                ?>
                <div class="col-12 mb-1">
                    <div class="card  bg-dark text-white">
                        <div class="card-header d-flex justify-content-between">
                            <div>
                                <h5 class="card-title">
                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                    <span class="ml-2"><?php echo $blog['title'] ?></span>
                                </h5>
                                <div>
                                    <span class="h6"><strong>Ngày đăng: </strong><?php echo $blog['date'] ?></span>
                                </div>
                            </div>
                            <div class="float-right">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalBlog">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    <span class="ml-2">Chinh sua</span>
                                </button>
                                <a href="../model/delete_blog.php?id=<?php echo $blog['id'] ?>" class="btn btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                    <span class="ml-2">Xoa</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <span class="h6"><?php echo $blog['description'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
</div>
<!-- The Modal 1-->
<div class="modal" id="modalBlog">
    <div class="modal-dialog" style="max-width: 712px;">
        <div class="modal-content bg-dark text-white">
            <!-- Modal body -->
            <div class="modal-body">
                <form action="../model/addBlog.php?id=<?php echo $id; ?>" method="post">
                <div class="card bg-dark text-white">
                        <div class="card-header d-flex align-center justify-content-between">
                            <h4 class="modal-title">Them vao tin cua ban</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="card-body">
                            <!-- <form method="POST" enctype="multipart/form-data"> -->
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="" class="h5">Title</label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="" class="h5">Content</label>
                                        <textarea
                                            type="text"
                                            class="form-control"
                                            name="content"
                                            rows="5"
                                        ></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- </form> -->
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="addBlog">Update</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="modalPass">
    <div class="modal-dialog" style="max-width: 712px;">
        <div class="modal-content bg-dark text-white">
            <!-- Modal body -->
            <div class="modal-body">
                <form action="../model/changepass.php?id=<?php echo $id; ?>" method="post">
                <div class="card bg-dark text-white">
                        <div class="card-header d-flex align-center justify-content-between">
                            <h4 class="modal-title">Thay đổi mật khẩu</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="card-body">
                            <!-- <form method="POST" enctype="multipart/form-data"> -->
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="" class="h5">Nhập mật khẩu cũ</label>
                                        <input type="text" class="form-control" name="pass">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="" class="h5">Nhập mật khẩu mới</label>
                                        <input type="text" class="form-control" name="newpass">
                                    </div>
                                </div>
                            </div>
                            <!-- </form> -->
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="changepass">Thay đổi</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="modalProfile">
    <div class="modal-dialog" style="max-width: 712px;">
        <div class="modal-content bg-dark text-white">
            <!-- Modal body -->
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="../model/addProfile.php?id=<?php echo $id ?>">
                    <div class="card bg-dark">
                        <div class="card-header d-flex align-center justify-content-between">
                            <h4 class="modal-title">Chỉnh sủa trang cá nhân</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="card-body">
                            <!-- <form method="POST" enctype="multipart/form-data"> -->
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="" class="h5">Tên</label>
                                        <input type="text" class="form-control" name="name" value="<?php echo $value['user_name']?>" disabled>
                                    </div>
                                    <div class="form-group col">
                                        <label for="" class="h5">Nickname</label>
                                        <input type="text" class="form-control" name="nickname" value="<?php echo $profile['nickname'];
                                        ?>">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="h5">Ngày sinh</label>
                                            <input type="date" class="form-control" name="date" value="<?php echo $profile['date'];?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="form-group col">
                                        <label for="" class="h5">Sở thích</label>
                                        <div class="row mt-1">
                                            <div class="col">
                                                <div class="d-flex gap-5">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="checkbox1" name="interests[]" value="Da bong" checked>
                                                        <label class="form-check-label" for="checkbox1">Đá bóng ⚽️</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="checkbox2" name="interests[]" value="Xem phim">
                                                        <label class="form-check-label" for="checkbox2">Xem phim 🎬</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="checkbox3" name="interests[]" value="Nghe nhac">
                                                        <label class="form-check-label" for="checkbox3">Nghe nhạc 🎧</label>
                                                    </div>
                                                </div>
                                            </div>                                 
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col">
                                                <div class="d-flex gap-5">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="checkbox4" name="interests[]" value="Choi game">
                                                        <label class="form-check-label" for="checkbox4">Chơi game 🎮</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="checkbox5" name="interests[]" value="Đọc sách">
                                                        <label class="form-check-label" for="checkbox5">Đọc sách 📚</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="checkbox6" name="interests[]" value="Tập thể thao">
                                                        <label class="form-check-label" for="checkbox6">Tập thể thao 🏌️</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="form-group d-flex flex-column gap-3">
                                            <label for="" class="h5">Ảnh Đại diện</label>
                                            <!-- avatar -->
                                            <div class="d-flex align-center justify-content-center">
                                                <img
                                                    src="../upload/<?php 
                                                    if($profile['avatar'] == ''){
                                                        echo 'default.jpeg';
                                                    }
                                                    else {
                                                        echo $profile['avatar'];
                                                    }
                                                    ?>"
                                                    alt="Logo"
                                                    style="width: 180px; height: 180px"
                                                    class="rounded-pill border border-5 border-secondary"
                                                />
                                            </div>
                                            <input
                                                type="file"
                                                class="form-control"
                                                name="avatar"
                                                value="<?php echo $profile['avatar'];?>"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="form-group d-flex flex-column gap-3">
                                            <label for="" class="h5">Ảnh bìa</label>
                                            <!-- cover -->
                                            <div class="d-flex align-center justify-content-center">
                                                <img
                                                    src="../upload/<?php 
                                                    if($profile['coverimage'] == ''){
                                                        echo 'default_cover.jpg';
                                                    }
                                                    else {
                                                        echo $profile['coverimage'];
                                                    }
                                                    ?>"
                                                    alt="Logo"
                                                    style="width: 400px;"
                                                    class="border border-5 border-secondary"
                                                />
                                            </div>
                                            <input
                                                type="file"
                                                class="form-control"
                                                name="coverimage"
                                                value="<?php echo $profile['coverimage'];?>"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="h5">Địa chỉ</label>
                                            <input class="form-control" name="address" value="<?php echo $profile['address'];?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="h5">Nơi làm việc</label>
                                            <input class="form-control" name="workplace" value="<?php echo $profile['workplace'];?>">
                                        </div>
                                    </div>
                                </div>
                            <!-- </form> -->
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="update">Update</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>
<!-- End of content -->
<!-- Start of footer.php -->
<?php 
    include './shared/fooder.php';
?>