<head>
<style type="text/css">
.auto-style1 {
	border-width: 1px;
	background-color: #0000FF;
}
.auto-style2 {
	border-width: 1px;
	background-color: #00FFFF;
}
.auto-style4 {
	border-width: 1px;
	background-color: #99CCFF;
}
.auto-style5 {
	font-size: medium;
	font-family: Arial, Helvetica, sans-serif;
}
</style>
</head>

<?



// Variablendefinitionen
// Profil name
$name="";
$Xnichtgesetzt=true;

//item
$SEint = array();
$FEint = array();

//Normtabellen
$normSE = array();
$normFE = array();

//Profilaufaddieren

$SEPint = array ();
$FEPint = array ();

//korrelation
$korrelation=0;
$SEPmittel = 0;
$FEPmittel = 0;


//UebereinstimmungSEFE
$UebereinstimmungSEFE=0;



//Profilberechnung

$SEprofil = array();

$SEprofil[0][0]="0";
$SEprofil[0][1]="0";
$SEprofil[0][2]="0";
$SEprofil[0][3]="0";
$SEprofil[0][4]="0";

$SEprofil[1][0]="0";
$SEprofil[1][1]="0";
$SEprofil[1][2]="0";
$SEprofil[1][3]="0";
$SEprofil[1][4]="0";

$SEprofil[2][0]="0";
$SEprofil[2][1]="0";
$SEprofil[2][2]="0";
$SEprofil[2][3]="0";
$SEprofil[2][4]="0";

$SEprofil[3][0]="0";
$SEprofil[3][1]="0";
$SEprofil[3][2]="0";
$SEprofil[3][3]="0";
$SEprofil[3][4]="0";

$SEprofil[4][0]="0";
$SEprofil[4][1]="0";
$SEprofil[4][2]="0";
$SEprofil[4][3]="0";
$SEprofil[4][4]="0";

$SEprofil[5][0]="0";
$SEprofil[5][1]="0";
$SEprofil[5][2]="0";
$SEprofil[5][3]="0";
$SEprofil[5][4]="0";



$FEprofil = array();


$FEprofil[0][0]="0";
$FEprofil[0][1]="0";
$FEprofil[0][2]="0";
$FEprofil[0][3]="0";
$FEprofil[0][4]="0";

$FEprofil[1][0]="0";
$FEprofil[1][1]="0";
$FEprofil[1][2]="0";
$FEprofil[1][3]="0";
$FEprofil[1][4]="0";

$FEprofil[2][0]="0";
$FEprofil[2][1]="0";
$FEprofil[2][2]="0";
$FEprofil[2][3]="0";
$FEprofil[2][4]="0";

$FEprofil[3][0]="0";
$FEprofil[3][1]="0";
$FEprofil[3][2]="0";
$FEprofil[3][3]="0";
$FEprofil[3][4]="0";

$FEprofil[4][0]="0";
$FEprofil[4][1]="0";
$FEprofil[4][2]="0";
$FEprofil[4][3]="0";
$FEprofil[4][4]="0";

$FEprofil[5][0]="0";
$FEprofil[5][1]="0";
$FEprofil[5][2]="0";
$FEprofil[5][3]="0";
$FEprofil[5][4]="0";


//Punkte 1 bis 5 für Profil "X"
/*
$SEprofil = array
            (
             array ("Arbeitsverhalten"   ,"0","0","0","0","0")
	         array ("Lernverhalten"      ,"0","0","0","0","0")
             array ("Sozialverhalten"    ,"0","0","0","0","0")
             array ("Fachkompetenz"      ,"0","0","0","0","0")
             array ("Personale Kompetenz","0","0","0","0","0")
             array ("Methodenkompetenz"  ,"0","0","0","0","0")
            );
            
            

$FEprofil = array
            (
              array ("Arbeitsverhalten"   ,"0","0","0","0","0")
	          array ("Lernverhalten"      ,"0","0","0","0","0")
              array ("Sozialverhalten"    ,"0","0","0","0","0")
              array ("Fachkompetenz"      ,"0","0","0","0","0")
              array ("Personale Kompetenz","0","0","0","0","0")
              array ("Methodenkompetenz"  ,"0","0","0","0","0")
            );
*/           


           





//Funktionsdefinitionen
//Normtabellen lesen
  function db_normSE_lesen($sql,$conn,$userID,$session)
   {//BEGIN db_lesen
   global $normSE;
    //echo $sql."<br>";
    $result=mysql_query($sql,$conn);
    if($result)
    {//BEGIN if $result
    $number=mysql_num_rows($result);
     //echo("<P>Es sind $number Datensaetze gelesen worden.</P>");
     if($number)
     {//BEGIN Suchausgabe>null
     while($row=mysql_fetch_array($result,MYSQL_ASSOC))
     {//BEGIN row
     //echo("<P>Verarbeitung Norm SE nicht auskommentiert</P>");
      $normSE[$row[kompetenzID]][]=$row['p1'];$normSE[$row[kompetenzID]][]=$row['p2'];$normSE[$row[kompetenzID]][]=$row['p3'];$normSE[$row[kompetenzID]][]=$row['p4'];$normSE[$row[kompetenzID]][]=$row['p5'];  
     }//END row
     }//ENDE suchausgabe >null
     //var_dump($normSE);
    }//END if result
    else
    {//BEGIN else $result
     echo("<BR>"."Errornumber= ".mysql_error($conn));
    }//END if result
   }//END db_lesen
   
   

  function db_normFE_lesen($sql,$conn,$userID,$session)
   {//BEGIN db_lesen
    global $normFE;
    //echo $sql."<br>";
    $result=mysql_query($sql,$conn);
    if($result)
    {//BEGIN if $result
    $number=mysql_num_rows($result);
     //echo("<P>Es sind $number Datensaetze gelesen worden.</P>");
     if($number)
     {//BEGIN Suchausgabe>null
     while($row=mysql_fetch_array($result,MYSQL_ASSOC))
     {//BEGIN row
      //echo("<P>Verarbeitung Norm FE nicht auskommentiert</P>");
      $normFE[$row[kompetenzID]][]=$row['p1'];$normFE[$row[kompetenzID]][]=$row['p2'];$normFE[$row[kompetenzID]][]=$row['p3'];$normFE[$row[kompetenzID]][]=$row['p4'];$normFE[$row[kompetenzID]][]=$row['p5'];
     }//END row
     }//ENDE suchausgabe >null
     //var_dump($normFE);
    }//END if result
    else
    {//BEGIN else $result
     echo("<BR>"."Errornumber= ".mysql_error($conn));
    }//END if result
   }//END db_lesen




//Profillesen
  function db_profil_lesen($sql,$conn,$userID,$session)
   {//BEGIN db_lesen
   global $SEint, $FEint, $name;
    //echo $sql."<br>";
    $result=mysql_query($sql,$conn);
    if($result)
    {//BEGIN if $result
    $number=mysql_num_rows($result);
     //echo("<P>Es sind $number Datensaetze gelesen worden.</P>");
     if($number)
     {//BEGIN Suchausgabe>null
     while($row=mysql_fetch_array($result,MYSQL_ASSOC))
     {//BEGIN row
      //echo("<P>Verarbeitung SEint FEint nicht auskommentiert</P>");
      //var_dump($row);
      $name=$row['name'];
      
      $SEint[1]=$row['item1'];
      $SEint[2]=$row['item2'];
      $SEint[3]=$row['item3'];
      $SEint[4]=$row['item4'];
      $SEint[5]=$row['item5'];
      $SEint[6]=$row['item6'];
      $SEint[7]=$row['item7'];
      $SEint[8]=$row['item8'];
      $SEint[9]=$row['item9'];
      $SEint[10]=$row['item10'];
      
      $SEint[11]=$row['item11'];
      $SEint[12]=$row['item12'];
      $SEint[13]=$row['item13'];
      $SEint[14]=$row['item14'];
      $SEint[15]=$row['item15'];
      $SEint[16]=$row['item16'];
      $SEint[17]=$row['item17'];
      $SEint[18]=$row['item18'];
      $SEint[19]=$row['item19'];
      $SEint[20]=$row['item20'];
      
      $SEint[21]=$row['item21'];
      $SEint[22]=$row['item22'];
      $SEint[23]=$row['item23'];
      $SEint[24]=$row['item24'];
      $SEint[25]=$row['item25'];
      $SEint[26]=$row['item26'];
      $SEint[27]=$row['item27'];
      $SEint[28]=$row['item28'];
      $SEint[29]=$row['item29'];
      $SEint[30]=$row['item30'];
      
      $SEint[31]=$row['item31'];
      $SEint[32]=$row['item32'];
      $SEint[33]=$row['item33'];
      $SEint[34]=$row['item34'];
      $SEint[35]=$row['item35'];
      $SEint[36]=$row['item36'];
      
      $FEint[1]=$row['feitem1'];
      $FEint[2]=$row['feitem2'];
      $FEint[3]=$row['feitem3'];
      $FEint[4]=$row['feitem4'];
      $FEint[5]=$row['feitem5'];
      $FEint[6]=$row['feitem6'];
      $FEint[7]=$row['feitem7'];
      $FEint[8]=$row['feitem8'];
      $FEint[9]=$row['feitem9'];
      $FEint[10]=$row['feitem10'];
      
      $FEint[11]=$row['feitem11'];
      $FEint[12]=$row['feitem12'];
      $FEint[13]=$row['feitem13'];
      $FEint[14]=$row['feitem14'];
      $FEint[15]=$row['feitem15'];
      $FEint[16]=$row['feitem16'];
      $FEint[17]=$row['feitem17'];
      $FEint[18]=$row['feitem18'];
      $FEint[19]=$row['feitem19'];
      $FEint[20]=$row['feitem20'];
      $FEint[21]=$row['feitem21'];
      $FEint[22]=$row['feitem22'];
      $FEint[23]=$row['feitem23'];
      $FEint[24]=$row['feitem24'];
      $FEint[25]=$row['feitem25'];
      $FEint[26]=$row['feitem26'];
      $FEint[27]=$row['feitem27'];
      $FEint[28]=$row['feitem28'];
      $FEint[29]=$row['feitem29'];
      $FEint[30]=$row['feitem30'];
      
      $FEint[31]=$row['feitem31'];
      $FEint[32]=$row['feitem32'];
      $FEint[33]=$row['feitem33'];
      $FEint[34]=$row['feitem34'];
      $FEint[35]=$row['feitem35'];
      $FEint[36]=$row['feitem36'];      
     }//END row
     }//ENDE suchausgabe >null
     //var_dump($SEint);var_dump($FEint);

    }//END if result
    else
    {//BEGIN else $result
     echo("<BR>"."Errornumber= ".mysql_error($conn));
    }//END if result
   }//END db_lesen



//Verarbeitung
//Daten aus Datenbank einlesen


  //Profil SQL definieren
  $sqlprofil="SELECT   * FROM profil WHERE profilID LIKE $ID "; 
  //echo $sqlprofil."<br>";
  
  //Normtabellen SQL waehlen
  if ($normtabelle=="hs")
   {
    $sqlSE="SELECT   * FROM normSEhs ORDER BY kompetenzID";
    $sqlFE="SELECT   * FROM normFEhs ORDER BY kompetenzID";   
   }
   else //$normtabelle=="fs"
   {    
    $sqlSE="SELECT   * FROM normSEfs ORDER BY kompetenzID";
    $sqlFE="SELECT   * FROM normFEfs ORDER BY kompetenzID"; 
   }
   
   //echo $sqlSE."<br>";
   //echo $sqlFE."<br>";

  
  $conn=connect($host,$user,$pass);
  $conn=choise_database($conn,$db);
  
  //echo("Funktionsaufrufe auskommentiert<br>");
  
  db_normSE_lesen($sqlSE,$conn,$userID,$session);
  db_normFE_lesen($sqlFE,$conn,$userID,$session);
  db_profil_lesen($sqlprofil,$conn,$userID,$session);
  
  
  $conn=deconnect($conn);
// Var_dump daten aus datenbank
//var_dump($SEint);var_dump($FEint);
//var_dump($normSE);
//var_dump($normFE);
 
//Aufsummierung Punkte

       
       $SEPint[1]=(int)$SEint[1]+ (int)$SEint[2]+ (int)$SEint[3]+ (int)$SEint[4]+ (int)$SEint[5]+
                  (int)$SEint[6]+ (int)$SEint[7]+ (int)$SEint[8]+ (int)$SEint[9]+ (int)$SEint[10];
       $SEPint[2]=(int)$SEint[11]+ (int)$SEint[12]+ (int)$SEint[13]+ (int)$SEint[14]+ (int)$SEint[15]+
                  (int)$SEint[16]+ (int)$SEint[17]+ (int)$SEint[18]+ (int)$SEint[19]+ (int)$SEint[20];
       $SEPint[3]=(int)$SEint[21]+ (int)$SEint[22]+ (int)$SEint[23]+ (int)$SEint[24]+ (int)$SEint[25]+
                  (int)$SEint[26]+ (int)$SEint[27]+ (int)$SEint[28]+ (int)$SEint[9]+ (int)$SEint[10];
       $SEPint[4]=(int)$SEint[29]+ (int)$SEint[30]+ (int)$SEint[31]+ (int)$SEint[32]+ (int)$SEint[33]+
                  (int)$SEint[34]+ (int)$SEint[35]+ (int)$SEint[36];
       $SEPint[5]=(int)$SEint[1]+ (int)$SEint[2]+
                  (int)$SEint[6]+ (int)$SEint[7]+ (int)$SEint[8]+ (int)$SEint[9]+ (int)$SEint[10]+
                  (int)$SEint[12]+(int)$SEint[13]+ (int)$SEint[14]+ (int)$SEint[15];
       $SEPint[6]=(int)$SEint[3]+ (int)$SEint[4]+ (int)$SEint[5]+
                  (int)$SEint[9]+ (int)$SEint[10]+ (int)$SEint[11]+
                  (int)$SEint[17]+ (int)$SEint[18];


       $FEPint[1]=(int)$FEint[1]+ (int)$FEint[2]+ (int)$FEint[3]+ (int)$FEint[4]+ (int)$FEint[5]+
                  (int)$FEint[6]+ (int)$FEint[7]+ (int)$FEint[8]+ (int)$FEint[9]+ (int)$FEint[10];
       $FEPint[2]=(int)$FEint[11]+ (int)$FEint[12]+ (int)$FEint[13]+ (int)$FEint[14]+ (int)$FEint[15]+
                  (int)$FEint[16]+ (int)$FEint[17]+ (int)$FEint[18]+ (int)$FEint[19]+ (int)$FEint[20];
       $FEPint[3]=(int)$FEint[21]+ (int)$FEint[22]+ (int)$FEint[23]+ (int)$FEint[24]+ (int)$FEint[25]+
                  (int)$FEint[26]+ (int)$FEint[27]+ (int)$FEint[28]+ (int)$FEint[9]+ (int)$FEint[10];
       $FEPint[4]=(int)$FEint[29]+ (int)$FEint[30]+ (int)$FEint[31]+ (int)$FEint[32]+ (int)$FEint[33]+
                  (int)$FEint[34]+ (int)$FEint[35]+ (int)$FEint[36];
       $FEPint[5]=(int)$FEint[1]+ (int)$FEint[2]+
                  (int)$FEint[6]+ (int)$FEint[7]+ (int)$FEint[8]+ (int)$FEint[9]+ (int)$FEint[10]+
                  (int)$FEint[12]+(int)$FEint[13]+ (int)$FEint[14]+ (int)$FEint[15];
       $FEPint[6]=(int)$FEint[3]+ (int)$FEint[4]+ (int)$FEint[5]+
                  (int)$FEint[9]+ (int)$FEint[10]+ (int)$FEint[11]+
                  (int)$FEint[17]+ (int)$FEint[18];
       

//Testvariable falls nicht global
//$SEPint[1]=25;
//$FEPint[1]=25;
     
//var_dump($SEPint);var_dump($FEPint);


 
//Korrelation berechnen
$SEPmittel = ($SEPint[1]+ $SEPint[2]+ $SEPint[3]+ $SEPint[4]+ $SEPint[5]+ $SEPint[6])  / 6;
$FEPmittel = ($FEPint[1]+ $FEPint[2]+ $FEPint[3]+ $FEPint[4]+ $FEPint[5]+ $FEPint[6])  / 6;
//var_dump($SEPmittel);var_dump($FEPmittel);

$korrelation =
       (
        (($SEPmittel-$SEPint[1])*($FEPmittel-$FEPint[1]))+
        (($SEPmittel-$SEPint[2])*($FEPmittel-$FEPint[2]))+
        (($SEPmittel-$SEPint[3])*($FEPmittel-$FEPint[3]))+
        (($SEPmittel-$SEPint[4])*($FEPmittel-$FEPint[4]))+
        (($SEPmittel-$SEPint[5])*($FEPmittel-$FEPint[5]))+
        (($SEPmittel-$SEPint[6])*($FEPmittel-$FEPint[6]))
       )
       /
       sqrt
       (
        (
         pow($SEPmittel-$SEPint[1],2)+
         pow($SEPmittel-$SEPint[2],2)+
         pow($SEPmittel-$SEPint[3],2)+
         pow($SEPmittel-$SEPint[4],2)+
         pow($SEPmittel-$SEPint[5],2)+
         pow($SEPmittel-$SEPint[6],2)
        )
        *
        (
         pow($FEPmittel-$FEPint[1],2)+
         pow($FEPmittel-$FEPint[2],2)+
         pow($FEPmittel-$FEPint[3],2)+
         pow($FEPmittel-$FEPint[4],2)+
         pow($FEPmittel-$FEPint[5],2)+
         pow($FEPmittel-$FEPint[6],2)
        )
       );
       //var_dump($korrelation);
       //echo("Korrelation= ".$korrelation."<br>");

//uebereinstimmung in Prozent berechnen
         
for ($i = 1; $i <= 36; $i++)
    {
     if ($SEint[$i] == $FEint[$i])
     {
      $UebereinstimmungSEFE=$UebereinstimmungSEFE+1;  
     }
    }
    
    $UebereinstimmungSEFE=$UebereinstimmungSEFE*100/36;
    //echo("Uebereinstimmung= ".$UebereinstimmungSEFE."<br>");
    
    
    
//profil berechnen 

for ($kompetenz = 0; $kompetenz <= 5; $kompetenz++)
{
    $Xnichtgesetzt=true;    
    for ($punkte = 0; $punkte <= 4; $punkte++)
    {
     if ($SEPint[$kompetenz+1] < (int)$normSE[$kompetenz+1][$punkte]) 
     {
      $SEprofil[$kompetenz][$punkte]="X";
      $punkte =5;$Xnichtgesetzt=false;
     }
    }
     if ($Xnichtgesetzt){$SEprofil[$kompetenz][4]="X";}
}

for ($kompetenz = 0; $kompetenz <= 5; $kompetenz++)
{
    $Xnichtgesetzt=true;
    for ($punkte = 0; $punkte <= 4; $punkte++)
    {
     if ($FEPint[$kompetenz+1] < (int)$normFE[$kompetenz+1][$punkte]) 
     {
      $FEprofil[$kompetenz][$punkte]="X";
      $punkte =5;$Xnichtgesetzt=false;
     }
    }
    if ($Xnichtgesetzt){$FEprofil[$kompetenz][4]="X";}
}
    
    //var_dump($SEprofil);var_dump($FEprofil);
    
// Profil darstellen
?>


<table width="75%" border="0" cellspacing="0" cellpadding="5" class="auto-style5">
  <tr>
    <td width="32%" valign="top" >
    <p><? if (!$druckansicht){echo("<a href=http://paul-koop.org/duesk/db_druckansicht.php?ID=$ID&userID=$userID&session=$session&normtabelle=$normtabelle&druckansicht=1 target=_blank>Druckansicht</a>");}?></p>
    <p><strong>Name: <? echo(" ".$name); ?>
	</strong></p>
      <p><strong>Selbsteinsch&auml;tzung</strong></p>
      <table width="66%" border="1" cellspacing="0" cellpadding="5">
        <tr> 
          <td width="61%">&nbsp;</td>
          <td width="0%" ><strong>1</strong></td>
          <td width="7%" class="auto-style2"><strong>2</strong></td>
          <td width="7%" class="auto-style1"><strong>3</strong></td>
          <td width="7%" class="auto-style2"><strong>4</strong></td>
          <td width="18%" ><strong>5</strong></td>
        </tr>
        <tr> 
          <td ><strong>Arbeitsverhalten </strong> </td>
          <td ><strong><?  if ($SEprofil[0][0]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style2"><strong><?  if ($SEprofil[0][1]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style1"><strong><?  if ($SEprofil[0][2]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style2"><strong><?  if ($SEprofil[0][3]=="X") {echo("X");} ?>
		  </strong></td>
          <td ><strong><?  if ($SEprofil[0][4]=="X") {echo("X");} ?>
		  </strong></td>
        </tr>
        <tr> 
          <td ><strong>Lernverhalten</strong></td>
          <td ><strong><?  if ($SEprofil[1][0]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style2"><strong><?  if ($SEprofil[1][1]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style1"><strong><?  if ($SEprofil[1][2]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style2"><strong><?  if ($SEprofil[1][3]=="X") {echo("X");} ?>
		  </strong></td>
          <td ><strong><?  if ($SEprofil[1][4]=="X") {echo("X");} ?>
		  </strong></td>
        </tr>
        <tr> 
          <td ><strong>Sozialverhalten</strong></td>
          <td ><strong><?  if ($SEprofil[2][0]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style2"><strong><?  if ($SEprofil[2][1]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style1"><strong><?  if ($SEprofil[2][2]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style2"><strong><?  if ($SEprofil[2][3]=="X") {echo("X");} ?>
		  </strong></td>
          <td ><strong><?  if ($SEprofil[2][4]=="X") {echo("X");} ?>
		  </strong></td>
        </tr>
        <tr> 
          <td ><strong>Fachkompetenz</strong></td>
          <td ><strong><?  if ($SEprofil[3][0]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style2"><strong><?  if ($SEprofil[3][1]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style1"><strong><?  if ($SEprofil[3][2]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style2"><strong><?  if ($SEprofil[3][3]=="X") {echo("X");} ?>
		  </strong></td>
          <td ><strong><?  if ($SEprofil[3][4]=="X") {echo("X");} ?>
		  </strong></td>
		 </tr>
        <tr> 
          <td ><strong>Personale Kompetenz</strong></td>
          <td ><strong><?  if ($SEprofil[4][0]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style2"><strong><?  if ($SEprofil[4][1]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style1"><strong><?  if ($SEprofil[4][2]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style2"><strong><?  if ($SEprofil[4][3]=="X") {echo("X");} ?>
		  </strong></td>
          <td ><strong><?  if ($SEprofil[4][4]=="X") {echo("X");} ?>
		  </strong></td>
        </tr>
        <tr> 
          <td ><strong>Methodenkompetenz</strong></td>
          <td ><strong><?  if ($SEprofil[5][0]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style2"><strong><?  if ($SEprofil[5][1]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style1"><strong><?  if ($SEprofil[5][2]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style2"><strong><?  if ($SEprofil[5][3]=="X") {echo("X");} ?>
		  </strong></td>
          <td ><strong><?  if ($SEprofil[5][4]=="X") {echo("X");} ?>
		  </strong></td>
        </tr>
      </table>
      <p><strong>Fremdeinsch&auml;tzun</strong></p>
      <table width="66%" border="1" cellspacing="0" cellpadding="5">
        <tr> 
          <td width="61%">&nbsp;</td>
          <td width="0%" ><strong>1</strong></td>
          <td width="7%" class="auto-style2"><strong>2</strong></td>
          <td width="7%" class="auto-style1"><strong>3</strong></td>
          <td width="7%" class="auto-style2"><strong>4</strong></td>
          <td width="18%" ><strong>5</strong></td>
        </tr>
        <tr> 
          <td ><strong>Arbeitsverhalten </strong> </td>
          <td ><strong><?  if ($FEprofil[0][0]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style2"><strong><?  if ($FEprofil[0][1]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style1"><strong><?  if ($FEprofil[0][2]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style2"><strong><?  if ($FEprofil[0][3]=="X") {echo("X");} ?>
		  </strong></td>
          <td ><strong><?  if ($FEprofil[0][4]=="X") {echo("X");} ?>
		  </strong></td>
        </tr>
        <tr> 
          <td ><strong>Lernverhalten</strong></td>
          <td ><strong><?  if ($FEprofil[1][0]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style2"><strong><?  if ($FEprofil[1][1]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style1"><strong><?  if ($FEprofil[1][2]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style2"><strong><?  if ($FEprofil[1][3]=="X") {echo("X");} ?>
		  </strong></td>
          <td ><strong><?  if ($FEprofil[1][4]=="X") {echo("X");} ?>
		  </strong></td>
        </tr>
        <tr> 
          <td ><strong>Sozialverhalten</strong></td>
          <td ><strong><?  if ($FEprofil[2][0]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style2"><strong><?  if ($FEprofil[2][1]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style1"><strong><?  if ($FEprofil[2][2]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style2"><strong><?  if ($FEprofil[2][3]=="X") {echo("X");} ?>
		  </strong></td>
          <td ><strong><?  if ($FEprofil[2][4]=="X") {echo("X");} ?>
		  </strong></td>
        </tr>
        <tr> 
          <td ><strong>Fachkompetenz</strong></td>
          <td ><strong><?  if ($FEprofil[3][0]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style2"><strong><?  if ($FEprofil[3][1]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style1"><strong><?  if ($FEprofil[3][2]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style2"><strong><?  if ($FEprofil[3][3]=="X") {echo("X");} ?>
		  </strong></td>
          <td ><strong><?  if ($FEprofil[3][4]=="X") {echo("X");} ?>
		  </strong></td>
		 </tr>
        <tr> 
          <td ><strong>Personale Kompetenz</strong></td>
          <td ><strong><?  if ($FEprofil[4][0]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style2"><strong><?  if ($FEprofil[4][1]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style1"><strong><?  if ($FEprofil[4][2]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style2"><strong><?  if ($FEprofil[4][3]=="X") {echo("X");} ?>
		  </strong></td>
          <td ><strong><?  if ($FEprofil[4][4]=="X") {echo("X");} ?>
		  </strong></td>
        </tr>
        <tr> 
          <td ><strong>Methodenkompetenz</strong></td>
          <td ><strong><?  if ($FEprofil[5][0]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style2"><strong><?  if ($FEprofil[5][1]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style1"><strong><?  if ($FEprofil[5][2]=="X") {echo("X");} ?>
		  </strong></td>
          <td class="auto-style2"><strong><?  if ($FEprofil[5][3]=="X") {echo("X");} ?>
		  </strong></td>
          <td ><strong><?  if ($FEprofil[5][4]=="X") {echo("X");} ?>
		  </strong></td>
        </tr>
      </table>      <p>&nbsp;</p>
      <p><strong>Korrelation.<? echo(" ".round($korrelation,2)); ?></strong></p>
      <p>&nbsp;</p>
      <p><strong>&Uuml;bereinstimmung <? echo(" ".round($UebereinstimmungSEFE,2)."%"); ?>
	  </strong></p>
</td>
    <td width="68%">
	<table width="25%" border="1" cellspacing="0" cellpadding="5">
        <tr> 
          <td width="79%" class="auto-style4"><strong>Item</strong></td>
          <td width="0%" class="auto-style4"><strong>SE</strong></td>
          <td width="21%" class="auto-style4"><strong>FE</strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Zuverl&auml;ssigkeit</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[1]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[1]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Arbeitstempo</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[2]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[2]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Arbeitsplanung</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[3]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[3]); ?></strong></td>
		 </tr>
        <tr>
          <td class="auto-style4"><strong>Organisationsf&auml;higkeit</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[4]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[4]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Geschicklichkeit</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[5]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[5]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Ordnung</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[6]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[6]); ?></strong></td>
       </tr>
        <tr>
          <td class="auto-style4"><strong>Sorgfalt</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[7]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[7]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Kreativit&auml;t</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[8]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[8]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Probleml&ouml;sungsf&auml;higkeit</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[9]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[9]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Abstraktionsverm&ouml;gen</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[10]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[10]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Selbstst&auml;ndigkeit</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[11]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[11]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Belastbarkeit</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[12]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[12]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Konzentrationsf&auml;higkeit</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[13]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[13]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Verantwortungsbewu&szlig;tsein</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[14]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[14]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Eigeninitiative</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[15]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[15]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Leistungsbereitschaft</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[16]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[16]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Auffassungsgabe</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[17]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[17]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Merkf&auml;higkeit</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[18]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[18]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Motivationsf&auml;higkeit</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[19]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[19]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Reflektionsf&auml;higkeit</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[20]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[20]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Teamf&auml;higkeit</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[21]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[21]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Hilfsbereitschaft</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[22]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[22]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Kontaktf&auml;higkeit</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[23]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[23]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Respektvoller Umgang</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[24]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[24]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Kommunikationsf&auml;higkeit</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[25]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[25]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Einf&uuml;hlungsverm&ouml;gen</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[26]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[26]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Konfliktf&auml;higkeit</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[27]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[27]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Kritikf&auml;higkeit</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[28]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[28]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Schreiben</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[29]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[29]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Lesen</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[30]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[30]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Mathematik</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[31]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[31]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Naturwissenschaft</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[32]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[32]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Fremdsprachen</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[33]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[33]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>Pr&auml;sentationsf&auml;higkeit</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[34]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[34]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>PC Kenntnisse</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[35]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[35]); ?></strong></td>
        </tr>
        <tr>
          <td class="auto-style4"><strong>F&auml;cher&uuml;bergreifendes Denken</strong></td>
          <td class="auto-style4"><strong><? echo(" ".$SEint[36]); ?></strong></td>
          <td class="auto-style4"><strong><? echo(" ".$FEint[36]); ?></strong></td>
        </tr>
      </table></td>
  </tr>
</table>


<?    
   
?>