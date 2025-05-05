<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

<?php $this->load->view('header'); ?>

<h2>Edit Destinasi</h2>
<form method="post" action="<?= site_url('destination/update/' . $destination['id']) ?>" enctype="multipart/form-data">
    <label>Nama:</label><br>
    <input type="text" name="name" value="<?= $destination['name'] ?>" required><br><br>

    <label>Lokasi:</label><br>
    <input type="text" name="location" value="<?= $destination['location'] ?>" required><br><br>

    <label>Deskripsi:</label><br>
    <textarea name="description"><?= $destination['description'] ?></textarea><br><br>

    <label>Ganti Foto (opsional):</label><br>
    <input type="file" name="photo"><br><br>

    <img src="<?= base_url('assets/uploads/' . $destination['photo']) ?>" width="100"><br><br>

    <button type="submit">Update</button>
</form>

<?php $this->load->view('footer'); ?>
