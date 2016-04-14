<?php

class simpleCMS {
  var $host;
  var $username;
  var $password;
  var $table;

  public function display_public() {
    $q = "SELECT * FROM tour ORDER BY created DESC LIMIT 100";
    $r = mysql_query($q);

    if ( $r !== false && mysql_num_rows($r) > 0 ) {
      while ( $a = mysql_fetch_assoc($r) ) {
        $title = stripslashes($a['title']);
        $bodytext = stripslashes($a['bodytext']);
        $created = stripcslashes($a['created']);
        $created = date("d-m-Y", $created);
        $entry_display = "";
        $entry_display.= <<<ENTRY_DISPLAY
    <article id="story">
      <h2>$title</h2>
      <p class="time">$created</p>
      <div>
        $bodytext
      </div>
    </article>
ENTRY_DISPLAY;
      }
    } else{
      $entry_display = <<<ENTRY_DISPLAY
    <h2>Тази страница е в ремонт</h2>
    <p>
      Няма записи направени на тази страница. 
      Моля върнете се по-късно!
    </p>
ENTRY_DISPLAY;
    }
//     $entry_display .= <<<ADMIN_OPTION
//     <p class="admin_link">
//       <a href="{$_SERVER['PHP_SELF']}?admin=1">Нова статия</a>
//     </p>
// ADMIN_OPTION;

    return $entry_display;
  }

  public function display_admin() {
    return <<<ADMIN_FORM
    <section id="newart">
      <article>
        <form action="{$_SERVER['PHP_SELF']}" method="post" >
          <label for="title">Заглавие:</label>
          <input name="title" id="title" type="text" maxlength="150" />
          <label for="bodytext">Текст:</label>
          <textarea name="bodytext" id="bodytext"></textarea>
          <input type="submit" value="Създай този запис!" />
        </form>
      </article>
    </section>
ADMIN_FORM;
  }

  public function write($p) {
    $title = false;
    $bodytext = false;
    if ( $p['title'] )
      $title = mysql_real_escape_string($p['title']);
    if ( $p['bodytext'])
      $bodytext = mysql_real_escape_string($p['bodytext']);
    if ( $title && $bodytext ) {
      $created = time();
      $sql = "INSERT INTO tour VALUES('$title','$bodytext','$created')";
      return mysql_query($sql);
    } else {
      return false;
    }
  }

  public function connect() {
    mysql_connect($this->host,$this->username,$this->password) or die("Няма връзка. " . mysql_error());
    mysql_select_db($this->table) or die("Не може да избере база данни. " . mysql_error());

    return $this->buildDB();
  }

  private function buildDB() {
    $sql = <<<MySQL_QUERY
    CREATE TABLE IF NOT EXISTS tour (
    title VARCHAR(150),
    bodytext  TEXT,
    created VARCHAR(100)
    )
MySQL_QUERY;
    return mysql_query($sql);
  }
}
set_error_handler("customError");
function customError($errno, $errstr) {
}
?>