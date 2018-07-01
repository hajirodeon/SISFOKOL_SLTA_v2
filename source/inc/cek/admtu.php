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
$kd5_session = nosql($_SESSION['kd5_session']);
$nip5_session = nosql($_SESSION['nip5_session']);
$nm5_session = balikin($_SESSION['nm5_session']);
$username5_session = nosql($_SESSION['username5_session']);
$tu_session = nosql($_SESSION['tu_session']);
$pass5_session = nosql($_SESSION['pass5_session']);
$hajirobe_session = nosql($_SESSION['hajirobe_session']);

$qbw = mysql_query("SELECT * FROM admin_tu ".
						"WHERE kd = '$kd5_session' ".
						"AND usernamex = '$username5_session' ".
						"AND passwordx = '$pass5_session'");
$rbw = mysql_fetch_assoc($qbw);
$tbw = mysql_num_rows($qbw);

if (($tbw == 0) OR (empty($kd5_session)) 
	OR (empty($username5_session)) 
	OR (empty($pass5_session)) 
	OR (empty($tu_session)) 
	OR (empty($hajirobe_session)))
	{
	$pesan = "ANDA BELUM LOGIN. SILAHKAN LOGIN DAHULU...!!!";
	pekem($pesan, $sumber);
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>