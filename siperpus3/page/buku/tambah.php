
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

function fungsikd() {
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
var barr = $("#kd_buku").val() ;
document.getElementById("hasilkd").innerHTML = barr;
$("#valbar").html("").show().barcode( barr, "code128", settings);
};



function fungsijudul() {
    var x = document.getElementById("judul").value;
    document.getElementById("hasiljudul").innerHTML = x;
}

function fungsipengarang() {
    var x = document.getElementById("pengarang").value;
    document.getElementById("hasilpengarang").innerHTML = x;
}

function fungsipenerbit() {
    var x = document.getElementById("penerbit").value;
    document.getElementById("hasilpenerbit").innerHTML = x;
}

function fungsiisbn() {
    var x = document.getElementById("isbn").value;
    document.getElementById("hasilisbn").innerHTML = x;
}


</script>



       
<div class="panel-body">
<div class="row">
       <div class="col-lg-6">
          <div class="card-header">
            <strong>Tambah Data</strong> <a href="?page=buku" class="col-cyan waves-effect pull-right">Lihat Data</a></div>
          <div class="card">
            <div class="col-md-12">
                <form id="form_validation" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                <label>KD Buku</label>
                <input class="form-control" name="kd_buku" placeholder="KODE BUKU" id="kd_buku" oninput="fungsikd()" required/>
            </div>

                <div class="form-group">
               <div class="form-group">
                    <label>ID Kategori</label>
                    <select class="form-control" name="kategori" required>
<?php
    
    $sql = $koneksi->query("select *from tb_kategori order by id_kategori");

     while ($data=$sql->fetch_assoc()) {
        echo "<option value='$data[id_kategori].$data[kategori]'> [$data[id_kategori]]  $data[kategori]</option>";
    }

?>
  

</select>
    </div>

                
      <div class="form-group">
          <label>Judul</label>
          <input class="form-control" name="judul" placeholder="JUDUL BUKU" id="judul" oninput="fungsijudul()" required /> 
      </div>

       <div class="form-group">
          <label>Pengarang</label>
          <input class="form-control" name="pengarang" placeholder="PENGARANG" id="pengarang" oninput="fungsipengarang()" required /> 
      </div>

       <div class="form-group">
          <label>Penerbit</label>
          <input class="form-control" name="penerbit" placeholder="PENERBIT" id="penerbit" oninput="fungsipenerbit()" required /> 
      </div>

      <div class="form-group">
          <label>Tahun Terbit</label>
          <select class="form-control" name="tahun" required>
           
           <?php

           $tahun = date("Y");
           for ($i=$tahun-15; $i <=$tahun;$i++) {     
              echo' 


                  <option value="'.$i.'">'.$i.'</option>


              ';
           }

           ?>   

          </select>
      </div>
      <div class="form-group">
          <label>Isbn</label>
          <input class="form-control" name="isbn" id="isbn" placeholder="ISBN" oninput="fungsiisbn()" required />
      </div>

      <div class="form-group">
          <label>Jumlah Buku</label>
          <input class="form-control" type="number" placeholder="JUMLAH BUKU" name="jumlah" required />
      </div>

      <div class="form-group">
          <label>Lokasi</label>
          <select class="form-control" name="lokasi" required>
              <option value="rak 1">Rak 1</option>
              <option value="rak 2">Rak 2</option>
              <option value="rak 3">Rak 3</option>
          </select>
      </div>

      <div class="form-group">
          <label>Tanggal Input</label>
          <input class="form-control" name="tanggal" type="date" required />
      </div>

      <div>
          

          <input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></input>
           <input type="reset"  value="Reset" class="btn btn-danger"></input>


        </div>

          </form>
          </div>
  </div>
</div>

</div>
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
                    <table width="100%" " class="tengah responsive" >
                      <tr valign="top">
                        <th  rowspan="5" valign="top" width="150px;">
                            <img src="images/no-photo.jpg" id="viewfoto" class="img-thumbnail fview" alt="Foto Anggota">
                        </th>
                        <td valign="top">KD BUKU</td>
                        <td>:</th>
                            <td align="left" id="hasilkd"></td>
                        </tr>
                        <tr>
                            <th>JUDUL</th>
                            <th>:</th>
                            <td align="left" id="hasiljudul"></td>
                        </tr>

                        
                        <tr>
                            <th>PENGARANG</th>
                            <th>:</th>
                            <td align="left" id="hasilpengarang"></td>
                        </tr>
                        <tr valign="top">
                            <th>PENERBIT</th>
                            <th>:</th>
                            <td align="left" id="hasilpenerbit"></td>
                        </tr>
                         <tr valign="top">
                            <th>ISBN</th>
                            <th>:</th>
                            <td align="left" id="hasilisbn"></td>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <td></td>
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







        <?php
        $kd_buku = $_POST['kd_buku'];
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $tahun = $_POST['tahun'];
        $isbn = $_POST['isbn'];
        $jumlah = $_POST['jumlah'];
        $lokasi = $_POST['lokasi'];
        $tanggal = $_POST['tanggal'];
        $simpan = $_POST['simpan'];

        $kategori = $_POST['kategori'];
        $pecah_kategori = explode(".", $kategori);
        $id_kategori = $pecah_kategori[0];
        $kategori = $pecah_kategori[1];

        if ($simpan) {
            
            $sql = $koneksi->query("insert into tb_buku(kd_buku,id_kategori,judul,pengarang,penerbit,thn_terbit,isbn,jumlah_buku,lokasi,tgl_input)values('$kd_buku','$id_kategori','$judul','$pengarang','$penerbit','$tahun','$isbn',' $jumlah','$lokasi','$tanggal')");

        $cekkd_buku = mysqli_query($koneksi, "SELECT kd_buku FROM tb_buku WHERE kd_buku = '$kd_buku'");
    if (mysqli_num_rows($cekkd_buku) > 0) 
    {
        echo "<script>alert('Gagal Menambahkan  Kode Buku Sudah Terdaftar!!');</script>";
        return false;
    }

            if ($sql) {
                
                ?>

                <script type="text/javascript">
                    

                    alert ("Data Berhasil Disimpan");
                    window.location.href="?page=buku";

                </script>

                <?php

            }
        }
        

        ?>