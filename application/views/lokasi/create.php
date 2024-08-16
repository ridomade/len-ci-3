<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Lokasi</title>
</head>
<body>
    <h1>Tambah Lokasi Baru</h1>
    <form action="<?php echo site_url('lokasi/store'); ?>" method="post">
        <label for="nama_lokasi">Nama Lokasi:</label><br>
        <input type="text" id="nama_lokasi" name="namaLokasi" required><br><br>
        
        <label for="negara">Negara:</label><br>
        <input type="text" id="negara" name="negara" required><br><br>
        
        <label for="provinsi">Provinsi:</label><br>
        <input type="text" id="provinsi" name="provinsi" required><br><br>
        
        <label for="kota">Kota:</label><br>
        <input type="text" id="kota" name="kota" required><br><br>
        
        <input type="submit" value="Simpan">
        <a href="<?php echo site_url(''); ?>">Batal</a>
    </form>
</body>
</html>
