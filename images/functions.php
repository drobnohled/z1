<?php

function generate_menubutton($caption, $link)
  {
  if (strpos("~".$link, "."))
    {
    echo "\n<div class=\"menubutton\" onmouseover=\"this.style.background='#7199B0';\" onmouseout=\"this.style.background='#85AAC0'\" onclick=\"location='".$link."'\">";
    }
    else
    {
    echo "\n<div class=\"menubutton\" onmouseover=\"this.style.background='#7199B0';\" onmouseout=\"this.style.background='#85AAC0'\" onclick=\"location='index.php?content=".$link."'\">";
    }
  echo "\n\t".$caption."</div>\n";
  }

function generate_menubutton_red($caption, $link)
  {
  if (strpos("~".$link, "."))
    {
    echo "\n<div class=\"menubuttonred\" onmouseover=\"this.style.background='#FF0000';\" onmouseout=\"this.style.background='#EF6363'\" onclick=\"location='".$link."'\">";
    }
    else
    {
    echo "\n<div class=\"menubuttonred\" onmouseover=\"this.style.background='#FF0000';\" onmouseout=\"this.style.background='#EF6363'\" onclick=\"location='index.php?content=".$link."'\">";
    }
  echo "\n\t".$caption."</div>\n";
  }

?>
