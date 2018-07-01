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

//ambil nilai
require("../../inc/config.php"); 
require("../../inc/fungsi.php"); 
require("../../inc/koneksi.php"); 
require("../../inc/cek/admwk.php"); 
require("../../inc/class/paging.php"); 
$tpl = LoadTpl("../../template/index.html"); 

nocache;

//nilai
$filenya = "detail.php";
$judul = "Daftar Siswa";
$judulku = "[$wk_session : $nip3_session.$nm3_session] ==> $judul";
$juduli = $judul;
$tapelkd = nosql($_REQUEST['tapelkd']);
$kelkd = nosql($_REQUEST['kelkd']);
$progkd = nosql($_REQUEST['progkd']);
$rukd = nosql($_REQUEST['rukd']);
$ke = "$filenya?tapelkd=$tapelkd&kelkd=$kelkd&progkd=$progkd&rukd=$rukd";





//isi *START
ob_start();

//js
require("../../inc/js/swap.js"); 
require("../../inc/menu/admwk.php");


//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<table>
<tr>
<td>';
xheadline($judul);
echo '</td>
<td>[<a href="../index.php" title="Daftar Kelas">Daftar Kelas</a>]</td>
</table>';




//tapel
$qpel = mysql_query("SELECT * FROM m_tapel ".
						"WHERE kd = '$tapelkd'");
$rpel = mysql_fetch_assoc($qpel);
$pel_thn1 = nosql($rpel['tahun1']);
$pel_thn2 = nosql($rpel['tahun2']);

//kelas
$qkel = mysql_query("SELECT * FROM m_kelas ".
						"WHERE kd = '$kelkd'");
$rkel = mysql_fetch_assoc($qkel);
$kel_kelas = nosql($rkel['kelas']);

//program
$qpro = mysql_query("SELECT * FROM m_program ".
						"WHERE kd = '$progkd'");				
$rpro = mysql_fetch_assoc($qpro);
$pro_program = balikin($rpro['program']);

//nek null
if (empty($pro_program))
	{
	$pro_program = "-";
	}


//ruang
$qru = mysql_query("SELECT * FROM m_ruang ".
						"WHERE kd = '$rukd'");
$rru = mysql_fetch_assoc($qru);
$ru_ruang = balikin($rru['ruang']);

				
//query data siswa
$p = new Pager();
$start = $p->findStart($limit);
$sqlcount = "SELECT m_siswa.*, m_siswa.kd AS mskd, ".
				"siswa_kelas.*, siswa_kelas.kd AS skkd ".
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



echo '<table bgcolor="'.$warnaover.'" width="100%" cellspacing="0" cellpadding="3">
<tr valign="top">
<td>
<strong>Tahun Pelajaran :</strong> '.$pel_thn1.'/'.$pel_thn2.', 
<strong>Kelas :</strong> '.$kel_kelas.',
<strong>Program :</strong> '.$pro_program.',
<strong>Ruang :</strong> '.$ru_ruang.'
</td>
</tr>
</table>
<br>

<table width="600" border="1" cellspacing="0" cellpadding="3">
<tr valign="top" bgcolor="'.$warnaheader.'">
<td width="20" align="center"><strong>No.</strong></td>
<td width="50" align="center"><strong>NIS</strong></td>
<td align="center"><strong>Nama Siswa</strong></td>
<td width="50" align="center"><strong>Absensi</strong></td>
<td width="50" align="center"><strong>Keuangan</strong></td>
<td width="50" align="center"><strong>Nilai</strong></td>
<td width="50" align="center"><strong>Raport</strong></td>
</tr>';

//nek gak null
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
	
		//nilai
		$y_mskd = nosql($data['mskd']);
		$y_skkd = nosql($data['skkd']);
		$y_no = nosql($data['no_absen']);
		$y_nis = nosql($data['nis']);
		$y_nama = balikin($data['nama']);
		
		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td>'.$y_no.'</td>
		<td>'.$y_nis.'</td>
		<td>'.$y_nama.'</td>
		<td>
		<a href="absensi.php?swkd='.$y_mskd.'&skkd='.$y_skkd.'&tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&rukd='.$rukd.'&progkd='.$progkd.'" 
		title="Tahun Pelajaran = '.$pel_thn1.'/'.$pel_thn2.', Kelas = '.$kel_kelas.', Ruang = '.$ru_ruang.', Program = '.$pro_program.'">
		<img src="'.$sumber.'/img/preview.gif" width="16" height="16" border="0"></a>
		</td>
		<td>
		<a href="keuangan.php?swkd='.$y_mskd.'&skkd='.$y_skkd.'&tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&rukd='.$rukd.'&progkd='.$progkd.'" 
		title="Tahun Pelajaran = '.$pel_thn1.'/'.$pel_thn2.', Kelas = '.$kel_kelas.', Ruang = '.$ru_ruang.', Program = '.$pro_program.'">
		<img src="'.$sumber.'/img/preview.gif" width="16" height="16" border="0"></a>
		</td>
		<td>
		<a href="nilai.php?swkd='.$y_mskd.'&skkd='.$y_skkd.'&tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&rukd='.$rukd.'&progkd='.$progkd.'" 
		title="Tahun Pelajaran = '.$pel_thn1.'/'.$pel_thn2.', Kelas = '.$kel_kelas.', Ruang = '.$ru_ruang.', Program = '.$pro_program.'">
		<img src="'.$sumber.'/img/preview.gif" width="16" height="16" border="0"></a>
		</td>
		<td>
		<a href="raport.php?swkd='.$y_mskd.'&skkd='.$y_skkd.'&tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&rukd='.$rukd.'&progkd='.$progkd.'" 
		title="Tahun Pelajaran = '.$pel_thn1.'/'.$pel_thn2.', Kelas = '.$kel_kelas.', Ruang = '.$ru_ruang.', Program = '.$pro_program.'">
		<img src="'.$sumber.'/img/preview.gif" width="16" height="16" border="0"></a>
		</td>
		</tr>';
		}
	while ($data = mysql_fetch_assoc($result));
	}

echo '</table>
<br><br><br>';
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//isi
$isi = ob_get_contents();
ob_end_clean();

require("../../inc/niltpl.php");
?>