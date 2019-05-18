<?php

    $tgl_pinjam = date("d-m-Y");
    $tujuh_hari = mktime(0,0,0, date("n"), date("j")+7, date("Y"));
    $kembali = date("d-m-Y", $tujuh_hari);
?>


                    <?php

// membuat query max
 
      $carikode = mysqli_query($koneksi, "SELECT max(kd_pinjam) from tb_peminjaman") or die (mysqli_error());
      
      // menjadikannya array
      
      $datakode = mysqli_fetch_array($carikode);
      
      // jika $datakode
      
      if ($datakode) {
       $nilaikode = substr($datakode[0], 1);
       
       // menjadikan $nilaikode ( int )
       
       $kode = (int) $nilaikode;
       
       // setiap $kode di tambah 1
       
       $kode = $kode + 1;
       $kode_otomatis = "T".str_pad($kode, 3, "0", STR_PAD_LEFT);
      
      } else {
      
       $kode_otomatis = "T001";
      
      }

?>

 
<div class="col-lg-12">
                        <div class="panel-default">

                            <div class="card-header">
                              <strong>Tambah Data</strong> <a href="?page=transaksi" class="col-cyan waves-effect pull-right">Lihat Data</a></div>
            <form method="POST" onsubmit="return validasi(this">
            <div>
          <label>KD Pinjam</label>
          <input class="form-control" name="kd_pinjam" type="text"  value="<?php  echo $kode_otomatis;?>" readonly />
     </div>
            <div class="form-group">
               <div class="form-group">
                    <label>Judul</label>
                    <select class="form-control" name="judul" required>
                      
<?php $sql = $koneksi->query("select *from tb_buku order by judul"); while ($data=$sql->fetch_assoc()) { echo "<option value='$data[judul]'>$data[judul]</option>";}?>

</select>
<input type="submit" name="cancel" value="Batal">


    </div>



        <div class="form-group">
            <label>Nama</label>
<select class="form-control" name="nama_anggota" required>

<?php

    $sql = $koneksi->query("select *from tb_anggota order by nis_nip");
        while ($data=$sql->fetch_assoc()) {
          echo "<option value='$data[nis_nip].$data[nama_anggota]'>[$data[nis_nip]] $data[nama_anggota]</option>";
    
     }

?>                                             
    </select>
</div>

     <div>
          <label>Tanggal Pinjam</label>
          <input class="form-control" name="tgl_pinjam" type="text" kd="tgl" value="<?php  echo $tgl_pinjam;?>" readonly />
     </div>
     <div>
          <label>Tanggal Kembali</label>
          <input class="form-control" name="tgl_kembali" type="text" kd="tgl" value="<?php  echo $kembali;?>" readonly/>
     </div>
        <div>
            <input type="submit" name="simpan" value="Simpan" style="margin-top: 10px" class="btn btn-primary">
        </div>

    </div>
</form>
</div>
</div>
</div>
</div>
    <?php
        
        if (isset($_POST['simpan'])) {
            $kd_pinjam = $_POST['kd_pinjam'];
            $tgl_pinjam = $_POST['tgl_pinjam'];
            $tgl_kembali = $_POST['tgl_kembali'];

            $judul = $_POST['judul'];
            $pecah_judul = explode(".", $judul);
            $judul = $pecah_judul[0];
            $jumlah_buku = $pecah_judul[1];

            $nama_anggota = $_POST['nama_anggota'];
            $pecah_nama = explode(".", $nama_anggota);
            $nis_nip = $pecah_nama[0];
            $nama_anggota = $pecah_nama[1];

            $sql = $koneksi->query("select * from tb_buku where judul = '$judul'");


            while ($data = $sql->fetch_assoc()) {
                $sisa = $data['jumlah_buku'];

                if ($sisa == 0) {
                    ?>
                    <script type="text/javascript">
                        
                        alert("Stok Buku Habis, Transaksi Tidak Dapat Dilakukan, Silakan Tambah Stok Buku Terlebih Dahulu");

                        window.location.href="?page=transaksi&aksi=tambah";

                    </script>   
                    
                <?php

                }else{

                    $sql = $koneksi->query("insert into tb_peminjaman(kd_pinjam,kd_buku,judul,nis_nip,nama_anggota,tgl_pinjam,tgl_kembali,status) 
                                            values('$kd_pinjam','$kd_buku','$judul','$nis_nip','$nama_anggota','$tgl_pinjam','$tgl_kembali','pinjam')");

                    $sql = $koneksi->query("update tb_buku set jumlah_buku=(jumlah_buku-1) where judul='$judul'");

    
                    ?>

                    <script type="text/javascript">
                        
                        alert("Transaksi Berhasil");

                        window.location.href="?page=transaksi";

                    </script>   

                <?php
                }
            }
        }
?>




 <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><i class="fa fa-book "> Data Buku </strong></i>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>KD Buku</th>
                                            <th>ID Kategori</th>
                                            <th>Judul</th>
                                            <th>Pengarang</th>
                                            <th>Penerbit</th>
                                            <th>Isbn</th>
                                            <th>Jumlah</th>
                                            <th>Lokasi</th>
                                           
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $no=1;

                                        $sql = $koneksi ->query("select * from tb_buku");

                                        while ($data = $sql->fetch_assoc()) {


                                        ?>

                                        <tr>
                                        <td><?php echo $no++?></td>    
                                        <td><?php echo $data['kd_buku'];?></td>
                                        <td><?php echo $data['id_kategori'];?></td>
                                        <td><?php echo $data['judul'];?></td>
                                        <td><?php echo $data['pengarang'];?></td>
                                        <td><?php echo $data['penerbit'];?></td>
                                        <td><?php echo $data['isbn'];?></td>
                                        <td><?php echo $data['jumlah_buku'];?></td>    
                                        <td><?php echo $data['lokasi'];?></td>
                                        </tr>

                                        <?php } ?>

                                    </tbody>
                                </table>
                                 </div>