<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lokasi</title>
</head>
<body>
    <h1>Edit Lokasi</h1>
    <?php if (isset($lokasi) && !empty($lokasi)): ?>
    <form action="<?php echo site_url('lokasi/update/' . $lokasi['id']); ?>" method="post">
        <label for="nama_lokasi">Nama Lokasi:</label><br>
        <input type="text" id="nama_lokasi" name="namaLokasi" value="<?php echo htmlspecialchars($lokasi['namaLokasi']); ?>" required><br><br>
        
        <label for="negara">Negara:</label><br>
        <input type="text" id="negara" name="negara" value="<?php echo htmlspecialchars($lokasi['negara']); ?>" required><br><br>
        
        <label for="provinsi">Provinsi:</label><br>
        <input type="text" id="provinsi" name="provinsi" value="<?php echo htmlspecialchars($lokasi['provinsi']); ?>" required><br><br>
        
        <label for="kota">Kota:</label><br>
        <input type="text" id="kota" name="kota" value="<?php echo htmlspecialchars($lokasi['kota']); ?>" required><br><br>
        
        <input type="submit" value="Update">
        <a href="<?php echo site_url(''); ?>">Batal</a>
    </form>
    <?php else: ?>
    <p>Data lokasi tidak ditemukan.</p>
    <a href="<?php echo site_url('lokasi'); ?>">Kembali ke daftar lokasi</a>
    <?php endif; ?>
</body>
</html>
