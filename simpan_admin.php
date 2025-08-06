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
  $insertSQL = sprintf("INSERT INTO login (email, password) VALUES (%s, %s)",
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['password'], "text"));

  mysql_select_db($database_apotek, $apotek);
  $Result1 = mysql_query($insertSQL, $apotek) or die(mysql_error());

  $insertGoTo = "Login.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_apotek, $apotek);
$query_Recordset1 = "SELECT * FROM login";
$Recordset1 = mysql_query($query_Recordset1, $apotek) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['email'])) {
  $loginUsername=$_POST['email'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "admin.php";
  $MM_redirectLoginFailed = "Login.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_apotek, $apotek);
  
  $LoginRS__query=sprintf("SELECT email, password FROM login WHERE email='%s' AND password='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $apotek) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Apotek Karya Husada Perdagangan</title>
<style type="text/css">
<!--
.style1 {font-size: 36px}
.style4 {font-size: 36px; color: #000000; }
.style5 {color: #F0F0F0}
-->
</style>
</head>

<body>
<table width="1436" border="1" align="center">
  <tr>
    <td width="712" height="599" bgcolor="#00FFFF"><table width="441" height="402" border="0" align="center" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
      <tr>
        <td height="398" bgcolor="#FFFFFF"><div align="center">
          <p><span class="style1"><img src="images/log.png" width="94" height="96" /></span><br />
            <span class="style4">Data Admin </span>          </p>
          <table border="1">
            <tr>
              <td><div align="center">email</div></td>
              <td><div align="center">password</div></td>
              <td><div align="center">Opsi</div></td>
            </tr>
            <?php do { ?>
              <tr>
                <td><?php echo $row_Recordset1['email']; ?></td>
                <td><?php echo $row_Recordset1['password']; ?></td>
                <td><a href="hapus_admin.php">Hapus</a></td>
              </tr>
              <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
          </table>
          <p>&nbsp;</p>
          <form ACTION="<?php echo $loginFormAction; ?>" id="form3" name="form3" method="POST">
            <label></label>
            <p align="center">&nbsp;</p>
          </form>
          </div></td>
      </tr>
    </table>
      <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>