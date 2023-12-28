<?php
error_reporting(1);
require "base/koneksi.php";
include "pages/header.php";
?>
<div class="page-heading">
    <h3>Riwayat Penjualan</h3>
</div>
<section class="section">
    <div class="card">
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Atas Nama</th>
                        <th>Pesanan</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Pembayaran</th>
                        <th>Status</th>
                        <th>Tanggal Pesan</th>
                        <th>Waktu Pesan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $penjualan = "SELECT * FROM penjualan ORDER BY id ASC";
                    $result = $conn->query($penjualan);
                    while ($row = $result->fetch_array()) { ?>
                        <tr>
                            <td><?= ucfirst($row['atas_nama']); ?></td>
                            <td><?= $row['pesanan'] ?></td>
                            <td><?= $row['jumlah'] ?></td>
                            <td><?= "Rp " . rupiah($row['total']) ?></td>
                            <td><?= ucfirst($row['tipe_pembayaran']); ?></td>
                            <td><?= ucfirst($row['status']); ?></td>
                            <td><?= $row['tanggal_pesan'] ?></td>
                            <td><?= $row['waktu_pesan'] ?></td>
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