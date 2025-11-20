<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Praktikum Pertemuan 6 - Dompet Digital</title>
    <style>
        body {
            font-family: monospace;
            padding: 20px;
            background-color: #f4f4f4;

        }

        .container {
            background: white;
            width: 400px;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            border-bottom: 2px dashed #ccc;
            padding-bottom: 10px;
        }

        .transaksi-item {
            padding: 10px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
        }

        .masuk {
            color: green;
        }

        .keluar {
            color: red;
        }

        .saldo-box {
            background-color: #333;
            color:white;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
            text-align: right;
            font-size: 1,2em;
        }
    </style>

</head>
    
<body>
    <div class="container">
    <h2>Riwayat Transaksi</h2>

    <?php
    // Studi Kasus: DOMPET DIGITAL
    // Materi: Functions & Pass-by-Reference

    // 1. User-Defined Function + Built-in Function
    // Fungsi pembantu untuk memformat tampilan uang
    function formatRupiah($angka)
    {
        // Built-in function: number_format(angka, desimal, pemisah_koma, pemisah_ribuan)
        $hasil = "Rp " . number_format($angka, 0, ',', '.');
        return $hasil;
    }

    // 2. Pass-by-Reference Function
    // Fungsi untuk memproses uang.
    // Perhatikan &$saldo_dompet; ini kunci utamanya.
    function transaksi(&$saldo_dompet, $jumlah, $jenis)
    {
        $class_css = "";
        $tanda = "";

        // Logika Transaksi
        if ($jenis == "topup") {
            $saldo_dompet += $jumlah;   // Ubah saldo asli
            $class_css = "masuk";
            $tanda = "+";
        } elseif ($jenis == "bayar") {

            // Cek saldo cukup atau tidak (logic tambahan)
            if ($saldo_dompet >= $jumlah) {
                $saldo_dompet -= $jumlah;   // Ubah saldo asli
                $class_css = "keluar";
                $tanda = "-";
            } else {
                echo "<div class='transaksi-item' style='color:grey'>";
                echo "<span>Gagal (Saldo Kurang)</span>";
                echo "<span>" . formatRupiah($jumlah) . "</span>";
                echo "</div>";
                return; // Hentikan fungsi jika gagal
            }
        }

        // Cetak riwayat transaksi langsung (Output HTML)
        // Kita memanggil formatRupiah di dalam echo
        echo "<div class='transaksi-item {$class_css}'>";
        echo "<span>" . strtoupper($jenis) . "</span>"; // Built-in string func
        echo "<span>{$tanda} " . formatRupiah($jumlah) . "</span>";
        echo "</div>";
    }

    // --- EKSEKUSI PROGRAM ---

    // 1. Saldo Awal:
    $saldo_saya = 50000;

    // 2. Simulasi Transaksi
    // Kita panggil fungsi berkali-kali
    transaksi($saldo_saya, 100000, "topup");  // Isi saldo
    transaksi($saldo_saya, 25000,  "bayar");  // Beli makan
    transaksi($saldo_saya, 12000,  "bayar");  // Beli minum
    transaksi($saldo_saya, 290000, "bayar");  // Beli sepatu (Gagal, saldo kurang)
    transaksi($saldo_saya, 50000,  "topup");  // Isi saldo lagi
    ?>

    <div class="saldo-box">
        <small>Saldo Akhir :</small><br>
        <?php echo formatRupiah($saldo_saya); ?>
    </div>

</div>

</body>
</html>


