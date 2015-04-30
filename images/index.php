<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<?php

$default = "aktualne";

/*
$content = ""; 
$article = ""; 
$link = "";
*/
if (isset($_GET["content"])) $content = $_GET["content"];
else $content = $default;
//if (isset($_GET["article"])) $article = $_GET["article"];

/*
if (strpos("~".$content, "http://") > 0)
  {
  header("location:".$content);
  exit;
  }
*/
require_once ("functions.php");
?>

<html>

  <head>
	<title>Zku�ebny.com | Profesion�ln� vybaven� hudebn� zku�ebny Praze</title>
	<meta name="description" content="Zku�ebny.com - komplex kvalitn� vybaven�ch a klimatizovan�ch zku�eben v centru Prahy. Odhlu�nen� prostory, nahr�vac� studio, n�zk� ceny, ka�d� zku�ebna m� zna�kovou v�bavu od Audiopro.cz" />
	<meta name="keywords" content="zku�ebny, zku�ebna, hudebn�, zkou�en�, hran�, kapely, kapela, audiopro, n�zk�, ceny, klimatizovan�, zku�ebnu, p�j�ovna, n�stroj, apar�t" />
        <meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1250">
        <link rel="stylesheet" type="text/css" href="styles/styles.css">
  </head>

<body>


<!--  PageCaption !-->
<div style="left:1px; top:0px; position:absolute;" >
  <!-- <a href="http://www.7arts.cz">
    <img src="images/pagecaption_2.gif" title="" class="no-border" style="margin-left: 1px" alt="" />
  </a> !-->
  
  <img src="images/pagecaption_2.gif" title="" class="no-border" style="margin-left: 1px" alt="" usemap="#headermap" />

  <map id="headermap" name="headermap">
    <area shape="rect" coords="0,45,150,80" alt="Hlavn� str�nka" href="index.php" />
    <area shape="rect" coords="720,40,880,80" alt="Provozovatel 7arts s.r.o." href="http://www.7arts.cz" />
  </map>

</div>

<!--  ButtonMenu !-->
<div style="left: 1px; top: 89px; position: absolute; width: 147px;" >
  <?php
  generate_menubutton_red("INTRES", "http://intres.salash.cz");
  generate_menubutton_red("KUP SI VSTUPENKU !!!", "http://www.ticketstream.cz/pls/czech/dls.dls_mainpage_tr?language_id=2&code=ZKUSEBNY");
  generate_menubutton("Aktu�ln�", "aktualne");
  generate_menubutton("Zku�ebny", "zakladni");
  generate_menubutton("Slu�by", "sluzby");
  generate_menubutton("Vybaven�", "vybaveni");
  generate_menubutton("Ceny", "cenyaslevy");
  generate_menubutton("Reference", "reference");
  generate_menubutton("M�dia", "media");
  generate_menubutton("Archiv", "archiv1");
  generate_menubutton("Kontakt", "kontakt");
  //http://7arts.salash.cz
  //echo "<br>";

  generate_menubutton_red("Diskuzn� f�rum", "http://forum.salash.cz/nove");
  //generate_menubutton_red("Pravidla u��v�n� f�ra", "forumpravidla");
  echo "<br>";
  ?>

	

  <div class="menubutton">
        <center>

	<b>Partne�i projektu</b><br /><br />

  	<a target="audiopro" href="http://www.audiopro.cz"><img src="images/logo_audiopro.gif" width="120" height="42" alt="Logo AudioPro" title="Logo AudioPro" /></a>
        <br /><a target="audiopro" href="http://www.audiopro.cz" style="color: white; text-decoration: none">AudioPro</a><br /><br />

  	<a target="retro" href="http://www.retropraha.cz"><img src="images/retro.gif" width="120" height="48" title="Logo RETRO" alt="Logo RETRO" /></a>
        <br /><a target="retro" href="http://www.retropraha.cz" style="color: white; text-decoration: none">RETRO</a><br /><br />
        
        <a target="Jet Club" href="http://www.jetclub.cz"><img src="images/jet.gif" width="120" height="48" title="Logo Jet" alt="Logo Jet" /></a>
        <br /><a target="Jet Club" href="http://www.jetclub.cz" style="color: white; text-decoration: none">KLUB JET</a><br /><br />
        
  	<a target="echo" href="http://www.kulturniecho.com"><img src="images/kulturniecho.gif" width="120" height="45" title="Logo KULTURN� ECHO" alt="Logo KULTURN� ECHO" /></a><br /><a target="echo" href="http://www.kulturniecho.com" style="color: white; text-decoration: none">KULTURN� ECHO</a><br /><br />

	  <a target="mraveniste" href="http://www.mraveniste.cz"><img src="images/mraveniste.jpg" width="120" height="49" title="Logo Mraveni�t�" alt="Logo Mraveni�t�" /></a><br /><a target="mraveniste" href="http://www.mraveniste.cz" style="color: white; text-decoration: none">MRAVENI�T�.CZ</a><br /><br />

  	<a target="mapex" href="http://www.mapex.cz/"><img src="images/mapex_logo.gif" width="120" class="no-border" height="42" title="Logo Mapex" alt="Logo Mapex" /></a>
        <br /><a target="mapex" href="http://www.mapex.cz/" style="color: white; text-decoration: none">MAPEX</a><br /><br />
        
    <a target="echo" href="http://www.sonorista.cz"><img src="images/sonor.gif" width="120" title="Logo SONOR" alt="Logo SONOR" /></a><br /><a target="echo" href="http://www.sonorista.cz" style="color: white; text-decoration: none">SONORISTA</a><br /><br />

<a target="echo" href="http://www.bunkr-club.cz"><img src="images/bunkr.jpg" width="120" title="Logo Bunkr" alt="Logo Bunkr" /></a><br /><a target="echo" href="http://www.bunkr-club.cz" style="color: white; text-decoration: none">BUNKR</a><br /><br />.

  	<a target="praha3" href="http://www.praha3.cz"><img src="images/logo_praha3.gif" width="120" height="61" alt="Logo M� Praha 3" title="Logo M� Praha 3" /></a>
        <br /><a target="praha3" href="http://www.praha3.cz" style="color: white; text-decoration: none">M� Praha 3</a><br /><br />
    
    </center>

  </div>

  <br />
  <center>
  <a href="http://www.toplist.cz/stat/136650" ><script language="JavaScript" type="text/javascript">
  <!--
  document.write ('<img src="http://toplist.cz/count.asp?id=136650&amp;logo=mc&amp;start=1328&amp;http='+escape(document.referrer)+'&amp;wi='+escape(window.screen.width)+'&he='+escape(window.screen.height)+'&amp;cd='+escape(window.screen.colorDepth)+'&amp;t='+escape(document.title)+'" width="88" height="60" border=0 alt="TOPlist" />');
  //--></script><noscript><img SRC="http://toplist.cz/count.asp?id=136650&amp;logo=mc&amp;start=1328" border="0"
  alt="TOPlist" width="88" height="60" /></noscript></a>
  </center>

</div>
  
   <br />

    <div class="menubuttonblue">
    	<div class="menubuttonblue-in">

    <h2><center><a href="index.php?content=english" style="color: #FFFFFF; text-decoration: none;"><img src="images/us.png" title="" class="no-border" style="margin-left: 1px" alt="" />
      ENGLISH VERSION</a></center></h2>

    <hr class="panel" align="center" width="95%" />
       
		<h2>ZKUSEBNY.COM NAB�Z�:</h2>
	
			<ul>
				<li>20 profi zku�eben v centru</li>
				<li>100/h = sd�len� zku�ebna</li>
				<li>800/m = neomezen� zkou�en�</li>
        <li>5000/m = vlastn� zku�ebna</li>
        <li>zkou�en� zdarma pro st�l� u�ivatele</li>
				<li>klimatizovan� odhlu�n�n� zku�ebny</li>
				<li>kvalitn� udr�ovan� apar�ty a bic�</li>
				<li>mo�nost z�znamu p��mo ve zku�ebn�</li>
				<li>50% v nahr�vac�m studiu zdarma</li>
				<li>online harmonogram pro rezervace</li>
				<li>uzamykateln� zabezpe�n� sklady</li>
				<li>p�j�ovna hudebn�ho vybaven�</li>
				<li>p�j�ovna hudebn�ch n�stroj�</li>
				<li>p�j�ovna hudebn�ch apar�t�</li>
				<li>autodoprava, sv�tla, zvuk</li>
				<li>hudebn� n�stroje, hudebn� apar�ty</li>
				<li>kytary, bic�, baskytary, klav�ry</li>
				<li>v�uka hry na hudebn� n�stroje</li>
				<li>um�leck� agentura, hudebn� produkce</li>
				<li>propagace, promotion, booking</li>
				<li>dal�� ...</li>
			</ul>
			
			<hr class="panel" align="center" width="95%" />
			
    <p><b>KONCERTY</b></p>
    
    <p style="text-align:left;">
    <?php include("http://zkusebny.salash.cz/koncerty.php"); ?>
    </p>

</div></div>
<!--  Content !-->
<div class="content">    <!--  top: 234px;  !-->
  <div class="sirka">
    <?php
    
//    if ($content <> "") $link = "content/".$content.".php";
//    if ($article <> "") $link = "clanky/".$article.".php";
    
//    if (file_exists($link))
		$link = "content/".$content.".php"; 
		require_once $link;
      //else 
//	  require_once "content/".$default.".php";
      
    ?>
  </div>
<!--  PageBottom !-->
<!--
<div style="position: absolute; margin-left: -149px; top: 990px">
<div style="font-size: 9px; font-family: Verdana; width: 980px; margin-left: 15px;" align="center">
<a href="http://letenky.mraveniste.cz/" title="Letenky levn� do cel�ho sv�ta">Letenky levn�</a> |
<a href="http://darky.mraveniste.cz/" title="Origin�ln� d�rky k v�noc�m - d�rky na v�noce 2007">V�no�n� d�rky - d�rky na v�noce</a> | 
<a href="http://afro.cz" title="Afro.cz - africk� tance, bubny, djembe, kurzy bubnov�n�">Bubny, Afrika</a> | 
<a href="http://www.perfectclinic.cz" title="Plastick� a estetick� chirurgie">Plastick� chirurgie</a> | 
<a href="http://www.ortopedica.cz" title="Ortopedica.cz - zdravotn� obuv, ortopedick� obuv, ortopedick� vlo�ky, ortopedick� pom�cky">Zdravotn� obuv</a> | 
<a href="http://www.btu.cz" title="Cestovn� agentura, pron�jem voz�, cestovn� poji�t�n�">Cestovn� agentura</a> | 
<a href="http://www.tsandrea.cz" title="Tane�n� studio Andrea - tane�n� �kola - step, balet, hip-hop atd.">Step, tane�n� studio</a> | 
<a href="http://ubytovani.mraveniste.cz" title="Katalog a rezervace ubytov�n� v �R a Evrop�">Ubytov�n�</a> | 
<a href="http://recepty.mraveniste.cz/" title="Recepty z cel�ho sv�ta">Recepty</a> | 
<a href="http://www.bubliny.cz/" title="Bubliny.cz - v��kov� pr�ce">V��kov� pr�ce</a> |
<a href="http://restaurace.mraveniste.cz" title="Restaurace, kav�rny, bary a hospody">Restaurace - denn� menu</a>&nbsp;| 
<a href="http://kultura.mraveniste.cz" title="Kulturn� Soir�e - kulturn� magaz�n on-line">Kultura - filmy, divadlo, literatura, hudba a galerie</a> | 
<a href="http://www.interier74.cz" title="Interi�r74 - interi�ry, sklen�n� p���ky, sklen�n� st�ny, terasy a podlahy">Sklen�n� p���ky</a> | 
<a href="http://www.edekor.cz/" title="Dekorace interi�r�">Dekorace</a> | 
<a href="http://kina.mraveniste.cz" title="Kina - programy kin, premi�ry film�">Kina - programy kin</a> | 
<a href="http://www.volmut.cz/" title="Plastov� okna, plastov� dve�e, z�bradl�, zimn� zahrady">Plastov� okna</a> | 
<a href="http://www.btu.cz/" title="Cestovn� agentura Business Travel Unlimited">Cestovn� agentura</a> | 
<a href="http://www.karatevision.cz/" title="Karate Vision">Karate</a> | 
<a href="http://www.aas.cz/" title="Letenky �SA">Letenky �SA</a> | 
<a href="http://www.tociteschodiste.cz/" title="Luxusn� to�it� schodi�t�">To�it� schodi�t�</a> | 
<a href="http://www.ortopedica.cz/" title="Ortopedica - zdravotn� obuv, vlo�ky do bot, zdravotn� vlo�ky">Zdravotn� obuv</a> | 
<a href="http://www.logitron.cz/" title="Termostaty">Termostaty</a> | 
<a href="http://www.kadernictvi.org/prodluzovani-vlasu/" title="Prodlu�ov�n� vlas�">Prodlu�ov�n� vlas�</a> | 
<a href="http://www.uzijsito.cz/" title="V�no�n� d�rky">V�no�n� d�rky</a>
!-->
<br /><br />
</div>

  <div><img src="images/pagebottom_2.gif" alt="" class="no-border" style="margin-left: 1px"></div>
</div>

</body>
</html>
