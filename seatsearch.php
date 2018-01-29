<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['bus_id'];

    $con = new mysqli('localhost', 'root', '', 'busticketreservation');
    //                  host       ^username ^database name
    $sql = "SELECT * FROM seat where seat.b_id = $id";
    $result = $con->query($sql);
}
?>
<html>
    <head>
        <title> Passenger Information</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/W3_css.css" rel="stylesheet" type="text/css"/>
        <link href="css/w3css-theme.css" rel="stylesheet" type="text/css"/>
        <script src="script/script.js" type="text/javascript"></script>
        <script src="script/seatScript.js" type="text/javascript"></script>
    </head>
    <body class="w3-theme-light">
        <div style="margin-left: 100">
            <div class="inline">
                <table border="0" cellspacing="10" cellpadding="5">
                    <p style="margin-right: 15" align="right">DRIVER</p>
                    <?php
                    while ($raw = $result->fetch_assoc()) {
                        $sno = $raw['seat_no'];
                        $b = $raw['book'];
                        $f = $raw['fare'];
                        ?>
                        <tr>
                            <td><input <?php if ($b == 0) { ?>onclick="calculateCost(this.value,<?= $b ?>,<?= $f ?>)<?php } ?>" style="font-size: 20px; width: 70px; height: 40px; border-radius: 5px; <?php if ($b == 0) { ?>background-color: #fff;<?php } else { ?>background-color: red;<?php } ?>" type="button" id="<?= $sno ?>" value="<?= $sno ?>"/></td>
                            <?php
                            $raw = $result->fetch_assoc();
                            $sno = $raw['seat_no'];
                            $b = $raw['book'];
                            $f = $raw['fare'];
                            ?>
                            <td><input <?php if ($b == 0) { ?>onclick="calculateCost(this.value,<?= $b ?>,<?= $f ?>)<?php } ?>" style="font-size: 20px; width: 70px; height: 40px; border-radius: 5px; <?php if ($b == 0) { ?>background-color: #fff;<?php } else { ?>background-color: red;<?php } ?>" type="button" id="<?= $sno ?>" value="<?= $sno ?>"/></td>
                            <td></td>
                            <?php
                            $raw = $result->fetch_assoc();
                            $sno = $raw['seat_no'];
                            $b = $raw['book'];
                            $f = $raw['fare'];
                            ?>
                            <td><input <?php if ($b == 0) { ?>onclick="calculateCost(this.value,<?= $b ?>,<?= $f ?>)<?php } ?>" style="font-size: 20px; width: 70px; height: 40px; border-radius: 5px; <?php if ($b == 0) { ?>background-color: #fff;<?php } else { ?>background-color: red;<?php } ?>" type="button" id="<?= $sno ?>" value="<?= $sno ?>"/></td>
                            <?php
                            $raw = $result->fetch_assoc();
                            $sno = $raw['seat_no'];
                            $b = $raw['book'];
                            $f = $raw['fare'];
                            ?>
                            <td><input <?php if ($b == 0) { ?>onclick="calculateCost(this.value,<?= $b ?>,<?= $f ?>)<?php } ?>" style="font-size: 20px; width: 70px; height: 40px; border-radius: 5px; <?php if ($b == 0) { ?>background-color: #fff;<?php } else { ?>background-color: red;<?php } ?>" type="button" id="<?= $sno ?>" value="<?= $sno ?>"/></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
            <div style="margin-left: 500">
                <div class="inline" style="margin-top: 50">
                    <form  method="GET">
                        <table id="costtable" cellspacing="0" border="1" class="input-table-passenger">
                            <thead>
                                <tr class="input-table-passenger" style="background-color: beige">
                                    <th>Serial</th>
                                    <th style="width: 60%">Seat#</th>
                                    <th style="width: 40%">Cost</th>
                                </tr>
                            </thead>
                            <tbody id="costlist">
                                <tr id="totalcostRow" class="input-table-passenger" style="background-color: beige">
                                    <td align="right">Total</td>
                                    <td align="right"></td>
                                    <td id="totalcost">0</td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <div style="margin-top: 80" class="inline">
                    <form>
                        <table border="0" class="input-table input-table-passenger"cellspacing="10">
                            <tr>
                                <td class="w3-theme-lable">Name:</td>
                                <td><input class="w3-theme-light-input" type="text" placeholder="fateha akter" name="name"></td>
                                <td class="w3-theme-lable">Phone:</td>
                                <td><input class="w3-theme-light" type="number" placeholder="01735566471" name="phone"></td>
                            </tr>
                            <tr>
                                <td class="w3-theme-lable">Email:</td>
                                <td ><input class="w3-theme-light-input" type="email" placeholder="example@email.com" name="email" ></td>
                            </tr>

                            <tr>
                                <td class="w3-theme-lable">Gender:</td>
                                <td >
                                    <select class="w3-theme-light-input" id="gender" class="input">
                                        <option value="">------------------</option>
                                        <option value="dhaka">Male</option>
                                        <option value="rajshahi">Female</option>
                                        <option value="natore">Others</option>

                                    </select>
                                </td>
                                <td class="w3-theme-lable">Age:</td>
                                <td><input min="15" class="w3-theme-light-input" type="number" placeholder="20" name="age"></td>
                            </tr>
                            <tr>
                                <td class="w3-theme-lable">Address:</td>
                                <td ><input class="w3-theme-light-input" type="text" placeholder="Sankar,Dhaka" name="address"></td>
                            </tr>
                            <tr>
                                <td align="center" colspan="4"><input class="w3-theme-light-input" type="submit" value="submit"></td>
                            </tr>

                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>