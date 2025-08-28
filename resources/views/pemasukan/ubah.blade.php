<?php
include 'db.php';

$id = $_GET['id'] ?? null;
$action = $_GET['action'] ?? null;

if (!$id || !$action) {
    header("Location: index.php");
    exit;
}

// Jika AKSI = HAPUS
if ($action === 'hapus') {
    $conn->query("DELETE FROM pemasukan_lain WHERE id=$id");
    header("Location: index.php");
    exit;
}

// Jika AKSI = EDIT
$result = $conn->query("SELECT * FROM pemasukan_lain WHERE id=$id");
$data = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tanggal = $_POST['tanggal'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $jumlah = $_POST['jumlah'];

    $stmt = $conn->prepare("UPDATE pemasukan_lain SET tanggal=?, kategori=?, deskripsi=?, jumlah=? WHERE id=?");
    $stmt->bind_param("sssii", $tanggal, $kategori, $deskripsi, $jumlah, $id);
    $stmt->execute();
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Pemasukan</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
  <h2>Edit Pemasukan</h2>
  <form method="post">
    <div class="mb-3">
      <label>Tanggal</label>
      <input type="date" name="tanggal" class="form-control" value="<?= $data['tanggal'] ?>" required>
    </div>
    <div class="mb-3">
      <label>Kategori</label>
      <select name="kategori" class="form-control">
        <option value="Bonus" <?= $data['kategori'] == 'Bonus' ? 'selected' : '' ?>>Bonus</option>
        <option value="Pendapatan Lain" <?= $data['kategori'] == 'Pendapatan Lain' ? 'selected' : '' ?>>Pendapatan Lain</option>
      </select>
    </div>
    <div class="mb-3">
      <label>Deskripsi</label>
      <input type="text" name="deskripsi" class="form-control" value="<?= $data['deskripsi'] ?>">
    </div>
    <div class="mb-3">
      <label>Jumlah</label>
      <input type="number" name="jumlah" class="form-control" value="<?= $data['jumlah'] ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
  </form>
</body>
</html>
