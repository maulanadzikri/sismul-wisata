<?php $this->load->view('header'); ?>

<div class="detail-container">
    <div class="card">
        <h2 class="title"><?= $destination['name'] ?></h2>
        <div class="image-wrapper">
            <img src="<?= base_url('assets/uploads/' . $destination['photo']) ?>" alt="<?= $destination['name'] ?>" class="detail-img">
        </div>
        <div class="info">
            <p><span>📍 Lokasi:</span> <?= $destination['location'] ?></p>
            <p><span>📝 Deskripsi:</span><br><?= nl2br($destination['description']) ?></p>
        </div>
        <a href="<?= site_url('destination') ?>" class="btn-back">← Kembali ke daftar</a>
    </div>
</div>

<?php $this->load->view('footer'); ?>
