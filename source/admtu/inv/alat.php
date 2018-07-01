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
$filenya = "alat.php";
$judul = "Alat Peraga";
$judulku = "[$tu_session : $nip5_session. $nm5_session] ==> $judul";
$judulx = $judul;
$s = nosql($_REQUEST['s']);
$page = nosql($_REQUEST['page']);
if ((empty($page)) OR ($page == "0"))
	{
	$page = "1";
	}

//focus
$diload = "document.formx.alat_peraga.focus();";



//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//nek batal
if ($HTTP_POST_VARS['btnBTL'])
	{
	//re-direct
	xloc($filenya);
	}
	
	
	
	
	
//jika edit
if ($s == "edit")
	{
	//nilai
	$kdx = nosql($_REQUEST['kd']);
	$page = nosql($_REQUEST['page']);
	
	//query
	$qx = mysql_query("SELECT * FROM inv_alat_peraga ".
						"WHERE kd = '$kdx'");
	$rowx = mysql_fetch_assoc($qx);
						
	$alat_peraga = balikin2($rowx['alat_peraga']);
	$jumlah = nosql($rowx['jumlah']);
	}
	
	
	
	
	
//jika simpan
if ($HTTP_POST_VARS['btnSMP'])
	{
	$s = nosql($_POST['s']);
	$kd = nosql($_POST['kd']);
	$page = nosql($_POST['page']);
	$alat_peraga = cegah2($_POST['alat_peraga']);
	$jumlah = nosql($_POST['jumlah']);
	
	//nek null
	if ((empty($alat_peraga)) OR (empty($alat_peraga)))
		{
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!!";
		pekem($pesan,$filenya);
		}
	else
		{ 
		//jika baru
		if (empty($s))
			{
			///cek
			$qcc = mysql_query("SELECT * FROM inv_alat_peraga ".
									"WHERE alat_peraga = '$alat_peraga'");
			$rcc = mysql_fetch_assoc($qcc);
			$tcc = mysql_num_rows($qcc);
					
			//nek ada
			if ($tcc != 0)
				{
				$pesan = "Alat Peraga : $alat_peraga, Sudah Ada. Silahkan Ganti Yang Lain...!!";
				pekem($pesan,$filenya);
				}
			else
				{
				//query
				mysql_query("INSERT INTO inv_alat_peraga(kd, alat_peraga, jumlah) VALUES ".
								"('$x', '$alat_peraga', '$jumlah')");		
			
				//re-direct
				xloc($filenya);
				}
			}
				
		//jika update
		else if ($s == "edit")
			{
			//query
			mysql_query("UPDATE inv_alat_peraga SET alat_peraga = '$alat_peraga', ".
							"jumlah = '$jumlah' ".
							"WHERE kd = '$kd'");		
			
			//re-direct
			$ke = "$filenya?page=$page";
			xloc($ke);
			}
		}	
	}





//jika hapus
if ($HTTP_POST_VARS['btnHPS'])
	{
	//ambil nilai
	$page = nosql($_POST['page']);
	
		
	//query
	$p = new Pager();
	$start = $p->findStart($limit);
	
	$sqlcount = "SELECT * FROM inv_alat_peraga ".
					"ORDER BY alat_peraga ASC";
	$sqlresult = $sqlcount;
				
	$count = mysql_num_rows(mysql_query($sqlcount));
	$pages = $p->findPages($count, $limit);
	$result = mysql_query("$sqlresult LIMIT ".$start.", ".$limit);
	$pagelist = $p->pageList($_GET['page'], $pages, $target);
	$data = mysql_fetch_array($result);

	//ambil semua
	do
		{
		//nilai
		$i = $i + 1;
		$yuk = "item";
		$yuhu = "$yuk$i";
		$kd = nosql($_POST["$yuhu"]);
	
		//del
		mysql_query("DELETE FROM inv_alat_peraga ".
						"WHERE kd = '$kd'");
		}
	while ($data = mysql_fetch_assoc($result));

	//auto-kembali
	$ke = "$filenya?page=$page";
	xloc($ke);
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//isi *START
ob_start();

//query
$p = new Pager();
$start = $p->findStart($limit);

$sqlcount = "SELECT * FROM inv_alat_peraga ".
					"ORDER BY alat_peraga ASC";
$sqlresult = $sqlcount;
			
$count = mysql_num_rows(mysql_query($sqlcount));
$pages = $p->findPages($count, $limit);
$result = mysql_query("$sqlresult LIMIT ".$start.", ".$limit);
$pagelist = $p->pageList($_GET['page'], $pages, $target);
$data = mysql_fetch_array($result);

//js
require("../../inc/js/checkall.js"); 
require("../../inc/js/swap.js"); 
require("../../inc/js/number.js");
require("../../inc/menu/admtu.php"); 
xheadline($judul);

//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form action="'.$filenya.'" method="post" name="formx">
<p> 
Nama Alat : 
<br>
<input name="alat_peraga" type="text" value="'.$alat_peraga.'" size="30">
<br><br>
Jumlah : 
<br>
<input name="jumlah" type="text" value="'.$jumlah.'" size="5" onKeyPress="return numbersonly(this, event)">
<br>
<input name="btnSMP" type="submit" value="SIMPAN">
<input name="btnBTL" type="submit" value="BATAL">
</p>
<table width="500" border="1" cellspacing="0" cellpadding="3">
<tr valign="top" bgcolor="'.$warnaheader.'">
<td width="1%">&nbsp;</td>
<td width="1%">&nbsp;</td>
<td><strong><font color="'.$warnatext.'">Nama Alat</font></strong></td>
<td width="50"><strong><font color="'.$warnatext.'">Jumlah</font></strong></td>
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
		$alat_peraga = balikin2($data['alat_peraga']);
		$jml = nosql($data['jumlah']);
		
		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td> 
		<input type="checkbox" name="item'.$nomer.'" value="'.$kd.'"> 
        </td>
		<td>
		<a href="'.$filenya.'?page='.$page.'&s=edit&kd='.$kd.'">
		<img src="'.$sumber.'/img/edit.gif" width="16" height="16" border="0">
		</a>
		</td>
		<td>'.$alat_peraga.'</td>
		<td>'.$jml.'</td>
        </tr>';				
		} 
	while ($data = mysql_fetch_assoc($result)); 
	}


echo '</table>
<table width="500" border="0" cellspacing="0" cellpadding="3">
<tr> 
<td width="263">
<input name="page" type="hidden" value="'.$page.'"> 
<input name="s" type="hidden" value="'.$s.'"> 
<input name="kd" type="hidden" value="'.$kdx.'"> 
<input name="btnALL" type="button" value="SEMUA" onClick="checkAll('.$limit.')"> 
<input name="btnBTL" type="submit" value="BATAL"> 
<input name="btnHPS" type="submit" value="HAPUS"> 
</td>
<td align="right">Total : <strong><font color="#FF0000">'.$count.'</font></strong> Data. '.$pagelist.'</td>
</tr>
</table>
</td>
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