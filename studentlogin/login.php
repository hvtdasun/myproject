<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="container">
                <div class="logword">
                    <h2>Welcome!</h2><br>
                    <h3>College Of Technology Rathnapura website<br>If you have are registered you can sign in.<br> is not you need to registered.</h3>
                </div>
    <div class="wrapper">
        <div class="formbox-login l">
            <form action="" method="POST">
                <div class="top-header">
                    <h3>Have an account?</h3>
                    <h2>Login</h2>
                </div>
                <div class="input-box">
                    <input type="text" name="login" class="input" placeholder="enter userid">
                    <br>
                </div>
                <div class="input-box">
                    <input type="password" name="upassword" class="input" placeholder="enter Password">
                </div>
                    <br>
                <button type="submit" name="sub" class="submit">Login</button>
                <div class="linkcss">
                    <br>
                    <a href="register.php">Register</a>
                </div>
            </form>
            <?php
 if(isset($_POST['sub'])){
    $userid=$_POST["login"];
    $upassword=$_POST["upassword"];
    $new_pass=md5($upassword);

    include "connection.php";
        $queryin="SELECT * from tbluser where userid like '$userid'";
        $querysh=mysqli_query($con,$queryin);

        if($querysh){
            if(mysqli_num_rows($querysh)==1){
                $row  = mysqli_fetch_assoc($querysh);
                $_SESSION['User'] = $row['userid'];

                if($new_pass==$row['userpassword']){
                    if($row['usetype'] == "admin"){
                        header("Location:admin.php");
                    }
                    else if($row['usetype'] == "user"){
                        header("Location:index.php");
                    }
                }
                else{
                    echo"<p style = 'color:#0ef;'>"."Incorrect password. Please try again";
                }
            } else{
                echo"<p style = 'color:#0ef;'>"."User not found. Please check your userid.";
            }
        
    } else{
        die("Database error: " . mysqli_error($con));
    }
}
?>
        </div>
    </div>
</div>
</body>
</html>








