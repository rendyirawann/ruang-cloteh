<?php
error_reporting(1);
require "base/koneksi.php";
require_once __DIR__ . '/vendor/autoload.php';

use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
// use Mike42\Escpos\CapabilityProfile;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\Printer;

$message = "";
$messageError = "";
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']; //inisialisasi username dari login
    // $quantity = $_POST['quantity'];
    $tanggalPesan = time();
    $buyerName = $_SESSION['buyerName'];
    $tanggal = date("Y-m-d", $tanggalPesan);
    $waktuPesan = date("H:i:s", $tanggalPesan);
    if (isset($_POST['bayar'])) {
        $tipe_pembayaran = $_POST['tipe_pembayaran'];
        if (empty($tipe_pembayaran)) {
            $messageError = "Tipe Pembayaran Harus Diisi";
        } else if (empty($buyerName)) {
            $messageError = "Nama Pembeli Harus Diisi";
        } else {
            foreach ($_SESSION['cart'] as $cart => $value) {
                // $query .= "('$cart', '$value[nama]', '$value[harga]', '$value[jumlah]', '$value[total]', '$value[nama_tamu]', '$tanggalPesan')";
                $query = "INSERT INTO penjualan (atas_nama, pesanan, jumlah, total, tipe_pembayaran, status, tanggal_pesan, waktu_pesan) VALUES ('$buyerName', '$value[nama]', '$value[jumlah]', '$value[harga]', '$tipe_pembayaran', 'sukses', '$tanggal', '$waktuPesan')";
                $result = $conn->query($query);
            }
            if ($result) {
                $message = "Pesanan Berhasil Dibuat";
                $connector = new WindowsPrintConnector("Thermal Printer");
                $printer = new Printer($connector);
                try {
                    $printer->initialize();
                    $printer->setJustification(Printer::JUSTIFY_CENTER);
                    $printer->bitImage(EscposImage::load("assets/images/logo/rc.jpg", false));
                    $printer->setTextSize(2, 2);
                    // $printer->text("Ruang Cloteh\n") . PHP_EOL;
                    $printer->text("\n");

                    //data transaksi
                    $printer->initialize();
                    $printer->text("Pembeli   : " . $_SESSION['buyerName'] . "\n");
                    $printer->text("Tanggal   : " . date("d-m-Y H:i:s") . "\n");

                    //membuat table
                    $printer->initialize();
                    $printer->text("--------------------------------\n");
                    $printer->text(buatBaris3Kolom("Menu", "Harga", "Jumlah"));
                    foreach ($_SESSION['cart'] as $cart => $value) {
                        $total = $value['harga'] * $value['jumlah'];
                        $grandTotal += $total;
                        $printer->text(buatBaris3Kolom($value['nama'], rupiah($total), $value['jumlah']));
                    }
                    $printer->initialize();
                    $printer->text("--------------------------------\n");
                    $printer->text(buatBaris3Kolom("Pembayaran", "", ucfirst($tipe_pembayaran)));
                    $printer->text(buatBaris3Kolom("Total", "", rupiah($grandTotal)));

                    //footer
                    $printer->initialize();
                    $printer->setJustification(Printer::JUSTIFY_CENTER);
                    $printer->text("\n");
                    $printer->text("Tiada Hari Tanpa Sebuah Cerita\n");
                    $printer->cut();
                    $printer->close();
                } catch (Exception $e) {
                    die("Couldn't print to this printer: " . $e->getMessage()) . "\n";
                }
                unset($_SESSION['cart']);
                unset($_SESSION['buyerName']);
            } else {
                $messageError = "Gagal!";
            }
        }
    }
} else {
    header("Location: login.php");
}
include "pages/header.php";
?>
<div class="page-heading">
    <h3>Order</h3>
</div>
<div class="col-sm-4">
    <?php
    if (isset($_POST['addBuyerName'])) {
        $_SESSION['buyerName'] = $_POST['buyerName'];
    } ?>
    <form action="" method="post">
        <div class="card">
            <h5 class="card-header">Nama Pembeli</h5>
            <div class="card-body">
                <input class="form-control" type="text" id="namaPembeli" name="buyerName" placeholder="Nama Pembeli">
                <button type="submit" name="addBuyerName" class="btn btn-success mb-3 mt-3">Tambah</button>
            </div>
        </div>
    </form>
    <br>
</div>
<section class="section">
    <?php
    if ($message != null) { ?>
        <script>
            Swal.fire('Berhasil!', '<?= $message ?>', 'success');
        </script>
    <?php } else if ($messageError != null) { ?>
        <script>
            Swal.fire('Gagal!', '<?= $messageError ?>', 'error');
        </script>
    <?php } ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="coffee-tab" data-bs-toggle="tab" href="#coffee" role="tab" aria-controls="coffee" aria-selected="true">Coffee</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="nonCoffee-tab" data-bs-toggle="tab" href="#nonCoffee" role="tab" aria-controls="nonCoffee" aria-selected="false">Non Coffee</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="snack-tab" data-bs-toggle="tab" href="#snack" role="tab" aria-controls="snack" aria-selected="false">Snacks</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="coffee" role="tabpanel" aria-labelledby="coffee-tab">
                            <div class="row">
                                <?php
                                $coffee = $conn->query("SELECT * FROM menu WHERE kategori = 'kopi'");
                                while ($row = $coffee->fetch_assoc()) { ?>
                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                        <div class="mt-5 card border mb-3" style="max-width: 18rem;">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $row['nama_menu']; ?></h5>
                                                <p class="card-text"><?= rupiah($row['harga']); ?></p>
                                                <input class="form-control form-control-sm quantity" name="quantity" type="number" id="input_<?= $row['id']; ?>" placeholder=" Jumlah" value="1"><br>
                                                <button class="btn btn-primary add-order" id="<?= $row['id']; ?>" onclick="addOrder(<?= $row['id']; ?>);">Tambah</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nonCoffee" role="tabpanel" aria-labelledby="nonCoffee-tab">
                            <div class="row">
                                <?php
                                $nonCoffee = $conn->query("SELECT * FROM menu WHERE kategori = 'non kopi'");
                                while ($row = $nonCoffee->fetch_assoc()) { ?>
                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                        <div class="mt-5 card border mb-3" style="max-width: 18rem;">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $row['nama_menu']; ?></h5>
                                                <p class="card-text"><?= rupiah($row['harga']); ?></p>
                                                <input class="form-control form-control-sm quantity" name="quantity" type="number" id="input_<?= $row['id']; ?>" placeholder=" Jumlah" value="1"><br>
                                                <button class="btn btn-primary add-order" id="<?= $row['id']; ?>" onclick="addOrder(<?= $row['id']; ?>);">Tambah</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class=" tab-pane fade" id="snack" role="tabpanel" aria-labelledby="snack-tab">
                            <div class="row">
                                <?php
                                $snack = $conn->query("SELECT * FROM menu WHERE kategori = 'snack'");
                                while ($row = $snack->fetch_assoc()) { ?>
                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                        <div class="mt-5 card border mb-3" style="max-width: 18rem;">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $row['nama_menu']; ?></h5>
                                                <p class="card-text"><?= rupiah($row['harga']); ?></p>
                                                <input class="form-control form-control-sm quantity" name="quantity" type="number" id="input_<?= $row['id']; ?>" placeholder=" Jumlah" value="1"><br>
                                                <button class="btn btn-primary add-order" id="<?= $row['id']; ?>" onclick="addOrder(<?= $row['id']; ?>);">Tambah</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="page-heading">
    <h3>Keranjang</h3>
</div>

<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header"> Nama Pembeli : <?= $_SESSION['buyerName']; ?></h5>
                <div class="card-body">
                    <?php if (!empty($_SESSION['cart'])) { ?>
                        <!-- Table with outer spacing -->
                        <div class="table-responsive">
                            <table class="table table-lg">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Menu</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $grandTotal = 0;
                                    foreach ($_SESSION['cart'] as $cart => $value) {
                                        $total = $value['harga'] * $value['jumlah'];
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td id="namaPayment"><?= $value['nama']; ?></td>
                                            <td><?= $value['jumlah']; ?></td>
                                            <td><?= rupiah($value['harga']); ?></td>
                                            <td><?= rupiah($total); ?></td>
                                            <td>
                                                <a href="<?= BASE_URL ?>BussinessLogic/delete_cart.php?id=<?= $cart; ?>" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php
                                        $grandTotal += $total;
                                    } ?>
                                    <tr>
                                        <th colspan="4" class="text-right">Total</th>
                                        <th id="total"><?= rupiah($grandTotal); ?></th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-right"></td>
                                        <td>
                                            <form action="" method="post">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tipe_pembayaran" id="inlineRadio1" value="dana">
                                                    <label class="form-check-label" for="inlineRadio1">Dana</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tipe_pembayaran" id="inlineRadio2" value="cash" checked>
                                                    <label class="form-check-label" for="inlineRadio2">Cash</label>
                                                </div>
                                                <button type="submit" name="bayar" class="btn btn-success justify-content-end" onclick="return confirm('Yakin udah dibayar ?');">Bayar</button>
                                            </form>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- Table with no outer spacing -->
                    <?php } else { ?>
                        <b>Keranjang Kosong</b>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    //change value quantity
    const addOrder = (id) => {
        const quantity = document.getElementById(`input_${id}`).value;
        // console.log(`Id : ` + id, `Quantity : ` + quantity);
        $.ajax({
            url: '<?= BASE_URL ?>BussinessLogic/add_cart.php',
            method: 'GET',
            data: {
                id: id,
                quantity: quantity
            },
            success: function(response) {
                location.reload();
                console.log("sukses tambah data");
            }
        });
    }
</script>
<?php
include "pages/footer.php";
?>