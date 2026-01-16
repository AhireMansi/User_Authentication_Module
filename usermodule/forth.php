<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Welcome</title>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>
    body {
        height: 100vh;
        background: #f8f9fa; /* page background removed (light white) */
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Segoe UI', sans-serif;
    }

    .welcome-card {
        border-radius: 20px;
        padding: 40px;
        text-align: center;
        background: linear-gradient(135deg, #ffdd00, #ff9800);
        box-shadow: 0 20px 40px rgba(0,0,0,0.25);
        animation: fadeInUp 1s ease;
        transition: transform 0.3s;
        color: #212529;
    }

    .welcome-card:hover {
        transform: translateY(-8px);
    }

    .welcome-icon {
        font-size: 60px;
        color: #2e7d32;
        margin-bottom: 15px;
        animation: pulse 2s infinite;
    }

    .btn-green {
        background: linear-gradient(135deg, #2e7d32, #66bb6a);
        border: none;
        color: white;
        border-radius: 30px;
        padding: 10px 30px;
        transition: 0.3s;
    }

    .btn-green:hover {
        opacity: 0.9;
        transform: scale(1.05);
        color: white;
    }

    .btn-outline-green {
        border: 2px solid #2e7d32;
        color: #2e7d32;
        border-radius: 30px;
        padding: 10px 30px;
        transition: 0.3s;
    }

    .btn-outline-green:hover {
        background: #2e7d32;
        color: white;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }
</style>
</head>

<body>

<div class="welcome-card col-md-5 col-lg-4">
    <div class="welcome-icon">
        <i class="bi bi-person-check-fill"></i>
    </div>

    <h2 class="fw-bold">Welcome Back!</h2>
    <p class="mt-2">
        You have successfully logged in 🎉  
        We’re glad to see you again.
    </p>

    <hr>

    <div class="d-grid gap-2">
        <a href="#" class="btn btn-green">Go to Dashboard</a>
        <a href="edit_profile.php" class="btn btn-green">Edit Profile</a>
        <a href="logout.php" class="btn btn-outline-green">Logout</a>
    </div>
</div>

</body>
</html>
