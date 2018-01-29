<?php
session_start();
$bus = $_POST['bus'];


$con = new mysqli('localhost', 'root', '', 'busticketreservation');
//                     host     ^username ^database name
$sql = "SELECT * FROM `bus`WHERE b_name='$bus';";
$res = $con->query($sql);
?>


<html>
    <head>
        <title>Search Bus for Delete</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/W3_css.css" rel="stylesheet" type="text/css"/>
        <link href="css/w3css-theme.css" rel="stylesheet" type="text/css"/>
    </head>

    <body class="w3-theme-light">
        <div style="width: 1060px; margin-left: 125px; margin-top: 50px" class="w3-bar w3-border w3-theme-me2">
            <a href="home.php" class="w3-bar-item w3-button">Home</a>
            <a href="#" class="w3 w3-bar-item w3-button">Bus Search</a>
            <a href="#" class="w3-bar-item w3-button w3-right">About</a>
        </div>
        <div style="margin: 30px 1px 1px 110px">
            <img alt="" height="100px" width="200px" src="logo.png">
        </div>
        <form method="post" action="finaldel.php">
            <table class="input-table" cellspacing="10" align="center">
                <tr style="background-color: brown">
                    <th>COMPANY NAME</th>
                    <th>DEPARTING TIME</th>
                    <th>COACH TYPE</th>
                    <th>VIEW</th>

                </tr>

                <tr>
                    <?php
                    while ($row = $res->fetch_assoc()) {
                        $id = $row['b_id'];
                        $coach = $row['coach_type'];
                        $name = $row['b_name'];
                        $d_time = $row['departing_time']
                        ?>
                        <td><?php echo strtoupper($name) ?></td>
                        <td><?php echo $d_time; ?></td>
                        <td><?php echo strtoupper($coach) ?></td>
                        <td><a href="finaldel.php?bus_id=<?= $id ?>">Delete</a></td>
                    </tr>
                <?php } ?> 
            </table>
        </form>

    </body>
</html>

