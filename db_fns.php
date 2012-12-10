<?php
echo '<p>db_fns.php1</p>';
  function db_connect() {
echo '<p>db_connect()1(db_fns.php)</p>';
echo '<p>$result = new mysqli();(db_fns.php)</p>';
//	$result = new mysqli('localhost', 'bm_user', 'password', 'bookmarks');
	$result = new mysqli('localhost/php', 'angsen', 'password', 'bookmarks');
echo '<p>db_connect()2</p>';
	if (!$result) {
echo '<p>db_connect()3</p>';		
	  throw new Exception('Could not connect to database server');	  
	} else {
echo '<p>db_connect()4</p>';		
	  return $result;
	}
echo '<p>db_connect()100</p>';	
  }
echo '<p>db_fns.php100</p>';
?>
