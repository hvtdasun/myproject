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
            width: 650px;
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
         padding-left: 30px;
        }
    </style>
    <script src="admin1.js">
    </script>
</head>
<body onload="focusi()">
    <form method="POST" action="">
        <div class="registerform">
            <fieldset>
                <center><table>
                    <tr><td>Admin Full Name:</td><td><input type="text" name="adminfname" id="adfname"></td></tr>
                    <tr><td>Admin User Id:</td><td><input type="text" name="adminid" id="adid"></td></tr>
                    <tr><td>Admin User Password:</td><td><input type="password" name="adminpassword" id="adps"></td></tr>
                    <tr><td>Student Gender:</td><td><input type="radio" value="Male" name="admingender" id="stgender" checked>Male<input type="radio" value="Female" name="admingender" id="stgender">Female</td></tr>
                <div class="buttonsub"> <tr><td></td><td id="btnSub"><button id="submit" type="submit" name="sub" onclick="return validate();">Register</button></td></tr></div>
                </table></center>
            </fieldset>
            <div id="answer"></div>
        </div>
    </from>
</body>
</html>

<?php
if(isset($_POST['sub'])){
    $aname=$_POST["adminfname"];
    $aid=$_POST["adminid"];
    $apassword=$_POST["adminpassword"];
    $new_password = md5($apassword);
    $ugender=$_POST["admingender"];
    $usesver = "admin";

    include "connection.php";

    $queryin="INSERT INTO tbluser VALUES ('$aname','$aid','$new_password','$ugender','$usesver')";
    $queryinset=mysqli_query($con,$queryin);

    if($queryinset==false){
        if($uid = $_SESSION['User']){
            die("This User id already have use another one....");
        }
        die("Data Insert Failed....".mysqli_error($con));
    }else{
        echo("Data insert success..!");
    }
}else{
    echo("<center>please click on register Button</center>");
}
?>