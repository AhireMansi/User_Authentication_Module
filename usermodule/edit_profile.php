<?php
session_start();

if (!isset($_SESSION['logindone'])) {
    header("Location: login.php");
    exit;
}

$con = mysqli_connect("localhost", "root", "", "module");
if (!$con) {
    die("Database connection failed");
}

$msg = "";
$username = $_SESSION['username'];

// fetch current user data
$getUser = mysqli_query($con, "SELECT * FROM register WHERE name='$username'");
$user = mysqli_fetch_assoc($getUser);

if (isset($_POST['Update'])) {

    $name  = $_POST['name'];
    $email = $_POST['email'];
    $pwd   = $_POST['pwd'];

    $update = "UPDATE register 
               SET name='$name', email='$email', pwd='$pwd'
               WHERE name='$username'";

    if (mysqli_query($con, $update)) {
        $_SESSION['username'] = $name; // update session
        $msg = "Profile updated successfully";
    } else {
        $msg = "Profile update failed";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">
<div class="card shadow p-4" style="width:420px;">

<h3 class="text-center mb-3">Edit Profile</h3>

<?php if ($msg): ?>
<div class="alert alert-info text-center">
    <?php echo $msg; ?>
</div>
<?php endif; ?>

<form method="POST">

    <!-- Name -->
    <div class="mb-3">
        <label>Full Name</label>
        <input type="text" name="name" class="form-control"
               value="<?php echo $user['name']; ?>" required>
    </div>

    <!-- Email -->
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control"
               value="<?php echo $user['email']; ?>" required>
    </div>

    <!-- Password -->
    <div class="mb-3">
        <label>Password</label>
        <input type="text" name="pwd" class="form-control"
               value="<?php echo $user['pwd']; ?>" required>
    </div>

    <button name="Update" class="btn btn-success w-100">
        Update Profile
    </button>

    <div class="text-center mt-3">
        <a href="forth.php" class="text-decoration-none">← Back to Dashboard</a>
    </div>

</form>

</div>
</div>

</body>
</html>
