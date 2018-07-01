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
require("../../inc/class/paging2.php");
require("../../inc/cek/admtu.php");
$tpl = LoadTpl("../../template/index.html"); 


nocache;

//nilai
$filenya = "siswa.php";
$judul = "Data Siswa";
$judulku = "[$tu_session : $nip5_session.$nm5_session] ==> $judul";
$judulx = $judul;
$s = nosql($_REQUEST['s']);
$swkd = nosql($_REQUEST['swkd']);
$tapelkd = nosql($_REQUEST['tapelkd']);
$kelkd = nosql($_REQUEST['kelkd']);
$progkd = nosql($_REQUEST['progkd']);
$page = nosql($_REQUEST['page']);
if ((empty($page)) OR ($page == "0"))
	{
	$page = "1";
	}
	
$ke = "$filenya?tapelkd=$tapelkd&kelkd=$kelkd&progkd=$progkd&page=$page";
	
	
	
	
	
	
		
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
else
	{
	$diload = "document.formx.nis.focus();";
	}


//nek enter, ke simpan
$x_enter = 'onKeyDown="var keyCode = event.keyCode;
if (keyCode == 13) 
	{
	document.formx.btnSMP.focus();
	}"';




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


//nek edit
if ($s == "edit")
	{
	//nilai
	$swkd = nosql($_REQUEST['swkd']);
	
	//query
	$qnil = mysql_query("SELECT * FROM m_siswa ".
							"WHERE kd = '$swkd'");
	$rnil = mysql_fetch_assoc($qnil);
	
	$y_nis = nosql($rnil['nis']);
	$y_nama = balikin($rnil['nama']);
	}
	
	
	
//jika hapus
if ($HTTP_POST_VARS['btnHPS'])
	{
	//nilai
	$tapelkd = nosql($_POST['tapelkd']);
	$kelkd = nosql($_POST['kelkd']);
	$progkd = nosql($_POST['progkd']);
	$page = nosql($_REQUEST['page']);


	//query
	$p = new Pager();
	$start = $p->findStart($limit);
	
	$sqlcount = "SELECT * FROM m_siswa ".
					"ORDER BY nis ASC";
	$sqlresult = $sqlcount;
				
	$count = mysql_num_rows(mysql_query($sqlcount));
	$pages = $p->findPages($count, $limit);
	$result = mysql_query("$sqlresult LIMIT ".$start.", ".$limit);
	$pagelist = $p->pageList($_GET['page'], $pages, $target);
	$data = mysql_fetch_array($result);



	//ambil semua
	do
		{
		//ambil nilai
		$i = $i + 1;
		$yuk = "item";
		$yuhu = "$yuk$i";
		$kd = nosql($_POST["$yuhu"]);
	
		//del data
		mysql_query("DELETE FROM m_siswa ".
						"WHERE kd = '$kd'");
		
		//del kelas
		mysql_query("DELETE FROM siswa_kelas ".
						"WHERE kd_siswa = '$kd'");
		}
	while ($data = mysql_fetch_assoc($result));
	
	
	//auto-kembali
	xloc($ke);
	}
	
	
//jika simpan
if ($HTTP_POST_VARS['btnSMP'])
	{
	//nilai
	$s = nosql($_POST['s']);
	$tapelkd = nosql($_POST['tapelkd']);
	$kelkd = nosql($_POST['kelkd']);
	$progkd = nosql($_POST['progkd']);
	$swkd = nosql($_POST['swkd']);
	$nis = nosql($_POST['nis']);
	$nama = cegah($_POST['nama']);
	
	
	//nek null
	if ((empty($nis)) OR (empty($nama)))
		{
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!";
		pekem($pesan,$ke);
		}
	else
		{
		//nek edit
		if ($s == "edit")
			{
			//cek
			$qcc = mysql_query("SELECT * FROM m_siswa ".
									"WHERE nis = '$nis'");
			$rcc = mysql_fetch_assoc($qcc);
			$tcc = mysql_num_rows($qcc);
			
			//nek lebih dari 1
			if ($tcc > 1)
				{
				$pesan = "Ditemukan Duplikasi NIS : $nis. Silahkan Diganti...!";
				pekem($pesan,$ke);
				}
			else
				{
				//update
				mysql_query("UPDATE m_siswa SET nis = '$nis', ".
								"nama = '$nama' ".
								"WHERE kd = '$swkd'");

				//re-direct
				xloc($ke);	
				}
			}
			
			
			
	
		
		//nek baru
		if (empty($s))
			{
			//cek
			$qcc = mysql_query("SELECT * FROM m_siswa ".
									"WHERE nis = '$nis'");
			$rcc = mysql_fetch_assoc($qcc);
			$tcc = mysql_num_rows($qcc);
			
			//nek lebih dari 1
			if ($tcc > 1)
				{
				$pesan = "Ditemukan Duplikasi NIS : $nis. Silahkan Diganti...!";
				pekem($pesan,$ke);
				}
			else
				{
				//insert ke biodata
				$s_userx = $nis;
				$s_passx = md5($nis);
				$xx = md5($today3);
			
				//insert data siswa	
				mysql_query("INSERT INTO m_siswa(kd, usernamex, passwordx, nis, nama) VALUES ".
								"('$x', '$s_userx', '$s_passx', '$nis', '$nama')");
	
	
				//insert ke kelas
				mysql_query("INSERT INTO siswa_kelas(kd, kd_tapel, kd_kelas, kd_program, kd_siswa) VALUES ".
								"('$xx', '$tapelkd', '$kelkd', '$progkd', '$x')");
	
				//re-direct
				xloc($ke);	
				}
			}
		}
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
else
	{
	//entry
	echo '<table width="100%" border="0" cellspacing="0" cellpadding="3">
	<tr valign="top">
	<td>
	NIS : 
	<input name="nis" type="text" value="'.$y_nis.'" size="10" onKeyPress="return numbersonly(this, event)" '.$x_enter.'>, 
	Nama : 
	<input name="nama" type="text" value="'.$y_nama.'" size="20" '.$x_enter.'>
	<input name="btnSMP" type="submit" value="SIMPAN">
	<input name="btnBTL" type="submit" value="BATAL">
	</td>
	</tr>
	</table>
	<br>';
	
		
	//query DATA
	$tapelkd = nosql($_REQUEST['tapelkd']);
	$kelkd = nosql($_REQUEST['kelkd']);
	$progkd = nosql($_REQUEST['progkd']);
	
	//query
	$p = new Pager();
	$start = $p->findStart($limit);

	$sqlcount = "SELECT m_siswa.*, m_siswa.kd AS mskd, siswa_kelas.* ".
					"FROM m_siswa, siswa_kelas ".
					"WHERE siswa_kelas.kd_siswa = m_siswa.kd ".
					"AND siswa_kelas.kd_tapel = '$tapelkd' ".
					"AND siswa_kelas.kd_kelas = '$kelkd' ".
					"AND siswa_kelas.kd_program = '$progkd' ".
					"ORDER BY m_siswa.nis ASC";
	$sqlresult = $sqlcount;
			
	$count = mysql_num_rows(mysql_query($sqlcount));
	$pages = $p->findPages($count, $limit);
	$result = mysql_query("$sqlresult LIMIT ".$start.", ".$limit);
	$target = $ke;
	$pagelist = $p->pageList($_GET['page'], $pages, $target);
	$data = mysql_fetch_array($result);

	echo '<table width="500" border="1" cellpadding="3" cellspacing="0">
    <tr bgcolor="'.$warnaheader.'">
	<td width="1">&nbsp;</td>
	<td width="1">&nbsp;</td>
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
			$kd_kelas = nosql($data['kd_kelas']);
			$nis = nosql($data['nis']);
			$nama = balikin($data['nama']);
			
			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td><input name="kd'.$nomer.'" type="hidden" value="'.$kd.'">
			<input type="checkbox" name="item'.$nomer.'" value="'.$kd.'"> 
			</td>
			<td>
			<a href="'.$filenya.'?s=edit&tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&progkd='.$progkd.'&swkd='.$kd.'"><img src="'.$sumber.'/img/edit.gif" width="16" height="16" border="0"></a>
			</td>
			<td valign="top">
			'.$nis.'
			</td>
			<td valign="top">
			'.$nama.'
			</td>
			</tr>';
	  		}
		while ($data = mysql_fetch_assoc($result));
		}
	
	echo '</table>
	<table width="500" border="0" cellspacing="0" cellpadding="3">
    <tr>
	<td width="250">
	<input type="button" name="Button" value="SEMUA" onClick="checkAll('.$limit.')">
	<input name="btnBTL" type="reset" value="BATAL">
	<input name="btnHPS" type="submit" value="HAPUS">
	<input name="jml" type="hidden" value="'.$limit.'">
	<input name="s" type="hidden" value="'.$s.'">
	<input name="tapelkd" type="hidden" value="'.$tapelkd.'">
	<input name="kelkd" type="hidden" value="'.$kelkd.'">
	<input name="progkd" type="hidden" value="'.$progkd.'">
	<input name="swkd" type="hidden" value="'.$swkd.'">
	<input name="total" type="hidden" value="'.$count.'">
	</td>
	<td align="right"><font color="#FF0000"><strong>'.$count.'</strong></font> Data '.$pagelist.'</td>
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