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
require("../../inc/cek/admtu.php");
$tpl = LoadTpl("../../template/index.html"); 


nocache;

//nilai
$filenya = "u_siswa_spp.php";
$judul = "Laporan Keuangan Siswa : Uang SPP";
$judulku = "[$tu_session : $nip5_session.$nm5_session] ==> $judul";
$judulx = $judul;
$s = nosql($_REQUEST['s']);
$tapelkd = nosql($_REQUEST['tapelkd']);
$kelkd = nosql($_REQUEST['kelkd']);
$progkd = nosql($_REQUEST['progkd']);
$rukd = nosql($_REQUEST['rukd']);
$page = nosql($_REQUEST['page']);
if ((empty($page)) OR ($page == "0"))
	{
	$page = "1";
	}
	
$ke = "$filenya?tapelkd=$tapelkd&kelkd=$kelkd&progkd=$progkd&rukd=$rukd&page=$page";
	
	
	
	
	
	
		
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
require("../../inc/menu/admtu.php");
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
	$prg_prog = balikin($rowprg['program']);
	
	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&progkd='.$prg_kd.'">'.$prg_prog.'</option>';
	}
while ($rowprg = mysql_fetch_assoc($qprg));

echo '</select>, 

Ruang : ';
echo "<select name=\"ruang\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qrugx = mysql_query("SELECT * FROM m_ruang ".
						"WHERE kd = '$rukd'");
$rowrugx = mysql_fetch_assoc($qrugx);

$rugx_kd = nosql($rowrugx['kd']);
$rugx_ru = balikin($rowrugx['ruang']);

echo '<option value="'.$rugx_kd.'">'.$rugx_ru.'</option>';

$qru = mysql_query("SELECT * FROM m_ruang ".
						"WHERE kd <> '$rukd' ".
						"ORDER BY ruang ASC");
$rowru = mysql_fetch_assoc($qru);
				
do
	{
	$ru_kd = nosql($rowru['kd']);
	$ru_ru = balikin($rowru['ruang']);
	
	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&progkd='.$progkd.'&rukd='.$ru_kd.'">'.$ru_ru.'</option>';
	}
while ($rowru = mysql_fetch_assoc($qru));

echo '</select>
</td>
</tr>
</table>';


//nek blm dipilih
if (empty($tapelkd))
	{
	echo '<font color="#FF0000"><strong>TAHUN PELAJARAN Belum Dipilih...!</strong></font>';
	}
else if (empty($kelkd))
	{
	echo '<font color="#FF0000"><strong>KELAS Belum Dipilih...!</strong></font>';
	}
else if (empty($progkd))
	{
	echo '<font color="#FF0000"><strong>PROGRAM Belum Dipilih...!</strong></font>';
	}
else if (empty($rukd))
	{
	echo '<font color="#FF0000"><strong>RUANG Belum Dipilih...!</strong></font>';
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
	
	
	
	//cacah tapel
	$qtpel = mysql_query("SELECT * FROM m_tapel ".
							"WHERE kd = '$tapelkd'");
	$rtpel = mysql_fetch_assoc($qtpel);
	$tpel_thn1 = nosql($rtpel['tahun1']);
	$tpel_thn2 = nosql($rtpel['tahun2']);		

	
	echo '<br>
	<table width="100%" border="1" cellspacing="0" cellpadding="3">
	<tr bgcolor="'.$warnaheader.'">
	<td width="30" align="center"><strong>No.</strong></td>
    <td width="100" align="center"><strong>NIS</strong></td>
	<td width="150" align="center"><strong>Nama</strong></td>';
	
	for ($w=1;$w<=12;$w++)
		{
		//nilainya
		if ($w<=6) //bulan juli sampai desember
			{
			$ibln = $w + 6;
			$ithn = $tpel_thn1;
			}
		
		if ($w>6) //bulan januari sampai juni
			{
			$ibln = $w - 6;
			$ithn = $tpel_thn2;
			}

		echo '<td width="50" align="center"><strong>'.$arrbln2[$ibln].'<br>'.$ithn.'</strong></td>';
		}
	
	echo '</tr>';
	
	do
		{
		$x_no = nosql($data['no_absen']);
		$x_kd = nosql($data['mskd']);
		$x_nis = nosql($data['nis']);
		$x_nm = balikin($data['nama']);
		
		
		echo '<tr>
		<td align="center">'.$x_no.'.</td>
		<td>'.$x_nis.'</td>
		<td>'.$x_nm.'</td>';
		
		for ($w=1;$w<=12;$w++)
			{
			//nilainya
			if ($w<=6) //bulan juli sampai desember
				{
				$ibln = $w + 6;
				$ithn = $tpel_thn1;
				}
			
			if ($w>6) //bulan januari sampai juni
				{
				$ibln = $w - 6;
				$ithn = $tpel_thn2;
				}


			//nilainya
			$qpinu = mysql_query("SELECT m_uang_spp.*, siswa_kelas.*, siswa_uang_spp.* ".
											"FROM m_uang_spp, siswa_kelas, siswa_uang_spp ".
											"WHERE siswa_uang_spp.kd_siswa_kelas = siswa_kelas.kd ".
											"AND siswa_uang_spp.kd_uang_spp = m_uang_spp.kd ".
											"AND siswa_kelas.kd_tapel = '$tapelkd' ".
											"AND siswa_kelas.kd_kelas = '$kelkd' ".
											"AND siswa_kelas.kd_program = '$progkd' ".
											"AND siswa_kelas.kd_ruang = '$rukd' ".
											"AND siswa_kelas.kd_siswa = '$x_kd' ".
											"AND round(siswa_uang_spp.bln) = '$ibln' ".
											"AND round(siswa_uang_spp.thn) = '$ithn'");
			$rpinu = mysql_fetch_assoc($qpinu);
			$tpinu = mysql_num_rows($qpinu);
			$pinu_tgl = $rpinu['tgl_bayar'];			
			
			//nek gak ada
			if ((empty($pinu_tgl)) OR ($pinu_tgl == "0000-00-00"))
				{
				$pinu_x = "-";
				}
			//nek ada
			else 
				{
				$pinu_x = "x";
				}
				
				
			echo '<td align="center"><strong>'.$pinu_x.'</strong></td>';
			}
		
		echo '</tr>';
		}
	while ($data = mysql_fetch_assoc($result));
	
	
	echo '</table>
	<table width="100%" border="0" cellspacing="0" cellpadding="3">
	<tr>
	<td>
	<a href="u_siswa_spp_pdf.php?tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&progkd='.$progkd.'&rukd='.$rukd.'" target="_blank">
	<img src="'.$sumber.'/img/pdf.gif" width="16" height="16" border="0">
	</a>
	</td>
    <td align="right">'.$pagelist.'</td>
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