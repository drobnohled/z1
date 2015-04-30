<?php



function generate_menubutton($caption, $link)

  {

  if (strpos("~".$link, "."))

    {

    echo "\n<div class=\"menubutton\" onmouseover=\"this.style.background='#222222';\" onmouseout=\"this.style.background='#000000'\" onclick=\"location='".$link."'\">";

    }

    else

    {

    echo "\n<div class=\"menubutton\" onmouseover=\"this.style.background='#222222';\" onmouseout=\"this.style.background='#000000'\" onclick=\"location='index.php?content=".$link."'\">";

    }

  echo "\n\t".$caption."</div>\n";

  }



function generate_menubutton_red($caption, $link)

  {

  if (strpos("~".$link, "."))

    {

    echo "\n<div class=\"menubuttonred\" onmouseover=\"this.style.background='#dd0000';\" onmouseout=\"this.style.background='#c90000'\" onclick=\"location='".$link."'\">";

    }

    else

    {

    echo "\n<div class=\"menubuttonred\" onmouseover=\"this.style.background='#dd0000';\" onmouseout=\"this.style.background='#c90000'\" onclick=\"location='index.php?content=".$link."'\">";

    }

  echo "\n\t".$caption."</div>\n";

  }
  
function generate_menubutton_blue($caption, $link) {
  
  echo "\n<div class=\"menubutton_blue\" onmouseover=\"this.style.background='#0033ee';\" onmouseout=\"this.style.background='#0000c9'\" onclick=\"location='index.php?content=".$link."'\">";
  echo "\n\t".$caption."</div>\n";

}

?>