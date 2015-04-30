<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php
$default = "aktualne";
if (isset($_GET["content"])) $content = $_GET["content"];
else $content = $default;
require_once ("functions.php");
?>
<html>
<head> 
<title>
Zkusebny.com - volnočasová kulturní centra a nejen hudební zkušebny
</title>

<meta name="description" content="Zkusebny.com - nejen hudební zkušebny">    

<meta name="keywords" content="zkušebna, zkušebny, hudební, kapely, muzikant, aparát, kytara, bicí">

<meta name="robots" content="INDEX, FOLLOW">    
<meta name="author" content="DABE">    
<meta http-equiv="Pragma" content="no-cache">    
<meta http-equiv="Content-Type" content="text/html; charset=windows-1250">    
<link rel="stylesheet" type="text/css" href="styles.css">
</head>  

<body>    
<div class="stred">  
<h1>Zkušebny.com - volnočasová kulturní centra, hudební zkušebny aj.</h1>
      <!--  PageCaption !-->
<div id="pagecaption">        
<img src="images/pagecaption_2.gif" title="" class="no-border" alt="" usemap="#headermap">        
<map id="headermap" name="headermap">          
<area shape="rect" coords="0,45,150,80" alt="Hlavní stránka" href="index.php">          
<area shape="rect" coords="720,40,880,80" alt="www.zkusebny.com" href="http://www.zkusebny.com">        </map>      </div>      

<!--  ButtonMenu !-->      
<div id="buttommenu">
<?php
generate_menubutton_red("Registrace", "registrace"); echo "<br>";
generate_menubutton_red("Členský klub", "sluzby");
generate_menubutton_red("Rezervace", "http://intres1.salash.cz");
generate_menubutton("Aktuálně", "aktualne");
generate_menubutton("Zkušebny", "zakladni");
generate_menubutton("Ceny", "cenyaslevy");
generate_menubutton_red("Servis", "servis");
generate_menubutton_red("KONTAKT", "kontakt");
generate_menubutton("Reference", "reference");
generate_menubutton("Média", "media");
generate_menubutton("Odkazy", "odkazy");                 
     
?>   
                               


<br >      </div>   <br >      <div class="menubuttonblue">        <div class="menubuttonblue-in">          <h2>            <a href="index.php?content=english">              <img height="15" src="images/flag_uk.gif" title="" class="no-border" alt="">              <img height="15" src="images/flag_german.gif" title="" class="no-border" alt="">              <img height="15" src="images/flag_russian.gif" title="" class="no-border" alt="">              <img height="15" src="images/flag_slovak.gif" title="" class="no-border" alt="">              <img height="15" src="images/flag_french.gif" title="" class="no-border" alt="">              <img height="15" src="images/flag_italian.gif" title="" class="no-border" alt="">            </a>          </h2>          <hr class="panel" align="center" width="95%" >          <h2>zkusebny.com nabízí:</h2>          <ul class="zoznam">            

<li>Po celé zemi</li>            
<li>Od 15 Kč za hodinu</li>
<li>Od 500 měsíčně</li>            
<li>Od 2000 měsíčně nesdíleně</li>            
<li>Online harmonogram</li>
<li>Zabezpečné sklady</li>            
<li>Slevy pro stálé uživatele</li>
<li>Nonstop provoz dle potřeby</li>
<li>Nahrávání ve zkušebně</li>            
<li>50% sleva na studio</li>            
<li>ZÁRUKA NEJNIŽŠÍ CENY ZBOŽÍ</li>
<li>ZÁRUKA NEJNIŽŠÍ CENY SLUŽEB</li>
<li>ZÁRUKA 3 ROKY NA VÝROBKY</li>            
<li>Marshall, Pearl a další značky</li>                     
<li>50% sleva vaší faktury za mobil</li>
<li>Půjčovna hudebního vybavení</li>            
<li>Půjčovna hudebních nástrojů</li>            
<li>Půjčovna hudebních aparátů</li>            
<li>Pojištění hudebnin</li>            
<li>Autodoprava, světla, zvuk</li>            
<li>Hudební nástroje a aparáty</li>            
<li>Kytary, bicí, baskytary, klavíry</li>            
<li>Výuka hry na hudební nástroje</li>            
<li>Umělecká agentura a produkce</li>            
<li>Propagace, promotion, booking</li>                    
<li>Mnoho dalšího ... </li>          
</ul>          

<iframe src="http://www.facebook.com/plugins/likebox.php?id=137174089645586&amp;width=220&amp;connections=10&amp;stream=true&amp;header=false&amp;height=400" scrolling="no" frameborder="0" id="fb_iframe"></iframe><?php    require_once "lib/dl_database.php";    require_once "lib/dl_input.php";    $db["DB_TYPE"] = DB_MYSQL;    $db["DB_LOCATION"] = "mysql.easy.xnet.cz";    $db["DB_NAME"] = "mybandzone";    $db["DB_USER"] = "mybandzone";    $db["DB_PASSWORD"] = "aaa";    $res = db_execute($db, "Select A.DATE, U.BANDNAME , A.PLACE, A.DESCRIPTION from new_actions A Inner Join new_users U on A.USER_ID = U.ID WHERE A.DATE >= '".date2system(date("d.m.Y"))."' order by A.date");    $count = 0;    while($line = db_fetch($db, $res)) {      if ($count == 0)        echo "<h2>Koncerty členů ZKUSEBNY.COM:</h2>";      else        echo "<br><br>";      echo "<b>".system2date($line["DATE"])." - ".$line["BANDNAME"]."</b>";      if ($line["PLACE"] <> "")        echo ", ".$line["PLACE"];      if ($line["DESCRIPTION"] <> "")        echo ", ".$line["DESCRIPTION"];      $count++;    }?>        <br><br>        </div>      </div>      <!--  Content !-->      <div class="content">        <!--  top: 234px;  !-->        <div class="sirka">          <div class="okraj"><?php        $link = "content/".$content.".php";        require_once $link;?> <a href="https://plus.google.com/101345178961279997003" rel="publisher">Google+</a>          </div>        </div>        <!--  PageBottom !--><br ><br >      </div>    </div>  </body></html>
