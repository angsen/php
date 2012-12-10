<?php
echo '<p>user_auth_fns.php1</p>';
  function register ($username, $email, $password) {
    // 데이터베이스에 사용자를 등록한다.
    // true나 오류 메시지를 반환한다.
    // 데이터베이스에 접속한다.
    $conn = db_connect();

    // 사용자 이름이 이미 쓰이고 있지 않은지 확인한다.
    $result = $conn->query("select * form user where username = '".$username."'");
    if (!$result) {
      throw new Exception('Could not execute query');
    }

    if ($result->num_rows>0) {
      throw new Exception('That username is taken - go back and choose another one.');
    }
    
    // 모든 조건을 통과하면 데이터베이스에 등록한다.
    $result = $conn->query("insert into user values ('".$username."', sha1('".$password."'), '".$email."')");
    if (!$result) {
      throw new Exception('Could not register you in database - please try again later.');
    }

    return true;
  }

  function login ($username, $password) {
echo '<p>login()1(user_auth_fns.php)</p>';	  
	// 데이터베이스에 사용자 이름과 비밀번호 쌍이 있는지 검사한다.
	// 있으면 true를 반환하고
	// 아니면 예외를 던진다.
echo '<p>$username: '.$username.', $password: '.$password.'(user_auth_fns.php)</p>';
	// 데이터베이스에 접속한다.
	$conn = db_connect();
echo '<p>login()2</p>';
	// 사용자 이름이 이미 쓰이고 있지 않은지 확인한다.
    $result = $conn->query("select * from user where username='".$username."'and passwd = sha1('".$password."')");

	if (!$result) {
	  throw new Exception('Could not log you in.');
	}

	if ($result->num_rows>0) {
	  return true;
	} else {
	  throw new Exception('Could not log you in.');
	}
echo '<p>login()100</p>';
  }

  function check_valid_user() {
	// 사용자가 로그인했는지 확인하고
	// 만약 로그인하지 않았다면 알려준다.
	if (isset($_SESSION['valid_user'])) {
	  echo "Logged in as ".$_SESSION['valid_user'].".<br />";
	} else {
	  // 로그인하지 않았을 경우
	  do_html_heading('Problem:');
	  echo 'You are not logged in.<br />';
	  do_html_url('login.php', 'Login');
	  do_html_footer();
	  exit;
	}
  }  
echo '<p>user_auth_fns.php100</p>';
?>
