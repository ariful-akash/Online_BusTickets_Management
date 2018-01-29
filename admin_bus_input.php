<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n = $_POST["name"];
    $r = $_POST["reg_no"];
    $ct = $_POST["coach"];
    $dd = $_POST["dep_date"];
    $t = $_POST["time"];
    $f = $_POST["from"];
    $to = $_POST["to"];

    $con = new mysqli('localhost', 'root', '', 'busticketreservation');
    //                     host       ^username ^database name
    //                     
    $sql = "SELECT r_id FROM route WHERE starting_place = '$f' AND destination = '$to'";
    $result = $con->query($sql);
    if ($result->num_rows == 0) {

        $r_ins = "insert into route(starting_place,destination) values ('$f','$to')";
        $result2 = $con->query($r_ins);
    }


    $sql = "SELECT r_id FROM route WHERE starting_place = '$f' AND destination = '$to'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    $a = $row['r_id'];
    $sql1 = "insert into bus(b_name,reg_no,coach_type,departing_time,dep_date,r_id) values('$n','$r',
          '$ct','$t','$dd',$a)";
    $result1 = $con->query($sql1);
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Admin Bus Input </title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/W3_css.css" rel="stylesheet" type="text/css"/>
        <link href="css/w3css-theme.css" rel="stylesheet" type="text/css"/>

        <script src="script/script.js" type="text/javascript"></script>
    </head>
    <body class="w3-theme-light">
        <div style="width: 1060px; margin-left: 125px; margin-top: 50px" class="w3-bar w3-border w3-theme-me2">
            <a href="home.php" class="w3-activebutton w3-bar-item w3-button">Home</a>
            <a href="home.php" class="w3-bar-item w3-button">Bus Search</a>
            <a href="#" class="w3-bar-item w3-button w3-right">About</a>
        </div>
        <div style="margin: 30px 1px 1px 110px">
            <img alt="" height="100px" width="200px" src="logo.png">
        </div>
        <form  method="post">
            <table class="input-table" align="center">
                <tr>
                    <td class="w3-theme-lable" colspan="4">Enter bus information.</td>
                </tr>
                <td>

                </td>

                <tr>
                    <td class="w3-theme-lable">Bus Name:</td>
                    <td><input id="name" placeholder="desh travels" class="w3-theme-light-input" type="text" name="name"></td>
                </tr>

                <tr>
                    <td>Registration no:</td>
                    <td><input id="reg_no" placeholder="kha 11-2783" class="w3-theme-light-input" type="text" name="reg_no"></td>
                </tr>

                <tr>
                    <td class="w3-theme-lable">Coach:</td>
                    <td><input id="coach" placeholder="nonac" class="w3-theme-light-input" type="text" name="coach"></td>
                </tr>

                <tr>
                    <td>Departing date:</td>
                    <td><input id="dep_date" width="50px" class="w3-theme-light-input" type="date" name="dep_date"></td>
                </tr>

                <tr>
                    <td class="w3-theme-lable">Time:</td>
                    <td><input width="50px"id="time" class="w3-theme-light-input" type="time" name="time"></td>
                </tr>

                <tr>
                    <td class="w3-theme-lable">Starting from:</td>
                    <td><input id="starting" placeholder="dhaka" class="w3-theme-light-input" type="text" name="from"></td>
                </tr>

                <tr>
                    <td class="w3-theme-lable">Destinaton:</td>
                    <td><input id="dest" placeholder="rajshahi" class="w3-theme-light-input" type="text" name="to"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input class="w3-theme-light" type="submit" value="Submit" onclick="return adminbusinput()"></td>
                </tr>

            </table>
        </form>
    </body>
</html>
