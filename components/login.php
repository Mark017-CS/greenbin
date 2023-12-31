<?php
require('../include/db.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username=?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_array($result);
        $storedPassword = $data['password'];

        if ($password === $storedPassword) {
            session_start();
            $_SESSION['user_id'] = $data['user_id'];
            $_SESSION['isUserLoggedIn'] = true;

            if (isset($_POST['remember'])) {
                setcookie('username', $username, time() + (86400 * 30), '/');
                setcookie('password', $password, time() + (86400 * 30), '/');
            } else {
                setcookie('username', '', time() - 3600, '/');
                setcookie('password', '', time() - 3600, '/');
            }

            header("Location: ../index.php#home");
            exit();
        } else {
            echo "<script>alert('Incorrect username or password!')</script>";
        }
    } else {
        echo "<script>alert('Incorrect username or password!')</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GreenBin | Log in</title>
  <link href="../images/logo.png" rel="icon">
  <link href="../images/logo.png" rel="apple-touch-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../user/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../user/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../user/dist/css/user.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>
    .password-toggle-icon {
      cursor: pointer;
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      color: #999;
      z-index: 1;
      display: none;
    }

    .password-toggle-icon:hover {
      color: #666;
    }
  </style>
</head>

<body
    style="
      background-image: url('../images/bg.png');
      background-size: cover;
      background-position: center;
    "
    class="hold-transition login-page"
  >
  <div class="login-box">
  <div class="register-logo" style="font-weight: bold">
        <a href="../index1.php"
          ><img
          src="../images/logo.png"
          alt="Green Bin"
          style="width: 50px; height: 60px"
        /><b style="color: #17ef63">Green</b><b style="color: #fff">Bin</b></a
        >
      </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in</p>
        <form method="post" action="login.php">
    <div class="input-group mb-3">
        <input type="text" class="form-control" name="username" placeholder="Username" required
               value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : ''; ?>">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required
               value="<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : ''; ?>">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock" id="lockIcon"></span>
            </div>
        </div>
        <span class="fas fa-eye password-toggle-icon" id="eyeIcon"></span>
    </div>
    <div class="form-check mb-3">
        <input type="checkbox" class="form-check-input" id="rememberMe" name="remember"
               <?php echo isset($_COOKIE['username']) ? 'checked' : ''; ?>>
        <label class="form-check-label" for="rememberMe">Remember Me</label>
    </div>
    <div class="row">
        <div class="col-12">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
        </div>
    </div>
</form>

        <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="register.php" class="text-center">Register</a>
        </p>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="../user/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../user/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../user/dist/js/userlte.min.js"></script>
  <script>
    var passwordInput = document.querySelector('#password');
    var lockIcon = document.getElementById('lockIcon');
    var eyeIcon = document.getElementById('eyeIcon');

    passwordInput.addEventListener('input', function () {
      if (passwordInput.value !== '') {
        lockIcon.style.display = 'none';
        eyeIcon.style.display = 'block';
      } else {
        lockIcon.style.display = 'block';
        eyeIcon.style.display = 'none';
      }
    });

    eyeIcon.addEventListener('click', function () {
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
      } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
      }
    });
  </script>
</body>

</html>