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
require("../../inc/class/paging.php");
require("../../inc/cek/admgr.php");
$tpl = LoadTpl("../../template/index.html"); 

nocache;

//nilai
$filenya = "lap_k_p_smt.php";
$judul = "Laporan Koleksi Nilai : per Semester";
$judulku = "[$guru_session : $nip1_session.$nm1_session] ==> $judul";
$juduly = $judul;
$tapelkd = nosql($_REQUEST['tapelkd']);
$smtkd = nosql($_REQUEST['smtkd']);
$kelkd = nosql($_REQUEST['kelkd']);
$progkd = nosql($_REQUEST['progkd']);
$rukd = nosql($_REQUEST['rukd']);
$mapelkd = nosql($_REQUEST['mapelkd']);
$page = nosql($_REQUEST['page']);

//page...
if ((empty($page)) OR ($page == "0"))
	{
	$page = "1";
	}

$ke = "$filenya?tapelkd=$tapelkd&smtkd=$smtkd&kelkd=$kelkd&".
			"progkd=$progkd&rukd=$rukd&mapelkd=$mapelkd&page=$page";





//focus....focus...
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

//js
require("../../inc/js/jumpmenu.js");
require("../../inc/js/checkall.js");
require("../../inc/js/swap.js");
require("../../inc/js/number.js");
require("../../inc/menu/admgr.php");


//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form name="formx" method="post" action="'.$filenya.'">';
xheadline($judul);
echo ' (<a href="../index.php" title="Daftar Pelajaran">Daftar Pelajaran</a>)

<table bgcolor="'.$warnaover.'" width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td>
Tahun Pelajaran : ';
//terpilih
$qtapelx = mysql_query("SELECT * FROM m_tapel ".
							"WHERE kd = '$tapelkd'");
$rowtapelx = mysql_fetch_assoc($qtapelx);
$tapelx_thn1 = nosql($rowtapelx['tahun1']);
$tapelx_thn2 = nosql($rowtapelx['tahun2']);

echo "<strong>$tapelx_thn1/$tapelx_thn2</strong>";
echo ', Kelas : ';
//terpilih
$qbtx = mysql_query("SELECT * FROM m_kelas ".
						"WHERE kd = '$kelkd'");
$rowbtx = mysql_fetch_assoc($qbtx);
$btx_kelas = nosql($rowbtx['kelas']);

echo "<strong>$btx_kelas</strong>";
echo ', Program : ';
//terpilih
$qprgx = mysql_query("SELECT * FROM m_program ".
						"WHERE kd = '$progkd'");
$rowprgx = mysql_fetch_assoc($qprgx);
$prgx_prog = balikin($rowprgx['program']);

//nek null
if (empty($prgx_prog))
	{
	$prgx_prog = "-";
	}

echo "<strong>$prgx_prog</strong>";
echo ', Ruang : ';
//terpilih
$qrux = mysql_query("SELECT * FROM m_ruang ".
						"WHERE kd = '$rukd'");
$rowrux = mysql_fetch_assoc($qrux);
$rux_ruang = balikin($rowrux['ruang']);
echo "<strong>$rux_ruang</strong>";
echo ', Semester : ';
echo "<select name=\"smt\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qstx = mysql_query("SELECT * FROM m_smt ".
						"WHERE kd = '$smtkd'");
$rowstx = mysql_fetch_assoc($qstx);
$stx_kd = nosql($rowstx['kd']);
$stx_smt = nosql($rowstx['smt']);

echo '<option value="'.$stx_kd.'">'.$stx_smt.'</option>';

$qst = mysql_query("SELECT * FROM m_smt ".
						"WHERE kd <> '$smtkd' ".
						"ORDER BY smt ASC");
$rowst = mysql_fetch_assoc($qst);
				
do
	{
	$st_kd = nosql($rowst['kd']);
	$st_smt = nosql($rowst['smt']);	
	
	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&progkd='.$progkd.'&rukd='.$rukd.'&mapelkd='.$mapelkd.'&smtkd='.$st_kd.'">'.$st_smt.'</option>';
	}
while ($rowst = mysql_fetch_assoc($qst));

echo '</select>, 
Mata Pelajaran : ';
//terpilih
$qstdx = mysql_query("SELECT * FROM m_mapel ".
						"WHERE kd = '$mapelkd'");
$rowstdx = mysql_fetch_assoc($qstdx);
$stdx_pel = balikin($rowstdx['pel']);

echo "<strong>$stdx_pel</strong>
</td>
</tr>
</table>
<br>";


//nek drg
if (empty($smtkd))
	{
	echo '<font color="#FF0000"><strong>SEMESTER Belum Dipilih...!</strong></font>';
	}
else
	{
	//query	  
	$p = new Pager();
	$start = $p->findStart($limit);

	$sqlcount = "SELECT m_siswa.*, m_siswa.kd AS mskd, siswa_kelas.* ".
					"FROM m_siswa, siswa_kelas ".
					"WHERE siswa_kelas.kd_siswa = m_siswa.kd ".
					"AND siswa_kelas.kd_tapel = '$tapelkd' ".
					"AND siswa_kelas.kd_kelas = '$kelkd' ".
					"AND siswa_kelas.kd_program = '$progkd' ".
					"AND siswa_kelas.kd_ruang = '$rukd' ".
					"ORDER BY round(siswa_kelas.no_absen) ASC";
	$sqlresult = $sqlcount;
			
	$count = mysql_num_rows(mysql_query($sqlcount));
	$pages = $p->findPages($count, $limit);
	$result = mysql_query("$sqlresult LIMIT ".$start.", ".$limit);
	$target = $ke;
	$pagelist = $p->pageList($_GET['page'], $pages, $target);
	$data = mysql_fetch_array($result);

	
	//nek null
	if ($count == 0)
		{
		echo "<strong>TIDAK ADA DATA SISWA.</strong>";
		}
	
	//nek gak null
	else
		{
		echo '<table width="400" border="1" cellpadding="3" cellspacing="0">
	    <tr bgcolor="'.$warnaheader.'"> 
	    <td width="20" align="center"><strong>No.</strong></td>
	    <td width="50" align="center"><strong>NIS</strong></td>
	    <td align="center"><strong>Nama Siswa</strong></td>
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
			$kd = nosql($data['mskd']);
			$no_absen = nosql($data['no_absen']);
			$nis = nosql($data['nis']);
			$nama = balikin2($data['nama']);
			
			
			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td align="center">
			<input name="SW'.$nomer.'" type="hidden" value="'.$kd.'">
	        '.$no_absen.'
			</td>
	      	<td align="center">'.$nis.'</td>
	      	<td>'.$nama.'</td>
			</tr>';
			}
		while ($data = mysql_fetch_assoc($result));

		echo '</table>
		<table width="400" border="0" cellspacing="0" cellpadding="1">
	    <tr>
		<td width="100">
		[<a href="lap_k_p_smt_pdf.php?kelkd='.$kelkd.'&progkd='.$progkd.'&rukd='.$rukd.'&tapelkd='.$tapelkd.'&smtkd='.$smtkd.'&mapelkd='.$mapelkd.'" 
		target="_blank"><img src="'.$sumber.'/img/pdf.gif" width="16" height="16" border="0"></a>]
		</td>
		<td align="right">'.$pagelist.'</td>
	    </tr>
		</table>';
		}
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