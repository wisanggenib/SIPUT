
                
<div class="row">

<div class="col-md-12">
<div class="card">
<div class="card-header">
<strong class="card-title"><i class="fa fa-user  "> Data Anggota </strong></i>
</div>
<div class="card-body">
<table id="bootstrap-data-table" class="table table-striped table-bordered">
<thead>
    <tr>
       <th>No</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Foto</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Jurusan</th>
        <th>Aksi</th>
    </tr>

</thead>
 <tbody>

    <?php

    $no=1;

   $nis_nip = $_SESSION['akun_id'];
   $sql = mysqli_query($koneksi,"SELECT * FROM tb_anggota WHERE nis_nip='5654546'")or die (mysqli_error());

   while ($data = mysqli_fetch_array($sql)){

        
        $jk=($data['jk']==L)?"Laki-Laki":"Perempuan"; 

      



    ?>

    <!--memanggil dari tabel anggota-->
    <tr>
    <td><?php echo $no++?></td>    
    <td><a href="?user=anggota&aksi=detail&nis_nip=<?=$data['nis_nip']?>"><font color="blue"><?=$data['nis_nip']; ?></a></td></font>
    <td><?php echo $data['nama_anggota'];?></td>
    <td><img src="images/<?php echo $data['foto'] ;?>" width="100px" height="130px"></td>
    <td><?=date('d F Y',strtotime($data['tgl_lahir']))?></td>
    <td><?php echo $jk;?></td>
    <td><?php echo $data['jurusan'];?></td>    
    
     <td>
        <a href="?user=anggota&aksi=ubah&nis_nip=<?php echo $data['nis_nip'];?>" class="btn btn-info"><i class="fa fa-pencil"></a></i>

    </td>
        
        
    </tr>

    <?php } ?>

        </tbody>
    </table>
    </div>
    
</div>
</div>
</div>
</div>
</div>
</div>








