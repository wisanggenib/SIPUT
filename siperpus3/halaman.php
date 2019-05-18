<?php 
 $koneksi = new mysqli("localhost","root","","dbsiput");
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="assets/images/logo.png">
  <title>UPT Perpustakaan SMK Negeri 3 Klaten</title>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

<div class="header">
  <h1></h1>
  <p></p>
</div>

<div class="topnav">
  <a href="index.php">HOME</a>
  <a href="buku.data.php">BUKU</a>
  <a href="insert.php">KUNJUNGAN</a>
  <a href="login.php" style="float:right">MASUK</a>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <h3>A. Selamat Datang
      Di Perpustakaan SMK Negeri 3 Klaten</h3>
      <p>Di perpustakaan ini menyediakan berbagai macam jenis buku, mulai dari buku pelajaran, novel, majalah, dan masih banyak lagi.
    </p>siswa juga dapat melakukan pencarian buku-buku pada website.  
	</p>
	<h3></h3>
	<h3>B. Visi :</h3>
	(1).Menjadi SMK Yang Berprestasi, Berkarakter Dan Berwawasan Lingkungan
	
	<h3>C. Misi :</h3>
	(1).Mewujudkan Tamatan Beriman, Bertaqwa, Cerdas, dan Kompeten di Bidangnya.<p>
    (2).Melaksanakan Pembelajaran Berbasis ICT Mengacu pada Kurikulum 2013<p>
    (3).Mewujudkan Implementasi Sistem ManagemenMutu ISO 9001 : 2008 secara Konsisten.<p>
    (4).Meningkatkan Hubungan Kerjasama dengan Masyarakat, Mitra Nasional dan Internasional untuk Pengembangan Kualitas Pendidik dan Tenaga Kependidikan.<p>
    (5).Mengembangkan Sarana Prasarana yang Memadai, Sesuai dengan Standar Industri.<p>
    (6).Menumbuhkan Kesadaran, Kepedulian, dan Kecintaan pada Lingkungan dalam Diri setiap Warga Sekolah<p>
    </div>
  </div>
</div>

<div class="footer">
<p>Copyright&copy; 2019 SMK NEGERI 3 KLATEN</p>
</div>

</body>
</html>