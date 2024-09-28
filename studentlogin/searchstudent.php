<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            padding: 10px;
            font-weight: 40px;
            font-size: 18px;
        }
        a{
            padding: 10px;
            color:red;
            font-weight: bold;
            font-size: 18px;
            text-decoration: none;
        }
    </style>
</head>
<body>
<form action="" method="POST">
        <fieldset id="fsIndex">
            <legend>Search User</legend>
            <table>
                <tr>
                    <td><input type="text" size="30" name="keyword"></td>

                    <td>
                        <select name="search_type" id="">
                            <option value="stid">Student id</option>
                            <option value="stname">Student name</option>
                        </select>
                    </td>

                    <td>
                        <input type="submit" value="Search" name="sub">
                    </td>   
                </tr>
            </table>
        </fieldset>
    </form>
</body>
</html>
<?php
    if(isset($_POST['sub'])){
        $searchid = $_POST["keyword"];
        $stype = $_POST["search_type"];

        include "connection.php";

        if($searchid == ""){
            $QuerySearch = "SELECT * FROM tblstudent";
            $sResult = mysqli_query($con, $QuerySearch);
            }else{
                $QuerySearch = "SELECT * FROM tblstudent where $stype like '%$searchid%'";
                $sResult = mysqli_query($con, $QuerySearch);
        } 
?>
<center><table border="2" rules="all" id="tblusesDetails2">
    <caption>Student Details</caption>
<tr>
    <th>Student id</th> <th>Student Name</th>  <th>student Gender</th> <th>Date of Birth</th> <th>Extra activities</th> <th>section</th>
</tr>
<?php
    while($row=mysqli_fetch_assoc($sResult)){
        echo("<tr><td>".$row['stid']."</td><td>".$row['stname']."</td><td>".$row['gender']."</td><td>".$row['dob']."</td><td>".$row['extraactivities']."</td><td>".$row['section']."</td>");
        $userid = $row['stid'];
        ?>
        <td><a href="searchstudent.php?user_delete=<?php echo $userid; ?>" onclick="return confirm('are you sure?');" style="color: #8B2222;">Delete</a></td></tr>
        <?php
    }
?>

<?php
}
elseif((isset($_GET['user_delete'])==true)&&(isset($_GET['user_delete'])<>null))
{
    $userid=$_GET['user_delete'];
    include "connection.php";
    $sql_delete = "DELETE FROM tblstudent WHERE stid='$userid'";
    $sResult=mysqli_query($con,$sql_delete);
    if($sResult){
        echo"<p style='color:red'>The User data Delete</p>";
    } else{
        echo"User Data is not Delete".mysqli_error($con);
    }
}
?>