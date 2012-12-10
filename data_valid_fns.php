<?php

  function filled_out($form_vars) {
    // 모든 변수가 값을 가지고 있는지 확인한다.
    foreach ($form_vars as $key => $value) {
      if ((!isset($key)) || ($value == '')) {
        return false;
      }
    }
    return true;
  }

  function valid_email($address) {
    // 이메일 주소 형식이 옳은지 확인한다.
    if (ereg('^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$', $address)) {
      return true;
    } else {
      return false;
    }
  }

?>
