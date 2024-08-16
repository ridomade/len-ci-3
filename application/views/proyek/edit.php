<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Proyek</title>
</head>
<body>
    <h1>Edit Proyek</h1>
    <form action="<?php echo site_url('proyek/update/'.$proyek['id']); ?>" method="post">
        <label for="nama_proyek">Nama Proyek:</label><br>
        <input type="text" id="nama_proyek" name="namaProyek" value="<?php echo htmlspecialchars($proyek['namaProyek']); ?>" required><br><br>
        
        <label for="client">Client:</label><br>
        <input type="text" id="client" name="client" value="<?php echo htmlspecialchars($proyek['client']); ?>" required><br><br>
        
        <label for="tgl_mulai">Tanggal Mulai:</label><br>
        <input type="date" id="tgl_mulai" name="tglMulai" value="<?php echo date('Y-m-d', strtotime(implode('-', $proyek['tglMulai']))); ?>" required><br><br>
        
        <label for="tgl_selesai">Tanggal Selesai:</label><br>
        <input type="date" id="tgl_selesai" name="tglSelesai" value="<?php echo date('Y-m-d', strtotime(implode('-', $proyek['tglSelesai']))); ?>" required><br><br>
        
        <label for="pimpinan_proyek">Pimpinan Proyek:</label><br>
        <input type="text" id="pimpinan_proyek" name="pimpinanProyek" value="<?php echo htmlspecialchars($proyek['pimpinanProyek']); ?>"><br><br>
        
        <label for="keterangan">Keterangan:</label><br>
        <textarea id="keterangan" name="keterangan"><?php echo htmlspecialchars($proyek['keterangan']); ?></textarea><br><br>
        
        <label for="lokasi">Lokasi:</label><br>
        <select id="lokasi" name="lokasi[]" multiple>
            <?php if (!empty($lokasi)): ?>
                <?php foreach ($lokasi as $l): ?>
                    <option value="<?php echo $l['id']; ?>" <?php echo in_array($l['id'], array_column($proyek['lokasi'], 'id')) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($l['namaLokasi']); ?>
                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select><br><br>
        
        <input type="submit" value="Update">
        <a href="<?php echo site_url(''); ?>">Batal</a>
    </form>
</body>
</html>
