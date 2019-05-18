<?php ob_start();


$koneksi = new mysqli("localhost","root","","dbsiput");
$content ='
<style type="text/css">
 <img src="../images/banner.jpg" width="120" height="90" align="left" style="margin-top:20px">
.tabel{ border-collapse:collapse;}
.tabel th { padding: 10px 15px; background-color:#ff8320; color:#fff;}
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
        <th>ID Kunjungan</th>
        <th>Nama</th>
        <th>No Identitas</th>
        <th>Instansi</th>
        <th>Status</th>
        <th>Waktu Kunjung</th>
 
    </tr>';

$no=1;
$sql = $koneksi ->query("select * from tb_kunjungan");
while ($data = $sql->fetch_assoc()) {
    $content .='
    <tr>
        <td align="center">'.  $no++.'</td>    
        <td align="center">'. $data['id_kunjungan'].'</td>
        <td align="center">'. $data['nama'].'</td>
        <td align="center"> '.$data['no_identitas'].'</td>
        <td align="center"> '.$data['instansi'].'</td>
        <td align="center"> '.$data['status'].'</td>
        <td align="center"> '.$data['waktu_kunjung'].'</td>
    </tr>
    ';
}
           
 $content .='

	</table>
</page>
    ';

require_once('../assets/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('P','A4','en');
$html2pdf->WriteHTML($content);
$html2pdf->Output('example.pdf');

?>
