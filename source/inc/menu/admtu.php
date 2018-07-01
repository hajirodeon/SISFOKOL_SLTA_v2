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
$maine = "$sumber/admtu/index.php";

	
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
<a href="'.$sumber.'/admtu/s/pass.php" title="Ganti Password">Ganti Password</a>
</LI>
</UL>';
//setting ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





//master ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<LI>
<A href="#">MASTER&nbsp;&nbsp;</A>  
<UL>';
	
echo '<LI>
<a href="'.$sumber.'/admtu/m/tapel.php" title="Tahun Pelajaran">Tahun Pelajaran</a>
<a href="'.$sumber.'/admtu/m/ruang.php" title="Ruang">Ruang</a>
<a href="'.$sumber.'/admtu/m/pegawai.php" title="Pegawai">Pegawai</a>
</LI>
</UL>';
//master ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





//akademik //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<LI>
<A href="#">AKADEMIK&nbsp;&nbsp;</A>  
<UL>';
	
echo '<LI>
<a href="'.$sumber.'/admtu/akad/program.php" title="Program">Program</a>
<a href="'.$sumber.'/admtu/akad/aspek.php" title="Aspek">Aspek</a>
<a href="'.$sumber.'/admtu/akad/mapel.php" title="Mata Pelajaran">Mata Pelajaran</a>
<a href="'.$sumber.'/admtu/akad/mapel_kelas.php" title="Mata Pelajaran per Kelas">Mata Pelajaran per Kelas</a>
<a href="'.$sumber.'/admtu/akad/spek_mapel.php" title="Aspek Mata Pelajaran">Aspek Mata Pelajaran</a>
<a href="'.$sumber.'/admtu/akad/jml_ul.php" title="Jumlah Ulangan">Jumlah Ulangan</a>
<a href="'.$sumber.'/admtu/akad/guru.php" title="Guru">Guru</a>
<a href="'.$sumber.'/admtu/akad/guru_mapel_r.php" title="Guru Mata Pelajaran per Ruang">Guru Mata Pelajaran per Ruang</a>
<a href="'.$sumber.'/admtu/akad/guru_mapel_tmp.php" title="Penempatan Guru Mengajar">Penempatan Guru Mengajar</a>
<a href="'.$sumber.'/admtu/akad/wk.php" title="Wali Kelas">Wali Kelas</a>
<a href="'.$sumber.'/admtu/akad/siswa.php" title="Data Siswa">Data Siswa</a>
<a href="'.$sumber.'/admtu/akad/siswa_tmp_k.php" title="Penempatan Siswa -> Kelas">Penempatan Siswa -> Kelas</a>
<a href="'.$sumber.'/admtu/akad/siswa_tmp_p.php" title="Penempatan Siswa -> Program">Penempatan Siswa -> Program</a>
<a href="'.$sumber.'/admtu/akad/siswa_tmp_r.php" title="Penempatan Siswa -> Ruang">Penempatan Siswa -> Ruang</a>
</LI>
</UL>';
//akademik //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





//jadwal ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<LI>
<A href="#">JADWAL&nbsp;&nbsp;</A>  
<UL>';
	
echo '<LI>
<a href="'.$sumber.'/admtu/jwal/pel.php" title="Jadwal Pelajaran">Jadwal Pelajaran</a>
<a href="'.$sumber.'/admtu/jwal/guru.php" title="Jadwal Guru Mengajar">Jadwal Guru Mengajar</a>
</LI>
</UL>';
//jadwal ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





//penilaian /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<LI>
<A href="#">PENILAIAN&nbsp;&nbsp;</A>  
<UL>';
	
echo '<LI>
<a href="'.$sumber.'/admtu/nil/p_aspek.php" title="Nilai Per Aspek">Nilai Per Aspek</a>
</LI>
</UL>';
//penilaian /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





//keuangan //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<LI>
<A href="#">KEUANGAN&nbsp;&nbsp;</A>  
<UL>';
	
echo '<LI>
<a href="'.$sumber.'/admtu/keu/set.php" title="Set Keuangan">Set Keuangan</a>
<a href="'.$sumber.'/admtu/keu/siswa.php" title="Keuangan Siswa">Keuangan Siswa</a>
</LI>
</UL>';
//keuangan //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





//absensi ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<LI>
<A href="#">ABSENSI&nbsp;&nbsp;</A>  
<UL>';
	
echo '<LI>
<a href="'.$sumber.'/admtu/abs/harian.php" title="Absensi Harian Siswa">Absensi Harian Siswa</a>
<a href="'.$sumber.'/admtu/abs/rekap_kelas.php" title="Rekap Absensi per Kelas Ruang">Rekap Absensi Per Kelas Ruang</a>
</LI>
</UL>';
//absensi ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





//inventaris ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<LI>
<A href="#">INVENTARIS&nbsp;&nbsp;</A>  
<UL>';
	
echo '<LI>
<a href="'.$sumber.'/admtu/inv/pengadaan.php" title="Pengadaan">Pengadaan</a>
<a href="'.$sumber.'/admtu/inv/alat.php" title="Alat Peraga">Alat Peraga</a>
<a href="'.$sumber.'/admtu/inv/lab.php" title="Laboratorium">Laboratorium</a>
<a href="'.$sumber.'/admtu/inv/peng_alat.php" title="Penggunaan Alat Peraga">Penggunaan Alat Peraga</a>
<a href="'.$sumber.'/admtu/inv/peng_lab.php" title="Penggunaan Lab.">Penggunaan Lab.</a>
</LI>
</UL>';
//inventaris ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





//laporan ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<LI>
<A href="#">LAPORAN&nbsp;&nbsp;</A>  
<UL>';
	
echo '<LI>
<a href="'.$sumber.'/admtu/lap/r_p_smt.php" title="Koleksi Nilai Raport : Per Semester">Koleksi Nilai Raport : Per Semester</a>
<a href="'.$sumber.'/admtu/lap/r_s_smt.php" title="Nilai Raport Siswa : Per Semester">Nilai Raport Siswa : Per Semester</a>
<a href="'.$sumber.'/admtu/lap/u_siswa_gedung.php" title="Keuangan Siswa : Uang Gedung">Keuangan Siswa : Uang Gedung</a>
<a href="'.$sumber.'/admtu/lap/u_siswa_ujian.php" title="Keuangan Siswa : Uang Ujian">Keuangan Siswa : Uang Ujian</a>
<a href="'.$sumber.'/admtu/lap/u_siswa_spp.php" title="Keuangan Siswa : Uang SPP">Keuangan Siswa : Uang SPP</a>
<a href="'.$sumber.'/admtu/lap/u_siswa_lain.php" title="Keuangan Siswa : Uang Lain-Lain">Keuangan Siswa : Uang Lain-Lain</a>
<a href="'.$sumber.'/admtu/lap/abs_rekap_kelas.php" title="Rekap Absensi per Kelas Ruang">Rekap Absensi per Kelas Ruang</a>
</LI>
</UL>';
//laporan ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





//logout ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '</td>
<td width="10%" align="right">
<LI>
<A href="'.$sumber.'/admtu/logout.php" title="Logout / KELUAR">LogOut</A>
</LI>
</td>
</tr>
</table>
</DIV>';
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>