    <?php 
    session_start();
  
    if(empty($_SESSION["csrf"])){
        $_SESSION["csrf"] = bin2hex(random_bytes(32));
    }
   
    $connect = mysqli_connect("localhost","root","","testdb");
    if(!$connect){
        echo"<body style='background-color:black;color:white;padding:50px;'>
        <h1 style='font-size:30px;color:white;align-self:center;background-color:red;'>NO INTERNET CONNECTION!..OR SERVER IS DOWN </h1>
        <p style='color:white;'> Sorry,the server seems to be down.Please be patient as we work down to regain back the connection </p>
       </body>";
    }

     //create table
     mysqli_query($connect,"CREATE TABLE IF NOT EXISTS users(
     id INT AUTO_INCREMENT PRIMARY KEY,
     firstname VARCHAR(50) NOT NULL, 
     lastname VARCHAR(50) NOT NULL,
      email VARCHAR(70) NOT NULL UNIQUE,
      password VARCHAR(255) NOT NULL,
      category VARCHAR(50) NOT NULL )
      VALUES('','','','','','')");

      //registeration
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["registerbtn"]))
    {
        if(isset($_POST["csrf"],$_SESSION["csrf"]) && hash_equals($_POST["csrf"],$_SESSION["csrf"]))
        {
            die("Sorry,you have being blocked from accessing the platform");
        }

        $first_name = mysqli_real_escape_string($connect,$_POST["username"]);
        $lastname = mysqli_real_escape_string($connect,$_POST["lastname"]);
        $email = mysqli_real_escape_string($connect,$_POST["email"]);
        $pass = $_POST["password"];
        $confirm_pass = $_POST["confirmpassword"];
        $category = $_POST["category"];
        $_SESSION["first_name"] = $_POST["username"];

        $res = mysqli_query($connect,"SELECT * FROM users WHERE email = '$email' ");
        if(mysqli_num_rows($res) > 0){
            echo"<p style='margin-top:12px;color:red;'>Sorry, this email is already in use.Use another  email or login using it.</p>";
        }
        elseif($pass !== $confirm_pass){
            echo"<p style='margin-top:12px;color:red;'>Passwords does not match!</p>";
        }
         elseif(!isset($category)){
           echo"<p style='margin-top:12px;color:red;'>Please choose one category either a user or an admin</p>";
         }
        elseif(isset($_POST["user"]) && isset($_POST["admin"])){
            echo"<p style='margin-top:12px;color:red;'>Please choose one category whether a user or admin.You cannot both be a user and an admin at the same time!!!</p>";
        }
        else{
            $password = password_hash($pass,PASSWORD_DEFAULT);
           
            if($category == "user")
            {
                  $user = "user";
                 $sqli = "INSERT INTO users (`firstname`,`lastname`,`email`,`password`,`category`)
                     VALUES (?,?,?,?,?)   ";
                $stmt = mysqli_prepare($connect,$sqli);
                mysqli_stmt_bind_param($stmt,"sssss",$first_name , $lastname , $email,$password,$user);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                mysqli_close($connect);
                header("Location: home.php");
                exit();
            }

             elseif($category == "admin")
            {
                  $admin = "admin";
                 $sql = "INSERT INTO users (`firstname`,`lastname`,`email`,`password`,`category`)
                     VALUES (?,?,?,?,?)   ";
                $stmt = mysqli_prepare($connect,$sql);
                mysqli_stmt_bind_param($stmt,"sssss",$first_name,$lastname,$email,$password,$admin);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                mysqli_close($connect);
               header("Location: verification.html");
               exit();
                
            }
        }
    }




     // login setup 
     if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["log_btn"]))
     {
        $log_email = mysqli_real_escape_string($connect,$_POST["log_email"]);
        $log_password = $_POST["log_password"];

        $query = "SELECT * FROM users WHERE email = '$log_email' ";
        $result = mysqli_query($connect,$query);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $db_email = htmlspecialchars($row["email"]);
            $db_pass = htmlspecialchars($row["password"]);
            $_SESSION["first_name"] = htmlspecialchars($row["firstname"]);
            if(password_verify($log_password,$db_pass))
               {
                 header("Location: home.php");
                 exit();
               }
            else{
                echo "<p style='margin-top:12px;color:red;'>Passwords is Incorrect</p>";
            }
        }
        else{
            echo "<p style='margin-top:12px;color:red;'>Email not found</p>";
        }
     }
     mysqli_close($connect);

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eccomerce</title>
    <style>
*{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    background-color: transparent;
} 
a{
    text-decoration: none;
}
.registertitle{
    display: flex;
    justify-self: center;
    padding-top: 70px;
    color: purple;
}
.register{
    margin-left: 40%;
    box-shadow: 3px 4px 3px 4px black;
    padding: 12px;
    background-color:transparent ;
    backdrop-filter: blur(123px);
    width: 31%;
    height: fit-content;
    border-radius: 19px;
    display: none; 
    padding-bottom: 24px;
    margin-top: 23px;

    
}
.topic{
    display: flex;
    justify-content: center;
    color: green;
    align-self: center;
}
.password ,.lastname ,.username, .email{
    width: 88%;
    margin-left: 3%;
    height: 24px;
    border-top: none;
    border-radius: 12px;
}
.register h2{
    display: flex;
    justify-content: center;
    color: black;
    font-size: 16px;
    margin-bottom: 6px;
}
/*checkbox*/
.pcheck{
    display: flex;
    flex-direction: row;
    justify-content:space-between ;
}
.pcheck p{
    font-size: 15px;
}
#category{
    margin-left: 12%;
    font-size: 21px;
    margin-top: 12px;
    margin-bottom: 10px;
}
#pcheck{
    margin-left: 4%;
    font-size: 18px;
    margin-bottom: 10px;
    display: flex;
    justify-content: space-evenly;
}
/* styles for registration button*/
.regbtn{
    width: 100%;
    border-radius: 12px;
    background-color: purple;
    height: 30px;
    cursor: pointer;
    margin-bottom: 8px;
}
.regbtn:hover{
 background-color: purple;
 opacity: 0.9;
}
.learnmore{
    color: rgb(10, 119, 28);
    cursor: pointer;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font-weight: 700;
    font-size: 16px;
}
.learnmore:hover{
    color: rgb(46, 35, 197);
}
/*sytyles for login statement below registration form*/
.plogin{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 20px;
    margin-left: 12px;
    margin-bottom: 10px;
}
.plogin a{
    margin-left: 7px;
}




/* Terms and condition s template   */
.terms{
   background-color: transparent; 
   color: rgb(41, 7, 7);
   padding: 36px;
   display: none;
   
}
.backreg{
    width: 123px;
    height: 35px;
    cursor: pointer;
    background-color: aqua;
    border-radius: 12px;
    float: left;
    margin-bottom: 32px;
}
.backreg:hover{
    opacity: 0.8;
}
.terms ol li {
    margin-left: 8%;
    margin-right: 9%;
    font-size: 27px;
    word-spacing: 9px;
}
.terms p{
    margin-left: 3%;
    font-size: 26px;
}
/*giving the forms functionality*/

/* Login template  */
.login{
     margin-left: 38%;
     margin-top: 10%;
     margin-bottom: 10%;
    box-shadow: 3px 4px 3px 4px black;
    padding: 5px;
    background-color: white;
    backdrop-filter: blur(189px);
    width: 31%;
    height: 391px;
    border-radius: 19px;
    z-index: 101;

}
/*all headings*/
.login h2{
    display: flex;
    justify-self: center;
    font-size: 17px;
    font-family: sans-serif;
    color: black;
    margin-bottom: 10PX;
}
.login a{
    margin-left: 14px;
    color: peru;
    font-size: 18px;
    margin-top: 25px;
    margin-bottom: 7px;
}
.login .password{
    margin-bottom: 17px;
}
.login h3{
    display: flex;
    color: purple;
    font-size: 28px;
    justify-self: center;
    margin-bottom: 29px;
}
.logbtn{
    width: 99%;
    margin-left: 2px;
    background-color: blueviolet;
    height:40px;
    cursor: pointer;
    border-radius: 17px;
    margin: 11px 0;
    font-size: 20px;
    font-weight: 400;
}
.logbtn:hover{
    opacity: 0.8;
    filter: grayscale(300);
}
.newaccount{
    display: flex;
    flex-direction: row;
    margin-top: 15px;
}
.signup{
    margin-left: 10px;
    width: 111px;
    height: 30px;
    background-color: rgb(129, 129, 127);
    cursor: pointer;
    border-radius: 10px;
}
.signup:hover{
 opacity: 0.8;
}


/*      Screen modifacation for wider screen devices like tablets  */
@media  (max-width:870px) {
    *{
        
        box-sizing: border-box;
        margin: 0px;
        padding: 0px;
    }
    .topic{
        align-self: center;
        font-size: 29px;
    }
    .register{
    width: 60%;
    font-size: 23px;
    background-color: rgb(177, 214, 180);
    padding: 7px;
    margin-left: 0px;
    align-self: center;
    margin-right: 0px;
    justify-self: center;
   } 
   .register h2{
    font-size: 19px;
   }
   .register p {
    font-size: 17px;
   }

   .login{
    width: 60%;
    margin-left:0px;
    font-size: 23px;
    background-color: rgb(195, 238, 191);
    padding: 14px;
    align-self: center;
    margin-right: 0px;
    display: flex;
    flex-direction: column;
    justify-self: center;
   }



   .terms{
    width: 98%;
    font-size: 13px;
    height: fit-content;
    background-color: rgb(54, 49, 49);
    padding: 14px;
    align-self: center;
    padding: 5px;
    margin-left: 0px;
    margin-right: 0px;
    justify-self: center;
    margin-top: 24px;
   }
   .terms li{
    font-size: 16px;
   }
}

/*  Screen Modification for mobile phones */


@media  (max-width:640px) {
    *{
        
        box-sizing: border-box;
        margin: 0px;
        padding: 0px;
    }
    .topic{
        align-self: center;
        font-size: 19px;
    }
    .register{
    width: 88%;
    font-size: 13px;
    background-color: rgb(177, 214, 180);
    padding: 7px;
    margin-left: 0px;
    align-self: center;
    margin-right: 0px;
    justify-self: center;
   } 
   .register h2{
    font-size: 12px;
    letter-spacing: 2px;
   }
   .register p {
    font-size: 12px;
   }

   .login{
    width: 80%;
    margin-left:0px;
    font-size: 13px;
    background-color: rgb(241, 204, 204);
    padding: 10px;
    align-self: center;
    margin-right: 0px;
    display: flex;
    flex-direction: column;
    justify-self: center;
   }



   .terms{
    width: 98%;
    font-size: 13px;
    height: fit-content;
    background-color: rgb(54, 49, 49);
    padding: 14px;
    align-self: center;
    padding: 5px;
    margin-left: 0px;
    margin-right: 0px;
    justify-self: center;
    margin-top: 24px;
   }
   .terms li{
    font-size: 10px;
   }
   .registertitle{
    font-size: 13px;
   }
   .pcheck h3{
    font-size: 14px;
   }
   .login h3{
    font-size: 15px;
   }
   .login h2{
    font-size: 12px;
    letter-spacing: 2px;
    align-self: center;
   }
    .login a{
        font-style: italic;
        font-size: 13px;
    }
   .signup{
    font-size: 13px;
   }
   .logbtn{
    font-size: 14px;
    height: 23px;
    width: 68%;
    align-self: center;
   }
   .terms ol li{
    font-size: 14px;
   }
   .terms center h1{
    font-size: 17px;
   }
   .terms p{
    font-size: 15px;
   }
}

    </style>
</head>
<body>
  <!--         PHP            -->


    <h1 class="topic"><i>Shelie commerce</i></h1>
<!-- registration table    -->


 

<form action="index.php" method="post" class="register" id="register">
<nav class="registertitle">REGISTRATION FORM</nav>
<br>
<input type="hidden" class="csrf">
<h2>FirstName:</h2>
<input type="text" name="username" class="username" value="" required placeholder="Enter your Firstname">
<h2>LastName:</h2>
<input type="text" name="lastname"  class="lastname" required placeholder="Enter tour lastname">
<h2>Email:</h2>
<input type="email" name="email" class="email" required placeholder="Email:">
<h2>Password:</h2>
<input type="password" name="password" id="" class="password" required placeholder="Password">
<h2>Confirm Password:</h2>
<input type="password" name="confirmpassword" class="password" required placeholder="Confirm password">
<div class="pcheck" id="category">
    <h3>Category:</h3>
    User<input type="radio" name="category" value="user" id="">
    Admin<input type="radio" name="category" value="admin" id="">
</div>
<div class="pcheck" id="pcheck"><input type="checkbox" name="checkbox" id="" >
 <p>Have read Term and Conditions 
    <h2 class="learnmore" > Learn more </h2> 
 </p>
</div>
<button  class="regbtn" name="registerbtn">Register</button>
<p class="plogin">Already have an account? 
    <a href=""  class="backtologin">Login</a> 
</p>
</form>
<!-- login -->
 

<form action="index.php" method="post" class="login" id="login">
    <center><h3>LOGIN</h3></center>
    <input type="hidden" class="csrf">
<h2>Email:</h2>
<input type="email" name="log_email" id="" class="email" placeholder="Email" required>
<h2>Password:</h2>
<input type="password" class="password" placeholder="Password" name="log_password" required>
<a href="http://" >Forgot password?</a> <br>
<input type="submit" value="LOGIN" class="logbtn" name="log_btn">
<div class="newaccount"><h2>Create new account</h2> 
 <button class="signup">Sign up</button>
</div>
</form>


<!-- TERM SND CONDITIONS PAGE-->
 <div class="terms">
    <button class="backreg"> Back</button> <br>
    <center><h1>TERMS AND CONDITIONS</h1></center> <br> <br>
    <p>Hello Fam:</p> <br>
    <ol>
        <li>You are expected to show maximum level of discipline in this website.
     Failure to that could attract as dire as sire repurcursion to you by getting blocked from accessing this website
        </li> <br> <br>
        <li>Second,Always register/Login in the user account category.If by mistake or intension
            you try to login in using the admin panel,our cyber proffesionals will deal with you as a hacker and 
            this could result to permanent termination of your account
        </li>
    </ol>
 </div>






 <script>
    let backToRegestation = document.querySelector(".backreg");
    let loginForm = document.querySelector(".login");
    let registrationForm = document.querySelector(".register");
    let terms = document.querySelector(".terms");
    let backfromlogin = document.querySelector(".signup")
    let backtologinfromreg = document.querySelector(".backtologin");

    backtologinfromreg.addEventListener("click",
    ()=>{
        loginForm.style.display = "none";
        registrationForm.style.display = "block";
    })

    //Back to registration form from login form
    backfromlogin.addEventListener("click",
        ()=>{
            loginForm.style.display = "none";
            registrationForm.style.display = "block";
        })
    

    //Terms and conditions template opening
    let learnmore = document.querySelector(".learnmore");
    learnmore.addEventListener("click",
        ()=>{
           
            terms.style.display = "block";
            registrationForm.style.display = "none";
            
        }
        
    ) 

    //giving terms and condition back button functionality
    backToRegestation.addEventListener("click",
        ()=>{
            
            terms.style.display = "none";
            registrationForm.style.display = "block";
        }
    )
 </script>


</body>

</html>

