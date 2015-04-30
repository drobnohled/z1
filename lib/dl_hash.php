<?php

//Knihovna na kódování a dekódování údajù posílaných pomocí metody GET (zobrazuje se v pøíkazové øádce)

// jenom základní znaky  (obsahuje všechny kódovatelné znaky)
define("HASHKEY","_.,-1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ");      // použitelné znaky (klíè)
define("HASH_ENABLED","abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890_.,-"); // použitelné znaky (text který vrací GET_ENABLED_CHARS();


// kódovací klíè s diakritikou (obsahuje všechny kódovatelné znaky)
// define(HASHKEY,"_ ,-1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZìšèøžýáíéùúÌŠÈØŽÝÁÍÉÙÚò¾Ò¼");

// -------------------------------------------------------------------------------------------------

function get_enabled_chars()
  {
  return HASH_ENABLED;
  }

function prehash_check($text)
// Kontrola stringu pøed hashováním (jestli obsahuje jen povolené znaky)
  {
  if (unhash(u_hash($text)) == $text) return true;
    else return false;
  }

function u_hash($text)
// Zakódování øetìzce $text do blíže nespecifikovaného formátu
  {
  // nulování promìných (kvùli warnings a notices)
  $text1 = "";
  $text2 = "";
  $localkey = "";
  $hash = "";

  // generování klíèe obsaženého ve výsledném textu (následnì se porovnává s HASHKEY)
  while (strlen($hash) <> (strlen($text)*3))
    {
    for ($i = 1; $i <= strlen($text); $i++)
      $localkey = $localkey.substr(HASHKEY,(rand(0, strlen(HASHKEY)-1)),1);

     // generování prvního øetezce (pøiètení PUBLICKEY)
    for ($i = 0; $i <= (strlen($text)-1); $i++)
      {
      $znak1 = strpos(HASHKEY,substr($text,$i,1));
      $znak2 = strpos(HASHKEY,substr($localkey,$i,1));
      $number = ($znak1 + $znak2)%(strlen(HASHKEY));
      $znak = substr(HASHKEY,$number,1);
      $text1 = $text1.$znak;
      }

    // generování druhého øetezce (odeètení PUBLICKEY)
    for ($i = 0; $i <= (strlen($text)-1); $i++)
      {
      $znak1 = strpos(HASHKEY,substr($text,$i,1));
      $znak2 = strpos(HASHKEY,substr($localkey,$i,1));
      $number = ($znak1 - $znak2)%(strlen(HASHKEY));
      $znak = substr(HASHKEY,$number,1);
      $text2 = $text2.$znak;
      }

    // spojení publickey + první øetezec + druhý øetìzec
    $hash = $localkey.$text1.$text2;
    }

  return $hash;
  }

// -------------------------------------------------------------------------------------------------

function unhash($text)
// Dekódovací funkce. Jako vstupní hodnota se používá výstupní hodnota funkce HASH.
// Celá funkce má pøesnì obrácený postup = dekódování
  {
  // nulování promìných (kvùli warnings a notices)
  $res1 = "";
  $res2 = "";

  // rozdìlení na PUBLICKEY, první øetìzec a druhý øetezec
  $len = strlen($text)/3;
  if ((strlen($text)%3) > 0) return null;
  $localkey = substr($text,0,$len);
  $text1 = substr($text,$len,$len);
  $text2 = substr($text,$len*2,$len);

  // odeètení PUBLICKEY
  for ($i = 0; $i <= ($len-1); $i++)
    {
    $znak1 = strpos(HASHKEY,substr($text1,$i,1));
    $znak2 = strpos(HASHKEY,substr($localkey,$i,1));
    $number = ($znak1 - $znak2)%(strlen(HASHKEY));
    if ($number == 0) $number = strlen(HASHKEY);
    $znak = substr(HASHKEY,$number,1);
    $res1 = $res1.$znak;
    }

  // pøiètení PUBLICKEY
  for ($i = 0; $i <= ($len-1); $i++)
    {
    $znak1 = strpos(HASHKEY,substr($text2,$i,1));
    $znak2 = strpos(HASHKEY,substr($localkey,$i,1));
    $number = ($znak1 + $znak2)%(strlen(HASHKEY));
    if ($number == 0) $number = strlen(HASHKEY);
    $znak = substr(HASHKEY,$number,1);
    $res2 = $res2.$znak;
    }

  if ($res1 == $res2) return $res1; else return null;
  }

// -------------------------------------------------------------------------------------------------

// CHECK - HASH + UNHASH
//$text = "EPD";
//$hash = u_hash($text);
//echo "[$hash]<br>";
//if (unhash($hash)) echo "[".unhash($hash)."]";
//  else echo "Hell ain't a bad place to be...";

//echo unhash("osC");
?>
