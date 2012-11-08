<?php

  // 프로젝트에 필요한 함수 파일을 불러온다.
  require_once('bookmark_fns.php');
  session_start();

  // 짧은 스타일의 변수로 만든다.
  $username = $_POST['username'];
  $passwd = $_POST['passwd'];

  if ($username && passwd) {	
	// 로그인 시도
	try{
	  login($username, $passwd);
	  // 데이터베이스에 사용자 아이디를 등록했을 경우
	  $_SESSION['valid_user'] = $username;
	}
	catch(Exception $e) {
	  // 로그인하지 못했을 경우
	  do_html_header('Problem:');
	  echo 'You could not be logged in. You must be logged in to view page.';
	  do_html_url('login.php', 'Login');
	  do_html_footer();
	  exit;
	}
  }

  do_html_header('Home');
  check_valid_user();
  // 사용자가 저장한 북마크를 읽어온다.
  if ($url_array = get_user_urls($_SESSION['valid_user'])) {
	display_user_urls($url_array);
  }

  // 메뉴를 보여준다.
  display_user_menu();

  do_html_footer(); 

?>
