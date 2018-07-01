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


///cek session //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$kd4_session = nosql($_SESSION['kd4_session']);
$nip4_session = nosql($_SESSION['nip4_session']);
$username4_session = nosql($_SESSION['username4_session']);
$ks_session = nosql($_SESSION['ks_session']);
$nm4_session = balikin($_SESSION['nm4_session']);
$pass4_session = nosql($_SESSION['pass4_session']);
$hajirobe_session = nosql($_SESSION['hajirobe_session']);

$qbw = mysql_query("SELECT * FROM admin_ks ".
						"WHERE kd = '$kd4_session' ".
						"AND usernamex = '$username4_session' ".
						"AND passwordx = '$pass4_session'");
$rbw = mysql_fetch_assoc($qbw);
$tbw = mysql_num_rows($qbw);

if (($tbw == 0) OR (empty($kd4_session)) 
	OR (empty($username4_session)) 
	OR (empty($pass4_session)) 
	OR (empty($ks_session)) 
	OR (empty($nip4_session)) 
	OR (empty($nm4_session)) 
	OR (empty($hajirobe_session)))
	{
	$pesan = "ANDA BELUM LOGIN. SILAHKAN LOGIN DAHULU...!!!";
	pekem($pesan, $sumber);
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>