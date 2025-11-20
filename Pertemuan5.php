<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Studi Kasus - Pertemuan 5 (PHP)</title>

    <style>
        body {font-family: Arial, sans-serif; padding: 20px;}

        table {
            width: 60%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .premium {
            background-color: #fffbe6;
            font-weight: bold;
        }

        .diskon {
            background-color: #e6f7ff;
            color: #0056b3;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h1>Daftar Produk Toko</h1>

<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Keterangan</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $produk = [
            ["nama" => "Laptop Super Cepat", "harga" => 15000000],
            ["nama" => "Mouse Gaming", "harga" => 850000],
            ["nama" => "Monitor 4K Ultrawide", "harga" => 21000000],
            ["nama" => "Keyboard Mekanikal", "harga" => 1200000],
            ["nama" => "Headset Standar", "harga" => 450000],
        ];

        $nomor = 1;

        foreach ($produk as $item) {

            $css_class = "";
            $keterangan = "-";

            if ($item['harga'] > 20000000) {
                $css_class = "premium";
                $keterangan = "Produk Premium";
            } elseif ($item['harga'] < 1000000) {
                $css_class = "diskon";
                $keterangan = "Diskon!";
            }

            echo "<tr class='{$css_class}'>";
            echo "<td>{$nomor}</td>";
            echo "<td>{$item['nama']}</td>";
            echo "<td>Rp " . number_format($item['harga'], 0, ',', '.') . "</td>";
            echo "<td>{$keterangan}</td>";
            echo "</tr>";

            $nomor++;
        }
        ?>
    </tbody>
</table>

</body>
</html>
