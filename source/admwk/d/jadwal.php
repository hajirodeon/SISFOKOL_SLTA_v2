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
require("../../inc/cek/admwk.php"); 
$tpl = LoadTpl("../../template/index.html"); 

nocache;

//nilai
$filenya = "jadwal.php";
$judul = "Jadwal Pelajaran";
$judulku = "[$wk_session : $nip3_session. $nm3_session] ==> $judul";
$judulx = $judul;
$tapelkd = nosql($_REQUEST['tapelkd']);
$smtkd = nosql($_REQUEST['smtkd']);
$kelkd = nosql($_REQUEST['kelkd']);
$progkd = nosql($_REQUEST['progkd']);
$rukd = nosql($_REQUEST['rukd']);
$s = nosql($_REQUEST['s']);



//focus 
if (empty($smtkd))
	{
	$diload = "document.formx.smt.focus();";
	}
	





//isi *START
ob_start();


//js
require("../../inc/js/jumpmenu.js"); 
require("../../inc/js/swap.js"); 
require("../../inc/menu/admwk.php"); 


//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form action="'.$filenya.'" method="post" name="formx">
<table>
<tr>
<td>';
xheadline($judul);
echo '</td>
<td>[<a href="../index.php" title="Daftar Kelas">Daftar Kelas</a>]</td>
</table>

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

echo '<strong>'.$rux_ru.'</strong>, 


Semester : ';
echo "<select name=\"smt\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qsmtx = mysql_query("SELECT * FROM m_smt ".
						"WHERE kd = '$smtkd'");
$rowsmtx = mysql_fetch_assoc($qsmtx);
$smtx_kd = nosql($rowsmtx['kd']);
$smtx_smt = nosql($rowsmtx['smt']);

echo '<option value="'.$smtx_kd.'">'.$smtx_smt.'</option>';

$qsmt = mysql_query("SELECT * FROM m_smt ".
						"WHERE kd <> '$smtkd' ".
						"ORDER BY smt ASC");
$rowsmt = mysql_fetch_assoc($qsmt);
				
do
	{
	$smt_kd = nosql($rowsmt['kd']);
	$smt_smt = nosql($rowsmt['smt']);

	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&smtkd='.$smt_kd.'&kelkd='.$kelkd.'&progkd='.$progkd.'&rukd='.$rukd.'">'.$smt_smt.'</option>';
	}
while ($rowsmt = mysql_fetch_assoc($qsmt));

echo '</select>
</td>
</tr>
</table>
<br>';

//cek
if (empty($tapelkd))
	{
	echo '<strong><font color="#FF0000">TAHUN PELAJARAN Belum Dipilih...!</font></strong>';
	}
else if (empty($smtkd))
	{
	echo '<strong><font color="#FF0000">SEMESTER Belum Dipilih...!</font></strong>';
	}
else if (empty($kelkd))
	{
	echo '<strong><font color="#FF0000">KELAS Belum Dipilih...!</font></strong>';
	}
else if (empty($progkd))
	{
	echo '<strong><font color="#FF0000">PROGRAM Belum Dipilih...!</font></strong>';
	}
else if (empty($rukd))
	{
	echo '<strong><font color="#FF0000">RUANG Belum Dipilih...!</font></strong>';
	}
else
	{
	echo '<input name="tapelkd" type="hidden" value="'.$tapelkd.'">
	<input name="smtkd" type="hidden" value="'.$smtkd.'">
	<input name="kelkd" type="hidden" value="'.$kelkd.'">
	<input name="progkd" type="hidden" value="'.$progkd.'">
	<input name="rukd" type="hidden" value="'.$rukd.'">
	
	<table width="100%" border="1" cellspacing="0" cellpadding="3">
	<tr valign="top" bgcolor="'.$warnaheader.'">
	<td width="3%">&nbsp;</td>';
	
	//hari
	$qhri = mysql_query("SELECT * FROM m_hari ".
							"ORDER BY round(no) ASC");
	$rhri = mysql_fetch_assoc($qhri);
	
	do
		{
		$hri_kd = nosql($rhri['kd']);
		$hri_hr = balikin($rhri['hari']);
			
		echo '<td><strong>'.$hri_hr.'</strong></td>';
		}
	while ($rhri = mysql_fetch_assoc($qhri));
	
	echo '</tr>';
	
	
	//jam
	$qjm = mysql_query("SELECT * FROM m_jam ".
							"ORDER BY round(jam) ASC");
	$rjm = mysql_fetch_assoc($qjm);
	
	do
		{
		//nilai
		if ($warna_set ==0)
			{
			$warna = $warna01;	
			$warna_set = 1;
			}	
		else
			{
			$warna = $warna02;
			$warna_set = 0;
			}
				
		$jm_kd = nosql($rjm['kd']);
		$jm_jam = nosql($rjm['jam']);
		
		
		//hari
		$qhri = mysql_query("SELECT * FROM m_hari ".
								"ORDER BY round(no) ASC");
		$rhri = mysql_fetch_assoc($qhri);
		
		
		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td width="3%"><strong>'.$jm_jam.'.</strong></td>';
			
		do
			{
			$hri_kd = nosql($rhri['kd']);
			$hri_hr = balikin($rhri['hari']);
				
				
			//datane...
			$qdte = mysql_query("SELECT jadwal.*, jadwal.kd AS jdkd, m_guru.*, ".
									"m_pegawai.*, m_mapel.*, m_guru_mapel.* ".
									"FROM jadwal, m_guru, m_pegawai, m_mapel, m_guru_mapel ".
									"WHERE jadwal.kd_guru_mapel = m_guru_mapel.kd ".
									"AND m_guru_mapel.kd_mapel = m_mapel.kd ".
									"AND m_guru_mapel.kd_guru = m_guru.kd ".
									"AND m_guru.kd_pegawai = m_pegawai.kd ".							
									"AND jadwal.kd_tapel = '$tapelkd' ".
									"AND jadwal.kd_smt = '$smtkd' ".
									"AND jadwal.kd_kelas = '$kelkd' ".
									"AND jadwal.kd_program = '$progkd' ".
									"AND jadwal.kd_ruang = '$rukd' ".
									"AND jadwal.kd_jam = '$jm_kd' ".
									"AND jadwal.kd_hari = '$hri_kd'");
			$rdte = mysql_fetch_assoc($qdte);
			$tdte = mysql_num_rows($qdte);
			$dte_kd = nosql($rdte['jdkd']);
			$dte_nip = nosql($rdte['nip']);
			$dte_nm = balikin($rdte['nama']);
			$dte_pel = balikin($rdte['pel']);
			
			//nek ada
			if ($tdte != 0)
				{
				echo '<td width="16%">
				<strong>'.$dte_pel.'</strong>
				<br>
				<em>'.$dte_nip.'. '.$dte_nm.'.</em>
				</td>';
				}
			else
				{
				echo '<td width="16%">-</td>';
				}				
			}
		while ($rhri = mysql_fetch_assoc($qhri));
		
		echo '</tr>';
		}
	while ($rjm = mysql_fetch_assoc($qjm));
	
	echo '</table>';
	}

echo '</form>
<br>
<br>
<br>';
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//isi
$isi = ob_get_contents();
ob_end_clean();

require("../../inc/niltpl.php");
?>