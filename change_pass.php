<?php
if (!isset($_SESSION['pass'])) {
include 'backend/conn.php';

if (isset($_POST['op']) && isset($_POST['np']) && isset($_POST['c_np'])) {
  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $op = validate($_POST['op']);
  $np = validate($_POST['np']);
  $c_np = validate($_POST['c_np']);

  if(empty($op)){
    header("Location: modal.php?error=Current Password is required");
    exit();
  }else if(empty($np)){
    header("Location: modal.php?error=New Password is required");
    exit();
  }else if($np !== $c_np){
    header("Location: modal.php?error=Confirmation password does not match");
    exit();
  }else{

    //$id = $_SESSION['pass']
    $sql = "SELECT `pass` FROM `auth` WHERE `pass` = '$op'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) === 1){

        $sql_2 = "UPDATE `auth` SET `pass` = '$np' WHERE `pass` = '$op'";
        mysqli_query($conn, $sql_2);
        header("Location: modal.php?success=Your password has been changed successfully");
        exit();

    }else{
      header("Location: modal.php?error=Incorrect Password");
      exit();
    }

  }

}else{
  header("Location: modal.php?error");
  exit();
}

}
?>
