<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f3e5f5; /* Cream */
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #e91e63; /* Pink */
            padding-top: 10px;
            padding-bottom: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: #fff;
        }

        .card {
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #e91e63; /* Pink */
            color: #fff;
            font-weight: bold;
            border-bottom: none;
        }

        .btn-success {
            background-color: #e91e63; /* Pink */
            border-color: #e91e63;
        }

        .btn-success:hover {
            background-color: #c2185b; /* Darker Pink */
            border-color: #c2185b;
        }

        .btn-primary {
            background-color: #8e24aa; /* Purple */
            border-color: #8e24aa;
        }

        .btn-primary:hover {
            background-color: #7b1fa2; /* Darker Purple */
            border-color: #7b1fa2;
        }

        .btn-danger {
            background-color: #f44336; /* Red */
            border-color: #f44336;
        }

        .btn-danger:hover {
            background-color: #e53935; /* Darker Red */
            border-color: #e53935;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #000;
            padding: 12px;
            text-align: left;
        }

        .table th {
            background-color: #8e24aa; /* Purple */
            color: #fff;
            font-weight: bold;
            vertical-align: middle;
            text-align: center;
            font-size: 16px;
        }

        .table td {
            vertical-align: middle;
            font-size: 14px;
        }

        .table tbody tr:nth-child(even) {
            background-color: #fce4ec; /* Light Pink */
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"></a>
        </div>
    </nav>

    <div class="container mt-5">
        <?php if (!empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif ?>

        <a href="<?= route_to('Dosen::tambah') ?>" class="btn btn-success mb-3">Tambah Data</a>

        <div class="card">
            <div class="card-header">
                Daftar Dosen
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="border: 1px solid #000; padding: 12px; background-color: #8e24aa; color: #fff; text-align: center; font-weight: bold; font-size: 16px;">Nama Dosen</th>
                                <th style="border: 1px solid #000; padding: 12px; background-color: #8e24aa; color: #fff; text-align: center; font-weight: bold; font-size: 16px;">Mata Kuliah</th>
                                <th style="border: 1px solid #000; padding: 12px; background-color: #8e24aa; color: #fff; text-align: center; font-weight: bold; font-size: 16px;">Alamat</th>
                                <th style="border: 1px solid #000; padding: 12px; background-color: #8e24aa; color: #fff; text-align: center; font-weight: bold; font-size: 16px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $dosen) : ?>
                            <tr>
                                <td style="border: 1px solid #000; padding: 12px; text-align: left;"><?= $dosen['nama_dosen'] ?></td>
                                <td style="border: 1px solid #000; padding: 12px; text-align: left;"><?= $dosen['matkul_dosen'] ?></td>
                                <td style="border: 1px solid #000; padding: 12px; text-align: left;"><?= $dosen['alamat_dosen'] ?></td>
                                <td style="border: 1px solid #000; padding: 12px; text-align: center;">
                                    <a href="<?= route_to('Dosen::edit', $dosen['id_dosen']); ?>"
                                        class="btn btn-primary btn-sm me-2">Edit</a>
                                    <a href="<?= route_to('Dosen::hapus', $dosen['id_dosen']); ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
                                    <a href="<?= route_to('Dosen::hadir', $dosen['id_dosen']); ?>"
                                        class="btn btn-primary btn-sm me-2">Hadir</a>
                                    <a href="<?= route_to('Dosen::tidak', $dosen['id_dosen']); ?>"
                                        class="btn btn-primary btn-sm">Tidak</a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
