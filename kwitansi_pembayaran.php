<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwitansi Pembayaran</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
        $tanggal=$_POST['tanggal'];
        $bulan_tahun=$_POST['bulan_tahun'];
        $jumlah_pemakaian=$_POST['jumlah_pemakaian'];
        $id_pelanggan=$_POST['id_pelanggan'];
        $nama_pelanggan=$_POST['nama_pelanggan'];
        $jenis_kwh=$_POST['jenis_kwh'];
        $jumlah_keterlambatan=$_POST['keterlambatan'];

        switch ($jenis_kwh) {
            case 450:
                $harga_permeter = 300;
                break;
            case 900:
            $harga_permeter = 400;
            break;
            case 1300:
                $harga_permeter = 500;
                break;
        default :
                $harga_permeter = 0;
                break;
        }

        $denda = $jumlah_keterlambatan * 1000;
        $total_tagihan = ($harga_permeter * $jumlah_pemakaian)-$denda;
    ?>




    <div class="box-kwitansi" id="box-kwitansi">
        <center>
            <img src="imgs/logo2.png" alt="logo_perusahaan" width="75">
        </center>
        <h2 align="center">PT SINAR NUSANTARA BERSAMA</h2>
        <h5 align="center">Kwitansi Pembayaran Listrik Pascabayar</h5>

        <table width="80%" align="center" cellpadding="5">
            <tr>
                <td>ID Pelanggan</td>
                <td>: <?php echo $id_pelanggan; ?></td>
                <td>Bulan / Tahun</td>
                <td>: <?php echo $bulan_tahun; ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>: <?php echo $nama_pelanggan; ?></td>
                <td>Stand Meter</td>
                <td>: KSDHFJK339827302932084</td>
            </tr>
            <tr>
                <td>Tarif/Daya</td>
                <td colspan="3">: <?php echo $jenis_kwh; ?></td>
            </tr>
            <tr>
                <td>RP Tagihan </td>
                <td colspan="3">: <?php echo $total_tagihan; ?> </td>
            </tr>
            <tr>
                <td>No Ref</td>
                <td colspan="3">: 7628372ATA987987666</td>
            </tr>
        </table>
        <p align="center">
            PT Sinar Nusantara Bersama menyatakan struk ini sebagai bukti pembayaran yang sah <br>
            Terima Kasih <br>
            *Informasi Hubungi Call Center 777 atau Hub Kantor Terdekat*
        </p>
    </div>
    <p align="center">
        <button class="btn btn-success" onclick="print()">Cetak</button>
    </p>

    <script>
        function print() {
            var divContents = document.getElementById("box-kwitansi").innerHTML;
            var a = window.open('','','height=500, width=500');
            a.document.write('<html>');
            a.document.write('<body>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>
</body>

</html>