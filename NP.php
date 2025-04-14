<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Diskon Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        
        .combined-card {
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container py-8">
        <h1 class="text-3xl font-bold text-center mb-8 text-blue-600">Sistem Diskon Barang</h1>
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="combined-card bg-white p-6 mb-6">
                    <h2 class="text-xl font-semibold mb-4">Form Input Barang</h2>
                    
                    <form method="post" class="space-y-4">
                        <div class="form-group">
                            <label for="nama_barang" class="form-label block text-gray-700 mb-2">Nama Barang</label>
                            <input type="text" id="nama_barang" name="nama_barang" 
                                   class="form-control w-full px-3 py-2 border border-gray-300 rounded-md" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="harga_awal" class="form-label block text-gray-700 mb-2">Harga Awal (Rp)</label>
                            <input type="number" id="harga_awal" name="harga_awal" 
                                   class="form-control w-full px-3 py-2 border border-gray-300 rounded-md" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="diskon" class="form-label block text-gray-700 mb-2">Diskon (%)</label>
                            <input type="number" id="diskon" name="diskon" min="0" max="100" 
                                   class="form-control w-full px-3 py-2 border border-gray-300 rounded-md" required>
                        </div>
                        
                        <button type="submit" name="hitung" 
                                class="btn btn-primary bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition duration-300">
                            Hitung Diskon
                        </button>
                    </form>
                </div>
                
                <?php
                if (isset($_POST['hitung'])) {
                    $nama_barang = htmlspecialchars($_POST['nama_barang']);
                    $harga_awal = (float)$_POST['harga_awal'];
                    $diskon = (float)$_POST['diskon'];
                    
                    // Hitung diskon
                    $nilai_diskon = $harga_awal * ($diskon / 100);
                    $harga_setelah_diskon = $harga_awal - $nilai_diskon;
                    
                    // Format angka
                    $harga_awal_formatted = number_format($harga_awal, 0, ',', '.');
                    $nilai_diskon_formatted = number_format($nilai_diskon, 0, ',', '.');
                    $harga_setelah_diskon_formatted = number_format($harga_setelah_diskon, 0, ',', '.');
                ?>
                
                <div class="combined-card bg-white p-6 mt-6">
                    <h2 class="text-xl font-semibold mb-4">Hasil Perhitungan Diskon</h2>
                    
                    <div class="table-responsive">
                        <table class="table table-striped w-full">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="px-4 py-2">Nama Barang</th>
                                    <th class="px-4 py-2">Harga Awal</th>
                                    <th class="px-4 py-2">Diskon</th>
                                    <th class="px-4 py-2">Nilai Diskon</th>
                                    <th class="px-4 py-2">Harga Setelah Diskon</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border px-4 py-2"><?= $nama_barang ?></td>
                                    <td class="border px-4 py-2">Rp <?= $harga_awal_formatted ?></td>
                                    <td class="border px-4 py-2"><?= $diskon ?>%</td>
                                    <td class="border px-4 py-2">Rp <?= $nilai_diskon_formatted ?></td>
                                    <td class="border px-4 py-2 font-bold text-green-600">Rp <?= $harga_setelah_diskon_formatted ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                  
                    <div class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
                        <h3 class="text-lg font-medium text-blue-800 mb-2">Detail Diskon</h3>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-gray-700">Anda hemat:</span>
                            <span class="font-bold text-red-600">Rp <?= $nilai_diskon_formatted ?></span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-700">Total yang harus dibayar:</span>
                            <span class="font-bold text-green-600 text-xl">Rp <?= $harga_setelah_diskon_formatted ?></span>
                        </div>
                    </div>
                </div>
                
                <?php } ?>
            </div>
        </div>
    </div>
    
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>