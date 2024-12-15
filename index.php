<?php
// this page is to check if the username and ppassword are founds in the data base 
// also give the session value = 1 , if he i logged in 

require_once "connection.php";

if (
    isset($_POST['username']) && !empty($_POST['username'])
    && isset($_POST['username']) && !empty($_POST['username'])
) {
    $username = $_POST['username'];
    $pass = $_POST['password'];

    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$pass'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    if ($result->num_rows == 1) {
        session_start();
        $_SESSION['isLoggedin'] = 1;
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['password'] = $pass;
        $_SESSION['role_id'] =  $row['role'];
        header("location:home.php?id=" . $row['id']);
    } else {
        // you should enter a valid username and password
        $_SESSION['isLoggedin'] = 0;
    }
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg" style="width: 100%; max-width: 400px;">
        <div class="card-body">
            <h1 class="text-center mb-4">Login</h1>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
            <div class="text-center mt-3">
                <p class="mb-0">Not registered? <a href="Register/register.php" class="text-decoration-none">Create an account</a></p>
            </div>
        </div>
    </div>
</body>