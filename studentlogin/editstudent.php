<!DOCTYPE html>
<?php
    session_start();
    if(isset($_SESSION['User'])){
        include "connection.php";
        $userget = $_SESSION['User'];
        $sql_select = "SELECT * FROM tblstudent WHERE userid = '$userget'";
        $result = mysqli_query($con,$sql_select);
        if(mysqli_num_rows($result)==1)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $stuid = $row['stid'];
                $stname = $row['stname'];
                $staddress = $row['staddress'];
                $courseid = $row['courseid'];
                $section = $row['section'];
                $stype = $row['extraactivities'];
                $gender = $row['gender'];
                $dob = $row['dob'];
            }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        .sub{
            background: transparent;
            border: 2px solid  #7CFC00;
            outline: none;
            border-radius: 40px;
            cursor: pointer;
            height:40px;
            width:100px;
        }
    </style>
</head>
<body onload="focusi()">
<form action="" method="POST">
    <div class="infor">
        <center><h3>Student information</h3></center>
       <center> <table>
            <tr><td>Id:</td><td><input type="text" name="stid" id="stid" value="<?php echo $stuid?>" disabled></td></tr>
            <tr><td>Name:</td><td><input type="text" name="stname" id="stname" value="<?php echo $stname?>"></td></tr>
            <tr><td>Gender:</td><td><input type="radio" value="Male"<?php
                        if($gender=="Male")
                        {
                        echo 'checked';
                        }
                    ?> name="gender" id="gender" checked>Male<input type="radio" value="Female"<?php
                    if($gender=="Female")
                    {
                    echo 'checked';
                    }
                ?> name="gender" id="gender">female</td></tr>
            <tr><td>Address:</td><td><textarea name="stuaddress" id="stuaddress"><?php echo $staddress?></textarea></td></tr>
            <tr><td>Date of Birth:</td><td><input type="date" name="date" id="stdate" value="<?php echo $dob ?>">(yyyy-mm-dd)</td></tr>
            <tr><td>Id:</td><td><select name="idcourse">
                                    <option value="ic01" id="ictdip">Dip in ICT</option>
                                    <option value="ac02" id="acdip">Dip in Ac</option>
                                    <option value="acc03" id="accountdip">Dip in Account</option>
                                </select></tr>
            <tr><td>Extra activities :</td><td><input type="checkbox" value="sport"<?php
                        if($stype=="sport")
                        {
                        echo 'checked';
                        }
                    ?> checked name="chkext[]">sport<input type="checkbox" value="music" <?php
                    if($stype=="music")
                    {
                    echo 'checked';
                    }
                ?>name="chkext[]">Music<input type="checkbox" value="dancing"<?php
                if($stype=="dancing")
                {
                echo 'checked';
                }
            ?> name="chkext[]">Dancing</td></tr>
            <tr><td>Section:</td><td><select size="3" name="idsection">
                <option value="Dip in ICT" name="ictdip" selected>Dip in ICT</option>
                <option value="Dip in Ac" name="acdip">Dip in Ac</option>
                <option value="Dip in Account" name="accountdip">Dip in Account</option>
            </select></td></tr>
            <tr><td><button type="submit" name="sub" class="sub">submit</button></td></tr>
        </table></center>
        <div id="answer"></div>
    </div>
    </form>
    <?php
    if(isset($_POST['sub'])){
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

        include "connection.php";

        $queryin = "UPDATE tblstudent SET stname ='$stname',gender='$gender',staddress='$staddress',dob='$dob',courseid='$idcourse',extraactivities='$allactivities',section='$sections' WHERE userid='$userget'";
        $queryinset=mysqli_query($con,$queryin);

        if($queryinset == false){
           
            die("Data insert failed". " ". mysqli_error($con));
        } else {
            echo("Data insert success..!"."<br>");
        }
    }
}
}elseif (is_null($result)) {
    echo "No data found.";
}
else {
        echo("Please click on the submit button");
    }
?>
</body>
</html>

