<?php ob_start();


$koneksi = new mysqli("localhost","root","","dbsiput");
$content ='
<style type="text/css">

.tabel{ border-collapse:collapse;}
.tabel th { padding: 10px 10px; background-color:#ff8320; color:#fff;}
.tabel td{padding:3px;}
</style>
';

$content .='

<page>
    <img src="../images/logosmk.png" width="120" height="90" align="left" style="margin-top:20px">
	   <h1 align="center">Perpustakaan SMK Negeri 3 Klaten</h1>
       <p align="center">Alamat : Jl. Panunggalan No 17V Pati Jawa Tengah</p>
       <hr>
    
		<div style="padding:10px 0 10px 0; font-size:15px;">Laporan Data Buku</div>

		<table border="1px" class="tabel">
	<tr>
       	<th>No.</th>
        <th>KD Buku</th>
        <th>ID Kategori</th>
        <th align="center">Judul</th>
        <th>Pengarang</th>
        <th>Penerbit</th>
        <th>Thn Terbit</th>
        <th align="center">ISBN</th>
        <th>Jml Buku</th>
        <th>Lokasi</th>
        <th>Tgl Input</th>

 
    </tr>';

$no=1;
$sql = $koneksi ->query("select * from tb_buku");
while ($data = $sql->fetch_assoc()) {
    $content .='
    <tr>
        <td align="center">'.  $no++.'</td>    
        <td align="center">'. $data['kd_buku'].'</td>
        <td align="center">'. $data['id_kategori'].'</td>
        <td align="center"> '.$data['judul'].'</td>
        <td align="center"> '.$data['pengarang'].'</td>
        <td align="center"> '.$data['penerbit'].'</td>
        <td align="center"> '.$data['thn_terbit'].'</td>
        <td align="center"> '.$data['isbn'].'</td>
        <td align="center"> '.$data['jumlah_buku'].'</td>
        <td align="center"> '.$data['lokasi'].'</td>
        <td align="center">'.date("d/m/Y", strtotime($data['tgl_input'])).'</td>
        
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
$html2pdf->Output('example.pdf');

?>
