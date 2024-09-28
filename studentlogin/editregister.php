<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['User'])){
    $userget = $_SESSION['User'];
    include "connection.php";
    $sql_select = "SELECT * FROM tbluser WHERE userid='$userget'";
    $result = mysqli_query($con,$sql_select);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            $userfname = $row['userfname'];
            $userid = $row['userid'];
            $usergender = $row['usergender'];
        }
    }
}
?>
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
            width: 100px;
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
</head>
<body>
<form method="POST">
        <div class="registerform">
        <fieldset>
           <center><table>
                <tr><td>User Full Name:</td><td><input type="text" name="userfname" value="<?php echo $userfname?>"></td></tr>
                <tr><td>User Id:</td><td><input type="text" name="userid" value="<?php echo $userid?>" disabled></td></tr>
                <tr><td>Change User Password:</td><td><input type="text" name="userpassword"></td></tr>
                <tr><td>Gender:</td><td><input type="radio" value="Male"<?php
                        if($usergender=="Male")
                        {
                        echo 'checked';
                        }
                    ?> name="gender" id="gender" checked>Male<input type="radio" value="Female"<?php
                    if($usergender=="Female")
                    {
                    echo 'checked';
                    }
                ?> name="gender" id="gender">female</td></tr>
               <div class="buttonsub"> <tr><td id="btnsub"><button id="submit" type="submit" name="sub" class="sub">Save</button></td></tr></div>
            </table></center>
        </fieldset>
    </div>
    </from>
</body>
</html>

<?php
if(isset($_POST['sub'])){
    $uname = $_POST["userfname"];
    $upassword = $_POST["userpassword"];
    $unewpassword = md5($upassword);
    $ugender = $_POST["gender"];

    include "connection.php";

    $querych = "UPDATE tbluser SET userfname = '$uname', userpassword = '$unewpassword', usergender ='$ugender' WHERE userid ='$userid'";
    $queryresult = mysqli_query($con,$querych);

    if($queryresult == false){
           
        die("Data insert failed". " ". mysqli_error($con));
    } else {
        echo("Data insert success..!"."<br>");
        header("location:index.php?");
    }
}
else {
        echo("Please click on the submit button");
    }
?>