<?php
$date = date("Y-m-d");

$check_order_today = mysqli_query($conn, "SELECT * FROM penjualan WHERE tanggal_pesan ='$date' ");


$oneday_ago = date('Y-m-d', strtotime("-1 days"));
$check_order_oneday_ago = mysqli_query($conn, "SELECT * FROM penjualan WHERE tanggal_pesan ='$oneday_ago'");

$twodays_ago = date('Y-m-d', strtotime("-2 days"));
$check_order_twodays_ago = mysqli_query($conn, "SELECT * FROM penjualan WHERE tanggal_pesan ='$twodays_ago'");

$threedays_ago = date('Y-m-d', strtotime("-3 days"));
$check_order_threedays_ago = mysqli_query($conn, "SELECT * FROM penjualan WHERE tanggal_pesan ='$threedays_ago'");

$fourdays_ago = date('Y-m-d', strtotime("-4 days"));
$check_order_fourdays_ago = mysqli_query($conn, "SELECT * FROM penjualan WHERE tanggal_pesan ='$fourdays_ago'");

$fivedays_ago = date('Y-m-d', strtotime("-5 days"));
$check_order_fivedays_ago = mysqli_query($conn, "SELECT * FROM penjualan WHERE tanggal_pesan ='$fivedays_ago'");

$sixdays_ago = date('Y-m-d', strtotime("-6 days"));
$check_order_sixdays_ago = mysqli_query($conn, "SELECT * FROM penjualan WHERE tanggal_pesan ='$sixdays_ago'");

$sevendays_ago = date('Y-m-d', strtotime("-7 days"));
$check_order_sevendays_ago = mysqli_query($conn, "SELECT * FROM penjualan WHERE tanggal_pesan ='$sevendays_ago'");

$tigapuluhdays_ago = date('Y-m-d', strtotime("-30 days"));
$check_order_tigapuluhdays_ago = mysqli_query($conn, "SELECT * FROM penjualan WHERE tanggal_pesan ='$tigapuluhdays_ago'");
