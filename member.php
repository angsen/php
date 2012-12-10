<?php
echo '<p>member.php1</p>';
  // 프로젝트에 필요한 함수 파일을 불러온다.
  require_once('bookmark_fns.php');
  session_start();
echo '<p>member.php2</p>';

  // 짧은 스타일의 변수로 만든다.
  $username = $_POST['username'];
  $passwd = $_POST['passwd'];
echo '<p>member.php3</p>';
echo '<p>$username: '.$username.', $passwd: '.$passwd.'(member.php)</p>';
if ($username && $passwd) {
echo '<p>member.php4</p>';  
	// 로그인 시도
	try{
		
echo '<p>member.php5</p>';  
	  login($username, $passwd);
	  // 데이터베이스에 사용자 아이디를 등록했을 경우
	  $_SESSION['valid_user'] = $username;
	
echo '<p>member.php6</p>';  
	}
	catch(Exception $e) {

echo '<p>member.php7</p>';  
	  // 로그인하지 못했을 경우
	  do_html_header('Problem:');
	  echo 'You could not be logged in. You must be logged in to view page.';
	  do_html_url('login.php', 'Login');
	  do_html_footer();
	  exit;

echo '<p>member.php8</p>';  
	}
  }
echo '<p>member.php9</p>';  
  do_html_header('Home');
  check_valid_user();
echo '<p>member.php10</p>';
  // 사용자가 저장한 북마크를 읽어온다.
  if ($url_array = get_user_urls($_SESSION['valid_user'])) {
	display_user_urls($url_array);
  }

  // 메뉴를 보여준다.
  display_user_menu();

  do_html_footer(); 
echo '<p>member.php100</p>';
?>
