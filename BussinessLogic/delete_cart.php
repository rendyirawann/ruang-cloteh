<?php
require "../base/koneksi.php";

$id = $_GET['id'];

unset($_SESSION['cart'][$id]);
header("Location: ../order.php");
