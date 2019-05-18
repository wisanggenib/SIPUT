<!-- Style css -->
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

function Angkasaja(evt) {
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
return true;
}

</script>



    <div class="panel-heading">
    
    <div class="panel-body">

       <div class="col-lg-12">

          <div class="card-header">
            <strong>Tambah Data</strong> <a href="?page=anggota" class="col-cyan waves-effect pull-right">Lihat Data</a></div>

          <div class="card">
            <div class="col-md-12">
                <form id="form_validation" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>NIS/NIP</label>
                        <input type="number" id="nis" class="form-control" placeholder="NIS/NIP" name="nis_nip" oninput="fungsinis()" required />
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" id="nama" class="form-control" placeholder="NAMA" name="nama_anggota" oninput="fungsinama()" required   />
                    </div>

                     <div class="form-group">
                        <label>Foto</label>
                        <input class="form-control" type="file" name="foto"  accept="images/*" onchange="preview_foto(event)">
                    </div>                 

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" id="username" name="username" placeholder="USERNAME" class="form-control" required />
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" id="password" name="password" placeholder="PASSWORD" class="form-control" required />
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" id="alamat" name="alamat" placeholder="Alamat" class="form-control" required />
                    </div>

                    <div class="form-group">
                        <label>No Tlpn</label>
                        <input type="text"  class="form-control" maxlength="12" placeholder="NO TLPN"  name="no_tlpn" required onkeypress="return Angkasaja(event)"/>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input class="form-control" id="tgl_lahir" placeholder="TGL LAHIR" name="tgl_lahir" type="date" required  />
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" placeholder="JK" name="jk" id="jk" oninput="fungsijk()" >
                            <option value="">--Pilih Satu-- </option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>  
                        </select>
                    </div>

                    
                    <div class="form-group">
                        <label>Jurusan</label>
                        <select class="form-control" name="jurusan" placeholder="JURUSAN" id="jurusan" oninput="fungsijurusan()" >
                            <option value="">--Pilih Satu--</option>
                                <option value="Kecantikan">Kecantikan</option>
                                <option value="tataboga">Tataboga</option>
                                <option value="perhotelan">Perhotelan</option>
                                <option value="tatabusana">Tatabusana</option>
                                
                                
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
                                <img src="images/logosmk.png" class="img-circle" alt="Logo STIE" width="50" height="50"></th> 
                            </th>
                            <th>
                              <h4 align="center">Kartu Anggota Perpustakaan<br><small align="center">SMK Negeri 3 Klaten</small></h4>
                          </th>                        
                      </table>
                      <ul class="header-dropdown m-r--5"></ul>
                  </div>
                  <div class="body responsive" style="padding: 30px;">
                    <table width="100%" " class="tengah responsive">
                      <tr valign="top">
                        <th  rowspan="5" valign="top" width="150px;">
                            <img src="images/no-photo.jpg" id="viewfoto" class="img-thumbnail fview" alt="Foto Anggota">
                        </th>
                        <td valign="top">NIS/NIP</td>
                        <td>:</th>
                            <td align="left" id="hasilnis"></td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <th>:</th>
                            <td align="left" id="hasilnama"></td>
                        </tr>

                        
                        <tr>
                            <th>Jk</th>
                            <th>:</th>
                            <td align="left" id="hasiljk"></td>
                        </tr>
                        <tr valign="top">
                            <th>Jurusan</th>
                            <th>:</th>
                            <td align="left" id="hasiljurusan"></td>
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
                            <center><h2><u>CATATAN</u></h2></center>
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
                        <th><div class="pull-right" id="valbar" ></div></th>
                    </table>
                </div>
            </div>
        </div>
    </div>



<?php

$nis_nip = $_POST['nis_nip'];
$nama_anggota = $_POST['nama_anggota'];

$name = $_FILES['foto']['name'];
$file = $_FILES['foto']['tmp_name'];

$username = $_POST['username'];
$password = $_POST['password'];
$password_hashing = md5(sha1(crc32($_POST['password'])));
$alamat = $_POST['alamat'];
$no_tlpn = $_POST['no_tlpn'];
$tanggal = $_POST['tgl_lahir'];
$jk = $_POST['jk'];
$jurusan = $_POST['jurusan'];

$simpan = $_POST['simpan'];

if ($simpan) {
     move_uploaded_file($file,"images/".$name);
    $sql = $koneksi->query("insert into tb_anggota(nis_nip,nama_anggota,foto,username,password,alamat,no_tlpn,tgl_lahir,jk,jurusan)values('$nis_nip','$nama_anggota','$name','$username','$password_hashing','alamat','$no_tlpn','$tanggal','$jk','$jurusan')");

   

    if ($sql) {
        
        ?>

        <script type="text/javascript">
            

            alert ("Data Berhasil Disimpan");
            window.location.href="?page=anggota";

        </script>

        <?php

         $ceknisnip = mysqli_query($koneksi, "SELECT nis_nip FROM tb_anggota WHERE nis_nip = '$nis_nip'");
    if (mysqli_num_rows($ceknisnip) > 0) 
    {
        echo "<script>alert('Gagal Menambahkan  Nomor Identitas Sudah Terdaftar!!');</script>";
        return false;
    }

    }
}


?>

