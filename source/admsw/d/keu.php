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
require("../../inc/cek/admsw.php");
$tpl = LoadTpl("../../template/index.html"); 

nocache;

//nilai
$filenya = "keu.php";
$judul = "Keuangan";
$judulku = "[$siswa_session : $nis2_session.$nm2_session] ==> $judul";
$judulx = $judul;
$s = nosql($_REQUEST['s']);
$tapelkd = nosql($_REQUEST['tapelkd']);
$kelkd = nosql($_REQUEST['kelkd']);
$progkd = nosql($_REQUEST['progkd']);
$rukd = nosql($_REQUEST['rukd']);
$keu = nosql($_REQUEST['keu']);
$page = nosql($_REQUEST['page']);
if ((empty($page)) OR ($page == "0"))
	{
	$page = "1";
	}
	
$ke = "$filenya?tapelkd=$tapelkd&kelkd=$kelkd&progkd=$progkd&rukd=$rukd&page=$page";
	
	
	


//isi *START
ob_start();

//js
require("../../inc/js/jumpmenu.js");
require("../../inc/js/swap.js");
require("../../inc/menu/admsw.php");

//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form name="formx" method="post" action="'.$filenya.'">';
xheadline($judul);
echo ' [<a href="../index.php" title="Daftar Detail">DAFTAR DETAIL</a>]

<table bgcolor="'.$warnaover.'" width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td>
Tahun Pelajaran : ';
//terpilih
$qtpx = mysql_query("SELECT * FROM m_tapel ".
						"WHERE kd = '$tapelkd'");
$rowtpx = mysql_fetch_assoc($qtpx);
$tpx_thn1 = nosql($rowtpx['tahun1']);
$tpx_thn2 = nosql($rowtpx['tahun2']);


echo '<strong>'.$tpx_thn1.'/'.$tpx_thn1.'</strong>, 
Kelas : ';
//terpilih
$qbtx = mysql_query("SELECT * FROM m_kelas ".
						"WHERE kd = '$kelkd'");
$rowbtx = mysql_fetch_assoc($qbtx);
$btx_kelas = nosql($rowbtx['kelas']);

echo '<strong>'.$btx_kelas.'</strong>, 
Program : ';
//terpilih
$qprgx = mysql_query("SELECT * FROM m_program ".
						"WHERE kd = '$progkd'");
$rowprgx = mysql_fetch_assoc($qprgx);

$prgx_kd = nosql($rowprgx['kd']);
$prgx_prog = balikin($rowprgx['program']);

//NEK NULL
if (empty($prgx_prog))
	{
	$prgx_prog = "-";
	}
	
	
echo '<strong>'.$prgx_prog.'</strong>, 
Ruang : ';
//terpilih
$qrugx = mysql_query("SELECT * FROM m_ruang ".
						"WHERE kd = '$rukd'");
$rowrugx = mysql_fetch_assoc($qrugx);

$rugx_kd = nosql($rowrugx['kd']);
$rugx_ru = balikin($rowrugx['ruang']);

echo '<strong>'.$rugx_ru.'</strong>
</td>
</tr>
</table>';


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
							"AND siswa_kelas.kd_siswa = '$kd2_session'");
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
	<br>
	<em>'.xduit2($egdg_nilai).'</em>
	<br>
	<br>
	Tgl. Bayar : 
	<br>
	<em>'.$egdg_tgl.' '.$arrbln1[$egdg_bln].' '.$egdg_thn.'</em>
	<br>
	<br>
	Ket. :
	<br>
	<em>'.$egdg_ket.'</em>';
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
							"AND siswa_kelas.kd_siswa = '$kd2_session'");
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
	<em>'.xduit2($euji_nilai).'</em>
	<br>
	<br>	
	Tgl. Bayar : 
	<br>
	<em>'.$euji_tgl.' '.$arrbln1[$euji_bln].' '.$euji_thn.'</em>
	<br>
	<br>
	Ket. :
	<br>
	<em>'.$euji_ket.'</em>';
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
	<br>
	<em>'.xduit2($spp_nilai).'/Bulan</em>
	<br>';

	echo '<table width="600" border="1" cellspacing="0" cellpadding="3">
	<tr bgcolor="'.$warnaheader.'">
	<td width="10"><strong>No.</strong></td>
	<td width="150"><strong>Bulan</strong></td>
	<td width="175"><strong>Tgl. Bayar</strong></td>
	<td><strong>Ket.</strong></td>
	</tr>';
		
	for ($i=1;$i<=12;$i++)
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
										"AND siswa_kelas.kd_siswa = '$kd2_session' ".
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
										"AND siswa_kelas.kd_siswa = '$kd2_session' ".
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
		'.$espp_tgl.' '.$arrbln1[$espp_bln].' '.$espp_thn.'
		</td>
		<td>
		'.$espp_ket.'
		</td>
		</tr>';
		}
	echo '</table>';
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
								"AND siswa_kelas.kd_siswa = '$kd2_session'");
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
	<br>
	<em>'.xduit2($elain_nilai).'</em>
	<br>
	<br>
	Tgl. Bayar : 
	<br>
	<em>'.$elain_tgl.' '.$arrbln1[$elain_bln].' '.$elain_thn.'</em>
	<br>
	<br>
	Ket. :
	<br>
	<em>'.$elain_ket.'</em>';
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