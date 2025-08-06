<?php require_once('Connections/apotek.php'); ?>
<?php
mysql_select_db($database_apotek, $apotek);
$query_Recordset1 = "SELECT * FROM lap_harian";
$Recordset1 = mysql_query($query_Recordset1, $apotek) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Apotik Karya Husada Perdagangan</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="my.css" rel="stylesheet" type="text/css" />
<link href="menu.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 7]>
<style type="text/css" media="screen">
#menuh{float:none;}
body{behavior:url(csshover.htc); font-size:75%;}
#menuh ul li{float:left; width: 100%;}
#menuh a{height:1%;font:normal 1em/1.6em "Trebuchet MS", helvetica, arial, sans-serif;}
</style>
<![endif]-->
<style type="text/css">
<!--
.style1 {color: #000000}
.style6 {font-size: 12px}
.style14 {
	font-size: 18px;
	color: #FFFFFF;
	font-weight: bold;
}
.style15 {color: #FFFFFF}
.style26 {color: #000000; font-size: 10px; }
.style27 {font-size: 10px; }
.style3 {color: #000000; font-size: 24px; }
.style28 {color: #000000; font-size: 14; }
.style29 {font-size: 16px; }
-->
</style>
</head>
<body>
<div id="container">
  <div id="top">
    <p class="style6"><img src="Apotek/Images/KH.png" width="83" height="89" /><span class="style14"> APOTEK KARYA HUSADA PERDAGANGAN </span></p>
  </div>
  <div id="menuh-container">
    <div id="menuh">
      <ul>
        <li>
          <div align="center"><a href="simpan_barang.php" class="top_parent"><strong>DATA BARANG</strong></a></div>
        </li>
      </ul>
      <ul>
        <li>
          <div align="center"><a href="simpan_penjualan.php" class="top_parent"><strong>DATA PENJUALAN</strong></a></div>
        </li>
      </ul>
	  <ul>
        <li><a href="login.php" class="top_parent"><strong>LOG OUT</strong></a></li>
      </ul>
    </div>
  </div>
  <div id="leftnav">
    <h3 class="style15">KOMPONEN</h3>
    <p align="left" class="quote"><a href="simpan_lap_harian.php"><img src="Apotek/Images/2426188-200.png" width="20" height="19" /><strong>LA<strong>POR</strong>AN HARIAN</strong></a><strong></strong></p>
    <p align="left" class="style1 quote"><strong><a href="simpan_lap_bulanan.php"><img src="Apotek/Images/2426188-200.png" width="20" height="19" /></a><a href="simpan_lap_bulanan.php"><strong> LAPORAN BULANAN</strong> </a></strong></p>
    <p align="left" class="quote style1"><strong><a href="simpan_lap_tahunan.php"><img src="Apotek/Images/2426188-200.png" width="20" height="19" /></a><a href="simpan_Lap_tahunan.php"><strong>LAPORAN TAHUNAN </strong> </a></strong></p>
    <h3 class="style15">Search</h3>
    <div class="search">
      <form method="post" action="http://www.free-css-com/">
        <p>
          <input type="text" name="search" class="search" />
          <input type="submit" value="Search" class="searchSubmit" />
        </p>
      </form>
    </div>
  </div>
  <div id="content">
    <blockquote>
      <h2 align="center" class="byline style1">LAPORAN HARIAN</h2>
      <p align="left"><a href="lap_harian.php"><img src="images/icon-quality-png-file-png-file-png-file-png-file-31.png" width="22" height="20" /><strong>TAMBAH LAPORAN HARIAN </strong></a></p>
      <table width="747" border="0" align="center">
        <tr>
          <td width="374" class="style3"><div align="left"><a href="simpan_detail_penjualan.php" class="style29"></a></div></td>
          <td width="456" class="style28"><a href="print_lap_harian.php"><img src="Apotek/Images/Untitled.png" width="34" height="29" />Print Laporan </a></td>
        </tr>
      </table>
      <table border="0">
        <tr bgcolor="#00FFFF">
          <td colspan="2"><div align="center" class="style26">
              <div align="center">Barang</div>
          </div></td>
          <td rowspan="2"><div align="center" class="style27">
              <div align="center"><span class="style1">Jumlah</span></div>
          </div></td>
          <td rowspan="2"><div align="center" class="style27">
              <div align="center"><span class="style1">Satuan</span></div>
          </div></td>
          <td rowspan="2"><div align="center" class="style27">
              <div align="center"><span class="style1">Harga</span></div>
          </div></td>
          <td><div align="center" class="style27">
              <div align="center"><span class="style1">Total</span></div>
          </div></td>
          <td rowspan="2"><div align="center" class="style27">
              <div align="center"><span class="style1">HPP</span> </div>
          </div></td>
          <td rowspan="2"><span class="style1">Keuntungan</span></td>
        </tr>
        <tr bgcolor="#00FFFF">
          <td><div align="center" class="style27">
              <div align="center"><span class="style1">Kode</span></div>
          </div></td>
          <td><div align="center" class="style27">
              <div align="center"><span class="style1">Nama</span></div>
          </div></td>
          <td><div align="center" class="style1"> Pembayaran</div></td>
        </tr>
        <?php do { ?>
        <tr bgcolor="#FFFFFF">
          <td><div align="center"><span class="style26"><?php echo $row_Recordset1['kode_barang']; ?></span></div></td>
          <td><div align="center"><span class="style26"><?php echo $row_Recordset1['nama_barang']; ?></span></div></td>
          <td><div align="center"><span class="style26"><?php echo $row_Recordset1['jumlah']; ?></span></div></td>
          <td><div align="center"><span class="style26"><?php echo $row_Recordset1['satuan']; ?></span></div></td>
          <td><div align="center"><span class="style26"><?php echo $row_Recordset1['harga_barang']; ?></span></div></td>
          <td><div align="center"><span class="style26"><?php echo $row_Recordset1['Total_pembayaran']; ?></span></div></td>
          <td><div align="center"><span class="style26"><?php echo $row_Recordset1['HPP']; ?></span></div></td>
          <td><span class="style26"><?php echo $row_Recordset1['Keuntungan']; ?></span></td>
          </tr>
        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
      </table>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </blockquote>
  </div>
  <div id="footer"><a href="http://www.free-css.com/">homepage</a> | <a href="mailto:denise@mitchinson.net">contact</a> | <a href="http://validator.w3.org/check?uri=referer">html</a> | <a href="http://jigsaw.w3.org/css-validator">css</a> | &copy; 2025 Anyone | Design by <a href="http://www.mitchinson.net"> Kevin Napitupulu </a> | This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/3.0/">Creative Desain </a> </div>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>