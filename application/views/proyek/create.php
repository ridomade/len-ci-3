<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Proyek</title>
</head>
<body>
    <h1>Tambah Proyek Baru</h1>
    <form action="<?php echo site_url('proyek/store'); ?>" method="post">
        <label for="nama_proyek">Nama Proyek:</label><br>
        <input type="text" id="nama_proyek" name="namaProyek" required><br><br>
        
        <label for="client">Client:</label><br>
        <input type="text" id="client" name="client" required><br><br>
        
        <label for="tgl_mulai">Tanggal Mulai:</label><br>
        <input type="date" id="tgl_mulai" name="tglMulai" required><br><br>
        
        <label for="tgl_selesai">Tanggal Selesai:</label><br>
        <input type="date" id="tgl_selesai" name="tglSelesai" required><br><br>
        
        <label for="pimpinan_proyek">Pimpinan Proyek:</label><br>
        <input type="text" id="pimpinan_proyek" name="pimpinanProyek"><br><br>
        
        <label for="keterangan">Keterangan:</label><br>
        <textarea id="keterangan" name="keterangan"></textarea><br><br>
        
        <label for="lokasi">Lokasi:</label><br>
        <select id="lokasi" name="lokasi[]" multiple>
            <?php if (!empty($lokasi)): ?>
                <?php foreach ($lokasi as $l): ?>
                    <option value="<?php echo $l['id']; ?>"><?php echo $l['namaLokasi']; ?></option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select><br><br>
        
        <input type="submit" value="Simpan">
        <a href="<?php echo site_url(''); ?>">Batal</a>
    </form>
</body>
</html>
