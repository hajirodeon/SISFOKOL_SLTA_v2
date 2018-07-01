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
session_unset($hajirobe3_session);
session_unset($kd3_session);
session_unset($nip3_session);
session_unset($nm3_session);
session_unset($wk_session);
session_unset($username3_session);
session_unset($pass3_session);

session_unregister('$hajirobe3_session');
session_unregister('$kd3_session');
session_unregister('$nip3_session');
session_unregister('$nm3_session');
session_unregister('$wk_session');
session_unregister('$username3_session');
session_unregister('$pass3_session');

session_unset();
session_destroy();

//re-direct
xloc($sumber);
?>