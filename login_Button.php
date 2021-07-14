<?php
//session_start();
include 'backend/conn.php';

if (isset($_POST['password'])) {
  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $pword = validate($_POST['password']);

  if (empty($pword)){
    header("Location: login.php?error=PAssword is required");

  }else{
    $sql = "SELECT * FROM `auth` WHERE `pass` = '$pword'";

    $result = mysqli_query($conn ,$sql);

    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      if ($row['pass'] === $pword) {
        header("Location: kapagalan.php");
        exit();

      }
    }else{
      header("Location: login.php?error=patalon kang hayop ka mali password mo");
      exit();
    }
  }

}else{
  header("Location: login.php");
  exit();
}

?>
