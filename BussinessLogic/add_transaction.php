<?php
require "../base/koneksi.php";

if (isset($_SESSION['username'])) {
    $tanggalPesan = time();
    $buyerName = $_SESSION['buyerName'];
    if (isset($_POST['bayar'])) {
        foreach ($_SESSION['cart'] as $cart => $value) {
            // $query .= "('$cart', '$value[nama]', '$value[harga]', '$value[jumlah]', '$value[total]', '$value[nama_tamu]', '$tanggalPesan')";
            $query = "INSERT INTO penjualan (atas_nama, pesanan, jumlah, total, status, tanggal_pesan) VALUES ('$buyerName', '$value[nama]', '$value[jumlah]', '$value[harga]', 'sukses', '$tanggalPesan')";
            $result = $conn->query($query);
            if ($result) {
                echo '<script>alert("Pembayaran Sukses")</script>';
                unset($_SESSION['cart']);
                unset($_SESSION['buyerName']);
                header("Location: ../order.php");
            } else {
                echo "Gagal";
            }
        }
    }
} else {
    header("Location: login.php");
}
