<?
  function db_lesen_loeschen($sql,$conn,$userID,$session)
   {//BEGIN db_lesen
    //echo $sql."<br>";
    $result=mysql_query($sql,$conn);
    if($result)
    {//BEGIN if $result
    $number=mysql_num_rows($result);
     //echo("<P>Es sind $number Datensaetze gelesen worden.</P>");
     if($number){//BEGIN Suchausgabe>null
     echo("<TABLE BORDER=0>");
     while($row=mysql_fetch_array($result,MYSQL_ASSOC))
     {//BEGIN row
       echo"<TR><TD valign=top>".$row['name']."</TD><TD>".$row['gruppename']."</TD><TD><a href=".$PHP_SELF."?IDloeschen=".$row['profilID']."&navi=2&userID=$userID&session=$session>loeschen</a></TD>"."<TD><a href=".$PHP_SELF."?ID=".$row['profilID']."&navi=3&userID=$userID&session=$session&normtabelle=hs>Profilansicht Norm HS</a></TD>"."<TD><a href=".$PHP_SELF."?ID=".$row['profilID']."&navi=3&userID=$userID&session=$session&normtabelle=fs>Profilansicht Norm FS</a></TD>"."<TD><a href=".$PHP_SELF."?ID=".$row['profilID']."&gruppeID=".$row['gruppeID']."&aendern=1&navi=1"."&userID=$userID&session=$session>aendern</a></TD"."</TR>";
     }//END row
     echo("</TABLE>");
     }//ENDE suchausgabe >null
    }//END if result
    else
    {//BEGIN else $result
     echo("<BR>"."Errornumber= ".mysql_error($conn));
    }//END if result
   }//END db_lesen

    function loeschen($sql,$conn)
  {//BEGIN loeschen
    echo $sql."<br>";
    if (mysql_query($sql,$conn))
    {
    //echo"MYSQL-DELETE-OK";
    }
    else
    {die("MYSQL-DELETE-Fehler".mysql_error($conn));}
  }//ENDE loeschen


//   db ausgeben ausgeben

   $conn=connect($host,$user,$pass);
   $conn=choise_database($conn,$db);

   if($IDloeschen)
    {//BEGIN 
      $sql_loeschen="DELETE FROM profil WHERE profilID like $IDloeschen";
      //echo $sql_loeschen."<br>";
      loeschen($sql_loeschen,$conn);
    }//END


   $sql="SELECT profil.profilID AS profilID, profil.name AS name, gruppe.name AS gruppename, gruppe.gruppeID AS gruppeID FROM profil,gruppe WHERE profil.gruppeID LIKE gruppe.gruppeID AND $userID Like profil.userID ORDER BY gruppename, name";
   //echo $sql."<br>";
   db_lesen_loeschen($sql,$conn,$userID,$session);

   $conn=deconnect($conn);

?>