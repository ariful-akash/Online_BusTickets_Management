<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $_SESSION['bus'] = $bus;
}
?>
<html>
    <head>
        <title>Delete</title>
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
        <div>
            <form method="post" action="delsearch.php">
                <table align="center" cellspacing="15" class="input-table">
                    <tr>
                        <td class="w3-theme-lable">Enter bus name:</td>
                        <td><input class="w3-theme-light-input" type="text" name="bus" placeholder="desh travels"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" class="w3-theme-light" value="Submit"></td>
                    </tr>
                </table>
            </form>
        </div>

    </body>
</html>