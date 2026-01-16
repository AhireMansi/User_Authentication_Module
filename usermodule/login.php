<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "module");
if (!$con) {
    die("Database connection failed");
}

$error = "";

if (isset($_POST['Login'])) {

    $email = trim($_POST['email']);
    $pwd   = trim($_POST['pwd']);

    $sql = "SELECT * FROM register WHERE email='$email'";
    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) == 1) {

        $row   = mysqli_fetch_assoc($res);
        $dbPwd = trim($row['pwd']);

        // password check (plain + hashed)
        if ($pwd === $dbPwd || password_verify($pwd, $dbPwd)) {

            $_SESSION['logindone'] = true;
            $_SESSION['username'] = $row['name'];

            // REDIRECT (NO OUTPUT BEFORE THIS)
            header("Location: forth.php");
            exit;

        } else {
            $error = "Incorrect password";
        }

    } else {
        $error = "Email not found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">
<div class="card p-4 shadow" style="width:380px;">

<h3 class="text-center mb-3">Login</h3>

<?php if ($error): ?>
<div class="alert alert-danger text-center">
    <?php echo $error; ?>
</div>
<?php endif; ?>

<form method="POST">

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="pwd" class="form-control" required>
    </div>

    <button name="Login" class="btn btn-primary w-100">
        Login
    </button>
    <div class="text-center mt-3">
            <a href="forget-pwd.php" class="text-decoration-none">
                Forgot Password?
            </a>
        </div>

        
        <div class="text-center mt-2">
            Don’t have an account?
            <a href="register.php" class="text-decoration-none">
                Register
            </a>
        </div>


</form>

</div>
</div>

</body>
</html>
