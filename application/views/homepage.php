<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Lokasi dan Proyek</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { padding: 10px; border: 1px solid #ddd; }
        th { background-color: #f4f4f4; }
        a { margin-right: 10px; }
    </style>
</head>
<body>
    <h1>Daftar Lokasi dan Proyek</h1>

    <!-- Daftar Lokasi -->
    <section>
        <h2>List Lokasi</h2>
        <a href="<?php echo site_url('lokasi/create'); ?>">Tambah Lokasi Baru</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Lokasi</th>
                    <th>Negara</th>
                    <th>Provinsi</th>
                    <th>Kota</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($lokasi)): ?>
                    <?php foreach($lokasi as $l): ?>
                        <tr>
                            <td><?php echo $l['id']; ?></td>
                            <td><?php echo $l['namaLokasi']; ?></td>
                            <td><?php echo $l['negara']; ?></td>
                            <td><?php echo $l['provinsi']; ?></td>
                            <td><?php echo $l['kota']; ?></td>
                            <td>
                                <a href="<?php echo site_url('lokasi/edit/'.$l['id']); ?>">Edit</a>
                                <a href="<?php echo site_url('lokasi/delete/'.$l['id']); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus lokasi ini?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Tidak ada data lokasi.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>

    <!-- Daftar Proyek -->
    <section>
        <h2>List Proyek</h2>
        <a href="<?php echo site_url('proyek/create'); ?>">Tambah Proyek Baru</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Proyek</th>
                    <th>Client</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Pimpinan Proyek</th>
                    <th>Keterangan</th>
                    <th>Lokasi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($proyek)): ?>
                    <?php foreach($proyek as $p): ?>
                        <tr>
                            <td><?php echo $p['id']; ?></td>
                            <td><?php echo $p['namaProyek']; ?></td>
                            <td><?php echo $p['client']; ?></td>
                            <td><?php echo implode('-', $p['tglMulai']); ?></td>
                            <td><?php echo implode('-', $p['tglSelesai']); ?></td>
                            <td><?php echo $p['pimpinanProyek']; ?></td>
                            <td><?php echo $p['keterangan']; ?></td>
                            <td>
                                <?php if(!empty($p['lokasi'])): ?>
                                    <ul>
                                        <?php foreach($p['lokasi'] as $lok): ?>
                                            <li>
                                                <strong><?php echo $lok['namaLokasi']; ?></strong><br>
                                                Negara: <?php echo $lok['negara']; ?><br>
                                                Provinsi: <?php echo $lok['provinsi']; ?><br>
                                                Kota: <?php echo $lok['kota']; ?><br>
                                                Dibuat pada: <?php echo implode('-', $lok['createdAt']); ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo site_url('proyek/edit/'.$p['id']); ?>">Edit</a>
                                <a href="<?php echo site_url('proyek/delete/'.$p['id']); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus proyek ini?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9">Tidak ada data proyek.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>
</body>
</html>
