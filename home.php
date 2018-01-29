<!DOCTYPE html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $_SESSION['start'] = $start;
    $_SESSION['dest'] = $dest;
    $_SESSION['date'] = $date;
    $_SESSION['type'] = $type;
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Index</title>
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
        <div style="margin: 100px 1px 1px 300px">
            <img alt="" height="100px" width="200px" src="logo.png">
        </div>
        <form  method="post" action="bussearch.php">
            <table class="input-table" cellpadding="15" align="center">

                <tr>
                    <td class="w3-theme-lable">From:</td>
                    <td>
                        <select  id="start" name="start" class="w3-theme-light-input">
                            <option value="">----------------</option>
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
                            <option value="">----------------</option>
                            <option value="dhaka">Dhaka</option>
                            <option value="rajshahi">Rajshahi</option>
                            <option value="natore">Natore</option>
                            <option value="chittagong">Chittagong</option>
                            <option value="chandpur">Chandpur</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td class="w3-theme-lable">Date:</td>
                    <td><input id="date" class="w3-theme-light-input"  type="date" name="date"></td>
                    <td class="w3-theme-lable">Bus type:</td>
                    <td>
                        <select id="bus_type" name="type" class="w3-theme-light-input">
                            <option value="">----------------</option>
                            <option value="ac">Ac</option>
                            <option value="nonac">Non-Ac</option>
                        </select>
                    </td>

                </tr>

                <tr>
                    <td colspan="4" align="center"><input class="w3-theme-light"  type="submit" value="Search" onclick="return searchValidator()"></td>
                </tr>

            </table>
        </form>
    </body>
</html>