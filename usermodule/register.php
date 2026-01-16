<?php
$con = mysqli_connect("localhost", "root", "", "module");
if (!$con) {
    die("Database connection failed");
}

if (isset($_POST['Register'])) {

    $name  = $_POST['name'];
    $email = $_POST['email'];
    $pwd   = $_POST['pwd'];
    $cpwd  = $_POST['cpwd'];

    // Check if email already exists
    $check = "SELECT id FROM register WHERE email='$email'";
    $res   = mysqli_query($con, $check);

    if (mysqli_num_rows($res) > 0) {
        echo "<script>alert('Email already exists');</script>";
    }
    elseif ($pwd != $cpwd) {
        echo "<script>alert('Passwords do not match');</script>";
    }
    else {
        // INSERT (NO HASH, NO cpwd column)
        $insert = "INSERT INTO register (name, email, pwd)
                   VALUES ('$name', '$email', '$pwd')";

        if (mysqli_query($con, $insert)) {
            echo "<script>
                    alert('Registration successful');
                    window.location.href='login.php';
                  </script>";
            exit;
        } else {
            echo "<script>alert('Insert failed');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4" style="width: 420px;">
        <h3 class="text-center mb-4">Create Account</h3>

        <form action="register.php" method="POST">

            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="pwd" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="cpwd" required>
            </div>

            <!-- IMPORTANT: name="Register" -->
            <button type="submit" name="Register" class="btn btn-success w-100">
                Register
            </button>

            <div class="text-center mt-3">
                Already have an account?
                <a href="login.php">Login</a>
            </div>

        </form>
    </div>
</div>

</body>
</html>
