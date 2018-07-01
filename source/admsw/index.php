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
require("../inc/config.php"); 
require("../inc/fungsi.php"); 
require("../inc/koneksi.php"); 
require("../inc/cek/admsw.php"); 
$tpl = LoadTpl("../template/index.html"); 

nocache;

//nilai
$filenya = "index.php";
$judul = "Detail Siswa";
$judulku = "[$siswa_session : $nis2_session.$nm2_session] ==> $judul";
$juduli = $judul;




//isi *START
ob_start();

//js
require("../inc/js/swap.js"); 
require("../inc/menu/admsw.php");
xheadline($judul);

//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//data ne
$qdty = mysql_query("SELECT siswa_kelas.*, siswa_kelas.kd AS skkd, ".
						"m_siswa.*, m_siswa.kd AS mskd ".
						"FROM siswa_kelas, m_siswa ".
						"WHERE siswa_kelas.kd_siswa = m_siswa.kd ".
						"AND m_siswa.kd = '$kd2_session'");
$rdty = mysql_fetch_assoc($qdty);
$tdty = mysql_num_rows($qdty);


echo '<table border="1" cellspacing="0" cellpadding="3">
<tr align="center" bgcolor="'.$warnaheader.'">
<td width="50"><strong>Tahun Pelajaran</strong></td>
<td width="50"><strong>Kelas</strong></td>
<td width="100"><strong>Program</strong></td>
<td width="50"><strong>Ruang</strong></td>
<td width="50"><strong>Keuangan</strong></td>
<td width="50"><strong>Absensi</strong></td>
<td width="50"><strong>Nilai</strong></td>
<td width="50"><strong>Jadwal</strong></td>
</tr>';

//nek gak null
if ($tdty != 0)
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
		$dty_swkd = nosql($rdty['mskd']);
		$dty_tapelkd = nosql($rdty['kd_tapel']);
		$dty_kelkd = nosql($rdty['kd_kelas']);
		$dty_progkd = nosql($rdty['kd_program']);
		$dty_rukd = nosql($rdty['kd_ruang']);
		
		//tapel
		$qypel = mysql_query("SELECT * FROM m_tapel ".
								"WHERE kd = '$dty_tapelkd'");
		$rypel = mysql_fetch_assoc($qypel);
		$ypel_thn1 = nosql($rypel['tahun1']);
		$ypel_thn2 = nosql($rypel['tahun2']);		
		
		//kelas
		$qykel = mysql_query("SELECT * FROM m_kelas ".
								"WHERE kd = '$dty_kelkd'");
		$rykel = mysql_fetch_assoc($qykel);
		$ykel_kelas = nosql($rykel['kelas']);
		
		//program
		$qyprog = mysql_query("SELECT * FROM m_program ".
								"WHERE kd = '$dty_progkd'");
		$ryprog = mysql_fetch_assoc($qyprog);
		$yprog_prog = balikin($ryprog['program']);
		
		//nek null
		if (empty($yprog_prog))
			{
			$yprog_prog = "-";
			}


		//ruang
		$qyru = mysql_query("SELECT * FROM m_ruang ".
								"WHERE kd = '$dty_rukd'");
		$ryru = mysql_fetch_assoc($qyru);
		$yru_ru = balikin($ryru['ruang']);	
		
		

		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td>'.$ypel_thn1.'/'.$ypel_thn2.'</td>
		<td>'.$ykel_kelas.'</td>
		<td>'.$yprog_prog.'</td>
		<td>'.$yru_ru.'</td>
		<td>
		<a href="d/keu.php?tapelkd='.$dty_tapelkd.'&kelkd='.$dty_kelkd.'&rukd='.$dty_rukd.'&progkd='.$dty_progkd.'" 
		title="KEUANGAN. Tahun Pelajaran = '.$ypel_thn1.'/'.$ypel_thn2.', Kelas = '.$ykel_kelas.', Ruang = '.$yru_ru.', Program = '.$yprog_prog.'">
		<img src="'.$sumber.'/img/preview.gif" width="16" height="16" border="0">
		</td>
		<td>
		<a href="d/abs.php?tapelkd='.$dty_tapelkd.'&kelkd='.$dty_kelkd.'&rukd='.$dty_rukd.'&progkd='.$dty_progkd.'" 
		title="ABSENSI. Tahun Pelajaran = '.$ypel_thn1.'/'.$ypel_thn2.', Kelas = '.$ykel_kelas.', Ruang = '.$yru_ru.', Program = '.$yprog_prog.'">
		<img src="'.$sumber.'/img/preview.gif" width="16" height="16" border="0"></a>
		</td>
		<td>
		<a href="d/nil.php?tapelkd='.$dty_tapelkd.'&kelkd='.$dty_kelkd.'&rukd='.$dty_rukd.'&progkd='.$dty_progkd.'" 
		title="NILAI. Tahun Pelajaran = '.$ypel_thn1.'/'.$ypel_thn2.', Kelas = '.$ykel_kelas.', Ruang = '.$yru_ru.', Program = '.$yprog_prog.'">
		<img src="'.$sumber.'/img/preview.gif" width="16" height="16" border="0"></a>
		</td>
		<td>
		<a href="d/jadwal.php?tapelkd='.$dty_tapelkd.'&kelkd='.$dty_kelkd.'&rukd='.$dty_rukd.'&progkd='.$dty_progkd.'" 
		title="JADWAL PELAJARAN. Tahun Pelajaran = '.$ypel_thn1.'/'.$ypel_thn2.', Kelas = '.$ykel_kelas.', Ruang = '.$yru_ru.', Program = '.$yprog_prog.'">
		<img src="'.$sumber.'/img/preview.gif" width="16" height="16" border="0"></a>
		</td>
		</tr>';
		}
	while ($rdty = mysql_fetch_assoc($qdty));
	}

echo '</table>
<br><br><br>';
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//isi
$isi = ob_get_contents();
ob_end_clean();

require("../inc/niltpl.php");
?>