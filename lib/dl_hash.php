<?php

//Knihovna na k�dov�n� a dek�dov�n� �daj� pos�lan�ch pomoc� metody GET (zobrazuje se v p��kazov� ��dce)

// jenom z�kladn� znaky  (obsahuje v�echny k�dovateln� znaky)
define("HASHKEY","_.,-1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ");      // pou�iteln� znaky (kl��)
define("HASH_ENABLED","abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890_.,-"); // pou�iteln� znaky (text kter� vrac� GET_ENABLED_CHARS();


// k�dovac� kl�� s diakritikou (obsahuje v�echny k�dovateln� znaky)
// define(HASHKEY,"_ ,-1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ����������̊�؎�������ҍ�");

// -------------------------------------------------------------------------------------------------

function get_enabled_chars()
  {
  return HASH_ENABLED;
  }

function prehash_check($text)
// Kontrola stringu p�ed hashov�n�m (jestli obsahuje jen povolen� znaky)
  {
  if (unhash(u_hash($text)) == $text) return true;
    else return false;
  }

function u_hash($text)
// Zak�dov�n� �et�zce $text do bl�e nespecifikovan�ho form�tu
  {
  // nulov�n� prom�n�ch (kv�li warnings a notices)
  $text1 = "";
  $text2 = "";
  $localkey = "";
  $hash = "";

  // generov�n� kl��e obsa�en�ho ve v�sledn�m textu (n�sledn� se porovn�v� s HASHKEY)
  while (strlen($hash) <> (strlen($text)*3))
    {
    for ($i = 1; $i <= strlen($text); $i++)
      $localkey = $localkey.substr(HASHKEY,(rand(0, strlen(HASHKEY)-1)),1);

     // generov�n� prvn�ho �etezce (p�i�ten� PUBLICKEY)
    for ($i = 0; $i <= (strlen($text)-1); $i++)
      {
      $znak1 = strpos(HASHKEY,substr($text,$i,1));
      $znak2 = strpos(HASHKEY,substr($localkey,$i,1));
      $number = ($znak1 + $znak2)%(strlen(HASHKEY));
      $znak = substr(HASHKEY,$number,1);
      $text1 = $text1.$znak;
      }

    // generov�n� druh�ho �etezce (ode�ten� PUBLICKEY)
    for ($i = 0; $i <= (strlen($text)-1); $i++)
      {
      $znak1 = strpos(HASHKEY,substr($text,$i,1));
      $znak2 = strpos(HASHKEY,substr($localkey,$i,1));
      $number = ($znak1 - $znak2)%(strlen(HASHKEY));
      $znak = substr(HASHKEY,$number,1);
      $text2 = $text2.$znak;
      }

    // spojen� publickey + prvn� �etezec + druh� �et�zec
    $hash = $localkey.$text1.$text2;
    }

  return $hash;
  }

// -------------------------------------------------------------------------------------------------

function unhash($text)
// Dek�dovac� funkce. Jako vstupn� hodnota se pou��v� v�stupn� hodnota funkce HASH.
// Cel� funkce m� p�esn� obr�cen� postup = dek�dov�n�
  {
  // nulov�n� prom�n�ch (kv�li warnings a notices)
  $res1 = "";
  $res2 = "";

  // rozd�len� na PUBLICKEY, prvn� �et�zec a druh� �etezec
  $len = strlen($text)/3;
  if ((strlen($text)%3) > 0) return null;
  $localkey = substr($text,0,$len);
  $text1 = substr($text,$len,$len);
  $text2 = substr($text,$len*2,$len);

  // ode�ten� PUBLICKEY
  for ($i = 0; $i <= ($len-1); $i++)
    {
    $znak1 = strpos(HASHKEY,substr($text1,$i,1));
    $znak2 = strpos(HASHKEY,substr($localkey,$i,1));
    $number = ($znak1 - $znak2)%(strlen(HASHKEY));
    if ($number == 0) $number = strlen(HASHKEY);
    $znak = substr(HASHKEY,$number,1);
    $res1 = $res1.$znak;
    }

  // p�i�ten� PUBLICKEY
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
