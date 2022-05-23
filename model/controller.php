<?php 
    include('connect.php'); 
    class Data {
        public function login($username, $password) {
            global $conn;
            $sql = "SELECT * FROM account WHERE user_name = '$username' AND password = '$password'";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_num_rows($query);
            return $row;
        }
        public function signUp($user_name, $password,$email,) {
            global $conn;
            $sql = "INSERT INTO `account`(`user_name`, `email`, `password`, `role`) VALUES ('$user_name','$email','$password','user')";
            $query = mysqli_query($conn, $sql);
            return $query;
        }
        public function getNameUser($name) {
            global $conn;
            $sql = "SELECT * FROM account WHERE user_name = '$name'";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($query);
            return $row;
        }
        public function addProfile($name) {
            global $conn;
            $sql = "INSERT INTO `profile`(`name`) VALUES ('$name')";
            $query = mysqli_query($conn, $sql);
            return $query;
        }
        // update profile
        public function updateProfile($id, $nickname, $date, $interests, $address, $workplace, $avatar, $coverimage) {
            global $conn;
            $sql = "UPDATE `profile` SET `nickname`='$nickname',`date`='$date',`interests`='$interests',`address`='$address',`workplace`='$workplace', `avatar`='$avatar',`coverimage`='$coverimage' WHERE id = '$id'";
            $query = mysqli_query($conn, $sql);
            return $query;
        }
        // get profile by name
        public function getProfileByName($name) {
            global $conn;
            $sql = "SELECT * FROM `profile` WHERE `name` = '$name'";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($query);
            return $row;
        }
        // select account by id from account
        public function getAccountById($id) {
            global $conn;
            $sql = "SELECT * FROM account WHERE id = '$id'";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($query);
            return $row;
        }
        // add blogs 
        public function addBlogs($title, $description, $author, $date) {
            global $conn;
            $sql = "INSERT INTO blog (title, description, author, date, status)
            VALUES ('$title', '$description', '$author', '$date', 2 )";
            $query = mysqli_query($conn, $sql);
            return $query;
        }
        // get all user
        public function getAllUser() {
            global $conn;
            $sql = "SELECT * FROM account";
            $query = mysqli_query($conn, $sql);
            return $query;
        }
        // get all blogs
        public function getAllBlogs() {
            global $conn;
            $sql = "SELECT * FROM blog";
            $query = mysqli_query($conn, $sql);
            return $query;
        }
        // get all blogs by author
        public function getAllBlogsByAuthor($author) {
            global $conn;
            $sql = "SELECT * FROM blog WHERE author = '$author'";
            $query = mysqli_query($conn, $sql);
            return $query;
        }
        // get all blogs by id
        public function getBlogById($id) {
            global $conn;
            $sql = "SELECT * FROM blog WHERE id = $id";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($query);
            return $row;
        }
        // edit blogs
        public function editBlog($id, $title, $description, $date) {
            global $conn;
            $sql = "UPDATE blog SET title = '$title', description = '$description', date = '$date' WHERE id = $id";
            $query = mysqli_query($conn, $sql);
            echo $sql;
            return $query;
        }
        // delete blogs
        public function deleteBlog($id) {
            global $conn;
            $sql = "DELETE FROM blog WHERE id = $id";
            $query = mysqli_query($conn, $sql);
            return $query;
        }
        // accept blogs
        public function acceptBlog($id) {
            global $conn;
            $sql = "UPDATE blog SET status = 1 WHERE id = $id";
            $query = mysqli_query($conn, $sql);
            return $query;
        }
        // unaccept_blog
        public function unacceptBlog($id) {
            global $conn;
            $sql = "UPDATE blog SET status = 2 WHERE id = $id";
            $query = mysqli_query($conn, $sql);
            return $query;
        }
        // delete account
        public function deleteAccount($id) {
            global $conn;
            $sql = "DELETE FROM account WHERE id = $id";
            $query = mysqli_query($conn, $sql);
            return $query;
        }
        //delete profile
        public function deleteProfile($id) {
            global $conn;
            $sql = "DELETE FROM profile WHERE id = $id";
            $query = mysqli_query($conn, $sql);
            return $query;
        }
        // nang cap tai khoan
        public function upgradeAccount($id) {
            global $conn;
            $sql = "UPDATE account SET role = 'admin' WHERE id = $id";
            $query = mysqli_query($conn, $sql);
            return $query;
        }
        // ha cap tai khoan
        public function downgradeAccount($id) {
            global $conn;
            $sql = "UPDATE account SET role = 'user' WHERE id = $id";
            $query = mysqli_query($conn, $sql);
            return $query;
        }
        // add contact information
        public function addContact($name, $email, $subject, $message) {
            global $conn;
            $sql = "INSERT INTO contact (name, email, subject, message)
            VALUES ('$name', '$email', '$subject', '$message')";
            echo $sql;
            $query = mysqli_query($conn, $sql);
            return $query;
        }
    }
?>

