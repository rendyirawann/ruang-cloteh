<?php
require "base/koneksi.php";
$loginFail = 0;
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, trim($_POST['username']));
    $password = mysqli_real_escape_string($conn, trim($_POST['password']));
    // $message = "";

    if (empty($username)) {
        $loginFail = 1;
        $message = "Username / Password Salah.";
    }
    if (empty($password)) {
        $loginFail = 1;
        $message = "Username / Password Salah.";
    }

    $result = $conn->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: admin.php");
    } else {
        $loginFail = 1;
        $message = "Username / Password Salah.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - <?= TITLE ?></title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/main/app.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/pages/auth.css">
    <link rel="shortcut icon" href="<?= BASE_URL ?>assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="<?= BASE_URL ?>assets/images/logo/favicon.png" type="image/png">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="<?= BASE_URL ?>index.php"><img src="<?= BASE_URL ?>assets/img/icon-rc-edit.png" alt="Logo">Ruang Cloteh</a>
                    </div>
                    <h1 class="auth-title">Log in</h1>
                    <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>
                    <?php
                    if ($loginFail == 1) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $message ?>
                        </div>
                    <?php } ?>
                    <form action="" method="POST">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" name="username" placeholder="Username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="password" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <!-- <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div> -->
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" name="submit">Log in</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>