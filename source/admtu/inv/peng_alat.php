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
$filenya = "peng_alat.php";
$judul = "Penggunaan Alat Peraga";
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
	
	$sqlcount = "SELECT * FROM inv_peng_peraga ".
					"WHERE round(DATE_FORMAT(tgl_pinjam, '%m')) = '$pbln' ".
					"AND round(DATE_FORMAT(tgl_pinjam, '%Y')) = '$pthn' ".
					"ORDER BY tgl_pinjam DESC";
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
		mysql_query("DELETE FROM inv_peng_peraga_item ".
						"WHERE kd_peng_peraga = '$kd'");
		
		//del
		mysql_query("DELETE FROM inv_peng_peraga ".
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
echo ' [<a href="peng_alat_entry.php" title="Entry Penggunaan Alat Peraga">Data Baru</a>]

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
for ($k=$pinjam01;$k<=$pinjam02;$k++)
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
	echo '<strong><font color="#FF0000">BULAN Peminjaman Belum Dipilih...!</font></strong>';
	}
else if (empty($pthn))
	{
	echo '<strong><font color="#FF0000">TAHUN Peminjaman Belum Dipilih...!</font></strong>';
	}
else
	{
	//query
	$p = new Pager();
	$start = $p->findStart($limit);
	
	$sqlcount = "SELECT * FROM inv_peng_peraga ".
					"WHERE round(DATE_FORMAT(tgl_pinjam, '%m')) = '$pbln' ".
					"AND round(DATE_FORMAT(tgl_pinjam, '%Y')) = '$pthn' ".
					"ORDER BY tgl_pinjam DESC";
	$sqlresult = $sqlcount;
			
	$count = mysql_num_rows(mysql_query($sqlcount));
	$pages = $p->findPages($count, $limit);
	$result = mysql_query("$sqlresult LIMIT ".$start.", ".$limit);
	$pagelist = $p->pageList($_GET['page'], $pages, $target);
	$data = mysql_fetch_array($result);


	//nek gak ada
	if ($count == 0)
		{
		echo '<strong><font color="#FF0000">TIDAK ADA DATA PEMINJAMAN.</font></strong>';
		}
	
	//nek ada
	else if ($count != 0)
		{
		echo '<table width="800" border="1" cellspacing="0" cellpadding="3">
		<tr valign="top" bgcolor="'.$warnaheader.'">
		<td width="1">&nbsp;</td>
		<td width="100"><strong><font color="'.$warnatext.'">Tgl. Pinjam</font></strong></td>
		<td width="200"><strong><font color="'.$warnatext.'">Oleh</font></strong></td>
		<td><strong><font color="'.$warnatext.'">Alat Yang Dipinjam</font></strong></td>
		<td width="100"><strong><font color="'.$warnatext.'">Tgl. Kembali</font></strong></td>
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
			$tgl_pinjam = $data['tgl_pinjam'];
			$kd_guru = nosql($data['kd_guru']);
			$tgl_kembali = $data['tgl_kembali'];
			
		
			//guru ne...
			$qgru = mysql_query("SELECT * FROM m_pegawai ".
									"WHERE kd = '$kd_guru'");
			$rgru = mysql_fetch_assoc($qgru);
			
			$gru_nip = nosql($rgru['nip']);
			$gru_nm = balikin($rgru['nama']);
	
	
			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td> 
			<input type="checkbox" name="item'.$nomer.'" value="'.$kd.'"> 
	        </td>
			<td>'.$tgl_pinjam.'</td>
			<td>('.$gru_nip.'). '.$gru_nm.'</td>
			<td>';
			
			//alat yg dipinjam
			$qpin = mysql_query("SELECT inv_peng_peraga_item.*, inv_peng_peraga_item.jumlah AS pjml, ".
									"inv_alat_peraga.* ".
									"FROM inv_peng_peraga_item, inv_alat_peraga ".
									"WHERE inv_peng_peraga_item.kd_alat = inv_alat_peraga.kd ".
									"AND inv_peng_peraga_item.kd_peng_peraga = '$kd'");
			$rpin = mysql_fetch_assoc($qpin);
			$tpin = mysql_num_rows($qpin);
			
			//nek gak null
			if ($tpin != 0)
				{
				do
					{
					$pin_nm = balikin($rpin['alat_peraga']);
					$pin_jml = nosql($rpin['pjml']);
					
					echo "*$pin_nm [$pin_jml]<br>";	
					}
				while ($rpin = mysql_fetch_assoc($qpin));
				}	
			
			echo '</td>
			<td>'.$tgl_kembali.'</td>
	        </tr>';				
			} 
		while ($data = mysql_fetch_assoc($result)); 

		echo '</table>
		<table width="800" border="0" cellspacing="0" cellpadding="3">
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