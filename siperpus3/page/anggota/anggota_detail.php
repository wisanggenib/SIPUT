
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
    var x = document.getElementById("nama_anggota").value;
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



<div class="panel panel-default">
   
    <div class="panel-body">

       <div class="col-lg-12">
          <div class="card-header">
            <strong>Anggota Detail</strong> <a href="?page=anggota" class="col-cyan waves-effect pull-right">Lihat Data</a></div>
          <div class="card">
            <div class="col-md-12">
                <form id="form_validation" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>NIS/NIP</label>
                        <input type="text" id="nis" oninput="fungsinis()" disabled  class="form-control" maxlength="12" placeholder="NIS/NIP" value="<?php echo $tampil['nis_nip']?>" name="nis_nip" required onkeypress="return Angkasaja(event)"/>
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" id="nama" class="form-control" disabled placeholder="NAMA" name="nama_anggota" value="<?php echo $tampil['nama_anggota']?>" oninput="fungsinama()" required   />
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" id="username" name="username" disabled placeholder="USERNAME" class="form-control" value="<?php echo $tampil['username']?>" required  />
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" id="password" name="password" disabled placeholder="PASSWORD" class="form-control" value="<?php echo $tampil['password']?>" required  />
                    </div>

                      <div class="form-group">
                        <label>No Tlpn</label>
                        <input type="text"  class="form-control" maxlength="12" disabled placeholder="NO TLPN" value="<?php echo $tampil['no_tlpn']?>" name="no_tlpn" required onkeypress="return Angkasaja(event)"/>
                    </div>

                      <div class="form-group">
                        <label>Foto</label>
                        <input  name="foto" id="foto" type="file" class="form-control" disabled  accept="images/*" onchange="preview_foto(event)"  value="<?php echo $tampil['foto']?>"/>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input class="form-control" id="tgl_lahir" placeholder="TGL LAHIR" disabled name="tgl_lahir" value="<?php echo $tampil['tgl_lahir']?>" type="date" required  />
                    </div>

                   <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control" id="jk" name="jk" disabled oninput="fungsijk()">
                       <option value="L" <?php if ($jkl =='L')  {echo "selected";} ?>>Laki-Laki</option>
                        <option value="P" <?php if ($jkl =='P')  {echo "selected";} ?>>Perempuan</option> 
                     </select>
                     </div>

                <div class="form-group">
                    <label>Jurusan</label>
                    <select class="form-control" id="jurusan" name="jurusan" disabled oninput="fungsijurusan()">
                       <option value="kecantikan" <?php if ($jurusan =='kecantikan')  {echo "selected";} ?>>Kecantikan</option>
                        <option value="tataboga" <?php if ($jurusan =='tataboga')  {echo "selected";} ?>>Tataboga</option>
                        <option value="perhotelan" <?php if ($jurusan =='perhotelan')  {echo "selected";} ?>>Perhotelan</option>
                         <option value="tatabusana" <?php if ($jurusan =='tatabusana')  {echo "selected";} ?>>Tatabusana</option>
                        
                     </select>
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
                              <h4 align="center">Kartu Anggota Perpustakaan<br><small align="center">SMK Negeri 3 Klaten</small></h4>
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
                        <th>
                       <div class="pull-right" id="valbar">

                                    <script type="text/javascript">
                                        fungsinis();
                                    </script>
                            </div>
                        </th>
                    </table>
                </div>
            </div>

            
        </div>
    </div>




