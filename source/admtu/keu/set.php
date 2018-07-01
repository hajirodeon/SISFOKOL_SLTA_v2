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
require("../../inc/class/paging.php");
$tpl = LoadTpl("../../template/index.html"); 


nocache;

//nilai
$filenya = "set.php";
$judul = "Set Keuangan";
$judulku = "[$tu_session : $nip5_session.$nm5_session] ==> $judul";
$judulx = $judul;
$tapelkd = nosql($_REQUEST['tapelkd']);
$kelkd = nosql($_REQUEST['kelkd']);

$ke = "$filenya?tapelkd=$tapelkd&kelkd=$kelkd";


	
	
	
//focus...
if (empty($tapelkd))
	{
	$diload = "document.formx.tapel.focus();";
	}
else if (empty($kelkd))
	{
	$diload = "document.formx.kelas.focus();";
	}
	
	
		



//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//jika simpan
if ($HTTP_POST_VARS['btnSMP'])
	{
	//nilai
	$tapelkd = nosql($_POST['tapelkd']);
	$kelkd = nosql($_POST['kelkd']);
	$nil_gdg = nosql($_POST['nil_gdg']);
	$nil_uji = nosql($_POST['nil_uji']);
	$nil_spp = nosql($_POST['nil_spp']);
	$nil_lain = nosql($_POST['nil_lain']);
	
	
	//cek gudang
	if (!empty($nil_gdg))
		{
		$qcc = mysql_query("SELECT * FROM m_uang_gedung ".
								"WHERE kd_tapel = '$tapelkd' ".
								"AND kd_kelas = '$kelkd'");
		$rcc = mysql_fetch_assoc($qcc);
		$tcc = mysql_num_rows($qcc);
		
		//nek iya
		if ($tcc != 0)
			{
			//update
			mysql_query("UPDATE m_uang_gedung SET nilai = '$nil_gdg' ".
							"WHERE kd_tapel = '$tapelkd' ".
							"AND kd_kelas = '$kelkd'");
			}
		else
			{
			//baru
			mysql_query("INSERT INTO m_uang_gedung(kd, kd_tapel, kd_kelas, nilai) VALUES ".
							"('$x', '$tapelkd', '$kelkd', '$nil_gdg')");
			}
		}	
	
	
	
	//cek ujian
	if (!empty($nil_uji))
		{
		$qcc = mysql_query("SELECT * FROM m_uang_ujian ".
								"WHERE kd_tapel = '$tapelkd' ".
								"AND kd_kelas = '$kelkd'");
		$rcc = mysql_fetch_assoc($qcc);
		$tcc = mysql_num_rows($qcc);
		
		//nek iya
		if ($tcc != 0)
			{
			//update
			mysql_query("UPDATE m_uang_ujian SET nilai = '$nil_uji' ".
							"WHERE kd_tapel = '$tapelkd' ".
							"AND kd_kelas = '$kelkd'");
			}
		else
			{
			//baru
			mysql_query("INSERT INTO m_uang_ujian(kd, kd_tapel, kd_kelas, nilai) VALUES ".
							"('$x', '$tapelkd', '$kelkd', '$nil_uji')");
			}
		}
	
	
	
	//cek spp
	if (!empty($nil_spp))
		{
		$qcc = mysql_query("SELECT * FROM m_uang_spp ".
								"WHERE kd_tapel = '$tapelkd' ".
								"AND kd_kelas = '$kelkd'");
		$rcc = mysql_fetch_assoc($qcc);
		$tcc = mysql_num_rows($qcc);
		
		//nek iya
		if ($tcc != 0)
			{
			//update
			mysql_query("UPDATE m_uang_spp SET nilai = '$nil_spp' ".
							"WHERE kd_tapel = '$tapelkd' ".
							"AND kd_kelas = '$kelkd'");
			}
		else
			{
			//baru
			mysql_query("INSERT INTO m_uang_spp(kd, kd_tapel, kd_kelas, nilai) VALUES ".
							"('$x', '$tapelkd', '$kelkd', '$nil_spp')");
			}
		}
	
	
	
	//cek lain
	if (!empty($nil_lain))
		{
		$qcc = mysql_query("SELECT * FROM m_uang_lain ".
								"WHERE kd_tapel = '$tapelkd' ".
								"AND kd_kelas = '$kelkd'");
		$rcc = mysql_fetch_assoc($qcc);
		$tcc = mysql_num_rows($qcc);
		
		//nek iya
		if ($tcc != 0)
			{
			//update
			mysql_query("UPDATE m_uang_lain SET nilai = '$nil_lain' ".
							"WHERE kd_tapel = '$tapelkd' ".
							"AND kd_kelas = '$kelkd'");
			}
		else
			{
			//baru
			mysql_query("INSERT INTO m_uang_lain(kd, kd_tapel, kd_kelas, nilai) VALUES ".
							"('$x', '$tapelkd', '$kelkd', '$nil_lain')");
			}
		}
	
	
	
	//re-direct
	xloc($ke);
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




//isi *START
ob_start();

//js
require("../../inc/js/jumpmenu.js");
require("../../inc/js/swap.js");
require("../../inc/js/checkall.js");
require("../../inc/js/number.js");
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

echo '</select>
</td>
</tr>
</table>
<br>';


//nek blm dipilih
if (empty($tapelkd))
	{
	echo '<font color="#FF0000"><strong>TAHUN PELAJARAN Belum Dipilih...!</strong></font>';
	}

else if (empty($kelkd))
	{
	echo '<font color="#FF0000"><strong>KELAS Belum Dipilih...!</strong></font>';
	}

else
	{
	//query-gudang
	$qgdg = mysql_query("SELECT * FROM m_uang_gedung ".
							"WHERE kd_tapel = '$tapelkd' ".
							"AND kd_kelas = '$kelkd'");
	$rgdg = mysql_fetch_assoc($qgdg);
	$gdg_nilai = nosql($rgdg['nilai']);
	
	
	//query-ujian
	$quji = mysql_query("SELECT * FROM m_uang_ujian ".
							"WHERE kd_tapel = '$tapelkd' ".
							"AND kd_kelas = '$kelkd'");
	$ruji = mysql_fetch_assoc($quji);
	$uji_nilai = nosql($ruji['nilai']);
	
	
	//query-spp
	$qspp = mysql_query("SELECT * FROM m_uang_spp ".
							"WHERE kd_tapel = '$tapelkd' ".
							"AND kd_kelas = '$kelkd'");
	$rspp = mysql_fetch_assoc($qspp);
	$spp_nilai = nosql($rspp['nilai']);
	
	
	//query-lain
	$qlain = mysql_query("SELECT * FROM m_uang_lain ".
								"WHERE kd_tapel = '$tapelkd' ".
								"AND kd_kelas = '$kelkd'");
	$rlain = mysql_fetch_assoc($qlain);
	$lain_nilai = nosql($rlain['nilai']);
	

	echo '<table width="350" border="1" cellpadding="3" cellspacing="0">
    <tr bgcolor="'.$warnaheader.'">
	<td width="200" valign="top"><strong>Uang</strong></td>
	<td valign="top"><strong>Nilai</strong></td>
    </tr>';
	
	echo "<tr valign=\"top\" bgcolor=\"$warna01\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna01';\">";
	echo '<td valign="top">Gudang</td>
	<td valign="top">
	Rp.	<input name="nil_gdg" type="text" size="10" value="'.$gdg_nilai.'" onKeyPress="return numbersonly(this, event)">,00
	</td>
	</tr>';

	echo "<tr valign=\"top\" bgcolor=\"$warna02\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna02';\">";
	echo '<td valign="top">Ujian</td>
	<td valign="top">
	Rp.	<input name="nil_uji" type="text" size="10" value="'.$uji_nilai.'" onKeyPress="return numbersonly(this, event)">,00
	</td>
	</tr>';
	
	echo "<tr valign=\"top\" bgcolor=\"$warna01\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna01';\">";
	echo '<td valign="top">SPP</td>
	<td valign="top">
	Rp.	<input name="nil_spp" type="text" size="10" value="'.$spp_nilai.'" onKeyPress="return numbersonly(this, event)">,00
	</td>
	</tr>';
	
	echo "<tr valign=\"top\" bgcolor=\"$warna02\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna02';\">";
	echo '<td valign="top">Lain - Lain</td>
	<td valign="top">
	Rp.	<input name="nil_lain" type="text" size="10" value="'.$lain_nilai.'" onKeyPress="return numbersonly(this, event)">,00
	</td>
	</tr>

	</table>
	
	<input name="tapelkd" type="hidden" value="'.$tapelkd.'">
	<input name="kelkd" type="hidden" value="'.$kelkd.'">
	<input name="btnSMP" type="submit" value="SIMPAN">
	<input name="btnBTL" type="submit" value="BATAL">';
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