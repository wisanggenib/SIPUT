
 


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
                                            <th>Tahun Tertib</th>
                                            <th>Isbn</th>
                                            <th>Jumlah</th>
                                            <th>Lokasi</th>
                                            <th>Tgl Input</th>
                                            
                                            
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
                                        <td><a href="?user=buku&aksi=detail&kd_buku=<?=$data['kd_buku']?>"><font color="blue"><?=$data['judul']; ?></a></td></font>
                                        <td><?php echo $data['pengarang'];?></td>
                                        <td><?php echo $data['penerbit'];?></td>
                                        <td><?php echo $data['thn_terbit'];?></td>
                                        <td><?php echo $data['isbn'];?></td>
                                        <td><?php echo $data['jumlah_buku'];?></td>    
                                        <td><?php echo $data['lokasi'];?></td>
                                        <td><?php echo $data['tgl_input'];?></td>
                                        
                                            
                                        </tr>

                                        <?php } ?>

                                    </tbody>
                                </table>
                                