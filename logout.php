<?php

  // 프로젝트에 필요한 함수 파일을 불러온다.
  require_once('bookmark_fns.php');
  session_start();
  $old_user = $_SESSION['valid_user'];
  
  // 사용자가 로그인했었는지 검사하기 위해 $old_user에 세션값을 저장한다.
  unset($_SESSION['valid_user']);
  $result_dest = session_destroy();

  // 출력 함수를 호출한다.
  do_html_header('Logging out');

  if (!empty($old_user)) {
	if ($result_dest) {
	  // 로그인했었고 이제 로그아웃했을 때
	  echo 'Logged out.<br />';
	  do_html_url('login.php', 'Login');
	} else {
	  // 로그인했었고 로그아웃하지 못했을 때
	  echo 'Could not log you out.<br />';
	}
  } else {
	  // 로그인하지 않았는데 이 페이지로 왔을 때
  	  echo 'You were not logged in, and so have not been logged out.<br />';
	  do_html_url('loggin.php', 'Login');
  }

  do_html_footer();

?>
