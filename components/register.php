<?php
require('../include/db.php');

function containsLettersAndNumbers($str)
{
  return preg_match('/[a-zA-Z]/', $str) && preg_match('/[0-9]/', $str);
}

function containsSpecialCharacters($str)
{
  return preg_match('/[^a-zA-Z0-9]/', $str);
}

if (isset($_POST['register'])) {
  $fullName = $_POST['fullName'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];

  if (!containsLettersAndNumbers($username)) {
    echo "<script>alert('Username must be a combination of letters and numbers!')</script>";
  } elseif (!containsSpecialCharacters($password) || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password)) {
    echo "<script>alert('Password must be a combination of capital and small letters, special characters, and numbers!')</script>";
  } elseif ($password !== $confirmPassword) {
    echo "<script>alert('Passwords do not match!')</script>";
  } else {
    $checkUserQuery = "SELECT * FROM users WHERE username=? OR email=?";
    $stmt = mysqli_prepare($db, $checkUserQuery);
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
      echo "<script>alert('Username or email already exists!')</script>";
    } else {
      $insertUserQuery = "INSERT INTO users (fullName, username, email, password) VALUES (?, ?, ?, ?)";
      $stmt = mysqli_prepare($db, $insertUserQuery);
      mysqli_stmt_bind_param($stmt, "ssss", $fullName, $username, $email, $password);
      mysqli_stmt_execute($stmt);

      echo "<script>alert('Registration successful!')</script>";
      echo "<script>window.location.href = 'login.php';</script>";
    }
  }
}
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>GreenBin | Registration Page</title>
  <link href="../images/logo.png" rel="icon" />
  <link href="../images/logo.png" rel="apple-touch-icon" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../user/plugins/fontawesome-free/css/all.min.css" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../user/plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="../user/dist/css/user.min.css" />
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
</head>

<body style="
      background-image: url('../images/bg.png');
      background-size: cover;
      background-position: center;
    " class="hold-transition login-page">
  <div class="register-box">
    <div class="register-logo" style="font-weight: bold">
      <a href="../index.php"><img src="../images/logo.png" alt="Green Bin" style="width: 50px; height: 60px" /><b
          style="color: #17ef63">Green</b><b style="color: #fff">Bin</b></a>
    </div>
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register</p>
        <form action="#" method="post" enctype="multipart/form-data">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Full name" name="fullName" value="<?php if (isset($_POST['fullName']))
              echo htmlspecialchars($_POST['fullName']); ?>" required />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username" value="<?php if (isset($_POST['username']))
              echo htmlspecialchars($_POST['username']); ?>" required />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user-circle"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" value="<?php if (isset($_POST['email']))
              echo htmlspecialchars($_POST['email']); ?>" required />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" id="password" required />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Retype password" name="confirmPassword"
              id="confirmPassword" required />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="showPassword" />
              <label class="custom-control-label" for="showPassword">Show Password</label>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree" <?php if (isset($_POST['terms']) && $_POST['terms'] === 'agree')
                  echo 'checked'; ?> required />
                <label for="agreeTerms">
                  I agree to the <a href="#" target="_blank">terms</a>
                </label>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block" name="register">
                Register
              </button>
            </div>
          </div>
        </form>
        <a href="login.php" class="text-center">I already have an Account</a>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="../user/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../user/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../user/dist/js/user.min.js"></script>
  <!-- SweetAlert JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.js"></script>
  <script>
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("confirmPassword");
    const showPasswordCheckbox = document.getElementById("showPassword");

    showPasswordCheckbox.addEventListener("change", function () {
      const passwordType = showPasswordCheckbox.checked ? "text" : "password";
      passwordInput.setAttribute("type", passwordType);
      confirmPasswordInput.setAttribute("type", passwordType);
    });
  </script>
</body>

</html>