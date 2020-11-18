<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container my-5" style="width: 900px; margin:auto;">
    <div class="col">
        <h2 style="font-family:'Times New Roman', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Detail Buku</h2>
        <hr class="my-4">
        <div class="row no-gutters">
            <div class=col-md-2>
                <img src="/img/<?= $buku['sampul']; ?>" class="sampul" alt="...">
            </div>
            <div class=col-md-8>
                <div class="card-deck">

                    <div>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>Judul</td>
                                    <td> <?= $buku['judul']; ?></td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td>Penulis</td>
                                    <td> <?= $buku['penulis']; ?></td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td>Tahun Terbit</td>
                                    <td> <?= $buku['tahun']; ?></td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td>Penerbit</td>
                                    <td> <?= $buku['penerbit']; ?></td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td>Ringkasan</td>
                                    <td> <?= $buku['ringkasan']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-4">
        <div>
            <a href="/buku/edit/<?= $buku['slug']; ?>" class="btn btn-warning">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
            <form action="/buku/<?= $buku['id']; ?>" method="post" class="d-inline">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?');">
                    <i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</button>
            </form>
        </div>

    </div>
</div>
</div>
<?= $this->endSection(); ?>