<?php
    session_start();
?>
<?php
if(!empty($_SESSION['User'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a{
            padding: 10px;
            color:#7CFC00;
            font-weight: bold;
            font-size: 24px;
            text-decoration: none;
            text-shadow: black 1px 1px;
        }
        .upfield{
            width: 97%;
            height: 350px;
            background-image: url("cinec-default-05.jpg");
            background-size: 100% 400px;
            background-repeat: no-repeat;
            border: 0px;
            text-align:right;
        }
        iframe{
            width: 80%;
            height: 500px;
        }
        .foriframe{
            margin: 0 auto;
            display: flex;
            justify-content: center;
        }
        body{
            background: #696969;
        }
        .linked{
            display: flex;
            justify-content: center; 
        }
    </style>
</head>
<body>
<fieldset class="upfield">
            <div class="linkeuser">
                <a href="admin.php?aid=logout" style="color: #7CFC00;">Logout</a>
            </div>
        </fieldset>
        <div class="linked">
            <a href="addadmin.php" target="iframe">Add Admins</a><br>
            <a href="searchusers.php" target="iframe">search Users</a><br>
            <a href="searchstudent.php" target="iframe">Search Students</a><br>
        </div>
        <fieldset class="underfield">
            <div class="foriframe">
                <iframe src="" name="iframe" frameborder="0"></iframe>
            </div>
        </fieldset>
</body>
</html>
<?php
if(isset($_GET['aid']) and $_GET['aid'] == 'logout'){
    $_SESSION['User']='';
    header("Location: login.php");
}
?>
<?php
}else{
    echo("<h1 style='color:red;'> You dont have access without login!</h1>");
}
?>