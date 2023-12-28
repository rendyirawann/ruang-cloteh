<?php
error_reporting(1);
require "base/koneksi.php";
if (isset($_SESSION['username'])) {
    include "pages/chart.php";
    $username = $_SESSION['username']; //inisialisasi username dari login
    $queryUser = "SELECT * FROM users WHERE username = '$username'";
    $resultUser = $conn->query($queryUser)->fetch_assoc();

    //total penjualan
    $resultJualan = $conn->query("SELECT * FROM penjualan WHERE status = 'sukses'");
    $resultJualan = mysqli_num_rows($resultJualan);

    //total menu
    $resultMenu = $conn->query("SELECT * FROM menu");
    $resultMenu = mysqli_num_rows($resultMenu);

    //pendapatan hari ini
    $resultHariIni = $conn->query("SELECT SUM(total) AS total FROM penjualan WHERE status = 'sukses' AND tanggal_pesan = CURDATE()")->fetch_assoc();
    $pendapatanHariIni = $resultHariIni['total'];
} else {
    header("Location: login.php");
}
include "pages/header.php";
?>
<!-- Heading -->
<div class="page-heading">
    <h3>Dashboard</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Total Penjualan</h6>
                                    <h6 class="font-extrabold mb-0"><?= $resultJualan; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Total Menu</h6>
                                    <h6 class="font-extrabold mb-0"><?= $resultMenu; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body px-6 py-4-5">
                            <div class="row float-start" style="margin-left:3px">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Hari Ini</h6>
                                    <h6 class="font-extrabold mb-0"><?= rupiah($pendapatanHariIni); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Penjualan Harian</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="penjualan-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    var ctx = document.getElementById("penjualan-chart");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["<?php echo $sevendays_ago; ?>", "<?php echo $sixdays_ago; ?>", "<?php echo $fivedays_ago; ?>", "<?php echo $fourdays_ago; ?>", "<?php echo $threedays_ago; ?>", "<?php echo $twodays_ago; ?>", "<?php echo $oneday_ago; ?>", "<?php echo $date; ?>"],
            datasets: [{
                label: 'Pembelian',
                data: [<?php echo mysqli_num_rows($check_order_sevendays_ago); ?>, <?php echo mysqli_num_rows($check_order_sixdays_ago); ?>, <?php echo mysqli_num_rows($check_order_fivedays_ago); ?>, <?php echo mysqli_num_rows($check_order_fourdays_ago); ?>, <?php echo mysqli_num_rows($check_order_threedays_ago); ?>, <?php echo mysqli_num_rows($check_order_twodays_ago); ?>,
                    <?php echo mysqli_num_rows($check_order_oneday_ago); ?>, <?php echo mysqli_num_rows($check_order_today); ?>
                ],
                fill: false,
                backgroundColor: [
                    'rgba(18, 137, 222, 3)'
                ],
                borderColor: [
                    'rgba(18, 137, 222, 5)'
                ],
            }]
        },

    });
</script>

<?php
include_once "pages/footer.php";
?>