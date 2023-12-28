<?php
require "../base/koneksi.php";

$id = $_GET['id'];
$quantity = $_GET['quantity'];
$nama_tamu = $_GET['nama_tamu'];

$query = $conn->query("SELECT * FROM menu WHERE id = '$id'")->fetch_object();

//inisialiasi session product
$_SESSION["cart"][$id] = [
    'nama' => $query->nama_menu,
    'harga' => $query->harga,
    'jumlah' => $quantity,
    'nama_tamu' => $nama_tamu
];

header("Location: ../order.php");
