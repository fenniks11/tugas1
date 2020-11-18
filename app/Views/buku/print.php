<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title>
</head>

<body style="width: 900px">
    <div class="container">
        <div class="col">
            <div class="row">
                <table class="table" style="vertical-align: middle;">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Sampul Buku</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Tahun Terbit</th>
                            <th scope="col">Dibuat Pada</th>
                            <th scope="col">Diubah Pada</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                        <?php foreach ($buku as $b) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><img src="/img/<?= $b['sampul']; ?>" alt="" class="sampul" width="75px"></td>
                                <td><?= $b['judul']; ?></td>
                                <td><?= $b['penulis']; ?></td>
                                <td><?= $b['penerbit']; ?></td>
                                <td><?= $b['tahun']; ?></td>
                                <td><?= $b['created_at']; ?></td>
                                <td><?= $b['updated_at']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <script>
                    window.print();
                </script>
            </div>
        </div>
    </div>
</body>

</html>