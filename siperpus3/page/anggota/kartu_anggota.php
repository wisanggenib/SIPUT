<?php
session_start();

 $koneksi = new mysqli("localhost","root","","dbsiput");

$nis_nip = $_GET['nis_nip'];
$sql = $koneksi->query("select * from tb_anggota where nis_nip = '$nis_nip'");

$tampil = $sql->fetch_assoc();
?>
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ela Admin - HTML5 Admin Template</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="images/logosmk.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
          <!-- Jquery Barcode -->
  <script type="text/javascript" src="assets/js/jquery-barcode.js"></script>
    <style type="text/css">
        @page { size: 21.0cm 29.7cm;  margin: 0px 0px 0px 0px; padding: 0px 0px 0px 0px;  margin-top:0;}
        @media print { body {size: 21.0cm 29.7cm;  margin: 0px 0px 0px 0px; padding: 0px 0px 0px 0px;} }
        body { font-size: 50% }
        tr {padding: 5px}
        div .header {padding: 0px;}
    </style>

            <!-- scrip barcode -->
            <script type="text/javascript">
                function fungsinis() {
                    var settings = {
                        barWidth: 1,
                        barHeight: 50,
                        moduleSize: 1,
                        showHRI: false,
                        addQuietZone: true,
                        marginHRI: 5,
                        bgColor: "#FFFFFF",
                        color: "#000000",
                        fontSize: 10,
                        output: "css",
                        posX: 0,
                        posY: 0
                    };
// barcode generate
var barr = $("#nis").val();
$("#valbar").html("").show().barcode( barr, "code128", settings);
};
</script>
<style type="text/css">
/*  th, td, tr {
        border: 1px solid black;
    }*/
    .tengah td {padding-left: 10px; margin-right: 0px; padding-right: 0px; font-weight: normal;}
    .ttd td {font-weight: bold;}
    .tengah {width: 70%; margin-left: 60px}
    .tbatas {width: 100%}
    .body {padding: 0px; margin: 0px}
    .card { width: 350px; height: 220px }
</style>
</head>
<body>
    <table align="center" style="margin-top: 20px;">
        <tr style=" height: 50px">
            <th width="48%">
            <input type="hidden" name="" value="<?= $tampil['nis']?>" id="nis">   
            <!-- kartu member tampak dari depan -->
            <div class="card" style="border-radius: 10px; border: 2px solid grey;">
                <div class="header" align="center" style=" padding: 0px; margin:0;border-bottom: 1px solid grey">
                    <table align="center" class="tbatas">
                        <th style="padding: 5px;" class="logos">
                            <img src="images/logosmk.png" class="img-circle" alt="logo" width="" height="30" style=" z-index: 1; margin: 0px 0px 0px 25px"></th> 
                        </th>
                        <th style="font-size: 50%">
                            <h2>Kartu Anggota Perpustakaan<br><small style="margin-left: 40px">STIE Satya Dharma Singaraja</small></h2>
                        </th>                        
                    </table>
                
                </div>
                <div class="body">
                    <img style="position: absolute;" id="viewfoto" src="images/<?= $tampil['foto'];?>" class="img-responsive img-thumbnail" alt="Foto Anggota" width="60" height="70">
                    <table class="tengah responsive" style="font-size: 70%">

                       
                        <tr>
                            <th width="25%">NIS/NIP</th>
                            <th width="2%">:</th>
                            <td align="left" id="hasilnis"><?= $tampil["nis_nip"];?></td>
                        </tr>

                         <tr valign="top">
                            <th rowspan="5" style="padding: 0px; padding-right:5px" valign="top">
                                
                            </th>
                            <th valign="top">Nama</th>
                            <th width="2%">:</th>
                            <td align="left" id="hasilnama"><?= $tampil["nama_anggota"];?></td>
                        </tr>

                        <tr valign="top">
                            <th>JK</th>
                            <th width="2%">:</th>
                            <td align="left" id="hasiljk"><?= $tampil["jk"];?></td>
                        </tr>
                        <tr valign="top">
                            <th>Jurusan</th>
                            <th width="2%">:</th>
                            <td style="position: absolute; width: 50%" align="left" id="hasiljurusan"><?= $tampil["jurusan"];?></td>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <td style="font-weight: bold;"><br>
                                <br>
                                <div class="ttd responsive pull-right" align="center" style="margin-top: -10px; position: static;">
                                    <?php echo "Singaraja, <small>". date("d-m-Y")."</samll><small><br>Kepala Perpustakaan</small><br>"?>
                                    <img src="assets/stampel.png" width="50" height="30" style="z-index: -1" ><br>

                                    <small><u>Ni Komang Ayu Hermawati. SE</u></small>
                                </div>
                            </td>
                        </tr>
                    </table>

                </div>

            </div>
            </th>
            <div style="padding: 3px"></div>
                <th align="right" class="pull-right">
            <!-- kartu member tampak dari belakang -->
                <div class="card" style="border-radius: 10px; padding: 0px; border: 2px solid grey;  height: 219px">
                    <div class="body" style=" padding: 0px; margin: 5px;">
                        <h3 style="margin-top: -2px"><u>Catatan</u></h3>
                        <br>
                        <div style="font-size: 70%; margin-top: -15px; left: 150px; text-align: justify; padding-right: 5px" >
                            <ol>
                                <li>Kartu Anggota ini harus dibawa setiap kunjungan, pinjaman, pengembalian keperpustakaan.</li>
                                <li>Tanpa kartu anggota, kunjungan, pinjaman, pengembalian tidak dilayani.</li>
                                <li>Pengembalian lewat dari batas waktunya akan dikenakan denda.</li>
                                <li>Waktu pinjaman lamanya 7 hari dan dapat diperpanjang 7 hari lagi bila tidak ada yang memesannya.</li>
                            </ol>
                        </div>
                        <br>
                        
            
                        <table style="padding: 0px; margin-top:-20px; width: 100%" >
                            <th class="pull-right">
                                <div class="pull-right" id="valbar">

                                    <script type="text/javascript">
                                        fungsinis();
                                    </script>

                                </div>
                            </th>
                        </table>
                    </div>
                    

                </div>
            </div>
        </div>
</div>
</th>
</tr>
</table>
</body>
</html>