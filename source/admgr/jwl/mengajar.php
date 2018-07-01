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
require("../../inc/config.php"); 
require("../../inc/fungsi.php"); 
require("../../inc/koneksi.php"); 
require("../../inc/cek/admgr.php"); 
$tpl = LoadTpl("../../template/index.html"); 

nocache;

//nilai
$filenya = "mengajar.php";
$diload = "document.formx.tapel.focus();";
$judul = "Jadwal Mengajar";
$judulku = "[$guru_session : $nip1_session.$nm1_session] ==> $judul";
$juduli = $judul;
$tapelkd = nosql($_REQUEST['tapelkd']);
$smtkd = nosql($_REQUEST['smtkd']);


//focus 
if (empty($tapelkd))
	{
	$diload = "document.formx.tapel.focus();";
	}
else if (empty($smtkd))
	{
	$diload = "document.formx.smt.focus();";
	}
	
	

//isi *START
ob_start();

require("../../inc/js/jumpmenu.js"); 
require("../../inc/js/swap.js"); 
require("../../inc/menu/admgr.php");
xheadline($judul);

//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form action="'.$filenya.'" method="post" name="formx">
<table width="100%" bgcolor="'.$warnaover.'" cellspacing="0" cellpadding="3">
<tr valign="top">
<td>
Tahun Pelajaran : ';
echo "<select name=\"tapel\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qtpx = mysql_query("SELECT * FROM m_tapel ".
						"WHERE kd = '$tapelkd'");
$rowtpx = mysql_fetch_assoc($qtpx);
$tpx_kd = nosql($rowtpx['kd']);
$tpx_thn1 = nosql($rowtpx['tahun1']);
$tpx_thn2 = nosql($rowtpx['tahun2']);

echo '<option value="'.$tpx_kd.'">'.$tpx_thn1.'/'.$tpx_thn2.'</option>';

$qtp = mysql_query("SELECT * FROM m_tapel ".
						"WHERE kd <> '$tapelkd' ".
						"ORDER BY tahun1 ASC");
$rowtp = mysql_fetch_assoc($qtp);
				
do
	{
	$tpkd = nosql($rowtp['kd']);
	$tpth1 = nosql($rowtp['tahun1']);
	$tpth2 = nosql($rowtp['tahun2']);

	echo '<option value="'.$filenya.'?tapelkd='.$tpkd.'">'.$tpth1.'/'.$tpth2.'</option>';
	}
while ($rowtp = mysql_fetch_assoc($qtp));

echo '</select>, 

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

	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&smtkd='.$smt_kd.'">'.$smt_smt.'</option>';
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
else
	{
	//query
	$qjw = mysql_query("SELECT jadwal.*, jadwal.kd AS jkd, m_guru_mapel.*, m_guru.*, m_mapel.*, ".
							"m_kelas.*, m_program.*, m_ruang.*, m_hari.*, m_jam.* ".
							"FROM jadwal, m_guru_mapel, m_guru, m_mapel, ".
							"m_kelas, m_program, m_ruang, m_hari, m_jam ".
							"WHERE jadwal.kd_kelas = m_kelas.kd ".
							"AND jadwal.kd_program = m_program.kd ".
							"AND jadwal.kd_ruang = m_ruang.kd ".
							"AND jadwal.kd_hari = m_hari.kd ".
							"AND jadwal.kd_jam = m_jam.kd ".
							"AND jadwal.kd_guru_mapel = m_guru_mapel.kd ".
							"AND m_guru_mapel.kd_guru = m_guru.kd ".
							"AND m_guru_mapel.kd_mapel = m_mapel.kd ".
							"AND m_guru.kd_pegawai = '$kd1_session' ".
							"AND jadwal.kd_tapel = '$tapelkd' ".
							"AND jadwal.kd_smt = '$smtkd' ".
							"ORDER BY m_kelas.no, m_program.program, ".
							"m_ruang.ruang, m_mapel.pel, m_hari.no, m_jam.jam ASC");
	$rjw = mysql_fetch_assoc($qjw);
	$tjw = mysql_num_rows($qjw);
	
	//nek tidak ada
	if ($tjw == 0)
		{
		echo '<strong><font color="#FF0000">TIDAK ADA JADWAL MENGAJAR...!</font></strong>';
		}
	else
		{
		echo '<table width="800" border="1" cellspacing="0" cellpadding="3">
		<tr valign="top" bgcolor="'.$warnaheader.'">
		<td width="100"><strong><font color="'.$warnatext.'">Kelas</font></strong></td>
		<td width="100"><strong><font color="'.$warnatext.'">Program</font></strong></td>
		<td width="100"><strong><font color="'.$warnatext.'">Ruang</font></strong></td>
		<td><strong><font color="'.$warnatext.'">Pelajaran</font></strong></td>
		<td width="100"><strong><font color="'.$warnatext.'">Hari</font></strong></td>
		<td width="50"><strong><font color="'.$warnatext.'">Jam</font></strong></td>
		</tr>';
		
		do
			{
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
				
			$nomer = $nomer + 1;
			$jw_kd = nosql($rjw['jkd']);
			$jw_kelas = nosql($rjw['kelas']);
			$jw_program = balikin($rjw['program']);
			$jw_ruang = balikin($rjw['ruang']);
			$jw_pel = balikin($rjw['pel']);
			$jw_hari = balikin($rjw['hari']);
			$jw_jam = balikin($rjw['jam']);
			
			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td>'.$jw_kelas.'</td>		
			<td>'.$jw_program.'</td>		
			<td>'.$jw_ruang.'</td>
			<td>'.$jw_pel.'</td>		
			<td>'.$jw_hari.'</td>		
			<td>Ke-'.$jw_jam.'</td>		
			</tr>';
			}
		while ($rjw = mysql_fetch_assoc($qjw));
		
		echo '</table>
		
		<table width="800" border="0" cellspacing="0" cellpadding="3">
		<tr> 
		<td align="right">Total : <strong><font color="#FF0000">'.$tjw.'</font></strong> Data.</td>
		</tr>
		</table>';
		}
	}
	
echo '</form>
<br><br><br>';
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//isi
$isi = ob_get_contents();
ob_end_clean();

require("../../inc/niltpl.php");
?>