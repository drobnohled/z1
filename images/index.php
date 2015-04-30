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
	<title>Zkušebny.com | Profesionálnì vybavené hudební zkušebny Praze</title>
	<meta name="description" content="Zkušebny.com - komplex kvalitnì vybavených a klimatizovaných zkušeben v centru Prahy. Odhluènené prostory, nahrávací studio, nízké ceny, každá zkušebna má znaèkovou výbavu od Audiopro.cz" />
	<meta name="keywords" content="zkušebny, zkušebna, hudební, zkoušení, hraní, kapely, kapela, audiopro, nízké, ceny, klimatizované, zkušebnu, pùjèovna, nástroj, aparát" />
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
    <area shape="rect" coords="0,45,150,80" alt="Hlavní stránka" href="index.php" />
    <area shape="rect" coords="720,40,880,80" alt="Provozovatel 7arts s.r.o." href="http://www.7arts.cz" />
  </map>

</div>

<!--  ButtonMenu !-->
<div style="left: 1px; top: 89px; position: absolute; width: 147px;" >
  <?php
  generate_menubutton_red("INTRES", "http://intres.salash.cz");
  generate_menubutton_red("KUP SI VSTUPENKU !!!", "http://www.ticketstream.cz/pls/czech/dls.dls_mainpage_tr?language_id=2&code=ZKUSEBNY");
  generate_menubutton("Aktuálnì", "aktualne");
  generate_menubutton("Zkušebny", "zakladni");
  generate_menubutton("Služby", "sluzby");
  generate_menubutton("Vybavení", "vybaveni");
  generate_menubutton("Ceny", "cenyaslevy");
  generate_menubutton("Reference", "reference");
  generate_menubutton("Média", "media");
  generate_menubutton("Archiv", "archiv1");
  generate_menubutton("Kontakt", "kontakt");
  //http://7arts.salash.cz
  //echo "<br>";

  generate_menubutton_red("Diskuzní fórum", "http://forum.salash.cz/nove");
  //generate_menubutton_red("Pravidla užívání fóra", "forumpravidla");
  echo "<br>";
  ?>

	

  <div class="menubutton">
        <center>

	<b>Partneøi projektu</b><br /><br />

  	<a target="audiopro" href="http://www.audiopro.cz"><img src="images/logo_audiopro.gif" width="120" height="42" alt="Logo AudioPro" title="Logo AudioPro" /></a>
        <br /><a target="audiopro" href="http://www.audiopro.cz" style="color: white; text-decoration: none">AudioPro</a><br /><br />

  	<a target="retro" href="http://www.retropraha.cz"><img src="images/retro.gif" width="120" height="48" title="Logo RETRO" alt="Logo RETRO" /></a>
        <br /><a target="retro" href="http://www.retropraha.cz" style="color: white; text-decoration: none">RETRO</a><br /><br />
        
        <a target="Jet Club" href="http://www.jetclub.cz"><img src="images/jet.gif" width="120" height="48" title="Logo Jet" alt="Logo Jet" /></a>
        <br /><a target="Jet Club" href="http://www.jetclub.cz" style="color: white; text-decoration: none">KLUB JET</a><br /><br />
        
  	<a target="echo" href="http://www.kulturniecho.com"><img src="images/kulturniecho.gif" width="120" height="45" title="Logo KULTURNÍ ECHO" alt="Logo KULTURNÍ ECHO" /></a><br /><a target="echo" href="http://www.kulturniecho.com" style="color: white; text-decoration: none">KULTURNÍ ECHO</a><br /><br />

	  <a target="mraveniste" href="http://www.mraveniste.cz"><img src="images/mraveniste.jpg" width="120" height="49" title="Logo Mraveništì" alt="Logo Mraveništì" /></a><br /><a target="mraveniste" href="http://www.mraveniste.cz" style="color: white; text-decoration: none">MRAVENIŠTÌ.CZ</a><br /><br />

  	<a target="mapex" href="http://www.mapex.cz/"><img src="images/mapex_logo.gif" width="120" class="no-border" height="42" title="Logo Mapex" alt="Logo Mapex" /></a>
        <br /><a target="mapex" href="http://www.mapex.cz/" style="color: white; text-decoration: none">MAPEX</a><br /><br />
        
    <a target="echo" href="http://www.sonorista.cz"><img src="images/sonor.gif" width="120" title="Logo SONOR" alt="Logo SONOR" /></a><br /><a target="echo" href="http://www.sonorista.cz" style="color: white; text-decoration: none">SONORISTA</a><br /><br />

<a target="echo" href="http://www.bunkr-club.cz"><img src="images/bunkr.jpg" width="120" title="Logo Bunkr" alt="Logo Bunkr" /></a><br /><a target="echo" href="http://www.bunkr-club.cz" style="color: white; text-decoration: none">BUNKR</a><br /><br />.

  	<a target="praha3" href="http://www.praha3.cz"><img src="images/logo_praha3.gif" width="120" height="61" alt="Logo MÈ Praha 3" title="Logo MÈ Praha 3" /></a>
        <br /><a target="praha3" href="http://www.praha3.cz" style="color: white; text-decoration: none">MÈ Praha 3</a><br /><br />
    
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
       
		<h2>ZKUSEBNY.COM NABÍZÍ:</h2>
	
			<ul>
				<li>20 profi zkušeben v centru</li>
				<li>100/h = sdílená zkušebna</li>
				<li>800/m = neomezené zkoušení</li>
        <li>5000/m = vlastní zkušebna</li>
        <li>zkoušení zdarma pro stálé uživatele</li>
				<li>klimatizované odhluènìné zkušebny</li>
				<li>kvalitní udržované aparáty a bicí</li>
				<li>možnost záznamu pøímo ve zkušebnì</li>
				<li>50% v nahrávacím studiu zdarma</li>
				<li>online harmonogram pro rezervace</li>
				<li>uzamykatelné zabezpeèné sklady</li>
				<li>pùjèovna hudebního vybavení</li>
				<li>pùjèovna hudebních nástrojù</li>
				<li>pùjèovna hudebních aparátù</li>
				<li>autodoprava, svìtla, zvuk</li>
				<li>hudební nástroje, hudební aparáty</li>
				<li>kytary, bicí, baskytary, klavíry</li>
				<li>výuka hry na hudební nástroje</li>
				<li>umìlecká agentura, hudební produkce</li>
				<li>propagace, promotion, booking</li>
				<li>další ...</li>
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
<a href="http://letenky.mraveniste.cz/" title="Letenky levnì do celého svìta">Letenky levnì</a> |
<a href="http://darky.mraveniste.cz/" title="Originální dárky k vánocùm - dárky na vánoce 2007">Vánoèní dárky - dárky na vánoce</a> | 
<a href="http://afro.cz" title="Afro.cz - africké tance, bubny, djembe, kurzy bubnování">Bubny, Afrika</a> | 
<a href="http://www.perfectclinic.cz" title="Plastická a estetická chirurgie">Plastická chirurgie</a> | 
<a href="http://www.ortopedica.cz" title="Ortopedica.cz - zdravotní obuv, ortopedická obuv, ortopedické vložky, ortopedické pomùcky">Zdravotní obuv</a> | 
<a href="http://www.btu.cz" title="Cestovní agentura, pronájem vozù, cestovní pojištìní">Cestovní agentura</a> | 
<a href="http://www.tsandrea.cz" title="Taneèní studio Andrea - taneèní škola - step, balet, hip-hop atd.">Step, taneèní studio</a> | 
<a href="http://ubytovani.mraveniste.cz" title="Katalog a rezervace ubytování v ÈR a Evropì">Ubytování</a> | 
<a href="http://recepty.mraveniste.cz/" title="Recepty z celého svìta">Recepty</a> | 
<a href="http://www.bubliny.cz/" title="Bubliny.cz - výškové práce">Výškové práce</a> |
<a href="http://restaurace.mraveniste.cz" title="Restaurace, kavárny, bary a hospody">Restaurace - denní menu</a>&nbsp;| 
<a href="http://kultura.mraveniste.cz" title="Kulturní Soirée - kulturní magazín on-line">Kultura - filmy, divadlo, literatura, hudba a galerie</a> | 
<a href="http://www.interier74.cz" title="Interiér74 - interiéry, sklenìné pøíèky, sklenìné stìny, terasy a podlahy">Sklenìné pøíèky</a> | 
<a href="http://www.edekor.cz/" title="Dekorace interiérù">Dekorace</a> | 
<a href="http://kina.mraveniste.cz" title="Kina - programy kin, premiéry filmù">Kina - programy kin</a> | 
<a href="http://www.volmut.cz/" title="Plastová okna, plastové dveøe, zábradlí, zimní zahrady">Plastová okna</a> | 
<a href="http://www.btu.cz/" title="Cestovní agentura Business Travel Unlimited">Cestovní agentura</a> | 
<a href="http://www.karatevision.cz/" title="Karate Vision">Karate</a> | 
<a href="http://www.aas.cz/" title="Letenky ÈSA">Letenky ÈSA</a> | 
<a href="http://www.tociteschodiste.cz/" title="Luxusní toèité schodištì">Toèité schodištì</a> | 
<a href="http://www.ortopedica.cz/" title="Ortopedica - zdravotní obuv, vložky do bot, zdravotní vložky">Zdravotní obuv</a> | 
<a href="http://www.logitron.cz/" title="Termostaty">Termostaty</a> | 
<a href="http://www.kadernictvi.org/prodluzovani-vlasu/" title="Prodlužování vlasù">Prodlužování vlasù</a> | 
<a href="http://www.uzijsito.cz/" title="Vánoèní dárky">Vánoèní dárky</a>
!-->
<br /><br />
</div>

  <div><img src="images/pagebottom_2.gif" alt="" class="no-border" style="margin-left: 1px"></div>
</div>

</body>
</html>
