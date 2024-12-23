<?php 
require_once 'src/models/User.php';

class RegisterController{

    public function index() {
        // $heroes = Hero::getAllHeroes();
        include __DIR__ . '/../views/register.php';  // Perbaiki path dengan __DIR__
    }

    // Menangani data yang dikirim dari form registrasi
    public function store() {
        // Ambil data dari POST request
        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // Validasi input
        if (empty($username) || empty($email) || empty($password)) {
            echo "Semua field harus diisi.";
            return;
        }

        // Periksa apakah email sudah terdaftar
        $userExists = User::findByUsername($username);
        if ($userExists) {
            $_SESSION['alert'] = "Username sudah digunakan. Silakan pilih username lain.";
            header("Location: /UAS_IF/register");
            exit;
        }

        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        //created at
        $created_at = date('Y-m-d H:i:s');

        //role akan diset default sebagai 'user' 
        $role = 'user';

        // Simpan data user ke database
        $user = new User($username, $email, $hashedPassword, $created_at, $role);
        if ($user->save()) {
            echo "Registrasi berhasil! Silakan login.";
            header("Location: /UAS_IF/login");
            exit;
        } else {
            echo "Registrasi gagal.";
        }
    }


}


?>