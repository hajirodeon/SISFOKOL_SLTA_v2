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
$filenya = "spek_mapel.php";
$judul = "Aspek Mata Pelajaran";
$judulku = "[$ks_session : $nip4_session.$nm4_session] ==> $judul";
$judulx = $judul;
$kelkd = nosql($_REQUEST['kelkd']);
$progkd = nosql($_REQUEST['progkd']);
$mapelkd = nosql($_REQUEST['mapelkd']);
$ke = "$filenya?kelkd=$kelkd&progkd=$progkd&mapelkd=$mapelkd";



	
	
	
//focus...
if (empty($kelkd))
	{
	$diload = "document.formx.kelas.focus();";
	}
else if (empty($progkd))
	{
	$diload = "document.formx.program.focus();";
	}
else if (empty($mapelkd))
	{
	$diload = "document.formx.mapel.focus();";
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
	$prg_prog = balikin($rowprg['program']);
	
	echo '<option value="'.$filenya.'?kelkd='.$kelkd.'&progkd='.$prg_kd.'">'.$prg_prog.'</option>';
	}
while ($rowprg = mysql_fetch_assoc($qprg));

echo '</select>, 

Mata Pelajaran : ';
echo "<select name=\"mapel\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qstx = mysql_query("SELECT * FROM m_mapel ".
						"WHERE kd = '$mapelkd'");
$rowstx = mysql_fetch_assoc($qstx);
$txkd = nosql($rowstx['kd']);
$txpel = balikin($rowstx['pel']);

echo '<option value="'.$txkd.'">'.$txpel.'</option>';

$qst = mysql_query("SELECT m_mapel.*, m_mapel.kd AS mpkd, m_mapel_kelas.* ".
						"FROM m_mapel, m_mapel_kelas ".
						"WHERE m_mapel.kd = m_mapel_kelas.kd_mapel ".
						"AND m_mapel_kelas.kd_kelas = '$kelkd' ".
						"AND m_mapel_kelas.kd_program = '$progkd' ".
						"AND m_mapel.kd <> '$mapelkd' ".
						"ORDER BY m_mapel.pel ASC");
$rowst = mysql_fetch_assoc($qst);
				
do
	{
	$mapelkd = nosql($rowst['mpkd']);
	$stpel = balikin2($rowst['pel']);
	
	echo '<option value="'.$filenya.'?kelkd='.$kelkd.'&progkd='.$progkd.'&mapelkd='.$mapelkd.'">'.$stpel.'</option>';
	}
while ($rowst = mysql_fetch_assoc($qst));

echo '</select>
</td>
</tr>
</table>';

//nilai
$kelkd = nosql($_REQUEST['kelkd']);
$progkd = nosql($_REQUEST['progkd']);
$mapelkd = nosql($_REQUEST['mapelkd']);

//nek blm
if (empty($kelkd))
	{
	echo '<strong><font color="#FF0000">KELAS Belum Dipilih...!</font></strong>';
	}
else if (empty($progkd))
	{
	echo '<strong><font color="#FF0000">PROGRAM Belum Dipilih...!</font></strong>';
	}
else if (empty($mapelkd))
	{
	echo '<strong><font color="#FF0000">MATA PELAJARAN Belum Dipilih...!</font></strong>';
	}
else
	{
	//query
	$q = mysql_query("SELECT m_aspek_mapel.*, m_aspek_mapel.kd AS amkd, m_aspek.* ".
						"FROM m_aspek_mapel, m_aspek ".
						"WHERE m_aspek_mapel.kd_aspek = m_aspek.kd ".
						"AND m_aspek_mapel.kd_kelas = '$kelkd' ".
						"AND m_aspek_mapel.kd_program = '$progkd' ".
						"AND m_aspek_mapel.kd_mapel = '$mapelkd'");
	$row = mysql_fetch_assoc($q);
	$total = mysql_num_rows($q);


	echo '<br>
	<table width="300" border="1" cellspacing="0" cellpadding="3">
    <tr valign="top" bgcolor="'.$warnaheader.'"> 
	<td width="10"><strong><font color="'.$warnatext.'">No.</font></strong></td>
    <td><strong><font color="'.$warnatext.'">Aspek</font></strong></td>
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
			$amkd = nosql($row['amkd']);
			$aspek = balikin2($row['aspek']);
			
			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td>'.$nomer.'</td>
			<td>'.$aspek.'</td>
	        </tr>';
			} while ($row = mysql_fetch_assoc($q)); 
		}
		
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