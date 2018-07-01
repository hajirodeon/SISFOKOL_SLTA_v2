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

require("../../inc/config.php"); 
require("../../inc/fungsi.php"); 
require("../../inc/koneksi.php"); 
require("../../inc/cek/admtu.php"); 
require("../../inc/class/paging2.php");
$tpl = LoadTpl("../../template/index.html"); 

nocache;

//nilai
$filenya = "pegawai.php";
$judul = "Pegawai";
$judulku = "[$tu_session : $nip5_session. $nm5_session] ==> $judul";
$diload = "document.formx.nip.focus();";
$judulx = $judul;

$s = nosql($_REQUEST['s']);
$kd = nosql($_REQUEST['kd']);
$ke = $filenya;
$page = nosql($_REQUEST['page']);
if ((empty($page)) OR ($page == "0"))
	{
	$page = "1";
	}


//nek enter, ke simpan
$x_enter = 'onKeyDown="var keyCode = event.keyCode;
if (keyCode == 13) 
	{
	document.formx.btnSMP.focus();
	}"';



//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//nek batal
if ($HTTP_POST_VARS['btnBTL'])
	{
	//re-direct
	xloc($ke);
	}
	


//nek edit
if ($s == "edit")
	{
	//nilai
	$kd = nosql($_REQUEST['kd']);
	
	//query
	$qnil = mysql_query("SELECT * FROM m_pegawai ".
							"WHERE kd = '$kd'");
	$rnil = mysql_fetch_assoc($qnil);
	
	$y_nip = nosql($rnil['nip']);
	$y_nama = balikin($rnil['nama']);
	}
	
	
	
	
	
	

//jika simpan
if ($HTTP_POST_VARS['btnSMP'])
	{
	//nilai
	$s = nosql($_POST['s']);
	$kd = nosql($_POST['kd']);
	$nip = nosql($_POST['nip']);
	$nama = cegah($_POST['nama']);
	
	
	//nek null
	if ((empty($nip)) OR (empty($nama)))
		{
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!";
		pekem($pesan,$ke);
		}
	else
		{
		//cek
		$qcc = mysql_query("SELECT * FROM m_pegawai ".
								"WHERE nip = '$nip'");
		$rcc = mysql_fetch_assoc($qcc);
		$tcc = mysql_num_rows($qcc);
		
		//nek lebih dari 1
		if ($tcc > 1)
			{
			$pesan = "Ditemukan Duplikasi NIP : $nip. Silahkan Diganti...!";
			pekem($pesan,$ke);
			}
		else
			{
			//nek edit
			if ($s == "edit")
				{
				//update
				mysql_query("UPDATE m_pegawai SET nip = '$nip', ".
								"nama = '$nama' ".
								"WHERE kd = '$kd'");

				//re-direct
				xloc($ke);	
				}
		
			//nek baru
			else if (empty($s))
				{
				//set akses
				$x_userx = $nip;
				$x_passx = md5($nip);				
				
				//insert
				mysql_query("INSERT INTO m_pegawai(kd, usernamex, passwordx, nip, nama) VALUES ".
								"('$x', '$x_userx', '$x_passx', '$nip', '$nama')");
		
				//re-direct
				xloc($ke);	
				}
			}
		}
	}
	
	
	

//jika hapus
if ($HTTP_POST_VARS['btnHPS'])
	{
	//ambil nilai
	$jml = nosql($_POST['jml']);
	$page = nosql($_REQUEST['page']);


	//query
	$p = new Pager();
	$start = $p->findStart($limit);
	
	$sqlcount = "SELECT * FROM m_pegawai ".
					"ORDER BY nip ASC";
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
	
		//del
		mysql_query("DELETE FROM m_pegawai ".
						"WHERE kd = '$kd'");
		}
	while ($data = mysql_fetch_assoc($result));
	
	
	//auto-kembali
	xloc($filenya);
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//isi *START
ob_start();

//query
$p = new Pager();
$start = $p->findStart($limit);

$sqlcount = "SELECT * FROM m_pegawai ".
				"ORDER BY nip ASC";
$sqlresult = $sqlcount;
			
$count = mysql_num_rows(mysql_query($sqlcount));
$pages = $p->findPages($count, $limit);
$result = mysql_query("$sqlresult LIMIT ".$start.", ".$limit);
$pagelist = $p->pageList($_GET['page'], $pages, $target);
$data = mysql_fetch_array($result);




//require
require("../../inc/js/jumpmenu.js"); 
require("../../inc/js/checkall.js"); 
require("../../inc/js/number.js"); 
require("../../inc/js/swap.js"); 
require("../../inc/menu/admtu.php"); 


//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form action="'.$filenya.'" method="post" name="formx">
<table width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td>';
xheadline($judul);
echo '</td>
</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="3">
<tr valign="top">
<td>
NIP : 
<input name="nip" type="text" value="'.$y_nip.'" size="10" onKeyPress="return numbersonly(this, event)" '.$x_enter.'>, 
Nama : 
<input name="nama" type="text" value="'.$y_nama.'" size="20" '.$x_enter.'> 
<input name="btnSMP" type="submit" value="SIMPAN">
<input name="btnBTL" type="submit" value="BATAL">
</td>
</tr>
</table>
<br>
<table width="500" border="1" cellspacing="0" cellpadding="3">
<tr bgcolor="'.$warnaheader.'">
<td width="1">&nbsp;</td>
<td width="1">&nbsp;</td>
<td width="50"><strong><font color="'.$warnatext.'">NIP</font></strong></td>
<td><strong><font color="'.$warnatext.'">Nama</font></strong></td>
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
			
		
		
		//nilai
		$nomer = $nomer + 1;
		$kd = nosql($data['kd']);
		$usernamex = nosql($data['usernamex']);
		$passwordx = nosql($data['passwordx']);
		$nip = nosql($data['nip']);
		$nama = balikin($data['nama']);

		//set akses
		if ((empty($usernamex)) OR (empty($passwordx)))
			{
			$x_userx = $nip;
			$x_passx = md5($nip);
			
			mysql_query("UPDATE m_pegawai SET usernamex = '$x_userx', ".
							"passwordx = '$x_passx' ".
							"WHERE kd = '$kd'");
			}
		
		
		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td><input name="kd'.$nomer.'" type="hidden" value="'.$kd.'">
		<input type="checkbox" name="item'.$nomer.'" value="'.$kd.'"> 
        </td>
		<td>
		<a href="'.$filenya.'?s=edit&kd='.$kd.'"><img src="'.$sumber.'/img/edit.gif" width="16" height="16" border="0"></a>
		</td>
		<td>'.$nip.'</td>
		<td>'.$nama.'</td>
        </tr>';				
		} 
	while ($data = mysql_fetch_assoc($result)); 
	}


echo '</table>
<table width="500" border="0" cellspacing="0" cellpadding="3">
<tr> 
<td width="300">
<input name="jml" type="hidden" value="'.$limit.'"> 
<input name="s" type="hidden" value="'.nosql($_REQUEST['s']).'"> 
<input name="kd" type="hidden" value="'.nosql($_REQUEST['kd']).'"> 
<input name="btnALL" type="button" value="SEMUA" onClick="checkAll('.$limit.')"> 
<input name="btnBTL" type="reset" value="BATAL"> 
<input name="btnHPS" type="submit" value="HAPUS"> 
</td>
<td align="right"><strong><font color="#FF0000">'.$count.'</font></strong> Data. '.$pagelist.'</td>
</tr>
</table>
</form>
<br>
<br>
<br>';
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//isi
$isi = ob_get_contents();
ob_end_clean();

require("../../inc/niltpl.php");
?>