<div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                               <strong class="card-title"><i class="fa fa-shopping-cart "> Data Peminjaman </strong></i>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                     <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIS</th>
                                            <th>Judul</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Terlambat</th>
                                            <th>Status</th>
                                                                                
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $no=1;

                                        $sql = $koneksi ->query("select * from tb_peminjaman where nis_nip='nis_nip'");

                                        while ($data = $sql->fetch_assoc()) {

                                        ?>

                                        <tr>
                                        <td><?php echo $no++?></td> 
                                        <td><?php echo $data['nis_nip'];?></td> 
                                        <td><?php echo $data['judul'];?></td>     
                                        <td><?php echo $data['tgl_pinjam'];?></td>
                                        <td><?php echo $data['tgl_kembali'];?></td>
                                        <td>

                                            <?php 

                                                $denda = 100;

                                                $tgl_dateline2 = $data['tgl_kembali'];

                                                $tgl_kembali = date("Y-m-d");

                                                $lambat = terlambat($tgl_dateline2, $tgl_kembali);


                                                $denda1 = $lambat*$denda;

                                                if ($lambat>0) {
                                                    echo "


                                                    <font color ='red'>$lambat hari<br>(Rp $denda1)</font>

                                                    
                                                    ";
                                                }else{

                                                    echo  $lambat ."hari";
                                                }

                                            ?>
                                            




                                        </td>
                                        <td><?php echo $data['status'];?></td>    
                                            
                                       
                                            
                                        </tr>

                                        <?php } ?>

                                    </tbody>
                                </table>

                                    