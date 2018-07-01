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
$filenya = "mapel_kelas.php";
$judul = "Mata Pelajaran Per Kelas";
$judulku = "[$ks_session : $nip4_session.$nm4_session] ==> $judul";
$judulx = $judul;
$kelkd = nosql($_REQUEST['kelkd']);
$progkd = nosql($_REQUEST['progkd']);
$ke = "$filenya?kelkd=$kelkd&progkd=$progkd";





//focus...
if (empty($kelkd))
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
echo '<form action="'.$filenya.'" method="post" name="formx">
<table bgcolor="'.$warnaover.'" width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td>
Kelas : ';
echo "<select name=\"kelas\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qbtx = mysql_query("SELECT * FROM m_kelas ".
						"WHERE kd = '$kelkd'");
$rowbtx = mysql_fetch_assoc($qbtx);

$btxkd = nosql($rowbtx['kd']);
$btxkelas = nosql($rowbtx['kelas']);

echo '<option value="'.$btxkd.'">'.$btxkelas.'</option>';

//kelas
$qbt = mysql_query("SELECT * FROM m_kelas ".
						"WHERE kd <> '$kelkd' ".
						"ORDER BY no ASC");
$rowbt = mysql_fetch_assoc($qbt);
				
do
	{
	$btkd = nosql($rowbt['kd']);
	$btkelas = nosql($rowbt['kelas']);
	
	echo '<option value="'.$filenya.'?kelkd='.$btkd.'">'.$btkelas.'</option>';
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
						"WHERE kd <> '$progkd' ".
						"ORDER BY program ASC");
$rowbp = mysql_fetch_assoc($qbp);
				
do
	{
	$bpkd = nosql($rowbp['kd']);
	$bpprog = balikin($rowbp['program']);
	
	echo '<option value="'.$filenya.'?kelkd='.$kelkd.'&progkd='.$bpkd.'">'.$bpprog.'</option>';
	}
while ($rowbp = mysql_fetch_assoc($qbp));

echo '</select>
</td>
</tr>
</table>';


//nek blm
if (empty($kelkd))
	{
	echo '<strong><font color="#FF0000">KELAS Belum Dipilih...!</font></strong>';
	}
else if (empty($progkd))
	{
	echo '<strong><font color="#FF0000">PROGRAM Belum Dipilih...!</font></strong>';
	}
else 
	{
	//query
	$q = mysql_query("SELECT m_mapel_kelas.*, m_mapel_kelas.kd AS mmkd, ".
						"m_mapel.* ".
						"FROM m_mapel_kelas, m_mapel ".
						"WHERE m_mapel_kelas.kd_mapel = m_mapel.kd ".
						"AND m_mapel_kelas.kd_kelas = '$kelkd' ".
						"AND m_mapel_kelas.kd_program = '$progkd' ".
						"ORDER BY round(m_mapel.no, m_mapel.no_sub) ASC");
	$row = mysql_fetch_assoc($q);	
	$total = mysql_num_rows($q);

	echo '<br>
	<table width="400" border="1" cellpadding="3" cellspacing="0">
	<tr valign="top" bgcolor="'.$warnaheader.'"> 
	<td width="10"><strong><font color="'.$warnatext.'">No.</font></strong></td>
	<td><strong><font color="'.$warnatext.'">Mata Pelajaran</font></strong></td>
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
			
			$nomer = $nomer + 1;
			$mmkd = nosql($row['mmkd']);
			$pel = balikin2($row['pel']);
		
			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td>'.$nomer.'.</td>
			<td>'.$pel.'</td>
			</tr>';
			} 
		while ($row = mysql_fetch_assoc($q)); 
		}

	echo '</table>
	<table width="400" border="0" cellspacing="0" cellpadding="3">
	<tr> 
	<td align="right">Total : <strong><font color="#FF0000">'.$total.'</font></strong> Data.</td>
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