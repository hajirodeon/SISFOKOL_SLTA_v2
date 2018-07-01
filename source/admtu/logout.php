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
session_unset($hajirobe5_session);
session_unset($kd5_session);
session_unset($nip5_session);
session_unset($nm5_session);
session_unset($tu_session);
session_unset($username5_session);
session_unset($pass5_session);

session_unregister('$hajirobe5_session');
session_unregister('$kd5_session');
session_unregister('$nip5_session');
session_unregister('$nm5_session');
session_unregister('$tu_session');
session_unregister('$username5_session');
session_unregister('$pass5_session');

session_unset();
session_destroy();

//re-direct
xloc($sumber);
?>