<?php
error_reporting(1);
require "../base/koneksi.php";
$message[] = "";
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']; //inisialisasi username dari login
    if ($_GET['id']) {
        $id = $_GET['id'];
        $query = $conn->query("DELETE FROM menu WHERE id = '$id'");
        if ($query) {
            $message = ['success', 'Data Berhasil Dihapus!'];
        } else {
            $message = ['failed', 'Data Gagal Dihapus!'];
        }
    }
} else {
    header("Location: " . BASE_URL . "login.php");
}
include "../pages/header.php";
?>
<div class="page-heading">
    <h3>Daftar Menu</h3>
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
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $menu = "SELECT * FROM menu ORDER BY id ASC";
                    $result = $conn->query($menu);
                    while ($row = $result->fetch_array()) { ?>
                        <tr>
                            <td><?= $row['nama_menu'] ?></td>
                            <td><?= "Rp " . rupiah($row['harga']) ?></td>
                            <td><?= ucfirst($row['kategori']); ?></td>
                            <td>
                                <a class="btn btn-primary" href="<?= BASE_URL . "adminLogic/edit.php" ?>?id=<?= $row['id'] ?>">Edit</a>
                                <a class="btn btn-danger" href="?id=<?= $row['id'] ?>" onclick="return confirm('Yakin mau hapus data ini ?')">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>


<script>
    $(document).ready(function() {
        $('#table1').DataTable();
    });
</script>

<?php
include "../pages/footer.php";
?>