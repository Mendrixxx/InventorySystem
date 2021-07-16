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

  $pass = validate($_POST['password']);

  if (empty($pass)){
    header("Location: login.php?error=PAssword is required");

  }else{
    $sql = "SELECT * FROM `auth` WHERE `pass` = '$pass'";

    $result = mysqli_query($conn ,$sql);

    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      if ($row['pass'] === $pass) {
        $_SESSION['pass'] = $row['pass'];
        header("Location: kapagalan.php");
        exit();
    }else{
      header("Location: login.php?error=patalon kang hayop ka mali password mo");
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
