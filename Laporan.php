<?php require_once('Connections/apotek.php'); ?>
<?php
mysql_select_db($database_apotek, $apotek);
$query_Recordset1 = "SELECT * FROM penjualan";
$Recordset1 = mysql_query($query_Recordset1, $apotek) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Laporan Apotek Karya Husada Perdagangan</title>
<style type="text/css">
<!--
.style1 {color: #000000}
-->
</style>
</head>

<body>
<div align="center">
  <table width="999" border="1">
    <tr>
      <th bgcolor="#FFFF99" scope="col"><div align="center">
        <p>LAPORAN PENJUALAN<br />
          APOTEK KARYA HUSADA PERDAGANGAN<br />
          TAHUN 2025</p>
      </div>
        <table border="0" align="center">
          <tr bgcolor="#00FFFF">
            <td><div align="center">Id</div></td>
            <td><div align="center">No Penjualan</div></td>
            <td><div align="center">Nama Kasir</div></td>
            <td><div align="center">Tanggal Penjualan</div></td>
            <td><div align="center">Jam Penjualan</div></td>
            <td><div align="center">Total</div></td>
          </tr>
          <?php do { ?>
          <tr bgcolor="#FFFFFF">
            <td height="35"><div align="center"><span class="style1"><?php echo $row_Recordset1['id']; ?></span></div></td>
            <td><div align="center"><span class="style1"><?php echo $row_Recordset1['no_penjualan']; ?></span></div></td>
            <td><div align="center"><span class="style1"><?php echo $row_Recordset1['nama_kasir']; ?></span></div></td>
            <td><div align="center"><span class="style1"><?php echo $row_Recordset1['tgl_penjualan']; ?></span></div></td>
            <td><div align="center"><span class="style1"><?php echo $row_Recordset1['jam_penjualan']; ?></span></div></td>
            <td><div align="center"><span class="style1"><?php echo $row_Recordset1['total']; ?></span></div></td>
          </tr>
          <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      <p>&nbsp;</p></th>
    </tr>
  </table>
  <p>&nbsp;</p>
</div>
<p align="center">&nbsp;</p>

</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
