<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
  <h1>Login</h1>
  <?php
    if (isset($error_message)) {
      echo "<div style='color:red;'>" . $error_message . "</div>";
    }
  ?>
  <form action="welcome/verif" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username">
    <br><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
    <br><br>
    <input type="submit" value="Submit">
  </form>
</body>
</html>