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

//ambil nilai
require("inc/config.php"); 
require("inc/fungsi.php"); 
require("inc/koneksi.php"); 
$tpl = LoadTpl("template/login.html"); 


nocache;

//nilai
$filenya = "login.php";
$judul = "SISFOKOL SLTA v2.0";
$diload = "document.formx.tipe.focus();";
$pesan = "PASSWORD SALAH. HARAP DIULANGI...!!!";


//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($HTTP_POST_VARS['btnOK'])
	{
	//ambil nilai
	$tipe = nosql($_POST["tipe"]);
	$username = nosql($_POST["usernamex"]);
	$password = md5(nosql($_POST["passwordx"]));
	
	//cek null
	if ((empty($tipe)) OR (empty($username)) OR (empty($password)))
		{
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!!";
		pekem($pesan,$filenya);
		}
	else
		{
		//jika tp01 --> GURU ................................................................................
		if ($tipe == "tp01")
			{
			//query
			$q = mysql_query("SELECT m_pegawai.*, m_pegawai.kd AS mpkd, m_guru.* ".
								"FROM m_pegawai, m_guru ".
								"WHERE m_guru.kd_pegawai = m_pegawai.kd ".
								"AND m_pegawai.usernamex = '$username' ".
								"AND m_pegawai.passwordx = '$password'");
			$row = mysql_fetch_assoc($q);
			$total = mysql_num_rows($q);
		
			//cek login	
			if ($total != 0) 
				{
				session_start();
				
				//netralkan session dahulu...
				session_unset();
				session_destroy();
				
				//nilai
				$kd1_session = nosql($row['mpkd']);
				$nip1_session = nosql($row['nip']);
				$nm1_session = balikin($row['nama']);
				$username1_session = $username;
				$pass1_session = $password;
				$guru_session = "GURU";
				$hajirobe_session = $hajirobe;	
						
				//bikin session
				session_register("kd1_session");
				session_register("nip1_session");
				session_register("nm1_session");
				session_register("username1_session");
				session_register("pass1_session");
				session_register("guru_session");
				session_register("hajirobe_session");
				
				//re-direct
				$ke = "admgr/index.php";
				xloc($ke);	
				} 
			else 
				{		
				pekem($pesan, $filenya);
				}
			}
		//...................................................................................................
	
	
	
	
		//jika tp02 --> SISWA ...............................................................................
		if ($tipe == "tp02")
			{
			//query
			$q = mysql_query("SELECT * FROM m_siswa ".
								"WHERE usernamex = '$username' ".
								"AND passwordx = '$password'");
			$row = mysql_fetch_assoc($q);
			$total = mysql_num_rows($q);
		
			//cek login	
			if ($total != 0) 
				{
				session_start();		
					
				//netralkan session...
				session_unset();
				session_destroy();
	
				//nilai
				$kd2_session = nosql($row['kd']);
				$nis2_session = nosql($row['nis']);
				$username2_session = $username;
				$pass2_session = $password;
				$siswa_session = "SISWA";
				$nm2_session = balikin($row['nama']);
				$hajirobe_session = $hajirobe;	
						
				//bikin session
				session_register("kd2_session");
				session_register("nis2_session");
				session_register("username2_session");
				session_register("pass2_session");
				session_register("siswa_session");
				session_register("nm2_session");
				session_register("hajirobe_session");
					
				//re-direct
				$ke = "admsw/index.php";
				xloc($ke);	
				} 
			else 
				{		
				pekem($pesan, $filenya);
				}
			}
		//...................................................................................................
	




		//jika tp03 --> WALI KELAS ..........................................................................
		if ($tipe == "tp03")
			{
			//query
			$q = mysql_query("SELECT m_walikelas.*, m_pegawai.*, m_pegawai.kd AS mpkd ".
								"FROM m_walikelas, m_pegawai ".
								"WHERE m_walikelas.kd_pegawai = m_pegawai.kd ".
								"AND m_pegawai.usernamex = '$username' ".
								"AND m_pegawai.passwordx = '$password'");
			$row = mysql_fetch_assoc($q);
			$total = mysql_num_rows($q);
		
			//cek login	
			if ($total != 0) 
				{
				session_start();		
					
				//netralkan session...
				session_unset();
				session_destroy();
	
				//nilai
				$kd3_session = nosql($row['mpkd']);
				$nip3_session = nosql($row['nip']);
				$username3_session = $username;
				$pass3_session = $password;
				$wk_session = "WALI KELAS";
				$nm3_session = balikin($row['nama']);
				$hajirobe_session = $hajirobe;	
						
				//bikin session
				session_register("kd3_session");
				session_register("nip3_session");
				session_register("username3_session");
				session_register("pass3_session");
				session_register("wk_session");
				session_register("nm3_session");
				session_register("hajirobe_session");
				
				//re-direct
				$ke = "admwk/index.php";
				xloc($ke);	
				} 
			else 
				{		
				pekem($pesan, $filenya);
				}
			}
		//...................................................................................................
	




		//jika tp04 --> Kepala Sekolah ......................................................................
		if ($tipe == "tp04")
			{
			//query
			$q = mysql_query("SELECT * FROM admin_ks ".
								"WHERE usernamex = '$username' ".
								"AND passwordx = '$password'");
			$row = mysql_fetch_assoc($q);
			$total = mysql_num_rows($q);
		
			//cek login	
			if ($total != 0) 
				{
				session_start();		
					
				//netralkan session...
				session_unset();
				session_destroy();

				//nilai
				$kd4_session = nosql($row['kd']);
				$nip4_session = nosql($row['nip']);
				$username4_session = $username;
				$pass4_session = $password;
				$ks_session = "Kepala Sekolah";
				$nm4_session = balikin($row['nama']);
				$hajirobe_session = $hajirobe;	
						
				//bikin session
				session_register("kd4_session");
				session_register("nip4_session");
				session_register("username4_session");
				session_register("pass4_session");
				session_register("ks_session");
				session_register("nm4_session");
				session_register("hajirobe_session");
					
				//re-direct
				$ke = "admks/index.php";
				xloc($ke);	
				} 
			else 
				{		
				pekem($pesan, $filenya);
				}
			}
		//...................................................................................................





		//jika tp05 --> Tata Usaha ..........................................................................
		if ($tipe == "tp05")
			{
			//query
			$q = mysql_query("SELECT * FROM admin_tu ".
								"WHERE usernamex = '$username' ".
								"AND passwordx = '$password'");
			$row = mysql_fetch_assoc($q);
			$total = mysql_num_rows($q);
		
			//cek login	
			if ($total != 0) 
				{
				session_start();		
					
				//netralkan session...
				session_unset();
				session_destroy();
	
				//nilai
				$kd5_session = nosql($row['kd']);
				$nip5_session = nosql($row['nip']);
				$username5_session = $username;
				$pass5_session = $password;
				$tu_session = "Tata Usaha";
				$nm5_session = balikin($row['nama']);
				$hajirobe_session = $hajirobe;	
						
				//bikin session
				session_register("kd5_session");
				session_register("nip5_session");
				session_register("username5_session");
				session_register("pass5_session");
				session_register("tu_session");
				session_register("nm5_session");
				session_register("hajirobe_session");
				
				//re-direct
				$ke = "admtu/index.php";
				xloc($ke);	
				} 
			else 
				{		
				pekem($pesan, $filenya);
				}
			}
		//...................................................................................................





		//jika tp06 --> Administrator .......................................................................
		if ($tipe == "tp06")
			{	
			//query
			$q = mysql_query("SELECT * FROM adminx ".
								"WHERE usernamex = '$username' ".
								"AND passwordx = '$password'");
			$row = mysql_fetch_assoc($q);
			$total = mysql_num_rows($q);
		
			//cek login	
			if ($total != 0) 
				{
				session_start();		
					
				//netralkan session...
				session_unset();
				session_destroy();
	
				//nilai
				$kd6_session = nosql($row['kd']);
				$username6_session = $username;
				$pass6_session = $password;
				$adm_session = "Administrator";
				$hajirobe_session = $hajirobe;	
						
				//bikin session
				session_register("kd6_session");
				session_register("username6_session");
				session_register("pass6_session");
				session_register("adm_session");
				session_register("hajirobe_session");
					
				//re-direct
				$ke = "adm/index.php";
				xloc($ke);	
				} 
			else 
				{		
				pekem($pesan, $filenya);
				}
			}
		//...................................................................................................	
		}
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//isi *START
ob_start();

//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form action="'.$filenya.'" method="post" name="formx">
<TABLE WIDTH=911 BORDER=0 CELLPADDING=0 CELLSPACING=0>
<TR>
<TD valign="top">
<IMG SRC="'.$sumber.'/img/login_01.gif" WIDTH=679 HEIGHT=48 ALT="">
</TD>
<TD valign="top">
<IMG SRC="'.$sumber.'/img/login_02.gif" WIDTH=232 HEIGHT=48 ALT="">
</TD>
</TR>
<TR>
<TD valign="top" background="'.$sumber.'/img/login_03.gif">

<table width="100%" border="0" cellspacing="5" cellpadding="0">
<tr valign="top">
<td>
<h1>
<font color="yellow">'.$sek_nama.'</font>
</h1>
<em><font color="yellow">
'.$sek_alamat.'
<br>
'.$sek_kontak.'
</font>
</em></td>
</tr>
</table>

</TD>
<TD valign="top">
<IMG SRC="'.$sumber.'/img/login_04.gif" WIDTH=232 HEIGHT=98 ALT="">
</TD>
</TR>
<TR>
<TD background="'.$sumber.'/img/login_05.gif"">

Tipe : 
<select name="tipe">
<option value="" selected></option>
<option value="tp01">Guru</option>
<option value="tp02">Siswa</option>
<option value="tp03">Wali Kelas</option>
<option value="tp04">Kepala Sekolah</option>
<option value="tp05">Tata Usaha</option>
<option value="tp06">Administrator</option>
</select>, 
Username : 
<input name="usernamex" type="text" size="10" maxlength="15">, 
Password : 
<input name="passwordx" type="password" size="10" maxlength="15"> 
<input name="btnBTL" type="reset" value="BATAL">
<input name="btnOK" type="submit" value="OK &gt;&gt;&gt;">
</TD>

<TD valign="top">
<IMG SRC="'.$sumber.'/img/login_06.gif" WIDTH=232 HEIGHT=62 ALT="">
</TD>
</TR>
<TR>
<TD align="right" valign="top" background="'.$sumber.'/img/login_07.gif">
&copy;2008. <strong><a href="{url}" target="_blank" title="{versi} . Info Selengkapnya : {url}">{versi}</a></strong>
 <br>
 <em>Dibuat Oleh : <a href="#" onmouseover="showToolTip(event,\'Dibuat Oleh ; <br><strong>Agus Muhajir</strong>. <br>E-Mail : <br><i>hajirodeon@yahoo.com</i>\');return false" onmouseout="hideToolTip()"><font color="#FF0000">Agus Muhajir</font></a>.</em>
</TD>
<TD valign="top">
<IMG SRC="'.$sumber.'/img/login_08.gif" WIDTH=232 HEIGHT=55 ALT="">
</TD>
</TR>
</TABLE>
</form>';
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//isi
$isi = ob_get_contents();
ob_end_clean();

require("inc/niltpl.php");
?>