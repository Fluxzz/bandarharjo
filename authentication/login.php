<?php
session_start();
include('../koneksi.php');

if (isset($_SESSION['username'])) {
    header('Location: /index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Set notification message
        if ($user['role'] == 'admin') {
            $_SESSION['notification'] = 'Anda login sebagai admin';
        } else {
            $_SESSION['notification'] = 'Login sukses';
        }

        header('Location: /index.php');
        exit;
    } else {
        $error_message = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <img src="/assets/bandarharjo.jpeg" alt="Balai Kota Semarang" class="login-image"/>
            <div class="login-form">
                <h2>LOGIN</h2>

                <!-- Pesan error -->
                <?php if (isset($error_message)): ?>
                    <p id="error-message" style="color: red; text-align: center;"><?php echo $error_message; ?></p>
                <?php endif; ?>

                <form id="login-form" method="POST" action="">
                    <div class="input-field">
                        <input type="text" name="username" id="username" placeholder="Username" required>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                    <div class="options">
                        <label><input type="checkbox" name="remember"> Remember Me</label>
                    </div>
                    <button type="submit" class="login-button">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
