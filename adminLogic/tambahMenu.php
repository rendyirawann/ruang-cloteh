<?php
error_reporting(1);
require "../base/koneksi.php";
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']; //inisialisasi username dari login

    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $kategori = $_POST['kategori'];

        if (empty($nama) || empty($harga) || empty($kategori)) {
            echo '<script>alert("Data tidak boleh kosong")</script>';
        } else {
            $query = "INSERT INTO menu (nama_menu, harga, kategori, image) VALUES ('$nama', '$harga', '$kategori', NULL)";
            $result = $conn->query($query);
            if ($result) {
                echo '<script>alert("Data berhasil ditambahkan")</script>';
            } else {
                echo '<script>alert("Data gagal ditambahkan")</script>';
            }
        }
    }
} else {
    header("Location: " . BASE_URL . "login.php");
}
include_once "../pages/header.php";
?>
<div class="page-heading">
    <h3>Tambah Data Menu</h3>
</div>
<section class="section">
    <div class="card">
        <div class="card-body">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="namaMenu">Nama Menu</label>
                            <input type="text" class="form-control" name="nama" id="namaMenu" placeholder="Ex : Kentang Goreng">
                        </div>

                        <div class="form-group">
                            <label for="hargaMenu">Harga</label>
                            <input type="number" class="form-control" name="harga" id="hargaMenu" placeholder="10000">
                        </div>

                        <label for="kategori">Kategori</label>
                        <select class="form-select" name="kategori" aria-label="Default select example">
                            <option value="kopi">Coffee</option>
                            <option value="non kopi">Non Coffe</option>
                            <option value="snack">Snacks</option>
                        </select>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-success mt-3">Tambah</button>
        </div>
        </form>

    </div>
</section>

<?php
include_once "../pages/footer.php";
?>