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
$filenya = "siswa.php";
$judul = "Keuangan Siswa";
$judulku = "[$tu_session : $nip5_session.$nm5_session] ==> $judul";
$judulx = $judul;
$s = nosql($_REQUEST['s']);
$tapelkd = nosql($_REQUEST['tapelkd']);
$kelkd = nosql($_REQUEST['kelkd']);
$progkd = nosql($_REQUEST['progkd']);
$rukd = nosql($_REQUEST['rukd']);
$swkd = nosql($_REQUEST['swkd']);
$keu = nosql($_REQUEST['keu']);
$page = nosql($_REQUEST['page']);
if ((empty($page)) OR ($page == "0"))
	{
	$page = "1";
	}
	
$ke = "$filenya?tapelkd=$tapelkd&kelkd=$kelkd&progkd=$progkd&rukd=$rukd&swkd=$swkd&page=$page";
	
	
	
	
	
		
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
else if (empty($swkd))
	{
	$diload = "document.formx.siswa.focus();";
	}



//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//jika simpan
if ($HTTP_POST_VARS['btnSMP'])
	{
	//nilai
	$tapelkd = nosql($_POST['tapelkd']);
	$kelkd = nosql($_POST['kelkd']);
	$progkd = nosql($_POST['progkd']);
	$rukd = nosql($_POST['rukd']);
	$swkd = nosql($_POST['swkd']);
	$page = nosql($_POST['page']);
	$keu = nosql($_POST['keu']);
	
	$btgl = nosql($_POST['btgl']);
	$bbln = nosql($_POST['bbln']);
	$bthn = nosql($_POST['bthn']);
	$tgl_bayar = ("$bthn:$bbln:$btgl");
	
	$gdg_ket = cegah($_POST['gdg_ket']);
	$uji_ket = cegah($_POST['uji_ket']);
	$lain_ket = cegah($_POST['lain_ket']);
	$ke = "$filenya?tapelkd=$tapelkd&kelkd=$kelkd&progkd=$progkd&rukd=$rukd&swkd=$swkd&page=$page";	
	
	
	//siswa kelas
	$qsikel = mysql_query("SELECT * FROM siswa_kelas ".
								"WHERE kd_tapel = '$tapelkd' ".
								"AND kd_kelas = '$kelkd' ".
								"AND kd_program = '$progkd' ".
								"AND kd_ruang = '$rukd' ".
								"AND kd_siswa = '$swkd'");
	$rsikel = mysql_fetch_assoc($qsikel);
	$sikel_kd = nosql($rsikel['kd']);
	
	
	//uang gedung
	$qugedu = mysql_query("SELECT * FROM m_uang_gedung ".
							"WHERE kd_tapel = '$tapelkd' ".
							"AND kd_kelas = '$kelkd'");
	$rugedu = mysql_fetch_assoc($qugedu);
	$ugedu_kd = nosql($rugedu['kd']);
	
	
	//uang ujian
	$quuji = mysql_query("SELECT * FROM m_uang_ujian ".
								"WHERE kd_tapel = '$tapelkd' ".
								"AND kd_kelas = '$kelkd'");
	$ruuji = mysql_fetch_assoc($quuji);
	$uuji_kd = nosql($ruuji['kd']);


	//uang lain
	$qulain = mysql_query("SELECT * FROM m_uang_lain ".
								"WHERE kd_tapel = '$tapelkd' ".
								"AND kd_kelas = '$kelkd'");
	$rulain = mysql_fetch_assoc($qulain);
	$ulain_kd = nosql($rulain['kd']);


	//uang spp
	$quspp = mysql_query("SELECT * FROM m_uang_spp ".
								"WHERE kd_tapel = '$tapelkd' ".
								"AND kd_kelas = '$kelkd'");
	$ruspp = mysql_fetch_assoc($quspp);
	$uspp_kd = nosql($ruspp['kd']);
	
	
	
	//nek gedung
	if ($keu == "gedung")
		{
		//cek
		$qcc = mysql_query("SELECT siswa_uang_gedung.*, siswa_uang_gedung.kd AS sugkd, siswa_kelas.* ".
								"FROM siswa_uang_gedung, siswa_kelas ".
								"WHERE siswa_uang_gedung.kd_siswa_kelas = siswa_kelas.kd ".
								"AND siswa_kelas.kd = '$sikel_kd'");
		$rcc = mysql_fetch_assoc($qcc);
		$tcc = mysql_num_rows($qcc);
		$cc_sugkd = nosql($rcc['sugkd']);
		
		//nek iya
		if ($tcc != 0)
			{
			//update
			mysql_query("UPDATE siswa_uang_gedung SET tgl_bayar = '$tgl_bayar', ".
							"ket = '$gdg_ket' ".
							"WHERE kd = '$cc_sugkd'");
			}
		else
			{
			//baru
			mysql_query("INSERT INTO siswa_uang_gedung(kd, kd_siswa_kelas, kd_uang_gedung, tgl_bayar, ket) VALUES ".
							"('$x', '$sikel_kd', '$ugedu_kd', '$tgl_bayar', '$gdg_ket')");
			}		
	
		//re-direct
		$ke2 = "$ke&keu=gedung";
		xloc($ke2);	
		}



	//nek ujian
	if ($keu == "ujian")
		{
		//cek
		$qcc = mysql_query("SELECT siswa_uang_ujian.*, siswa_uang_ujian.kd AS sujkd, siswa_kelas.* ".
								"FROM siswa_uang_ujian, siswa_kelas ".
								"WHERE siswa_uang_ujian.kd_siswa_kelas = siswa_kelas.kd ".
								"AND siswa_kelas.kd = '$sikel_kd'");
		$rcc = mysql_fetch_assoc($qcc);
		$tcc = mysql_num_rows($qcc);
		$cc_sujkd = nosql($rcc['sujkd']);
		
		//nek iya
		if ($tcc != 0)
			{
			//update
			mysql_query("UPDATE siswa_uang_ujian SET tgl_bayar = '$tgl_bayar', ".
							"ket = '$uji_ket' ".
							"WHERE kd = '$cc_sujkd'");
			}
		else
			{
			//baru
			mysql_query("INSERT INTO siswa_uang_ujian(kd, kd_siswa_kelas, kd_uang_ujian, tgl_bayar, ket) VALUES ".
							"('$x', '$sikel_kd', '$uuji_kd', '$tgl_bayar', '$uji_ket')");
			}		
	
		//re-direct
		$ke2 = "$ke&keu=ujian";
		xloc($ke2);	
		}



	//nek lain
	if ($keu == "lain")
		{
		//cek
		$qcc = mysql_query("SELECT siswa_uang_lain.*, siswa_uang_lain.kd AS sulkd, siswa_kelas.* ".
								"FROM siswa_uang_lain, siswa_kelas ".
								"WHERE siswa_uang_lain.kd_siswa_kelas = siswa_kelas.kd ".
								"AND siswa_kelas.kd = '$sikel_kd'");
		$rcc = mysql_fetch_assoc($qcc);
		$tcc = mysql_num_rows($qcc);
		$cc_sulkd = nosql($rcc['sulkd']);
		
		//nek iya
		if ($tcc != 0)
			{
			//update
			mysql_query("UPDATE siswa_uang_lain SET tgl_bayar = '$tgl_bayar', ".
							"ket = '$lain_ket' ".
							"WHERE kd = '$cc_sulkd'");
			}
		else
			{
			//baru
			mysql_query("INSERT INTO siswa_uang_lain(kd, kd_siswa_kelas, kd_uang_lain, tgl_bayar, ket) VALUES ".
							"('$x', '$sikel_kd', '$ulain_kd', '$tgl_bayar', '$lain_ket')");
			}		
	
		//re-direct
		$ke2 = "$ke&keu=lain";
		xloc($ke2);	
		}



	//nek spp
	if ($keu == "spp")
		{
		//looping
		for ($i=1;$i<=12;$i++)
			{
			//bln
			$xibln = "ibln";
			$xibln1 = "$xibln$i";
			$xiblnxx = nosql($_POST["$xibln1"]);
			
			//thn
			$xithn = "ithn";
			$xithn1 = "$xithn$i";
			$xithnxx = nosql($_POST["$xithn1"]);
			
			//btgl
			$xbtgl = "btgl";
			$xbtgl1 = "$xbtgl$i";
			$xbtglxx = nosql($_POST["$xbtgl1"]);

			//bbln
			$xbbln = "bbln";
			$xbbln1 = "$xbbln$i";
			$xbblnxx = nosql($_POST["$xbbln1"]);
			
			//bthn
			$xbthn = "bthn";
			$xbthn1 = "$xbthn$i";
			$xbthnxx = nosql($_POST["$xbthn1"]);
			
			//tgl_bayar
			$tgl_bayar = ("$xbthnxx:$xbblnxx:$xbtglxx");
			
			//ket
			$xket = "ket";
			$xket1 = "$xket$i";
			$xketxx = nosql($_POST["$xket1"]);


			//cek
			$qcc = mysql_query("SELECT * FROM siswa_uang_spp ".
									"WHERE kd_siswa_kelas = '$sikel_kd' ".
									"AND kd_uang_spp = '$uspp_kd' ".
									"AND bln = '$xiblnxx' ".
									"AND thn = '$xithnxx'");
			$rcc = mysql_fetch_assoc($qcc);
			$tcc = mysql_num_rows($qcc);
			
			//nek iya
			if ($tcc != 0)
				{
				//update
				mysql_query("UPDATE siswa_uang_spp SET tgl_bayar = '$tgl_bayar', ".
								"ket = '$xketxx' ".
								"WHERE kd_siswa_kelas = '$sikel_kd' ".
								"AND kd_uang_spp = '$uspp_kd' ".
								"AND bln = '$xiblnxx' ".
								"AND thn = '$xithnxx'");
				}
			else
				{
				//masukkan
				$xx = md5("$today3$i");
				
				
				mysql_query("INSERT INTO siswa_uang_spp(kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES ".
								"('$xx', '$sikel_kd', '$uspp_kd', '$xiblnxx', '$xithnxx', '$tgl_bayar', '$xketxx')");
				}
			}


	
		//re-direct
		$ke2 = "$ke&keu=spp";
		xloc($ke2);	
		}
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




//isi *START
ob_start();

//js
require("../../inc/js/jumpmenu.js");
require("../../inc/js/swap.js");
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

echo '</select>, 
Siswa : ';
echo "<select name=\"siswa\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qswx = mysql_query("SELECT m_siswa.*, m_siswa.kd AS mskd, siswa_kelas.* ".
						"FROM m_siswa, siswa_kelas ".
						"WHERE siswa_kelas.kd_siswa = m_siswa.kd ".
						"AND siswa_kelas.kd_tapel = '$tapelkd' ".
						"AND siswa_kelas.kd_kelas = '$kelkd' ".
						"AND siswa_kelas.kd_program = '$progkd' ".
						"AND siswa_kelas.kd_ruang = '$rukd' ".
						"AND siswa_kelas.kd_siswa = '$swkd'");
$rowswx = mysql_fetch_assoc($qswx);

$swx_kd = nosql($rowswx['mskd']);
$swx_nis = nosql($rowswx['nis']);
$swx_nm = balikin($rowswx['nama']);


echo '<option value="'.$swx_kd.'">'.$swx_nis.'. '.$swx_nm.'</option>';

$qsw = mysql_query("SELECT m_siswa.*, m_siswa.kd AS mskd, siswa_kelas.* ".
						"FROM m_siswa, siswa_kelas ".
						"WHERE siswa_kelas.kd_siswa = m_siswa.kd ".
						"AND siswa_kelas.kd_tapel = '$tapelkd' ".
						"AND siswa_kelas.kd_kelas = '$kelkd' ".
						"AND siswa_kelas.kd_program = '$progkd' ".
						"AND siswa_kelas.kd_ruang = '$rukd' ".
						"AND siswa_kelas.kd_siswa <> '$swkd' ".
						"ORDER BY m_siswa.nis ASC");
$rowsw = mysql_fetch_assoc($qsw);
				
do
	{
	$sw_kd = nosql($rowsw['mskd']);
	$sw_nis = nosql($rowsw['nis']);
	$sw_nm = balikin($rowsw['nama']);	
	
	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&progkd='.$progkd.'&rukd='.$rukd.'&swkd='.$sw_kd.'">'.$sw_nis.'. '.$sw_nm.'</option>';
	}
while ($rowsw = mysql_fetch_assoc($qsw));

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
else if (empty($swkd))
	{
	echo '<font color="#FF0000"><strong>SISWA Belum Dipilih...!</strong></font>';
	}
else
	{
	echo '<table bgcolor="'.$warna02.'" width="100%" border="0" cellspacing="0" cellpadding="3">
	<tr>
    <td>
	<strong>Uang : </strong>
	<a href="'.$ke.'&keu=gedung" title="Uang Gedung">Gedung</a>, 
	<a href="'.$ke.'&keu=ujian" title="Uang Ujian">Ujian</a>, 
	<a href="'.$ke.'&keu=spp" title="Uang SPP">SPP</a>, 
	<a href="'.$ke.'&keu=lain" title="Uang Lain-Lain">Lain-Lain</a>
	</td>
	</tr>
	</table>
	<br>';
	
	//gedung
	if ((empty($keu)) OR ($keu == "gedung"))
		{
		//uang gedung-nya
		$qgedu = mysql_query("SELECT * FROM m_uang_gedung ".
								"WHERE kd_tapel = '$tapelkd' ".
								"AND kd_kelas = '$kelkd'");
		$rgedu = mysql_fetch_assoc($qgedu);
		$gedu_nilai = nosql($rgedu['nilai']);
		
		
		//nilainya
		$qegdg = mysql_query("SELECT m_uang_gedung.*, siswa_kelas.*, siswa_uang_gedung.*, ".
								"DATE_FORMAT(siswa_uang_gedung.tgl_bayar, '%d') AS tgl, ".
								"DATE_FORMAT(siswa_uang_gedung.tgl_bayar, '%m') AS bln, ".
								"DATE_FORMAT(siswa_uang_gedung.tgl_bayar, '%Y') AS thn ".
								"FROM m_uang_gedung, siswa_kelas, siswa_uang_gedung ".
								"WHERE siswa_uang_gedung.kd_siswa_kelas = siswa_kelas.kd ".
								"AND siswa_uang_gedung.kd_uang_gedung = m_uang_gedung.kd ".
								"AND siswa_kelas.kd_tapel = '$tapelkd' ".
								"AND siswa_kelas.kd_kelas = '$kelkd' ".
								"AND siswa_kelas.kd_program = '$progkd' ".
								"AND siswa_kelas.kd_ruang = '$rukd' ".
								"AND siswa_kelas.kd_siswa = '$swkd'");
		$regdg = mysql_fetch_assoc($qegdg);
		$egdg_tgl = nosql($regdg['tgl']);
		$egdg_bln = nosql($regdg['bln']);
		$egdg_thn = nosql($regdg['thn']);
		$egdg_nilai = $gedu_nilai;
		$egdg_ket = balikin($regdg['ket']);
		
		//nek tgl null
		if ($egdg_tgl == "00")
			{
			$egdg_tgl = "";
			}
			
							
		//nek thn nul
		if ($egdg_thn == "0000")
			{
			$egdg_thn = "";
			}
		
		
		echo '<strong>Uang Gedung : </strong>
		'.xduit2($egdg_nilai).'
		<br>
		Tgl. Bayar : 
		<br>
		<select name="btgl">
		<option value="'.$egdg_tgl.'" selected>'.$egdg_tgl.'</option>';
		for ($i=1;$i<=31;$i++)
			{
			echo '<option value="'.$i.'">'.$i.'</option>';
			}
		
		echo '</select>
		<select name="bbln">
		<option value="'.$egdg_bln.'" selected>'.$arrbln1[$egdg_bln].'</option>';
		for ($j=1;$j<=12;$j++)
			{
			echo '<option value="'.$j.'">'.$arrbln[$j].'</option>';
			}
	
		echo '</select>
		<select name="bthn">
		<option value="'.$egdg_thn.'" selected>'.$egdg_thn.'</option>';
			for ($k=$bayar01;$k<=$bayar02;$k++)
			{
			echo '<option value="'.$k.'">'.$k.'</option>';
			}
		echo '</select>

		<br>
		Ket. :
		<br>
		<input name="gdg_ket" type="text" size="30" value="'.$egdg_ket.'">
		<br>
		<input name="tapelkd" type="hidden" value="'.$tapelkd.'">
		<input name="kelkd" type="hidden" value="'.$kelkd.'">
		<input name="progkd" type="hidden" value="'.$progkd.'">
		<input name="rukd" type="hidden" value="'.$rukd.'">
		<input name="swkd" type="hidden" value="'.$swkd.'">
		<input name="keu" type="hidden" value="gedung">
		<input name="page" type="hidden" value="'.$page.'">
		<input name="btnSMP" type="submit" value="SIMPAN">';
		}
	
	
	
	
	
	//ujian
	if ($keu == "ujian")
		{
		//uang ujian-nya
		$quji = mysql_query("SELECT * FROM m_uang_ujian ".
								"WHERE kd_tapel = '$tapelkd' ".
								"AND kd_kelas = '$kelkd'");
		$ruji = mysql_fetch_assoc($quji);
		$uji_nilai = nosql($ruji['nilai']);
		
		
		//nilainya
		$qeuji = mysql_query("SELECT m_uang_ujian.*, siswa_kelas.*, siswa_uang_ujian.*, ".
									"DATE_FORMAT(siswa_uang_ujian.tgl_bayar, '%d') AS tgl, ".
									"DATE_FORMAT(siswa_uang_ujian.tgl_bayar, '%m') AS bln, ".
									"DATE_FORMAT(siswa_uang_ujian.tgl_bayar, '%Y') AS thn ".
									"FROM m_uang_ujian, siswa_kelas, siswa_uang_ujian ".
									"WHERE siswa_uang_ujian.kd_siswa_kelas = siswa_kelas.kd ".
									"AND siswa_uang_ujian.kd_uang_ujian = m_uang_ujian.kd ".
									"AND siswa_kelas.kd_tapel = '$tapelkd' ".
									"AND siswa_kelas.kd_kelas = '$kelkd' ".
									"AND siswa_kelas.kd_program = '$progkd' ".
									"AND siswa_kelas.kd_ruang = '$rukd' ".
									"AND siswa_kelas.kd_siswa = '$swkd'");
		$reuji = mysql_fetch_assoc($qeuji);
		$euji_tgl = nosql($reuji['tgl']);
		$euji_bln = nosql($reuji['bln']);
		$euji_thn = nosql($reuji['thn']);
		$euji_nilai = $uji_nilai;
		$euji_ket = balikin($reuji['ket']);
		
		
		//nek tgl null
		if ($euji_tgl == "00")
			{
			$euji_tgl = "";
			}
			
							
		//nek thn nul
		if ($euji_thn == "0000")
			{
			$euji_thn = "";
			}


		echo '<strong>Uang Ujian : </strong>
		'.xduit2($euji_nilai).'
		<br>
		Tgl. Bayar : 
		<br>
		<select name="btgl">
		<option value="'.$euji_tgl.'" selected>'.$euji_tgl.'</option>';
		for ($i=1;$i<=31;$i++)
			{
			echo '<option value="'.$i.'">'.$i.'</option>';
			}
		
		echo '</select>
		<select name="bbln">
		<option value="'.$euji_bln.'" selected>'.$arrbln1[$euji_bln].'</option>';
		for ($j=1;$j<=12;$j++)
			{
			echo '<option value="'.$j.'">'.$arrbln[$j].'</option>';
			}
	
		echo '</select>
		<select name="bthn">
		<option value="'.$euji_thn.'" selected>'.$euji_thn.'</option>';
			for ($k=$bayar01;$k<=$bayar02;$k++)
			{
			echo '<option value="'.$k.'">'.$k.'</option>';
			}
		echo '</select>

		<br>
		Ket. :
		<br>
		<input name="uji_ket" type="text" size="30" value="'.$euji_ket.'">
		<br>
		<input name="tapelkd" type="hidden" value="'.$tapelkd.'">
		<input name="kelkd" type="hidden" value="'.$kelkd.'">
		<input name="progkd" type="hidden" value="'.$progkd.'">
		<input name="rukd" type="hidden" value="'.$rukd.'">
		<input name="swkd" type="hidden" value="'.$swkd.'">
		<input name="keu" type="hidden" value="ujian">
		<input name="page" type="hidden" value="'.$page.'">
		<input name="btnSMP" type="submit" value="SIMPAN">';
		}
	
	
	
	
	
	//spp
	if ($keu == "spp")
		{
		//cacah tapel
		$qtpel = mysql_query("SELECT * FROM m_tapel ".
								"WHERE kd = '$tapelkd'");
		$rtpel = mysql_fetch_assoc($qtpel);
		$tpel_thn1 = nosql($rtpel['tahun1']);
		$tpel_thn2 = nosql($rtpel['tahun2']);		
		
		//uang spp-nya
		$qspp = mysql_query("SELECT * FROM m_uang_spp ".
								"WHERE kd_tapel = '$tapelkd' ".
								"AND kd_kelas = '$kelkd'");
		$rspp = mysql_fetch_assoc($qspp);
		$spp_nilai = nosql($rspp['nilai']);
				
		echo '<strong>Uang SPP : </strong>
		'.xduit2($spp_nilai).'/Bulan
		<br>';

		echo '<table width="600" border="1" cellspacing="0" cellpadding="3">
		<tr bgcolor="'.$warnaheader.'">
		<td width="10"><strong>No.</strong></td>
		<td width="150"><strong>Bulan</strong></td>
		<td><strong>Tgl. Bayar</strong></td>
		<td width="100"><strong>Ket.</strong></td>
		</tr>';
		
		for ($i=1;$i<=12;$i++)
			{
			//warna
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



			//nilainya
			if ($i<=6) //bulan juli sampai desember
				{
				$ibln = $i + 6;
				
				//nilainya
				$qespp = mysql_query("SELECT m_uang_spp.*, siswa_kelas.*, siswa_uang_spp.*, ".
											"DATE_FORMAT(siswa_uang_spp.tgl_bayar, '%d') AS tgl, ".
											"DATE_FORMAT(siswa_uang_spp.tgl_bayar, '%m') AS bln, ".
											"DATE_FORMAT(siswa_uang_spp.tgl_bayar, '%Y') AS thn ".
											"FROM m_uang_spp, siswa_kelas, siswa_uang_spp ".
											"WHERE siswa_uang_spp.kd_siswa_kelas = siswa_kelas.kd ".
											"AND siswa_uang_spp.kd_uang_spp = m_uang_spp.kd ".
											"AND siswa_kelas.kd_tapel = '$tapelkd' ".
											"AND siswa_kelas.kd_kelas = '$kelkd' ".
											"AND siswa_kelas.kd_program = '$progkd' ".
											"AND siswa_kelas.kd_ruang = '$rukd' ".
											"AND siswa_kelas.kd_siswa = '$swkd' ".
											"AND siswa_uang_spp.bln = '$ibln' ".
											"AND siswa_uang_spp.thn = '$tpel_thn1'");
				$respp = mysql_fetch_assoc($qespp);
				
				//hidden & bln + thn
				$hid_bt = '<input name="ibln'.$i.'" type="hidden" value="'.$ibln.'">
				<input name="ithn'.$i.'" type="hidden" value="'.$tpel_thn1.'">
				'.$arrbln[$ibln].' '.$tpel_thn1.'';
				}
			
			if ($i>6) //bulan januari sampai juni
				{
				$ibln = $i - 6;
				
				//nilainya
				$qespp = mysql_query("SELECT m_uang_spp.*, siswa_kelas.*, siswa_uang_spp.*, ".
											"DATE_FORMAT(siswa_uang_spp.tgl_bayar, '%d') AS tgl, ".
											"DATE_FORMAT(siswa_uang_spp.tgl_bayar, '%m') AS bln, ".
											"DATE_FORMAT(siswa_uang_spp.tgl_bayar, '%Y') AS thn ".
											"FROM m_uang_spp, siswa_kelas, siswa_uang_spp ".
											"WHERE siswa_uang_spp.kd_siswa_kelas = siswa_kelas.kd ".
											"AND siswa_uang_spp.kd_uang_spp = m_uang_spp.kd ".
											"AND siswa_kelas.kd_tapel = '$tapelkd' ".
											"AND siswa_kelas.kd_kelas = '$kelkd' ".
											"AND siswa_kelas.kd_program = '$progkd' ".
											"AND siswa_kelas.kd_ruang = '$rukd' ".
											"AND siswa_kelas.kd_siswa = '$swkd' ".
											"AND siswa_uang_spp.bln = '$ibln' ".
											"AND siswa_uang_spp.thn = '$tpel_thn2'");
				$respp = mysql_fetch_assoc($qespp);
				
				//hidden & bln + thn
				$hid_bt = '<input name="ibln'.$i.'" type="hidden" value="'.$ibln.'">
				<input name="ithn'.$i.'" type="hidden" value="'.$tpel_thn2.'">
				'.$arrbln[$ibln].' '.$tpel_thn2.'';
				}

			//nilainya
			$espp_tgl = nosql($respp['tgl']);
			$espp_bln = nosql($respp['bln']);
			$espp_thn = nosql($respp['thn']);
			$espp_ket = balikin($respp['ket']);
			
			//nek tgl null
			if ($espp_tgl == "00")
				{
				$espp_tgl = "";
				}
			
							
			//nek thn nul
			if ($espp_thn == "0000")
				{
				$espp_thn = "";
				}
			

			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td>'.$i.'.</td>
			<td>'.$hid_bt.'</td>
			<td>
			<select name="btgl'.$i.'">
			<option value="'.$espp_tgl.'" selected>'.$espp_tgl.'</option>';
			for ($m=1;$m<=31;$m++)
				{
				echo '<option value="'.$m.'">'.$m.'</option>';
				}
		
			echo '</select>
			<select name="bbln'.$i.'">
			<option value="'.$espp_bln.'" selected>'.$arrbln1[$espp_bln].'</option>';
			for ($j=1;$j<=12;$j++)
				{
				echo '<option value="'.$j.'">'.$arrbln[$j].'</option>';
				}
		
			echo '</select>
			<select name="bthn'.$i.'">
			<option value="'.$espp_thn.'" selected>'.$espp_thn.'</option>';
			for ($k=$bayar01;$k<=$bayar02;$k++)
				{
				echo '<option value="'.$k.'">'.$k.'</option>';
				}
			echo '</select>
					
			</td>
			<td>
			<input name="ket'.$i.'" type="text" value="'.$espp_ket.'" size="20">
			</td>
			</tr>';
			}
		
		
		echo '</table>';


		echo '<input name="tapelkd" type="hidden" value="'.$tapelkd.'">
		<input name="kelkd" type="hidden" value="'.$kelkd.'">
		<input name="progkd" type="hidden" value="'.$progkd.'">
		<input name="rukd" type="hidden" value="'.$rukd.'">
		<input name="swkd" type="hidden" value="'.$swkd.'">
		<input name="keu" type="hidden" value="spp">
		<input name="page" type="hidden" value="'.$page.'">
		<input name="btnSMP" type="submit" value="SIMPAN">';
		}
	
	
	
	
	
	
	//lain
	if ($keu == "lain")
		{
		//uang lain-nya
		$qlain = mysql_query("SELECT * FROM m_uang_lain ".
								"WHERE kd_tapel = '$tapelkd' ".
								"AND kd_kelas = '$kelkd'");
		$rlain = mysql_fetch_assoc($qlain);
		$lain_nilai = nosql($rlain['nilai']);
		
		
		//nilainya
		$qelain = mysql_query("SELECT m_uang_lain.*, siswa_kelas.*, siswa_uang_lain.*, ".
									"DATE_FORMAT(siswa_uang_lain.tgl_bayar, '%d') AS tgl, ".
									"DATE_FORMAT(siswa_uang_lain.tgl_bayar, '%m') AS bln, ".
									"DATE_FORMAT(siswa_uang_lain.tgl_bayar, '%Y') AS thn ".
									"FROM m_uang_lain, siswa_kelas, siswa_uang_lain ".
									"WHERE siswa_uang_lain.kd_siswa_kelas = siswa_kelas.kd ".
									"AND siswa_uang_lain.kd_uang_lain = m_uang_lain.kd ".
									"AND siswa_kelas.kd_tapel = '$tapelkd' ".
									"AND siswa_kelas.kd_kelas = '$kelkd' ".
									"AND siswa_kelas.kd_program = '$progkd' ".
									"AND siswa_kelas.kd_ruang = '$rukd' ".
									"AND siswa_kelas.kd_siswa = '$swkd'");
		$relain = mysql_fetch_assoc($qelain);
		$elain_tgl = nosql($relain['tgl']);
		$elain_bln = nosql($relain['bln']);
		$elain_thn = nosql($relain['thn']);
		$elain_nilai = $lain_nilai;
		$elain_ket = balikin($relain['ket']);
		
		//nek tgl null
		if ($elain_tgl == "00")
			{
			$elain_tgl = "";
			}
			
							
		//nek thn nul
		if ($elain_thn == "0000")
			{
			$elain_thn = "";
			}

		
		echo '<strong>Uang Lain-Lain : </strong>
		'.xduit2($elain_nilai).'
		<br>
		Tgl. Bayar : 
		<br>
		<select name="btgl">
		<option value="'.$elain_tgl.'" selected>'.$elain_tgl.'</option>';
		for ($i=1;$i<=31;$i++)
			{
			echo '<option value="'.$i.'">'.$i.'</option>';
			}
		
		echo '</select>
		<select name="bbln">
		<option value="'.$elain_bln.'" selected>'.$arrbln1[$elain_bln].'</option>';
		for ($j=1;$j<=12;$j++)
			{
			echo '<option value="'.$j.'">'.$arrbln[$j].'</option>';
			}
	
		echo '</select>
		<select name="bthn">
		<option value="'.$elain_thn.'" selected>'.$elain_thn.'</option>';
			for ($k=$bayar01;$k<=$bayar02;$k++)
			{
			echo '<option value="'.$k.'">'.$k.'</option>';
			}
		echo '</select>

		<br>
		Ket. :
		<br>
		<input name="lain_ket" type="text" size="30" value="'.$elain_ket.'">
		<br>
		<input name="tapelkd" type="hidden" value="'.$tapelkd.'">
		<input name="kelkd" type="hidden" value="'.$kelkd.'">
		<input name="progkd" type="hidden" value="'.$progkd.'">
		<input name="rukd" type="hidden" value="'.$rukd.'">
		<input name="swkd" type="hidden" value="'.$swkd.'">
		<input name="keu" type="hidden" value="lain">
		<input name="page" type="hidden" value="'.$page.'">
		<input name="btnSMP" type="submit" value="SIMPAN">';
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