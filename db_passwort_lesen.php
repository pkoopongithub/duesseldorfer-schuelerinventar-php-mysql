<?
  function db_lesen_passwort($sql,$conn)
   {//BEGIN db_lesen
    $result=mysql_query($sql,$conn);
    if($result)
    {//BEGIN if $result
    $number=mysql_num_rows($result);
     //echo("<P>Es sind $number Datensaetze gelesen worden.</P>");
     if($number){//BEGIN Suchausgabe>null
     while($row=mysql_fetch_array($result,MYSQL_ASSOC))
     {//BEGIN row
       //echo "Willkommen Sie sind angemeldet"."<br>";
	   $userID=$row['ID'];
     }//END row
     }//ENDE suchausgabe >null
	 return $userID;
    }//END if result
    else
    {//BEGIN else $result
     echo("<BR>"."Errornumber= ".mysql_error($conn));
    }//END if result
   }//END db_lesen

  function anmeldung_input($sql,$conn)
  {//BEGIN input
    //echo $sql."<br>";
    if (mysql_query($sql,$conn))
    {
    //echo"MYSQL-INSERT-OK anmeldung";
    }
    else
    {echo("User und Passwort sind unbekannt. Wenn Sie einen eigenen Zugang wuenschen, nehmen Sie bitte Kontakt auf.");
    die(/*"MYSQL-INSERT-neue Eingabe-Fehler".mysql_error($conn)*/);}
  }//ENDE input
  
   function anmeldung_ok($sql,$conn,$session,$userID)
   {//BEGIN db_lesen
    $ok=0;
	$result=mysql_query($sql,$conn);
    if($result)
    {//BEGIN if $result
    $number=mysql_num_rows($result);
     //echo("<P>Es sind $number Datensaetze gelesen worden.</P>");
     if($number){//BEGIN Suchausgabe>null
     while($row=mysql_fetch_array($result,MYSQL_ASSOC))
     {//BEGIN row
       //echo "Willkommen Sie sind angemeldet"."<br>";
	   $ok=1;
     }//END row
     }//ENDE suchausgabe >null
	 return $ok;
    }//END if result
    else
    {//BEGIN else $result
     echo("<BR>"."Errornumber= ".mysql_error($conn));
    }//END if result
   }//END db_lesen
   
  function anmeldung_loeschen($sql,$conn,$session,$userID)
  {//BEGIN loeschen
    //echo $sql."<br>";
    if (mysql_query($sql,$conn))
    {
    //echo"MYSQL-DELETE-OK";
    }
    else
    {die("MYSQL-DELETE-Fehler".mysql_error($conn));}
  }//ENDE loeschen

//   db ausgeben ausgeben
  if($abmelden==1)
   {
    $conn=connect($host,$user,$pass);
    $conn=choise_database($conn,$db);
	$sql="DELETE FROM anmeldung WHERE (userID like $userID) AND (session LIKE \"$session\")";
	anmeldung_loeschen($sql,$conn,$session,$userID);
	$conn=deconnect($conn);
   }
  if(!isset($submit))
   { ?>
<form name="form1" method="post" action="">
  <table width="100%" border="0">
    <tr>
      <td width="6%" height="24">User</td>
      <td width="94%"><input name="benutzer" type="text"  value="gast" class=button></td>
    </tr>
    <tr>
      <td>Passwort</td>
      <td><input name="kennwort" type="text"  value="gast" class=button></td>
    </tr>
    <tr>
      <td>Anmelden</td>
      <td><input type="submit" name="submit" value="Abschicken" class=button></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  </form>
<? }
   else
   {
   $conn=connect($host,$user,$pass);
   $conn=choise_database($conn,$db);
   //$sqlanmeldung="SELECT * FROM anmeldung WHERE (userID LIKE $userID)AND(session LIKE \"$session\");";
   $sql="SELECT * FROM user WHERE (user LIKE \"$benutzer\") AND (pass LIKE \"$kennwort\")";
   //echo $sql."<br>";
    $userID=db_lesen_passwort($sql,$conn);
    $session=setze_session($session);
	$sql="INSERT INTO anmeldung (userID,session)VALUES($userID,\"$session\")";
	anmeldung_input($sql,$conn);
	$conn=deconnect($conn);
   ?>
   <table width="100%" border="0">
        <tr> 
          <td><a href="<? echo $PHP_SELF ?>?navi=1&userID=<? echo $userID ?>&session=<? echo $session ?>">Einfügen</a></td>
        </tr>
        <tr> 
          <td><a href="<? echo $PHP_SELF ?>?navi=2&userID=<? echo $userID ?>&session=<? echo $session ?>">Bearbeiten</a></td>
        </tr>
        <tr> 
         <td><a href="<? echo $PHP_SELF ?>?abmelden=1&userID=<? echo $userID ?>&session=<? echo $session ?>">Abmelden</a></td>
        </tr>
      </table>
    <?
   }
    
?>
