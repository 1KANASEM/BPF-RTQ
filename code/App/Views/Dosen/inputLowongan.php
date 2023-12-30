<section class="home">
    <div class="text fw-bold">Form Buat Lowongan</div>
    <div class="container-md p-2">
        <form method="POST" enctype="multipart/form-data" action="<?= URL; ?>/Dosen/buatLowongan/">
            <?php Flasher::flash(); ?>
            <input type="text" name="aktifitas" class="form-control mb-3" value="" required placeholder="Aktifitas">
            <input type="number" name="kuota" class="form-control mb-3" value="" required placeholder="Kuota">
            <input type="number" name="durasi_magang" class="form-control mb-3" value="" required placeholder="Durasi Magang">
            <input type="number" name="durasi_lowongan" class="form-control mb-3" value="" required placeholder="Durasi Lowongan">
            <input type="text" name="tanggal_magang" class="form-control mb-3" value="" onfocus="(this.type='date')" required placeholder="Tanggal Magang">
            <input type="text" name="deskripsi" class="form-control mb-3" value="" required placeholder="Deskripsi">
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</section>