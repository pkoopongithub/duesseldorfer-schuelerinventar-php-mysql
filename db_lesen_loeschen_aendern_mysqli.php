<?
  function db_lesen_loeschen($sql,$conn,$userID,$session)
   {//BEGIN db_lesen
    //echo $sql."<br>";
    $result=mysqli_query($conn,$sql);
    if($result)
    {//BEGIN if $result
    $number=mysqli_num_rows($result);
     //echo("<P>Es sind $number Datensaetze gelesen worden.</P>");
     if($number){//BEGIN Suchausgabe>null

     while($row=mysqli_fetch_assoc($result))
     {//BEGIN row
       ?>
         <div class="panel panel-default">
           <div class="panel-heading">
            <h3 class="panel-title">Profil</h3>
           </div>
         <div class="panel-body">
       <?
       echo("<DIV class=row BORDER=0>");
       echo"<DIV valign=top>".$row['name']."</DIV><DIV>".$row['gruppename']."</DIV><DIV><a href=".$PHP_SELF."?IDloeschen=".$row['profilID']."&navi=2&userID=$userID&session=$session>l&ouml;schen</a></DIV>"."<DIV><a href=".$PHP_SELF."?ID=".$row['profilID']."&navi=3&userID=$userID&session=$session&normtabelle=hs>Profilansicht Norm HS</a></DIV>"."<DIV><a href=".$PHP_SELF."?ID=".$row['profilID']."&navi=3&userID=$userID&session=$session&normtabelle=fs>Profilansicht Norm FS</a></DIV>"."<DIV><a href=".$PHP_SELF."?ID=".$row['profilID']."&gruppeID=".$row['gruppeID']."&aendern=1&navi=1"."&userID=$userID&session=$session>&auml;ndern</a></DIV>";
       echo("</DIV>");
      ?>        
        </div>
       </div>
       <?
     }//END row
     }//ENDE suchausgabe >null
    }//END if result
    else
    {//BEGIN else $result
     echo("<BR>"."Errornumber= ".mysqli_error($conn));
    }//END if result
   }//END db_lesen

    function loeschen($sql,$conn)
  {//BEGIN loeschen
    echo $sql."<br>";
    if (mysqli_query($conn,$sql))
    {
    //echo"MYSQL-DELETE-OK";
    }
    else
    {die("MYSQL-DELETE-Fehler".mysqli_error($conn));}
  }//ENDE loeschen


//   db ausgeben ausgeben

   $conn=connect($host,$user,$pass,$db);

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