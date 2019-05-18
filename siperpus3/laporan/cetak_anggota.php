<?php ob_start();


$koneksi = new mysqli("localhost","root","","dbsiput");
$content ='
<style type="text/css">
.tabel{ border-collapse:collapse;}
.tabel th { padding: 10px 15px; background-color:#ff8320; color:#fff;}
.tabel td {padding:3px;}

img{width:70px;}

</style>
';

$content .='

<page>
    <img src="../images/logosmk.png" width="120" height="90" align="left" style="margin-top:20px">
	   <h1 align="center">Perpustakaan SMK Negeri 3 Klaten</h1>
       <p align="center">Alamat : Jl. Panunggalan No 17V Pati Jawa Tengah</p>
       <hr>
    
		<div style="padding:20px 0 10px 0; font-size:15px;">Laporan Data Anggota</div>

		<table border="1px" class="tabel">
	<tr>
       	<th>No.</th>
        <th>Nis</th>
        <th>Nama</th>
        <th>Tanggal Lahir</th>
        <th>NO Tlpn</th>
        <th>Foto</th>
        <th align="center" width="5px">Jk</th>
        <th>Jurusan</th>
 
    </tr>';

$no=1;
$sql = $koneksi ->query("select * from tb_anggota");
while ($data = $sql->fetch_assoc()) {
  
    $content .='
    <tr>
        <td align="center">'. $no++.'</td>    
        <td align="center">'. $data['nis_nip'].'</td>
        <td align="center">'. $data['nama_anggota'].'</td>
        <td align="center">'.date("d/m/Y", strtotime($data['tgl_lahir'])).'</td>
        <td align="center"> '.$data['no_tlpn'].'</td>
        <td align="center">'.$data['foto'].'</td>
        <td align="center"> '.$data['jk'].'</td>
        <td align="center"> '.$data['jurusan'].'</td>
    </tr>
    ';
}
           
 $content .='

	</table>
</page>
    ';

require_once('../assets/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('P','A3','en');
$html2pdf->WriteHTML($content);
$html2pdf->Output('cetak_data_anggota.pdf');

?>