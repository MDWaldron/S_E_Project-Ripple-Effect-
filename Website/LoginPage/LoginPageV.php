<?php

  include("../config.php");
  session_start();
?>

<!DOCTYPE html>
<html lang = "en-US">
 <head>
 <meta charset = "UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Vendor Login</title>
 <link rel = "stylesheet" type = "text/css" href ="LoginPage.css"/>

 </head>
 <body>


<form action="" method="POST">
  <div class="imgcontainer">
    <img src="../Pictures/RippleEffectLogo.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="passw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit">Login</button>
  </div>

  <!--This section is for the lower part of the page containing the forgot password section and cancel button-->
  <div class="container" style="background-color:#f1f1f1">
    <a href="../HomePage/HomePage.html">
      <button type="button" class="cancelbutton">Cancel</button>
    </a>
    <p class="message"><a href="../CreateAccount/CreateAccountV.php">Need to Register?</a></p>
    <p class="message"><a href="../LoginPage/LoginPage.php">Neet To Login as a User?</a></p>
  </div>
</form>

<?php
      if($_SERVER["REQUEST_METHOD"] == "POST"){

    $myusername = mysqli_real_escape_string($db,$_POST['username']);
    $myusername = strtoupper($myusername);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']);
    $sql = "SELECT V_ID FROM VENDOR WHERE Username = '$myusername' AND Password = '$mypassword'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);
    if($count !=0) {
     $_SESSION['login_user'] = $myusername;
     header("location: ../HomePage/HomePage.php");
    }else {
      $error = "Your Login Name or Password is invalid";
      echo $error;
      $myusername = NULL;
      $mypassword = NULL;
      $_SERVER["REQUEST_METHOD"] = "";
   }
  }
     
     ?>
     
     
</body>
</html>