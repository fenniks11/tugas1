<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-sm-6">

            <div class="card hovercard">
                <div class="cardheader">

                </div>
                <div class="avatar">
                    <img alt="" src="/img/fenni.jpg">
                </div>
                <div class="info">
                    <div class="title">
                        <h4>My Profile</h4>
                    </div>
                    <div class="desc">Mahasiswa IT</div>
                    <div class="desc">I want to be Web Dev.</div>
                    <div class="desc">Belajar terus, terus belajar!</div>
                </div>
                <div class="bottom">
                    <a class="btn btn-danger btn-sm" rel="publisher" href="https://web.facebook.com/fenni.kristiani.9/">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" rel="publisher" href="https://www.instagram.com/fennikrist/">
                        <i class="fa fa-instagram"></i>
                    </a>
                </div>
            </div>

        </div>

        <div class="col-6">
            <h1>Hello, World</h1>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>