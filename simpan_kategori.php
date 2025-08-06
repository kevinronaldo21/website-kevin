<?php require_once('Connections/apotek.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO kategori (id_kategori, nama_kategori, des_kategori) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['id_kategori'], "int"),
                       GetSQLValueString($_POST['nama_kategori'], "text"),
                       GetSQLValueString($_POST['des_kategori'], "text"));

  mysql_select_db($database_apotek, $apotek);
  $Result1 = mysql_query($insertSQL, $apotek) or die(mysql_error());

  $insertGoTo = "simpan_kategori.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_apotek, $apotek);
$query_Recordset1 = "SELECT * FROM kategori";
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
.style46 {color: #000000; font-size: 60%; }
.style47 {font-size: 60%}
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
      <h2 align="center" class="byline style1">KATEGORI </h2>
      <p align="left"><a href="kategori.php"><img src="images/icon-quality-png-file-png-file-png-file-png-file-31.png" width="23" height="21" /><strong>TAMBAH DATA</strong></a></p>
    
      
      
      
      <table border="1">
        <tr bgcolor="#33FFFF">
          <td><div align="center" class="style1"><span class="style1">Id Kategori</span></div></td>
          <td><div align="center" class="style1"><span class="style1">Nama Kategori</span></div></td>
          <td><div align="center"><span class="style1 style1">Deskripsi Kategori</span></div></td>
          <td colspan="2"><div align="center" class="style1">Operasi</div></td>
        </tr>
        <?php do { ?>
          <tr bgcolor="#FFFFFF">
            <td><div align="center"><span class="style1 style1"><?php echo $row_Recordset1['id_kategori']; ?></span></div></td>
            <td><span class="style1 style1"><?php echo $row_Recordset1['nama_kategori']; ?></span></td>
            <td><span class="style1 style1"><?php echo $row_Recordset1['des_kategori']; ?></span></td>
            <td><a href="edit_kategori.php?id_kategori=<?php echo $row_Recordset1['id_kategori']; ?>" class="style1 style1"><img src="images/imgbin-computer-icons-editing-font-awesome-graphics-editor-advertising-GasA3YjEDg9X1DbvZwBNj5JYC.png" width="16" height="17" border="0" /></a></td>
            <td><a href="hapus_kategori.php?id_kategori=<?php echo $row_Recordset1['id_kategori']; ?>" class="style1 style1"><img src="images/pngtree-delete-button-3d-icon-png-image_8633077.png" width="17" height="21" border="0" /></a></td>
          </tr>
          <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
      </table>
      <br />
      <table width="481" border="0" align="center">
        <tr>
          <td width="179"><span class="style46">showing 1 to 10 entries </span></td>
          <td width="292"><div align="right" class="style1">
              <table width="152" border="1" bordercolor="#FFFFFF" bgcolor="#E2D9AE">
                <tr>
                  <td><div align="center" class="style47">previous</div></td>
                  <td><div align="center" class="style47">1</div></td>
                  <td><div align="center" class="style47">Next</div></td>
                </tr>
              </table>
          </div></td>
        </tr>
      </table>
      <p><a href="Laporan_kategori.php"></a></p>
      <p>&nbsp;</p>
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