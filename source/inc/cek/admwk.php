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
$kd3_session = nosql($_SESSION['kd3_session']);
$nip3_session = nosql($_SESSION['nip3_session']);
$nm3_session = nosql($_SESSION['nm3_session']);
$username3_session = nosql($_SESSION['username3_session']);
$wk_session = nosql($_SESSION['wk_session']);
$pass3_session = nosql($_SESSION['pass3_session']);
$hajirobe_session = nosql($_SESSION['hajirobe_session']);

$qbw = mysql_query("SELECT m_walikelas.*, m_pegawai.*, m_pegawai.kd AS mpkd ".
						"FROM m_walikelas, m_pegawai ".
						"WHERE m_walikelas.kd_pegawai = m_pegawai.kd ".
						"AND m_pegawai.kd = '$kd3_session' ".
						"AND m_pegawai.usernamex = '$username3_session' ".
						"AND m_pegawai.passwordx = '$pass3_session'");
$rbw = mysql_fetch_assoc($qbw);
$tbw = mysql_num_rows($qbw);

if (($tbw == 0) OR (empty($kd3_session)) 
	OR (empty($username3_session)) 
	OR (empty($nip3_session)) 
	OR (empty($nm3_session)) 
	OR (empty($pass3_session)) 
	OR (empty($wk_session)) 
	OR (empty($hajirobe_session)))
	{
	$pesan = "ANDA BELUM LOGIN. SILAHKAN LOGIN DAHULU...!!!";
	pekem($pesan, $sumber);
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>