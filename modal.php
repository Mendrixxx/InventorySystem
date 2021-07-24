<?php
include ("backend/conn.php");
if (!isset($_SESSION['pass'])) {
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
      <h1>Change password</h1>
      <form action = "change_pass.php" method="post">

      <?php if (isset($_GET['error'])) { ?>
       		<p class="error"><?php echo $_GET['error']; ?></p>
       <?php } ?>

       <?php if (isset($_GET['success'])) { ?>
              <p class="success"><?php echo $_GET['success']; ?></p>
       <?php } ?>

        <div class="txt_field">
          <input type="password" name = "op" required>
          <span></span>
          <label>Current Password</label>
        </div>

        <div class="txt_field">
          <input type="password" name = "np" required>
          <span></span>
          <label>New Password</label>
        </div>

        <div class="txt_field">
          <input type="password" name = "c_np" required>
          <span></span>
          <label>Confirm New Password</label>
        </div>

        <input type="submit" value="Save">
        <a href="login.php">Return to login</a>


      </form>
    </div>

  </body>
</html>

<?php
}else{
      header("Location: kapagalan.php");
      exit();
}
?>
