<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\CapabilityProfile;
use Mike42\Escpos\Printer;

const BASE_URL = "http://localhost:8080/ruang-cloteh/";
const TITLE = "Ruang Cloteh";

function rupiah($angka)
{

    $hasil_rupiah = number_format($angka, 0, '', '.');
    return $hasil_rupiah;
}

function parsingEpoch($epoch)
{
    $date = date_create($epoch);
    return date_format($date, "d-m-Y");
}

/** @test */
function cetakStruk()
{
    // $connector = new WindowsPrintConnector("Thermal Printer");
    // $printer = new Printer($connector);
    // $printer->setJustification(Printer::JUSTIFY_CENTER);
    // $printer->text("Ruang Cloteh") . PHP_EOL;
    // $printer->cut();
    // $printer->close();
    $connector = new WindowsPrintConnector("Thermal Printer");
    $printer = new Printer($connector);
    try {
        $printer->initialize();
        $printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->text("Ruang Cloteh\n") . PHP_EOL;
        $printer->text("\n");

        //data transaksi
        $printer->initialize();
        $printer->text("Pembeli   : " . $_SESSION['buyerName'] . "\n");
        $printer->text("Tanggal   : " . date("d-m-Y") . "\n");

        //membuat table
        $printer->initialize();
        $printer->text("--------------------------------\n");
        $printer->text(buatBaris3Kolom("Menu", "Harga", "Jumlah"));
        $printer->text(buatBaris3Kolom("Cold Brew", "15.000", "1"));

        $printer->cut();
        $printer->close();
    } catch (Exception $e) {
        echo "Couldn't print to this printer: " . $e->getMessage() . "\n";
    }
}

function buatBaris1Kolom($kolom1)
{
    // Mengatur lebar setiap kolom (dalam satuan karakter)
    $lebar_kolom_1 = 32;

    // Melakukan wordwrap(), jadi jika karakter teks melebihi lebar kolom, ditambahkan \n 
    $kolom1 = wordwrap($kolom1, $lebar_kolom_1, "\n", true);

    // Merubah hasil wordwrap menjadi array, kolom yang memiliki 2 index array berarti memiliki 2 baris (kena wordwrap)
    $kolom1Array = explode("\n", $kolom1);

    // Mengambil jumlah baris terbanyak dari kolom-kolom untuk dijadikan titik akhir perulangan
    $jmlBarisTerbanyak = count($kolom1Array);

    // Mendeklarasikan variabel untuk menampung kolom yang sudah di edit
    $hasilBaris = array();

    // Melakukan perulangan setiap baris (yang dibentuk wordwrap), untuk menggabungkan setiap kolom menjadi 1 baris 
    for ($i = 0; $i < $jmlBarisTerbanyak; $i++) {

        // memberikan spasi di setiap cell berdasarkan lebar kolom yang ditentukan, 
        $hasilKolom1 = str_pad((isset($kolom1Array[$i]) ? $kolom1Array[$i] : ""), $lebar_kolom_1, " ");

        // Menggabungkan kolom tersebut menjadi 1 baris dan ditampung ke variabel hasil (ada 1 spasi disetiap kolom)
        $hasilBaris[] = $hasilKolom1;
    }

    // Hasil yang berupa array, disatukan kembali menjadi string dan tambahkan \n disetiap barisnya.
    return implode("\n", $hasilBaris) . "\n";
}

function buatBaris3Kolom($kolom1, $kolom2, $kolom3)
{
    // Mengatur lebar setiap kolom (dalam satuan karakter)
    $lebar_kolom_1 = 10;
    $lebar_kolom_2 = 10;
    $lebar_kolom_3 = 10;

    // Melakukan wordwrap(), jadi jika karakter teks melebihi lebar kolom, ditambahkan \n 
    $kolom1 = wordwrap($kolom1, $lebar_kolom_1, "\n", true);
    $kolom2 = wordwrap($kolom2, $lebar_kolom_2, "\n", true);
    $kolom3 = wordwrap($kolom3, $lebar_kolom_3, "\n", true);

    // Merubah hasil wordwrap menjadi array, kolom yang memiliki 2 index array berarti memiliki 2 baris (kena wordwrap)
    $kolom1Array = explode("\n", $kolom1);
    $kolom2Array = explode("\n", $kolom2);
    $kolom3Array = explode("\n", $kolom3);

    // Mengambil jumlah baris terbanyak dari kolom-kolom untuk dijadikan titik akhir perulangan
    $jmlBarisTerbanyak = max(count($kolom1Array), count($kolom2Array), count($kolom3Array));

    // Mendeklarasikan variabel untuk menampung kolom yang sudah di edit
    $hasilBaris = array();

    // Melakukan perulangan setiap baris (yang dibentuk wordwrap), untuk menggabungkan setiap kolom menjadi 1 baris 
    for ($i = 0; $i < $jmlBarisTerbanyak; $i++) {

        // memberikan spasi di setiap cell berdasarkan lebar kolom yang ditentukan, 
        $hasilKolom1 = str_pad((isset($kolom1Array[$i]) ? $kolom1Array[$i] : ""), $lebar_kolom_1, " ");
        // memberikan rata kanan pada kolom 3 dan 4 karena akan kita gunakan untuk harga dan total harga
        $hasilKolom2 = str_pad((isset($kolom2Array[$i]) ? $kolom2Array[$i] : ""), $lebar_kolom_2, " ", STR_PAD_LEFT);

        $hasilKolom3 = str_pad((isset($kolom3Array[$i]) ? $kolom3Array[$i] : ""), $lebar_kolom_3, " ", STR_PAD_LEFT);

        // Menggabungkan kolom tersebut menjadi 1 baris dan ditampung ke variabel hasil (ada 1 spasi disetiap kolom)
        $hasilBaris[] = $hasilKolom1 . " " . $hasilKolom2 . " " . $hasilKolom3;
    }

    // Hasil yang berupa array, disatukan kembali menjadi string dan tambahkan \n disetiap barisnya.
    return implode("\n", $hasilBaris) . "\n";
}
