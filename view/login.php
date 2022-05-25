<?php 
    session_start();
	include '../model/controller.php';
	$get_data = new Data();
?>
<?php 
// kiem tra dau vao
if (isset($_POST['signup'])) {
	$getName = $get_data->getNameUser($_POST['username_2']);
    $name = $getName['user_name_2'];
    if(empty($_POST['username_2']) || empty($_POST['password_2']) || empty($_POST['email_2']))
    {
        echo "<script>alert('Please fill all the fields')</script>";
    }
    elseif (trim($_POST['username_2'], " ") == $name['name']) {
        echo "<script>alert('Username already exists')</script>";
    }
    else 
    {
        try {
            $get_data->signUp($_POST['username_2'], ($_POST['email_2']), $_POST['password_2']);
            echo "<script>alert('Register success')</script>";
            // them vao profile
            $get_data->addProfile($_POST['username_2']);
        } catch (Exception $e) {
            echo "<script>alert('Register fail')</script>";
        } 
    }
}

// kiem tra dau vao
if (isset($_POST['login'])) {
    if(empty($_POST['password']) || empty($_POST['username']))
    {
        echo "<script>alert('Please fill all the fields')</script>";
    }
    else 
    {
        try {
            $login =  $get_data->login($_POST['username'], $_POST['password']);
            if($login) {
                // chuyen hung ve trang index 
                header('location: index.php');
                // tao bien section name="$_POST['username']"
                $_SESSION['name'] = $_POST['username'];
            } else {
                echo "<script>alert('Username or password is incorrect')</script>";
            }
        } catch (Exception $e) {
            echo "<script>alert('Register fail')</script>";
        } 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../css/login.css" />
        <title>Login</title>
    </head>
    <body>
        <section class="user">
            <div class="user_options-container">
                <div class="user_options-text">
                    <div class="user_options-unregistered">
                        <h2 class="user_unregistered-title">
                            Don't have an account?
                        </h2>
                        <p class="user_unregistered-text">
                            Banjo tote bag bicycle rights, High Life sartorial
                            cray craft beer whatever street art fap.
                        </p>
                        <button
                            class="user_unregistered-signup"
                            id="signup-button"
                        >
                            Sign up
                        </button>
                    </div>
                    <div class="user_options-registered">
                        <h2 class="user_registered-title">Have an account?</h2>
                        <p class="user_registered-text">
                            Banjo tote bag bicycle rights, High Life sartorial
                            cray craft beer whatever street art fap.
                        </p>
                        <button class="user_registered-login" id="login-button">
                            Login
                        </button>
                    </div>
                </div>
                <div class="user_options-forms" id="user_options-forms">
                    <div class="user_forms-login">
                        <h2 class="forms_title">Login</h2>
                        <form class="forms_form" method="POST">
                            <fieldset class="forms_fieldset">
                                <div class="forms_field">
                                    <input
                                        type="text"
                                        name="username"
                                        placeholder="Email"
                                        class="forms_field-input"
                                        required
                                        autofocus
                                    />
                                </div>
                                <div class="forms_field">
                                    <input
                                        type="password"
                                        name="password"
                                        placeholder="Password"
                                        class="forms_field-input"
                                        required
                                    />
                                </div>
                            </fieldset>
                            <div class="forms_buttons">
                                <button
                                    type="button"
                                    class="forms_buttons-forgot"
                                >
                                    Forgot password?
                                </button>
                                <input
                                    type="submit"
                                    value="Log In"
                                    name="login"
                                    class="forms_buttons-action"
                                />
                            </div>
                        </form>
                    </div>
                    <div class="user_forms-signup">
                        <h2 class="forms_title">Sign Up</h2>
                        <form class="forms_form" method="post">
                            <fieldset class="forms_fieldset">
                                <div class="forms_field">
                                    <input
                                        type="text"
                                        placeholder="Full Name"
                                        name="username_2"
                                        class="forms_field-input"
                                        required
                                    />
                                </div>
                                <div class="forms_field">
                                    <input
                                        type="email"
                                        placeholder="Email"
                                        name="email_2"
                                        class="forms_field-input"
                                        required
                                    />
                                </div>
                                <div class="forms_field">
                                    <input
                                        type="password"
                                        name="password_2"
                                        placeholder="Password"
                                        class="forms_field-input"
                                        required
                                    />
                                </div>
                            </fieldset>
                            <div class="forms_buttons">
                                <input
                                    type="submit"
                                    value="Sign up"
                                    name="signup"
                                    class="forms_buttons-action"
                                />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <script src="../js/login.js"></script>
    </body>
</html>
