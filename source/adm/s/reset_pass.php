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
require("../../inc/class/paging.php"); 
require("../../inc/cek/adm.php"); 
$tpl = LoadTpl("../../template/index.html"); 

nocache;

//nilai
$filenya = "reset_pass.php";
$diload = "document.formx.akses.focus();";
$judul = "Reset Password";
$judulku = "[$adm_session] ==> $judul";
$juduli = $judul;
$tpkd = nosql($_REQUEST['tpkd']);
$tipe = cegah($_REQUEST['tipe']);







//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($HTTP_POST_VARS['btnRST'])
	{
	$tpkd = nosql($_POST['tpkd']);
	$tipe = cegah($_POST['tipe']);
	$page = nosql($_POST['page']);
	if ((empty($page)) OR ($page == "0"))
		{
		$page = "1";
		}
	
	
	//nek siswa .........................................................................................................................
	if ($tpkd == "tp01")
		{
		$tapelkd = nosql($_POST['tapelkd']);
		$kelkd = nosql($_POST['kelkd']);
		$progkd = nosql($_POST['progkd']);
		$item = nosql($_POST['item']);
		$passbarux = md5($passbaru);
		$ke = "$filenya?tpkd=$tpkd&tipe=$tipe&tapelkd=$tapelkd&kelkd=$kelkd&progkd=$progkd&page=$page";
		
		//cek
		//nek blm dipilih
		if (empty($item))
			{
			$pesan = "Reset Password Gagal. Anda Belum Memilih Siswa.";
			pekem($pesan,$ke);
			}
		else
			{
			//query
			$qsuk = mysql_query("SELECT * FROM m_siswa ".
									"WHERE kd = '$item'");
			$rsuk = mysql_fetch_assoc($qsuk);
			$suk_nis = nosql($rsuk['nis']);
			$suk_nm = balikin($rsuk['nama']);
			$pesan = "NIS : $suk_nis, Nama : $suk_nm. Password Baru : $passbaru";
					
			//reset password
			mysql_query("UPDATE m_siswa SET passwordx = '$passbarux', ".
							"postdate = '$today' ".
							"WHERE kd = '$item'");
			
			//re-direct		
			pekem($pesan,$ke);
			}
		}
	//...................................................................................................................................
	
	


	
	//nek guru ..........................................................................................................................
	if ($tpkd == "tp02")
		{
		$item = nosql($_POST['item']);
		$passbarux = md5($passbaru);
		$ke = "$filenya?tpkd=$tpkd&tipe=$tipe&page=$page";
				
		//cek
		//nek null
		if (empty($item))
			{
			$pesan = "Reset Password Gagal. Anda Belum Memilih Guru.";
			pekem($pesan,$ke);
			}
		else
			{		
			//query
			$qsuk = mysql_query("SELECT * FROM m_pegawai ".
									"WHERE kd = '$item'");
			$rsuk = mysql_fetch_assoc($qsuk);
			$suk_nip = nosql($rsuk['nip']);
			$suk_nm = balikin($rsuk['nama']);
			$pesan = "NIP : $suk_nip, Nama : $suk_nm. Password Baru : $passbaru";
					
			//reset password
			mysql_query("UPDATE m_pegawai SET passwordx = '$passbarux', ".
							"postdate = '$today' ".
							"WHERE kd = '$item'");
			
			//re-direct		
			pekem($pesan,$ke);	
			}
		}
	//...................................................................................................................................





	//nek walikelas .....................................................................................................................
	if ($tpkd == "tp03")
		{
		$tapelkd = nosql($_POST['tapelkd']);
		$kelkd = nosql($_POST['kelkd']);
		$progkd = nosql($_POST['progkd']);
		$item = nosql($_POST['item']);
		$passbarux = md5($passbaru);
		$ke = "$filenya?tpkd=$tpkd&tipe=$tipe&tapelkd=$tapelkd&kelkd=$kelkd&progkd=$progkd&page=$page";
		
		//cek
		//nek blm dipilih
		if (empty($item))
			{
			$pesan = "Reset Password Gagal. Anda Belum Memilih Wali Kelas.";
			pekem($pesan,$ke);
			}
		else
			{
			//query
			$qsuk = mysql_query("SELECT * FROM m_pegawai ".
									"WHERE kd = '$item'");
			$rsuk = mysql_fetch_assoc($qsuk);
			$suk_nip = nosql($rsuk['nip']);
			$suk_nm = balikin($rsuk['nama']);
			$pesan = "NIS : $suk_nip, Nama : $suk_nm. Password Baru : $passbaru";
					
			//reset password
			mysql_query("UPDATE m_pegawai SET passwordx = '$passbarux', ".
							"postdate = '$today' ".
							"WHERE kd = '$item'");
			
			//re-direct		
			pekem($pesan,$ke);
			}
		}
	//...................................................................................................................................
	
	

	
	
	//nek kepala sekolah ................................................................................................................
	if ($tpkd == "tp04")
		{
		//nilai
		$nip = nosql($_POST['nip']);
		$nama = cegah2($_POST['nama']);
		$passbarux = md5($passbaru);
		$pesan = "NIP : $nip, Nama : $nama. Password Baru : $passbaru";
		$ke = "$filenya?tpkd=$tpkd&tipe=$tipe&page=$page";
		
				
		//reset password
		mysql_query("UPDATE admin_ks SET usernamex = '$nip', ".
						"passwordx = '$passbarux', ".
						"nip = '$nip', ".
						"nama = '$nama', ".
						"postdate = '$today'");
		
		//re-direct		
		pekem($pesan,$ke);			
		}
	//...................................................................................................................................





	//nek tata usaha ....................................................................................................................
	if ($tpkd == "tp05")
		{
		//nilai
		$nip = nosql($_POST['nip']);
		$nama = cegah2($_POST['nama']);
		$passbarux = md5($passbaru);
		$pesan = "NIP : $nip, Nama : $nama. Password Baru : $passbaru";
		$ke = "$filenya?tpkd=$tpkd&tipe=$tipe&page=$page";
		
				
		//reset password
		mysql_query("UPDATE admin_tu SET usernamex = '$nip', ".
						"passwordx = '$passbarux', ".
						"nip = '$nip', ".
						"nama = '$nama', ".
						"postdate = '$today'");
		
		//re-direct		
		pekem($pesan,$ke);			
		}
	//...................................................................................................................................
	}	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




//isi *START
ob_start();

//js
require("../../inc/js/jumpmenu.js");
require("../../inc/js/swap.js");
require("../../inc/menu/adm.php");
xheadline($judul);

//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form action="'.$filenya.'" method="post" name="formx">
<table bgcolor="'.$warnaover.'" width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td>
Akses : ';
echo "<select name=\"akses\" onChange=\"MM_jumpMenu('self',this,0)\">";
echo '<option value="'.$filenya.'?tpkd='.$tpkd.'" selected>'.$tipe.'</option>
<option value="'.$filenya.'?tpkd=tp01&tipe=Siswa">Siswa</option>
<option value="'.$filenya.'?tpkd=tp02&tipe=Guru">Guru</option>
<option value="'.$filenya.'?tpkd=tp03&tipe=Wali Kelas">Wali Kelas</option>
<option value="'.$filenya.'?tpkd=tp04&tipe=Kepala Sekolah">Kepala Sekolah</option>
<option value="'.$filenya.'?tpkd=tp05&tipe=Tata Usaha">Tata Usaha</option>
</select>
</td>
</tr>
</table>

<p>';
//nek siswa /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($tpkd == "tp01")
	{
	//nilai
	$tapelkd = nosql($_REQUEST['tapelkd']);
	$kelkd = nosql($_REQUEST['kelkd']);
	$progkd = nosql($_REQUEST['progkd']);
	$page = nosql($_REQUEST['page']);
	if ((empty($page)) OR ($page == "0"))
		{
		$page = "1";
		}
	
	$ke = "$filenya?tpkd=$tpkd&tipe=$tipe&tapelkd=$tapelkd&kelkd=$kelkd&progkd=$progkd&page=$page";



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
	
	
	
	//view
	echo 'Tahun Pelajaran : ';
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
		$tp_kd = nosql($rowtp['kd']);
		$tp_thn1 = nosql($rowtp['tahun1']);
		$tp_thn2 = nosql($rowtp['tahun2']);			
		
		echo '<option value="'.$filenya.'?tpkd='.$tpkd.'&tipe='.$tipe.'&tapelkd='.$tp_kd.'">'.$tp_thn1.'/'.$tp_thn2.'</option>';
		}
	while ($rowtp = mysql_fetch_assoc($qtp));

	echo '</select>, 

	Kelas : ';
	echo "<select name=\"kelas\" onChange=\"MM_jumpMenu('self',this,0)\">";
	
	//terpilih
	$qbtx = mysql_query("SELECT * FROM m_kelas ".
							"WHERE kd = '$kelkd'");
	$rowbtx = mysql_fetch_assoc($qbtx);
	$btx_kd = nosql($rowbtx['kd']);
	$btx_kelas = nosql($rowbtx['kelas']);
	
	
	echo '<option value="'.$btx_kd.'">'.$btx_kelas.'</option>';
	
	$qbt = mysql_query("SELECT * FROM m_kelas ".
						"WHERE kd <> '$kelkd' ".
						"ORDER BY no ASC");
	$rowbt = mysql_fetch_assoc($qbt);
					
	do
		{
		$bt_kd = nosql($rowbt['kd']);
		$bt_kelas = nosql($rowbt['kelas']);	
		
		echo '<option value="'.$filenya.'?tpkd='.$tpkd.'&tipe='.$tipe.'&tapelkd='.$tapelkd.'&kelkd='.$bt_kd.'">'.$bt_kelas.'</option>';
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
		
		echo '<option value="'.$filenya.'?tpkd='.$tpkd.'&tipe='.$tipe.'&tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&progkd='.$prg_kd.'">'.$prg_prog.'</option>';
		}
	while ($rowprg = mysql_fetch_assoc($qprg));

	echo '</select>
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
		//data ne....
		$p = new Pager();
		$start = $p->findStart($limit);
	
		$sqlcount = "SELECT m_siswa.*, siswa_kelas.* ".
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
		<td width="50" valign="top"><strong>NIS</strong></td>
		<td valign="top"><strong>Nama</strong></td>
		<td width="150" valign="top"><strong>Postdate</strong></td>
	    </tr>';
		
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
				
				$kd = nosql($data['kd']);
				$kd_kelas = nosql($data['kd_kelas']);
				$nis = nosql($data['nis']);
				$nama = balikin($data['nama']);
				$postdate = $data['postdate'];
				
				//nek null
				if ($postdate == "0000-00-00 00:00:00")
					{
					$postdate = "-";
					}
				
				echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
				echo '<td><input name="kd'.$nomer.'" type="hidden" value="'.$kd.'">
				<input type="radio" name="item" value="'.$kd.'">
				</td>
				<td valign="top">
				'.$nis.'
				</td>
				<td valign="top">
				'.$nama.'
				</td>
				<td valign="top">
				'.$postdate.'
				</td>
				</tr>';
		  		}
			while ($data = mysql_fetch_assoc($result));
			}
		
		echo '</table>
		<table width="500" border="0" cellspacing="0" cellpadding="3">
	    <tr>
		<td width="100">
		<input name="btnRST" type="submit" value="RESET">
		<input name="jml" type="hidden" value="'.$limit.'">
		<input name="tapelkd" type="hidden" value="'.$tapelkd.'">
		<input name="kelkd" type="hidden" value="'.$kelkd.'">
		<input name="progkd" type="hidden" value="'.$progkd.'">
		<input name="tpkd" type="hidden" value="'.$tpkd.'">
		<input name="tipe" type="hidden" value="'.$tipe.'">
		<input name="page" type="hidden" value="'.$page.'">
		<input name="total" type="hidden" value="'.$count.'">
		</td>
		<td align="right"><font color="#FF0000"><strong>'.$count.'</strong></font> Data '.$pagelist.'</td>
	    </tr>
		</table>
		<br>
		<br>';
		}
	}





//nek guru //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($tpkd == "tp02")
	{
	//nilai
	$page = nosql($_REQUEST['page']);
	if ((empty($page)) OR ($page == "0"))
		{
		$page = "1";
		}
	
	$ke = "$filenya?tpkd=$tpkd&tipe=$tipe&page=$page";
	
	
	//data ne....
	$p = new Pager();
	$start = $p->findStart($limit);
	
	$sqlcount = "SELECT DISTINCT(m_guru.kd_pegawai) AS pegkd ".
					"FROM m_guru, m_pegawai ".
					"WHERE m_guru.kd_pegawai = m_pegawai.kd ".
					"ORDER BY m_pegawai.nip ASC";
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
	<td width="100" valign="top"><strong>NIP</strong></td>
	<td valign="top"><strong>Nama</strong></td>
	<td width="150" valign="top"><strong>Postdate</strong></td>
    </tr>';
		
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
			
			//nilai
			$kd = nosql($data['pegkd']);
			
			//detail-nya
			$qdt = mysql_query("SELECT * FROM m_pegawai ".
									"WHERE kd = '$kd'");
			$rdt = mysql_fetch_assoc($qdt);
			$dt_nip = nosql($rdt['nip']);
			$dt_nama = balikin($rdt['nama']);
			$dt_postdate = $rdt['postdate'];
			
			//nek null
			if ($dt_postdate == "0000-00-00 00:00:00")
				{
				$dt_postdate = "-";
				}
			
				
			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td><input name="kd'.$nomer.'" type="hidden" value="'.$kd.'">
			<input type="radio" name="item" value="'.$kd.'">
			</td>
			<td valign="top">
			'.$dt_nip.'
			</td>
			<td valign="top">
			'.$dt_nama.'
			</td>
			<td valign="top">
			'.$dt_postdate.'
			</td>
			</tr>';
	  		}
		while ($data = mysql_fetch_assoc($result));
		}
		
	echo '</table>
	<table width="500" border="0" cellspacing="0" cellpadding="3">
    <tr>
	<td width="100">
	<input name="btnRST" type="submit" value="RESET">
	<input name="jml" type="hidden" value="'.$limit.'">
	<input name="kd" type="hidden" value="'.$kd.'">
	<input name="tpkd" type="hidden" value="'.$tpkd.'">
	<input name="tipe" type="hidden" value="'.$tipe.'">
	<input name="page" type="hidden" value="'.$page.'">
	<input name="total" type="hidden" value="'.$count.'">
	</td>
	<td align="right"><font color="#FF0000"><strong>'.$count.'</strong></font> Data '.$pagelist.'</td>
    </tr>
	</table>
	<br>
	<br>';
	}




//nek walikelas /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($tpkd == "tp03")
	{
	//nilai
	$tapelkd = nosql($_REQUEST['tapelkd']);
	$kelkd = nosql($_REQUEST['kelkd']);
	$progkd = nosql($_REQUEST['progkd']);
	$page = nosql($_REQUEST['page']);
	if ((empty($page)) OR ($page == "0"))
		{
		$page = "1";
		}
	
	$ke = "$filenya?tpkd=$tpkd&tipe=$tipe&tapelkd=$tapelkd&kelkd=$kelkd&".
			"progkd=$progkd&page=$page";



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
	
	
	
	//view
	echo 'Tahun Pelajaran : ';
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
		$tp_kd = nosql($rowtp['kd']);
		$tp_thn1 = nosql($rowtp['tahun1']);
		$tp_thn2 = nosql($rowtp['tahun2']);			
		
		echo '<option value="'.$filenya.'?tpkd='.$tpkd.'&tipe='.$tipe.'&tapelkd='.$tp_kd.'">'.$tp_thn1.'/'.$tp_thn2.'</option>';
		}
	while ($rowtp = mysql_fetch_assoc($qtp));

	echo '</select>, 

	Kelas : ';
	echo "<select name=\"kelas\" onChange=\"MM_jumpMenu('self',this,0)\">";
	
	//terpilih
	$qbtx = mysql_query("SELECT * FROM m_kelas ".
							"WHERE kd = '$kelkd'");
	$rowbtx = mysql_fetch_assoc($qbtx);
	$btx_kd = nosql($rowbtx['kd']);
	$btx_kelas = nosql($rowbtx['kelas']);
	
	
	echo '<option value="'.$btx_kd.'">'.$btx_kelas.'</option>';
	
	$qbt = mysql_query("SELECT * FROM m_kelas ".
						"WHERE kd <> '$kelkd' ".
						"ORDER BY no ASC");
	$rowbt = mysql_fetch_assoc($qbt);
					
	do
		{
		$bt_kd = nosql($rowbt['kd']);
		$bt_kelas = nosql($rowbt['kelas']);	
		
		echo '<option value="'.$filenya.'?tpkd='.$tpkd.'&tipe='.$tipe.'&tapelkd='.$tapelkd.'&kelkd='.$bt_kd.'">'.$bt_kelas.'</option>';
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
		
		echo '<option value="'.$filenya.'?tpkd='.$tpkd.'&tipe='.$tipe.'&tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&progkd='.$prg_kd.'">'.$prg_prog.'</option>';
		}
	while ($rowprg = mysql_fetch_assoc($qprg));

	echo '</select>
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
		//data ne....
		$p = new Pager();
		$start = $p->findStart($limit);
	
		$sqlcount = "SELECT m_walikelas.*, m_pegawai.*, m_pegawai.kd AS mpkd, m_ruang.* ".
						"FROM m_walikelas, m_pegawai, m_ruang ".
						"WHERE m_walikelas.kd_pegawai = m_pegawai.kd ".
						"AND m_walikelas.kd_ruang = m_ruang.kd ".
						"AND m_walikelas.kd_tapel = '$tapelkd' ".
						"AND m_walikelas.kd_kelas = '$kelkd' ".
						"AND m_walikelas.kd_program = '$progkd' ".
						"ORDER BY m_ruang.ruang ASC";
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
		<td width="50" valign="top"><strong>Ruang</strong></td>
		<td width="50" valign="top"><strong>NIP.</strong></td>
		<td valign="top"><strong>Nama</strong></td>
		<td width="150" valign="top"><strong>Postdate</strong></td>
	    </tr>';
		
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
				
				$kd = nosql($data['mpkd']);
				$ruang = balikin($data['ruang']);
				$nip = nosql($data['nip']);
				$nama = balikin($data['nama']);
				$postdate = $data['postdate'];
				
				//nek null
				if ($postdate == "0000-00-00 00:00:00")
					{
					$postdate = "-";
					}
				
				echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
				echo '<td><input name="kd'.$nomer.'" type="hidden" value="'.$kd.'">
				<input type="radio" name="item" value="'.$kd.'">
				</td>
				<td valign="top">
				'.$ruang.'
				</td>
				<td valign="top">
				'.$nip.'
				</td>
				<td valign="top">
				'.$nama.'
				</td>
				<td valign="top">
				'.$postdate.'
				</td>
				</tr>';
		  		}
			while ($data = mysql_fetch_assoc($result));
			}
		
		echo '</table>
		<table width="500" border="0" cellspacing="0" cellpadding="3">
	    <tr>
		<td width="100">
		<input name="btnRST" type="submit" value="RESET">
		<input name="jml" type="hidden" value="'.$limit.'">
		<input name="tapelkd" type="hidden" value="'.$tapelkd.'">
		<input name="kelkd" type="hidden" value="'.$kelkd.'">
		<input name="progkd" type="hidden" value="'.$progkd.'">
		<input name="tpkd" type="hidden" value="'.$tpkd.'">
		<input name="tipe" type="hidden" value="'.$tipe.'">
		<input name="page" type="hidden" value="'.$page.'">
		<input name="total" type="hidden" value="'.$count.'">
		</td>
		<td align="right"><font color="#FF0000"><strong>'.$count.'</strong></font> Data '.$pagelist.'</td>
	    </tr>
		</table>
		<br>
		<br>';
		}
	}





//nek kepala sekolah ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($tpkd == "tp04")
	{
	//query
	$qminx = mysql_query("SELECT * FROM admin_ks");
	$rminx = mysql_fetch_assoc($qminx);
	
	$r_nip = nosql($rminx['nip']);
	$r_nama = balikin($rminx['nama']);
	$r_postdate = $rminx['postdate'];
	
	//nek null
	if ($r_postdate == "0000-00-00 00:00:00")
		{
		$r_postdate = "-";
		}
	
	

	//vie
	echo '<strong>NIP / Username : </strong><br>
	<input name="nip" type="text" value="'.$r_nip.'" size="10">
	<br>
	<br>
	<strong>Nama :</strong> <br>
	<input name="nama" type="text" value="'.$r_nama.'" size="30">
	<br>
	<br>
	<strong>Postdate :</strong> <br>
	<em>'.$r_postdate.'</em>
	<br>
	<br>
	<input name="tpkd" type="hidden" value="'.$tpkd.'">
	<input name="tipe" type="hidden" value="'.$tipe.'">
	<input name="btnRST" type="submit" value="SIMPAN & RESET">
	<br><br>';
	}






//nek tata usaha ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($tpkd == "tp05")
	{
	//query
	$qminx = mysql_query("SELECT * FROM admin_tu");
	$rminx = mysql_fetch_assoc($qminx);
	
	$r_nip = nosql($rminx['nip']);
	$r_nama = balikin($rminx['nama']);
	$r_postdate = $rminx['postdate'];

	//nek null
	if ($r_postdate == "0000-00-00 00:00:00")
		{
		$r_postdate = "-";
		}

	//vie
	echo '<strong>NIP / Username :</strong> <br>
	<input name="nip" type="text" value="'.$r_nip.'" size="10">
	<br>
	<br>
	<strong>Nama : </strong><br>
	<input name="nama" type="text" value="'.$r_nama.'" size="30">
	<br>
	<br>
	<strong>Postdate :</strong> <br>
	<em>'.$r_postdate.'</em>
	<br>
	<br>
	<input name="tpkd" type="hidden" value="'.$tpkd.'">
	<input name="tipe" type="hidden" value="'.$tipe.'">
	<input name="btnRST" type="submit" value="SIMPAN & RESET">
	<br><br>';
	}
echo '</p></form>
<br>
<br>
<br>';
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//isi
$isi = ob_get_contents();
ob_end_clean();

require("../../inc/niltpl.php");
?>