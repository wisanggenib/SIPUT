<?php


$koneksi = new mysqli("localhost","root","","projek_perpus");

$filename = "buku_exel-(".date('d-m-Y').").xls";

header("content-disposition: attachment; filename='$filename'");
header("content-type: application/vdn.ms-exel");




?>
<h2>Laporan Buku</h2>

<table border="1">
<tr>
        <th>No</th>
        <th>Judul</th>
        <th>Pengarang</th>
        <th>Penerbit</th>
        <th>Isbn</th>
        <th>Jumlah</th>
        <th>Aksi</th>
        
    </tr>

<?php

        $no=1;

        $sql = $koneksi ->query("select * from tb_buku");

        while ($data = $sql->fetch_assoc()) {


        ?>

<tr>
        <td><?php echo $no++?></td>    
        <td><?php echo $data['judul'];?></td>
        <td><?php echo $data['pengarang'];?></td>
        <td><?php echo $data['penerbit'];?></td>
        <td><?php echo $data['isbn'];?></td>
        <td><?php echo $data['jumlah_buku'];?></td>    
        <td>
            <a href="?page=buku&aksi=ubah&kd=<?php echo $data['kd'];?>" class="btn btn-info"><i class="fa fa-pencil-square-o">Ubah</a></i>
            <a onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data ini ...???')"   href="?page=buku&aksi=hapus&kd=<?php echo $data['kd'];?>" class="btn btn-danger"><i class="fa fa-trash-o">Hapus</a></i>


            
        </td>
            
        </tr>

      <?php } ?>

  </table>
