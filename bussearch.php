<?php
session_start();

$start = $_POST['start'];
$end = $_POST['dest'];
$date = $_POST['date'];
$type = $_POST['type'];

$con = new mysqli('localhost', 'root', '', 'busticketreservation');
//                     host     ^username ^database name
$sql = "SELECT * FROM `bus` INNER JOIN route WHERE bus.r_id=route.r_id AND route.starting_place='$start' AND route.destination='$end' AND bus.coach_type='$type' AND bus.dep_date='$date';";
$res = $con->query($sql);
?>
<html>
    <head>
        <title>SeatSearch</title>

        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/W3_css.css" rel="stylesheet" type="text/css"/>
        <link href="css/w3css-theme.css" rel="stylesheet" type="text/css"/>
        <script src="script/script.js" type="text/javascript"></script>
    </head>


    <body class="w3-theme-light">
        <div style="width: 1060px; margin-left: 125px; margin-top: 50px" class="w3-bar w3-border w3-theme-me2">
            <a href="home.php" class="w3-bar-item w3-button">Home</a>
            <a href="#" class="w3-activebutton w3-bar-item w3-button">Bus Search</a>
            <a href="#" class="w3-bar-item w3-button w3-right">About</a>
        </div>
        <div style="margin: 30px 1px 1px 110px">
            <img alt="" height="100px" width="200px" src="logo.png">
        </div>
        <form method="post" action="bussearch.php">
            <table style="width: 1060px" class="input-table" cellpadding="10" align="center">
                <tr>
                    <td class="w3-theme-lable">From:</td>
                    <td>
                        <select  id="start" name="start" class="w3-theme-light-input">
                            <option value="">----------</option>
                            <option value="dhaka">Dhaka</option>
                            <option value="rajshahi">Rajshahi</option>
                            <option value="natore">Natore</option>
                            <option value="chittagong">Chittagong</option>
                            <option value="chandpur">Chandpur</option>
                        </select>
                    </td>
                    <td class="w3-theme-lable">To:</td>
                    <td>
                        <select id="dest" name="dest" class="w3-theme-light-input">
                            <option value="">---------</option>
                            <option value="dhaka">Dhaka</option>
                            <option value="rajshahi">Rajshahi</option>
                            <option value="natore">Natore</option>
                            <option value="chittagong">Chittagong</option>
                            <option value="chandpur">Chandpur</option>
                        </select>
                    </td>
                    <td class="w3-theme-lable">Date:</td>
                    <td><input id="date" class="w3-theme-light-input"  type="date" name="date"></td>
                    <td class="w3-theme-lable">Bus type:</td>
                    <td>
                        <select id="bus_type" name="type" class="w3-theme-light-input">
                            <option value="">--------</option>
                            <option value="ac">Ac</option>
                            <option value="nonac">Non-Ac</option>
                        </select>
                    </td>
                    <td colspan="4" align="center"><input class="w3-theme-light"  type="submit" value="Search" onclick="return searchValidator()"></td>
                </tr>
            </table>
        </form>

        <table style="margin-top: 10px; width: 1060px" class="input-table" cellspacing="10" align="center">
            <tr class="w3-theme-me">
                <th>COMPANY NAME</th>
                <th>DEPARTING TIME</th>
                <th>STARTING COUNTER</th>
                <th>END COUNTER</th>
                <th>COACH TYPE</th>
                <th>VIEW</th>

            </tr>

            <tr>
                <?php
                while ($row = $res->fetch_assoc()) {
                    $id = $row['b_id'];
                    $coach = $row['coach_type'];
                    $name = $row['b_name'];
                    $d_time = $row['departing_time'];
                    $start_p = $row['starting_place'];
                    $end = $row['destination'];
                    ?>
                    <td><?php echo strtoupper($name) ?></td>
                    <td><?php
                        echo $d_time;
                        echo $id
                        ?></td>
                    <td><?php echo strtoupper($start_p) ?></td>
                    <td><?php echo strtoupper($end) ?></td>
                    <td><?php echo strtoupper($coach) ?></td>
                    <td><a href="seatsearch.php?bus_id=<?= $id ?>">View Seats</a></td>
                </tr>
<?php } ?>  
        </table>
    </body>
</html>

