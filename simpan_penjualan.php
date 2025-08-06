<?php require_once('Connections/apotek.php'); ?>
<?php
mysql_select_db($database_apotek, $apotek);
$query_Recordset1 = "SELECT * FROM penjualan";
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
.style26 {color: #000000; font-size: 15px; }
.style29 {font-size: 36}
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
        <li><a href="kasir.php" class="top_parent"><strong>DATA KASIR </strong></a></li>
      </ul>
      <ul>
        <li><a href="pengguna.php" class="top_parent"><strong>PENGGUNA</strong></a></li>
      </ul>
      <ul>
        <li><a href="login.php" class="top_parent"><strong>LOG OUT</strong></a></li>
      </ul>
    </div>
  </div>
  <div id="leftnav">
    <h3 class="style15">KOMPONEN</h3>
    <p align="left" class="quote"><a href="simpan_barang.php"><strong><strong><img src="Apotek/Images/png-transparent-mover-logistics-package-delivery-box-box-miscellaneous-logo-box-icon.png" width="21" height="19" border="0" /></strong><span class="style1"> DATA BARANG</span><span class="style1"></span></strong></a></p>
    <p align="left" class="style1 quote"><strong><a href="simpan_penjualan.php"><img src="Apotek/Images/png-transparent-vendor-sales-service-marketing-marketing-retail-service-logo.png" width="21" height="18" /> DATA PENJUALAN</a></strong></p>
    <p align="left" class="quote style1"><strong><a href="simpan_detail_penjualan.php"><img src="Apotek/Images/th.jpg" width="21" height="21" /> DETAIL PENJUALAN</a></strong></p>
    <p align="left" class="quote style1"><strong><a href="simpan_unit.php"><img src="Apotek/Images/play-button-white-color-minimalist-database-file-design-creative-logo-icon-modern-elements-simple-elegant-free-photo.jpg" width="22" height="21" /> DATA UNIT</a></strong></p>
    <p align="left" class="style1 quote"><strong><a href="simpan_kategori.php"><img src="Apotek/Images/2426188-200.png" width="20" height="19" /> DATA KATEGORI</a></strong></p>
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
      <h2 align="center" class="byline style1">DATA PENJUALAN</h2>
      <p align="left"><a href="penjualan.php"><img src="images/icon-quality-png-file-png-file-png-file-png-file-31.png" width="22" height="20" /><strong>TAMBAH DATA</strong></a><strong></strong></p>
    
      
      
      
      <table border="1">
        <tr bgcolor="#00FFFF">
          <td><div align="center"><span class="style26">id</span></div></td>
          <td><div align="center"><span class="style26">No Penjualan</span></div></td>
          <td><div align="center"><span class="style26">Nama Barang </span></div></td>
          <td><div align="center"><span class="style26">Tanggal Penjualan</span></div></td>
          <td><div align="center"><span class="style26">Jam Penjualan</span></div></td>
          <td><div align="center"><span class="style26">Total</span></div></td>
          <td colspan="2"><div align="center"><span class="style26">Operasi</span></div></td>
        </tr>
        <?php do { ?>
          <tr bgcolor="#FFFFFF">
            <td><div align="center" class="style6"><span class="style1"><?php echo $row_Recordset1['id']; ?></span></div></td>
            <td><div align="center" class="style6"><span class="style1"><?php echo $row_Recordset1['no_penjualan']; ?></span></div></td>
            <td><div align="left"><span class="style1"><?php echo $row_Recordset1['nama_kasir']; ?></span></div></td>
            <td><div align="center"><span class="style1"><?php echo $row_Recordset1['tgl_penjualan']; ?></span></div></td>
            <td><div align="center" class="style6"><span class="style1"><?php echo $row_Recordset1['jam_penjualan']; ?></span></div></td>
            <td><div align="center"><span class="style1"><?php echo $row_Recordset1['total']; ?></span></div></td>
            <td><a href="edit_penjualan.php?id=<?php echo $row_Recordset1['id']; ?>" class="style26 style1 style6"><img src="images/imgbin-computer-icons-editing-font-awesome-graphics-editor-advertising-GasA3YjEDg9X1DbvZwBNj5JYC.png" width="16" height="17" border="0" /></a></td>
            <td><a href="hapus_penjualan.php?id=<?php echo $row_Recordset1['id']; ?>" class="style26 style1 style6"><img src="images/pngtree-delete-button-3d-icon-png-image_8633077.png" width="17" height="21" border="0" /></a></td>
          </tr>
          <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
      </table>
      <p class="style1"><a href="Laporan_penjualan.php"><img src="images/pngtree-report-line-filled-icon-png-image_3789634.jpg" width="23" height="22" />LIHAT LAPORAN PENJUALAN </a></p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </blockquote>
  </div>
  <div id="footer"> <a href="http://www.free-css.com/">homepage</a> | <a href="mailto:denise@mitchinson.net">contact</a> | <a href="http://validator.w3.org/check?uri=referer">html</a> | <a href="http://jigsaw.w3.org/css-validator">css</a> | &copy; 2025 Anyone | Design by <a href="http://www.mitchinson.net"> Kevin Napitupulu </a> | This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/3.0/">Creative Desain </a> </div>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>