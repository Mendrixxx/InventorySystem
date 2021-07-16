<?php
session_start();
include ("backend/conn.php");
if (isset($_SESSION['pass'])) {
  header("Location: kapagalan.php")
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inventory System</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="center">
      <h1>Inventory System of Supply Office</h1>
      <form  action="login_Button.php" method="post">
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <input type="submit" value="Login">

        <!--Modal-->
            <a href="modal.php" class='sidebar-link'>
                <span>Change Password?</span>
            </a>

      </form>
    </div>

  </body>
</html>
<?php
