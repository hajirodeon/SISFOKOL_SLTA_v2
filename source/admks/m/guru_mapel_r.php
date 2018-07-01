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
require("../../inc/cek/admks.php"); 
$tpl = LoadTpl("../../template/index.html"); 

nocache;

//nilai
$filenya = "guru_mapel_r.php";
$judul = "Guru Mata Pelajaran per Ruang";
$judulku = "[$ks_session : $nip4_session.$nm4_session] ==> $judul";
$judulx = $judul;
$tapelkd = nosql($_REQUEST['tapelkd']);
$kelkd = nosql($_REQUEST['kelkd']);
$progkd = nosql($_REQUEST['progkd']);
$rukd = nosql($_REQUEST['rukd']);
$s = nosql($_REQUEST['s']);
$ke = "$filenya?tapelkd=$tapelkd&kelkd=$kelkd&progkd=$progkd&rukd=$rukd";


	
	
	
//focus...
if (empty($tapelkd))
	{
	$diload = "document.formx.tapel.focus();";
	}
else if (empty($kelkd))
	{
	$diload = "document.formx.kelas.focus();";
	}
else if (empty($progkd))
	{
	$diload = "document.formx.program.focus();";
	}
else if (empty($rukd))
	{
	$diload = "document.formx.ruang.focus();";
	}




//isi *START
ob_start();

//js
require("../../inc/js/jumpmenu.js"); 
require("../../inc/js/swap.js"); 
require("../../inc/menu/admks.php"); 
xheadline($judul);

//VIEW //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form name="formx" method="post" action="'.$ke.'">
<table bgcolor="'.$warnaover.'" width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
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

Kelas : ';
echo "<select name=\"kelas\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qbtx = mysql_query("SELECT * FROM m_kelas ".
						"WHERE kd = '$kelkd'");
$rowbtx = mysql_fetch_assoc($qbtx);

$btxkd = nosql($rowbtx['kd']);
$btxkelas = nosql($rowbtx['kelas']);

echo '<option value="'.$btxkd.'">'.$btxkelas.'</option>';

$qbt = mysql_query("SELECT * FROM m_kelas ".
						"WHERE kd <> '$kelkd' ".
						"ORDER BY no ASC");
$rowbt = mysql_fetch_assoc($qbt);
				
do
	{
	$btkd = nosql($rowbt['kd']);
	$btkelas = nosql($rowbt['kelas']);
	
	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&kelkd='.$btkd.'">'.$btkelas.'</option>';
	}
while ($rowbt = mysql_fetch_assoc($qbt));

echo '</select>, 

Program : ';
echo "<select name=\"program\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qprgx = mysql_query("SELECT * FROM m_program ".
						"WHERE kd = '$progkd'");
$rowprgx = mysql_fetch_assoc($qprgx);

$prgx_kd = nosql($rowprgx['kd']);
$prgx_prog = balikin($rowprgx['program']);

echo '<option value="'.$prgx_kd.'">'.$prgx_prog.'</option>';

$qprg = mysql_query("SELECT * FROM m_program ".
						"WHERE kd <> '$progkd' ".
						"ORDER BY program ASC");
$rowprg = mysql_fetch_assoc($qprg);
				
do
	{
	$prg_kd = nosql($rowprg['kd']);
	$prg = balikin($rowprg['program']);
	
	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&progkd='.$prg_kd.'">'.$prg.'</option>';
	}
while ($rowprg = mysql_fetch_assoc($qprg));


echo '</select>, 
Ruang : ';
echo "<select name=\"ruang\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qrux = mysql_query("SELECT * FROM m_ruang ".
						"WHERE kd = '$rukd'");
$rowrux = mysql_fetch_assoc($qrux);

$ruxkd = nosql($rowrux['kd']);
$ruxruang = balikin($rowrux['ruang']);

echo '<option value="'.$ruxkd.'">'.$ruxruang.'</option>';

$qru = mysql_query("SELECT * FROM m_ruang ".
						"WHERE kd <> '$rukd' ".
						"ORDER BY ruang ASC");
$rowru = mysql_fetch_assoc($qru);
				
do
	{
	$rukd = nosql($rowru['kd']);
	$ru = balikin($rowru['ruang']);
	
	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&progkd='.$progkd.'&rukd='.$rukd.'">'.$ru.'</option>';
	}
while ($rowru = mysql_fetch_assoc($qru));


echo '</select>
</td>
</tr>
</table>
<br>';


//nilai
$tapelkd = nosql($_REQUEST['tapelkd']);
$kelkd = nosql($_REQUEST['kelkd']);
$progkd = nosql($_REQUEST['progkd']);
$rukd = nosql($_REQUEST['rukd']);

//nek blm
if (empty($tapelkd))
	{
	echo '<strong><font color="#FF0000">TAHUN PELAJARAN Belum Dipilih...!</font></strong>';
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
	//query
	$q = mysql_query("SELECT m_mapel_kelas.*, m_mapel.*, m_mapel.kd AS mmkd ".
						"FROM m_mapel_kelas, m_mapel ".
						"WHERE m_mapel_kelas.kd_mapel = m_mapel.kd ".
						"AND m_mapel_kelas.kd_kelas = '$kelkd' ".
						"AND m_mapel_kelas.kd_program = '$progkd' ".
						"ORDER BY round(no, no_sub) ASC");
	$row = mysql_fetch_assoc($q);
	$total = mysql_num_rows($q);
	
	echo '<table width="600" border="1" cellpadding="3" cellspacing="0">
    <tr bgcolor="'.$warnaheader.'"> 
	<td width="5" valign="top"><strong>No.</strong></td>
    <td valign="top"><strong><font color="'.$warnatext.'">Nama Mata Pelajaran</font></strong></td>
    <td width="300" valign="top"><strong><font color="'.$warnatext.'">Guru</font></strong></td>
    </tr>';
	
	if ($total != 0)
		{
		do { 
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
			$mmkd = nosql($row['mmkd']);
			$pel = balikin2($row['pel']);
			
			echo "<tr bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			
			echo '<td width="17">'.$nomer.'. </td>
    		<td>'.$pel.'</td>
			<td>';
			
			//guru-nya
			$quru = mysql_query("SELECT m_pegawai.*, m_guru.*, m_guru_mapel.*, ".
									"m_guru_mapel.kd AS mgmkd ".
									"FROM m_pegawai, m_guru, m_guru_mapel ".
									"WHERE m_guru.kd_pegawai = m_pegawai.kd ".
									"AND m_guru_mapel.kd_guru = m_guru.kd ".
									"AND m_guru.kd_tapel = '$tapelkd' ".
									"AND m_guru.kd_kelas = '$kelkd' ".
									"AND m_guru.kd_program = '$progkd' ".
									"AND m_guru_mapel.kd_ruang = '$rukd' ".
									"AND m_guru_mapel.kd_mapel = '$mmkd'");
			$ruru = mysql_fetch_assoc($quru);

			
			do
				{
				$gkd = nosql($ruru['mgmkd']);
				$gnam = balikin2($ruru['nama']);
				
				//nek null
				if (empty($gkd))
					{
					echo "-";
					}
				else
					{
					echo '<strong>*</strong> '.$gnam.'<br>';
					}
				}
			while ($ruru = mysql_fetch_assoc($quru));
			
			
			echo '</td>
    		</tr>';
			} 
		while ($row = mysql_fetch_assoc($q)); 
	}

	echo '</table>
	<table width="600" border="0" cellspacing="0" cellpadding="3">
    <tr> 
    <td align="right">Total : <strong><font color="#FF0000">'.$total.'</font></strong> Data.</td>
    </tr>
  	</table>';
	}

echo '</form>
<br><br><br>';
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
//isi
$isi = ob_get_contents();
ob_end_clean();


require("../../inc/niltpl.php");
?>