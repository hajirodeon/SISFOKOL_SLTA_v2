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
session_unset($hajirobe1_session);
session_unset($kd1_session);
session_unset($nip1_session);
session_unset($nm1_session);
session_unset($guru_session);
session_unset($username1_session);
session_unset($pass1_session);

session_unregister('$hajirobe1_session');
session_unregister('$kd1_session');
session_unregister('$nip1_session');
session_unregister('$nm1_session');
session_unregister('$guru_session');
session_unregister('$username1_session');
session_unregister('$pass1_session');

session_unset();
session_destroy();

//re-direct
xloc($sumber);
?>