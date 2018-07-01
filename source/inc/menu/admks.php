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


//nilai
$maine = "$sumber/admks/index.php";

	
//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<DIV class=horizontalcssmenu>
<UL id=cssmenu1>

<table width="100%" border="0" cellspacing="0" cellpadding="3">
<tr background="'.$sumber.'/img/menubg.gif">
<td>';
//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





//home //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<LI>
<a href="'.$maine.'" title="Home">Home</a>
</LI>';
//home //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





//setting ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<LI>
<A href="#">SETTING&nbsp;&nbsp;</A>  
<UL>';
	
echo '<LI>
<a href="'.$sumber.'/admks/s/pass.php" title="Ganti Password">Ganti Password</a>
</LI>
</UL>';
//setting ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





//master ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<LI>
<A href="#">DATA&nbsp;&nbsp;</A>  
<UL>';
	
echo '<LI>
<a href="'.$sumber.'/admks/m/guru.php" title="Guru">Guru</a>
<a href="'.$sumber.'/admks/m/mapel.php" title="Mata Pelajaran">Mata Pelajaran</a>
<a href="'.$sumber.'/admks/m/mapel_kelas.php" title="Mata Pelajaran per Kelas">Mata Pelajaran per Kelas</a>
<a href="'.$sumber.'/admks/m/guru_mapel_r.php" title="Guru Mata Pelajaran per Ruang">Guru Mata Pelajaran per Ruang</a>
<a href="'.$sumber.'/admks/m/guru_mapel_tmp.php" title="Penempatan Guru Mengajar">Penempatan Guru Mengajar</a>
<a href="'.$sumber.'/admks/m/wk.php" title="Wali Kelas">Wali Kelas</a>
<a href="'.$sumber.'/admks/m/spek_mapel.php" title="Aspek Mata Pelajaran">Aspek Mata Pelajaran</a>
<a href="'.$sumber.'/admks/m/jml_ul.php" title="Jumlah Ulangan">Jumlah Ulangan</a>
<a href="'.$sumber.'/admks/m/siswa.php" title="Data Siswa">Data Siswa</a>
<a href="'.$sumber.'/admks/m/siswa_tmp_k.php" title="Data Siswa per Kelas">Data Siswa per Kelas</a>
<a href="'.$sumber.'/admks/m/siswa_tmp_p.php" title="Data Siswa per Program">Data Siswa per Program</a>
<a href="'.$sumber.'/admks/m/siswa_tmp_r.php" title="Data Siswa per Ruang">Data Siswa per Ruang</a>
</LI>
</UL>';
//master ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





//jadwal ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<LI>
<a href="'.$sumber.'/admks/jwl/jadwal.php" title="Jadwal Pelajaran">Jadwal Pelajaran</a>
</LI>';
//jadwal ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





//laporan ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<LI>
<A href="#">LAPORAN&nbsp;&nbsp;</A>  
<UL>';
	
echo '<LI>
<a href="'.$sumber.'/admks/lap/r_p_smt.php" title="Koleksi Nilai Raport : Per Semester">Koleksi Nilai Raport : Per Semester</a>
<a href="'.$sumber.'/admks/lap/r_s_smt.php" title="Nilai Raport Siswa : Per Semester">Nilai Raport Siswa : Per Semester</a>
<a href="'.$sumber.'/admks/lap/u_siswa_gedung.php" title="Keuangan Siswa : Uang Gedung">Keuangan Siswa : Uang Gedung</a>
<a href="'.$sumber.'/admks/lap/u_siswa_ujian.php" title="Keuangan Siswa : Uang Ujian">Keuangan Siswa : Uang Ujian</a>
<a href="'.$sumber.'/admks/lap/u_siswa_spp.php" title="Keuangan Siswa : Uang SPP">Keuangan Siswa : Uang SPP</a>
<a href="'.$sumber.'/admks/lap/u_siswa_lain.php" title="Keuangan Siswa : Uang Lain-Lain">Keuangan Siswa : Uang Lain-Lain</a>
<a href="'.$sumber.'/admks/lap/abs_rekap_kelas.php" title="Rekap Absensi per Kelas Ruang">Rekap Absensi per Kelas Ruang</a>
</LI>
</UL>';
//laporan ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





//logout ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '</td>
<td width="10%" align="right">
<LI>
<A href="'.$sumber.'/admks/logout.php" title="Logout / KELUAR">LogOut</A>
</LI>
</td>
</tr>
</table>
</DIV>';
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>