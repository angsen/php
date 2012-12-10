<?php

  function get_user_urls($username) {
    // 사용자가 저장한 url을 모두 읽어온다.
	$conn = db_connect();
	$result = $conn->query("select bm_URL from bookmark where username = '".$username."'");

	if (!$result) {
	  return false;
	}

	// URL의 배열을 만든다.
	$url_array = array();
	for ($count = 1; $row = $result->fetch_row(); ++$count) {
	  $url_array[$count] = $row[0];
	}
	return $url_array;
  }
?>
