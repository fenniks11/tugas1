<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container" style="background-color:floralwhite;">
    <h2 style="font-family: fantasy; color:forestgreen; text-align:center">Kontak</h2>
    <div class="row">

    </div>
</div>
<div class="container" style="width: 750px;">
    <div class="card-group">
        <?php foreach ($alamat as $a) : ?>

            <div class="card" style="width: 18rem;">
                <img src="/img/alamat.png" class="card-img-top" alt="...">
                <hr class="my-3">

                <div class="card-body">
                    <h5 class="card-text"><?= $a['tipe']; ?></h5>
                    <h5 class="card-text"><?= $a['alamat']; ?></h5>
                    <h5 class="card-text"><?= $a['kota']; ?></h5>
                </div>
            </div>
        <?php endforeach; ?>
        <?php foreach ($kampus as $k) : ?>
            <div class="card" style="width: 18rem;">
                <img src="/img/kampus.png" class="card-img-top" alt="...">
                <hr class="my-3">
                <div class="card-body">
                    <h5 class="card-text"><?= $k['tipe']; ?></h5>
                    <h5 class="card-text"><?= $k['alamat']; ?></h5>
                    <h5 class="card-text"><?= $k['kota']; ?></h5>
                </div>
            </div>
        <?php endforeach; ?>
        <?php foreach ($sosial as $s) : ?>
            <div class="card" style="width: 18rem;">
                <img src="/img/wa.png" class="card-img-top" alt="...">
                <hr class="my-3">
                <div class="card-body">
                    <h5 class="card-text"><?= $s['wa']; ?></h5>
                    <h5 class="card-text">

                        <a class="btn btn-outline-primary" href="https://web.facebook.com/fenni.kristiani.9/">
                            <i class="fa fa-facebook-official" aria-hidden="true"> Click it!</i></a>
                    </h5>
                </div>
            </div>
        <?php endforeach; ?>




    </div>

</div>

<?= $this->endSection(); ?>