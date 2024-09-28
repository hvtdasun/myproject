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
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <title>index</title>
    <style>
        a{
            padding: 10px;
            color:  #7CFC00;
            font-weight: 40px;
            font-size: 24px;
            text-decoration: none;
            text-shadow: black 1px 1px;
        }
        .upfield{
            width: 97%;
            height:100%;
            background-image: url("education-open-book-blackboard-24neqyjtkzc2rc21.jpg");
            background-size: 100% 400px;
            background-repeat: no-repeat;
            border: 0px;
            text-align:right;
        }
        h2{
            font-size: 78px;
            color: #7CFC00;
            font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            text-shadow: 3px 3px 3px black;
            text-align:left;
            padding-left:50px;
        }
        h3{
            font-size: 50px;
            text-shadow: 2px 2px 2px black;
            text-align:center;
            color: #7CFC00;
        }
        iframe{
            width: 80%;
            height: 800px;
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
                <a href="editregister.php" style="color:  #7CFC00;">Edit Profile</a>
                <a href="index.php?id=logout" style="color:  #7CFC00;">Logout</a>
            </div>
            <h2>It Education</h2>
            <h3>college of technology</h3>
        </fieldset>
        <div class="linked">
            <a href="aboutus.php" target="iframe">about us </a>
            <a href="student.php" target="iframe">Student</a>
            <a href="contact.php" target="iframe">contact Us</a>
            <a href="home.php" target="iframe">Home</a>
            <a href="editstudent.php" target="iframe">Edit student</a>
        </div>
        <fieldset class="underfield">
            <div class="foriframe">
                <iframe src="" name="iframe" frameborder="0"></iframe>
            </div>
        </fieldset>

</body>
</html>
<?php
if(isset($_GET['id']) and $_GET['id'] == 'logout'){
    $_SESSION['User']='';
    header("Location: login.php");
}
?>
<?php
}else{
    echo("<h1 style='color:red;'>You dont have access without login!</h1>");
}
?>