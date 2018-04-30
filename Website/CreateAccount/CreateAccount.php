<?php
   /* Working
    This php page will be used to create user and vendor accounts
        This section also begins the database connection.
  */

   include("../config.php");
   session_start();
   
?>

<html>
<head>
<meta charset = "UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Create Account</title>
    <link rel="stylesheet" href="CreateAccount.css">  
</head>
<body>
    
    <div class="Create-Account">
    <div class="form">
        <form class="vendor-form" method="POST">
        <input type="text" placeholder="Username" name="username" required/>
        <input type="password" placeholder="Password" name="password" required/>
        <input type="text" placeholder="Email" name="email" required/>
        <input type="text" placeholder="First Name" name="fname" required/>
        <input type="text" placeholder="Last Name" name="lname" required/>
        <input type="text" placeholder="Phone Number" name="pnumber" required/>
        <button method="POST">Create Account</button>
        <p class="message">Are you a Vendor? <a href="CreateAccountV.php">Click Here!</a></p>
        <p class="message">Already Registered? <a href="../LoginPage/LoginPage.php">Click Here!</a></p>
        </form>    
        
        </div>
    </div>
    

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") { //Form if a normal user is creating an account
        $myusername = mysqli_real_escape_string($db,$_POST['username']);
        $myusername = strtoupper($myusername);
        $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
        $myemail = mysqli_real_escape_string($db,$_POST['email']);
        $myfname = mysqli_real_escape_string($db,$_POST['fname']);
        $mylname = mysqli_real_escape_string($db,$_POST['lname']);
        $mypnumber = mysqli_real_escape_string($db,$_POST['pnumber']);
        $counter = '';
        $lengthemail = strlen($myemail);
        for($i=0; $i<=$lengthemail; $i++){
          if($myemail[$i] == '@'){
            $counter= $myemail[$i];
          }
        }
        // Code snipet that checks to make sure the user isn't already selected
    $sql = "SELECT * FROM STUDENT WHERE Username = '$myusername' OR Email = '$myemail'";
    $result1 = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result1);
    $count = mysqli_num_rows($result1);

    if($count != 0){
            $error2 = "Your Username or Email is already taken!";
            echo $error2;
            $myusername = NULL;
            $mypassword = NULL;
            $myemail = NULL;
            $counter = NULL;
            $_SERVER["REQUEST_METHOD"] = "";
        }

    else if($counter =='@'){
                $query = "INSERT INTO `STUDENT`(`F_Name`, `L_Name`, `Username`, `Password`, `Email`, `S_Phone_Number`) VALUES ('$myfname','$mylname','$myusername','$mypassword','$myemail','$mypnumber')";
                $result = mysqli_query($db,$query);
                if($result)
                {
                  header('Location: ../LoginPage/LoginPage.php');
                }
                else{
                  echo "error";
               }
          }
    else{
          $error = "Your email is invalid";
          echo $error;
          $myusername = NULL;
          $mypassword = NULL;
          $myemail = NULL;
          $counter = NULL;
          $_SERVER["REQUEST_METHOD"] = "";
        }
    }  
?>
</html>