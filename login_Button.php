<?php
session_start();
include 'backend/conn.php';

if (isset($_POST['password'])) {
  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
	$logged_in = "Logged in"; //LOGS
	
  $pass = validate($_POST['password']);

  if (empty($pass)){
    header("Location: login.php?error=Password is required");

  }else{
    $sql = "SELECT * FROM `auth` WHERE `pass` = '$pass'";
	$user_log = "INSERT into log(action,date_action) VALUES('$logged_in',NOW())"; //LOGS

    $result = mysqli_query($conn ,$sql);
	$log_result = mysqli_query($conn,$user_log);  //LOGS

    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      if ($row['pass'] === $pass && $log_result) {  //LOGS
        $_SESSION['pass'] = $row['pass'];
        header("Location: Inventory.php");
        exit();
    }else{
      header("Location: login.php?error= Wrong Password");
      exit();
    }
  }else{
    header("Location: login.php?error=Incorect User name or password");
        exit();
  }
}

}else{
  header("Location: login.php");
  exit();
}
?>
