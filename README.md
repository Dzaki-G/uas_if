# UAS PEMROGRAMAN WEB RA - Dzaki Gastiadirrijal 122140030

## Cara menjalankan web pada port 3307
- Jalankan atau eksekusikan file .sql yang bernama uas_122140030 pada file "UAS_IF"
- pergi ke config -> DbConnection.php : ubahlah $servername = "localhost:3308"; menjadi $servername = "localhost:3307";
- jalankan pada xampp file bernama "index.php" pada folder UAS_IF
- akun admin yang bisa dipakai adalah username:admin email:admin@gmail.com password:admin123
- akun user yang bisa dipakai adalah username:user email:user@gmail.com password:user123

---

## Bagian 1: Client-side Programming 

### 1.1 Manipulasi DOM dengan JavaScript 
- **Form Input:**
  - Buat form HTML dengan minimal 4 elemen input (teks, checkbox, radio, dll.).
    <img src="readme_asset/register.png" width="auto" height="300" />
  - Tampilkan data dari server ke dalam sebuah tabel HTML menggunakan JavaScript.
  - Pada bagian ini digunakannya echo untuk menampilkan data user yang sudah registrasi.
    <img src="readme_asset/tampilan_register.png" width="auto" height="300" />
  

### 1.2 Event Handling 
- **Penanganan Event:** Tambahkan minimal 3 event berbeda untuk meng-handle form pada poin 1.1.
- **Validasi Input:** Gunakan JavaScript untuk validasi setiap input sebelum data diproses oleh server (PHP).
<img src="readme_asset/1.2.gif" width="400" height="auto" />
 <img src="readme_asset/validasi_script.png" width="auto" height="300" />
- Bagian ini akan memvalidasi setiap inputan user.

---

## Bagian 2: Server-side Programming 

### 2.1 Pengelolaan Data dengan PHP 
- Gunakan metode POST atau GET untuk menerima data dari formulir.
- Digunakannya metode POST pada bagian register.php

  <img src="readme_asset/post method.png" width="auto" height="300" />
  
- Lakukan parsing data dari variabel global dan validasi di sisi server.
- Dilakukannya parsing data dan memvalidasikan data pada login
  
  <img src="readme_asset/validasi login.png" width="auto" height="300" />
  
- Simpan data ke basis data termasuk jenis browser dan alamat IP pengguna.
- Jenis browser dan alamat IP pengguna akan disimpan pada database users dan bisa dilihat pada halaman /UAS_IF/user yang hanya bisa diakses oleh user yang memiliki role 'admin'
  
  <img src="readme_asset/2.1.gif" width="400" height="auto" />

### 2.2 Objek PHP Berbasis OOP 
- Buat sebuah objek PHP berbasis OOP dengan minimal dua metode.
- Gunakan objek tersebut dalam skenario tertentu.

  
<img src="readme_asset/OOP1.png" width="auto" height="300" />

<img src="readme_asset/OOP2.png" width="auto" height="300" />


---

## Bagian 3: Database Management 

### 3.1 Pembuatan Tabel Database 
- Buat tabel database yang sesuai dengan kebutuhan aplikasi.

### 3.2 Konfigurasi Koneksi Database 
- Konfigurasikan koneksi ke database menggunakan PHP.

### 3.3 Manipulasi Data pada Database 
- Lakukan operasi CRUD (Create, Read, Update, Delete) pada tabel database menggunakan PHP.



---

## Bagian 4: State Management 

### 4.1 State Management dengan Session 
- Gunakan `session_start()` untuk memulai sesi.
- Simpan informasi pengguna ke dalam sesi.



### 4.2 Pengelolaan State dengan Cookie dan Browser Storage 
- **Cookie:** Buat fungsi untuk menetapkan, mendapatkan, dan menghapus cookie menggunakan PHP.
- **Browser Storage:** Gunakan browser storage (localStorage atau sessionStorage) untuk menyimpan informasi secara lokal.



---

## Bagian Bonus: Hosting Aplikasi Web 
- (5%) Apa langkah-langkah yang Anda lakukan untuk meng-host aplikasi web Anda?
- (5%) Pilih penyedia hosting web yang menurut Anda paling cocok untuk aplikasi web Anda.
- (5%) Bagaimana Anda memastikan keamanan aplikasi web yang Anda host?
- (5%) Jelaskan konfigurasi server yang Anda terapkan untuk mendukung aplikasi web Anda.
