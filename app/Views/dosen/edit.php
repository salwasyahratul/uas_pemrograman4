<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Edit Dosen</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
      padding: 20px;
      background-color: #fce4ec; /* Cream background */
      font-family: Arial, sans-serif;
    }
    .card {
      max-width: 500px;
      margin: 0 auto;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    h1 {
      text-align: center;
      margin-bottom: 30px;
      color: #e91e63; /* Pink color */
    }
    .form-control {
      border-color: #e91e63; /* Pink border color */
    }
    .btn-success {
      background-color: #ffd54f; /* Cream button background */
      border-color: #ffd54f;
      color: #e91e63; /* Pink text color */
    }
    .btn-success:hover {
      background-color: #ffb300; /* Darker cream on hover */
      border-color: #ffb300;
      color: #e91e63; /* Pink text color on hover */
    }
    .btn-warning {
      background-color: #e91e63; /* Pink button background */
      border-color: #e91e63;
    }
    .btn-warning:hover {
      background-color: #d81b60; /* Darker pink on hover */
      border-color: #d81b60;
    }
  </style>
</head>
<body>
  <h1>Form Edit Dosen</h1>

  <!-- Flash messages -->
  <?php if (!empty(session()->getFlashdata('message'))) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <ul class="mb-0">
        <?php foreach (session()->getFlashdata('message') as $error) : ?>
          <li><?= esc($error) ?></li>
        <?php endforeach; ?>
      </ul>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif ?>

  <div class="card">
    <div class="card-body">
      <form method="post" action="<?= route_to('Dosen::update', $dosen['id_dosen']) ?>">
        <input type="hidden" name="_method" value="put">

        <div class="mb-3">
          <label for="nama_dosen" class="form-label">Nama</label>
          <input type="text" name="nama_dosen" id="nama_dosen" class="form-control" value="<?= esc($dosen['nama_dosen']) ?>" required>
        </div>

        <div class="mb-3">
          <label for="alamat_dosen" class="form-label">Alamat</label>
          <input type="text" name="alamat_dosen" id="alamat_dosen" class="form-control" value="<?= esc($dosen['alamat_dosen']) ?>" required>
        </div>

        <div class="mb-3">
          <label for="matkul_dosen" class="form-label">Mata Kuliah</label>
          <input type="text" name="matkul_dosen" id="matkul_dosen" class="form-control" value="<?= esc($dosen['matkul_dosen']) ?>" required>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-success btn-block">Simpan</button>
          <a href="<?= route_to('Dosen::index') ?>" class="btn btn-warning mt-3">Kembali</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
