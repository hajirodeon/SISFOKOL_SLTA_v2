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

//fungsi - fungsi
require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
require("../../inc/cek/admks.php");
$tpl = LoadTpl("../../template/index.html"); 


nocache;

//nilai
$filenya = "wk.php";
$judul = "Wali Kelas";
$judulku = "[$ks_session : $nip4_session.$nm4_session] ==> $judul";
$judulx = $judul;
$tapelkd = nosql($_REQUEST['tapelkd']);
$kelkd = nosql($_REQUEST['kelkd']);
$progkd = nosql($_REQUEST['progkd']);
$ke = "$filenya?tapelkd=$tapelkd&kelkd=$kelkd&progkd=$progkd";

	
	
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




//isi *START
ob_start();

//js
require("../../inc/js/jumpmenu.js");
require("../../inc/js/swap.js");
require("../../inc/menu/admks.php");
xheadline($judul);


//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form name="formx" method="post" action="'.$filenya.'">
<table bgcolor="'.$warnaover.'" width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td>
Tahun Pelajaran : ';
echo "<select name=\"tapel\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qtpx = mysql_query("SELECT * FROM m_tapel ".
						"WHERE kd = '$tapelkd'");
$rowtpx = mysql_fetch_assoc($qtpx);
$tpxkd = nosql($rowtpx['kd']);
$tpxtahun1 = nosql($rowtpx['tahun1']);
$tpxtahun2 = nosql($rowtpx['tahun2']);

echo '<option value="'.$tpxkd.'">'.$tpxtahun1.'/'.$tpxtahun2.'</option>';

$qtp = mysql_query("SELECT * FROM m_tapel ".
						"WHERE kd <> '$tapelkd' ".
						"ORDER BY tahun1 ASC");
$rowtp = mysql_fetch_assoc($qtp);
				
do
	{
	$tpkd = nosql($rowtp['kd']);
	$tptahun1 = nosql($rowtp['tahun1']);
	$tptahun2 = nosql($rowtp['tahun2']);
	
	echo '<option value="'.$filenya.'?tapelkd='.$tpkd.'">'.$tptahun1.'/'.$tptahun2.'</option>';
	}
while ($rowtp = mysql_fetch_assoc($qtp));

echo '</select>, Kelas : ';
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
$qbpx = mysql_query("SELECT * FROM m_program ".
						"WHERE kd = '$progkd'");
$rowbpx = mysql_fetch_assoc($qbpx);

$bpxkd = nosql($rowbpx['kd']);
$bpxprog = balikin($rowbpx['program']);

echo '<option value="'.$bpxkd.'">'.$bpxprog.'</option>';

//program
$qbp = mysql_query("SELECT * FROM m_program ".
						"WHERE kd <> '$progkd'");
$rowbp = mysql_fetch_assoc($qbp);
				
do
	{
	$bpkd = nosql($rowbp['kd']);
	$bpprog = balikin($rowbp['program']);
	
	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&progkd='.$bpkd.'">'.$bpprog.'</option>';
	}
while ($rowbp = mysql_fetch_assoc($qbp));

echo '</select>
</td>
</tr>
</table>';


//nek drg
if (empty($tapelkd))
	{
	echo '<font color="#FF0000"><strong>TAHUN PELAJARAN Belum Diplih...!</strong></font>';
	}

else if (empty($kelkd))
	{
	echo '<font color="#FF0000"><strong>KELAS Belum Diplih...!</strong></font>';
	}

else if (empty($progkd))
	{
	echo '<font color="#FF0000"><strong>PROGRAM Belum Diplih...!</strong></font>';
	}

else
	{
	//query	  
	$q = mysql_query("SELECT m_walikelas.*, m_walikelas.kd AS mwkd, ".
						"m_pegawai.*, m_ruang.* ".
						"FROM m_walikelas, m_pegawai, m_ruang ".
						"WHERE m_walikelas.kd_pegawai = m_pegawai.kd ".
						"AND m_walikelas.kd_ruang = m_ruang.kd ".
						"AND m_walikelas.kd_tapel = '$tapelkd' ".
						"AND m_walikelas.kd_kelas = '$kelkd' ".
						"AND m_walikelas.kd_program = '$progkd' ".
						"ORDER BY m_ruang.ruang ASC");
	$row = mysql_fetch_assoc($q);
	$total = mysql_num_rows($q);


	//detail
	echo '<br>
	<table width="400" border="1" cellspacing="0" cellpadding="3">
	<tr bgcolor="'.$warnaheader.'">
	<td width="50"><strong><font color="'.$warnatext.'">Ruang</font></strong></td>
	<td width="100"><strong><font color="'.$warnatext.'">NIP</font></strong></td>
	<td><strong><font color="'.$warnatext.'">Nama</font></strong></td>
	</tr>';

	if ($total != 0)
		{
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
			
		
			//nilai
			$nomer = $nomer + 1;
			$kd = nosql($row['mwkd']);
			$nip = nosql($row['nip']);
			$nama = balikin($row['nama']);
			$ruang = nosql($row['ruang']);
		
		
			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td>'.$ruang.'</td>
			<td>'.$nip.'</td>
			<td>'.$nama.'</td>
			</tr>';			
			} 
		while ($row = mysql_fetch_assoc($q)); 
		}

	echo '</table>
	<table width="400" border="0" cellspacing="0" cellpadding="3">
	<tr> 
	<td align="right"><strong><font color="#FF0000">'.$total.'</font></strong> Data. '.$pagelist.'</td>
	</tr>
	</table>';
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