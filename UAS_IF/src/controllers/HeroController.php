<?php
// src/controllers/HeroController.php
require_once __DIR__ . '/../models/Hero.php'; // Menggunakan __DIR__ untuk mendapatkan path absolut

class HeroController {

    // Menampilkan semua hero
    public function index() {
        $heroes = Hero::getAllHeroes();
        include __DIR__ . '/../views/hero_list.php';  // Perbaiki path dengan __DIR__
    }

    // Menyimpan hero baru atau update
    public function store($name, $role, $image) {
        // Validasi $name
        if (empty($name) || !preg_match('/^[a-zA-Z0-9 ]+$/', $name) || strlen($name) > 50) {
            echo "Nama hero tidak valid. Nama hanya boleh mengandung huruf, angka, dan spasi dengan panjang maksimal 50 karakter.";
            exit;
        }

    // Validasi $role
        $validRoles = ['warrior', 'mage', 'archer']; // Contoh daftar role yang valid
        if (empty($role) || !in_array($role, $validRoles)) {
            
            $_SESSION['alert'] = "Role hero tidak valid. Pilih salah satu: " . implode(', ', $validRoles);
            header("Location: /UAS_IF/heroes");
            exit;
        }
        // Membuat objek Hero dan menyimpan data
        $hero = new Hero(null, $name, $role, $image);
        $hero->save();
        header('Location: /UAS_IF/heroes');  // Redirect setelah menyimpan
    }

    // Fungsi update hero
    public function update($id, $name, $role, $image) {
        
         // Validasi $name
        if (empty($name) || !preg_match('/^[a-zA-Z0-9 ]+$/', $name) || strlen($name) > 50) {
            echo "Nama hero tidak valid. Nama hanya boleh mengandung huruf, angka, dan spasi dengan panjang maksimal 50 karakter.";
            exit;
        }

        // Validasi $role
        $validRoles = ['warrior', 'mage', 'archer']; // Contoh daftar role yang valid
        if (empty($role) || !in_array($role, $validRoles)) {
            $_SESSION['alert'] = "Role hero tidak valid. Pilih salah satu: " . implode(', ', $validRoles);
            header("Location: /UAS_IF/heroes");
            exit;
        }
    
        //update
        $hero = new Hero($id, $name, $role, $image);
        $hero->update();  // Memperbarui data hero
        header('Location: /UAS_IF/heroes');  // Redirect setelah mengupdate
    }

    // Menghapus hero
    public function destroy($id) {
        $hero = new Hero($id);
        $hero->delete();
        header('Location: /UAS_IF/heroes');  // Redirect setelah menghapus
    }
}
