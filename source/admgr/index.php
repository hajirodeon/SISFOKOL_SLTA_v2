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
require("../inc/cek/admgr.php"); 
$tpl = LoadTpl("../template/index.html"); 

nocache;

//nilai
$filenya = "index.php";
$judul = "Daftar Mata Pelajaran";
$judulku = "[$guru_session : $nip1_session.$nm1_session] ==> $judul";
$juduli = $judul;




//isi *START
ob_start();

require("../inc/js/swap.js"); 
require("../inc/menu/admgr.php");
xheadline($judul);

//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//data ne
$qdty = mysql_query("SELECT m_pegawai.*, m_guru.*, m_guru_mapel.*, m_guru_mapel.kd AS mgkd, ".
						"m_mapel.*, m_mapel.kd AS mpkd, ".
						"m_ruang.*, m_ruang.kd AS mrkd ".
						"FROM m_pegawai, m_guru, m_guru_mapel, m_mapel, m_ruang ".
						"WHERE m_guru_mapel.kd_mapel = m_mapel.kd ".
						"AND m_guru_mapel.kd_ruang = m_ruang.kd ".
						"AND m_guru_mapel.kd_guru = m_guru.kd ".
						"AND m_guru.kd_pegawai = m_pegawai.kd ".
						"AND m_pegawai.kd = '$kd1_session' ".
						"ORDER BY m_ruang.ruang ASC");
$rdty = mysql_fetch_assoc($qdty);
$tdty = mysql_num_rows($qdty);


echo '<table width="750" border="1" cellspacing="0" cellpadding="3">
<tr valign="top" bgcolor="'.$warnaheader.'">
<td width="150"><strong>Tahun Pelajaran</strong></td>
<td width="50"><strong>Kelas</strong></td>
<td width="100"><strong>Program</strong></td>
<td width="50"><strong>Ruang</strong></td>
<td><strong>Mata Pelajaran</strong></td>
<td width="50"><strong>Penilaian</strong></td>
<td width="50"><strong>Laporan</strong></td>
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
		$dty_gurkd = nosql($rdty['mgkd']);
		$dty_kelkd = nosql($rdty['kd_kelas']);
		$dty_tapelkd = nosql($rdty['kd_tapel']);
		$dty_progkd = nosql($rdty['kd_program']);
		$dty_rukd = nosql($rdty['kd_ruang']);
		$dty_pelkd = nosql($rdty['kd_mapel']);
		$dty_ruang = balikin($rdty['ruang']);
		$dty_pel = balikin($rdty['pel']);
		
		//tapel
		$qytapel = mysql_query("SELECT * FROM m_tapel ".
								"WHERE kd = '$dty_tapelkd'");
		$rytapel = mysql_fetch_assoc($qytapel);
		$ytapel_thn1 = nosql($rytapel['tahun1']);
		$ytapel_thn2 = nosql($rytapel['tahun2']);
				
		
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
		
		
		

		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td>'.$ytapel_thn1.'/'.$ytapel_thn2.'</td>
		<td>'.$ykel_kelas.'</td>
		<td>'.$yprog_prog.'</td>
		<td>'.$dty_ruang.'</td>
		<td>'.$dty_pel.'</td>
		<td>
		<a href="ajar/nilai.php?tapelkd='.$dty_tapelkd.'&kelkd='.$dty_kelkd.'&rukd='.$dty_rukd.'&progkd='.$dty_progkd.'&mapelkd='.$dty_pelkd.'" 
		title="Kelas = '.$ykel_kelas.', Ruang = '.$dty_ruang.', Program = '.$yprog_prog.', Pelajaran = '.$dty_pel.'">
		<img src="'.$sumber.'/img/edit.gif" width="16" height="16" border="0"></a>
		</td>
		<td>
		<a href="ajar/lap_k_p_smt.php?tapelkd='.$dty_tapelkd.'&kelkd='.$dty_kelkd.'&rukd='.$dty_rukd.'&progkd='.$dty_progkd.'&mapelkd='.$dty_pelkd.'" 
		title="Kelas = '.$ykel_kelas.', Ruang = '.$dty_ruang.', Program = '.$yprog_prog.', Pelajaran = '.$dty_pel.'">
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