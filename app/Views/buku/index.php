<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>
<div class="container my-5" style="background-color: aliceblue; width: 900px">
    <div class="row">
        <div class="col-6">
            <h1 class="mt-3" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Daftar Buku</h1>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari.." name="cari">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="submit"><i>
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-6">
            <a href="/buku/create" class="btn btn-outline-primary my-3" data-toggle="tooltip" data-placement="left" title="Tambah Data" style="float: right;">
                <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
            <div>

                <a href="/buku/print" class="btn btn-danger my-3" data-toggle="tooltip" data-placement="left" title="Print Laporan" style="float:right;">
                    <i class="fa fa-print" aria-hidden="true"></i></a>
            </div>



        </div>
        <div class="row">
            <div class="col">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Sampul Buku</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                        <?php foreach ($buku as $b) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><img src="/img/<?= $b['sampul']; ?>" alt="" class="card-img"></td>
                                <td><?= $b['judul']; ?></td>
                                <td><?= $b['penulis']; ?></td>
                                <td>
                                    <a href="/buku/<?= $b['slug']; ?>" class="btn btn-outline-success">
                                        <i class="fa fa-info-circle" aria-hidden="true"> Detail</i></a>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('buku', 'buku_pagination'); ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>