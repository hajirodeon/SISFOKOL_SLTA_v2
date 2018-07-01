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
$filenya = "pel_entry.php";
$judul = "Entry Jadwal Pelajaran";
$judulku = "[$tu_session : $nip5_session. $nm5_session] ==> $judul";
$judulx = $judul;
$tapelkd = nosql($_REQUEST['tapelkd']);
$smtkd = nosql($_REQUEST['smtkd']);
$kelkd = nosql($_REQUEST['kelkd']);
$progkd = nosql($_REQUEST['progkd']);
$rukd = nosql($_REQUEST['rukd']);
$kd = nosql($_REQUEST['kd']);
$s = nosql($_REQUEST['s']);


//focus
$diload = "document.formx.hari.focus();";



//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//nek batal
if ($HTTP_POST_VARS['btnBTL'])
	{
	//nilai
	$tapelkd = nosql($_POST['tapelkd']);
	$smtkd = nosql($_POST['smtkd']);
	$kelkd = nosql($_POST['kelkd']);
	$progkd = nosql($_POST['progkd']);
	$rukd = nosql($_POST['rukd']);
	
	//re-direct
	$ke = "pel.php?tapelkd=$tapelkd&smtkd=$smtkd&kelkd=$kelkd&progkd=$progkd&rukd=$rukd";
	xloc($ke);
	}





//nek simpan
if ($HTTP_POST_VARS['btnSMP'])
	{
	//nilai
	$tapelkd = nosql($_POST['tapelkd']);
	$smtkd = nosql($_POST['smtkd']);
	$kelkd = nosql($_POST['kelkd']);
	$progkd = nosql($_POST['progkd']);
	$rukd = nosql($_POST['rukd']);
	$kd = nosql($_POST['kd']);
	$hari = nosql($_POST['hari']);
	$jam = nosql($_POST['jam']);
	$pel = nosql($_POST['pel']);
	
	//nek null
	if ((empty($hari)) OR (empty($jam)) OR (empty($pel)))
		{
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!";
		$ke = "$filenya?tapelkd=$tapelkd&smtkd=$smtkd&kelkd=$kelkd&progkd=$progkd&rukd=$rukd";
		pekem($pesan,$ke);
		}
	else
		{
		//nek edit
		if ($s == "edit")
			{
			mysql_query("UPDATE jadwal SET kd_hari = '$hari', ".
							"kd_jam = '$jam', ".
							"kd_guru_mapel = '$pel' ".
							"WHERE kd_tapel = '$tapelkd' ".
							"AND kd_smt = '$smtkd' ".
							"AND kd_kelas = '$kelkd' ".
							"AND kd_program = '$progkd' ".
							"AND kd_ruang = '$rukd' ".
							"AND kd = '$kd'");				
			//re-direct
			$ke = "pel.php?tapelkd=$tapelkd&smtkd=$smtkd&kelkd=$kelkd&progkd=$progkd&rukd=$rukd";
			xloc($ke);
			}
		else if (empty($s)) //nek baru
			{
			//cek		
			$qcc = mysql_query("SELECT * FROM jadwal ".
									"WHERE kd_tapel = '$tapelkd' ".
									"AND kd_smt = '$smtkd' ".
									"AND kd_kelas = '$kelkd' ".
									"AND kd_program = '$progkd' ".
									"AND kd_ruang = '$rukd' ".
									"AND kd_jam = '$jam' ".
									"AND kd_hari = '$hari'");					
			$rcc = mysql_fetch_assoc($qcc);
			$tcc = mysql_num_rows($qcc);
	
			//nek ada
			if ($tcc != 0)
				{
				$pesan = "Jadwal Sudah Terisi. Harap Diperhatikan...!!";
				$ke = "$filenya?tapelkd=$tapelkd&smtkd=$smtkd&kelkd=$kelkd&progkd=$progkd&rukd=$rukd";
				pekem($pesan,$ke);
				}
			else	
				{
				//query
				mysql_query("INSERT INTO jadwal(kd, kd_tapel, kd_smt, kd_kelas, kd_program, ".
								"kd_ruang, kd_jam, kd_hari, kd_guru_mapel) VALUES ".
								"('$x', '$tapelkd', '$smtkd', '$kelkd', '$progkd', ".
								"'$rukd', '$jam', '$hari', '$pel')");
				
				//re-direct
				$ke = "pel.php?tapelkd=$tapelkd&smtkd=$smtkd&kelkd=$kelkd&progkd=$progkd&rukd=$rukd";
				xloc($ke);
				}
			}
		}	
	}





//nek edit
if ($s == "edit")
	{
	//query
	$qdir = mysql_query("SELECT * FROM jadwal ".
							"WHERE kd_tapel = '$tapelkd' ".
							"AND kd_smt = '$smtkd' ".
							"AND kd_kelas = '$kelkd' ".
							"AND kd_program = '$progkd' ".
							"AND kd_ruang = '$rukd' ".
							"AND kd = '$kd'");
	$rdir = mysql_fetch_assoc($qdir);
	$dir_harikd = nosql($rdir['kd_hari']);
	$dir_jamkd = nosql($rdir['kd_jam']);
	$dir_gmkd = nosql($rdir['kd_guru_mapel']);
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

Kelas : ';
//terpilih
$qbtx = mysql_query("SELECT * FROM m_kelas ".
						"WHERE kd = '$kelkd'");
$rowbtx = mysql_fetch_assoc($qbtx);

$btxkd = nosql($rowbtx['kd']);
$btxkelas = nosql($rowbtx['kelas']);

echo '<strong>'.$btxkelas.'</strong>, 

Program : ';
//terpilih
$qprgx = mysql_query("SELECT * FROM m_program ".
						"WHERE kd = '$progkd'");
$rowprgx = mysql_fetch_assoc($qprgx);

$prgx_kd = nosql($rowprgx['kd']);
$prgx_prog = balikin($rowprgx['program']);

echo '<strong>'.$prgx_prog.'</strong>, 

Ruang : ';
//terpilih
$qrux = mysql_query("SELECT * FROM m_ruang ".
						"WHERE kd = '$rukd'");
$rowrux = mysql_fetch_assoc($qrux);

$rux_kd = nosql($rowrux['kd']);
$rux_ru = balikin($rowrux['ruang']);

echo '<strong>'.$rux_ru.'</strong>
</td>
</tr>
</table>
<br>

<table width="100%" border="0" cellspacing="0" cellpadding="3">
<tr valign="top">
<td>
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
<strong>Mata Pelajaran :</strong><br>';

//mata pelajaran-terpilih
$qpelx = mysql_query("SELECT jadwal.*, m_guru.*, m_guru_mapel.*, m_guru_mapel.kd AS mmkd, ".
						"m_mapel.*, m_pegawai.* ".
						"FROM jadwal, m_guru, m_guru_mapel, m_mapel, m_pegawai ".
						"WHERE jadwal.kd_guru_mapel = m_guru_mapel.kd ".
						"AND m_guru_mapel.kd_guru = m_guru.kd ".
						"AND m_guru_mapel.kd_mapel = m_mapel.kd ".
						"AND m_guru_mapel.kd_ruang = '$rukd' ".
						"AND m_guru.kd_tapel = '$tapelkd' ".
						"AND m_guru.kd_kelas = '$kelkd' ".
						"AND m_guru.kd_program = '$progkd' ".
						"AND m_guru.kd_pegawai = m_pegawai.kd ".
						"AND jadwal.kd = '$kd'");
$rpelx = mysql_fetch_assoc($qpelx);
$pelx_kd = nosql($rpelx['mmkd']);
$pelx_pel = balikin($rpelx['pel']);
$pelx_nip = nosql($rpelx['nip']);
$pelx_nm = balikin($rpelx['nama']);

echo '<select name="pel">
<option value="'.$pelx_kd.'" selected>'.$pelx_pel.' ['.$pelx_nip.'. '.$pelx_nm.']</option>';

//mata pelajaran
$qpel = mysql_query("SELECT m_guru.*, m_guru_mapel.*, m_guru_mapel.kd AS mmkd, ".
						"m_mapel.*, m_pegawai.* ".
						"FROM m_guru, m_guru_mapel, m_mapel, m_pegawai ".
						"WHERE m_guru_mapel.kd_guru = m_guru.kd ".
						"AND m_guru_mapel.kd_mapel = m_mapel.kd ".
						"AND m_guru_mapel.kd_ruang = '$rukd' ".
						"AND m_guru.kd_tapel = '$tapelkd' ".
						"AND m_guru.kd_kelas = '$kelkd' ".
						"AND m_guru.kd_program = '$progkd' ".
						"AND m_guru.kd_pegawai = m_pegawai.kd ".
						"AND m_guru_mapel.kd <> '$pelx_kd' ".
						"ORDER BY m_mapel.pel ASC");
$rpel = mysql_fetch_assoc($qpel);

do
	{
	$pel_kd = nosql($rpel['mmkd']);
	$pel_pel = balikin($rpel['pel']);
	$pel_nip = nosql($rpel['nip']);
	$pel_nm = balikin($rpel['nama']);
		
	echo '<option value="'.$pel_kd.'">'.$pel_pel.' ['.$pel_nip.'. '.$pel_nm.']</option>';
	}
while ($rpel = mysql_fetch_assoc($qpel));

echo '</select>

<br><br>
<input name="s" type="hidden" value="'.$s.'">
<input name="tapelkd" type="hidden" value="'.$tapelkd.'">
<input name="smtkd" type="hidden" value="'.$smtkd.'">
<input name="kelkd" type="hidden" value="'.$kelkd.'">
<input name="progkd" type="hidden" value="'.$progkd.'">
<input name="rukd" type="hidden" value="'.$rukd.'">
<input name="kd" type="hidden" value="'.$kd.'">
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