<?php
   /* Working
    This php page will be used to create vendor accounts
        This section also begins the database connection.
  */

   include("../config.php");
   session_start();
   
?>

<html>
<head>
<meta charset = "UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Vendor Account</title>
    <link rel="stylesheet" href="CreateAccount.css">  
</head>
<body>
    
    <div class="Create-Account">
    <div class="form">
        <form class="register-form" method="POST">
        <input type="text" placeholder="Enter Business Name" name="bname" required/>
        <input type="text" placeholder="Enter Username" name="username" required/>
        <input type="password" placeholder="Enter Password" name="password" required/>
        <input type="email" placeholder="Enter Email (ex. admin@admin.com)" name="email" required/>
        <input type="text" placeholder="Business Address" name="address" required/>
        <input type="text" placeholder="State" name="state" required/>
        <input type="text" placeholder="Business Number (ex. 1234567890)" name="Phonenumber" required/>
        <input type="text" placeholder="Service Offerred" name="service" required/>
        <button method="POST">Create Vendor Account</button>
        <p class="message">Are you a User? <a href="CreateAccount.php">Click Here!</a></p>
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
        $mybname = mysqli_real_escape_string($db,$_POST['bname']);
        $myaddress = mysqli_real_escape_string($db,$_POST['address']);
        $mystate = mysqli_real_escape_string($db,$_POST['state']);
        $myphonenumber = mysqli_real_escape_string($db,$_POST['Phonenumber']);
        $myservice = mysqli_real_escape_string($db,$_POST['service']);
        $myservice = strtoupper($myservice);
        $counter = '';
        $lengthemail = strlen($myemail);
        for($i=0; $i<=$lengthemail; $i++){
          if($myemail[$i] == '@'){
            $counter= $myemail[$i];
          }
        }
        // Code snipet that checks to make sure the user isn't already selected
    $sql = "SELECT * FROM VENDOR WHERE Username = '$myusername' OR Email = '$myemail'";
    $result1 = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result1);
    $count = mysqli_num_rows($result1);

    if($count != 0){
            $error2 = "Your Username or Email is already taken!";
            echo $error2;
            $myusername = NULL;
            $mypassword = NULL;
            $myemail = NULL;
            $mybname = NULL;
            $myaddress = NULL;
            $mystate = NULL;
            $myphonenumber = NULL;
            $myservice = NULL;
            $counter = NULL;
            $_SERVER["REQUEST_METHOD"] = "";
        }

    else if($counter =='@'){
                $query = "INSERT INTO `VENDOR`(`V_Name`, `V_Address`, `V_State`, `Username`, `Password`, `Email`, `V_Phone_Number`, `V_Service`) VALUES ('$mybname','$myaddress','$mystate','$myusername','$mypassword','$myemail','$myphonenumber','$myservice')";
                $result = mysqli_query($db,$query);
                if($result)
                {
                  header('Location: ../LoginPage/LoginPageV.php');
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
          $mybname = NULL;
          $myaddress = NULL;
          $mystate = NULL;
          $myphonenumber = NULL;
          $myservice = NULL;
          $counter = NULL;
          $_SERVER["REQUEST_METHOD"] = "";
        }
    }


?>

</html>
