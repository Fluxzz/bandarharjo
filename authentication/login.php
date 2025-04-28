<?php
session_start();

// Pastikan BASE_URL terdefinisi
define('BASE_URL', '/'); // <--- GANTI ini sesuai foldermu, misal '/bandarharjo/'

include_once(__DIR__ . '/../koneksi.php');

// Cek jika sudah login
if (isset($_SESSION['username'])) {
    header('Location: ' . BASE_URL . 'index.php');
    exit;
}

// Inisialisasi error message
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Lindungi dari SQL Injection
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    $query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Password harus dibandingkan (bisa plain text, tapi harusnya pakai password_hash)
        if ($user['password'] === $password) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Notifikasi sukses
            $_SESSION['notification'] = ($user['role'] == 'admin') ? 'Anda login sebagai admin' : 'Login sukses';

            header('Location: ' . BASE_URL . 'index.php');
            exit;
        } else {
            $error_message = "Password salah.";
        }
    } else {
        $error_message = "Username tidak ditemukan.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/login.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <img src="<?php echo BASE_URL; ?>assets/bandarharjo.jpeg" alt="Logo" class="login-image"/>
            <div class="login-form">
                <h2>LOGIN</h2>

                <?php if (!empty($error_message)): ?>
                    <p id="error-message" style="color: red; text-align: center;"><?php echo htmlspecialchars($error_message); ?></p>
                <?php endif; ?>

                <form id="login-form" method="POST" action="">
                    <div class="input-field">
                        <input type="text" name="username" placeholder="Username" required>
                        <input type="password" name="password" placeholder="Password" required>
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
