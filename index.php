<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Duesseldorfer Schuelerinventar Paul Koop M.A.</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
.auto-style1 {
	font-size: xx-large;
	color: #FFFFFF;
	background-color: #0000FF;
}
.auto-style3 {
	background-color: #0000FF;
}
.auto-style6 {
	color: #FFFFFF;
	background-color: #0000FF;
}
.auto-style7 {
	font-size: xx-small;
}
.auto-style8 {
	color: #FFFFFF;
}
.auto-style9 {
	font-size: medium;
}
</style>
</head>

<body class="schrift">
<? include("db_con_func.php"); ?>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr bgcolor="#66FFFF">
    <td height="10%" colspan="2" bgcolor="#0000FF" class="auto-style1">D<span class="auto-style3">ÜSK<br>
	<span class="auto-style9" >Düsseldorfer Schülerinventar online</span></span></td>
  </tr>
  <tr>
    <td width="20%" bgcolor="#66FFFF" valign=top>
         <?
            if (!isset($userID) || ($abmelden==1))
                 {
              include("db_passwort_lesen.php");
                 }
                 else
                 {
                  include("db_navigation.php");
                 }
         ?></td>
    <td valign=top>
        <?PHP
                   switch ($navi)
                   {
                    case 1:include("db_input_aendern.php");break;
                    case 2:include("db_lesen_loeschen_aendern.php");break;
                    case 3:include("db_profil_lesen.php");break;

                    default:echo "Willkommen Sie können Ihre Daten lesen, löschen, ändern und hinzufügen";break;
                   }
                  echo "<br>"; 
                  ?>

&nbsp;</td>
  </tr>
  <tr bgcolor="#66FFFF">
    <td height="10%" colspan="2" bgcolor="#0000FF" class="auto-style6">Paul Koop 
	M.A.<br>Thomashofstraße 19<br>52070 Aachen<br><span class="auto-style7">
	Nützen Sie den Gastzugang zu Testzwecken. Den Quellcode der Onlineversion 
	können Sie auf meiner Website <a href="http://www.paul-koop.org">
	<span class="auto-style8">http://www.paul-koop.org</span></a> für ihr 
	lokales Netzwerk downloaden.</span></td>
  </tr>
</table>
</body>
</html>