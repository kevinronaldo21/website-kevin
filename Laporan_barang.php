<?php require_once('Connections/apotek.php'); ?>
<?php
mysql_select_db($database_apotek, $apotek);
$query_Recordset1 = "SELECT * FROM barang";
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
        <p>LAPORAN BARANG <br />
          APOTEK KARYA HUSADA PERDAGANGAN <br />
        TAHUN 2025 </p>
        </div>
        <table border="1" align="center">
          <tr bgcolor="#00FFFF">
            <td><div align="center">id</div></td>
            <td><div align="center">kode barang</div></td>
            <td><div align="center">nama barang</div></td>
            <td><div align="center">penyimpanan</div></td>
            <td><div align="center">stok</div></td>
            <td><div align="center">satuan</div></td>
            <td><div align="center">nama kategori</div></td>
            <td><div align="center">kadaluarsa</div></td>
            <td><div align="center">harga beli</div></td>
            <td>harga jual</td>
            <td><div align="center">Opsi</div></td>
          </tr>
          <?php do { ?>
            <tr bgcolor="#FFFFFF">
              <td><?php echo $row_Recordset1['id']; ?></td>
              <td><?php echo $row_Recordset1['kode_barang']; ?></td>
              <td><?php echo $row_Recordset1['nama_barang']; ?></td>
              <td><?php echo $row_Recordset1['penyimpanan']; ?></td>
              <td><?php echo $row_Recordset1['stok']; ?></td>
              <td><?php echo $row_Recordset1['satuan']; ?></td>
              <td><?php echo $row_Recordset1['nama_kategori']; ?></td>
              <td><?php echo $row_Recordset1['kadaluarsa']; ?></td>
              <td><?php echo $row_Recordset1['harga_beli']; ?></td>
              <td><?php echo $row_Recordset1['harga_jual']; ?></td>
              <td><div align="center">Print</div></td>
            </tr>
            <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
        </table>
        <p align="right"><a href="simpan_barang.php">Back</a></p>
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