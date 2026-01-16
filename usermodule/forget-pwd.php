<?php
$con = mysqli_connect("localhost", "root", "", "module");
if (!$con) {
    die("Database connection failed");
}

$msg = "";

if (isset($_POST['Reset'])) {

    $email = $_POST['email'];
    $pwd   = $_POST['pwd'];
    $cpwd  = $_POST['cpwd'];

    if ($pwd != $cpwd) {
        $msg = "Passwords do not match";
    } else {

        $check = mysqli_query($con, "SELECT * FROM register WHERE email='$email'");

        if (mysqli_num_rows($check) == 1) {

            $update = "UPDATE register SET pwd='$pwd' WHERE email='$email'";
            if (mysqli_query($con, $update)) {
                $msg = "Password updated successfully";
            } else {
                $msg = "Password update failed";
            }

        } else {
            $msg = "Email not registered";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">
<div class="card shadow-lg p-4" style="width:400px;">

    <h3 class="text-center mb-3">Forgot Password</h3>

    <?php if ($msg): ?>
        <div class="alert alert-info text-center">
            <?php echo $msg; ?>
        </div>
    <?php endif; ?>

    <form method="POST">

        <!-- Email -->
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <!-- New Password -->
        <div class="mb-3">
            <label>New Password</label>
            <input type="password" name="pwd" class="form-control" required>
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" name="cpwd" class="form-control" required>
        </div>

        <!-- Reset Button -->
        <button type="submit" name="Reset" class="btn btn-warning w-100">
            Reset Password
        </button>

        <!-- Back to Login -->
        <div class="text-center mt-3">
            <a href="login.php" class="text-decoration-none">
                ← Back to Login
            </a>
        </div>

    </form>

</div>
</div>

</body>
</html>
