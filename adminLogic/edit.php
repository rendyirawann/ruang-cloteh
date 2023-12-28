<?php
error_reporting(1);
require "../base/koneksi.php";
$message[] = "";
if (isset($_SESSION['username']) && $_GET['id']) {

    $username = $_SESSION['username']; //inisialisasi username dari login
    $id = $_GET['id'];
    $queryUser = $conn->query("SELECT * FROM menu WHERE id = '$id'")->fetch_assoc();

    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $kategori = $_POST['kategori'];

        if (empty($nama) || empty($harga) || empty($kategori)) {
            $message = ['failed', 'Data tidak boleh kosong'];
        } else {
            $query = "UPDATE menu SET nama_menu = '$nama', harga = '$harga', kategori = '$kategori' WHERE id = '$id'";
            $result = $conn->query($query);
            if ($result) {
                $message = ['success', 'Data Berhasil Diubah!'];
            } else {
                $message = ['failed', 'Data Gagal Diubah!'];
            }
        }
    }
} else {
    header("Location: " . BASE_URL . "login.php");
}
include_once "../pages/header.php";
?>
<div class="page-heading">
    <h3>Edit Data Menu</h3>
</div>
<?php
if ($message[0] == "success") { ?>
    <script>
        Swal.fire('Berhasil!', '<?= $message[1] ?>', 'success');
    </script>
<?php } else if ($message[0] == "failed") { ?>
    <script>
        Swal.fire('Gagal!', '<?= $message[1] ?>', 'error');
    </script>
<?php } ?>

<section class="section">
    <div class="card">
        <div class="card-body">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="namaMenu">Nama Menu</label>
                            <input type="text" class="form-control" name="nama" id="namaMenu" value="<?= $queryUser['nama_menu']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="hargaMenu">Harga</label>
                            <input type="number" class="form-control" name="harga" id="hargaMenu" placeholder="10000" value="<?= $queryUser['harga']; ?>">
                        </div>

                        <label for="kategori">Kategori</label>
                        <select class="form-select" name="kategori" aria-label="Default select example">
                            <option value="<?= $queryUser['kategori']; ?>" hidden><?= ucfirst($queryUser['kategori']); ?></option>
                            <option value="kopi">Coffee</option>
                            <option value="non kopi">Non Coffe</option>
                            <option value="snack">Snacks</option>
                        </select>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-success mt-3">Edit Perubahan</button>
        </div>
        </form>

    </div>
</section>

<?php
include_once "../pages/footer.php";
?>