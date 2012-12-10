<?php
echo '<p>register_new.php1</p>';
  // 프로젝트에 필요한 함수 파일을 불러온다.
  require_once('bookmark_fns.php');

  // 짧은 스타일의 변수로 만든다.
  $email=$_POST['email'];
  $username=$_POST['username'];
  $passwd=$_POST['passwd'];
  $passwd2=$_POST['passwd2'];
  // 헤더 전에 필요하므로 세션을 시작한다.
  session_start();
  try {
    // 폼이 채워졌는지 확인한다.
    if (!filled_out($_POST)) {
      throw new Exception('You have not filled the form out correctly - please go back and try again.');
    }
echo '<p>'.$email.'</p>';	  
    // 이메일 주소를 확인한다.
    if (!valid_email($email)) { 	 
      throw new Exception('That is not a valid email address. Please go back and try again.');
    }	
echo '<p>register_new.php2</p>';
    // 입력한 비밀번호가 같은지 확인한다.
    if ($passwd != $passwd2) {
      throw new Exception('THe passwords you entered do not match - please go back and try again.');
    }
	
	// 비밀번호 길이를 확인한다.
    // username은 잘라도 괜찮지만, 비밀번호는 너무 길어서는 안 된다.
    if ((strlen($passwd) < 6) || (strlen($passwd) > 16)) {
      throw new Exception('Your password must be between 6 and 16 characters. please go back and try again.');
    } 	
echo '<p>register_new.php3</p>';
    // 사용자를 등록한다.
    // 이 함수는 예외를 던진다.
    register($username, $email, $passwd);
    // 세션 변수를 등록한다.
    $_SESSION['valid_user'] = $username;
echo '<p>register_new.php4</p>';
    // 멤버 페이지로 가는 링크를 출력한다.
    do_html_header('Registration successful');
    echo 'Your registration was successful. Go to the members page to start setting up your bookmards!';
    do_html_url('member.php', 'Go to members page');

    // 페이지의 끝
    do_html_footer();
  }
  catch (Exception $e) {
    do_html_header('Problem:');
    echo $e->getMessage();
    do_html_footer();
    exit;  
  }
echo '<p>register_new.php100</p>';
?>
