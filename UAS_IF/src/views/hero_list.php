<?php
if (isset($_SESSION['alert'])) {
    echo "<script>alert('" . $_SESSION['alert'] . "');</script>";
    unset($_SESSION['alert']); // Hapus alert setelah ditampilkan
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>122140030 Dzaki</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Global Styles */
        body {
            background-color: #1d1f23;
            color: #e1e1e1;
            font-family: 'Arial', sans-serif;
        }
        .title {
            font-family: 'Arial', sans-serif; 
            font-size: 36px; 
            font-weight: bold; 
            color: #ff4c4c; 
            text-align: center; 
            margin-top: 50px; 
            text-transform: uppercase; 
            letter-spacing: 2px;
        }
        h1 {
            color: #e63946;
            font-size: 36px;
            margin-bottom: 20px;
        }
        h2 {
            color: #e63946;
        }
        /* Table Styles */
        .table {
            background-color: #2d2f36;
            color: #e1e1e1;
            border-radius: 8px;
            overflow: hidden;
        }
        .table th, .table td {
            padding: 12px;
            text-align: left;
        }
        .table th {
            background-color: #33363a;
            color: #e63946;
        }
        .table tbody tr {
            background-color: #2a2c32;
        }
        .table tbody tr:hover {
            background-color: #3a3c43;
        }
        /* Button Styles */
       
        .btn-primary:hover {
            background-color: #d42e35;
            border-color: #d42e35;
        }
        .btn-danger {
            background-color: #e63946;
            border-color: #e63946;
        }
        .btn-danger:hover {
            background-color: #d42e35;
            border-color: #d42e35;
        }
        /* Modal Styles */
        .modal-content {
            background-color: #2d2f36;
            color: #e1e1e1;
            border-radius: 8px;
        }
        .modal-header {
            background-color: #33363a;
            border-bottom: 1px solid #444;
        }
        .modal-footer {
            background-color: #33363a;
            border-top: 1px solid #444;
        }
        .modal-title {
            color: #e63946;
        }
        .input-group .form-control {
            background-color: #2a2c32;
            border: 1px solid #444;
            color: #e1e1e1;
        }
        .input-group .form-control:focus {
            border-color: #e63946;
        }
        /* Container */
        .container {
            max-width: 1200px;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container d-flex flex-column align-items-center justify-content-center mt-5">
            <h1 class="title">Daftar Hero</h1>
            <div class="d-flex justify-content-between w-100 mb-3">
                <button class="btn btn-primary" onclick="openAddModal()">Add</button>
                <a href="/UAS_IF/user" class="btn btn-primary">Admin</a>
                <a href="/UAS_IF/logout" class="btn btn-danger">Logout</a>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; // Inisialisasi nomor urut ?>
                    <?php foreach ($heroes as $hero): ?>
                        <tr>
                            <td><?php echo $no++; ?></td> <!-- Menampilkan nomor urut -->
                            <td><?php echo $hero->name; ?></td>
                            <td><?php echo $hero->role; ?></td>
                            <td>
                                <a href="/UAS_IF/heroes/delete/<?php echo $hero->id; ?>" class="btn btn-danger">Hapus</a>
                                <button class="btn btn-primary" onclick="openEditModal(<?php echo $hero->id; ?>, '<?php echo $hero->name; ?>', '<?php echo $hero->role; ?>')">Edit</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    
    <!-- Modal -->
    <div class="modal fade" id="heroModal" tabindex="-1" aria-labelledby="heroModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="/UAS_IF/heroes/store" method="POST" enctype="multipart/form-data" id="heroForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="heroModalLabel">Tambah Hero Baru</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h2 id="modalTitle">Tambah Hero Baru</h2>

                        <!-- Input hidden untuk ID Hero -->
                        <input type="hidden" name="id" id="heroId">

                        <label for="name">Nama Hero:</label>
                        <div class="input-group mb-3">
                            <input class="form-control" type="text" name="name" id="heroName" required><br>
                        </div>

                        <label for="role">Role:</label>
                        <div class="input-group mb-3">
                            <input class="form-control" type="text" name="role" id="heroRole" required><br>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveButton">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container d-flex flex-column align-items-center justify-content-center mt-5">
        <!-- Existing table and other content -->
        
        <!-- Cookie Feature Section -->
        <div class="container mt-5 p-4" style="background-color: #2d2f36; border-radius: 8px;">
            <h2 class="text-center text-warning">Cookie Feature</h2>
            <div class="d-flex flex-column align-items-center">
                <div class="d-flex w-100 mb-3">
                    <input type="text" id="cookieInput" class="form-control me-2" placeholder="Enter Cookie Value" />
                    <button class="btn btn-primary me-2" onclick="setCookie()">Set Cookie</button>
                    <button class="btn btn-warning" onclick="getCookie()">Get Cookie</button>
                </div>
                <p id="cookieResult" class="text-light"></p>
            </div>
        </div>

        <!-- LocalStorage Feature Section -->
        <div class="container mt-5 p-4" style="background-color: #2d2f36; border-radius: 8px;">
            <h2 class="text-center text-info">Local Storage Feature</h2>
            <div class="d-flex flex-column align-items-center">
                <div class="d-flex w-100 mb-3">
                    <input type="text" id="storageInput" class="form-control me-2" placeholder="Enter Data" />
                    <button class="btn btn-primary" onclick="saveToLocalStorage()">Save Data</button>
                </div>
                <p id="storageResult" class="text-light"></p>
            </div>
        </div>
    </div>

    <script>
        // Cookie Feature Functions
        function setCookie() {
            // Delete existing cookie
            document.cookie = "cookie_value=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            
            // Set the new cookie value
            const value = document.getElementById('cookieInput').value;
            document.cookie = `cookie_value=${value}; path=/;`;

            // Confirm cookie is set
            document.getElementById('cookieResult').textContent = "Cookie set successfully.";
        }

        function getCookie() {
            // Get all cookies as a string
            const cookies = document.cookie;

            // Parse the cookies to find 'cookie_value'
            const match = cookies.match(/(?:^|; )cookie_value=([^;]*)/);
            const cookieValue = match ? match[1] : "No cookie found.";

            // Display the cookie value
            document.getElementById('cookieResult').textContent = `Cookie Value: ${cookieValue}`;
        }

        // LocalStorage Feature Functions
        function saveToLocalStorage() {
            // Clear existing data in localStorage for 'saved_data'
            localStorage.removeItem('saved_data');
            
            // Save new data to localStorage
            const value = document.getElementById('storageInput').value;
            localStorage.setItem('saved_data', value);

            // Display saved data
            document.getElementById('storageResult').textContent = `Saved Data: ${value}`;
        }
    </script>
    
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Menangani klik tombol edit dan menampilkan modal
    function openEditModal(heroId, heroName, heroRole) {
        // Set Judul Modal untuk Edit
        document.getElementById('heroModalLabel').textContent = 'Edit Hero';
        document.getElementById('modalTitle').textContent = 'Edit Hero';
        
        // Mengisi data yang ada di modal
        document.getElementById('heroId').value = heroId;
        document.getElementById('heroName').value = heroName;
        document.getElementById('heroRole').value = heroRole;

        // Ubah aksi form untuk update
        document.getElementById('heroForm').action = '/UAS_IF/heroes/update'; // Menggunakan route update
        
        // Menampilkan modal
        $('#heroModal').modal('show');
    }

    // Menangani klik tombol tambah hero dan menampilkan modal kosong
    function openAddModal() {
        // Set Judul Modal untuk Tambah
        document.getElementById('heroModalLabel').textContent = 'Tambah Hero Baru';
        document.getElementById('modalTitle').textContent = 'Tambah Hero Baru';

        // Kosongkan form
        document.getElementById('heroId').value = ''; // Kosongkan ID
        document.getElementById('heroName').value = ''; // Kosongkan nama
        document.getElementById('heroRole').value = ''; // Kosongkan role
        
        // Ubah aksi form untuk store (tambah)
        document.getElementById('heroForm').action = '/UAS_IF/heroes/store'; // Menggunakan route store
        
        // Menampilkan modal
        $('#heroModal').modal('show');
    }

    </script>
</body>
</html>
