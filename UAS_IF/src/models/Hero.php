<?php
// src/models/Hero.php
require_once $_SERVER['DOCUMENT_ROOT'] . '/UAS_IF/config/DbConnection.php';

class Hero  extends DbConnection{
    public $id;
    public $name;
    public $role;
    public $image;
    public $browser;
    public $ipAddress;

    // Constructor untuk inisialisasi properti
    public function __construct($id = null, $name = null, $role = null, $image = 'default_hero.jpg', $browser = null, $ipAddress = null) {
        $this->id = $id;
        $this->name = $name;
        $this->role = $role;
        $this->image = $image;
        $this->browser = $browser;
        $this->ipAddress = $ipAddress;
    }

    // Ambil semua hero
    public static function getAllHeroes() {
        $conn = DbConnection::getConnection();
        $sql = "SELECT * FROM heroes";
        $result = $conn->query($sql);

        $heroes = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $heroes[] = new Hero($row['id'], $row['name'], $row['role'], $row['image'], $row['browser'], $row['ip_address']);
            }
        }
        return $heroes;
    }

    // Simpan data hero baru atau update
    public function save() {
        $conn = DbConnection::getConnection();
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $browser = $_SERVER['HTTP_USER_AGENT'];

        $stmt = $conn->prepare("INSERT INTO heroes (name, role, image, ip_address, browser) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $this->name, $this->role, $this->image, $ipAddress, $browser);
    
        $stmt->execute();
        $stmt->close();
    }

    public function update() {
        $conn = DbConnection::getConnection();
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $browser = $_SERVER['HTTP_USER_AGENT'];

        $stmt = $conn->prepare("UPDATE heroes SET name = ?, role = ?, image = ?, ip_address = ?, browser = ? WHERE id = ?");
        $stmt->bind_param("sssssi", $this->name, $this->role, $this->image, $ipAddress, $browser, $this->id);

        $stmt->execute();
        $stmt->close();
    }

    // Hapus hero
    public function delete() {
        $conn = DbConnection::getConnection();
        
        $stmt = $conn->prepare("DELETE FROM heroes WHERE id = ?");
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $conn->query("ALTER TABLE heroes AUTO_INCREMENT = 1");
        
        $stmt->close();
    }
}
?>
