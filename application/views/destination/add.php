<?php $this->load->view('header'); ?>

<h2>Tambah Destinasi</h2>

<form action="<?= site_url('destination/add') ?>" method="post" enctype="multipart/form-data">
    <label for="name"><i ></i> Nama:</label>
    <input type="text" name="name" id="name" required>

    <label for="location"><i class="fas fa-location-dot"></i> Lokasi:</label>
    <input type="text" name="location" id="location" required>

    <label for="description"><i class="fas fa-align-left"></i> Deskripsi:</label>
    <textarea name="description" id="description" required></textarea>

    <label for="photo"><i class="fas fa-image"></i> Foto:</label>
    <input type="file" name="photo" id="photo" accept="image/*">

    <div class="form-buttons">
        <button class="btn" type="submit">Simpan</button>
        <a class="btn" href="<?= site_url('destination') ?>">Kembali ke Daftar</a>
    </div>
</form>

<?php $this->load->view('footer'); ?>
