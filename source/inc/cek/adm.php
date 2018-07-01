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
$kd6_session = nosql($_SESSION['kd6_session']);
$username6_session = nosql($_SESSION['username6_session']);
$adm_session = nosql($_SESSION['adm_session']);
$pass6_session = nosql($_SESSION['pass6_session']);
$hajirobe_session = nosql($_SESSION['hajirobe_session']);

$qbw = mysql_query("SELECT * FROM adminx ".
						"WHERE kd = '$kd6_session' ".
						"AND usernamex = '$username6_session' ".
						"AND passwordx = '$pass6_session'");
$rbw = mysql_fetch_assoc($qbw);
$tbw = mysql_num_rows($qbw);

if (($tbw == 0) OR (empty($kd6_session)) 
	OR (empty($username6_session)) 
	OR (empty($pass6_session)) 
	OR (empty($adm_session)) 
	OR (empty($hajirobe_session)))
	{
	$pesan = "ANDA BELUM LOGIN. SILAHKAN LOGIN DAHULU...!!!";
	pekem($pesan, $sumber);
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>