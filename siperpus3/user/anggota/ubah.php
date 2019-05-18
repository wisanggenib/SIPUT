<!-- Style css -->
<?php

$nis_nip = $_GET['nis_nip'];

$sql = $koneksi->query("select * from tb_anggota where nis_nip = '$nis_nip'");

$tampil = $sql->fetch_assoc();


$jkl = $tampil['jk'];

$jurusan = $tampil['jurusan'];


?>
<style>
    .atas tr th
    {
        padding:4px;
    }
    .tengah tr th, td {
        padding: 5px;
        text-align: left;
        font-size: 65%;

    }
    .tengah tr th img {
        margin-top: 0px;
    }
    .tengah tr th
    {
        text-align: top;
    }
    .fview 
    {
        background-image: url('images/no-photo.jpg');
        height: 100px;
        width: 80px;
        background-repeat: no-repeat;
        background-position: center;
        background-size: 70px;
    }
    @media screen and (max-width: 520px) 
    {
        .fview 
        {
            width: 50px; height: 50px; transition: 0.5s;
            background-size: 20px;
        }

    }
    /*.fview:hover { width: 50px; height: 40px; transition: 0.5s; }*/
    .ttd 
    {
        text-align: center;
    }
    .isicatatan ol li 
    {
        font-size: 90%;
    }
    .barcode 
    {
        border: 1px solid lightgreen;
    }
    .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
    .toggle.ios .toggle-handle { border-radius: 40px; }
</style>
<!-- ENd CSS -->

<script>

    function preview_foto(event) 
    { 

     var reader = new FileReader();
     reader.onload = function()
     {
        var output = document.getElementById('viewfoto');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
// fungsi type string dan barcode
function fungsinama() {
    var x = document.getElementById("nama").value;
    document.getElementById("hasilnama").innerHTML = x;
}

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
var barr = $("#nis").val() ;
document.getElementById("hasilnis").innerHTML = barr;
$("#valbar").html("").show().barcode( barr, "code128", settings);
};



function fungsijurusan() {
    var x = document.getElementById("jurusan").value;
    document.getElementById("hasiljurusan").innerHTML = x;
}

function fungsijk() {
    var x = document.getElementById("jk").value;
    document.getElementById("hasiljk").innerHTML = x;
}

</script>



<div class="panel panel-default">
    
    <div class="panel-body">

       <div class="col-lg-12">
          <div class="card-header">
            <strong>Tambah Data</strong><a href="?user=anggota" class="col-cyan waves-effect pull-right"><font color="blue">Lihat Data</a></div></font>
          <div class="card">
            <div class="col-md-12">
                <form id="form_validation" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>NIS/NIP</label>
                        <input type="number" id="nis" class="form-control" placeholder="NIS/NIP" name="nis_nip" value="<?php echo $tampil['nis_nip']?>"oninput="fungsinis()" disabled />
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" id="nama" class="form-control" placeholder="NAMA" name="nama_anggota" value="<?php echo $tampil['nama_anggota']?>" oninput="fungsinama()"/>
                    </div>


                    <div class="form-group">
                        <label>Foto</label>
                        <input  name="foto" id="foto" type="file"  accept="images/*" onchange="preview_foto(event)"  value="<?php echo $tampil['foto']?>" />
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" id="username" name="username" placeholder="USERNAME" class="form-control" value="<?php echo $tampil['username']?>" required  />
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" id="password" name="password" placeholder="PASSWORD" class="form-control" value="<?php echo $tampil['password']?>" required  />
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" id="alamat" name="alamat" placeholder="Alamat" class="form-control" value="<?php echo $tampil['alamat']?>" required  />
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input class="form-control" id="tgl_lahir" placeholder="TGL LAHIR" name="tgl_lahir" value="<?php echo $tampil['tgl_lahir']?>" type="date" />
                    </div>

                   <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control" id="jk" name="jk" oninput="fungsijk()"/>
                       <option value="L" <?php if ($jkl =='L')  {echo "selected";} ?>>Laki-Laki</option>
                        <option value="P" <?php if ($jkl =='P')  {echo "selected";} ?>>Perempuan</option> 
                     </select>
                     </div>

                <div class="form-group">
                    <label>Jurusan</label>
                    <select class="form-control" id="jurusan" name="jurusan" oninput="fungsijurusan()" />
                       <option value="kecantikan" <?php if ($jurusan =='kecantikan')  {echo "selected";} ?>>Kecantikan</option>
                        <option value="tataboga" <?php if ($jurusan =='tataboga')  {echo "selected";} ?>>Tataboga</option>
                        <option value="perhotelan" <?php if ($jurusan =='perhotelan')  {echo "selected";} ?>>Perhotelan</option>
                         <option value="tatabusana" <?php if ($jurusan =='tatabusana')  {echo "selected";} ?>>Tatabusana</option>
                        
                     </select>
                     </div>

                        <div>
                            

                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></input>
                            <input type="reset"  value="Reset" class="btn btn-danger"></input>

                        </div>

                    </div>

                </form>
            </div>

        </div>

    </div>

</div>


<!-- Kartu anggota -->

<div class="col-lg-6">
    <div class="card-header">
        <div class="header">
            <h4 align="center">Desain Kartu Anggota</h4>
            <hr>
            <div class="body" style="padding: 0px;">
                <!-- kartu member tampak dari depan -->
                <div class="card" style="border-radius: 10px;" >
                    <div class="card" align="center">
                        <table align="center" class="atas">
                            <th>
                                <img src="images/logosmk.png" class="img-circle" alt="Logo STIE" width="50" height="45"></th> 
                            </th>
                            <th>
                              <h4 align="center">Kartu Anggota Perpustakaan<br><small align="center">STIE Satya Dharma Singaraja</small></h4>
                          </th>                        
                      </table>
                      <ul class="header-dropdown m-r--5"></ul>
                  </div>
                  <div class="body responsive" style="padding: 30px;">
                    <table width="100%" " class="tengah responsive">
                      <tr valign="top">
                        <th  rowspan="5" valign="top" width="150px;">
                            <img id="viewfoto" src="images/<?= $tampil['foto'];?>" class="img-responsive img-thumbnail" alt="Foto Anggota" width="100" height="120">
                        </th>
                        <td valign="top">NIS/NIP</td>
                        <td>:</th>
                            <td align="left" id="hasilnis"><?php echo $tampil['nis_nip']?></td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <th>:</th>
                            <td align="left" id="hasilnama"><?php echo $tampil['nama_anggota']?></td>
                        </tr>

                        
                        <tr>
                            <th>Jk</th>
                            <th>:</th>
                            <td align="left" id="hasiljk"><?php echo $tampil['jk']?></td>
                        </tr>
                        <tr valign="top">
                            <th>Jurusan</th>
                            <th>:</th>
                            <td align="left" id="hasiljurusan"><?php echo $tampil['jurusan']?></td>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <td>
                                <div class="ttd responsive pull-right">
                                    <?php echo "Singaraja, ". date("d-m-Y")."<br><small>Kepala Perpustakaan</small><br>"?>
                                    <img src="" width="40" height="40" ><br>

                                    <small><u>Ni Komang Hermawati</u></small>
                                </div>
                            </td>
                        </tr>
                    </table>

                </div>



            </div>
            
            <!-- kartu member tampak dari belakang -->
            <div class="card" style="background-color: white; border-radius: 10px">
                <div class="card-header" style="background-color: white; border-radius: 10px">
                    
                    <div class="body" style="padding: 30px;">
                        
                       
                        <table align="center" class="atas">
                            <center><h2><u><font color="red">CATATAN</u></h2></center></font>
                        </th>                        
                    </table>
                    <ul class="header-dropdown m-r--5"></ul>

                    <br>
                    <div class="isicatatan">
                        <ol>
                            <li>Kartu Anggota ini harus dibawa setiap kunjungan, pinjaman, pengembalian keperpustakaan.</li>
                            <li>Tanpa kartu anggota, kunjungan, pinjaman, pengembalian tidak dilayani.</li>
                            <li>Pengembalian lewat dari batas waktunya akan dikenakan denda.</li>
                            <li>Waktu pinjaman lamanya 7 hari dan dapat diperpanjang 7 hari lagi bila tidak ada yang memesannya.</li>
                        </ol>
                    </div>
                    <br>
                    <table width="100%">
                        <th>
                       <div class="pull-right" id="valbar">

                                    <script type="text/javascript">
                                        fungsinis();
                                    </script>

                                </div>
                            </th>
                    </table>
                </th>
                </div>
            </div>

            
        </div>
    </div>





  <?php

       
        $nama_anggota = $_POST['nama_anggota'];

        $name = $_FILES['foto']['name'];
        $file = $_FILES['foto']['tmp_name'];
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $jk = $_POST['jk'];
        $jurusan = $_POST['jurusan'];
       
        $simpan = $_POST['simpan'];

        if ($simpan) {
            move_uploaded_file($file,"images/".$name);
        $sql = $koneksi->query("update tb_anggota set nama_anggota='$nama_anggota',foto='$name',username='$username',password='$password',tgl_lahir='$tgl_lahir',jk='$jk',jurusan='$jurusan' where nis_nip='$nis_nip'");

            if ($sql) {
                
                ?>

                <script type="text/javascript">
                    

                    alert ("Data Berhasil Diubah");
                    window.location.href="?user=anggota";

                </script>

                <?php

            }
        }
        

        ?>