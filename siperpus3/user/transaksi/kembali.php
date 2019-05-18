<?php


$kd = $_GET['kd'];
$judul = $_GET['judul'];


$sql = $koneksi->query("update tb_transaksi set status='kembali' where kd='$kd'");

$sql = $koneksi->query("update tb_buku set jumlah_buku =(jumlah_buku+1) where judul = '$judul'");

	?>

	<script type="text/javascript">
		

		alert("Proses Kembalikan Buku Berhasil");
		window.location.href="?user=transaksi";

	</script>


	<?php

?>