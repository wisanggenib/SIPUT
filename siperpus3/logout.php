<?php

	session_start();

	session_destroy();

	header("location:login.php");

	session_start();

	session_destroy();


	header("location:login_anggota.php");



?>