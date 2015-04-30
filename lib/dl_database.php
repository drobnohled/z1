<?php

require_once ( "./config.php" );

require_once ( dl_root."lib/dl_connect.php" );
require_once ( dl_root."lib/dl_hash.php" );

// -------------------------------------------------------------------------------------------------

function show_error($text)
  {
  echo "<div style=\"color:#FF0000; background:#FFFFFF; BORDER: 1px solid #000000;\">";
  echo "Došlo k chybì pøi práci s databází (následující zprávu odešlete jako text e-mailem správci systému)<br>";
  echo "</div>";
  echo "<div style=\"color:#FFFFFF; background:#FF0000; BORDER: 1px solid #000000;\">";
  echo "<b>Soubor</b> : ".$_SERVER["SCRIPT_NAME"]." (".date("Y-m-d H:i.s").")</br>";
  echo "<b>Popis chyby</b> : ".$text;
  echo "</div>";
  }

// otevøení databáze - není potøeba ho volat. Pøi každém DB_EXECUTE se databáze pøipojuje a odpojuje
function db_connect(&$db)
  {
  if (!isset($db["DB_TYPE"])) die("<b>DB_CONNECT [".$db["DB_LOCATION"]."]</b> : Není nastavený parametr DB_TYPE");

  switch ($db["DB_TYPE"])
    {
    case DB_MYSQL:
        $link = mysql_connect($db["DB_LOCATION"], $db["DB_USER"], $db["DB_PASSWORD"])
          or die("<b>DB_CONNECT [MYSQL] [".$db["DB_NAME"]."]</b> : Pøipojení k databázi se nezdaøilo");
        mysql_select_db($db["DB_NAME"])
          or die("<b>DB_CONNECT [MYSQL] [".$db["DB_NAME"]."]</b> : Nepodaøilo se vybrat databázi");
        $db["DB_CONNECT"] = $link;
        return $link;
        break;

    case DB_MSSQL:
        $link = mssql_connect($db["DB_LOCATION"], $db["DB_USER"], $db["DB_PASSWORD"])
          or die("<b>DB_CONNECT [MSSQL] [".$db["DB_NAME"]."]</b> : Pøipojení k databázi se nezdaøilo");
        mssql_select_db($db["DB_NAME"])
          or die("<b>DB_CONNECT [MSSQL] [".$db["DB_NAME"]."]</b> : Nepodaøilo se vybrat databázi");
        $db["DB_CONNECT"] = $link;
        return $link;
        break;

    case DB_ORACLE:
        $link = ocilogon($db["DB_USER"], $db["DB_PASSWORD"],$db["DB_LOCATION"])
          or die("<b>DB_CONNECT [ORACLE] [".$db["DB_NAME"]."]</b> : Pøipojení k databázi se nezdaøilo");
        $db["DB_CONNECT"] = $link;
        return $link;
        break;

    case DB_INFORMIX:
        $link = ifx_connect($db[DB_NAME], $db["DB_USER"], $db["DB_PASSWORD"])
          or die("<b>DB_CONNECT [INFORMIX] [".$db["DB_NAME"]."]</b> : Pøipojení k databázi se nezdaøilo");
        $db["DB_CONNECT"] = $link;
        return $link;
        break;
    }
  }

// -------------------------------------------------------------------------------------------------

function db_execute(&$db,$sql)
  {
  if (!isset($db["DB_TYPE"])) die("<b>DB_EXECUTE [".$db["DB_LOCATION"]."]</b> : Není nastavený parametr DB_TYPE");
  if (isset($_SESSION["sqlcount"])) $_SESSION["sqlcount"] = $_SESSION["sqlcount"] + 1;
  //echo "<!-- SQLQUERY !-->";
  //echo "<br><span style=\"color:#FF0000;\">[".$sql."]</span><br>";
  switch ($db["DB_TYPE"])
    {
    case DB_MYSQL:
        ini_set('display_errors', 0);
        if (!isset($db["CONNECTED"])) $db["CONNECTED"] = db_connect($db);
        $result = mysql_query($sql)
          or die(show_error($sql));
        ini_set('display_errors', 1);
        return $result;
        break;

    case DB_MSSQL:
        ini_set('display_errors', 0);
        if (!isset($db["CONNECTED"])) $db["CONNECTED"] = db_connect($db);
        $result = mssql_query($sql)
          or die(show_error($sql));
        ini_set('display_errors', 1);
        return $result;
        break;

    case DB_ORACLE:
        ini_set('display_errors', 0);
        if (!isset($db["CONNECTED"])) $db["CONNECTED"] = db_connect($db);
        $result = OCIParse ($db["DB_CONNECT"], $sql);
        OCIExecute ($result)
          or die(show_error($sql));
        ini_set('display_errors', 1);
        return $result;
        break;

    case DB_INFORMIX:
        ini_set('display_errors', 0);
        if (!isset($db["CONNECTED"])) $db["CONNECTED"] = db_connect($db);
        $result = ifx_query($sql, $db["CONNECTED"])    // tady by se mohl pøidat ještì jeden parametr, JL to používá na MPO
          or die(show_error($sql));
        ini_set('display_errors', 1);
        return $result;
        break;
    }
  }

// -------------------------------------------------------------------------------------------------

function db_fetch($db,$execute)
  {
  if (!isset($db["DB_TYPE"])) die("<b>DB_FETCH [".$db["DB_LOCATION"]."]</b> : Není nastavený parametr DB_TYPE");
  switch ($db["DB_TYPE"])
    {
    case DB_MYSQL:
        ini_set('display_errors', 0);
        if (!isset($db["CONNECTED"])) $db["CONNECTED"] = db_connect($db);
        $line = mysql_fetch_array($execute, MYSQL_ASSOC);
        ini_set('display_errors', 1);
        return $line;
        break;

    case DB_MSSQL:
        // na MFÈR z naprosto neznámých dùvodù je pøi fulltextu warning
        ini_set('display_errors', 0);
        if (!isset($db["CONNECTED"])) $db["CONNECTED"] = db_connect($db);
        $line = mssql_fetch_array($execute, MSSQL_ASSOC);
        ini_set('display_errors', 1);
        return $line;
        break;

    case DB_ORACLE:
        ini_set('display_errors', 0);
        if (!isset($db["CONNECTED"])) $db["CONNECTED"] = db_connect($db);
        OCIFetchInto ($execute, $line, OCI_ASSOC);
        ini_set('display_errors', 1);
        return $line;
        break;

    case DB_INFORMIX:
        ini_set('display_errors', 0);
        if (!isset($db["CONNECTED"])) $db["CONNECTED"] = db_connect($db);
        $line = ifx_fetch_row($execute, "NEXT");
        ini_set('display_errors', 1);
        return $line;
        break;
    }
  }

// -------------------------------------------------------------------------------------------------

function db_getfirst($db,$sql)
  {
  if (!isset($db["DB_TYPE"])) die("<b>DB_GETFIRST [".$db["DB_LOCATION"]."]</b> : Není nastavený parametr DB_TYPE");
  //
  //switch ($db["DB_TYPE"])
  //  {
  //  case DB_MYSQL:
  //      $sql .= " LIMIT 1";
  //      break;
  //  case DB_MSSQL:
  //      $sql = str_replace("SELECT ", "SELECT TOP 1 ", $sql);
  //      break;
  //  }
  //echo $sql."<br>";
  $execute = db_execute($db,$sql);
  $line    = db_fetch($db, $execute);
  return $line;
  }

// -------------------------------------------------------------------------------------------------

// zavírání databáze - není potøeba ho volat. Pøi každém DB_EXECUTE se databáze pøipojuje a odpojuje
function db_close($db)
  {
  if (!isset($db["DB_TYPE"])) die("<b>DB_CLOSE [".$db["DB_LOCATION"]."]</b> : Není nastavený parametr DB_TYPE");
  if (!isset($db["DB_CONNECT"])) die("<b>DB_CLOSE  [".$db["DB_LOCATION"]."]</b> : Nejste pøipojeni k databázi");

  switch ($db["DB_TYPE"])
    {
    case DB_MYSQL:
        $result = mysql_close($db["DB_CONNECT"])
          or die("<b>DB_CLOSE [MYSQL] [".$db["DB_LOCATION"]."]</b> : Databázové pøipojení se nepodaøilo uzavøít");
        return "OK";
        break;

    case DB_MSSQL:
        $result = mssql_close($db["DB_CONNECT"])
          or die("<b>DB_CLOSE [MSSQL] [".$db["DB_LOCATION"]."]</b> : Databázové pøipojení se nepodaøilo uzavøít");
        return "OK";
        break;

    case DB_ORACLE:
        $result = OCILogOff($db["DB_CONNECT"]);
//          or die("<b>DB_CLOSE [ORACLE] [".$db["DB_LOCATION"]."]</b> : Databázové pøipojení se nepodaøilo uzavøít");
        return "OK";
        break;

    case DB_INFORMIX:
        $result = ifx_close($db["DB_CONNECT"])
          or die("<b>DB_CLOSE [INFORMIX] [".$db["DB_LOCATION"]."]</b> : Databázové pøipojení se nepodaøilo uzavøít");
        return "OK";
        break;
    }
  }

// -------------------------------------------------------------------------------------------------

// Zjisteni poètu záznamù z minulého selectu
function db_rowcount($db, $result)
  {
  if (!isset($db["DB_TYPE"])) die("<b>DB_CLOSE [".$db["DB_LOCATION"]."]</b> : Není nastavený parametr DB_TYPE");
  if (!isset($db["DB_CONNECT"])) die("<b>DB_CLOSE  [".$db["DB_LOCATION"]."]</b> : Nejste pøipojeni k databázi");

  switch ($db["DB_TYPE"])
    {
    case DB_MYSQL:
        $num = mysql_num_rows($result)
          or die("<b>DB_ROWCOUNT [MYSQL] [".$db["DB_LOCATION"]."]</b> : Nepodaøilo se zjistit poèet øádkù");
        return $num;
        break;

    case DB_MSSQL:
        $num = mssql_num_rows($result)
          or die("<b>DB_ROWCOUNT [MSSQL] [".$db["DB_LOCATION"]."]</b> : Nepodaøilo se zjistit poèet øádkù");
        return $num;
        break;

    case DB_ORACLE:
        $num = OCILogOff($db["DB_CONNECT"]);
//          or die("<b>DB_ROWCOUNT [ORACLE] [".$db["DB_LOCATION"]."]</b> : Nepodaøilo se zjistit poèet øádkù");
        return $num;
        break;

    case DB_INFORMIX:
        $num = ifx_close($db["DB_CONNECT"])
          or die("<b>DB_ROWCOUNT [INFORMIX] [".$db["DB_LOCATION"]."]</b> : Nepodaøilo se zjistit poèet øádkù");
        return $num;
        break;
    }
  }

// -------------------------------------------------------------------------------------------------

// funkce na vypsání dotazu v tabulce
function db_printselect($db, $sql)
  {
  echo "<table>";
  echo "\t<tr>\n\t\t<td>";
  //echo "\t\t<b><center>.: $sql :.</center><b><br>\n";
  echo "\t\t</td>\n\t\t</tr>\n";
  echo "\t<tr>\n\t\t<td>";

  if (!$db["DB_TYPE"]) die("<b>DB_PRINTSELECT [".$db["DB_NAME"]."]</b> : Není nastavený parametr DB_TYPE");

  $line = db_getfirst($db, $sql);

  if ($line <> "")
    {
    print "\t\t<table cellspacing=0 cellpadding=5 border=0>\n";
    echo "<tr>";
    echo "<th>#</th>";

    foreach ((array)$line as $key => $col_value)
      {
      print "\t\t\t\t<th><b>$key</b></th>\n";
      }
    echo "</tr>";

    $radek = 1;
    $result = db_execute($db, $sql);
    while ($line = db_fetch($db, $result))
      {
      print "\t\t\t<tr>\n";
      echo "<td>$radek</td>";
      foreach ((array)$line as $col_value)
        {
        print "\t\t\t\t<td>$col_value&nbsp;</td>\n";
        }
      print "\t\t\t</tr>\n";
      $radek++;
      }

    print "\t\t</table>\n<br>";
    echo "</td></tr>";
    }
    else echo "Dotaz bez výsledku...";
  echo "</table>";
  }

?>
