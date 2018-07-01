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
require("../../inc/cek/admtu.php");
$tpl = LoadTpl("../../template/index.html"); 


nocache;

//nilai
$filenya = "wk.php";
$judul = "Wali Kelas";
$judulku = "[$tu_session : $nip5_session.$nm5_session] ==> $judul";
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








//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//jika batal
if ($HTTP_POST_VARS['btnBTL'])
	{
	//nilai
	$tapelkd = nosql($_POST['tapelkd']);
	$kelkd = nosql($_POST['kelkd']);
	$progkd = nosql($_POST['progkd']);
	
	//re-direct
	xloc($ke);
	}


//jika hapus
if ($HTTP_POST_VARS['btnHPS'])
	{
	$jml = nosql($_POST['jml']);
	$tapelkd = nosql($_POST['tapelkd']);
	$kelkd = nosql($_POST['kelkd']);
	$progkd = nosql($_POST['progkd']);


	//ambil semua
	for ($i=1; $i<=$jml;$i++) 
		{
		//ambil nilai
		$yuk = "item";
		$yuhu = "$yuk$i";
		$kdix = nosql($_POST["$yuhu"]);
	
		//del
		mysql_query("DELETE FROM m_walikelas ".
						"WHERE kd = '$kdix'");
		}
	
	//re-direct
	xloc($ke);
	}
	
	
//jika simpan
if ($HTTP_POST_VARS['btnTBH'])
	{
	//nilai
	$tapelkd = nosql($_POST['tapelkd']);
	$kelkd = nosql($_POST['kelkd']);
	$progkd = nosql($_POST['progkd']);
	$ruang = nosql($_POST['ruang']);
	$pegawai = nosql($_POST['pegawai']);
	
	
	//nek nul
	if ((empty($pegawai)) OR (empty($ruang)))
		{
		$pesan = "Input Tidak Lengkap. Harap Diperhatikan...!";
		pekem($pesan,$ke);
		}
	else
		{
		//deteksi
		$qcc = mysqL_query("SELECT m_walikelas.*, m_pegawai.* ".
								"FROM m_walikelas, m_pegawai ".
								"WHERE m_walikelas.kd_pegawai = m_pegawai.kd ".
								"AND m_walikelas.kd_tapel = '$tapelkd' ".
								"AND m_walikelas.kd_kelas = '$kelkd' ".
								"AND m_walikelas.kd_program = '$progkd' ".
								"AND m_walikelas.kd_ruang = '$ruang'");
		$rcc = mysql_fetch_assoc($qcc);
		$tcc = mysql_num_rows($qcc);
		
		
		//nek iya
		if ($tcc != 0)
			{
			$pesan = "Sudah Ada WaliKelas Untuk Kelas Ini. Silahkan Diganti...!";
			pekem($pesan,$ke);
			}
		else
			{
			//query
			mysql_query("INSERT INTO m_walikelas(kd, kd_tapel, kd_kelas, kd_program, kd_pegawai, kd_ruang) VALUES ".
							"('$x', '$tapelkd', '$kelkd', '$progkd', '$pegawai', '$ruang')");
			
			//re-direct
			xloc($ke);		
			}		
		}
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//isi *START
ob_start();

//js
require("../../inc/js/jumpmenu.js");
require("../../inc/js/swap.js");
require("../../inc/js/number.js");
require("../../inc/js/checkall.js");
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
</table>
<br>';


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


	//penambahan
	echo '<select name="pegawai">
	<option value="" selected>-Pegawai-</option>';
	
	//data pegawai
	$qpeg = mysql_query("SELECT * FROM m_pegawai ".
							"ORDER BY nip ASC");
	$rpeg = mysql_fetch_assoc($qpeg);
	
	do
		{
		$peg_kd = nosql($rpeg['kd']);
		$peg_nip = nosql($rpeg['nip']);
		$peg_nm = balikin($rpeg['nama']);
				
		echo '<option value="'.$peg_kd.'">'.$peg_nip.'. '.$peg_nm.'</option>';
		}
	while ($rpeg = mysql_fetch_assoc($qpeg));
	
	
	echo '</select>, 
	<select name="ruang">
	<option value="" selected>-Ruang-</option>';
	$qrung = mysql_query("SELECT * FROM m_ruang ".
							"ORDER BY ruang ASC");
	$rrung = mysql_fetch_assoc($qrung);
	
	do
		{
		$rung_kd = nosql($rrung['kd']);
		$rung_ruang = balikin($rrung['ruang']);
				
		echo '<option value="'.$rung_kd.'">'.$rung_ruang.'</option>';
		}
	while ($rrung = mysql_fetch_assoc($qrung));
	
	
	echo '</select>
	
	
	<input name="btnTBH" type="submit" value="Tambah >>">';
	
	//detail
	echo '<table width="600" border="1" cellspacing="0" cellpadding="3">
	<tr bgcolor="'.$warnaheader.'">
	<td width="1%">&nbsp;</td>
	<td width="50"><strong><font color="'.$warnatext.'">Ruang</font></strong></td>
	<td width="100"><strong><font color="'.$warnatext.'">NIP</font></strong></td>
	<td><strong><font color="'.$warnatext.'">Nama</font></strong></td>
	</tr>';

	//nek ada
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
			$ruang = balikin($row['ruang']);
		
		
			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td><input name="kd'.$nomer.'" type="hidden" value="'.$kd.'">
			<input type="checkbox" name="item'.$nomer.'" value="'.$kd.'"> 
	        </td>
			<td>'.$ruang.'</td>
			<td>'.$nip.'</td>
			<td>'.$nama.'</td>
			</tr>';			
			} 
		while ($row = mysql_fetch_assoc($q)); 
		}

	echo '</table>
	<table width="600" border="0" cellspacing="0" cellpadding="3">
	<tr> 
	<td width="250">
	<input name="tapelkd" type="hidden" value="'.$tapelkd.'"> 
	<input name="kelkd" type="hidden" value="'.$kelkd.'"> 
	<input name="progkd" type="hidden" value="'.$progkd.'"> 
	<input name="jml" type="hidden" value="'.$limit.'"> 
	<input name="btnALL" type="button" value="SEMUA" onClick="checkAll('.$limit.')"> 
	<input name="btnBTL" type="reset" value="BATAL"> 
	<input name="btnHPS" type="submit" value="HAPUS"> 
	</td>
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