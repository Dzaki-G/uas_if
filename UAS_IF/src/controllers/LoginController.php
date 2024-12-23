<?php 

require_once 'src/models/User.php'; // Pastikan model User sudah ada dan benar

class LoginController{

    public function index() {
        // $heroes = Hero::getAllHeroes();
        include __DIR__ . '/../views/login.php';  // Perbaiki path dengan __DIR__
    }

    // Menangani proses login
    public function authenticate() {
        // Ambil data dari POST request
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        // Validasi input
        if (empty($username) || empty($password)) {
            echo "Email dan password harus diisi.";
            return;
        }

        // Cari user berdasarkan username
        $user = User::findByUsername($username);

        if ($user && password_verify($password, $user->getPassword())) {
            // Jika login berhasil, simpan data user ke session
            session_start();
            $_SESSION['user_id'] = $user->getId();
            $_SESSION['username'] = $user->getUsername();
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['role'] = $user->getRole();

            echo "Login berhasil!";
            header("Location: /UAS_IF/heroes"); // Redirect ke halaman heroes setelah login
            exit;
        } 
        else {
            $_SESSION['alert'] = "Username atau Password salah.";
            header("Location: /UAS_IF/login");
            exit;
        }
    }

    // Logout user
    public function logout() {
        session_start();
        session_destroy(); // Hapus session
        echo "Logout berhasil!";
        header("Location: /UAS_IF/login"); // Redirect ke halaman login setelah logout
        exit;
    }
}   


?>