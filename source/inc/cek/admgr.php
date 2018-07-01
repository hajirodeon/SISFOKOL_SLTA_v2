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
$kd1_session = nosql($_SESSION['kd1_session']);
$nip1_session = nosql($_SESSION['nip1_session']);
$nm1_session = nosql($_SESSION['nm1_session']);
$username1_session = nosql($_SESSION['username1_session']);
$guru_session = nosql($_SESSION['guru_session']);
$pass1_session = nosql($_SESSION['pass1_session']);
$hajirobe_session = nosql($_SESSION['hajirobe_session']);

$qbw = mysql_query("SELECT m_guru.*, m_pegawai.* ".
						"FROM m_guru, m_pegawai ".
						"WHERE m_guru.kd_pegawai = m_pegawai.kd ".
						"AND m_pegawai.kd = '$kd1_session' ".
						"AND m_pegawai.usernamex = '$username1_session' ".
						"AND m_pegawai.passwordx = '$pass1_session'");
$rbw = mysql_fetch_assoc($qbw);
$tbw = mysql_num_rows($qbw);

if (($tbw == 0) OR (empty($kd1_session)) 
	OR (empty($username1_session)) 
	OR (empty($pass1_session)) 
	OR (empty($guru_session)) 
	OR (empty($hajirobe_session)))
	{
	$pesan = "ANDA BELUM LOGIN. SILAHKAN LOGIN DAHULU...!!!";
	pekem($pesan, $sumber);
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>