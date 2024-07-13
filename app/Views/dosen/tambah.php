<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(to right, #f3e5f5, #f8bbd0); /* Cream and Pink gradient */
            font-family: Arial, sans-serif;
        }

        .card {
            margin: 20px auto;
            max-width: 500px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #e91e63; /* Pink */
            color: #fff;
            font-weight: bold;
            text-align: center;
        }

        .form-control {
            border-color: #e91e63; /* Pink border color */
        }

        .btn-success {
            background-color: #ffc107; /* Cream */
            border-color: #ffc107;
        }

        .btn-success:hover {
            background-color: #ffb300; /* Darker Cream on hover */
            border-color: #ffb300;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Tambah Data Dosen</h5>
        </div>
        <div class="card-body">
            <form method="post" action="<?= route_to('Dosen::simpan') ?>">
                <?php if (!empty(session()->getFlashdata('message'))) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            <?php foreach (session()->getFlashdata('message') as $error) : ?>
                                <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>

                <div class="mb-3">
                    <label for="nama_dosen" class="form-label">Nama Dosen</label>
                    <input type="text" name="nama_dosen" id="nama_dosen" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="matkul_dosen" class="form-label">Mata Kuliah</label>
                    <input type="text" name="matkul_dosen" id="matkul_dosen" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="alamat_dosen" class="form-label">Alamat</label>
                    <input type="text" name="alamat_dosen" id="alamat_dosen" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
