<?php

//require_once "config.php";

// Mal� knihovna pro pr�ci s u�ivatelsk�mi vstupy

// -------------------------------------------------------------------------------------------------

function timestamp()
  {
  return date("Y-m-d H:i.s");
  }

function safe_string($text)
// vr�t� "bezpe�n� �etezec", kter� m��eme vypsat na obrazovku bez starost� o poru�en� GUI
  {
/**
* Doporucuji vyuziti dunkce preg_replace
* Jan KAlach
*/

//  $text = str_replace("&", "&amp;", $text);
  $text = str_replace("<", "&lt;", $text);
  $text = str_replace(">", "&gt;", $text);
  $text = str_replace("\\", "", $text);
  $text = str_replace("\"", "&quot;", $text);
  $text = str_replace("'", "`", $text);
  $text = str_replace("�", "&sect;", $text);
  //$text = str_replace("\r\n", " ", $text);
  $text = strip_tags($text);
  return $text;
  }

function safe_string_delete($text)
// vr�t� "bezpe�n� �etezec", kter� m��eme vypsat na obrazovku bez starost� o poru�en� GUI
  {
/**
* Doporucuji vyuziti dunkce preg_replace
* Jan KAlach
*/

//  $text = str_replace("&", "&amp;", $text);
  $text = str_replace("&lt;", "", $text);
  $text = str_replace("&gt;", "", $text);
  $text = str_replace("&quot;", "", $text);
  $text = str_replace("`", "", $text);
  $text = str_replace("&sect;", "", $text);

  //$text = str_replace("\r\n", " ", $text);
  //$text = strip_tags($text);
  return $text;
  }

function clear_lineend($text)
  {
  $text = str_replace("\r\n", " ", $text);
  return $text;
  }

// -------------------------------------------------------------------------------------------------

function orez($text)  // o�ez mezer na za��tku a konci �et�zce
  {
  //$text = "~".$text;
  //// mezery na konci
  //while (substr($text,strlen($text)-1,1) == " ")
  //  $text = substr($text,0,strlen($text)-1);
  //// mezery na zacatku
  //while (substr($text,1,1) == " ")
  //  $text = "~".substr($text,2,strlen($text)-1);
  //// odstranit po��te�n� vlnovku
  //$text = substr($text,1,strlen($text)-1);
  //
  return safe_string(trim($text));
  }

// -------------------------------------------------------------------------------------------------

function bezmezer($text)
  {
  $text = str_replace(" ", "", $text);
  return safe_string($text);
  }

// -------------------------------------------------------------------------------------------------

function system2date($system) // p�evod syst�mov�ho data (RRRR-MM-DD) na �esk� (D.M.R)
  {
  if (ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})", $system, $regs))
    {
    $regs[3] = IntVal($regs[3]);
    $regs[2] = IntVal($regs[2]);
    $regs[1] = IntVal($regs[1]);
    if (strlen($regs[3]) == 1) $regs[3] = "0".$regs[3];
    if (strlen($regs[2]) == 1) $regs[2] = "0".$regs[2];
    return "$regs[3].$regs[2].$regs[1]";
    }
    else
    {
    return false;
    }
  }

// -------------------------------------------------------------------------------------------------

function date2system($date) // p�evod �esky psan�ho data na syst�mov�
  {
  if (ereg ("([0-9]{1,2}).([0-9]{1,2}).([0-9]{4})", bezmezer($date), $regs))
    if (($regs[3] >= 1970) and ($regs[2] <= 2037))					// kontrola rok�
      if (($regs[2] >= 1) and ($regs[2] <= 12))						// kontrola m�s�c�
        if (($regs[1] >= 1) and ($regs[1] <= cal_days_in_month(0, $regs[2], $regs[3])))	// kontrola dn� v dan�m m�s�ci
          if (($regs[3] == 1970) and ($regs[2] == 1) and ($regs[1] == 1))
            {
            return "1970-01-01";
            }
            else
            {
            // p�evod zadan�ho data na timestamp a zp�t na datum (validace)
            $timestamp = mktime(0, 0, 0, $regs[2], $regs[1], $regs[3]);
            return date("Y-m-d", $timestamp);
            }
          else return false;
        else return false;
      else return false;
    else return false;
//  echo $regs[1]."/".$regs[2]."/".$regs[3];
  }

// -------------------------------------------------------------------------------------------------

// Vr�t� text CHECKED pokud je $value <> 0
function setchecked($value)
  {
  if ($value <> 0) return "checked";
    else return "";
  }

// -------------------------------------------------------------------------------------------------

function selectnoyes($name, $value)
  {
  $back = "<select name=\"".$name."\">";
  if ($value == 0) $selected = "SELECTED"; else $selected = "";
  $back .= "<option value = \"0\"  ".$selected." >Ne</option>";
  if ($value == 1) $selected = "SELECTED"; else $selected = "";
  $back .= "<option value = \"1\"  ".$selected." >Ano</option>";
  $back .= "</select>";
  return $back;
  }

// CHECK - kontrola p�evodu datumu
//$date = "hyper extra2 8 /2:2005ghustej string";
//echo "[".$system = date2system($date)."]<br>";
//echo "[".system2date($system)."]<br>";

// CHECK - SafeString
//$text = "<INPUT NAME=\"pozdrav\" VALUE=\"ahoj\">";
//echo safe_string($text)."<br>";
//echo $text;

?>
