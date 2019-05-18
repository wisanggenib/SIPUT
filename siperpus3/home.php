

 <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body" style="background-color: cyan;">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text" class="count"></div>
                                            <div class="stat-heading"><a href="?user=anggota">Anggota</div></a>

                                            <?php                                            
                                            $sql = "SELECT COUNT(nis_nip) AS total FROM tb_anggota";
                                            $result = mysqli_query($koneksi,$sql);
                                            $values = mysqli_fetch_assoc($result);
                                            $num_rows = $values['total'];
                                            echo $num_rows;

                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body" style="background-color: lightblue;">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="ti-book"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text" class="count"></div>
                                            <div class="stat-heading"><a href="?user=buku">Buku</div></a>
                                            <?php                                            
                                            $sql = "SELECT COUNT(kd_buku) AS total FROM tb_buku";
                                            $result = mysqli_query($koneksi,$sql);
                                            $values = mysqli_fetch_assoc($result);
                                            $num_rows = $values['total'];
                                            echo $num_rows;

                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body" style="background-color: #20ff82;">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-7">
                                        <i class="ti-book"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text" class="count"></div>
                                            <div class="stat-heading"><a href="?user=transaksi">Buku Pinjam</div></a>
                                             <?php                                            
                                            $sql = "SELECT COUNT(kd_pinjam) AS total FROM tb_peminjaman where status='pinjam'";
                                            $result = mysqli_query($koneksi,$sql);
                                            $values = mysqli_fetch_assoc($result);
                                            $num_rows = $values['total'];
                                            echo $num_rows;

                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body" style="background-color: #ff202e;">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-5">
                                        <i class="ti-book"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text" class="count"></div>
                                            <div class="stat-heading"><a href="?user=kembali">Buku Kembali</div></a>
                                             <?php                                            
                                            $sql = "SELECT COUNT(kd_pinjam) AS total FROM tb_peminjaman where status='kembali'";
                                            $result = mysqli_query($koneksi,$sql);
                                            $values = mysqli_fetch_assoc($result);
                                            $num_rows = $values['total'];
                                            echo $num_rows;

                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>