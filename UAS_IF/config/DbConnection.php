<?php
// config/DbConnection.php

class DbConnection {
    private static $conn;

    // Constructor private untuk mencegah instansiasi
    private function __construct() {}

    // Menghubungkan ke database dan mengembalikan koneksi
    public static function getConnection() {
        if (self::$conn === null) {
            // Menambahkan pengaturan koneksi dari file .env atau pengaturan default
            $servername = "localhost:3308"; //port default adalah 3307, disini menggunakan 3308
            $username = "root";  // Sesuaikan dengan username database Anda
            $password = "";      // Sesuaikan dengan password database Anda
            $dbname = "uas_122140030";  // Nama database Anda

            // Membuat koneksi
            self::$conn = new mysqli($servername, $username, $password, $dbname);

            // Mengecek koneksi
            if (self::$conn->connect_error) {
                die("Koneksi gagal: " . self::$conn->connect_error);
            }
        }

        return self::$conn;
    }

    // Untuk menutup koneksi jika perlu
    public static function closeConnection() {
        if (self::$conn !== null) {
            self::$conn->close();
            self::$conn = null;
        }
    }
}
?>
