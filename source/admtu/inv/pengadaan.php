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
require("../../inc/class/paging.php");
$tpl = LoadTpl("../../template/index.html"); 

nocache;

//nilai
$filenya = "pengadaan.php";
$judul = "Pengadaan";
$judulku = "[$tu_session : $nip5_session. $nm5_session] ==> $judul";
$judulx = $judul;
$s = nosql($_REQUEST['s']);
$pbln = nosql($_REQUEST['pbln']);
$pthn = nosql($_REQUEST['pthn']);
$page = nosql($_REQUEST['page']);
if ((empty($page)) OR ($page == "0"))
	{
	$page = "1";
	}



//focus
//nek nuul
if (empty($pbln))
	{
	$diload = "document.formx.p_bln.focus();";
	}
else if (empty($pthn))
	{
	$diload = "document.formx.p_thn.focus();";
	}




//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//nek hapus
if ($HTTP_POST_VARS['btnHPS'])
	{
	//ambil nilai
	$pbln = nosql($_POST['pbln']);
	$pthn = nosql($_POST['pthn']);
	$page = nosql($_POST['page']);
	
	//query
	$p = new Pager();
	$start = $p->findStart($limit);
	
	$sqlcount = "SELECT * FROM inv_pengadaan ".
					"WHERE round(DATE_FORMAT(tgl_terima, '%m')) = '$pbln' ".
					"AND round(DATE_FORMAT(tgl_terima, '%Y')) = '$pthn' ".
					"ORDER BY tgl_terima DESC";
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
	
		//del-item
		mysql_query("DELETE FROM inv_pengadaan_item ".
						"WHERE kd_pengadaan = '$kd'");
		
		//del
		mysql_query("DELETE FROM inv_pengadaan ".
						"WHERE kd = '$kd'");
		}
	while ($data = mysql_fetch_assoc($result));

	//auto-kembali
	$ke = "$filenya?pbln=$pbln&pthn=$pthn";
	xloc($ke);	
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//isi *START
ob_start();



//js
require("../../inc/js/jumpmenu.js"); 
require("../../inc/js/checkall.js"); 
require("../../inc/js/swap.js"); 
require("../../inc/menu/admtu.php"); 


//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form action="'.$filenya.'" method="post" name="formx">';
xheadline($judul);
echo ' [<a href="pengadaan_entry.php" title="Entry Pengadaan">Data Baru</a>]

<table bgcolor="'.$warnaover.'" width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td>
Bulan : ';
echo "<select name=\"p_bln\" onChange=\"MM_jumpMenu('self',this,0)\">";
echo '<option value="'.$pbln.'" selected>'.$arrbln[$pbln].'</option>';
for ($j=1;$j<=12;$j++)
	{
	echo '<option value="'.$filenya.'?pbln='.$j.'">'.$arrbln[$j].'</option>';
	}
		
echo '</select>, 
Tahun : ';
echo "<select name=\"p_thn\" onChange=\"MM_jumpMenu('self',this,0)\">";
echo '<option value="'.$pthn.'" selected>'.$pthn.'</option>';
for ($k=$terima01;$k<=$terima02;$k++)
	{
	echo '<option value="'.$filenya.'?pbln='.$pbln.'&pthn='.$k.'">'.$k.'</option>';
	}
echo '</select>
</td>
</tr>
</table>
<br>';


if (empty($pbln))
	{
	echo '<strong><font color="#FF0000">BULAN Terima Pengadaan Belum Dipilih...!</font></strong>';
	}
else if (empty($pthn))
	{
	echo '<strong><font color="#FF0000">TAHUN Terima Pengadaan Belum Dipilih...!</font></strong>';
	}
else
	{
	//query
	$p = new Pager();
	$start = $p->findStart($limit);
	
	$sqlcount = "SELECT * FROM inv_pengadaan ".
					"WHERE round(DATE_FORMAT(tgl_terima, '%m')) = '$pbln' ".
					"AND round(DATE_FORMAT(tgl_terima, '%Y')) = '$pthn' ".
					"ORDER BY tgl_terima DESC";
	$sqlresult = $sqlcount;
			
	$count = mysql_num_rows(mysql_query($sqlcount));
	$pages = $p->findPages($count, $limit);
	$result = mysql_query("$sqlresult LIMIT ".$start.", ".$limit);
	$pagelist = $p->pageList($_GET['page'], $pages, $target);
	$data = mysql_fetch_array($result);


	//nek gak ada
	if ($count == 0)
		{
		echo '<strong><font color="#FF0000">TIDAK ADA DATA PENGADAAN.</font></strong>';
		}
	
	//nek ada
	else if ($count != 0)
		{
		echo '<table width="100%" border="1" cellspacing="0" cellpadding="3">
		<tr valign="top" bgcolor="'.$warnaheader.'">
		<td width="1">&nbsp;</td>
		<td width="100"><strong><font color="'.$warnatext.'">Tgl. Terima</font></strong></td>
		<td width="100"><strong><font color="'.$warnatext.'">Tgl. Beli</font></strong></td>		
		<td width="100"><strong><font color="'.$warnatext.'">Dari</font></strong></td>
		<td width="100"><strong><font color="'.$warnatext.'">Tgl. Pakai</font></strong></td>
		<td><strong><font color="'.$warnatext.'">Item</font></strong></td>
		<td width="100"><strong><font color="'.$warnatext.'">Untuk</font></strong></td>
		<td width="100"><strong><font color="'.$warnatext.'">Ket.</font></strong></td>
		</tr>';
	
	
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
			$tgl_terima = $data['tgl_terima'];
			$tgl_beli = $data['tgl_beli'];
			$tgl_pakai = $data['tgl_pakai'];
			$dari = balikin($data['dari']);
			$untuk = balikin($data['untuk']);
			$ket = balikin($data['ket']);
			

	
			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td> 
			<input type="checkbox" name="item'.$nomer.'" value="'.$kd.'"> 
	        </td>
			<td>'.$tgl_terima.'</td>
			<td>'.$tgl_beli.'</td>
			<td>'.$dari.'</td>
			<td>'.$tgl_pakai.'</td>
			<td>';
			
			//item
			$qpin = mysql_query("SELECT * FROM inv_pengadaan_item ".
									"WHERE kd_pengadaan = '$kd'");
			$rpin = mysql_fetch_assoc($qpin);
			$tpin = mysql_num_rows($qpin);
			
			//nek gak null
			if ($tpin != 0)
				{
				do
					{
					$pin_nm = balikin($rpin['nm_barang']);
					$pin_jml = nosql($rpin['jumlah']);
					$pin_hrg = xduit2(nosql($rpin['harga']));
					$pin_tot = xduit2(nosql($rpin['total']));
					
					echo "<strong>$pin_nm </strong>
					<br>
					<em>Jumlah : $pin_jml
					<br>
					Harga : $pin_hrg
					<br>
					Total : $pin_tot </em>
					<br><br>";	
					}
				while ($rpin = mysql_fetch_assoc($qpin));
				}	
			
			echo '</td>
			<td>'.$untuk.'</td>
			<td>'.$ket.'</td>
	        </tr>';				
			} 
		while ($data = mysql_fetch_assoc($result)); 

		echo '</table>
		<table width="100%" border="0" cellspacing="0" cellpadding="3">
		<tr> 
		<td width="263">
		<input name="page" type="hidden" value="'.$page.'"> 
		<input name="jml" type="hidden" value="'.$count.'"> 
		<input name="pbln" type="hidden" value="'.$pbln.'"> 
		<input name="pthn" type="hidden" value="'.$pthn.'"> 
		<input name="s" type="hidden" value="'.$s.'"> 
		<input name="kd" type="hidden" value="'.$kdx.'"> 
		<input name="btnALL" type="button" value="SEMUA" onClick="checkAll('.$limit.')"> 
		<input name="btnBTL" type="submit" value="BATAL"> 
		<input name="btnHPS" type="submit" value="HAPUS"> 
		</td>
		<td align="right">Total : <strong><font color="#FF0000">'.$count.'</font></strong> Data. '.$pagelist.'</td>
		</tr>
		</table>';
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