<?php 
require_once 'src/models/User.php';

class UserController{

    // Menampilkan semua hero
    public function index() {
        $users = User::getAllUsers();
        include __DIR__ . '/../views/user_list.php';  // Perbaiki path dengan __DIR__
    }
    
}