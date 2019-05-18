
        <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><i class="fa fa-user"> Data Anggota </strong></i>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                           <th>No</th>
                                            <th>Nis</th>
                                            <th>Nama</th>
                                            <th>No Telpon</th>
                                            <th>Alamat</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Jurusan</th>
                                            <th>Aksi</th>
                                        </tr>

                                    </thead>
                                     <tbody>

                                        <?php

                                        $no=1;

                                        $sql = $koneksi ->query("select * from tb_anggota");

                                        while ($data = $sql->fetch_assoc()) {

                                            
                                            $jk=($data['jk']==L)?"Laki-Laki":"Perempuan"; 

                                          



                                        ?>

                                        <!--memanggil dari tabel anggota-->
                                        <tr>
                                        <td><?php echo $no++?></td>    
                                        <td><a href="?page=anggota&aksi=detail&nis_nip=<?=$data['nis_nip']?>"><?=$data['nis_nip']; ?></a></td>
                                        <td><?php echo $data['nama_anggota'];?></td>
                                        <!-- <td><img src="images/<?php echo $data['foto'] ;?>" width="100px" height="100px"></td> -->
                                        <td><?php echo $data['no_tlpn'];?></td>
                                        <td><?php echo $data['alamat'];?></td>
                                        <td><?=date('d F Y',strtotime($data['tgl_lahir']))?></td>
                                        <td><?php echo $jk;?></td>
                                        <td><?php echo $data['jurusan'];?></td>    
                                        <td>
                                            <a href="?page=anggota&aksi=ubah&nis_nip=<?php echo $data['nis_nip'];?>" class="btn btn-info"><i class="fa fa-pencil"></a></i>
                                            <a onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data ini ...???')"   href="?page=anggota&aksi=hapus&nis_nip=<?php echo $data['nis_nip'];?>" class="btn btn-danger"><i class="fa fa-trash-o"></a></i>

                                        <a href="page/anggota/kartu_anggota.php?nis_nip=<?php echo $data["nis_nip"] ?>" class="btn btn-warning" target="_blank"><i class="fa fa-print"></i>
                                            
                                        </a>

                                        </td>
                                            
                                        </tr>

                                        <?php } ?>

                                    </tbody>

                                     
                                </table>
                            
                                <div>
                                    <a href="?page=anggota&aksi=tambah" class="btn btn-success" style="margin-bottom: 10px;">
                                 <i class="fa fa-plus"></i>Tambah Data</a>
                                <a href="./laporan/cetak_anggota.php" target="blank" class="btn btn-warning" style="margin-bottom: 10px;"><i class="fa fa-print"></i>Cetak</a>
                            </div>