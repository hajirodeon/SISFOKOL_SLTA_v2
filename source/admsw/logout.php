<?php
///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////
/////// SISFOKOL SLTA v2.0 							///////
/////// (Sistem Informasi Sekolah untuk SLTA v2.0) 	///////
///////////////////////////////////////////////////////////
/////// Dibuat oleh : 								///////
/////// Agus Muhajir, S.Kom 						///////
/////// URL 	: http://sisfokol.wordpress.com 	///////
/////// E-Mail	: hajirodeon@yahoo.com 				///////
/////// HP/SMS	: 081-829-88-54 					///////
///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////


session_start();

//ambil nilai
require("../inc/config.php"); 
require("../inc/fungsi.php"); 

nocache;

//hapus session
session_unset($hajirobe2_session);
session_unset($kd2_session);
session_unset($nis2_session);
session_unset($nm2_session);
session_unset($siswa_session);
session_unset($username2_session);
session_unset($pass2_session);

session_unregister('$hajirobe2_session');
session_unregister('$kd2_session');
session_unregister('$nis2_session');
session_unregister('$nm2_session');
session_unregister('$siswa_session');
session_unregister('$username2_session');
session_unregister('$pass2_session');

session_unset();
session_destroy();

//re-direct
xloc($sumber);
?>