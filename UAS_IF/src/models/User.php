<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/UAS_IF/config/DbConnection.php';

// src/models/User.php
class User extends DbConnection{
    public $id;
    public $username;
    public $email;
    public $password;
    public $created_at;
    public $role;
    public $browser;
    public $ipAddress;

    // Konstruktor
    public function __construct($username, $email, $password, $created_at, $role, $id = null, $browser = null, $ipAddress = null) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->created_at = $created_at;
        $this->role = $role;
        $this->browser = $browser;
        $this->ipAddress = $ipAddress;
    }

    // Menyimpan data user baru ke database (Register)
    public function save() {
        $conn = DbConnection::getConnection();
        $browser = $_SERVER['HTTP_USER_AGENT'];
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        

        $stmt = $conn->prepare("INSERT INTO users (username, email, password, role, browser, ipAddress) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('ssssss', $this->username, $this->email, $this->password, $this->role, $browser, $ipAddress); // Use the already hashed password
        
        return $stmt->execute();
    }

    // Menemukan user berdasarkan email (Login)
    public static function findByUsername($username) {
        $conn = DbConnection::getConnection();
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $userData = $result->fetch_object();
        $stmt->close();
    
        if ($userData) {
            return new self($userData->username, $userData->email, $userData->password, $userData->created_at, $userData->role, $userData->id);
        }
        return null;
    }
    public static function getAllUsers() {
        $conn = DbConnection::getConnection();
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        $users = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = new User($row['username'], $row['email'],$row['password'], $row['created_at'], $row['role'], $row['id'], $row['browser'], $row['ipAddress']);
            }
        }
        return $users;
    }
    // Getters and Setters untuk properti
    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRole() {
        return $this->role;
    }


}


?>