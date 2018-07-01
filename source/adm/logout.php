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
session_unset($hajirobe_session);
session_unset($kd6_session);
session_unset($adm_session);
session_unset($username6_session);
session_unset($pass6_session);

session_unregister('$hajirobe_session');
session_unregister('$kd6_session');
session_unregister('$adm_session');
session_unregister('$username6_session');
session_unregister('$pass6_session');

session_unset();
session_destroy();

//re-direct
xloc($sumber);
?>