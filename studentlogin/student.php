<?php
    session_start();
?>
<?php
include "connection.php";
$sharec = $_SESSION['User'];

$queryin="SELECT * from tblstudent where userid like '$sharec'";
$querysh=mysqli_query($con,$queryin);

if($querysh){
    if(mysqli_num_rows($querysh)==1){
        $row = mysqli_fetch_assoc($querysh);
        echo "<h1 style='text-align:center;'>Data insert success... You can't modify now your data you can edit your form.</h1>";
    }else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <title>Document</title>
    <style>
        .infor{
            text-align: center;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
        }
        h3{
            font-size: 50px;
        }
        input[type="text"]{
           background-color:transparent;
        }
        input[type="date"]{
            background-color: transparent;
        }
        textarea{
            background-color: transparent;
        }
        select{
            background-color: transparent;
        }
        *{
            font-size: 25px;
        }
        table,tr{
            height:50px;
        }
    </style>
    <script src="student1.js">
    </script>
</head>
<body onload="focusi()">
    <form action="" method="POST">
    <div class="infor">
        <h3>Student information</h3>
       <center> <table>
            <tr><td>Student Id:</td><td><input type="text" name="stid" id="stuid" placeholder="enter number"></td></tr>
            <tr><td>Student Name:</td><td><input type="text" name="stname" id="stuname"></td></tr>
            <tr><td>Student Gender:</td><td><input type="radio" value="Male" name="gender" id="stgender" checked>Male<input type="radio" value="Female" name="gender" id="stgender">female</td></tr>
            <tr><td>Student Address:</td><td><textarea name="stuaddress" id="staddress"></textarea></td></tr>
            <tr><td>Student Date of Birth:</td><td><input type="date" name="date" id="stdate">(yyyy-mm-dd)</td></tr>
            <tr><td>course Id:</td><td><select name="idcourse">
                                    <option value="ic01" id="ictdip">Dip in ICT</option>
                                    <option value="ac02" id="acdip">Dip in Ac</option>
                                    <option value="acc03" id="accountdip">Dip in Account</option>
                                </select></tr>
            <tr><td>Extra activities :</td><td><input type="checkbox" value="sport" checked name="chkext[]">sport<input type="checkbox" value="music" name="chkext[]">Music<input type="checkbox" value="dancing" name="chkext[]">Dancing</td></tr>
            <tr><td>course Section:</td><td><select size="3" name="idsection">
                <option value="Dip in ICT" name="ictdip" selected>Dip in ICT</option>
                <option value="Dip in Ac" name="acdip">Dip in Ac</option>
                <option value="Dip in Account" name="accountdip">Dip in Account</option>
            </select></td></tr>
            <tr><td><button type="submit" name="sub" onclick="return validate();">submit</button></td></tr>
        </table></center>
        <div id="answer"></div>
    </div>
    </form>
</body>
</html>

<?php
    if(isset($_POST['sub'])){
        $stid = $_POST["stid"];
        $stname = $_POST["stname"];
        $gender = $_POST["gender"];
        $staddress = $_POST["stuaddress"];
        $dob = $_POST["date"];
        $idcourse = $_POST["idcourse"];
        $activities = $_POST["chkext"];
        $allactivities = "";

        foreach($activities as $a){
            $allactivities="$allactivities". " " ."$a";
        }
        $sections = $_POST["idsection"];
        $sharec = $_SESSION['User'];

        include "connection.php";

        $queryins="INSERT INTO tblstudent VALUES ('$stid','$stname','$gender','$staddress','$dob','$idcourse','$allactivities','$sections','$sharec')";
        $results=mysqli_query($con,$queryins);

        if($results==false){
           die("Data insert failed....!".mysqli_error($con));
        }else{
            echo("Data insert Success...");
            header("location:student.php?");
        }
    }else{
        echo("Please click on the submit button");
    }
?>
<?php
    }
?>
<?php
}else{
    die(mysqli_error(con));
}
?>