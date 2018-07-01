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
$filenya = "siswa_tmp_r.php";
$judul = "Penempatan Siswa -> Ruang";
$judulku = "[$tu_session : $nip5_session.$nm5_session] ==> $judul";
$judulx = $judul;
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
		




//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//jika batal
if ($HTTP_POST_VARS['btnBTL'])
	{
	//nilai
	$tapelkd = nosql($_POST['tapelkd']);
	$kelkd = nosql($_POST['kelkd']);
	$progkd = nosql($_POST['progkd']);
	$rukd = nosql($_POST['rukd']);
	$page = nosql($_POST['page']);
	
	//re-direct
	xloc($ke);
	}


//jika hapus
if ($HTTP_POST_VARS['btnHPS'])
	{
	//nilai
	$tapelkd = nosql($_POST['tapelkd']);
	$kelkd = nosql($_POST['kelkd']);
	$progkd = nosql($_POST['progkd']);
	$rukd = nosql($_POST['rukd']);
	$page = nosql($_POST['page']);
	$jml = nosql($_POST['jml']);

	//ambil semua
	for ($i=1; $i<=$jml;$i++) 
		{
		//ambil nilai
		$yuk = "item";
		$yuhu = "$yuk$i";
		$kdix = nosql($_POST["$yuhu"]);
	
		//NULL-kan ruang e....
		mysql_query("UPDATE siswa_kelas SET kd_ruang = '' ".
						"WHERE kd_siswa = '$kdix'");
		
		}
	
	//re-direct
	xloc($ke);
	}
	
	
//jika tambah
if ($HTTP_POST_VARS['btnSMPx'])
	{
	//nilai
	$tapelkd = nosql($_POST['tapelkd']);
	$kelkd = nosql($_POST['kelkd']);
	$progkd = nosql($_POST['progkd']);
	$rukd = nosql($_POST['rukd']);
	$page = nosql($_POST['page']);
	$siswa = nosql($_POST['siswa']);

	//cek, sudah ada di ruang lain...?
	$qc = mysql_query("SELECT m_siswa.*, siswa_kelas.* ".
						"FROM m_siswa, siswa_kelas ".
						"WHERE siswa_kelas.kd_siswa = m_siswa.kd ".
						"AND siswa_kelas.kd_ruang <> '' ".
						"AND siswa_kelas.kd_ruang <> '$rukd' ".
						"AND siswa_kelas.kd_siswa = '$siswa'");
	$rc = mysql_fetch_assoc($qc);
	$tc = mysql_num_rows($qc);
	$nis = nosql($rc['nis']);
	$nama = balikin2($rc['nama']);

	
	//nek iyo
	if ($tc != 0)
		{
		$rukdx = balikin2($rc['kd_ruang']);
		
		//ruange
		$qrx = mysql_query("SELECT * FROM m_ruang ".
							"WHERE kd = '$rukdx'");
		$rrx = mysql_fetch_assoc($qrx);
		$rx = nosql($rrx['ruang']);
		
		$pesan = "Siswa Dengan NIS : $nis, Nama : $nama, Telah Ditempatkan Pada Ruang : $rx";
		pekem($pesan,$ke);
		}
	else
		{
		//query
		mysql_query("UPDATE siswa_kelas SET kd_ruang = '$rukd' ".
						"WHERE kd_siswa = '$siswa'");

		//re-direct
		xloc($ke);
		}
	}


	
//jika simpan
if ($HTTP_POST_VARS['btnSMP2'])
	{
	//nilai
	$tapelkd = nosql($_POST['tapelkd']);
	$kelkd = nosql($_POST['kelkd']);
	$progkd = nosql($_POST['progkd']);
	$rukd = nosql($_POST['rukd']);
	$page = nosql($_POST['page']);
	$total = nosql($_POST['total']);

	for($i=1;$i<=$total;$i++)
		{
		//ambil nilai					
		$kd = "kd";
		$kd1 = "$kd$i";
		$kdx = nosql($_POST["$kd1"]);					

		$abs = "abs";
		$abs1 = "$abs$i";
		$absx = nosql($_POST["$abs1"]);			
		
		if (empty($absx))
			{
			$absx = "00";
			}
		else if (strlen($absx) == 1)
			{
			$absx = "0$absx";
			}
			
		//query
		mysql_query("UPDATE siswa_kelas SET no_absen = '$absx' ".
						"WHERE kd_siswa = '$kdx'");
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

//ruang
$qstx = mysql_query("SELECT * FROM m_ruang ".
						"WHERE kd = '$rukd'");
$rowstx = mysql_fetch_assoc($qstx);
		
$ruang = nosql($rowstx['ruang']);

echo '<option value="'.$rukd.'" selected>'.$ruang.'</option>';

$qst = mysql_query("SELECT * FROM m_ruang ".
						"WHERE kd <> '$rukd'");
$rowst = mysql_fetch_assoc($qst);
	
do
	{
	$stkd = nosql($rowst['kd']);
	$struang = balikin($rowst['ruang']);

	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&progkd='.$progkd.'&rukd='.$stkd.'">'.$struang.'</option>';
	}
while ($rowst = mysql_fetch_assoc($qst));

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
	$target = "$filenya?tapelkd=$tapelkd&kelkd=$kelkd&progkd=$progkd&rukd=$rukd";
	$pagelist = $p->pageList($_GET['page'], $pages, $target);
	$data = mysql_fetch_array($result);
	
	//tambah
	echo '<select name="siswa">
    <option value="" selected>-TAMBAH SISWA-</option>';
	
	//query
	$qks = mysql_query("SELECT m_siswa.*, m_siswa.kd AS mskd, siswa_kelas.* ".
							"FROM m_siswa, siswa_kelas ".
							"WHERE siswa_kelas.kd_siswa = m_siswa.kd ".
							"AND siswa_kelas.kd_kelas = '$kelkd' ".
							"AND siswa_kelas.kd_program = '$progkd' ".
							"AND siswa_kelas.kd_ruang = '' ".
							"ORDER BY m_siswa.nis ASC");
	$rowks = mysql_fetch_assoc($qks);
				
	do
		{
		$kdks = nosql($rowks['mskd']);
		$nisks = nosql($rowks['nis']);
		$nmks = balikin2($rowks['nama']);
		
		echo '<option value="'.$kdks.'">('.$nisks.') '.$nmks.'</option>';
		}
	while ($rowks = mysql_fetch_assoc($qks));
	
	echo '</select>
	<input name="btnSMPx" type="submit" value="&gt;&gt;&gt;">
	<table width="500" border="1" cellpadding="3" cellspacing="0">
    <tr bgcolor="'.$warnaheader.'"> 
    <td width="1" valign="top">&nbsp;</td>
    <td width="75" valign="top"><strong>No. Absen</strong></td>
    <td width="50" valign="top"><strong>NIS</strong></td>
    <td valign="top"><strong>Nama</strong></td>
    </tr>';
	
	//nek ada
	if ($count != 0)
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
			
			$kd = nosql($data['mskd']);
			$nis = nosql($data['nis']);
			$abs = nosql($data['no_absen']);
			$nama = balikin2($data['nama']);
			
			//nek null
			if (empty($abs))
				{
				$abs = "00";
				}
			else if (strlen($abs) == 1)
				{
				$abs = "0$abs";
				}
			
			
			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td valign="top">
			<input name="kd'.$nomer.'" type="hidden" value="'.$kd.'">
			<input name="item'.$nomer.'" type="checkbox" value="'.$kd.'">
			</td>
			<td valign="top">
			<input name="abs'.$nomer.'" type="text" value="'.$abs.'" size="2" maxlength="2" onKeyPress="return numbersonly(this, event)">
			</td>
      		<td valign="top">'.$nis.'</td>
      		<td valign="top">'.$nama.'</td>
    		</tr>';
			}
		while ($data = mysql_fetch_assoc($result));
		}
		
	echo '</table>
	<table width="500" border="0" cellspacing="0" cellpadding="3">
    <tr> 
    <td align="right">Total : <font color="#FF0000"><strong>'.$count.'</strong></font> Data. '.$pagelist.'</td>
    </tr>
    <tr> 
    <td align="right">
	<input name="btnALL" type="button" onClick="checkAll('.$limit.')" value="SEMUA"> 
    <input name="btnBTL" type="submit" value="BATAL">
    <input name="btnHPS" type="submit" value="HAPUS"> 
    <input name="btnSMP2" type="submit" value="SIMPAN"> 
	<input name="jml" type="hidden" value="'.$limit.'"> 
    <input name="tapelkd" type="hidden" value="'.$tapelkd.'"> 
    <input name="kelkd" type="hidden" value="'.$kelkd.'"> 
	<input name="progkd" type="hidden" value="'.$progkd.'"> 
    <input name="rukd" type="hidden" value="'.$rukd.'"> 
	<input name="page" type="hidden" value="'.$page.'"> 
    <input name="total" type="hidden" value="'.$count.'">
    </td>
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