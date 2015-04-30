    <h2>KONCERTY / AKCE</h2>

    <?php
    require_once "lib/dl_database.php";
    require_once "lib/dl_input.php";

    $db["DB_TYPE"] = DB_MYSQL;
    $db["DB_LOCATION"] = "mysql.easy.xnet.cz";
    $db["DB_NAME"] = "mybandzone";
    $db["DB_USER"] = "mybandzone";
    $db["DB_PASSWORD"] = "aaa";

    echo "<p><table border=1 style=\"width:100%;\">";
    $count = 0;
    $res = db_execute($db, "Select A.DATE, U.BANDNAME , A.PLACE, A.DESCRIPTION from new_actions A Inner Join new_users U on A.USER_ID = U.ID WHERE A.DATE >= '".date2system(date("d.m.Y"))."' order by A.date");
    while($line = db_fetch($db, $res))
      {
      echo "<tr><td>";
      echo system2date($line["DATE"]);
      echo "</td><td>";
      if ($line["BANDNAME"] <> "")
        echo $line["BANDNAME"].", ";
      echo $line["PLACE"];
      if ($line["DESCRIPTION"] <> "")
      echo ", ".$line["DESCRIPTION"];
      echo "&nbsp;</td></tr>";
      $count++;
      }
    echo "</table>";
    echo "<br><b>Každý uživatel zkušeben mùže zadat své koncerty/akce v systému INTRES.</b>";
    echo "</p><br>"
    ?>
