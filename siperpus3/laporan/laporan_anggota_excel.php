<?php


$koneksi = new mysqli("localhost","root","","projek_perpus");

$filename = "anggota_exel-(".date('d-m-Y').").xls";

header("content-disposition: attachment; filename='$filename'");
header("content-type: application/vnd.ms-exel");

?>

<h2>Laporan Anggota</h2>

<table border="1">

    <tr>
        <th>No</th>
        <th>Nis</th>
        <th>Nama</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Jurusan</th>
      
        
    </tr>

      <?php

        $no=1;

        $sql = $koneksi ->query("select * from tb_anggota");

        while ($data = $sql->fetch_assoc()) {

        
        ?>
        <tr>
            <td><?php echo $no++?></td>    
             <td><?php echo $data['nis'];?></td>
            <td><?php echo $data['nama'];?></td>
            <td><?php echo $data['tempat_lahir'];?></td>
            <td><?php echo $data['tgl_lahir'];?></td>
            <td><?php echo $data['jk'];?></td>
            <td><?php echo $data['jurusan'];?></td>

           
                
            </tr>

            <?php } ?>






</table>