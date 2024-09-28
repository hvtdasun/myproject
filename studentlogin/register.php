<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            font-family:sans-serif;
            color: #fff;
        }
        body{
            background-image: url("daniel-leone-v7daTKlZzaw-unsplash.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            justify-content:center;
        }

        .registerform{
            width:60%;
            font-size:25px;
            color: #fff;
            margin-top:100px;
        }
        fieldset{
            width: 500px;
            height: 300px;
        }
        table,tr{
            height:50px;
        }
        input[type='text']{
            border-radius:20px 20px 20px 20px;
            height:30px;
            width:200px;
            background: rgba(255,255,255,0.1);
            border: none;
            outline: none;
            color: #fff;
        }
        input[type='password']{
            border-radius:20px 20px 20px 20px;
            height:30px;
            width:200px;
            background: rgba(255,255,255,0.1);
            border: none;
            outline: none;
            color: #fff;
        }
        button{
            width: 150px;
            height:40px;
            font-size:20px;
            background: rgba(255,255,255,0.7);
            cursor: pointer;
            transition: .3s;
            border: none;
            outline: none;
            border-radius:20px 20px 20px 20px;
            color: black;
        }
        .buttonsub{
            padding-top:26px;
        }
        #submit:hover{
            background-color:orange;
            color:white;
            letter-spacing:0.5px;
         /* font-weight: 700; */
        }
        #btnSub{
         padding-left: 80px;
        }
    </style>
    <script src="register1.js">
    </script>
</head>
<body onload="focusi()">
    <form method="POST" action="">
        <div class="registerform">
        <fieldset>
            <center><table>
                <tr><td>User Full Name:</td><td><input type="text" name="userfname" id="userfname"></td></tr>
                <tr><td>User Id:</td><td><input type="text" name="userid" id="userid"></td></tr>
                <tr><td>User Password:</td><td><input type="password" name="userpassword" id="userpassword"></td></tr>
                <tr><td>Student Gender:</td><td><input type="radio" value="Male" name="gender" id="stgender" checked>Male<input type="radio" value="Female" name="gender" id="stgender">female</td></tr>
               <div class="buttonsub"> <tr><td id="btnsub"><button id="submit" type="submit" name="sub" onclick="return validate();">Register</button></td></tr></div>
            </table></center>
        </fieldset>
        <div id="answer"></div>
    </div>
    </from>
</body>
</html>

<?php
if(isset($_POST['sub'])){
    $uname=$_POST["userfname"];
    $uid=$_POST["userid"];
    $password=$_POST["userpassword"];
    $en_password=md5($password);
    $ugender=$_POST["gender"];
    $usesver = "user";

    include "connection.php";

    $queryin="INSERT INTO tbluser VALUES ('$uname','$uid','$en_password','$ugender','$usesver')";
    $queryinset=mysqli_query($con,$queryin);

    if($queryinset==false){
        if($uid = $_SESSION['User']){
            die("This User id already have use another one....");
        }
        die("Data Insert Failed....".mysqli_error($con));
    }else{
        echo("Data insert success..!");
        header("location:login.php?user_insert=true");
    }
}else{
    echo("<center>please click on register Button</center>");
}
?>