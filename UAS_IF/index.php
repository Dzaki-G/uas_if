<?php
// index.php

// Mengatur pengaturan error PHP untuk debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Menyertakan file yang diperlukan
require_once 'src/controllers/HeroController.php';
require_once 'src/controllers/RegisterController.php';
require_once 'src/controllers/LoginController.php';
require_once 'src/controllers/UserController.php';

// Fungsi untuk memeriksa apakah pengguna sudah login
function checkLogin() {
    if (!isset($_SESSION['user_id'])) {
        $_SESSION['alert'] = "Anda harus login terlebih dahulu.";
        header("Location: /UAS_IF/login");
        exit;
    }
}

// Fungsi untuk menangani routing
function handleRequest() {
    session_start();

    // Mendapatkan URL yang diminta
    $requestUri = $_SERVER['REQUEST_URI'];
    $requestMethod = $_SERVER['REQUEST_METHOD'];

    switch ($requestUri) {
        case '/UAS_IF/':
            $registerController = new RegisterController();
            $registerController->index();
            break;

        case '/UAS_IF/login':
            $loginController = new LoginController();
            if ($requestMethod == 'POST') {
                $loginController->authenticate();
            } else {
                $loginController->index();
            }
            break;

        case '/UAS_IF/register':
            $registerController = new RegisterController();
            if ($requestMethod == 'POST') {
                $registerController->store();
            } else {
                $registerController->index();
            }
            break;

        case '/UAS_IF/heroes':
            checkLogin();
            $heroController = new HeroController();
            $heroController->index();
            break;

        case (preg_match('/^\/UAS_IF\/heroes\/delete\/(\d+)$/', $requestUri, $matches) ? true : false):
            checkLogin();
            $heroController = new HeroController();
            $heroController->destroy($matches[1]);
            break;

        case '/UAS_IF/heroes/store':
            checkLogin();
            if ($requestMethod == 'POST') {
                $name = $_POST['name'] ?? '';
                $role = $_POST['role'] ?? '';
                $image = $_FILES['image']['name'] ?? 'default_hero.jpg';
                $heroController = new HeroController();
                $heroController->store($name, $role, $image);
            } else {
                echo 'Metode tidak valid';
            }
            break;

        case '/UAS_IF/heroes/update':
            checkLogin();
            if ($requestMethod == 'POST') {
                $id = $_POST['id'] ?? '';
                $name = $_POST['name'] ?? '';
                $role = $_POST['role'] ?? '';
                $image = $_FILES['image']['name'] ?? '';
                $heroController = new HeroController();
                $heroController->update($id, $name, $role, $image);
            }
            break;

        case '/UAS_IF/user':
            checkLogin();
            $userController = new UserController();
            $userController->index();
            break;

        case '/UAS_IF/logout':
            session_start();
            session_unset();
            session_destroy();
            header('Location: /UAS_IF/login');
            exit;

        default:
            echo 'Halaman tidak ditemukan';
            break;
    }
}

// Menjalankan permintaan
handleRequest();
?>
