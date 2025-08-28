<?php include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tanggal = $_POST['tanggal'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $jumlah = $_POST['jumlah'];

    $stmt = $conn->prepare("INSERT INTO pemasukan_lain (tanggal, kategori, deskripsi, jumlah) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $tanggal, $kategori, $deskripsi, $jumlah);
    $stmt->execute();
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tambah Pemasukan</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
  <h2>Tambah Pemasukan Lain</h2>
  <form method="post">
    <div class="mb-3">
      <label>Tanggal</label>
      <input type="date" name="tanggal" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Kategori</label>
      <select name="kategori" class="form-control">
        <option value="Bonus">Bonus</option>
        <option value="Pendapatan Lain">Pendapatan Lain</option>
      </select>
    </div>
    <div class="mb-3">
      <label>Deskripsi</label>
      <input type="text" name="deskripsi" class="form-control">
    </div>
    <div class="mb-3">
      <label>Jumlah</label>
      <input type="number" name="jumlah" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
  </form>
</body>
</html>
