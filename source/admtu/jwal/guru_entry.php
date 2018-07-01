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

require("../../inc/config.php"); 
require("../../inc/fungsi.php"); 
require("../../inc/koneksi.php"); 
require("../../inc/cek/admtu.php"); 
$tpl = LoadTpl("../../template/index.html"); 

nocache;

//nilai
$filenya = "guru_entry.php";
$judul = "Entry Guru Mengajar";
$judulku = "[$tu_session : $nip5_session. $nm5_session] ==> $judul";
$judulx = $judul;
$tapelkd = nosql($_REQUEST['tapelkd']);
$smtkd = nosql($_REQUEST['smtkd']);
$gurkd = nosql($_REQUEST['gurkd']);


//focus
$diload = "document.formx.kprp.focus();";



//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//nek batal
if ($HTTP_POST_VARS['btnBTL'])
	{
	//nilai
	$tapelkd = nosql($_POST['tapelkd']);
	$smtkd = nosql($_POST['smtkd']);
	$gurkd = nosql($_POST['gurkd']);

	
	//re-direct
	$ke = "guru.php?tapelkd=$tapelkd&smtkd=$smtkd&gurkd=$gurkd";
	xloc($ke);
	}





//nek simpan
if ($HTTP_POST_VARS['btnSMP'])
	{
	//nilai
	$tapelkd = nosql($_POST['tapelkd']);
	$smtkd = nosql($_POST['smtkd']);
	$gurkd = nosql($_POST['gurkd']);
	$kprp = nosql($_POST['kprp']);
	$hari = nosql($_POST['hari']);
	$jam = nosql($_POST['jam']);
	
	//nek null
	if ((empty($kprp)) OR (empty($hari)) OR (empty($jam)))
		{
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!";
		$ke = "$filenya?tapelkd=$tapelkd&smtkd=$smtkd&gurkd=$gurkd";
		pekem($pesan,$ke);
		}
	else
		{
		//detail
		$qrpx = mysql_query("SELECT m_guru_mapel.*, m_guru.* ".
								"FROM m_guru_mapel, m_guru ".
								"WHERE m_guru_mapel.kd_guru = m_guru.kd ".
								"AND m_guru_mapel.kd = '$kprp'");
		$rrpx = mysql_fetch_assoc($qrpx);
		$rpx_kelkd = nosql($rrpx['kd_kelas']);
		$rpx_progkd = nosql($rrpx['kd_program']);
		$rpx_rukd = nosql($rrpx['kd_ruang']);
		
		
		//cek		
		$qcc = mysql_query("SELECT * FROM jadwal ".
								"WHERE kd_tapel = '$tapelkd' ".
								"AND kd_smt = '$smtkd' ".
								"AND kd_kelas = '$rpx_kelkd' ".
								"AND kd_program = '$rpx_progkd' ".
								"AND kd_ruang = '$rpx_rukd' ".
								"AND kd_jam = '$jam' ".
								"AND kd_hari = '$hari'");					
		$rcc = mysql_fetch_assoc($qcc);
		$tcc = mysql_num_rows($qcc);

		//nek ada
		if ($tcc != 0)
			{
			$pesan = "Jadwal Sudah Terisi. Harap Diperhatikan...!!";
			$ke = "$filenya?tapelkd=$tapelkd&smtkd=$smtkd&gurkd=$gurkd";
			pekem($pesan,$ke);
			}
		else	
			{
			//query
			mysql_query("INSERT INTO jadwal(kd, kd_tapel, kd_smt, kd_kelas, kd_program, ".
							"kd_ruang, kd_jam, kd_hari, kd_guru_mapel) VALUES ".
							"('$x', '$tapelkd', '$smtkd', '$rpx_kelkd', '$rpx_progkd', ".
							"'$rpx_rukd', '$jam', '$hari', '$kprp')");
			
			//re-direct
			$ke = "guru.php?tapelkd=$tapelkd&smtkd=$smtkd&gurkd=$gurkd";
			xloc($ke);
			}
		}	
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//isi *START
ob_start();


//js
require("../../inc/menu/admtu.php"); 
xheadline($judul);

//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form action="'.$filenya.'" method="post" name="formx">
<table width="100%" bgcolor="'.$warnaover.'" cellspacing="0" cellpadding="3">
<tr valign="top">
<td>
Tahun Pelajaran : ';
//terpilih
$qtpx = mysql_query("SELECT * FROM m_tapel ".
						"WHERE kd = '$tapelkd'");
$rowtpx = mysql_fetch_assoc($qtpx);
$tpx_kd = nosql($rowtpx['kd']);
$tpx_thn1 = nosql($rowtpx['tahun1']);
$tpx_thn2 = nosql($rowtpx['tahun2']);

echo '<strong>'.$tpx_thn1.'/'.$tpx_thn2.'</strong>, 

Semester : ';
//terpilih
$qsmtx = mysql_query("SELECT * FROM m_smt ".
						"WHERE kd = '$smtkd'");
$rowsmtx = mysql_fetch_assoc($qsmtx);
$smtx_kd = nosql($rowsmtx['kd']);
$smtx_smt = nosql($rowsmtx['smt']);

echo '<strong>'.$smtx_smt.'</strong>, 

Guru : ';
//terpilih
$qgrx = mysql_query("SELECT * FROM m_pegawai ".
						"WHERE kd = '$gurkd'");
$rowgrx = mysql_fetch_assoc($qgrx);
$grx_kd = nosql($rowgrx['kd']);
$grx_nip = nosql($rowgrx['nip']);
$grx_nm = balikin($rowgrx['nama']);

echo '<strong>'.$grx_nip.'. '.$grx_nm.'</strong>
</td>
</tr>
</table>
<br>

<table width="100%" border="0" cellspacing="0" cellpadding="3">
<tr valign="top">
<td>
<strong>Kelas/Program/Ruang/Pelajaran : </strong>
<br>';
echo '<select name="kprp">
<option value="" selected></option>';
//query
$qkui = mysql_query("SELECT m_guru.*, m_guru_mapel.*, m_guru_mapel.kd AS mgkd, ".
						"m_mapel.*, m_kelas.*, m_program.*, m_ruang.* ".
						"FROM m_guru, m_guru_mapel, m_mapel, ".
						"m_kelas, m_program, m_ruang ".
						"WHERE m_guru_mapel.kd_guru = m_guru.kd ".
						"AND m_guru_mapel.kd_ruang = m_ruang.kd ".
						"AND m_guru_mapel.kd_mapel = m_mapel.kd ".
						"AND m_guru.kd_kelas = m_kelas.kd ".
						"AND m_guru.kd_program = m_program.kd ".
						"AND m_guru.kd_tapel = '$tapelkd' ".
						"AND m_guru.kd_pegawai = '$gurkd' ".
						"ORDER BY m_mapel.pel ASC");
$rkui = mysql_fetch_assoc($qkui);

do
	{
	$kui_kd = nosql($rkui['mgkd']);;
	$kui_kelas = nosql($rkui['kelas']);;
	$kui_program = balikin($rkui['program']);;
	$kui_ruang = balikin($rkui['ruang']);;
	$kui_pel = balikin($rkui['pel']);;	
		
	echo '<option value="'.$kui_kd.'">'.$kui_kelas.' / '.$kui_program.' / '.$kui_ruang.' / '.$kui_pel.'</option>';
	}
while ($rkui = mysql_fetch_assoc($qkui));

echo '</select>
<br><br>
<strong>Hari : </strong>
<br>';


//hari-terpilih
$qhrix = mysql_query("SELECT * FROM m_hari ".
						"WHERE kd = '$dir_harikd'");
$rhrix = mysql_fetch_assoc($qhrix);
$hrix_kd = nosql($rhrix['kd']);
$hrix_hr = balikin($rhrix['hari']);

echo '<select name="hari">
<option value="'.$hrix_kd.'" selected>'.$hrix_hr.'</option>';
//hari
$qhri = mysql_query("SELECT * FROM m_hari ".
						"WHERE kd <> '$hrix_kd' ".
						"ORDER BY round(no) ASC");
$rhri = mysql_fetch_assoc($qhri);

do
	{
	$hri_kd = nosql($rhri['kd']);
	$hri_hr = balikin($rhri['hari']);
		
	echo '<option value="'.$hri_kd.'">'.$hri_hr.'</option>';
	}
while ($rhri = mysql_fetch_assoc($qhri));

echo '</select>
<br><br>
<strong>Jam : </strong>
<br>';


//jam-terpilih
$qjmx = mysql_query("SELECT * FROM m_jam ".
						"WHERE kd = '$dir_jamkd'");
$rjmx = mysql_fetch_assoc($qjmx);
$jmx_kd = nosql($rjmx['kd']);
$jmx_jam = nosql($rjmx['jam']);

echo '<select name="jam">
<option value="'.$jmx_kd.'" selected>'.$jmx_jam.'</option>';
//jam
$qjm = mysql_query("SELECT * FROM m_jam ".
						"WHERE kd <> '$jmx_kd' ".
						"ORDER BY round(jam) ASC");
$rjm = mysql_fetch_assoc($qjm);

do
	{
	$jm_kd = nosql($rjm['kd']);
	$jm_hr = nosql($rjm['jam']);
		
	echo '<option value="'.$jm_kd.'">'.$jm_hr.'</option>';
	}
while ($rjm = mysql_fetch_assoc($qjm));

echo '</select>

<br><br>
<input name="tapelkd" type="hidden" value="'.$tapelkd.'">
<input name="smtkd" type="hidden" value="'.$smtkd.'">
<input name="gurkd" type="hidden" value="'.$gurkd.'">
<input name="btnSMP" type="submit" value="SIMPAN">
<input name="btnBTL" type="submit" value="BATAL">
</td>
</tr>
</table>
</form>
<br>
<br>
<br>';
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//isi
$isi = ob_get_contents();
ob_end_clean();

require("../../inc/niltpl.php");
?>