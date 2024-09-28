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
            text-shadow: #696969 1px 1px;
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
                            <option value="userid">user id</option>
                            <option value="userfname">name</option>
                            <option value="usetype">Use Type</option>
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
            $QuerySearch = "SELECT * FROM tbluser";
            $sResult = mysqli_query($con, $QuerySearch);
            }else{
                $QuerySearch = "SELECT * FROM tbluser where $stype like '%$searchid%'";
                $sResult = mysqli_query($con, $QuerySearch);
        } 
?>
<center><table border="2" rules="all" id="tblusesDetails">
    <caption>Uses Details</caption>
<tr>
    <th>User Full Name</th> <th>User id</th>  <th>User Gender</th> <th>Usetype</th>
</tr>
<?php
    while($row=mysqli_fetch_assoc($sResult)){
        echo("<tr><td>".$row['userfname']."</td><td>".$row['userid']."</td><td>".$row['usergender']."</td><td>".$row['usetype']."</td>");
        $userid = $row['userid'];
        ?>
        <td><a href="searchusers.php?user_delete=<?php echo $userid; ?>" onclick="return confirm('are you sure?');" style="color:#8B2222;">Delete</a></td></tr>
        <?php
    }
?>

<?php
}
elseif((isset($_GET['user_delete'])==true)&&(isset($_GET['user_delete'])<>null))
{
    $userid=$_GET['user_delete'];
    include "connection.php";
    $sql_delete = "DELETE FROM tbluser WHERE userid='$userid'";
    $sResult=mysqli_query($con,$sql_delete);
    if($sResult){
        echo"<p style='color:red'>The User data Delete</p>";
    } else{
        echo"User Data is not Delete".mysqli_error($con);
    }
}
?>