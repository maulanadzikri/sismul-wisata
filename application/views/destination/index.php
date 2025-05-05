<?php $this->load->view('header'); ?>

<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

<h2>Daftar Destinasi Wisata</h2>
<a href="<?= site_url('destination/add'); ?>" class="btn">
    <i class="fas fa-plus-circle"></i> Tambah Destinasi
</a>

<table class="styled-table">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nama</th>
            <th>Lokasi</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($destinations as $d): ?>
        <tr>
            <td><img src="<?= base_url('assets/uploads/' . $d['photo']) ?>" width="100" class="thumb"></td>
            <td><?= $d['name'] ?></td>
            <td><?= $d['location'] ?></td>
            <td><?= $d['description'] ?></td>
            <td>
                <a href="<?= site_url('destination/editView/' . $d['id']) ?>" class="btn">Edit</a>
                <a href="<?= site_url('destination/delete/' . $d['id']) ?>" class="btn btn-danger" onclick="return confirm('Hapus destinasi ini?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php $this->load->view('footer'); ?>